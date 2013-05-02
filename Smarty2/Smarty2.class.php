<?php

require_once(dirname(__FILE__) . DS . 'Smarty.class.php');


class Smarty2 extends Smarty
{
	public function __construct(){
		$this->setCompileDir(SD_ROOT . DS . 'cache');
		parent::__construct();
	}
}

