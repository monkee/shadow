<?php



class SerializeExt_Test_Test extends Test
{
	public function testSerialize(){
		$var = array(
			'0' => 'bkddkiw',
			'a' => array(
				1, 2, 3, 4, 5
			)
		);
		$serObj = SerializeExt::instance("serialize");
		$str = $serObj->var2str($var);
		
		$retVar = $serObj->str2var($str);
		
		$this->isAbsluteEqual($var['0'], $var['0']);
		$this->isAbsluteEqual($var['a'][1], $var['a'][1]);
	}
	
	public function testJson(){
		$var = array(
			'0' => '你好',
			'a' => array(
				1, 2, 3, 4, 5
			)
		);
		$serObj = SerializeExt::instance("json");
		$str = $serObj->var2str($var);
		
		$retVar = $serObj->str2var($str);
		
		$this->isAbsluteEqual($var['0'], $var['0']);
		$this->isAbsluteEqual($var['a'][1], $var['a'][1]);
	}
	
	public function testCode(){
		$var = array(
			'0' => '你好',
			'a' => array(
				1, 2, 3, 4, 5
			)
		);
		$serObj = SerializeExt::instance("code");
		$str = $serObj->var2str($var);
		
		echo $str; exit;
		$retVar = $serObj->str2var($str);
		
		$this->isAbsluteEqual($var['0'], $var['0']);
		$this->isAbsluteEqual($var['a'][1], $var['a'][1]);
	}
}