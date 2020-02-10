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
$where="";
if($role=='user') $where='where id_user='.$id_user_session;
$sql = "SELECT a.*, u.nama_lengkap FROM aktivitas a inner join user u on a.id_user=u.id ".$where." order by a.id desc";
$query = mysqli_query($conn, $sql);
$no=1;
?>
<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Aktivitas</h3>
          </div>
          <div class="box-body">
	<?php if($role=='user'): ?>
	<a href="<?php echo base_url()."/tambah.php?for=aktivitas"; ?>">Tambah</a>
	<?php endif; ?>
	<table class="table datatable">
    <thead>
      <tr>
        <th>No</th><th>User</th><th>Tanggal</th><th>Aktivitas</th><th>Waktu Pelaksanaan</th><th>Catatan</th><th>Status</th><th>Action</th>
      </tr>
    </thead>
    <tbody>
		<?php if (mysqli_num_rows($query) > 0): ?>
		<?php
		$jam_kerja=array('Jam Kantor','Luar Jam Kantor');
		$status=array('Disetujui','Revisi','Ditolak');
		?>
		<?php while($row = mysqli_fetch_array($query)): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row['nama_lengkap']; ?></td>
				<td><?php echo date('d M Y',strtotime($row['tgl'])); ?></td>
				<td><?php echo $row['aktivitas']; ?></td>
				<td><?php echo $jam_kerja[$row['waktu_pelaksanaan']-1]; ?></td>
				<td><?php echo $row['catatan']; ?></td>
				<td><?php echo $status[$row['status']-1]; ?></td>
				<td>
					<?php if($role=='admin'): ?>
						<a href="<?php echo url()."proses_aktivitas.php?id=".$row['id']."&ap=2&id_user=".$row['id_user']; ?>"><span <?php if($row['status']==2) echo "class='label label-info'"; ?>>Revisi</span></a> |
						<a href="<?php echo url()."proses_aktivitas.php?id=".$row['id']."&ap=1&id_user=".$row['id_user']; ?>"><span <?php if($row['status']==1) echo "class='label label-success'"; ?>>Disetujui</span></a> |
						<a href="<?php echo url()."proses_aktivitas.php?id=".$row['id']."&ap=3&id_user=".$row['id_user']; ?>"><span <?php if($row['status']==3) echo "class='label label-danger'"; ?>>Ditolak</span></a> |
					<hr/>
					<?php endif; ?>
					<a href="<?php echo url()."view.php?for=aktivitas&id=".$row['id']; ?>">View</a>
					<?php if($row['status']==2): ?>
					 | <a href="<?php echo url()."tambah.php?for=aktivitas&action=edit&id=".$row['id']; ?>">Edit</a> 
						<?php if($role=='user'): ?>
						| <a href="<?php echo url()."page_aktivitas/delete.php?id=".$row['id']; ?>">Delete</a>
						<?php endif; ?>
					<?php endif; ?>
				</td>
			</tr>
		<?php endwhile; ?>
		<?php else : ?>
			<h1>0 results</h1>
		<?php endif; ?>
    </tbody>
  </table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
<?php mysqli_close($conn); ?>