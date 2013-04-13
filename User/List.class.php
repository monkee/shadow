<?php
/**
 * 类的配置输出
 */

class User_List
{
	private $opts = array(
		'flag' => 0,
		'state' => 0,
	);
	
	public function __construct(){
		$this->init();
	}
	
	public function setOpts($opts){
		foreach($this->opts as $k => $v){
			isset($opts[$k]) && $this->opts[$k] = $opts[$k];
		}
	}
	public function gets(){
		$db = DB::instance('db1');
		$ret = $db->select('select * from user');
		foreach($ret as $k => $v){
			$ret[$k] = new User($v);
		}
		
		foreach($this->opts as $k => $v){
			$method = 'optWith' . ucfirst($k);
			$ret = $this->$method($ret, $v);
		}
		
		return $ret;
	}
	
	public function optWithFlag($list, $v){
		if($v == 0){
			return $list;
		}
		$db = DB::instance('db1');
		$ret = $db->select('select * from user_flag');
		
		$flags = array();
		foreach($ret as $row){
			$flags[$row['id']] = User_Flag::initWithArray($row);
		}
		
		foreach($list as &$v){
			$v->setUserFlag($flags[$v->getID()]);
		}
		
		return $list;
	}
	
	public function optWithState($list, $v){
		if($v == 0){
			return $list;
		}
		return $list;
	}
	
	public function clear(){
		$this->init();
	}
	
	public function init(){
		$this->opts = array(
			'flag' => 0,
			'state' => 0,
		);
	}
}