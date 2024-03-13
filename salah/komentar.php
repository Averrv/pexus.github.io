<!-- <?php
$image_id = @$_GET["image_id"];
$admin_id = @$_SESSION["admin_id"];
$komentar_id = @$_GET['komentar_id'];
$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_komentar WHERE admin_id='$admin_id' AND image_id='$image_id' AND komentar_id='$komentar_id'"));
if ($cek > 0) {
   $delete = mysqli_query($conn, "DELETE FROM tb_komentar WHERE komentar_id='$komentar_id'");
   echo '<script>alert("Anda berhasil menghapus komentar ini");</script>';
   echo '<meta http-equiv="refresh" content="0; url=?url=detail&&id=' . @$image_id . '">';
} else {
   // User is not allowed to delete the comment
   $alert = 'Gagal hapus komentar';
   echo '<script>alert("Anda tidak berhak menghapus komentar ini");</script>';
   echo '<meta http-equiv="refresh" content="0; url=?url=detail&&id=' . @$image_id . '">';
} -->
