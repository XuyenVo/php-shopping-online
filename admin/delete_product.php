<?php
$code_product = isset($_GET['code_product']) ? $_GET['code_product'] : -1;
if ($code_product == -1) {
    header("Location: product.php");
} else {
    require_once "../config.php";
    $sql = "DELETE FROM sanpham WHERE code_product = ".$code_product;
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header("Location: product.php");
    } else {
        echo  "Dữ liệu chưa được xóa!" . mysqli_error($conn);
        
    }
}
?>
