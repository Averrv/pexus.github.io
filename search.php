<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .scontainer {
            width: 80%;
            margin: 0 auto;
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
        }

        .search {
            text-align: center;
            flex-grow: 1;
            margin-left: -70px;
        }

        .search input[type=text] {
            width: 35%;
            padding: 13px;
            border-radius: 30px;
            margin-right: 5px;
            /* Mengurangi margin untuk mendekatkan elemen */
        }

        .search input[type=submit] {
            padding: 15px;
            width: 10%;
            border-radius: 30px;
            background-color: #2b2b2b;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .search input[type=submit]:hover {
            padding: 15px;
            width: 10%;
            border-radius: 30px;
            background-color: #afafaf;
            color: #2b2b2b;
            border: none;
            cursor: pointer;
        }

        .dropdown-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            list-style-type: none;
        }

        .category-dropdown {
            padding: 8px;
            font-size: 16px;
            margin-right: 5px;
            /* Mengurangi margin untuk mendekatkan elemen */
        }
    </style>
</head>

<body>
    <!-- kategori dan search container -->
    <div class="scontainer">
        <div class="search-container">
            <!-- Tampilkan dropdown kategori -->
            <div class="dropdown-container">
                <form action="index.php" method="GET">
                    <select name="kat" class="category-dropdown" onchange="this.form.submit()">
                        <option value="">Select Category</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($categories)) {
                            $selected = ($row['category_id'] == $category) ? 'selected' : '';
                            echo '<option value="' . $row['category_id'] . '" ' . $selected . '>' . $row['category_name'] . '</option>';
                        }
                        ?>
                    </select>
                </form>
            </div>

            <!-- Form pencarian -->
            <div class="search">
                <form action="index.php" method="get">
                    <input type="text" name="search" placeholder="Search" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" />
                    <input type="hidden" name="kat" value="<?php echo htmlspecialchars($_GET['kat'] ?? ''); ?>" />
                    <input type="submit" name="cari" value="Search" />
                </form>
            </div>
        </div>
    </div>
    <!-- Konten lainnya -->
    <!-- ... -->
</body>

</html>