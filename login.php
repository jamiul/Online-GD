<?php 
 include 'inc/header.php';
 include 'lib/User.php';
 Session::CheckLogin(); 
?>
    <?php 
 	$user = new User();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
 		$userLogin = $user->userLogin($_POST);/*User login Method From User.php */
 	}
 ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>User Panel
			<a style="float: right;" href="admin.php" class="btn btn-success">Admin</a></h2> </div>
            <div class="panel-body">
                <div style="max-width: 600px; margin: 0 auto">
                    <?php
if (isset($userLogin))
{
	echo $userLogin;
}
?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" /> </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" /> </div>
                            <button type="submit" name="login" class="btn btn-success">Login</button>
                            <button type="reset" name="reset" class="btn btn-success">Reset</button>
                        </form>
                </div>
            </div>
        </div>
        <?php
include 'inc/footer.php';
?>