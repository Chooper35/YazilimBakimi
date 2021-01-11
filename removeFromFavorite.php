<?php 
ob_start();
session_start();
include('includes/database.php');

if(isset($_POST['userId'], $_POST['productId'])) {
        $query = $db->prepare("DELETE FROM favorites WHERE `user_id` = :userId AND product_id = :productId");
        $delete = $query->execute(array(
            'userId' => $_POST['userId'],
            'productId' => $_POST['productId']
        ));

        if ($delete) {
            echo "success";
            exit();
        }
        echo "Error!";
}

?>