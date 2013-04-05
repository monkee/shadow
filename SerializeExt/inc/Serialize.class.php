<?php
/**
 * 使用PHP内置的序列化函数来实现
 * 
 * 这里我们直接使用serialize来实现序列化
 * 
 * @author monkee
 */

class SerializeExt_Inc_Serialize implements SerializeExt_Inc
{
	public function var2str($var){
		return @serialize($var);
	}
	
	public function str2var($str){
		return @unserialize($var);
	}
}