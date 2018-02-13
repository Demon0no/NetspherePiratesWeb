# NetspherePiratesWeb

Manage NetspherePirates Accounts through PHP.

### Requirements
Webserver with PHP >=6  
or for servers where only PHP 5.X is available: https://github.com/paragonie/random_compat

### Basic Example

```php
// require_once 'include/random_compat/random.php'; // only needed if you run php version 5.X

require_once 'include/NetspherePiratesWeb/Autoloader.php';
use \NetspherePiratesWeb\AuthServer as AuthServer;
use \NetspherePiratesWeb\GameServer as GameServer;
use \NetspherePiratesWeb\Database as Database;

$auth_database = new Database(
	'HOST_HERE',
	'AUTH_DATABASE_HERE',
	'DATABASE_USER_HERE',
	'PASSWORD_HERE'
);

$game_database = new Database(
	'HOST_HERE',
	'GAME_DATABASE_HERE',
	'DATABASE_USER_HERE',
	'PASSWORD_HERE'
);

$auth_server = new AuthServer($auth_database);
$game_server = new GameServer($game_database);
```

### Create an account

With nickname... 
```php
$auth_server->create_account('username', 'password', 'nickname');
```

...or without (so the user can choose his/her nickname on first ingame login)
```php
$auth_server->create_account('username', 'password');
```

The function returns either the new account object, or NULL (if an account with the username already exists).

### Get account info

By id...
```php
$account = $auth_server->get_account_by_id(1);
```

...or by username
```php
$account = $auth_server->get_account_by_username('EpitaphHaseo');
```

Then you can get the values like this
```php
$account->id();
$account->username();
$account->nickname();
$account->password(); // salted and hashed
$account->salt(); // the salt used in the password
$account->security_level(); // one of the values in \NetspherePiratesWeb\Constants::$security_levels
```

### Get player info

```php
$player = $game_server->get_player_by_id(1);

$player->id();
$player->tutorial_state();
$player->level();
$player->total_experience();
$player->pen();
$player->ap();
$player->coins1();
$player->coins2();
$player->current_character_slot();
```