<?php
/**
 * User类，用户类
 * 
 * 案例：类的静态初始化
 * 
 * @author monkee
 */

class User
{
	private $id = 0;
	private $name = '';
	private $desc = '';
	private $userFlag = null;
	public function __construct($user = array()){
		$this->id = intval($user['id']);
		$this->name = $user['name'];
		$this->desc = $user['desc'];
	}
	
	public function getID(){
		return $this->id;
	}
	public function getName(){
		return $this->name;
	}
	public function getDesc(){
		return $this->desc;
	}
	
	public function getUserFlag(){
		return $this->userFlag;
	}
	
	public function setUserFlag(User_Flag $userFlag){
		$this->userFlag = $userFlag;
	}
	
	public function isExist(){
		return $this->id > 0 ? 1 : 0;
	}
	
	static public function initWithID($id){
		$db = DB::instance('db1');
		$id = intval($id);
		$ret = $db->select("select * from user where id={$id}");
		if(count($ret) == 1){
			return new User($ret[0]);
		}
		//返回一个空的User对象
		//抛出一个异常
		return new User(array());
	}
	
	static public function initWithName($name){
		$db = DB::instance('db1');
		$name = $db->real_escape_string($name);
		$ret = $db->select("select * from user where name=\"{$name}\"");
		if(count($ret) == 1){
			return new User($ret[0]);
		}
		//返回一个空的User对象
		//抛出一个异常
		return new User(array());
	}
}