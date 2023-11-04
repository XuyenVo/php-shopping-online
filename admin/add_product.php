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
    <h2>THÊM SẢN PHẨM MỚI</h2>
    <form action="upload_image.php" method="post" name="addProduct" class="col-2" enctype="multipart/form-data">
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
            <label for="inputInfor" class="col-10">Giảm giá sản phẩm:</label>
            <input class="form-control" type="text" name="giamgia" placeholder=" " />
        </div>
        <div class="form-group m-2">
            <label for="inputInfor" class="col-10">Xuất xứ sản phẩm:</label>
            <input class="form-control" type="text" name="xuatxu" placeholder=" " />
        </div>
        <div class="form-group m-2">
            <label for="inputInfor" class="col-10">Loại sản phẩm:</label>
            <select class="form-control" type="text" name="id_sub" placeholder=" ">
                <?php include 'select_loaisanpham.php'; ?>
            </select>
        </div>
        <div class="form-group m-2">
            <label for="inputInfor" class="col-10">Danh mục sản phẩm:</label>
            <select class="form-control" type="text" name="id_catalog" placeholder=" ">
                <?php include 'select_danhmuc.php'; ?>
            </select>
        </div>
        <div class="form-group m-2">
            Chọn hình ảnh sản phẩm:
            <input type="file" name="hinh_sp" id="fileToUpload">
        </div>

        <br>
        <input type="submit" name="submit" value="Lưu" class="btn btn-primary" />
        <a href="product.php" class="btn btn-primary" role="button" data-bs-toggle="button">Thoát</a>

    </form>
</body>