<?php
/**
 * 
 */

class Ini_Sys
{
	/**
	 * 缓存设置的数据，用于重置
	 * 
	 * @var array
	 */
	static private $config = array();
	
	/**
	 * 设置执行时的PHP环境变量
	 * 
	 * 1. 缓存原配置数据，可用于重置
	 * 2. 若要重置，使用reset
	 * 
	 * @param string $k
	 * @param mixed $v
	 */
	static public function set($k, $v){
		self::$config[$k] = self::get($k);
		ini_set($k, $v);
	}
	
	/**
	 * 重置某个配置
	 * 
	 * @param string $k 重置的key
	 * @throws SDException
	 */
	static public function reset($k){
		if(!isset(self::$config[$k])){
			throw new SDException("Ini Sys config {$k} is not used");
		}
		$v = self::$config[$k];
		ini_set($k, $v);
	}
	
	/**
	 * 获取某个配置的值
	 * 
	 * @param string $k key
	 * @return mixed
	 */
	static public function get($k){
		return ini_get($k);
	}
}