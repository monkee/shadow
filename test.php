<?php
/**
 * 
 */
include "shadow.php";

$testClass = '';
if(!empty($argv)){
	$testClass = $argv[1];
}elseif(!empty($_GET)){
	$testClass = $_GET['test'];
}

if(empty($testClass)){
	throw new SDException("Usage php test.php [test class name] OR test.php?test=[test class name]");
}

$test = new Test_Manage($testClass);

$ret = $test->exec();

foreach($ret as $result){
	echo sprintf("## %s::%s\n", $result->className, $result->method);
	foreach($result->cases as $case){
		echo sprintf("\t%s => %s\n", $case['method']['type'], $case['isSucc'] ? 'succ' : 'err');
	}
	echo "\n";
}