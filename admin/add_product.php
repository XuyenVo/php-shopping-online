<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .btn {
            padding: auto;
        }
    </style>
</head>
<?php
if (isset($_POST['ten_sp'])) {
    require_once "../config.php";
    $tenSanpham = $_POST["ten_sp"];
    $maSanpham = $_POST["ma_sp"];
    $gia = $_POST["gia"];
    $mota = $POST["mo_ta"];
    $content = $POST["content"];
    $giamgia = $POST["giamgia"];
    $xuatxu = $_POST["xuatxu"];
    $hinh = $POST["hinh"];
    $size = $POST["size"];
    $color = $POST["color"];
    $parent = $POST["parent_name_menu"];
    $sql = "insert into sanpham(tensp, code_product, price, description, content, discount, image_sp, xuatxu, sizess, mausac, parent_name_menu) 
                               values()";
    $result = mysqli_query($conn, $sql);
    header("Location: web_qlnv.php"); //chuyển hướng
} else {
    ?>

    <body class="m-3">
        <h2>THÊM SẢN PHẨM MỚI</h2>
        <form action="add_product.php" method="post" name="addProduct" class="col-2">
            <div class="form-group m-2">
                <label for="inputInfor" class="col-10">Tên sản phẩm:</label>
                <input class="form-control" type="text" name="ten_sp" placeholder=" " />
            </div>
            <div class="form-group m-2">
                <label for="inputInfor" class="col-10">Mã sản phẩm:</label>
                <input class="form-control" type="text" name="ma_sp" placeholder=" " />
            </div>
            <div class="form-group m-2">
                <label for="inputInfor" class="col-10">Giá sản phẩm:</label>
                <input class="form-control" type="text" name="gia" placeholder=" " />
            </div>
            <div class="form-group m-2">
                <label for="inputInfor" class="col-10">Mô tả sản phẩm:</label>
                <textarea class="form-control" name="mo_ta" cols="23" rows="3"></textarea>
            </div>
            <div class="form-group m-2">
                <label for="inputInfor" class="col-10">Nội dung sản phẩm:</label>
                <textarea class="form-control" name="content" cols="23" rows="3"></textarea>
            </div>
            <div class="form-group m-2">
                <label for="inputInfor" class="col-10">Giảm giá sản phẩm:</label>
                <input class="form-control" type="text" name="giamgia" placeholder=" " />
            </div>
            <div class="form-group m-2">
                <label for="inputInfor" class="col-10">Xuất xứ sản phẩm:</label>
                <input class="form-control" type="text" name="xuatxu" placeholder=" " />
            </div>
            <input type="submit" value="Lưu" class="btn btn-primary m-3" />
            <a href="web_qlnv.php" class="btn btn-primary" role="button" data-bs-toggle="button">Thoát</a>

        </form>
    </body>
    <?php
}
?>