<?php

class Test_Manage
{
	private $className = null;
	private $classObj = null;
	private $result = array();
	public function __construct($className = null){
		$this->className = $className;
	}
	
	/**
	 * 设置class
	 * 
	 * 这个class必须是继承了Test的测试类
	 * 
	 * @param string $className
	 */
	public function setClass($className){
		$this->className = $className;
	}
	
	/**
	 * 执行对某个测试case的所有操作
	 * 
	 * @return array | Test_Result
	 */
	public function exec(){
		$this->init();
		$methods = $this->getMethods();
		foreach($methods as $method){
			$this->call($method);
		}
		return $this->result;
	}
	
	/**
	 * 调用具体的方法
	 * 
	 * @param unknown_type $method
	 */
	private function call($method){
		$class = $this->classObj;
		
		$class->reset();
		
		$methodName = $method->name;
		$class->$methodName();
		
		$result = new Test_Result($method->class, $method->name); //以方法为区分颗粒
		$result->addCases($class->getAllCases());
		$this->result[] = $result;
	}
	
	/**
	 * 初始化
	 * 
	 * @throws SDException
	 */
	private function init(){
		$class = $this->className;
		$this->classObj = new $class();
		if(!($this->classObj instanceof Test)){
			throw new SDException("Class {$this->className} must be a sub class of Test", SDException::FATAL);
		}
	}
	
	/**
	 * 获取所有的可以执行的方法
	 * 
	 * 这里我们限制为：public methods
	 * 
	 * @return array | ReflectionMethod
	 */
	private function getMethods(){
		$reflection = new ReflectionClass($this->className);
		$methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
		
		foreach($methods as $i => $method){
			if($method->class != $this->className){
				unset($methods[$i]);
			}
		}
		
		return $methods;
	}
}
?>