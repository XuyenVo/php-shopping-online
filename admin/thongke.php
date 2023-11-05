<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <style>
        a
        {
            text-decoration: none;
        }
        /* Common CSS for all widgets */
        .col-md-6 {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }

        .widget-small {
            background-color: #7C9070;
            border: 1px solid #e6e6e6;
            text-align: center;
            padding: 15px;
            margin-top: 15px;
            color: #fff;
        }

        .widget-small i {
            font-size: 3em;
        }

        /* Specific CSS for each widget */
        .widget-small.primary {
            background-color: #7C9070;
        }

        .widget-small.info {
            background-color: #17a2b8;
        }

        .widget-small.warning {
            background-color: #ffc107;
        }

        .widget-small.danger {
            background-color: #dc3545;
        }

        .info-tong {
            color: black;
        }

        .badge.bg-info {
            background-color: #17a2b8;
        }

        .badge.bg-warning {
            background-color: #ffc107;
        }

        .badge.bg-success {
            background-color: #28a745;
        }

        .badge.bg-danger {
            background-color: #dc3545;
        }

        .table {
            background-color: #fff;
            border: 1px solid #e6e6e6;
        }

        .table thead th {
            background-color: #7C9070;
            color: #fff;
        }

        .table tbody tr:hover {
            background-color: #9CA777;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }
        .widget-small.danger.coloured-icon {
            background-color: lightgreen; /* Change to your desired light green color */
            border: 1px solid #e6e6e6;
            text-align: center;
            padding: 15px;
            margin-top: 15px;
            color: #fff;
        }
        
        
    </style>
</head>
<body>
    <?php
    include("../config.php");
    include_once("header_admin.php");
    
    // Query to get the count of customers (LEVEL = 3)
    $sqlkh = "SELECT COUNT(*) as customer_count FROM user WHERE LEVEL = 3";
    $result = mysqli_query($conn, $sqlkh);
    $row = mysqli_fetch_assoc($result);
    $customerCount = $row['customer_count'];

    // Query to get the count of products
    $sqlsp = "SELECT COUNT(*) as product_count FROM sanpham";
    $result = mysqli_query($conn, $sqlsp);
    $row = mysqli_fetch_assoc($result);
    $productCount = $row['product_count'];

    // Query to get the count of orders
    $sqldh = "SELECT COUNT(*) as order_count FROM donhang WHERE YEAR(Ngay_dat_hang) =YEAR(CURRENT_DATE)";
    $result = mysqli_query($conn, $sqldh);
    $row = mysqli_fetch_assoc($result);
    $orderCount = $row['order_count'];
    

    $sqlds = "SELECT SUM(CT.chitiet_tonggia) as sumRevenue FROM chitietdonhang CT JOIN donhang DH ON CT.id_donhang = DH.id
    WHERE YEAR(DH.Ngay_dat_hang) = YEAR(CURRENT_DATE)";
    $result = mysqli_query($conn, $sqlds);
    $row = mysqli_fetch_assoc($result);
    $so_tien_dong = $row['sumRevenue'];
    $sumRevenue = number_format($so_tien_dong / 1000000, 3)
    ?>


    <div class="row">
        <div class="col-md-6">
            <div class="widget-small primary coloured-icon" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); border-radius: 5px; cursor: pointer;>
                <i class="bx bxs-user-account fa-3x"></i>
                <div class="info">
                    <h4>Tổng khách hàng</h4>
                    <p><b><?php echo $customerCount ?> khách hàng</b></p>
                    <p class="info-tong">Tổng số khách hàng được quản lý.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <a href="product.php" style="text-decoration: none;">
                <div class="widget-small info coloured-icon" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); border-radius: 5px; cursor: pointer;>
                    <i class="bx bxs-data fa-3x"></i>
                    <div class="info">
                        <h4>Tổng sản phẩm</h4>
                        <p><b><?php echo $productCount ?> sản phẩm</b></p>
                        <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
        <a href="chart.php?index=2" style="text-decoration: none;">
            <div class="widget-small warning coloured-icon" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); border-radius: 5px; cursor: pointer;>
                <i class="bx bxs-shopping-bags fa-3x"></i>
                <div class="info">
                    <h4>Tổng đơn hàng</h4>
                    <p><b><?php echo $orderCount ?> đơn hàng</b></p>
                    <p class="info-tong">Tổng số hóa đơn bán hàng trong năm.</p>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-6">
            <a href="chart.php?index=1" style="text-decoration: none;">
                <div class="widget-small danger coloured-icon" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); border-radius: 5px; cursor: pointer;>
                    <i class="bx bxs-error-alt fa-3x" ></i>
                    <div class="info">
                        <h4>Tổng doanh thu</h4>
                        <p><b><?php echo $sumRevenue?> triệu đồng</b></p>
                        <p class="info-tong">Tổng doanh thu của shop trong năm 2023</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</body>
</html>