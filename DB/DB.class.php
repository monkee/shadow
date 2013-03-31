<?php
/**
 * DB连接管理
 */

class DB
{
	private static $cache = array();	//连接池
	private static $conf = array();	//配置
	private $conn = null; //mysqli 对象
	
	/**
	 * 获取数据
	 * 
	 * @param string $sql 查询的sql
	 * @return array
	 */
	public function select($sql){
		$query = $this->query($sql);
		$rows = array();
		while(($row = $query->fetch_assoc())){
			$rows[] = $row;
		}
		return $rows;
	}
	
	/**
	 * 执行mysqli对应的方法
	 * 
	 * 参考mysqli手册
	 * 
	 * @param string $method
	 * @param array $argvs
	 * @throws SDException
	 */
	public function __call($method, $argvs){
		if(method_exists($this->conn, $method)){
			return call_user_func_array(array($this->conn, $method), $argvs);
		}else{
			throw new SDException("Method {$method} is not exists");
		}
	}
	/*******************************
	 * PRIVATE METHODS
	 * *****************************
	 */
	/**
	 * 初始化DB，使用mysqli连接
	 * 
	 * @param string $conn 连接的标识
	 */
	private function __construct($conn){
		$conf = $this->getConf($conn);
		$this->conn = new mysqli(
			$conf['host'], $conf['user'], $conf['pw'], $conf['dbname'], $conf['port']
		);
		if($this->conn->errno > 0){
			//....
		}
		$this->conn->set_charset($conf['charset']);
	}
	
	/**
	 * 获取配置
	 * 
	 * @param string $conn 配置的连接器
	 * @return array
	 * @throws SDException
	 */
	private function getConf($conn){
		if(empty(self::$conf)){
			$ini = dirname(__FILE__) . DS . "conf" . DS . "mysql.ini";
			self::$conf = Ini::parse($ini);
		}
		
		if(empty(self::$conf[$conn])){
			throw new SDException("DB {$conn} is not configured");
		}
		return self::$conf[$conn];
	}
	
	/**
	 * 初始化DB连接
	 * 
	 * @param string $conn 连接的标识
	 * @return DB
	 */
	static public function instance($conn){
		if(empty(self::$cache[$conn])){
			self::$cache[$conn] = new DB($conn);
		}
		return self::$cache[$conn];
	}
	
}