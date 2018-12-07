<?php 
include "inc/adminheader.php"; 
include "config.php";
include "database.php"; 
?>
    <?php
 $id = $_GET['id'];
 $db = new Database();
 $query = "SELECT * FROM usr_info WHERE id=$id";
 $getData = $db->select($query)->fetch_assoc();


 if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($db->link,$_POST['name']);
   $incident = mysqli_real_escape_string($db->link,$_POST['incident']);
   $address = mysqli_real_escape_string($db->link,$_POST['address']);
   $email = mysqli_real_escape_string($db->link,$_POST['email']);
   $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
   $perpetrator = mysqli_real_escape_string($db->link,$_POST['perpetrator']);
   $place = mysqli_real_escape_string($db->link,$_POST['place']);
   $status = mysqli_real_escape_string($db->link,$_POST['status']);
     

   if ($name == '' || $incident== '' || $address ==''|| $email =='' ||$phone ==''|| $perpetrator ==''|| $place =='') {
     $error="Field must not be Empty !!";
   }
   else{
    $query = "UPDATE usr_info
    SET 
    name  = '$name',
    incident = '$incident',
    address = '$address',
    email = '$email',
    phone = '$phone',
    perpetrator = '$perpetrator',
    place = '$place',
    status = '$status'
    WHERE id = $id";

    $update = $db->update($query);
   }
 }
?>
        <?php
 if (isset($_POST['delete'])) {
   $query = "DELETE FROM usr_info WHERE id=$id";
   $deleteData = $db->delete($query); 
 }
?>
            <?php
    if (isset($error)) {
   echo "<span style='color:red;'>".$error."</span>";
 } 
?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>.<?php
if (isset($_GET['msg'])) {
   echo "<span style='color:red;'>".$_GET['msg']."</span>";
 } 
?><span class="pull-right"><a class="btn btn-primary" href="AdminMain.php">Go back</a>
      </span>
      
      </h2></div>
                    <div class="panel-body">
                        <div style="max-width: 600px; margin: 0 auto">
                            <form action="update.php?id=<?php echo $id?>" method="post">
                                <div class="form-groupr">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="<?php echo $getData['name'];?>">
                                            <?php echo $getData['status'];?>
                                        </option>
                                        <option value="Accepted">Accepted</option>
                                        <option value="Rejected">Rejected</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                </div>
                                <!--                        <div class="form-group">
                            <label>Status</label>
                          <input type="text" id="name" name="status" class="form-control" value="<?php echo $getData['status'];?>" /> </div>-->
                                <div class="form-groupr">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $getData['name'];?>" /> </div>
                                <div class="form-group">
                                    <label for="name">GD Type</label>
                                    <input type="text" id="name" name="incident" class="form-control" value="<?php echo $getData['incident'];?>" /> </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" rows="5" name="description" id="comment">
                                        <?php echo $getData['description'];?>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Address</label>
                                    <input type="text" id="name" name="address" class="form-control" value="<?php echo $getData['address'];?>" /> </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="name" name="email" class="form-control" value="<?php echo $getData['email'];?>" /> </div>
                                <div class="form-group">
                                    <label for="text">Phone</label>
                                    <input type="text" id="text" name="phone" class="form-control" value="<?php echo $getData['phone'];?>" /> </div>
                                <div class="form-group">
                                    <label for="text">Perpetrator</label>
                                    <input type="text" id="text" name="perpetrator" class="form-control" value="<?php echo $getData['perpetrator'];?>" /> </div>
                                <div class="form-group">
                                    <label for="text">Place</label>
                                    <input type="text" id="text" name="place" class="form-control" value="<?php echo $getData['place'];?>" /> </div>
                                <button type="submit" name="submit" class="btn btn-success">Update</button>
                                <button type="reset" class="btn btn-success">Cancle</button>
                                <button type="submit" name="delete" class="btn btn-success">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <h2><span class="pull-left"><a class="btn btn-primary" href="AdminMain.php">Go back</a>
      </span>
      </h2> </div>
                </br>
                </br>
                </br>
                <?php include "inc/footer.php"; ?>