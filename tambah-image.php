<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
	echo '<script>window.location="login.php"</script>';
}
?>

<body>
	<!-- header -->
	<?php
	include('header.php');
	?>

	<!-- content -->
	<div class="section">
		<div class="container4">

			<div class="boxt">
				<div class="namatambah">
					<h2>Add Photo</h2>
				</div>

				<form action="" method="POST" enctype="multipart/form-data">
					<div class="textlogin">
						<h4>Category</h4>
					</div>
					<?php $result = mysqli_query($conn, "select * from tb_category");
					$jsArray = "var prdName = new Array();\n";
					echo '<select class="input-control" name="kategori" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]" required>  <option>-Select Category Photo-</option>';
					while ($row = mysqli_fetch_array($result)) {
						echo ' <option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
						$jsArray .= "prdName['" . $row['category_id'] . "'] = '" . addslashes($row['category_name']) . "';\n";
					}
					echo '</select>'; ?>
					</select>

					<input type="hidden" name="nama_kategori" id="prd_name">

					<input type="hidden" name="adminid" value="<?php echo $_SESSION['a_global']->admin_id ?>">
					<div class="textlogin">
						<h4>Username</h4>
					</div>
					<input type="text" name="namaadmin" class="input-control" value="<?php echo $_SESSION['a_global']->admin_name ?>" readonly="readonly">
					<div class="textlogin">
						<h4>Title</h4>
					</div>
					<input type="text" name="nama" class="input-control" placeholder="Title" required>
					<div class="textlogin">
						<h4>Description</h4>
					</div>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br />
					<div class="textlogin">
						<h4>Upload Foto</h4>
					</div>

					<input type="file" name="gambar" class="input-control" required>
					<div class="textlogin">
						<h4>Status</h4>
					</div>
					<select class="input-control" name="status">
						<option value="">--Select--</option>
						<option value="1">Active</option>
						<option value="0">Not Active</option>
					</select>

					<input type="submit" name="submit" value="Submit" class="btn2">
					<input type="button" class="btn2" id="kembali-btn" value="Back" onclick="window.location.href='data-image.php';">


				</form>
				<?php
				if (isset($_POST['submit'])) {

					// print_r($_FILES[gambar']);
					// menampung inputan dari form
					$kategori  = $_POST['kategori'];
					$nama_ka   = $_POST['nama_kategori'];
					$ida  	   = $_POST['adminid'];
					$user	  = $_POST['namaadmin'];
					$nama      = $_POST['nama'];
					$deskripsi = $_POST['deskripsi'];
					$status    = $_POST['status'];

					// menampung data file yang diupload
					$filename = $_FILES['gambar']['name'];
					$tmp_name = $_FILES['gambar']['tmp_name'];

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
						// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
						// proses upload file sekaligus insert ke database
						move_uploaded_file($tmp_name, './foto/' . $newname);

						$insert = mysqli_query($conn, "INSERT INTO tb_image VALUES (
						               null,
									   '" . $kategori . "',
									   '" . $nama_ka . "',
									   '" . $ida . "',
									   '" . $user . "',
									   '" . $nama . "',
									   '" . $deskripsi . "',
									   '" . $newname . "',
									   '" . $status . "',
									   CURRENT_TIMESTAMP
						                   ) ");

						if ($insert) {
							echo '<script>alert("Add Photo Success")</script>';
							echo '<script>window.location="data-image.php"</script>';
						} else {
							echo 'gagal' . mysqli_error($conn);
						}
					}
				}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<script>
		CKEDITOR.replace('deskripsi');
	</script>
	<script type="text/javascript">
		<?php echo $jsArray; ?>
	</script>
</body>
<?php
include('footer.php');
?>

</html>