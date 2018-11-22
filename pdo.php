<?php 

class Pdobase extends PDO
{
	protected $pdo;
	public $link;

	public function __construct()
	{
		$this->pdo = "mysql:dbname=toutiao;host=127.0.0.1";
		$this->link = new PDO($this->pdo, 'root');
		$this->link->query('set names utf8;');
	}

	/**
	* 执行一条sql语句
	* @return int 影响行数
	* @author <Mr.cheng>
	*/
	public function select($sql)
	{
		$count = $this->link->exec($sql);
		return $count;
	}

	/**
     *	查询
	 */
	public function query($sql)
	{
		$result = $this->link->query($sql);	
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
}
$obj = new Pdobase();
var_dump($obj->query('select * from channel'));