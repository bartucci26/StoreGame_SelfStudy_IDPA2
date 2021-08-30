<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo h($page_title); ?></title>
    <link rel="stylesheet" media="all" href="<?php echo url_for('/css/style.css'); ?>">
</head>

<body>
    <header>
    <img  class="logo" src="<?php echo url_for('/img/logo.jpg'); ?>" alt="">
        <h1>Game Store</h1>
    </header> 

    <nav>
        <ul>
            <?php if($session->is_logged_in()){ 
                    $id = $_SESSION['user_id'];
                    $name = User::find_by_id($id);
                ?>

           
            <li><a href="<?php echo url_for('/games.php'); ?>">Games</a></li>
            <li><a href="<?php echo url_for('/cart.php'); ?>">Cart</a></li>
            
            <li>
                <div class="dropdown">
                    <button class="dropbtn"> <img src="<?php echo url_for('/img/user.png'); ?>" alt=""><?php echo h($name->username); ?> </button>
                    <div class="dropdown-content">
                        <a href="<?php echo url_for('/edituser.php?id=' . h(u($id))); ?>"> Edit user</a>
                        <a href="<?php echo url_for('/logout.php'); ?>"> Logout</a>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </nav>

<?php echo display_session_message(); ?>