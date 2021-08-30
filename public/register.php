<?php
require_once('../private/initialize.php');

    if(is_post_request()) {
        $args = $_POST['users'];
        $user = new User($args);
      
        $result = $user->save();

        if($result === true) {
            $new_id = $user->id;
            $_SESSION['message'] = 'Account created successfully!';
            redirect_to(url_for('/login.php'));
        } else {
            // show errors
          }
        
        } else {
          // display the form
          $user = new User;
        }


?>
<div id="signup">

    <a class="action" id="back" href="<?php echo url_for('/login.php'); ?>">&laquo; Back to Login</a>
    <h1>Register</h1>

    <?php echo display_errors($user->errors); ?>


    <form action="<?php echo url_for('/register.php'); ?>" method="post">

        <dl>
            <dt>Username</dt>
            <dd><input type="text" name="users[username]" value=""></dd>
        </dl>
        
        <dl>
            <dt>First name</dt>
            <dd><input type="text" name="users[first_name]" value=""></dd>
        </dl>
        
        <dl>
            <dt>Last name</dt>
            <dd><input type="text"name="users[last_name]" value=""></dd>
        </dl>
        
        <dl>
            <dt>Email</dt>
            <dd><input type="text" name="users[email]" value=""></dd>
        </dl>
        <dl>
            <dt>Street name</dt>
            <dd><input type="text" name="users[streetname]" value=""></dd>
        </dl>
        
        <dl>
            <dt>Password</dt>
            <dd><input type="password"  name="users[password]" value=""></dd>
        </dl>
        
        <dl>
            <dt>Confirm Password</dt>
            <dd><input type="password" name="users[confirm_pass]" value=""></dd>
        </dl>
        <div>
            <input type="submit" value="Submit" >
        </div>

    </form>
</div>