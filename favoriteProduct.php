<?php 
ob_start();
session_start();
include('includes/database.php');

if(isset($_POST['userId'], $_POST['productId'])) {
    $query = $db->prepare(
        /** @lang text */ 'INSERT INTO favorites SET
                `user_id` = :userId,
                product_id = :productId');
        $insert = $query->execute(array(
            "userId" => $_POST["userId"],
            "productId" => $_POST["productId"]
        ));

        if ($insert) {
            echo "success";
            exit();
        }
        echo "Error!";
}

?>