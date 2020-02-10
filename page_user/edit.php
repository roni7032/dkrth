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

$sql = "SELECT * FROM user where id=".$_GET['id'];
$query = mysqli_query($conn, $sql);
$dtedit =(object) mysqli_fetch_assoc($query);

// $dtuser =mysqli_num_rows($q_user);
?>
<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Edit User</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
	<form method="post" action="<?php echo abs_url()."/page_user/edit_user.php"; ?>">
		<input type="hidden" name="id" value="<?php echo $dtedit->id; ?>" />
		<div class="form-group">
			<label class="label-control" for="nama_lengkap">Nama Lengkap</label>
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="<?php echo $dtedit->nama_lengkap; ?>" />
		</div>
		<div class="form-group">
			<label class="label-control" for="username">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $dtedit->username; ?>" />
		</div>
		<div class="form-group">
			<label class="label-control" for="password">Password</label>
			<input required type="password" name="password" class="form-control" placeholder="Password" value="" />
		</div>
		<div class="form-group">
			<label class="label-control" for="keterangan">Keterangan</label>
			<textarea name="keterangan" class="form-control" placeholder="Keterangan">
				<?php echo $dtedit->keterangan; ?>
			</textarea>
		</div>
		<div class="form-group">
			<label class="label-control" for="role">Sebagai</label>
			<select name="role" class="form-control">
				<option value="admin" <?php if($dtedit->role=="admin") echo "selected"; ?>>Admin</option>
				<option value="user" <?php if($dtedit->role=="user") echo "selected"; ?>>User</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="save" class="btn btn-primary btn-block" value="Simpan" />
		</div>
	</form>
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
		Footer
	</div>
	<!-- /.box-footer-->
</div>
<!-- /.box -->
<?php mysqli_close($conn); ?>