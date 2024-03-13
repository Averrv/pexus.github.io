<?php
include 'db.php';
?>


<body>
    <!-- header -->
    <?php
    include('header.php');
    ?>

    <!-- content -->
    <div class="section">
        <div class="container1">


            <div class="boxl">
                <div class="namalogin">
                    <h2>REGISTER</h2>
                </div>
                <br>
                <form action="" method="POST">
                    <div class="textlogin">
                        <h4>Nama User</h4>
                    </div>
                    <input type="text" name="nama" placeholder="Nama User" class="kolom" required>
                    <div class="textlogin">
                        <h4>Username</h4>
                    </div>
                    <input type="text" name="user" placeholder="Username" class="kolom" required>
                    <div class="textlogin">
                        <h4>Password</h4>
                    </div>
                    <input type="Password" name="pass" placeholder="Password" class="kolom" required>
                    <div class="textlogin">
                        <h4>Nomor Telepon</h4>
                    </div>
                    <input type="text" name="tlp" placeholder="Nomor Telepon" class="kolom" required>
                    <div class="textlogin">
                        <h4>E-mail</h4>
                    </div>
                    <input type="text" name="email" placeholder="E-mail" class="kolom" required>
                    <div class="textlogin">
                        <h4>Alamat</h4>
                    </div>
                    <input type="text" name="almt" placeholder="Alamat" class="kolom" required>
                    <br>
                    <input type="submit" name="submit" value="Submit" class="btnl">
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $nama = ucwords($_POST['nama']);
                    $username = $_POST['user'];
                    $password = $_POST['pass'];
                    $telpon = $_POST['tlp'];
                    $mail = $_POST['email'];
                    $alamat = ucwords($_POST['almt']);

                    $insert = mysqli_query($conn, "INSERT INTO user VALUES (
					                        null,
											'" . $nama . "',
											'" . $username . "',
											'" . $password . "',
											'" . $telpon . "',
											'" . $mail . "',
											'" . $alamat . "')
											
											");
                    if ($insert) {
                        echo '<script>alert("Registrasi berhasil")</script>';
                        echo '<script>window.location="login.php"</script>';
                    } else {
                        echo 'gagal ' . mysqli_error($conn);
                    }
                }
                ?>
            </div>

        </div>
    </div>
    </div>
    </div>

    <!-- footer -->
    <?php include('footer.php'); ?>
</body>


</html>