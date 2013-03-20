<?php
/**
 * 
 */
include "shadow.php";
class Test_A extends Test
{
	public function testEqual(){
		$this->isEqual(1, 2);
	}
	
	public function testAbsluteEqual(){
		$this->isAbsluteEqual(0, false);
	}
}


$test = new Test_A;
$test->testEqual();
$test->testAbsluteEqual();

echo sprintf("succ count:%d\n", $test->getSuccCount());
echo sprintf("err count:%d\n", $test->getErrCount());

$err = $test->getErrMethods();

var_dump($err);