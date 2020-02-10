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
$sql = "SELECT *, a.id as id_aktivitas FROM aktivitas a inner join user u on a.id_user=u.id where a.id=".$_GET['id'];
$query = mysqli_query($conn, $sql);
$dtaktivitas =(object) mysqli_fetch_assoc($query);
?>
<div class="row">
	<div class="col-md-3">

	  <!-- Profile Image -->
	  <div class="box box-primary">
		<div class="box-body box-profile">
		  <img class="profile-user-img img-responsive img-circle" src="<?php echo $dtaktivitas->foto; ?>" alt="User profile picture">

		  <h3 class="profile-username text-center"><?php echo $dtaktivitas->username; ?></h3>

		  <p class="text-muted text-center"><?php echo $dtaktivitas->nama_lengkap; ?></p>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->

	  <!-- About Me Box -->
	  <div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Keterangan</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  <p class="text-muted">
	<?php echo $dtaktivitas->keterangan; ?>
		  </p>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
	<!-- /.col -->
	<div class="col-md-9">
	  <div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
		</ul>
		<div class="tab-content">
		  <div class="active tab-pane" id="activity">
	<!-- Post -->
	<div class="post">
	  <div class="user-block">
		<img class="img-circle img-bordered-sm" src="<?php echo $dtaktivitas->foto; ?>" alt="User Image">
	<span class="username">
	  <a href="#"><?php echo $dtaktivitas->aktivitas; ?></a>
	  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
	</span>
		<span class="description">Tanggal : <?php echo date('d M Y',strtotime($dtaktivitas->tgl)); ?></span>
	  </div>
	  <!-- /.user-block -->
	  <div class="row margin-bottom">
		<div class="col-sm-12">
		  <img class="img-responsive" src="<?php echo $dtaktivitas->foto_aktivitas; ?>" alt="Photo">
		  <form action="upload.php?for=activity" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $dtaktivitas->id_aktivitas; ?>"/>
				<input type="file" name="file">
				<input type="submit" class="btn btn-primary btn-block" name="upload" value="Ganti Foto">
		  </form>
		</div>
		<!-- /.col -->
	  </div>
	  <!-- /.row -->

	  <ul class="list-inline">
		<?php if($dtaktivitas->status==2): ?>
		<li><a href="<?php echo base_url()."/tambah.php?for=aktivitas&action=edit&id=".$dtaktivitas->id_aktivitas; ?>" class="link-black text-sm"><i class="fa fa-pencil margin-r-5"></i> Edit</a></li>
		<?php endif; ?>
		<?php if($role=='admin'): ?>
			<li><a href="<?php echo base_url()."/proses_aktivitas.php?id=".$dtaktivitas->id_aktivitas."&ap=2&id_user=".$dtaktivitas->id_user; ?>"><span <?php if($dtaktivitas->status==2) echo "class='label label-info'"; ?>>Revisi</span></a></li>
			<li><a href="<?php echo base_url()."/proses_aktivitas.php?id=".$dtaktivitas->id_aktivitas."&ap=1&id_user=".$dtaktivitas->id_user; ?>"><span <?php if($dtaktivitas->status==1) echo "class='label label-success'"; ?>>Disetujui</span></a></li>
			<li><a href="<?php echo base_url()."/proses_aktivitas.php?id=".$dtaktivitas->id_aktivitas."&ap=3&id_user=".$dtaktivitas->id_user; ?>"><span <?php if($dtaktivitas->status==3) echo "class='label label-danger'"; ?>>Ditolak</span></a></li>
		<?php endif; ?>
		<!--<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
		</li>-->
		<?php if($dtaktivitas->status==2): ?>
		<li class="pull-right">
		  <a href="<?php echo base_url()."page_aktivitas/delete.php?id=".$dtaktivitas->id_aktivitas; ?>" class="link-black text-sm"><i class="fa fa-trash margin-r-5"></i> Delete</a></li>
		<?php endif; ?>
	  </ul>

	  <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Catatan:</h4>
		<?php
		$jam_kerja=array('Jam Kantor','Luar Jam Kantor');
		$status=array('Disetujui','Revisi','Ditolak');
		?>
        <label>Waktu Pelaksanaan : </label><?php echo $jam_kerja[$dtaktivitas->waktu_pelaksanaan-1]; ?>
		<hr/>
        <label>Status : </label><?php echo $status[$dtaktivitas->status-1]; ?>
		<hr/>
        <?php echo $dtaktivitas->catatan; ?>
      </div>
	</div>
	<!-- /.post -->
		  </div>
		  <!-- /.tab-pane -->
		</div>
		<!-- /.tab-content -->
	  </div>
	  <!-- /.nav-tabs-custom -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->