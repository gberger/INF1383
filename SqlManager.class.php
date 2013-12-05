<?php

	/**
	 * @author João Pedro Pinheiro
	 * @version 1.0
	 * 
	 */
	
	class SqlManager
	{
		private $conn;
		
		public function __construct ()
		{
			
			$user = "postgres";
			$host = "localhost";
			$pass = "cadvol";
			$name = "cadvol";
			$type = "pgsql";
			$port = "5432";
			
			if(gethostname() === 'gberger-xps'){
				$pass = "senha123";
				$port = "54322";
			}

			if(URL_PREFIX != '') {
				$name = 'db60';
				$user = 'bd1grupo15';
				$pass = 'bd1grupo15./123';
			}
			
			try
			{
				switch ( $type )
				{
					case "pgsql":
						$this->conn = new PDO ("pgsql:host={$host};port={$port};dbname={$name}",$user,$pass);
						break;
					case "mysql":
						$this->conn = new PDO ("mysql:host={$host};dbname={$name}",$user,$pass);
						break;
					case "sqlite":
						$this->conn = new PDO ("sqlite:{$name}");
						break;
					case "ibase":
						$this->conn = new PDO ("firebird:dbname={$name}",$user,$pass);
						break;
					case "oci8":
						$this->conn = new PDO ("oci:dbname={$name}",$user,$pass);
						break;
					case "mssql":
						$this->conn = new PDO ("mssql:host={$host},{$port};dbname={$name}",$user,$pass);
						break;
				}
			}
			catch ( Exception $e )
			{
				echo $e->getFile() . "<br/>" . "Line: " . $e->getLine() . "<br/>" . $e->getMessage() 
								   . "<br/>" . "<a href=\"javascript:history.go(-1)\">Voltar</a>";
				exit();
			}
		}
		
		public function executeRead ( $query )
		{
			try
			{
				$result = $this->conn->query($query);
				if($result == false) var_dump($this->conn->errorInfo());
				return $result;
			}
			catch ( Exception $e)
			{
				echo $e->getFile() . "<br/>" . "Line: " . $e->getLine() . "<br/>" . $e->getMessage() 
								   . "<br/>" . "<a href=\"javascript:history.go(-1)\">Voltar</a>";
				exit();
			}
		}
		
		public function executeCommand ( $query )
		{
			try
			{
				$affectedLines = $this->conn->exec($query);
				if($affectedLines == 0) var_dump($this->conn->errorInfo());
				return $affectedLines;
			}
			catch ( Exception $e)
			{
				echo $e->getFile() . "<br/>" . "Line: " . $e->getLine() . "<br/>" . $e->getMessage() 
								   . "<br/>" . "<a href=\"javascript:history.go(-1)\">Voltar</a>";
				exit();
			}
		}
		
		public function closeConnection()
		{
			$this->conn = null;
		}
	}
?>