<?php
include 'inc/adminheader.php';
include 'config.php';
include 'database.php';
$db = new Database();
?>
    <style>
        .myform {
            width: 700px;
            margin: 0 auto;
            border: 1px solid #999;
            padding: 50px 20px;
        }
    </style>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lostandfound = $_POST['lostandfound'];
    $description = $_POST['description'];
	$permitted = array('jpg','png','gif','jpeg');
	$file_name = $_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_tmp  = $_FILES['image']['tmp_name'];

	$div = explode('.', $file_name);
	$file_ext = strtolower(end($div));
	$unique_image = substr(time(), 0,10).'.'.$file_ext;
	$upload_image = "upload/".$unique_image;
	if (empty($file_name)) {
		echo "<span class='error'>Please Select any Image !</span>";
	}elseif ($file_size > 1048567) {
		echo "<span class='error'>Image size should be less than 1MB !</span>";
	}elseif (in_array($file_ext, $permitted) === false) {
		echo "<span class='error'>You can upload only ".implode(',', $permitted)."</span>";
	}else{
	move_uploaded_file(	$file_tmp, $upload_image );
	$query = "INSERT INTO landf_info(image,lostandfound,description) VALUES('$upload_image','$lostandfound','$description')";
	$insert_rows = $db->InsertImage($query);
	if ($insert_rows) {
		echo "<h4 style='color:green;'>Image Inserted Successfuly !</h4>";
	}else{
		echo "<h4 style='color:red;'>Image Not Found !</h4>";
	}
}
}
?></div>
        <div class="myform">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <label for="name">Lost or Found</label>
                    <input type="text" class="form-control" id="name" name="lostandfound"> </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">File input</label>
                    <input type="file" id="image" name="image"> </div>
                <button type="submit" name="submit" class="btn btn-default">Upload</button>
            </form>
            <table class="table table-condensed">
                <tr>
                    <th width="10%">No.</th>
                    <th width="35%">Images</th>
                    <th width="15%">Type</th>
                    <th width="25%">Description</th>
                    <th width="15%">Action</th>
                </tr>
                <?php
		if (isset($_GET['del'])) {
			$id = $_GET['del'];
			$fquery = "SELECT * FROM landf_info where id = '$id'";
			$getImg = $db->SelectImage($fquery);
			if ($getImg) {
			while ($imgData = $getImg->fetch_assoc()) {
		   	$delimg = $imgData['image'];
		   	unlink($delimg);
		   }
		}
		 
		$query = "delete from landf_info where id = '$id'";
		$delImage = $db->DeleteImage($query);
		if ($delImage) {
		echo "<span style='color:green;'>Data Deleted Successfuly !</span>";
	  }else{
	  	echo "<span style='color:red;>Data Not Deleted !</span>";
	  }
	}
		?>
                    <?php
				$query = "SELECT * FROM landf_info";
				$getImage = $db->SelectImage($query);
				if ($getImage) {
					$i=0;
					while ($result = $getImage->fetch_assoc()) {
						$i++;
				?>
                        <tr>
                            <td>
                                <?php echo($i);?>
                            </td>
                            <td><img src="<?php echo $result['image']?>" height="100px" width="130px" class="img-thumbnail" /></td>
                            <td>
                                <?php echo $result['lostandfound'];?>
                            </td>
                            <td>
                                <?php echo $result['description'];?>
                            </td>
                            <td><a href="?del=<?php echo $result['id'];?>">Remove</a></td>
                        </tr>
                        <?php }} ?>
            </table>
        </div>
    </div>
    <?php
include 'inc/footer.php';
?>