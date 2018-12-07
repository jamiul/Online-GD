<?php
 include_once 'Session.php';
 include 'Database.php';
 class User
{
	private $db;
	public $link;
	public $erro;
	function __construct()
	{
		$this->db = new Database();
	}
	public function userRegistration($data)/*userRegistration method for new user*/
	{
		$name     = $data['name'];
		$nid      = $data['nid'];
		$address  = $data['address'];
		$email    = ($data['email']);
		$phone    = ($data['phone']);
		$password = ($data['password']);
		$date     = ($data['date']);
		$perpetrator    = ($data['perpetrator']);
		$incident = ($data['incident']);
        $description = ($data['description']);
		$place = ($data['place']);
        $status = "Pending";/*status default pending*/
		$chk_email=$this->emailCheck($email);
		if ($name == "" || $nid == "" || $address == ""|| $email == ""|| $phone == ""|| $password == ""|| $date == ""|| $perpetrator == ""|| $incident == ""|| $place == "") {
			$msg = "<div class='alert alert-danger'><strong>Error !!</strong>Field must not be empty</div>";
			return $msg;
		}
		if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
				$msg = "<div class='alert alert-danger'><strong>Error !!</strong>The email address is no valid</div>";
			return $msg;

		}
		if ($chk_email == true) {
				$msg = "<div class='alert alert-danger'><strong>Error !!</strong>The email address is already exist</div>";
			return $msg;
			
		}
		$password = ($data['password']);
		$sql = "INSERT INTO usr_info(name,nid,address,email,phone,password,date,perpetrator,incident,description,place,status) VALUES(:name,:nid,:address,:email,:phone,:password,:date,:perpetrator,:incident,:description,:place,:status)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':nid',$nid);
		$query->bindValue(':address',$address);
		$query->bindValue(':email',$email);
		$query->bindValue(':phone',$phone);
		$query->bindValue(':password',$password);
		$query->bindValue(':date',$date);
		$query->bindValue(':perpetrator',$perpetrator);
		$query->bindValue(':incident',$incident);
        $query->bindValue(':description',$description);
		$query->bindValue(':place',$place);
        $query->bindValue(':status',$status);
		$result = $query->execute();
		if ($result) {
				$msg = "<div class='alert alert-success'><strong>Success !!</strong>You have been rgistered</div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !!</strong>Soory there has been problem inerting your details</div>";
			return $msg;
		}
	}
		public function emailCheck($email)/*emailCheck method*/
		{ 
			$sql = "SELECT email FROM usr_info WHERE email = :email";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email',$email);
			$query->execute();
			if ($query->rowCount()>0) {
				return true;
			}else{
				return false;
			}
		}

		public function getLoginUser($email,$password)
        {
			$sql = "SELECT * FROM usr_info WHERE email = :email
			&& password = :password LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email',$email);
			$query->bindValue(':password',$password);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;

		}

		public function userLogin($data)
		{
			$email = $data['email'];
			$password = ($data['password']);

			$chk_email = $this->emailCheck($email);

			if ($email == "" || $password == "") {
			$msg = "<div class='alert alert-danger'><strong>Error !!</strong>Field must not be empty</div>";
			return $msg;
		}
		if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
				$msg = "<div class='alert alert-danger'><strong>Error !!</strong>The email address is no valid</div>";
			return $msg;

		}
		if ($chk_email == false) {
				$msg = "<div class='alert alert-danger'><strong>Error !!</strong>The email address not exist</div>";
			return $msg;
			
		}
		$result = $this->getLoginUser($email,$password);
		if ($result) {
			Session::init();
			Session::set("login",true);
			Session::set("id",$result->id);
			Session::set("name",$result->name);
			Session::set("loginmsg","<div class='alert alert-success'><strong>Success !!</strong>You have been LoggedIn</div>");
			header("location:main.php");


		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !!</strong>Data not Found</div>";
			return $msg;
		}
		}
		public function getLoginAdmin($name,$password){
			$sql = "SELECT * FROM admin_info WHERE name = :name
			&& password = :password LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':name',$name);
			$query->bindValue(':password',$password);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;

		}

		public function adminLogin($data)
		{
			$name = $data['name'];
			$password = ($data['password']);


			if ($name == "" || $password == "") {
			$msg = "<div class='alert alert-danger'><strong>Error !!</strong>Field must not be empty</div>";
			return $msg;
		}
		$result = $this->getLoginAdmin($name,$password);
		if ($result) {
			Session::init();
			Session::set("login",true);
			Session::set("id",$result->id);
			Session::set("name",$result->name);
			Session::set("loginmsg","<div class='alert alert-success'><strong>Success !!</strong>You have been LoggedIn</div>");
			header("location: AdminMain.php");


		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !!</strong>Data not Found</div>";
			return $msg;
		}
		}



		public function getUserData(){
			$sql = "SELECT * FROM usr_info ORDER BY id DESC";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchAll();
			return $result;
		}
		public function getUserById($userid)
		{
			$sql = "SELECT * FROM usr_info WHERE id = :id LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id',$userid);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}
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
		public function updateUserData($id,$data)
		{
		$incident = $data['incident'];
        $description = $data['description'];
		$address  = $data['address'];
		$email    = $data['email'];
		$phone    = $data['phone'];
		$perpetrator = $data['perpetrator'];
		$place    = $data['place'];

		if ($incident == ""|| $address == ""|| $email == ""|| $phone == ""|| $perpetrator == ""|| $place == "") {
			$msg = "<div class='alert alert-danger'><strong>Error !!</strong>Field must not be empty</div>";
			return $msg;
		}

		$sql = "UPDATE usr_info set 
		       incident = :incident,
               description =:description,
		       address  = :address,
		       email    = :email,
		       phone    = :phone,
		       perpetrator = :perpetrator,
		       place    = :place
		       WHERE id = :id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':incident',$incident);
        $query->bindValue(':description',$description);
		$query->bindValue(':address',$address);
		$query->bindValue(':email',$email);
		$query->bindValue(':phone',$phone);
		$query->bindValue(':perpetrator',$perpetrator);
		$query->bindValue(':place',$place);
		$query->bindValue(':id',$id);
		$result = $query->execute();
		if ($result) {
				$msg = "<div class='alert alert-success'><strong>Success !!</strong>User Data Update Succesfully</div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error !!</strong>User Data Not Updated</div>";
			return $msg;
		    }
		}
	}
	/**
	* 
	*/
?>