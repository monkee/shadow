<?php
/**
 * shadow类库的基本使用类
 * 
 * 1. 为类库提供使用指南和说明
 * 
 * @author monkee<zomboo1@126.com>
 * @copyright 2013-2014
 * @package shadow
 * @version 0.1.0
 */

include "shadow.php";

$test = new Test_Manage("Test_Case_A");

$ret = $test->exec();

foreach($ret as $result){
	echo sprintf("## %s::%s\n", $result->className, $result->method);
	foreach($result->cases as $case){
		echo sprintf("\t%s => %s\n", $case['method']['type'], $case['isSucc'] ? 'succ' : 'err');
	}
	echo "\n";
}