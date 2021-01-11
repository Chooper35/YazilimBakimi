<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Cart</title>
</head>

<body>

    <?php
ob_start();
session_start();
include('includes/navigationBar.php');
include('includes/database.php');
?>

    <div class="container col-9 mt-4">
        <h2 class="text-center"> Products
            <?php if(isset($_SESSION['productCountOnChart'])): ?>
            <span class="badge badge-primary">
                <?php echo $_SESSION['productCountOnChart'];?>
            </span>
            <?php endif; ?>
        </h2>

        <div class="col-12 ml-auto mr-auto mt-4">
            <div class="row text-center">
                <?php
            $totalPrice = 0;
            $temp = 0; // PRODUCT COUNT
            if(isset($_SESSION['cart'])) {
                foreach($_SESSION['cart'] as $cartItem):
                    $query = $db->query(/** @lang text */ "SELECT * FROM products WHERE id=$cartItem")->fetch(PDO::FETCH_ASSOC);
                    if ($query) :
                        $temp++;
                            ?>
                <div class="col-12 col-md-6 col-lg-4 border">
                    <div class="productImage mb-2"><img src="/images/products/<?=$query['photo']?>"
                            alt="<?=$query['photo']?>" width="220px" height="180px"></div>
                    <div class="productName mb-1"> <?=$query['product_name']?> </div>
                    <div class="productDetails mb-1"> <?=$query['details']?> </div>
                    <div id="productPrice" class="productPrices"> <?=$query['price']?> </div>
                    <input id="productPriceHidden<?=$temp?>" type="hidden" value="<?=$query['price']?>">
                    <div class="mt-3 productCount"> <input id="productCount<?=$temp?>" type="number" min="0" value="1"
                            onChange="changeProductCountOnChart(this.value, <?=$query['price']?>)">
                    </div>
                    <button id="<?=$query['id']?>remove" class="mt-4 mb-3 btn btn-danger"
                        onclick="removeFromChartAndRefresh(this.id, <?=$query['id']?>)"> Remove From Chart </button>
                </div>

                <?php
                        $totalPrice = $totalPrice + $query['price'];
                    else :
                        print '<div class="container col-6 mt-5"><div class="alert alert-danger" role="alert">
                            Username or password wrong!
                            </div></div>';
                    endif;
                    endforeach;
            }

            ?>
            </div>
            <div id="totalPrice" class="text-center mt-5"> Total Cart Price = <span id="totalPriceSpan"
                    style="font-size:24px; font-weight: bold"> <?=$totalPrice?> </span> </div>
            <input id="totalPriceHidden" type="hidden" value="<?=$totalPrice?>">
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"
        integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>

</html>