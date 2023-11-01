<?php
    if (isset($_POST['num'])) {
        $_SESSION['cart'] = $_POST['num'];
    }
    var_dump( $_SESSION['cart']);
?>