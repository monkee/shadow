<?php
/**
 * class Sample 的测试类
 */

class Sample_Test_Sample extends Test
{
	public function testGetMyName(){
		$sample = new Sample();
		$this->isEqual("Monkee", $sample->getMyName());
		$this->isAbsluteEqual("Monkee", $sample->getMyName());
	}
	
	public function testGetMyAge(){
		$sample = new Sample();
		$this->isEqual(128, $sample->getMyAge());
		$this->isAbsluteEqual(128, $sample->getMyAge());
	}
	
	public function testIsMale(){
		$sample = new Sample();
		$this->isEqual(true, $sample->isMale());
		$this->isAbsluteEqual(true, $sample->isMale());
	}
	
	public function testIsLikeGirl(){
		$sample = new Sample();
		$this->isEqual(true, $sample->doLikeGirl());
		$this->isAbsluteEqual(true, $sample->doLikeGirl());
	}
}