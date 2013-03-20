<?php
/**
 * 
 */

class Test_Result
{
	private $className = '';
	private $method = '';
	private $cases = array();	//所有的测试情况
	
	public function __construct($className, $method){
		$this->className = $className;
		$this->method = $method;
	}
	
	/**
	 * 设置测试样本
	 * 
	 * @param array $cases
	 */
	public function addCases($cases){
		$this->cases = $cases;
	}
	
	public function getSuccCount(){
		$succCount = 0;
		foreach($this->cases as $case){
			$case['isSucc'] && $succCount++;
		}
	}
	
	public function getErrCount(){
		
	}
	
	/**
	 * 使用__get来是的私有属性拥有可读不可写权限
	 * 
	 * 若不存在，则返回NULL
	 * 
	 * @param string $k
	 * @return value
	 */
	public function __get($k){
		if(property_exists($this, $k)){
			return $this->$k;
		}
		return null;
	}
}