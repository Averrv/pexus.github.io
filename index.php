<?php
session_start();
include 'db.php';
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
    $where = "AND image_name LIKE '%" . $search . "%' AND category_id LIKE '%" . $category . "%' ";
}

$foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 $where ORDER BY image_id DESC");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<?php
include('header.php');
?>
<br><br>
<?php
include('search.php');
?>

<body>
    <br><br> <!-- category -->
    <div class="photos">
        <h2>Photos</h2>
    </div>
    <br>
    <!-- new product -->
    <div class="container2">
        <div class="box">
            <?php
            if (mysqli_num_rows($foto) > 0) {
                while ($p = mysqli_fetch_array($foto)) {
            ?>
                    <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
                        <div class="col-4">
                            <img src="foto/<?php echo $p['image'] ?>" height="auto" />
                        </div>
                    </a>
                <?php
                }
            } else {
                ?>
                <p>Foto tidak ada</p>
            <?php
            }
            ?>
        </div>
    </div>
    <br><br>
    <br>
    <?php
    include('footer.php');
    ?>
</body>

</html>