<?php
class connect{
	public $server;
	public $dbname;
	public $usernames;
	public $password;

	public function __construct(){	
	 $this->server = "uzb4o9e2oe257glt.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
	 $this->usernames ="oi3li4ozl9ads35r";
	 $this->password ="ccmjuaux7zxw6bih";
	 $this->dbname ="yffx90h88680xbjx";	
	}	
	//1 option:1
	
	public function connectToMySQL():mysqli{
		$conn = new mysqli($this->server,
		$this->usernames,$this->password,$this->dbname);

		if($conn -> connect_error){
			die("Failed". $conn->connect_error);
		}
		else{
			/*echo "Connect!";*/
		}
		return $conn;
	}
	//Option 2: PDO
	public function connectToPDO():PDO{
		try{
		$conn =new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->usernames,$this->password);
		//echo "Connect! PDO";
		}catch(PDOException $e){
			die("Failed".$e);
		}	
		return $conn;
		
	}
	
}
	$c = new connect();
	$c->connectToMySQL();
	//$c->ConnectToMySQL();

?>