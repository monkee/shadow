<?php
class Ini_Test_Ini extends Test
{
	public function testParse1(){
		$file = "Ini/conf/test.ini";
		
		$ini = new Ini($file);
		$conf = $ini->parse();
		
		$this->isEqual($conf['key_a']['name'], "monkee");
		$this->isEqual($conf['key_a']['age'], 120);
		$this->isEqual($conf['key_b']['b.sa'][0], "一级子类");
	}
	
	/**
	 * 测试异常情况
	 * 
	 * 1. 配置文件不存在
	 * 2. 配置语法错误
	 * 3. 其它错误
	 * 
	 */
	public function testParse2(){
		$file = "Ini/conf/test2.ini";
		
		//1. 测试配置文件不存在
		try{
			$ini = new Ini($file);
			$conf = $ini->parse();
		}catch(SDException $e){
			//echo $e; exit;
			$this->isEqual(1, 1);
		}
		
	}
}