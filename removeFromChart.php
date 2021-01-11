<?php
ob_start();
session_start();

if(isset($_POST['productId'])) {
    if (isset($_SESSION['cart'])) {
        $key = array_search($_POST['productId'],$_SESSION['cart']);
        if($key!==false) {
            unset($_SESSION['cart'][$key]);
        } else
            return false;
    }
    if(isset($_SESSION['productCountOnChart'])) {
        $_SESSION['productCountOnChart']--;
    } 
    return false;
}