<?php 
 include 'inc/header.php';
 include 'lib/User.php'; 
?>
    <?php 
 	$user = new User();
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
 		$userRegi = $user->userRegistration($_POST);
 	}
 ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Fill Up the GD Form</h2> </div>
            <div class="panel-body">
                <div style="max-width: 600px; margin: 0 auto">
                    <?php
if (isset($userRegi)) {
	echo $userRegi;
}
?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Name of Victim</label>
                                <input type="text" id="name" name="name" class="form-control" /> </div>
                            <div class="form-group">
                                <label for="username">National ID No. of Victim</label>
                                <input type="text" id="username" name="nid" class="form-control" /> </div>
                            <div class="form-group">
                                <label for="name">Address</label>
                                <input type="text" id="text" name="address" class="form-control" /> </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" /> </div>
                            <div class="form-group">
                                <label for="phone">Phone No</label>
                                <input type="text" id="text" name="phone" class="form-control" /> </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" /> </div>
                            <div class="form-group">
                                <h2>When did this event occur?</h2>
                                <label for="text">Date</label>
                                <input type="date" id="text" name="date" min="2000-01-02" class="form-control" />
                                <label for="text">Name of the perpetrator</label>
                                <input type="text" id="text" name="perpetrator" class="form-control" /> </div>
                            <div class="form-group">
                                <h2>Information about the perpetrator</h2>
                                <label for="name">GD Type</label>
                                <select class="form-control" name="incident">
                                    <option value="select">--Select--</option>
                                    <option value="Eve Teasing">Eve Teasing</option>
                                    <option value="Snatching">Snatching</option>
                                    <option value="loss/theft of certificate, ID and documents">loss/theft of certificate, ID and documents</option>
                                    <option value="Night Guard, Guard, Servant, Carettaker">Night Guard, Guard, Servant, Carettaker</option>
                                    <option value="new/old tenants">new/old tenants</option>
                                    <option value="Expatriate Problems/Complains">Expatriate Problems/Complains</option>
                                </select>
                                <label for="name">Details of the incident</label>
                                <textarea class="form-control" rows="5" name="description" id="comment"></textarea>
                                <label for="name">Place of incident</label>
                                <input type="text" id="text" name="place" class="form-control" /> </div>
                            <button type="submit" name="register" class="btn btn-success">Submit</button>
                            <button type="reset" name="reset" class="btn btn-success">Reset</button>
                        </form>
                </div>
            </div>
        </div>
        <?php
include 'inc/footer.php';
?>