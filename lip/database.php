<?php 
class database{
	private $host = db_host;
	private $user = db_user;
	private $pass = db_pass;
	private $dbname= db_name;

	private $dbh;//database handler
	private $error;
	private $stmt;//in the class scope means has all the changes which happens in the funcs

	public function __construct()
	{
		//set dsn
		$dsn='mysql:host='.$this->host. ';dbname=' . $this->dbname;
		$options = array(
			PDO::ATTR_PERSISTENT =>	true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		//pdo instance
		try
		{
			$this->dbh = new pdo($dsn,$this->user,$this->pass,$options);
		}
		catch(PDOException $e)
		{
			$this->error= $e->getMessage();
		}
	}

	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param , $value, $type= null)
	{
		if(is_null($type))
		{
			switch (true) {
				case is_int($value):
					$type=PDO::PARAM_INT;
					break;

				case is_bool($value):
					$type=PDO::PARAM_BOOL;
					break;

				case is_null($value):
					$type=PDO::PARAM_NULL;
					break;
				
				default:
					$type=PDO::PARAM_STR;
					
			}
		}
		$this->stmt->bindValue($param,$value,$type);
		//bindValue is like bindParam

	}
	public function execute()
	{
		return $this->stmt->execute();	
	}
	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function single()//to fetch single result
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

}