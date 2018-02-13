<?php	
	namespace NetspherePiratesWeb
	{
		use PDO;
		use stdClass;
		
		class Database
		{
			private $pdo;

			public function __construct($hostname, $database, $username, $password)
			{
				$this->pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
			}

			public function query($statement, $values = null)
			{
				$stmt = $this->pdo->prepare($statement);

				if($values == null)
				{
					$stmt->execute();
				}
				else
				{
					$stmt->execute($values);
				}

				$rows = array();
				while($row = $stmt->fetch()){
					array_push($rows, $row);
				}

				$result = new stdClass;
				$result->rows = $rows;
				$result->inserted_id = $this->pdo->lastInsertId();
				
				return $result;
			}
		}
	}
?>