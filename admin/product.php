<!DOCTYPE html>
<html>

<head>
    <title>Quản lý sản phẩm</title>
    <meta charset='utf8' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .table-san-pham {
            border-collapse: collapse;
            border: 2px solid #000;
            width: 90%;

        }

        .table-san-pham td,
        .table-san-pham th {
            border: 1px solid #000;
            padding: 5px;
        }

        .table-san-pham tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        <style>.table {
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        h2 {
            margin-bottom: 10px;
        }

        .add-button {
            margin-top: 15px;
            text-align: right;
        }

        .table-san-pham {
            margin-left: 50px;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
            '

        }
    </style>
</head>
<?php
echo "<script>";
echo "function confirmDelete(code_product) {";
echo "console.log(code_product);";
echo "if (confirm('Bạn thật sự muốn xóa sản phẩm có mã: ' + code_product + '? ')) {";
echo "window.location.href = 'delete_product.php?code_product=' + code_product;";
echo "}";
echo "}";
echo "</script>";
?>

<body>
    <?php
    include("../config.php");
    include_once("header_admin.php"); ?> </br>
    <div class="container">
        <h3 class="product-heading">DANH SÁCH SẢN PHẨM HIỆN CÓ</h3>
        <a href="add_product.php" class="btn btn-success add-button"><i class="fas fa-plus"
                style="color: #fefefe;"></i><b> Thêm
                sản phẩm</b></a>
    </div>
    <table width="50%" style="float: right;"> </br>

        <?php
        require_once "../config.php";
        $sql = "SELECT sp.tensp, sp.code_product, sp.price, sp.xuatxu, sp.image_sp FROM sanpham as sp ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) { ?>

            <table class="table-san-pham">
                <tr>
                    <td><b>STT</b></td>
                    <td><b>Tên sản phẩm</b></td>
                    <td><b>Mã sản phẩm</b></td>
                    <td><b>Giá</b></td>
                    <td><b>Xuất xứ</b></td>
                    <td><b>Hình ảnh</b></td>
                    <td><b>Thao tác </b></td>
                </tr>
                <?php
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td>
                            <?php echo $count; ?>
                        </td>
                        <td>
                            <?php echo $row["tensp"]; ?>
                        </td>
                        <td>
                            <?php echo $row["code_product"]; ?>
                        </td>
                        <td>
                            <?php echo $row["price"]; ?>
                        </td>
                        <td>
                            <?php echo $row["xuatxu"]; ?>
                        </td>
                        <td>
                            <?php $imageName = $row['image_sp'];
                            echo "<img src='../images/$imageName' width='150px'><br>"; ?>
                        </td>
                        <td align="center">
                            <a href='update.php'><i class="fas fa-pencil-alt" style="color: #3776e1;"></i>
                            <a href="#" class="fas fa-trash-alt" aria-hidden="true"
                                onclick="confirmDelete('<?php echo $row['code_product'] ?>')"></a>
                        </td>
                        <?php
                        $count = $count + 1;
                }
                ?>
            </table>
            <?php
        } else {
            echo "Khong tim thay!";
        }
        mysqli_close($conn);

        ?>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>

    <body>

</html>