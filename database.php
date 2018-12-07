<?php
class Database
{
	public $host   = DB_HOST;
	public $user   = DB_USER;
	public $pass   = DB_PASS;
	public $dbname = DB_NAME;

	public $link;
	public $error;

	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){

				$this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
				if (!$this->link) {
					$this->error = "Connection fail".$this->link->connect_error;
					return false;
				}
	}
	# Read Data
	public function select($query)
	{
		
	$result = $this->link->query($query) or die ($this->link->error.__LINE__);
	if ($result->num_rows>0) {
		return $result;
	}
	else
	{
		return false;
	}
	}
     
     # Insert Data
	public function insert($query)
	{
		$insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if ($insert_row) {
			header("location: AdminMain.php?msg=".urlencode('Data inserted successfully.'));
			exit();
		}
		else{
			die("Error:(".$this->link->errno.")".$this->link->error);
		}
	}

    # Update Data
	public function update($query)
	{
		$update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if ($update_row) {
			header("location: AdminMain.php?msg=".urlencode('Data Updateded successfully.'));
			exit();
		}
		else{
			die("Error:(".$this->link->errno.")".$this->link->error);
		}
	}
	   # Delete Data
	public function delete($query)
	{
		$delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if ($delete_row) {
			header("location: AdminMain.php?msg=".urlencode('Data Deleted successfully.'));
			exit();
		}
		else{
			die("Error:(".$this->link->errno.")".$this->link->error);
		}
	}
    /*For Image Uploading*/
    #data insert
	public function InsertImage($data)
	{
	   $insert_rows = $this->link->query($data) or die($this->link->error.__LINE__);
	   if ($insert_rows) {
	   	return $insert_rows;
	   }else{
	   	return false;
	   }
	}
	#select Data
	public function SelectImage($data)
	{
		$result = $this->link->query($data) or die($this->link->error.__LINE__);
		if ($result) {
			return $result;
		}else{
			return false;
		}
	}
		#delete Data
	public function DeleteImage($data)
	{
		$delete_data = $this->link->query($data) or die($this->link->error.__LINE__);
		if ($delete_data) {
			return $delete_data;
		}else{
			return false;
		}
	}

}
?>