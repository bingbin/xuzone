<?php
/**
 * Base class file.
 *
 * @author haibin <bingbin1321@163.com>
 * @version $Id: Base.php 7 2014-03-09 15:52:48Z haibin $
 */
namespace kit;
 
defined('KIT_PATH') or define('KIT_PATH',dirname(__FILE__));
 
class Base{
 
	private static $_imports=array();	
	private static $classMap=array();
	private static $_includePaths;	
	private static $_aliases=array('system'=>KIT_PATH); // alias => path
	
	public static function getVersion()
	{
		return '1.0';
	}
 
	/**
	 * 载入类或文件
	 */
	public static function import($alias,$forceInclude=false)
	{
		if(isset(self::$_imports[$alias]))  // previously imported
			return self::$_imports[$alias];

		if(class_exists($alias,false) || interface_exists($alias,false))
			return self::$_imports[$alias]=$alias;

		if(($pos=strrpos($alias,'\\'))!==false) // a class name in PHP 5.3 namespace format
		{
			$namespace=str_replace('\\','.',ltrim(substr($alias,0,$pos),'\\'));
			if(($path=self::getPathOfAlias($namespace))!==false)
			{
				$classFile=$path.DIRECTORY_SEPARATOR.substr($alias,$pos+1).'.php';
				if($forceInclude)
				{
					if(is_file($classFile))
						require($classFile);
					else
						throw new CException(Vii::t('vii','Alias "{alias}" is invalid. Make sure it points to an existing PHP file.',array('{alias}'=>$alias)));
					self::$_imports[$alias]=$alias;
				}
				else
					self::$classMap[$alias]=$classFile;
				return $alias;
			}
			else
				throw new CException(Vii::t('vii','Alias "{alias}" is invalid. Make sure it points to an existing directory.',
					array('{alias}'=>$namespace)));
		}

		if(($pos=strrpos($alias,'.'))===false)  // a simple class name
		{
			if($forceInclude && self::autoload($alias))
				self::$_imports[$alias]=$alias;
			return $alias;
		}

		$className=(string)substr($alias,$pos+1);
		$isClass=$className!=='*';

		if($isClass && (class_exists($className,false) || interface_exists($className,false)))
			return self::$_imports[$alias]=$className;

		if(($path=self::getPathOfAlias($alias))!==false)
		{
			if($isClass)
			{
				if($forceInclude)
				{
					if(is_file($path.'.php'))
						require($path.'.php');
					else
						throw new CException(Vii::t('vii','Alias "{alias}" is invalid. Make sure it points to an existing PHP file.',array('{alias}'=>$alias)));
					self::$_imports[$alias]=$className;
				}
				else
					self::$classMap[$className]=$path.'.php';
				return $className;
			}
			else  // a directory
			{
				if(self::$_includePaths===null)
				{
					self::$_includePaths=array_unique(explode(PATH_SEPARATOR,get_include_path()));
					if(($pos=array_search('.',self::$_includePaths,true))!==false)
						unset(self::$_includePaths[$pos]);
				}

				array_unshift(self::$_includePaths,$path);

				if(self::$enableIncludePath && set_include_path('.'.PATH_SEPARATOR.implode(PATH_SEPARATOR,self::$_includePaths))===false)
					self::$enableIncludePath=false;

				return self::$_imports[$alias]=$path;
			}
		}
		else
			throw new CException(Vii::t('vii','Alias "{alias}" is invalid. Make sure it points to an existing directory or file.',
				array('{alias}'=>$alias)));
	}

	/**
	 * Translates an alias into a file path.
	 * Note, this method does not ensure the existence of the resulting file path.
	 * It only checks if the root alias is valid or not.
	 * @param string $alias alias (e.g. system.web.CController)
	 * @return mixed file path corresponding to the alias, false if the alias is invalid.
	 */
	public static function getPathOfAlias($alias)
	{
		if(isset(self::$_aliases[$alias]))
			return self::$_aliases[$alias];
		else if(($pos=strpos($alias,'.'))!==false)
		{
			$rootAlias=substr($alias,0,$pos);
			if(isset(self::$_aliases[$rootAlias]))
				return self::$_aliases[$alias]=rtrim(self::$_aliases[$rootAlias].DIRECTORY_SEPARATOR.str_replace('.',DIRECTORY_SEPARATOR,substr($alias,$pos+1)),'*'.DIRECTORY_SEPARATOR);
			else if(self::$_app instanceof CWebApplication)
			{
				if(self::$_app->findModule($rootAlias)!==null)
					return self::getPathOfAlias($alias);
			}
		}
		return false;
	}

	/**
	 * Create a path alias.
	 * Note, this method neither checks the existence of the path nor normalizes the path.
	 * @param string $alias alias to the path
	 * @param string $path the path corresponding to the alias. If this is null, the corresponding
	 * path alias will be removed.
	 */
	public static function setPathOfAlias($alias,$path)
	{
		if(empty($path))
			unset(self::$_aliases[$alias]);
		else
			self::$_aliases[$alias]=rtrim($path,'\\/');
	}

	/**
	 * Class autoload loader.
	 * This method is provided to be invoked within an __autoload() magic method.
	 * @param string $className class name
	 * @return boolean whether the class has been loaded successfully
	 */
	public static function autoload($className)
	{
		// use include so that the error PHP file may appear
		if(isset(self::$classMap[$className]))
			include(self::$classMap[$className]);
		else if(isset(self::$_coreClasses[$className]))
			include(YII_PATH.self::$_coreClasses[$className]);
		else
		{
			// include class file relying on include_path
			if(strpos($className,'\\')===false)  // class without namespace
			{
				if(self::$enableIncludePath===false)
				{
					foreach(self::$_includePaths as $path)
					{
						$classFile=$path.DIRECTORY_SEPARATOR.$className.'.php';
						if(is_file($classFile))
						{
							include($classFile);
							break;
						}
					}
				}
				else
					include($className.'.php');
			}
			else  // class name with namespace in PHP 5.3
			{
				$namespace=str_replace('\\','.',ltrim($className,'\\'));
				if(($path=self::getPathOfAlias($namespace))!==false)
					include($path.'.php');
				else
					return false;
			}
			return class_exists($className,false) || interface_exists($className,false);
		}
		return true;
	}
	public function createWebApplication(){
		include_once 'base/Controller.php';
		include_once 'web/Application.php';
		include_once 'web/Request.php';
		return new Application();
	}
	private static $_coreClasses=array(
		'CApplication' => '/base/CApplication.php'
		
	);
}