<?php
/**
 * ini文件读取类
 * 
 * 1. 对基本的ini文件的读取
 * 2. 在shadow中我们对此进行扩展
 * 3. 结合shadowe的情况给出特殊处理
 * 
 * @author monkee
 * 
 * @todo 一个ini文件如何只被解析一次？
 * @todo 不同的地方调用的类情况下，ini文件也能保证只被解析一次
 */
ini_set('track_errors', 1);
class Ini
{
	/**
	 * INI文件地址
	 * 
	 * @var string
	 */
	private $iniFile = null;
	/**
	 * 
	 * Enter description here ...
	 * @param string $iniFile
	 */
	public function __construct($iniFile = ''){
		$this->iniFile = $iniFile;
	}
	
	/**
	 * 解析，并返回解析结果
	 * 
	 * @return array
	 * 
	 * @throws SDException
	 */
	public function parse(){
		$conf = @parse_ini_file($this->iniFile, true);
		if(false === $conf){
			throw new SDException($php_errormsg);
		}
		return $conf;
	}
}


