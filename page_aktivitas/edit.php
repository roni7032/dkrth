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

$sql = "SELECT * FROM aktivitas where id=".$_GET['id'];
$query = mysqli_query($conn, $sql);
$dtedit =(object) mysqli_fetch_assoc($query);

$sql_user="select id, username, nama_lengkap from user where id=".$dtedit->id_user;

if($role=='user'){
	$sql_user="select id, username, nama_lengkap from user where id=".$id_user_session;
}
$q_user = mysqli_query($conn, $sql_user);
// $dtuser =mysqli_num_rows($q_user);
?>
<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Aktivitas</h3>
          </div>
          <div class="box-body">
	<form method="post" action="<?php echo abs_url()."/page_aktivitas/edit_aktivitas.php"; ?>">
		<input type="hidden" name="id" value="<?php echo $dtedit->id; ?>" />
		<div class="form-group">
		<label class="label-control" for="id_user">User</label>
		<select name="id_user" class="form-control" <?php echo $readonly; ?>>
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
		<label class="label-control" for="tgl">Tanggal</label>
		<input <?php echo $readonly; ?> type="text" name="tgl" id="datepicker" class="form-control" placeholder="Tanggal" value="<?php echo date('d M Y',strtotime($dtedit->tgl)); ?>" />
		</div>
		<div class="form-group">
			<label class="label-control" for="aktivitas">Aktivitas</label>
			<input <?php echo $readonly; ?> type="text" name="aktivitas" class="form-control" placeholder="Aktivitas" value="<?php echo $dtedit->aktivitas; ?>" />
		</div>
		<div class="form-group">
		<label class="label-control" for="waktu_pelaksanaan">Waktu Pelaksanaan</label><br/>
		<select name="waktu_pelaksanaan" class="form-control" <?php echo $readonly; ?>>
			<?php if($role=='admin' && $dtedit->waktu_pelaksanaan==1): ?>
				<option value="1">Jam Kantor</option>
			<?php elseif($role=='admin' && $dtedit->waktu_pelaksanaan==2): ?>
				<option value="2">Luar Jam Kantor</option>
			<?php else: ?>
				<option value="1" <?php if($dtedit->waktu_pelaksanaan==1) echo "selected"; ?>>Jam Kantor</option>
				<option value="2" <?php if($dtedit->waktu_pelaksanaan==2) echo "selected"; ?>>Luar Jam Kantor</option>
			<?php endif; ?>
		</select>
		</div>
		<div class="form-group">
			<label class="label-control" for="catatan">Catatan</label>
			<textarea <?php echo $readonly; ?> name="catatan" class="form-control" placeholder="Catatan"><?php echo $dtedit->catatan; ?></textarea>
		</div>
		<div class="form-group">
			<?php
				$readonly_1="";
				if($role=='user'){
					$readonly_1='style="display:none;"';
				}
			?>
			<label class="label-control" for="status" <?php echo $readonly_1; ?>>Status</label>
			<select name="status" class="form-control" <?php echo $readonly_1; ?>>
				<option value="1" <?php if($dtedit->status==1) echo "selected"; ?>>Disetujui</option>
				<option value="2" <?php if($dtedit->status==2) echo "selected"; ?>>Revisi</option>
				<option value="3" <?php if($dtedit->status==3) echo "selected"; ?>>Ditolak</option>
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