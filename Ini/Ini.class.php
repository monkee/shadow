<?php
/**
 * ini文件读取类
 * 
 * 1. 对基本的ini文件的读取
 * 2. 在shadow中我们对此进行扩展
 * 3. 结合shadow的情况给出特殊处理
 * 
 * @author monkee
 * 
 * @todo 一个ini文件如何只被解析一次？
 * @todo 不同的地方调用的类情况下，ini文件也能保证只被解析一次
 */

class Ini
{
	static private $cache = array();
	/**
	 * 解析，并返回解析结果
	 * 
	 * @param string $iniFile 被解析的配置文件
	 * @return array
	 * 
	 * @throws SDException
	 */
	static public function parse($iniFile){
		$iniFile = realpath($iniFile);
		
		if($iniFile === false){
			throw new SDException("ini file is not exist");
		}
		
		if(!isset(self::$cache[$iniFile])){
			Ini_Sys::set('track_errors', 1);
			$conf = @parse_ini_file($iniFile, true);
			if($conf === false){
				throw new SDException($php_errormsg);
			}
			Ini_Sys::reset('track_errors');
			self::$cache[$iniFile] = $conf;
		}
		return self::$cache[$iniFile];
	}
}


