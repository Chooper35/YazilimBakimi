<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Add Product</title>
</head>
<body>

<?php
ob_start();
session_start();

include('../includes/database.php');

if (!isset($_SESSION['admin']))
    header("Location: /admin/");

include('../includes/adminNavigationBar.php');

if (isset($_POST['productName'], $_POST['productDescription'], $_POST['productPrice'])) {
    try {
        $imagesFolder = '../images/products/';
        $productImage = $imagesFolder . basename($_FILES['productImage']['name']);
        $image = basename($_FILES["productImage"]["name"]);
        move_uploaded_file($_FILES['productImage']['tmp_name'], $productImage);

        $query = $db->prepare(
        /** @lang text */ 'INSERT INTO products SET
                product_name = :productName,
                photo = :productPhoto,
                details = :productDescription,
                price = :productPrice');
        $insert = $query->execute(array(
            "productName" => $_POST['productName'],
            "productPhoto" => $image,
            "productDescription" => $_POST['productDescription'],
            "productPrice" => $_POST['productPrice']
        ));

        if ($insert) {
            $_SESSION['productAdded'] = '<div class="container col-6 mt-5"><div class="alert alert-success" role="alert">
                 Product added successfully
               </div></div>';
        }

        header('Location: ' . $_SERVER["PHP_SELF"], true, 303);
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

if (isset($_SESSION['productAdded'])) {
    echo $_SESSION['productAdded'];
}
?>

<div class="container col-9 mt-4">
    <h2 class="text-center"> Add Product </h2>

    <div class="col-12">
        <form action="" method="post" class="bg-dark text-white p-4 mt-3" enctype="multipart/form-data"
              style="border-radius: 10px">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input id="productName" name="productName" class="form-control" type="text"
                       placeholder="Enter product name here..">
            </div>
            <div class="form-group">
                <label for="productDescription">Product Description</label>
                <textarea id="productDescription" name="productDescription" class="form-control" rows="4" placeholder="Enter product details here.."></textarea>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" class="form-control-file" id="productImage" name="productImage">
            </div>
            <div class="form-group">
                <label for="productPrice">Product Price</label>
                <input id="productPrice" name="productPrice" class="form-control" type="text"
                       placeholder="Enter product price here..">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

</body>
</html>


<?php
unset($_SESSION['productAdded']);
ob_end_flush();

?>