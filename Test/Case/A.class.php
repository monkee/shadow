<?php
/**
 * 
 */

class Test_Case_A extends Test
{
	public function testA(){
		$this->isEqual(1, true);
		$this->isEqual(0, false);
	}
	
	public function testB(){
		$this->isAbsluteEqual(1, 1);
		$this->isAbsluteEqual(2, true);
	}
}