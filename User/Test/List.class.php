<?php
/**
 * 
 */
class User_Test_List extends Test
{
	public function testGets(){
		$userList = new User_List();
		$userList->setOpts(array(
			'flag' => 1,
			'state' => 1,
		));
		$list = $userList->gets();
		
		var_dump($list);
		
		$userList->clear();
		$list = $userList->gets();
		
		var_dump($list); exit;
	}
}