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
	private $succCount = 0; //成功的次数
	private $errCount = 0; //失败的次数
	private $succMethods = array(); //成功的测试点
	private $errMethods = array(); //失败的测试点
	private $caseCount = 0; //测试点的个数，= $succCount + $errCount
	
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
	 * 判断变量是否为字符串
	 * 
	 * @param mixed $v
	 */
	final protected function isString($v){
		$this->recordResult(is_string($v));
	}
	
	/**
	 * 统计结果
	 * 
	 * 1. 统计case的次数
	 * 2. 获取case的调用方法、参数等数据
	 * 3. 识别错误、成功
	 * 
	 * @param boolean $result
	 */
	final protected function recordResult($result){
		$this->caseCount++;
		$method = $this->getCallMethod();
		if($result){
			$this->succCount++;
			$this->succMethods[] = $method;
		}else{
			$this->errCount++;
			$this->errMethods[] = $method;
		}
	}
	
	final private function getCallMethod(){
		$trace = debug_backtrace();
		$method = array(
			'method' => $trace[3]['function'],
			'args' => $trace[2]['args'],
			'type' => $trace[2]['function'],
		);
		
		return $method;
	}
	
	/**
	 * 获取总的测试的次数
	 * 
	 * @return int
	 */
	final public function getCaseCount(){
		return $this->caseCount;
	}
	/**
	 * 获取失败的次数
	 * 
	 * @return int
	 */
	final public function getErrCount(){
		return $this->errCount;
	}
	
	/**
	 * 获取成功的次数
	 * 
	 * @return int
	 */
	final public function getSuccCount(){
		return $this->succCount;
	}
	
	/**
	 * 获取成功的方法
	 * 
	 * @return array
	 */
	final public function getSuccMethods(){
		return $this->succMethods();
	}
	
	/**
	 * 获取失败的方法
	 * 
	 * @return array
	 */
	final public function getErrMethods(){
		return $this->errMethods;
	}
}