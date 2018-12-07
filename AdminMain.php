<?php 
include 'inc/adminheader.php';
 include 'lib/User.php';
 
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
            <div class="panel-heading">
                <h2>User list<span class="pull-right"><strong>Welcome !</strong>
      <?php
      $name = Session::get("name");/*Login message will be /show*/
      if (isset($name)) {
        echo($name);
      }
      ?></span>
      </h2>
                <h4 style="text-align:center">
                    <?php
if (isset($_GET['msg'])) {
   echo "<span style='color:red;'>".$_GET['msg']."</span>";/*Error message will
   be Show*/
 } 
?> </h4> </div>
            <div class="panel-body" width="100%">
                <table class="table table-striped">
                    <th width="10%">Serial</th>
                    <th width="10%">Name</th>
                    <th width="5%">Type</th>
                    <th width="20%">Address</th>
                    <th width="10%">Email</th>
                    <th width="10%">Phone</th>
                    <th width="10%">Perpetrator</th>
                    <th width="10%">Place of incident</th>
                    <th width="10%">Actions</th>
                    <?php
          $user = new User();/*$user object created*/
          $userdata = $user->getUserData();/*getUserData() method call*/
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
                                <?php echo $sdata['date']?>
                            </td>
                            <td> <a class="btn btn-primary" href="update.php?id=<?php echo $sdata['id'];
            ?>">View</a> </td>
                        </tr>
                        <?php } } else {?>
                            <tr>
                                <td>
                                    <h2>No User Data Found.....</h2></td>
                            </tr>
                            <?php } ?>
                </table>
            </div>
        </div>
        <?php
include 'inc/footer.php';
?>