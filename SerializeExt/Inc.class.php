<?php
/**
 * SerializeExt_Inc的接口类，定义了实现的类必须要实现的接口
 * 
 * @author monkee
 */
interface SerializeExt_Inc
{
	/**
	 * 变量转成字符串
	 * 
	 * @param mixed $var 变量
	 * @return string
	 * 
	 * @throws SDException
	 */
	public function var2str($var);
	
	/**
	 * 字符串转成变量
	 * 
	 * @param string $str 字符串
	 * @return mixed
	 * 
	 * @throws SDException
	 */
	public function str2var($str);
}