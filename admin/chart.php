<?php
if (isset($_GET['index'])) {
    $temp = $_GET['index'];
    include("../config.php");
    include_once("header_admin.php");
    if($temp == 1){
        $sql = "SELECT DATE(DH.Ngay_dat_hang) AS ngay, SUM(DH.amount) AS tong_doanh_thu
    FROM donhang as DH
    GROUP BY ngay ORDER BY ngay LIMIT 30";
        $title = "tong_doanh_thu";
        $lable = "DOANH THU";
    }
    else{
        $sql = "SELECT DATE(DH.Ngay_dat_hang) AS ngay, COUNT(*) AS tong_don_hang
        FROM donhang as DH
        GROUP BY ngay
        ORDER BY ngay LIMIT 30";
        $title = "tong_don_hang";
        $lable = "SỐ ĐƠN HÀNG";
    }
    
   
    $res = mysqli_query($conn, $sql);
    $test = array();
    while ($row = mysqli_fetch_array($res)) {
        $test[] = array("label" => $row["ngay"], "y" => $row[$title]);
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>

window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1",
        title: {
            text: <?php echo '"' . $lable . ' TRONG 30 NGÀY GẦN NHẤT"'; ?>,
            fontColor: "#333", // Màu của tiêu đề
            fontSize: 20 // Kích thước của tiêu đề
        },
        axisX: {
            title: "Ngày",
            titleFontColor: "#333", // Màu của tiêu đề trục X
            titleFontSize: 20 // Kích thước của tiêu đề trục X
        },
        axisY: {
            title: <?php echo '"' . $lable . '"'; ?>,
            titleFontColor: "#333", // Màu của tiêu đề trục Y
            titleFontSize: 20 // Kích thước của tiêu đề trục Y
        },
        data: [{
            type: "column",
            indexLabelFontColor: "#5A5757",
            indexLabelPlacement: "outside",
            dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>