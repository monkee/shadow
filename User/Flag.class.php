<?php
/**
 * 
 */

class User_Flag
{
	private $id = 0;
	private $flag = 0;
	public function __construct($user = array()){
		$this->id = $user['id'];
		$this->flag = $user['flag'];
	}
	
	public function getFlag(){
		return $this->flag;
	}
	
	static public function initWithArray($user){
		return new User_Flag($user);
	}
}