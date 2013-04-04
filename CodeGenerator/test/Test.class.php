<?php
/**
 * 测试用例
 */
class CodeGenerator_Test_Test extends Test
{
	public function testConvToString(){
		//1. 测试纯数字的一维数组
		$array = array(1, null, false, true, 'b', 'c', 'd');
		
		echo CodeGenerator::convVarToString($array);
		echo "\n";
		//2. 测试纯数字的多维数组
		$array = array(
			array(1, 2, 3, 'a', 'b', 'c', 'd'),
			array(1, 2, 3, 'a', 'b', 'c', 'd'),
			1, 2, 3, 'a', 'b', 'c', 'd'
		);
		
		echo CodeGenerator::convVarToString($array);
		echo "\n";
		//3. 测试双引号、反斜杠等转义字符
		$array = array(
			"\t", "\n", "\\", "\"", "\r"
		);
		
		echo CodeGenerator::convVarToString($array);
		echo "\n";
		exit;
	}
}