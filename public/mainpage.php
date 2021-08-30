<?php 
    require_once('../private/initialize.php');

 $page_title = 'Games';
 include(SHARED_PATH . '/header.php');

?>
<div id="cart">
    <?php include('cart.php'); ?>
</div>
<div class="game-type">
        <p>Type:</p>
        <select name="" id="type_select">
            <option value="0" selected> All</option>
            <option value="1">RPG</option>
            <option value="2">MMORPG</option>
            <option value="3">Action</option>
            <option value="4">Adventure</option>
        </select>

        <div onload="filterType();" id="game_overview"></div>
    </div>

    

<script src="<?php echo url_for('js/main.js')?>"></script>