<?php
include 'db.php';

// Fungsi untuk mendapatkan nama kategori berdasarkan ID
function get_category_name($conn, $category_id)
{
    $result = mysqli_query($conn, "SELECT category_name FROM tb_category WHERE category_id = $category_id");
    $row = mysqli_fetch_assoc($result);
    return $row['category_name'];
}

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM user WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);

error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM user WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);

// Logika Pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['kat']) ? $_GET['kat'] : '';
$where = '';

if ($search != '' || $category != '') {
    $where = "AND image_name LIKE '%" . $search . "%'";
    if ($category != '') {
        $where .= " AND category_id = $category";
    }
}

// Ambil kategori dari database
$categories = mysqli_query($conn, "SELECT * FROM tb_category");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PEXUS</title>
    <link rel="icon" href="img/favicon2.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <style>
        h1.namatitle {
            margin-top: 5px;
        }
    </style>
</head>

<!-- header -->
<header>
    <div class="container">
        <h1 class="namatitle"><a href="index.php"><img src="img/favicon2.png" alt="" width="35px">PEXUS</a></h1>
        <ul>
            <?php
            // Mulai session (pastikan ini dipanggil sebelum output apapun ke browser)

            // Periksa apakah pengguna sudah login
            if (isset($_SESSION['status_login']) && $_SESSION['status_login'] === true) {
                // Jika sudah login, tampilkan tombol logout
                echo '<li><a href="galeri.php">Gallery</a></li>';

                echo '<li><a href="data-image.php">Photos</a></li>';
                echo '<li><a href="profil.php">Profile</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                // Jika belum login, tampilkan tombol login dan registrasi
                echo '<li><a href="register.php">Register</a></li>';
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
        </ul>
    </div>
</header>

</html>