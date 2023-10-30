<!DOCTYPE html>
    <head>
    
    </head>
    <body>

        <?php

        include "apps/config.php";
        //Kiểm tra - thông báo lỗi
        if(isset($_POST["btnxacnhan"]))
        {
            $email= $_POST["email"];
            //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt
            //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
            if ($email== "")
            {
                $errors =  '<div id="errformlg" style="">
                        Các trường không được để trống!
                        </div>';
            }
            else
            {
                $query = mysqli_query($conn,"select * from user where email = '$email'");
                $items_query = mysqli_fetch_array($query);
                $num_rows = mysqli_num_rows($query);
                if ($num_rows==0) {
                    $errors =  '<div id="errformlg">
                                Email đã đăng nhập không đúng !
                            </div>';
                }
                else
                {     
                    header('Location: changepwd.php');
                }
            }
        }
        ?>
        <!DOCTYPE HTML>
        <html lang="vi">
        <?php include "apps/libs/header.php"; ?>
        <body>
        <!--ĐĂNG NHẬP-->
        <div class="login-box">
            <div class="acctitle">
                <i class="fa fa-lock"></i>
                   QUÊN MẬT KHẨU
            </div>
            <form method="post" class="signin" action="forgetpwd.php">
                <fieldset class="textbox">
                    <label class="user_name">
                        <span>Nhập email</span>
                        <input type="text" name="email" id="email" value=""/>
                    </label>
                    <button class="submit button" type="submit" name="btnxacnhan">Xác nhận</button>

                    <div class="dk-qmk">
                        <a class="register" href="login.php">Quay lại</a>
                    </div>
                </fieldset>
            </form>

        </div><!--end login-->
        <?php
        if(!empty($errors)) echo $errors;
        ?>

        <?php include ("apps/libs/footer.php");

        ?>
    </body>
</html>