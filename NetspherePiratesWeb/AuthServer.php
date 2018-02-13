<?php
	namespace NetspherePiratesWeb
	{
		use \NetspherePiratesWeb\Models\Account as Account;
		
		class AuthServer
		{
			private $database;
			
			public function __construct($database)
			{
				$this->database = $database;
			}
			
			public function get_account_by_id($id)
			{
				$result = $this->database->query('SELECT Id, Username, Nickname, Password, Salt, SecurityLevel FROM accounts WHERE Id = ?;', array($id));
				$rows = $result->rows;

				if(!empty($rows))
				{
					$account = new Account(
						$rows[0]['Id'],
						$rows[0]['Username'],
						$rows[0]['Nickname'],
						$rows[0]['Password'],
						$rows[0]['Salt'],
						$rows[0]['SecurityLevel']
					);
					
					return $account;
				}

				return NULL;
			}
			
			public function get_account_by_username($username)
			{
				$result = $this->database->query('SELECT Id, Username, Nickname, Password, Salt, SecurityLevel FROM accounts WHERE Username = ?;', array($username));
				$rows = $result->rows;
				
				if(!empty($rows))
				{
					$account = new Account(
						$rows[0]['Id'],
						$rows[0]['Username'],
						$rows[0]['Nickname'],
						$rows[0]['Password'],
						$rows[0]['Salt'],
						$rows[0]['SecurityLevel']
					);

					return $account;
				}

				return NULL;
			}

			public function save_account($account, $upsert = false)
			{
				if($account->id() == NULL && $upsert == true)
				{
					return $this->database->query('INSERT INTO accounts (Id, Username, Nickname, Password, Salt, SecurityLevel) VALUES (NULL, ?, ?, ?, ?, ?);', array($account->username(), $account->nickname(), $account->password(), $account->salt(), $account->security_level()));	
				}
				else if($account->id == NULL && $upsert == false)
				{
					die('Account doesn\'t exist.');
				}
				else
				{
					return $this->database->query('UPDATE accounts SET Username = ?, Nickname = ?, Password = ?, Salt = ?, SecurityLevel = ? WHERE Id = ?;', array($account->username(), $account->nickname(), $account->password(), $account->salt(), $account->security_level(), $account->id()));	
				}
			}
			
			public function create_account($username, $password, $nickname = NULL)
			{
				$account = new Account();
				$account->set_username($username);
				$account->set_nickname($nickname);
				$account->set_password($password);
				
				$result = $this->save_account($account, true);
				if($result->inserted_id > 0){
					return $this->get_account_by_id($result->inserted_id);
				}
				
				return NULL;
			}
		}
	}
?>