<?php

    require_once "../config.php";
    $sql = "SELECT * FROM menu";
    echo "<option value='0' selected disabled>Chọn danh mục</option>";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['id_catalog'] ."'>" . $row['name_menu'] . "</option>";
        }
    } else {
        echo 'Không có dữ liệu';
    }

?>