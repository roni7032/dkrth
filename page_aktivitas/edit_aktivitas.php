<?php include_once('../url.php'); ?>
<?php
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

$sql="UPDATE aktivitas SET id_user='".$_POST['id_user']."',tgl='".date('Y-m-d',strtotime($_POST['tgl']))."',aktivitas='".$_POST['aktivitas']."',waktu_pelaksanaan='".$_POST['waktu_pelaksanaan']."',catatan='".$_POST['catatan']."',foto_aktivitas='".$_POST['foto_aktivitas']."',status='".$_POST['status']."' WHERE id='".$_POST['id']."'";

// echo $sql;
if ($conn->query($sql) === TRUE) {
    Redirect(base_url(),false);
} else {
    echo "Error updating record: " . $conn->error;
}
?>
<?php mysqli_close($conn); ?>