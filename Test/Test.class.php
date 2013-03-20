<?php
/**
 * 测试的基类
 * 
 * 1. 识别相等行为
 * 2. 识别全等行为
 * 3. 识别数组的相等和全等
 * 4. 识别类型判断
 * 5. 给出统计数据和接口
 */

class Test
{
	private $cases = array(); //获取所有的测试
	
	public function __construct(){}
	
	/**
	 * 判断是否相等
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 */
	final protected function isEqual($a, $b){
		$this->recordResult($a == $b);
	}
	
	/**
	 * 判断是否全等
	 * 
	 * @param mixed $a
	 * @param mixed $b
	 */
	final protected function isAbsluteEqual($a, $b){
		$this->recordResult($a === $b);
	}
	
	/**
	 * 判断变量的类型是否为所给的类型
	 * 
	 * @param mixed $v
	 * @param string $type
	 */
	final protected function isType($var, $type){
		switch ($type){
			case "num":
				$type = 'numeric'; break;
			case "str":
				$type = "string"; break;
		}
		$func = "is_" . $type;
		$this->recordResult($func($var));
	}
	
	/**
	 * 统计结果
	 * 
	 * 1. 统计case的结果
	 * 
	 * @param boolean $result
	 */
	final protected function recordResult($result){
		$method = $this->getCallMethod();
		$case = array(
			'isSucc' => $result,
			'method' => $method,
		);
		$this->cases[] = $case;
	}
	
	/**
	 * 获取调用的方法
	 * 
	 * @return array
	 */
	final private function getCallMethod(){
		$trace = debug_backtrace();
		$method = array(
			'method' => $trace[3]['function'],
			'args' => $trace[2]['args'],
			'type' => $trace[2]['function'],
		);
		
		//$method = new Test_Method();
		
		return $method;
	}
	
	/**
	 * 获取总的测试的次数
	 * 
	 * @return int
	 */
	final public function getCaseCount(){
		return count($this->cases);
	}
	
	/**
	 * 获取所有的case
	 */
	final public function getAllCases(){
		return $this->cases;
	}
	
	/**
	 * 重置
	 * 
	 */
	final public function reset(){
		$this->cases = array();
	}
}