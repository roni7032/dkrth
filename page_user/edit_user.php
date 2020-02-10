<?php include_once('../url.php'); ?>
<?php
$bnt=1;

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

$sql="UPDATE user SET nama_lengkap='".$_POST['nama_lengkap']."',username='".$_POST['username']."',password=md5('".$_POST['password']."'),role='".$_POST['role']."',keterangan='".$_POST['keterangan']."' WHERE id='".$_POST['id']."'";

// echo $sql;
if ($conn->query($sql) === TRUE) {
	$new_url=base_url()."/user.php";
    Redirect($new_url,false);
} else {
    echo "Error updating record: " . $conn->error;
}
?>
<?php mysqli_close($conn); ?>