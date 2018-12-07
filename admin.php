<?php 
 include 'inc/adminheader.php';
 include 'lib/User.php';
 Session::CheckLogin(); 
?>
 <?php 
  $user = new User();
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $adminLogin = $user->adminLogin($_POST);/*asminLogin method from User.php*/
  }
 ?>
   

     <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Admin Panel</h2>
      
    </div>
      <div class="panel-body">
          <div style="max-width: 600px; margin: 0 auto">
          <?php
if (isset($adminLogin)) {
  echo $adminLogin;
}
?>
        <form action="" method="POST">
        <div class="form-group">
          <label for="name">User Name</label>
          <input type="name" id="name" name="name" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control"/>
        </div>
          <button type="submit" name="login" class="btn btn-success">Login</button>
          <button type="reset" name="reset" class="btn btn-success">Reset</button>
        </form>
        </div>
      </div>
    </div>



<?php
include 'inc/footer.php';
?>