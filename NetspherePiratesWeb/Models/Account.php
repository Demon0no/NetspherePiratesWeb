<?php
	namespace NetspherePiratesWeb\Models
	{		
		class Account
		{			
			private $id;
			private $username;
			private $nickname;
			private $password;
			private $salt;
			private $security_level;

			public function id()
			{
				return $this->id;
			}
			
			public function username()
			{
				return $this->username;
			}
			public function set_username($username)
			{
				$this->username = $username;
			}
			
			public function nickname()
			{
				return $this->nickname;
			}
			public function set_nickname($nickname)
			{
				$this->nickname = $nickname;
			}
			
			public function password()
			{
				return $this->password;
			}
			public function check_password($password)
			{
				return \NetspherePiratesWeb\Crypt::check_password($password, $this->password, $this->salt);
			}
			public function set_password($password)
			{
				$password = \NetspherePiratesWeb\Crypt::create_password($password);
				$this->password = $password->hash;
				$this->salt = $password->salt;
			}
			
			public function salt()
			{
				return $this->salt;
			}
			
			public function security_level()
			{
				return $this->security_level;
			}
			public function set_security_level($security_level)
			{
				$this->security_level = $security_level;
			}
			
			public function __construct($id = NULL, $username = NULL, $nickname = NULL, $password = NULL, $salt = NULL, $security_level = NULL)
			{
				$this->id = $id;
				$this->username = $username;
				$this->nickname = $nickname;
				$this->password = $password;
				$this->salt = $salt;
				$this->security_level = $security_level;
				if($this->security_level == NULL)
				{
					$this->security_level = \NetspherePiratesWeb\Constants::$security_levels['User'];
				}
			}
		}
	}
?>