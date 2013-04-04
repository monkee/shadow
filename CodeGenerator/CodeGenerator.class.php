<?php
/**
 * 代码生成器
 * 
 * 将普通的变量，转化为可以直接引用的PHP代码
 * 
 * @author monkee
 */
class CodeGenerator
{
	const TAB = "\t"; //TAB键的定义，可以定义为四个空格。如果考虑效率，可以定义为空。
	
	/**
	 * 要进行转义的字符串集合
	 * 
	 * @var array
	 */
	static private $escape = array(
		"\\" => "\\\\",
		"\t" => "\\t",
		"\n" => "\\n",
		"\r" => "\\r",
		"\"" => "\\\"",
		"\'" => "\\\'",
	);
	/**
	 * 将变量转化为字符串
	 * 
	 * @param mixed $var 要转化的变量
	 * @return string
	 */
	static public function convVarToString($var){
		$str = self::convVarToStringForItem($var);
		$str .= ';';
		return $str;
	}
	
	/**
	 * 递归地将变量转为字符串
	 * 
	 * @param array $var
	 * @param int $indent 默认为0
	 * 
	 * @return string
	 * 
	 * @throws SDException
	 */
	static private function convVarToStringForItem($var, $indent = 0){
		if(is_array($var)){
			$str = "array(\n";
			foreach($var as $k => $v){
				$k = is_int($k) ? $k : '"' . self::escape($k) . '"';
				$str .= sprintf("%s%s => %s,\n", str_repeat(self::TAB, $indent + 1), $k, self::convVarToStringForItem($v, $indent + 1));
			}
			$str .= str_repeat(self::TAB, $indent) . ")";
			return $str;
		}elseif(is_numeric($var)){
			return strval($var);
		}elseif(is_string($var)){
			return sprintf("\"%s\"", self::escape($var));
		}elseif(is_null($var)){
			return "NULL";
		}elseif(is_bool($var)){
			return $var ? "TRUE" : "FALSE";
		}else{
			throw new SDException(sprintf("Useless var %s", gettype($var)));
		}
	}
	
	/**
	 * 将变量转化为可以直接引入的文件
	 * 
	 * @param mixed $var 要转化的变量
	 * @param string $file 要写入的文件
	 * 
	 * @throws SDException
	 */
	static public function convVarToFile($var, $file){
		$str = self::convVarToString($var);
		$l = strlen($str);
		if($l > file_put_contents($file, $str)){
			throw new SDException("Write to file {$file} failed");
		}
	}
	
	/**
	 * 将字符串转义，以便于进行打印
	 * 
	 * 理论上，addslashes满足需求，但是，我还是想让打印出的内容更好看一些
	 * 这里没有对字符集做处理，也就是说，这是字符集不安全的
	 * 
	 * @param string $str
	 * @return string
	 */
	static private function escape($str){
		return str_replace(array_keys(self::$escape), self::$escape, $str);
	}
}