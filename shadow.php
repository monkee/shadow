<?php
/**
 * 基本的shadow载入文件
 * 
 * 包含：
 * 1. class autoload规则
 * 2. 定义基本环境常量
 * 3. 定义基本类和基本异常处理
 * 
 * @author monkee<zomboo1@126.com>
 * @copyright 2013-2014
 * @package shadow
 * @version 0.1.0
 */

if(!defined("DS")){
	define("DS", DIRECTORY_SEPARATOR);
}

define("SD_ROOT", dirname(__FILE__));

spl_autoload_register("__sd_autoload");
function __sd_autoload($class){
	$classPath = str_replace('_', DS, $class);
	if(strpos($classPath, DS) === false){
		$classPath .= DS . $class;
	}
	$classPath = SD_ROOT . DS . $classPath . '.class.php';
	if(!is_file($classPath)){
		throw new SDException("Class {$class} is not defined,should be {$classPath}."); //或者有别的方案也行，比如：不作为
	}
	include_once $classPath;
}


class SDException extends Exception{}