<?php include_once('define.php'); ?>
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

$sql_user="select id, username, nama_lengkap from user where id=".$id_user_session;
$q_user = mysqli_query($conn, $sql_user);
// $dtuser =mysqli_num_rows($q_user);
?>
<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Aktivitas</h3>
          </div>
          <div class="box-body">
	<form method="post" action="<?php echo abs_url()."/page_aktivitas/add_aktivitas.php"; ?>">
		<input type="hidden" name="id" value="<?php echo $dtedit->id; ?>" />
		<div class="form-group">
		<label class="label-control" for="id_user">User</label>
		<select name="id_user" class="form-control">
			<?php if (mysqli_num_rows($q_user) > 0): ?>		
			<?php while($row = mysqli_fetch_array($q_user)): ?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
			<?php endwhile; ?>
			<?php else : ?>
				<option>0 results</option>
			<?php endif; ?>
		</select>
		</div>
		<div class="form-group">
			<label class="label-control" for="tgl">Tanggal</label>
			<input type="text" id="datepicker" name="tgl" class="form-control" placeholder="Tanggal" required />
		</div>
		<div class="form-group">
		<label class="label-control" for="aktivitas">Aktivitas</label><input type="text" name="aktivitas" class="form-control" placeholder="Aktivitas" />
		</div>
		<div class="form-group">
		<label class="label-control" for="waktu_pelaksanaan">Waktu Pelaksanaan</label>
		<select name="waktu_pelaksanaan" class="form-control">
			<option value="1">Jam Kantor</option>
			<option value="2">Luar Jam Kantor</option>
		</select>
		</div>
		<div class="form-group">
			<label class="label-control" for="catatan">Catatan</label>
			<textarea name="catatan" class="form-control" placeholder="Catatan"></textarea>
		</div>
		<input type="hidden" name="status" value='2' />
		<!-- <div class="form-group">
			<label class="label-control" for="status">Status</label>
			<select name="status" class="form-control">
				<option value="1">Disetujui</option>
				<option value="2">Revisi</option>
				<option value="3">Ditolak</option>
			</select>
		</div>-->
		<div class="form-group">
			<input type="submit" name="save" class="btn btn-primary btn-block" value="Simpan" />
		</div>
	</form>
</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
<?php mysqli_close($conn); ?>