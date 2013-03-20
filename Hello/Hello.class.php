<?php
/**
 * 这是一个欢迎的类包
 * 
 * 欢迎你开始学习这门课程
 * 
 * @author monkee
 * @date 2013-03-20
 */


class Hello
{
	private $name = '';
	
	/**
	 * 使用你的名字来初始化
	 * 
	 * @param string $name 你的名字
	 */
	public function __construct($name = "stranger"){
		$this->name = $name;
	}
	
	/**
	 * 说出来，交流一下
	 * 
	 * 1. 会输出一段话
	 */
	public function say(){
		echo sprintf("Welcome to shadow, %s\n", $this->name);
	}
}