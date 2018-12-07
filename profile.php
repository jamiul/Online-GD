<?php
  include 'lib/User.php'; 
 include 'inc/header.php'; 
 Session::checkSession();
?>
    <?php
if (isset($_GET['id'])) {
 	$userid = (int)$_GET['id'];
 } 
 	$user = new User();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
 		$updateusr = $user->updateUserData($userid,$_POST);
 	}
 ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>User Profile<span class="pull-right"><a class="btn btn-primary" href="main.php">Back</a>
			</span>
			</h2> </div>
            <div class="panel-body">
                <div style="max-width: 600px; margin: 0 auto">
                    <?php
			    if (isset($updateusr)) {
			    	echo($updateusr);
			    }
			    ?>
                        <?php
			    $userdata = $user->getUserById($userid);
			    if ($userdata) {
			    ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <h3>Status&nbsp;<a class="btn btn-info" href="#"><?php echo($userdata->status);?></a>
                                    </h3> </div>
                                <div class="form-group">
                                    <label for="name">Your Name</label> <span><?php echo($userdata->name); ?></span></div>
                                <div class="form-group">
                                    <label for="incident">GD Type</label>
                                    <input type="text" id="incident" name="incident" class="form-control" value="<?php echo($userdata->incident); ?>" /> </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" id="description" name="description" class="form-control" value="<?php echo($userdata->description); ?>" /> </div>
                                <div class="form-group">
                                    <label for="text">Address</label>
                                    <input type="text" id="text" name="address" class="form-control" value="<?php echo($userdata->address); ?>" /> </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" value="<?php echo($userdata->email); ?>" /> </div>
                                <div class="form-group">
                                    <label for="text">Phone</label>
                                    <input type="text" id="text" name="phone" class="form-control" value="<?php echo($userdata->phone); ?>" /> </div>
                                <div class="form-group">
                                    <label for="text">Perpetrator</label>
                                    <input type="text" id="text" name="perpetrator" class="form-control" value="<?php echo($userdata->perpetrator); ?>" /> </div>
                                <div class="form-group">
                                    <label for="text">Place</label>
                                    <input type="text" id="text" name="place" class="form-control" value="<?php echo($userdata->place); ?>" /> </div>
                                <?php
				$sesId = Session::get("id");
				if ($userid == $sesId) {
				?>
                                    <button type="submit" name="update" class="btn btn-success">Update</button>
                                    <?php } ?>
                            </form>
                            <?php } ?>
                </div>
            </div>
        </div>
        <?php
include 'inc/footer.php';
?>