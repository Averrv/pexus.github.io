<body>
	<!-- header -->
	<?php
	include('header.php');
	?>

	<!-- content -->
	<div class="section">
		<div class="container1">
			<br>
			<div class="boxl">
				<form action="" method="POST">
					<div class="namalogin">
						<h2>LOGIN</h2>
					</div>
					<br>
					<div class="textlogin">
						<h4>Username</h4>
					</div>

					<input type="text" name="user" placeholder="Username" class="kolom">
					<div class="textlogin">
						<h4>Password</h4>
					</div>

					<input type="password" name="pass" placeholder="Password" class="kolom">
					<br>
					<input type="submit" name="submit" value="Login" class="btnl">
				</form>
				<?php
				if (isset($_POST['submit'])) {
					session_start();
					include 'db.php';

					$user = mysqli_real_escape_string($conn, $_POST['user']);
					$pass = mysqli_real_escape_string($conn, $_POST['pass']);

					$cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '" . $user . "'AND password = '" . $pass . "'");
					if (mysqli_num_rows($cek) > 0) {
						$d = mysqli_fetch_object($cek);
						$_SESSION['status_login'] = true;
						$_SESSION['a_global'] = $d;
						$_SESSION['id'] = $d->admin_id;
						echo '<script>window.location="index.php"</script>';
					} else {
						echo '<script>alert("Username atau password anda salah")</script>';
					}
				}
				?><br />
				<p>Belum punya akun? daftar <a style="color:#00C;" href="register.php">DISINI</a></p>
			</div>

</body>
<?php include('footer.php'); ?>

</html>