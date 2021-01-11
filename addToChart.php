<?php
ob_start();
session_start();

if(isset($_POST['productId'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], $_POST['productId']);
    if(isset($_SESSION['productCountOnChart'])) {
        $_SESSION['productCountOnChart']++;
    } else
        $_SESSION['productCountOnChart'] = 1;
    return true;
}