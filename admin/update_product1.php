<?php
if (isset($_GET['ma_sp'])) {
    require_once "../config.php";
    $ma_sp = $_GET["ma_sp"];
    $sp_gia = $_POST["gia"];
    $sp_giamgia = $_POST["giamgia"];
    $sp_xuatxu = $_POST["xuatxu"];
    
    // Kết nối CSDL ở đây
    // Khai báo biến $conn là biến kết nối CSDL

    $sql = "UPDATE sanpham SET price = '$sp_gia', discount = '$sp_giamgia', xuatxu = '$sp_xuatxu' WHERE id_sanpham = '$ma_sp'";
    $result = mysqli_query($conn, $sql);
   
    mysqli_close($conn);
    if ($result>0) {
        echo "Cập nhật thông tin sản phẩm thành công.";
        header('Location: product.php');
    } else {
        echo "Có lỗi xảy ra khi cập nhật thông tin sản phẩm: " . mysqli_error($conn);
    }

    // Đóng kết nối CSDL ở đây
}
else {?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .btn {
            padding: auto;
        }
    </style>
</head>
<body class="m-3">
<?php

    require_once "../config.php";
    $ma_sp = $_GET['id_sanpham'];
    $sql = "SELECT * FROM sanpham WHERE id_sanpham = $ma_sp";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    ?>
    <h2>CẬP NHẬT THÔNG TIN SẢN PHẨM</h2>
    <form action="upload_image.php" method="post" name="addProduct" class="col-2" enctype="multipart/form-data">
        <div class="form-group m-2">
            <label for="inputInfor" class="col-10">Tên sản phẩm:</label>
            <input class="form-control" type="text" name="ten_sp" placeholder=" " />
        </div>
        <div class="form-group m-2">
            <label for="id_sanpham" class="col-10">Mã sản phẩm:</label>
            <input class="form-control" type="text" name="ma_sp" placeholder=" " value='<?php echo $data['id_sanpham']; ?>' disabled />
        </div>
        <div class="form-group m-2">
            <label for="gia" class="col-10">Giá sản phẩm:</label>
            <input class="form-control" type="text" name="gia" placeholder=" " value='<?php echo $data['price']; ?>' />
        </div>
        <div class="form-group m-2">
            <label for="mo_ta" class="col-10">Mô tả sản phẩm:</label>
            <textarea class="form-control" name="mo_ta" cols="23" rows="3"><?php echo $data['description']; ?></textarea>
        </div>
        <div class="form-group m-2">
            <label for="content" class="col-10">Nội dung sản phẩm:</label>
            <textarea class="form-control" name="content" cols="23" rows="3"><?php echo $data['content']; ?></textarea>
        </div>
        <div class="form-group m-2">
            <label for="giamgia" class="col-10">Giảm giá sản phẩm:</label>
            <input class="form-control" type="text" name="giamgia" placeholder=" " value='<?php echo $data['discount']; ?>' />
        </div>
        <div class="form-group m-2">
            <label for="xuatxu" class="col-10">Xuất xứ sản phẩm:</label>
            <input class="form-control" type="text" name="xuatxu" placeholder=" " value='<?php echo $data['xuatxu']; ?>' />
        </div>
        <div class="form-group m-2">
            Chọn hình ảnh sản phẩm:
            <input type="file" name="hinh_sp" id="fileToUpload">
        </div>
        <input type="submit" value="Lưu" class="btn btn-primary m-3" />
        <a href="product.php" class="btn btn-primary" role="button" data-bs-toggle="button">Thoát</a>
    </form>
</body>
<?php
}
}
?>
</html>