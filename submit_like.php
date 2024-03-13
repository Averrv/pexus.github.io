<?php
session_start();
include 'db.php'; // Pastikan untuk menggunakan file koneksi database yang benar

if (isset($_POST['submit_like'])) {
    $image_id = $_POST['image_id'];
    $user_id = $_SESSION['id']; // Menggunakan ID pengguna dari sesi (session)

    // Cek jika user sudah like
    $check_like = mysqli_query($conn, "SELECT * FROM tb_likes WHERE image_id = '$image_id' AND admin_id = '$user_id'");
    if (mysqli_num_rows($check_like) == 0) {
        // Jika belum like, tambahkan like
        $query = "INSERT INTO tb_likes (image_id, admin_id) VALUES ('$image_id', '$user_id')";
        if (mysqli_query($conn, $query)) {
            echo "Like berhasil!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        // Jika sudah like, lakukan unlike
        $query_unlike = "DELETE FROM tb_likes WHERE image_id = '$image_id' AND admin_id = '$user_id'";
        if (mysqli_query($conn, $query_unlike)) {
            echo "Unlike berhasil!";
        } else {
            echo "Error: " . $query_unlike . "<br>" . mysqli_error($conn);
        }
    }

    // Redirect kembali ke halaman detail gambar
    header("Location: detail-image.php?id=" . $image_id);
} else {
    // Redirect kembali ke index jika tidak ada data POST
    header("Location: index.php");
}
