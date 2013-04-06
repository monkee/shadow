<?php
/**
 * 代码生成器
 * 
 * 将普通的变量，转化为可以直接引用的PHP代码
 * 
 * @author monkee
 */
class SerializeExt_Inc_Code implements SerializeExt_Inc
{
	public function var2str($var){
		return VarExport::convVarToString($var);
	}
	
	public function str2var($str){
		return eval($str);
	}
}
