var currentTotalPrice = 0;
$(document).ready(function () {
    currentTotalPrice = parseInt(document.getElementById('totalPriceHidden').value);
    $("input[type=number]").click(function (e) {
        $(this).attr('value', $(this).val());
    });
})

function addToChart(button, productId) {
    $.ajax({
        url: "addToChart.php",
        method: "POST",
        data: {
            productId: productId
        },
        success: function (response) {
            $("#" + button).toggle();
            $("#" + button + "remove").toggle();
        }
    });
}

function removeFromChart(button, productId) {
    $.ajax({
        url: "removeFromChart.php",
        method: "POST",
        data: {
            productId: productId
        },
        success: function (response) {
            $("#" + button.replace("remove", "")).toggle();
            $("#" + button).toggle();
        }
    });

}

function removeFromChartAndRefresh(button, productId) {
    $.ajax({
        url: "removeFromChart.php",
        method: "POST",
        data: {
            productId: productId
        },
        success: function (response) {
            $("#" + button.replace("remove", "")).toggle();
            $("#" + button).toggle();
        }
    });
    location.reload();
}

function changeProductCountOnChart() {
    var totalPrice = 0;
    var numItems = $('.productCount').length;
    for (var i = numItems; i > 0; i--) {
        totalPrice += $('#productCount' + i).val() * $('#productPriceHidden' + i).val();
    }
    document.getElementById('totalPriceSpan').innerHTML = totalPrice;
}

function favoriteProduct(button, userId, productId) {
    $.ajax({
        url: "favoriteProduct.php",
        method: "POST",
        data: {
            userId: userId,
            productId: productId
        },
        success: function (response) {
            console.log(response);
            if (response == "success") {
                $("#favfavorited" + button.replace("fav", "")).toggle();
                $("#" + button).toggle();
            } else
                alert(response);
        }
    });
}

function unFavoriteProduct(button, userId, productId) {
    $.ajax({
        url: "removeFromFavorite.php",
        method: "POST",
        data: {
            userId: userId,
            productId: productId
        },
        success: function (response) {
            if (response == "success") {
                $("#" + button).toggle();
                $("#fav" + button.replace("favfavorited", "")).toggle();
            } else
                alert(response);
        }
    });
}

function unFavoriteProductAndRemove(button, userId, productId) {
    $.ajax({
        url: "removeFromFavorite.php",
        method: "POST",
        data: {
            userId: userId,
            productId: productId
        },
        success: function (response) {
            if (response == "success") {
                $("#" + button).toggle();
                $("#fav" + button.replace("favfavorited", "")).toggle();
                $("#productDiv" + button.replace("favfavorited", "")).remove();
            } else
                alert(response);
        }
    });
}