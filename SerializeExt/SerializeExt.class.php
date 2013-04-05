<?php
/**
 * 序列化的扩展类
 * 
 * 支持多种的序列化方式，包括：
 * 1. serialize
 * 2. json
 * 3. code
 * 
 * @author monkee
 */
class SerializeExt
{
	/**
	 * 实例化具体的扩展方法，使其具有可扩展的特性
	 * 
	 * 都支持的方法，请参考接口：interface SerializeExt_Inc
	 * 
	 * @param string $type 获取的方式
	 * @return SerializeExt_Inc object
	 * 
	 * @throws SDException
	 */
	static public function instance($type = 'serialize'){
		$class = "SerializeExt_Inc_" . ucfirst($type);
		if(class_exists($class)){
			return new $class();
		}
		throw new SDException("instance of SerializeExt {$type} is not exists");
	}
}