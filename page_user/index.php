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

$sql = "SELECT * from user order by id desc";
$query = mysqli_query($conn, $sql);
$no=1;
if($bnt==1): ?>
<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">User</h3>
          </div>
          <div class="box-body">
	<a href="<?php echo base_url()."/tambah.php?for=user"; ?>">Tambah</a>
	<table class="table datatable">
    <thead>
      <tr>
        <th>No</th><th>Nama Lengkap</th><th>Username</th><th>password</th><th>Keterangan</th><th>Action</th>
      </tr>
    </thead>
    <tbody>
		<?php if (mysqli_num_rows($query) > 0): ?>
		
		<?php while($row = mysqli_fetch_array($query)): ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['nama_lengkap']; ?></td>
				<td><?php echo $row['username']; ?></td>
				<td>*****</td>
				<td><?php echo $row['keterangan']; ?></td>
				<td>
					<a href="<?php echo base_url()."/view.php?for=user&id=".$row['id']; ?>">View</a> |
					<a href="<?php echo base_url()."/tambah.php?for=user&action=edit&id=".$row['id']; ?>">Edit</a> | <a href="<?php echo base_url()."/page_user/delete.php?id=".$row['id']; ?>">Delete</a>
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
<?php else: ?>
<div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Login DKRTH</h3>
          </div>
          <div class="box-body">
		<form class="form-horizontal" action="<?php echo abs_url(); ?>login_proses.php">
		  <div class="form-group">
			<label class="control-label col-sm-2" for="username">Username:</label>
			<div class="col-sm-10">
			  <input type="username" class="form-control" id="username" placeholder="Enter Username">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Password:</label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" id="pwd" placeholder="Enter password">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <div class="checkbox">
				<label><input type="checkbox"> Remember me</label>
			  </div>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default">Submit</button>
			</div>
		  </div>
		</form> 
</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
<?php endif; 
mysqli_close($conn);
?>