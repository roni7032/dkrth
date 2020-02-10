<?php include_once('url.php'); ?>
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

$sql="UPDATE aktivitas SET status='".$_GET['ap']."' WHERE id='".$_GET['id']."'";

// echo $sql;

if ($conn->query($sql) === TRUE) {
	$new_url=base_url()."/view.php?for=aktivitas&id=".$_GET['id'];
    Redirect($new_url,false);
} else {
    echo "Error updating record: " . $conn->error;
}
?>
<?php mysqli_close($conn); ?>