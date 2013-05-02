<?php


class Smarty2_Test_Smarty2 extends Test
{
	public function testEnv(){
		$smarty = new Smarty2();
		//$smarty->setCompileDir(SD_ROOT . DS . 'cache');
		$smarty->setTemplateDir(dirname(__FILE__));
		$smarty->assign('title', 'Welcome');
		
		
		$ret = $smarty->fetch('title.tpl');
		
		$ret = trim($ret);
		
		$this->isEqual('Welcome', $ret);
	}
}