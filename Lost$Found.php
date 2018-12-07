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
            <h3 style="text-align:center;">Lost and Found List</h3></div>
        <div class="myform">
            <table class="table table-condensed">
                <tr>
                    <th width="15%">No.</th>
                    <th width="35%">Images</th>
                    <th width="15%">Type</th>
                    <th width="35%">Description</th>
                </tr>
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
                    </tr>
                    <?php }} ?>
            </table>
        </div>
    </div>
    <?php
include 'inc/footer.php';
?>