<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
	echo '<script>window.location="login.php"</script>';
}

$produk = mysqli_query($conn, "SELECT * FROM  tb_image WHERE image_id = '" . $_GET['id'] . "'");
if (mysqli_num_rows($produk) == 0) {
	echo '<script>window.location="data-image.php"</script>';
}
$p = mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Photo</title>
	<!-- Include CKEditor -->
	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>

<body>
	<!-- header -->
	<?php include('header.php'); ?>

	<!-- content -->
	<div class="section">
		<div class="container4">
			<div class="boxt">
				<div class="namatambah">
					<h2>Edit Photo</h2>
				</div>
				<form action="" method="POST" enctype="multipart/form-data">
					<?php
					$result = mysqli_query($conn, "SELECT * FROM tb_category");
					$jsArray = "var prdName = new Array();\n";
					echo '<select class="input-control" name="kategori" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]" required>';
					echo '<option>-Select Kategori Photo-</option>';
					while ($row = mysqli_fetch_array($result)) {
						echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
						$jsArray .= "prdName['" . $row['category_id'] . "'] = '" . addslashes($row['category_name']) . "';\n";
					}
					echo '</select>';
					?>
					<input type="hidden" name="nama_kategori" id="prd_name">

					<div class="textlogin">
						<h4>Username</h4>
					</div>
					<input type="text" name="namauser" class="input-control" placeholder="Nama User" value="<?php echo $p->admin_name ?>" readonly="readonly">

					<div class="textlogin">
						<h4>Title</h4>
					</div>
					<input type="text" name="nama" class="input-control" placeholder="Nama Foto" value="<?php echo $p->image_name ?>" required>

					<div class="textlogin">
						<h4>Change Photo?</h4>
					</div>
					<img src="foto/<?php echo $p->image ?>" width="100px" />
					<input type="hidden" name="foto" value="<?php echo $p->image ?>" />
					<input type="file" name="gambar" class="input-control">

					<div class="textlogin">
						<h4>Description</h4>
					</div>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->image_description ?></textarea><br />

					<div class="textlogin">
						<h4>Status</h4>
					</div>
					<select class="input-control" name="status">
						<option value="">--Select--</option>
						<option value="1" <?php echo ($p->image_status == 1) ? 'selected' : ''; ?>>Active</option>
						<option value="0" <?php echo ($p->image_status == 0) ? 'selected' : ''; ?>>Not Active</option>
					</select>

					<input type="submit" name="submit" value="Submit" class="btn2">
					<input type="button" class="btn2" id="kembali-btn" value="Back" onclick="window.location.href='data-image.php';">
				</form>

				<?php
				if (isset($_POST['submit'])) {
					// data inputan dari form
					$kategori  = $_POST['kategori'];
					$user      = $_POST['namauser'];
					$nama      = $_POST['nama'];
					$deskripsi = $_POST['deskripsi'];
					$status    = $_POST['status'];
					$foto      = $_POST['foto'];

					// data gambar yang baru 
					$filename = $_FILES['gambar']['name'];
					$tmp_name = $_FILES['gambar']['tmp_name'];

					//jika admin ganti gambar
					if ($filename != '') {
						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'foto' . time() . '.' . $type2;

						// menampung data format file yang diizinkan
						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						// validasi format file
						if (!in_array($type2, $tipe_diizinkan)) {
							// jika format file tidak ada di dalam tipe diizinkan
							echo '<script>alert("Format file tidak diizinkan")</script>';
						} else {
							unlink('./foto/' . $foto);
							move_uploaded_file($tmp_name, './foto/' . $newname);
							$namagambar = $newname;
						}
					} else {
						// jika admin tidak ganti gambar
						$namagambar = $foto;
					}

					//query update data produk
					$update = mysqli_query($conn, "UPDATE tb_image SET
                                                   category_name       = '" . $kategori . "',
                                                   admin_name          = '" . $user . "',
                                                   image_name          = '" . $nama . "',
                                                   image_description   = '" . $deskripsi . "',
                                                   image               = '" . $namagambar . "',
                                                   image_status        = '" . $status . "'
                                                   WHERE image_id      = '" . $p->image_id . "' ");
					if ($update) {
						echo '<script>alert("Change Data Success")</script>';
						echo '<script>window.location="data-image.php"</script>';
					} else {
						echo 'gagal' . mysqli_error($conn);
					}
				}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<?php include('footer.php'); ?>

	<script>
		CKEDITOR.replace('deskripsi');
	</script>
</body>

</html>