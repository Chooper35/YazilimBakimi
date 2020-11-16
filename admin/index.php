<?php
ob_start();
session_start();

if(!isset($_SESSION['admin'])) {
    header("Location: /admin/admin_login");
} else
    header("Location: /admin/add_product");

?>
