function addToChart(button, productId) {
    $.ajax({
        url: "addToChart.php",
        method: "POST",
        data: {
            productId: productId
        },
        success: function(response){
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
        success: function(response){
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
        success: function(response){
            $("#" + button.replace("remove", "")).toggle();
            $("#" + button).toggle();
        }
    });
    location.reload();
}