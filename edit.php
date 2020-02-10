<?php include_once('url.php'); ?>
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

$sql = "SELECT * FROM aktivitas where id=".$_GET['id'];
$query = mysqli_query($conn, $sql);
$dtedit =(object) mysqli_fetch_assoc($query);

$sql_user="select id, username, nama_lengkap from user";
$q_user = mysqli_query($conn, $sql_user);
// $dtuser =mysqli_num_rows($q_user);
?>
<html>
<head>
	<title>Home</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link type="text/css" href="assets/bootstrap.css" rel="stylesheet" />
</head>
<body>
	<div class="container">
	<h1>Edit Aktivitas</h1>
	<hr/>
	<form method="post" action="<?php echo abs_url()."/edit_aktivitas.php"; ?>">
		<input type="hidden" name="id" value="<?php echo $dtedit->id; ?>" />
		<div class="form-group">
		<label class="label-control" for="id_user">User</label>
		<select name="id_user" class="form-control">
			<?php if (mysqli_num_rows($q_user) > 0): ?>		
			<?php while($row = mysqli_fetch_array($q_user)): ?>
				<option value="<?php echo $row['id']; ?>" <?php if($row['id']==$dtedit->id_user) echo "selected"; ?>><?php echo $row['username']; ?></option>
			<?php endwhile; ?>
			<?php else : ?>
				<option>0 results</option>
			<?php endif; ?>
		</select>
		</div>
		<div class="form-group">
		<label class="label-control" for="tgl">Tanggal</label><input type="text" name="tgl" class="form-control" placeholder="Tanggal" value="<?php echo $dtedit->tgl; ?>" />
		</div>
		<div class="form-group">
		<label class="label-control" for="aktivitas">Aktivitas</label><input type="text" name="aktivitas" class="form-control" placeholder="Aktivitas" value="<?php echo $dtedit->aktivitas; ?>" />
		</div>
		<div class="form-group">
		<label class="label-control" for="waktu_pelaksanaan">Waktu Pelaksanaan</label>
		<select name="waktu_pelaksanaan" class="form-control">
			<option value="1" <?php if($dtedit->waktu_pelaksanaan==1) echo "selected"; ?>>Jam Kantor</option>
			<option value="2" <?php if($dtedit->waktu_pelaksanaan==2) echo "selected"; ?>>Luar Jam Kantor</option>
		</select>
		</div>
		<div class="form-group">
			<label class="label-control" for="catatan">Catatan</label>
			<textarea name="catatan" class="form-control" placeholder="Catatan"><?php echo $dtedit->catatan; ?></textarea>
		</div>
		<div class="form-group">
			<label class="label-control" for="foto_aktivitas">Foto Aktivitas</label>
			<input type="text" name="foto_aktivitas" class="form-control" placeholder="Foto Aktivitas" value="<?php echo $dtedit->foto_aktivitas; ?>" />
		</div>
		<div class="form-group">
			<label class="label-control" for="status">Status</label>
			<select name="status" class="form-control">
				<option value="1" <?php if($dtedit->status==1) echo "selected"; ?>>Disetujui</option>
				<option value="2" <?php if($dtedit->status==2) echo "selected"; ?>>Revisi</option>
				<option value="3" <?php if($dtedit->status==3) echo "selected"; ?>>Telah disetujui</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="save" class="btn btn-primary btn-block" value="Simpan" />
		</div>
	</form>
	</div>
</body>
</html>
<?php mysqli_close($conn); ?>