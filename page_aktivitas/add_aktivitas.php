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

$sql="INSERT INTO aktivitas(id_user,tgl,aktivitas,waktu_pelaksanaan,catatan,foto_aktivitas,status) VALUES ('".$_POST['id_user']."','".date('Y-m-d',strtotime($_POST['tgl']))."','".$_POST['aktivitas']."','".$_POST['waktu_pelaksanaan']."','".$_POST['catatan']."','".$_POST['foto_aktivitas']."','".$_POST['status']."')";

// echo $sql;
if ($conn->query($sql) === TRUE) {
	$new_url=base_url();
    Redirect($new_url,false);
} else {
    echo "Error updating record: " . $conn->error;
}
?>
<?php mysqli_close($conn); ?>