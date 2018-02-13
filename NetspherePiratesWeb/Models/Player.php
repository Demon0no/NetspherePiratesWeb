<?php
	namespace NetspherePiratesWeb\Models
	{		
		class Player
		{
			private $id;
			private $tutorial_state;
			private $level;
			private $total_experience;
			private $pen;
			private $ap;
			private $coins1;
			private $coins2;
			private $current_character_slot;
			
			public function id()
			{
				return $this->id;
			}
			
			public function tutorial_state()
			{
				return $this->tutorial_state;
			}
			
			public function level()
			{
				return $this->level;
			}
			
			public function total_experience()
			{
				return $this->total_experience;
			}
			
			public function pen()
			{
				return $this->pen;
			}
			public function set_pen($pen)
			{
				$this->pen = $pen;
			}
			public function add_pen($pen)
			{
				$this->pen += $pen;
			}
			public function remove_pen($pen)
			{
				$this->pen -= $pen;
			}
			
			public function ap()
			{
				return $this->ap;
			}
			public function set_ap($ap)
			{
				$this->ap = $ap;
			}
			public function add_ap($ap)
			{
				$this->ap += $ap;
			}
			public function remove_ap($ap)
			{
				$this->ap -= $ap;
			}
			
			public function coins1()
			{
				return $this->coins1;
			}
			public function set_coins1($coins)
			{
				$this->coins1 = $coins;
			}
			public function add_coins1($coins)
			{
				$this->coins1 += $coins;
			}
			public function remove_coins1($coins)
			{
				$this->coins1 -= $coins;
			}
			
			public function coins2()
			{
				return $this->coins2;
			}
			public function set_coins2($coins)
			{
				$this->coins2 = $coins;
			}
			public function add_coins2($coins)
			{
				$this->coins2 += $coins;
			}
			public function remove_coins2($coins)
			{
				$this->coins2 -= $coins;
			}
			
			public function current_character_slot()
			{
				return $this->current_character_slot;
			}
			
			public function __construct($id = NULL, $tutorial_state = NULL, $level = NULL, $total_experience = NULL, $pen = NULL, $ap = NULL, $coins1 = NULL, $coins2 = NULL, $current_character_slot = NULL)
			{				
				$this->id = $id;
				$this->tutorial_state = $tutorial_state;
				$this->level = $level;
				$this->total_experience = $total_experience;
				$this->pen = $pen;
				$this->ap = $ap;
				$this->coins1 = $coins1;
				$this->coins2 = $coins2;
				$this->current_character_slot = $current_character_slot;
			}
		}
	}
?>