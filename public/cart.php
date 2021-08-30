<?php

require_once('../private/initialize.php');


if(is_ajax_request() && isset($_POST['add_id'])) {

    $id = $_POST['add_id'];

    $session->add_cart($id);
    $id = '';
}
if(is_ajax_request() && isset($_POST['delete_id'])) {

    $id = $_POST['delete_id'];

    $session->delete_cart($id);
    $id = '';
}
?>



    <table id="shop_cart">
    
        <tr>
            <th>Game</th>
            <th>Price</th>
            <th>&nbsp;</th>

        </tr>
    


<?php

 foreach ($_SESSION['cart'] as $id=>$quantity) {
  $games = Game::find_by_id($id);

?>

        <tr>
            <td><?php echo $games->game_name;?></td>
            <td>€<?php echo $games->game_price*$quantity;?></td>
            <td id="<?php echo $games->id; ?>"><button class="deletecart">Delete From Cart</button></td>

                
        </tr> 

        <?php } ?>
        <tr>
          <td>Total:</td>
          <td>€<?php echo $session->total_price() ?></td>
         
        
        </tr>
<?php 
    $id = $_SESSION['user_id'];
    $user = User::find_by_id($id);
    if (isset($_POST['btn-odr'])) {
    
    $items = [];
    $itemsString = "";

    foreach ($_SESSION['cart'] as $key => $value) {
        $games = Game::find_by_id($key);
        $items = [$games->game_name] = $value;
        $itemsString.= $games->game_name . ":" .$value. "|";

    }
    
    $date = date("d/m/Y H:i:s");
    $finalorder = [];
    $finalorder['date'] = $date;
    $finalorder['user_id'] = $user->id;
    $finalorder['status'] = 'Order Placed';
    $finalorder['games'] = $itemsString;



    $order = new Orders($finalorder);
    $ordercreated = $order->save();

    if ($ordercreated === true) {
       $session->finalOrder();
       $_SESSION['message'] = 'Enjoy your new games!';
    } else {
        $_SESSION['message'] = 'Your order couldnt be placed';
    }
}

?>

        <form action="cart.php" method="post">
            <input name="btn-odr" type="submit" value="Finalize order">
        </form>
        
        

        

    </table>




