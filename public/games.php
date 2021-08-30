<?php 
    require_once('../private/initialize.php');

$page_title = 'Games';

$type_id = isset($_GET['type_id']) ? (int) $_GET['type_id'] : 0;

$types = ['all','RPG','MMORPG','Action','Adventure'];

$type = $types[$type_id];
$games = Game::find_all();
?>

<div class="container">
    
    <div class="main">
        <table>
            <tr>
                <th>Game</th>
                <th>Type</th>
                <th>Price</th>
                <th>Add to Cart</th>
            </tr>


 
        <?php foreach($games as $gamer) {
            if ($type != 'all') {
                if ($gamer->game_type == $type) {
            
              
            ?>

      
        <tr>
            <td><?php echo $gamer->game_name;?></td>
            <td><?php echo $gamer->game_type;?></td>
            <td><?php echo $gamer->game_price;?></td>
            <td id="<?php echo $gamer->id;  ?>"><button  class="addcart">Add to Cart</button></td>
        </tr>

        <?php }} else { ?>
            <tr>
            <td><?php echo $gamer->game_name;?></td>
            <td><?php echo $gamer->game_type;?></td>
            <td><?php echo $gamer->game_price;?></td>
            <td id="<?php echo $gamer->id; ?>"><button   class="addcart">Add to Cart</button></td>
        </tr>
        <?php }} ?>
        </table>
    </div>

</div>