<?php 
session_start();
$ada=isset($_SESSION['ada']) ? 1:0;
include_once('url.php');

if($ada!=1) Redirect(base_url(),false);
include_once('url.php'); ?>
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
if($_GET['for']=="user"){
	if($_POST['upload']){
	$ekstensi_diperbolehkan	= array('png','jpg');
	$nama = $_FILES['file']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];	
	$username=$_SESSION['user']->username;
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 10440700){
				move_uploaded_file($file_tmp, 'assets/foto/'.$username."_".$nama);
				$sql="UPDATE user SET foto='".base_url()."/assets/foto/".$username."_".$nama."' WHERE id='".$_POST['id']."'";
				if($conn->query($sql) === TRUE){
					$new_url=base_url()."/view.php?for=user&id=".$_POST['id'];
					Redirect($new_url,false);
				}else{
					echo 'GAGAL MENGUPLOAD GAMBAR';
				}
			}else{
				echo 'UKURAN FILE TERLALU BESAR';
			}
		}else{
			echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		}
	}
}else{
	if($_POST['upload']){
	$ekstensi_diperbolehkan	= array('png','jpg');
	$nama = $_FILES['file']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];	
	$username=$_SESSION['user']->username;
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 10440700){
				move_uploaded_file($file_tmp, 'assets/foto/aktivitas_'.$username."_".$nama);
				$sql="UPDATE aktivitas SET foto_aktivitas='".base_url()."/assets/foto/aktivitas_".$username."_".$nama."' WHERE id='".$_POST['id']."'";
				if($conn->query($sql) === TRUE){
					$new_url=base_url()."/view.php?for=aktivitas&id=".$_POST['id'];
					Redirect($new_url,false);
				}else{
					echo 'GAGAL MENGUPLOAD GAMBAR';
				}
			}else{
				echo 'UKURAN FILE TERLALU BESAR';
			}
		}else{
			echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
		}
	}
}
?>
<?php mysqli_close($conn); ?>