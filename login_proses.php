<?php session_start();

include_once('url.php');
$servername = "localhost";
$username = "root";
$password = "";
$database = "aryo_1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="select * from user where username='".$_POST['username']."' and password=md5('".$_POST['password']."')";
$query = mysqli_query($conn, $sql);

$ada=mysqli_num_rows($query);

if($ada==1){
	$data =(object) mysqli_fetch_assoc($query);
	
	$_SESSION['ada']=1;
	$_SESSION['user']=$data;
}
/*----/end line----*/
$new_url=base_url();
Redirect($new_url, false);