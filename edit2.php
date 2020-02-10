<html>
	<head>
		<title>Form Edit</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link type="text/css" href="assets/bootstrap.css" rel="stylesheet" />
	</head>
	<body>
		<?php
			if($_POST){
				$dtheading=explode('|',$_POST['heading']);
				$dtfilling=explode('|',$_POST['filling']);
				
				
				
				$myfile=fopen('hasil/edit2.txt','w')or die("tidak bisa dibuka");
				$txt="";
				for($i=0;$i<count($dtfilling);$i++){
					$txt .= '
<div class="form-group">
	<label for="'.$dtfilling[$i].'" class="col-sm-2 control-label">'.$dtheading[$i].'</label>

	<div class="col-sm-10">
		<input type="text" class="form-control" id="'.$dtfilling[$i].'" name="'.$dtfilling[$i].'" placeholder="'.$dtheading[$i].' " value="<?php echo $'.'dtedit->'.$dtfilling[$i].'; ?>">
	</div>
</div>
';
				}
				
				// $txthead="<div class='form-group'>\n";
				// $txtfoot="\n</div>\n";
				
				// $txt = $txthead.$txtbody.$txtfoot;
				
				fwrite($myfile, $txt);
				fclose($myfile);
			}
		?>
		<div class="container">
			<h1>Bikin File Form Edit</h1>
			<hr/>
			<form method="post" action="">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
							<label for="heading">Heading</label><input id="heading" class="form-control" name="heading" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
							<label for="filling">Filling</label><input id="filling" class="form-control" name="filling" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
							<input class="form-control btn btn-warning" type="submit" value="Simpan" name="simpan" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>