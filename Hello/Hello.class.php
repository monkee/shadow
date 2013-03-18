<?php
/**
 * 告诉你，欢迎你，输出Hello Monkee
 * 
 * @author monkee
 * @time 2013-03-18 23:10
 */

class Hello
{
	/**
	 * 名字
	 * 
	 * @var string
	 */
	private $name = '';
	
	/**
	 * 构造函数
	 * 
	 * @param string $name 名字
	 */
	public function __construct($name = "php"){
		$this->name = $name;
	}
	
	/**
	 * 说话
	 * 
	 * 输出字符串到终端（STDOUT）
	 */
	public function say(){
		echo sprintf("Hello, %s\n", $this->name);
	}
}