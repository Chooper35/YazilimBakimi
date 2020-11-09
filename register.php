<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Register</title>
</head>
<body>

<?php
ob_start();
session_start();
include('includes/database.php');
include('includes/navigationBar.php');

if (isset($_SESSION['user']))
    header("Location: /");

if (isset($_POST['fullName'], $_POST['phoneNumber'], $_POST['email'], $_POST['password'])) {
    $query = $db->prepare(
            /** @lang text */ 'INSERT INTO users SET
                full_name = :fullName,
                phone_number = :phoneNumber,
                email = :email,
                password = :password');
    $insert = $query->execute(array(
        "fullName" => $_POST['fullName'],
        "phoneNumber" => $_POST['phoneNumber'],
        "email" => $_POST['email'],
        "password" => $_POST['password']
    ));

    if ($insert){
        print '<div class="container col-6 mt-5"><div class="alert alert-success" role="alert">
                 You are registered successfully.
               </div></div>';
    }
}

?>

<div class="container col-6 mt-5 bg-dark text-white p-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input name="fullName" type="text" class="form-control" id="fullName" placeholder="Enter your full name..">
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input name="phoneNumber" type="text" class="form-control" id="phoneNumber"
                   placeholder="Enter phone number..">
        </div>
        <div class="form-group">
            <label for="emailAddress">Email address</label>
            <input name="email" type="email" class="form-control" id="emailAddress" aria-describedby="emailHelp"
                   placeholder="Enter your email address..">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password"
                   placeholder="Enter your password..">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>