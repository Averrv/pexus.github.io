<!-- <?php
include 'db.php';
session_start();

if (isset($_POST['like_submit'])) {
   // Pastikan 'admin_id' diatur dan tidak kosong
   if (isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])) {
      $image_id = isset($_POST['like_id']) ? (int)$_POST['like_id'] : 0; // Konversi ke integer
      $admin_id = $_SESSION['admin_id'];

      // Peroleh informasi admin dari user
      $admin_info_query = mysqli_query($conn, "SELECT * FROM user WHERE admin_id = '$admin_id'");
      $admin_info = mysqli_fetch_assoc($admin_info_query);

      if ($admin_info) {
         // Cek apakah sudah dilike sebelumnya
         $cek_query = mysqli_query($conn, "SELECT * FROM tb_like WHERE image_id='$image_id' AND admin_id='$admin_id'");

         if (!$cek_query) {
            die("Query Error: " . mysqli_error($conn));
         }

         $cek = mysqli_num_rows($cek_query);

         if ($cek == 0) {
            // Jika belum dilike, tambahkan like
            $tanggal = date('Y-m-d');
            $like_query = mysqli_query($conn, "INSERT INTO tb_like (image_id, admin_id, tanggallike) VALUES ('$image_id', '$admin_id', '$tanggal')");

            if ($like_query) {
               header("Location: ?url=detail&&id=$image_id");
            } else {
               die("Query Error: " . mysqli_error($conn));
            }
         } else {
            // Jika sudah dilike, lakukan dislike
            $dislike_query = mysqli_query($conn, "DELETE FROM tb_like WHERE image_id='$image_id' AND admin_id='$admin_id'");

            if ($dislike_query) {
               header("Location: ?url=detail&&id=$image_id");
            } else {
               die("Query Error: " . mysqli_error($conn));
            }
         }
      } else {
         // Tangani jika admin tidak ditemukan
         echo "Informasi admin tidak ditemukan.";
      }
   } else {
      // Tangani jika 'admin_id' tidak diatur atau kosong
      echo "Sesi 'admin_id' tidak diatur atau kosong.";
   }
} -->
