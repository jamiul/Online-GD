<?php 
 include 'lib/User.php';
 include 'inc/header.php';
 Session::checkSession();
 $user = new User(); 
?>
    <?php
$loginmsg = Session::get("loginmsg");
if (isset($loginmsg)) {
 	echo($loginmsg);
 } 
 Session::set("loginmsg",NULL);
?>
        <div class="panel panel-default">
                <h2 style="text-align: center;"><strong>Welcome !</strong>
			<?php
			$name = Session::get("name");
			if (isset($name)) {
				echo($name);
			}
			?>
			</h2><br><br>
            <div class="panel-body">

               <!--  <table class="table table-striped">
                    <th width="5%">Serial</th>
                    <th width="10%">Name</th>
                    <th width="15%">GD Type</th>
                    <th width="18%">Address</th>
                    <th width="8%">Email</th>
                    <th width="10%">Phone</th>
                    <th width="10%">Perpetrator</th>
                    <th width="14%">Place of incident</th>
                    <th width="10%">Actions</th>
                    <?php
        
					$user = new User();
					$userdata = $user->getUserData();
					    if ($userdata) {
						$i=0;
						foreach ($userdata as $sdata) {
							$i++;
					?>
                        <tr>
                            <td>
                                <?php echo $i;?>
                            </td>
                            <td>
                                <?php echo $sdata['name']?>
                            </td>
                            <td>
                                <?php echo $sdata['incident']?>
                            </td>
                            <td>
                                <?php echo $sdata['address']?>
                            </td>
                            <td>
                                <?php echo $sdata['email']?>
                            </td>
                            <td>
                                <?php echo $sdata['phone']?>
                            </td>
                            <td>
                                <?php echo $sdata['perpetrator']?>
                            </td>
                            <td>
                                <?php echo $sdata['place']?>
                            </td>
                            <td> <a class="btn btn-primary" href="profile.php?id=<?php echo $sdata['id'];
						?>">View</a> </td>
                        </tr>
                        <?php } }  else {?>
                            <tr>
                                <td>
                                    <h2>No User Data Found.....</h2></td>
                            </tr>
                            <?php } ?>
                </table>-->
            </div>
        </div>
        <?php
include 'inc/footer.php';
?>