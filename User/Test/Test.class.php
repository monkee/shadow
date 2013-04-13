<?php
/**
 * 
 */

class User_Test_Test extends Test
{
	public function testContruct(){
		$db = DB::instance('db1');
		$ret = $db->select('select * from user where id=1');
		$user = new User($ret[0]);
		
		
		$this->isEqual($user->getID(), 1);
		$this->isEqual($user->getName(), 'a');
	}
	
	public function testInitWithID(){
		$user = User::initWithID(1);
		$this->isEqual($user->getID(), 1);
		$this->isEqual($user->getName(), 'a');
	}
	
	public function testInitWithName(){
		$user = User::initWithName('a');
		$this->isEqual($user->getID(), 1);
		$this->isEqual($user->getName(), 'a');
	}
}