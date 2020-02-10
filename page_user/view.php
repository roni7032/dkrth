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

$sql = "SELECT * FROM user where id=".$_GET['id'];
$query = mysqli_query($conn, $sql);
$dtedit =(object) mysqli_fetch_assoc($query);
?>
<div class="row">
  <div class="col-md-4">

    <!-- Profile Image -->
    <div class="box box-primary">
<div class="box-body box-profile">
  <img class="profile-user-img img-responsive img-circle" src="<?php echo $dtedit->foto; ?>" alt="User profile picture">

  <h3 class="profile-username text-center"><?php echo $dtedit->username; ?></h3>

  <p class="text-muted text-center"><?php echo $dtedit->nama_lengkap; ?></p>
  
  <form action="upload.php?for=user" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $dtedit->id; ?>"/>
		<input type="file" name="file">
		<input type="submit" class="btn btn-primary btn-block" name="upload" value="Ganti Foto">
  </form>
</div>
<!-- /.box-body -->
    </div>
    <!-- /.box -->
	</div>
	<div class="col-md-8">
    <!-- About Me Box -->
    <div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">About Me</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
  <strong><i class="fa fa-book margin-r-5"></i> Nama Lengkap</strong>

  <p class="text-muted">
    <?php echo $dtedit->nama_lengkap; ?>
  </p>

  <hr>

  <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan</strong>

  <p><?php echo $dtedit->keterangan; ?></p>
</div>
<!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->