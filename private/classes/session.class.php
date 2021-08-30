<?php

class Session  {
    private $user_id;
    public $cart=[];

    public function __construct()       // automatically check when the user log in
    {
        session_start();
        $this->check_stored_login();
    }

    public function login($user) {
        if ($user) {
            $this->cart = $_SESSION['cart'];
            session_regenerate_id(); // protect against session fixation attacks(it regenerates the session each time someone log in)
            $_SESSION['user_id'] = $user->id; //<-stored in the session
            $_SESSION['cart'] = $this->cart;
            $this->user_id = $user->id; // <- keep track of the properties
        }
        return true;
    }

    public function is_logged_in() {
        return isset($this->user_id); //just check if the user isset or not
    }
    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        return true;
    }

    private function check_stored_login() {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
        }
    }

    public function add_cart($id){
        if (array_key_exists($id,$_SESSION['cart'])) {
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
        }
    }
    public function delete_cart($id){
        if ($_SESSION['cart'][$id]> 1) {
            $_SESSION['cart'][$id]--;
        } else {
            unset($_SESSION['cart'][$id]);
        }
    }
    public function total_price() {
        $final_price = 0;
        if (isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $key => $value) {
                $games = Game::find_by_id($key);
                $final_price = $final_price + $games->game_price * $value;
            }
        }
        return $final_price;
    }
    public function finalOrder(){
        $this->cart = $_SESSION['cart'] = array();
    }
}

?>