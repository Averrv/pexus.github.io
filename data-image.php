<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<head>
    <style>
        .container7 {
            max-width: 80%;
            margin: 0 auto;
        }

        .boxdi {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            box-sizing: border-box;
            margin: 10px 0 25px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .namalogin h2 {
            margin: 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }

        .btn4 {
            background-color: #2b2b2b;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn4:hover {
            background-color: #585858;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #2b2b2b;
            color: #fff;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table a {
            text-decoration: none;
            color: #007bff;
        }

        .table a:hover {
            text-decoration: underline;
        }

        .head-image img {
            max-width: 100%;
            height: auto;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table img {
            max-width: 100%;
            height: auto;
            width: 200px;
            /* Atur lebar gambar sesuai kebutuhan Anda */
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php
    include('header.php');
    ?>

    <!-- content -->
    <div class="section">
        <div class="container7">
            <div class="boxdi">
                <div class="namalogin">
                    <h2>Your Data</h2>
                </div>
                <br>
                <input type="button" class="btn4" id="kembali-btn" value="Add Photo" onclick="window.location.href='tambah-image.php';">
                <br>
                <br>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                            <th width="120px">Category</th>
                            <th>Username</th>
                            <th width="120px">Photo Name</th>
                            <th width="250px">description</th>
                            <th>Photos</th>
                            <th>Status</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $user = $_SESSION['a_global']->admin_id;
                        $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE admin_id = '$user' ");
                        if (mysqli_num_rows($foto) > 0) {
                            while ($row = mysqli_fetch_array($foto)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td><?php echo $row['admin_name'] ?></td>
                                    <td><?php echo $row['image_name'] ?></td>
                                    <td><?php echo $row['image_description'] ?></td>
                                    <td><a href="foto/<?php echo $row['image'] ?>" target="_blank"><img src="foto/<?php echo $row['image'] ?>"></a></td>
                                    <td><?php echo ($row['image_status'] == 0) ? 'Not Active' : 'Active'; ?></td>
                                    <td>
                                        <a href="edit-image.php?id=<?php echo $row['image_id'] ?>">Edit</a> ||
                                        <a href="proses-hapus.php?idp=<?php echo $row['image_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')">Delete</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="8">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include('footer.php');
    ?>

</body>

</html>