<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
	echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM user WHERE admin_id ='" . $_SESSION['id'] . "'");
$d = mysqli_fetch_object($query);

?>

<body>
	<!-- header -->
	<?php
	include('header.php');
	?>

	<!-- content -->
	<div class="section">
		<div class="container5">

			<div class="boxp">
				<div class="namatambah">
					<h2>Profil</h2>
				</div>
				<form action="" method="POST">
					<div class="textlogin">
						<h4>Nama Lengkap</h4>
					</div>
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
					<div class="textlogin">
						<h4>Username</h4>
					</div>
					<input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
					<div class="textlogin">
						<h4>No Hp</h4>
					</div>
					<input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp ?>" required>
					<div class="textlogin">
						<h4>Email</h4>
					</div>
					<input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
					<div class="textlogin">
						<h4>Alamat</h4>
					</div>
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>

					<input type="submit" name="submit" value="Ubah Profil" class="btn3">

				</form>
				<?php
				if (isset($_POST['submit'])) {

					$nama   = $_POST['nama'];
					$user   = $_POST['user'];
					$hp     = $_POST['hp'];
					$email  = $_POST['email'];
					$alamat = $_POST['alamat'];

					$update = mysqli_query($conn, "UPDATE user SET 
					                  admin_name = '" . $nama . "',
									  username = '" . $user . "',
									  admin_telp = '" . $hp . "',
									  admin_email = '" . $email . "',
									  admin_address = '" . $alamat . "'
									  WHERE admin_id = '" . $d->admin_id . "'");
					if ($update) {
						echo '<script>alert("Ubah data berhasil")</script>';
						echo '<script>window.location="profil.php"</script>';
					} else {
						echo 'gagal ' . mysqli_error($conn);
					}
				}
				?>
			</div>
			<br><br><br>
			<div class="boxp">
				<div class="namatambah">
					<h2>Ubah Password
					</h2>
				</div>
				<form action="" method="POST">
					<div class="textlogin">
						<h4>Kategori</h4>
					</div>
					<input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
					<div class="textlogin">
						<h4>Kategori</h4>
					</div>
					<input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>

					<input type="submit" name="ubah_password" value="Ubah Password" class="btn3">
				</form>
				<?php
				if (isset($_POST['ubah_password'])) {

					$pass1   = $_POST['pass1'];
					$pass2   = $_POST['pass2'];

					if ($pass2 != $pass1) {
						echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
					} else {
						$u_pass = mysqli_query($conn, "UPDATE user SET 
									  password = '" . $pass1 . "'
									  WHERE admin_id = '" . $d->admin_id . "'");
						if ($u_pass) {
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="profil.php"</script>';
						} else {
							echo 'gagal ' . mysqli_error($conn);
						}
					}
				}
				?>
			</div>
		</div>
	</div>
	</div>
	<br>
	<!-- footer -->
	<?php
	include('footer.php');
	?>
</body>

</html>