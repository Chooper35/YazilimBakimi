<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Shop App</title>
</head>
<body>

<?php
ob_start();
session_start();
include('includes/navigationBar.php');
include('includes/database.php');
?>

<div class="container col-9 mt-4">
    <h2 class="text-center"> Products </h2>

    <div class="col-12 ml-auto mr-auto mt-4">
        <div class="row text-center">
        <?php
            $query = $db->query(/** @lang text */ "SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
            if ($query) :
                foreach ($query as $product) :
        ?>
            <div class="col-12 col-md-6 col-lg-4 border">
                <div class="productImage mb-2"><img src="/images/products/<?=$product['photo']?>" alt="<?=$product['photo']?>" width="220px" height="180px"></div>
                <div class="productName mb-1"> <?=$product['product_name']?> </div>
                <div class="productDetails mb-1"> <?=$product['details']?> </div>
                <div class="productPrices"> <?=$product['price']?> </div>
                <button id="<?=$product['id']?>" class="btn btn-primary mt-3 mb-3" onclick="addToChart(this.id, <?=$product['id']?>)" <?php if(isset($_SESSION['cart']) && in_array($product['id'], $_SESSION['cart'])) echo 'style="display:none"' ?>> Add to Chart </button>
                <button <?php if(isset($_SESSION['cart']) && in_array($product['id'], $_SESSION['cart'])) echo 'style="display:inline"'; else echo 'style="display:none"'; ?>  id="<?=$product['id']?>remove" class="btn btn-danger mt-3 mb-3" onclick="removeFromChart(this.id, <?=$product['id']?>)"> Remove From Chart </button>
            </div>

        <?php
            endforeach;
            else :
            print '<div class="container col-6 mt-5"><div class="alert alert-danger" role="alert">
                    Username or password wrong!
                    </div></div>';
            endif;
        ?>

        </div>
    </div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="script.js"></script>

</body>
</html>