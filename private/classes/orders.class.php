<?php

class Orders extends DatabaseObject{

    static protected $table_name = 'cart';
    static protected $db_columns = ['id', 'date', 'user_id', 'status', 'games'];

    public $id;
    public $date;
    public $user_id;
    public $status;
    public $games;
 
   
  
    public function __construct() {
        $this->date = $args['date'] ?? '';
        $this->user_id = $args['user_id'] ?? '';
        $this->status = $args['status'] ?? '';
        $this->game_id = $args['games'] ?? '';
        
    }


    
    static public function find_by_user($user){
        $sql = "SELECT * FROM" . static::$table_name . " ";
        $sql .= "WHERE user_id='" . self::$database->escape_string($user) . "'";

        $obj_array = static::find_by_sql($sql);

        if(!empty($obj_array)) {
            return array_shift($obj_array);
        }
        else{
            return false;
        }
    }


}






?>