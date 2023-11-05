<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<?php
$maSanpham = isset($_GET['code_product']) ? $_GET['code_product'] : -1;
if ($maSanpham == -1) {
    header("Location: product.php");
}
// if no la lenh edit (pencil click)
require_once "../config.php";
$sql = "SELECT * FROM sanpham WHERE code_product = $maSanpham";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <body class="m-3">
            <h2>Cập nhật thông tin sản phẩm</h2>
            <form action="update.php" method="post" class="col-2" enctype="multipart/form-data">
                <div class="form-group m-2">
                    Cập nhật ảnh sản phẩm:
                    <img src="../images/<?php echo $row["image_sp"]; ?>" alt="hinh_sp" width="100px" height="100px">
                    <input type="file" name="hinh_sp" id="fileToUpload" />
                </div>
                <div class="form-group m-2">
                    <label for="inputInfor" class="col-10">Tên sản phẩm:</label>
                    <input class="form-control" type="text" name="ten_sp" value="<?php echo $row["tensp"]; ?>" />
                </div>
                <div class="form-group m-2">
                    <label for="inputInfor" class="col-10">Mã sản phẩm:</label>
                    <input class="form-control" type="text" name="ma_sp" value="<?php echo $row["code_product"]; ?>" />
                </div>
                <div class="form-group m-2">
                    <label for="inputInfor" class="col-10">Giá sản phẩm:</label>
                    <input class="form-control" type="text" name="gia" value="<?php echo $row["price"]; ?>" />
                </div>
                <div class="form-group m-2">
                    <label for="inputInfor" class="col-10">Mô tả sản phẩm:</label>
                    <textarea class="form-control" name="mo_ta" cols="23" rows="3"><?php echo $row["description"]; ?></textarea>
                </div>
                <div class="form-group m-2">
                    <label for="inputInfor" class="col-10">Giảm giá sản phẩm:</label>
                    <input class="form-control" type="text" name="giamgia" value="<?php echo $row["discount"]; ?>" />
                </div>
                <div class="form-group m-2">
                    <label for="inputInfor" class="col-10">Xuất xứ sản phẩm:</label>
                    <input class="form-control" type="text" name="xuatxu" value="<?php echo $row["xuatxu"]; ?>" />
                </div>
                <div class="form-group m-2">
                    <label for="inputInfor" class="col-10">Loại sản phẩm:</label>
                    <select class="form-control" type="text" name="id_sub" value="<?php echo $row["id_sub"]; ?>">
                        <?php include 'select_loaisanpham.php'; ?>
                    </select>
                </div>
                <div class="form-group m-2">
                    <label for="inputInfor" class="col-10">Danh mục sản phẩm:</label>
                    <select class="form-control" type="text" name="id_catalog">
                        <?php include 'select_danhmuc.php';?>
                    </select>
                </div>


                <input type="submit" value="Lưu" name="submit" class="btn btn-primary m-3" />
                <a href="product.php" class="btn btn-secondary " role="button" data-bs-toggle="button">Thoát</a>

            </form>
        </body>

        <?php
    }
} else {
    echo "Không thể truy vấn sản phẩm có mã: " . $maSanpham . "!";
    header("Location: product.php");
}
mysqli_close($conn);


?>