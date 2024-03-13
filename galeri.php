<head>
    <style>
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .image-card {
            margin: 20px;
            padding: 10px;
            width: 20%;
            height: auto;
            text-align: center;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .image-card img {
            width: 100%;
            object-fit: cover;
            height: 90%;
        }

        .txt {
            text-align: center;
            font-size: 25px;
        }

        .dropdown-list span {
            color: black;
        }
    </style>
</head>
<?php
error_reporting(0);
include 'db.php';

session_start(); // Mulai sesi

// Inisialisasi variabel pencarian dan kategori
$search = "";
$kategori = "";
$where = ""; // Inisialisasi kondisi WHERE

// Periksa apakah formulir pencarian dikirim
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $where .= " AND (image_name LIKE '%$search%' OR image_description LIKE '%$search%')";
}

// Periksa apakah kategori terpilih
if (isset($_GET['kat'])) {
    $kategori = mysqli_real_escape_string($conn, $_GET['kat']);
    $where .= " AND category_id = '$kategori'";
}

// Tentukan apakah pengguna login
$user_logged_in = isset($_SESSION['status_login']) && $_SESSION['status_login'] == true;

// Jika pengguna tidak login, atur query untuk tidak mengambil gambar
if (!$user_logged_in) {
    // Redirect pengguna ke halaman login jika tidak login
    header("Location: login.php");
    exit; // Pastikan untuk keluar setelah mengarahkan pengguna
} else {
    // Ambil admin_id pengguna yang sedang login
    $admin_id = $_SESSION['a_global']->admin_id;

    // Kueri untuk mengambil foto sesuai dengan admin_id, kategori, dan filter pencarian
    $query = "SELECT * FROM tb_image WHERE image_status = 1 AND admin_id = '$admin_id'";
    $query .= $where;  // Sertakan kondisi $where di sini
    $query .= " ORDER BY image_id DESC";

    $foto = mysqli_query($conn, $query);
}
?>

<body>
    <?php
    include('header.php');
    ?>
    <br>

    <?php
    include('search.php');
    ?>

    <!-- new product -->
    <div class="containerr">
        <br>
        <h3 class="txt">Your Gallery</h3>
        <div class="gallery-container">
            <?php if (mysqli_num_rows($foto) > 0) : ?>
                <?php while ($image = mysqli_fetch_assoc($foto)) : ?>
                    <?php
                    // Memastikan hanya menampilkan foto yang diupload oleh pengguna yang sedang login
                    if ($image['admin_id'] == $admin_id) :
                    ?>
                        <div class="image-card">
                            <a href="detail-image.php?id=<?php echo $image['image_id']; ?>">
                                <img src="foto/<?php echo $image['image']; ?>" alt="<?php echo $image['image_name']; ?>">
                            </a>
                            <br>
                            <br>
                            <h4><?php echo $image['image_name']; ?></h4>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <br>
                <br>
                <h2>No Results</h2>
            <?php endif; ?>
        </div>
    </div>
    <!-- footer -->
    <?php include('footer.php'); ?>
</body>

</html>