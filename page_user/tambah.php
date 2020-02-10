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

$sql_user="select id, username, nama_lengkap from user";
$q_user = mysqli_query($conn, $sql_user);
// $dtuser =mysqli_num_rows($q_user);
?>
<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah User</h3>
          </div>
          <div class="box-body">
	<form method="post" action="<?php echo abs_url()."/page_user/add_user.php"; ?>">
		<input type="hidden" name="id" value="<?php echo $dtedit->id; ?>" />
		<div class="form-group">
			<label class="label-control" for="nama_lengkap">Nama Lengkap</label>
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" />
		</div>
		<div class="form-group">
			<label class="label-control" for="username">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" />
		</div>
		<div class="form-group">
			<label class="label-control" for="password">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" />
		</div>
		<div class="form-group">
			<label class="label-control" for="keterangan">Keterangan</label>
			<textarea name="keterangan" class="form-control" placeholder="Keterangan" ></textarea>
		</div>
		<div class="form-group">
			<label class="label-control" for="role">Sebagai</label>
			<select name="role" class="form-control">
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="save" class="btn btn-primary btn-block" value="Simpan" />
		</div>
	</form>
</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
<?php mysqli_close($conn); ?>