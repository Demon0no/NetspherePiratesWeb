<?php
	namespace NetspherePiratesWeb
	{
		use \NetspherePiratesWeb\Models\Player as Player;
		
		class GameServer
		{
			private $database;
			
			public function __construct($database)
			{
				$this->database = $database;
			}
			
			public function get_player_by_id($id)
			{
				$result = $this->database->query('SELECT Id, TutorialState, Level, TotalExperience, PEN, AP, Coins1, Coins2, CurrentCharacterSlot FROM players WHERE Id = ?;', array($id));
				$rows = $result->rows;
				
				if(!empty($rows))
				{
					$player = new Player(
						$rows[0]['Id'],
						$rows[0]['TutorialState'],
						$rows[0]['Level'],
						$rows[0]['TotalExperience'],
						$rows[0]['PEN'],
						$rows[0]['AP'],
						$rows[0]['Coins1'],
						$rows[0]['Coins2'],
						$rows[0]['CurrentCharacterSlot']
					);
					
					return $player;
				}

				return NULL;
			}
			
			public function save_player($player)
			{
				$this->database->query('UPDATE players SET tutorialState = ?, Level = ?, TotalExperience = ?, PEN = ?, AP = ?, Coins1 = ?, Coins2 = ?, CurrentCharacterSlot = ? WHERE Id = ?;', array($player->tutorial_state(), $player->level(), $player->total_experience(), $player->pen(), $player->ap(), $player->coins1(), $player->coins2(), $player->current_character_slot(), $player->id()));
			}
		}
	}
?>