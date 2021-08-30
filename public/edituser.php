<?php

require_once('../private/initialize.php');
require_login('edituser.php');
/*
if (!isset($_GET['id'])) {
    redirect_to(url_for('/index.php'));
}
*/
$id = $_GET['id'];
$user = User::find_by_id($id);
/*if($user == false) {
    redirect_to(url_for('/index.php'));
}
*/
if (is_post_request()) {

    $args = $_POST['users'];
    $user->merge_attributes($args);
    $result = $user->save();

    if ($result == true) {
        $_SESSION['message'] = 'The user was updated successfully!';
    }else {
      // show errors
    }
  
  } else {
  
    // display the form
  
  }


?>
<?php $page_title = 'Edit User'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<div id="content">

  <div >
    <h1>Edit Admin</h1>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('/edituser.php?id=' . h(u($id))); ?>" method="post">
    
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


      <div id="operations">
        <input type="submit" value="Edit Admin" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>