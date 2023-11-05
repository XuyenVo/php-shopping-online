<?php
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["hinh_sp"]["name"]);
echo $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {

  $check = getimagesize($_FILES["hinh_sp"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["hinh_sp"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["hinh_sp"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["hinh_sp"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }


  require_once "../config.php";
  $tenSanpham = $_POST["ten_sp"];
  $maSanpham = $_POST["ma_sp"];
  $gia = $_POST["gia"];
  $mota = $_POST["mo_ta"];
  $giamgia = $_POST["giamgia"];
  $xuatxu = $_POST["xuatxu"];
  $imgNameSanpham = basename($_FILES["hinh_sp"]["name"]);
  $parent = $_POST["parent_name_menu"];
  $maDanhmuc = $_POST["id_catalog"];
  $maLoai = $_POST["id_sub"];
  $sql = "insert into sanpham(tensp, code_product, price, description, discount, image_sp, xuatxu, parent_name_menu, id_sub, id_catalog) 
                             values('$tenSanpham', '$maSanpham','$gia','$mota','$giamgia','$imgNameSanpham','$xuatxu','$parent','$maLoai','$maDanhmuc')";
  $result = mysqli_query($conn, $sql);
  header("Location: product.php");
}
?>