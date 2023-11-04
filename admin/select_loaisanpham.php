<?php
require_once "../config.php";
$sql = "SELECT id_sub, name_sub FROM sub_menu";
echo "<option value='0' selected disabled>Chọn loại sản phẩm</option>";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $output = array();
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['id_sub'] . "'>" . $row['name_sub'] . "</option>";
        
    }
} else {
    echo 'Không có dữ liệu';
}
?>x`