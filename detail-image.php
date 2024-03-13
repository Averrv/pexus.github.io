<?php
session_start();
include 'db.php';

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM user WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);
$image_id = $_GET['id']; // Menggunakan GET untuk mendapatkan ID gambar



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Tambahkan script AddToAny -->
    <script async src="https://static.addtxs2oany.com/menu/page.js"></script>
    <style>
        .download-container {
            display: flex;
            justify-content: flex-end;
            margin-right: 10px;
            margin-top: 12px;
        }

        .btndl {
            background-color: #2b2b2b;
            color: #fff;
            padding: 13px 30px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
        }

        .btndl:hover {
            background-color: #585858;
        }



        .inpu2 {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            width: fit-content;
        }


        h4 {
            margin: 0;
        }

        h5,
        h6 {
            margin-top: 5px;
            margin-bottom: 0;
        }

        button.hapus {
            margin-top: -15px;
        }

        .like-download-section {
            display: flex;
            justify-content: space-between;
        }

        .like-section,
        .download-container {
            display: flex;
            align-items: center;
        }

        .like-button,
        .btndl {
            background-color: #FFF;
            border-radius: 15px;
            cursor: pointer;
            text-align: center;
            padding: 5px;
            margin-right: 10px;
            /* Atur margin antara tombol Like dan Download */
        }

        .like-button i {
            font-size: 24px;
            /* Ukuran ikon hati */
        }

        .like-button br {
            display: none;
            /* Sembunyikan tag br di awalnya */
        }

        .like-button:hover br {
            display: block;
            /* Tampilkan tag br saat tombol dihover */
        }

        .like-text {
            font-size: 14px;
            /* Ukuran teks "Like" */
        }

        .btndl {
            background-color: #2b2b2b;
            color: #fff;
            padding: 13px 30px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
        }

        .btndl:hover {
            background-color: #585858;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- header -->
    <?php include('header.php'); ?>
    <br>
    <?php include('search.php'); ?>

    <!-- product detail -->
    <div class="section">
        <div class="container8">
            <input type="button" class="btn2" id="kembali-btn" value="Back" onclick="window.location.href='index.php';">
        </div>
        <br><br>
        <div class="container3">
            <div class="boxd">
                <div class="namalogin">
                    <h2></h2>
                </div>
                <div class="colid">
                    <div class="cold">
                        <img src="foto/<?php echo $p->image ?>" width="100%" />
                    </div>

                    <br>
                    <h3><?php echo $p->image_name ?> | <?php echo $p->category_name  ?></h3>
                    <br>
                    <h4>Upload by <?php echo $p->admin_name ?><br />
                        <?php echo $p->date_created  ?></h4>
                    <br>
                    <h2>Description</h2><br />
                    <p> <?php echo $p->image_description ?></p>
                    <br>
                    <br>
                    <!-- Bagian Like dan Download -->
                    <div class="like-download-section">
                        <!-- Bagian Like -->
                        <div class="like-section">
                            <form action="submit_like.php" method="post">
                                <input type="hidden" name="image_id" value="<?php echo $p->image_id; ?>">

                                <?php
                                // Cek status like untuk gambar saat ini
                                $check_like_status = mysqli_query($conn, "SELECT * FROM tb_likes WHERE image_id = '$p->image_id' AND admin_id = '$user_id'");
                                $like_status = mysqli_num_rows($check_like_status) > 0;

                                // Tampilkan ikon yang sesuai dengan status like
                                if ($like_status) {
                                    echo '<button type="submit" name="submit_like" class="like-button liked"><i style="font-size:24px" class="fa">&#xf004;</i><br></button>';
                                } else {
                                    echo '<button type="submit" name="submit_like" class="like-button"><i style="font-size:24px" class="fa">&#xf08a;</i><br></button>';
                                }
                                ?>
                            </form>
                            <span class="total-likes"><?php echo " " . $like_data['total_likes']; ?></span>
                        </div>



                        <!-- Bagian Download -->
                        <div class="download-container">
                            <a href="foto/<?php echo $p->image ?>" download="download_<?php echo $p->image_name ?>" class="btndl">Download Photo</a>
                        </div>
                    </div>
                    <!-- End Bagian Like dan Download -->
                    <div class="hasil-like">
                        <?php
                        // Query untuk menghitung jumlah like
                        $like_query = "SELECT COUNT(*) AS total_likes FROM tb_likes WHERE image_id = '{$p->image_id}'";
                        $like_result = mysqli_query($conn, $like_query);
                        $like_data = mysqli_fetch_assoc($like_result);
                        echo "Likes: " . $like_data['total_likes'];
                        ?>
                    </div>

                    <br>
                    <!-- Tombol Share -->
                    <div class="share-container">
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_whatsapp"></a>
                            <a class="a2a_button_email"></a>
                            <a class="a2a_button_copylink" onclick="copyLink()"></a>
                        </div>
                    </div><br><br>

                    <!--komentar--->
                    <h3>Add Comment</h3>
                    <form action="" method="POST">
                        <input type="hidden" name="image" value="<?php echo $p->image_id ?>">
                        <input type="hidden" name="adminid" value="<?php echo $_SESSION['a_global']->admin_id ?>" required>
                        <input type="hidden" name="adminnm" value="<?php echo $_SESSION['a_global']->admin_name ?>" required>
                        <textarea name="komentar" class="input-control" maxlength="80" placeholder="Tulis Komentar..." required></textarea>
                        <input type="submit" name="submit" value="Kirim" class="btn2">
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        $image = $_POST['image'];
                        $adminid = $_POST['adminid'];
                        $adminnm = $_POST['adminnm'];
                        $komen = $_POST['komentar'];

                        $insert = mysqli_query($conn, "INSERT INTO tb_komentar VALUES (
        null,
        '" . $image . "',
        '" . $adminid . "',
        '" . $adminnm . "',
        '" . $komen . "',
        CURRENT_TIMESTAMP
    ) ");

                        if ($insert) {
                            echo '<script>window.location="detail-image.php?id=' . $_GET['id'] . '"</script>';
                        } else {
                            echo 'gagal' . mysqli_error($conn);
                        }
                    }
                    ?>
                    <br><br>
                    <!-- Tempatkan div ini di bawah form komentar -->
                    <div class="">
                        <h3>Comments <?php echo $kom ?></h3>
                        <div class="">
                            <?php
                            $komentar = mysqli_query($conn, "SELECT * FROM tb_komentar WHERE image_id ='" . $_GET['id'] . "'");
                            $kom = mysqli_num_rows($komentar);

                            $up = mysqli_query($conn, "SELECT * FROM tb_komentar WHERE image_id ='" . $_GET['id'] . "' ORDER BY tanggal_komentar DESC ");
                            if (mysqli_num_rows($up) > 0) {
                                while ($u = mysqli_fetch_array($up)) {
                            ?>
                                    <br>
                                    <div class="inpu2">
                                        <h4><?php echo $u['admin_name'] ?><br /></h4>
                                        <h5> <?php echo $u['komentar'] ?><br /></h5>
                                        <h6> <?php echo $u['tanggal_komentar'] ?></h6>
                                    </div>

                                    <?php
                                    if ($_SESSION['id'] == $u['admin_id']) {
                                    ?>
                                        <div class="input2">
                                            <form action="" method="POST">
                                                <input type="hidden" name="image_id" value="<?php echo $p->image_id ?>" />
                                                <input type="hidden" name="hapus" value="<?php echo $u['komentar_id'] ?>" />
                                                <button class="hapus" style=" border:none; cursor: pointer;" name="hapus_komen" onclick="return confirm('Yakin Ingin Hapus ?')"> <img src="img/delete.png" width="25px" title="Hapus" /></button>
                                            </form>
                                        </div>
                                    <?php
                                        if (isset($_POST['hapus_komen'])) {
                                            if (isset($_SESSION['id'])) {
                                                $admin_id = $_SESSION['id'];
                                                $image_id = $_POST['image_id'];
                                                $comment_id = $_POST['hapus'];
                                                mysqli_query($conn, "DELETE FROM tb_komentar WHERE image_id='$image_id' AND admin_id='$admin_id' AND komentar_id='$comment_id'");
                                                echo '<script>window.location="detail-image.php?id=' . $_GET['id'] . '"</script>';
                                            } else {
                                                echo 'gagal' . mysqli_error($conn);
                                            }
                                        }
                                    }
                                    ?>
                                <?php }
                            } else { ?>
                                <br>
                                <p>No Comments</p>
                            <?php } ?>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    </div>





    <script>
        function copyLink() {
            var dummy = document.createElement("input");
            var link = window.location.href;

            document.body.appendChild(dummy);
            dummy.value = link;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);

            alert("Link berhasil disalin: " + link);
        }

        function shareImage() {
            // Tambahkan logika share sesuai kebutuhan, bisa menggunakan fungsi JavaScript atau library sosial media sharing
            alert("Tombol Share ditekan. Implementasikan logika share di sini.");
        }
    </script>

    <!-- footer -->
    <?php include('footer.php'); ?>
</body>

</html>