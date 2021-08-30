<?php

class Game extends DatabaseObject {
        static protected $table_name = 'Games';
        static protected $db_colums = ['id','game_name','game_type','game_price'];

       


        public $id;
        public $game_name;
        public $game_type;
        public $game_price; 
        
        public function construct($args=[]) {
                $this->game_name = $args['game_name'] ?? '';
                $this->game_name = $args['game_type'] ?? '';
                $this->game_name = $args['game_price'] ?? 0;
        }
}



?>