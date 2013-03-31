<?php
/**
 * 
 * 
 */

class DB_Test_DB extends Test
{
	public function testdb1(){
		$db = DB::instance("db1");
		$ret = $db->select("select name from names");
		
		$this->isEqual("monkee", $ret[0]['name']);
	}
	
	public function testdb3(){
		try{
			$db = DB::instance('db2');
			$this->isEqual(1, 2);
		}catch(SDException $e){
			$this->isEqual(1, 1);
		}
	}
}