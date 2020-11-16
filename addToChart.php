<?php
ob_start();
session_start();

if(isset($_POST['productId'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], $_POST['productId']);
    return true;
}


