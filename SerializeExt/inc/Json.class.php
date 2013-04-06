<?php
/**
 * Json方式实现的序列化
 * 
 * 接口的实现
 * 
 * @todo 对GBK中文的处理 1. 转UTF8处理 2. 对GBK单独处理
 */

class SerializeExt_Inc_Json implements SerializeExt_Inc
{
	/**
	 * (non-PHPdoc)
	 * @see SerializeExt/SerializeExt_Inc::var2str()
	 */
	public function var2str($var){
		return json_encode($var);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see SerializeExt/SerializeExt_Inc::str2var()
	 */
	public function str2var($str){
		return json_decode($str, true);
	}
}