<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Forgot Password</title>
</head>

<body>

    <?php
ob_start();
session_start();
include 'includes/database.php';
include 'includes/navigationBar.php';

if (isset($_SESSION['user'])) {
    header("Location: /");
}

if (isset($_POST['userEmail'], $_POST['userSecurityQuestion'], $_POST['userSecurityQuestionAnswer'])) {
    if($_POST['userEmail'] == "" || $_POST['userSecurityQuestion'] == "" || $_POST['userSecurityQuestionAnswer'] == "") {
        print '<div class="container col-6 mt-5"><div class="alert alert-danger" role="alert">
                Please fill the blanks! </div></div>';
    } else {
        $email = $_POST['userEmail'];
        $question = $_POST['userSecurityQuestion'];
        $answer = $_POST['userSecurityQuestionAnswer'];
        $query = $db->query(/** @lang text */"SELECT * FROM users WHERE email = '{$email}' AND security_question = '{$question}' AND security_question_answer = '{$answer}'")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            print '<div class="container col-6 mt-5"><div class="alert alert-info" role="alert">
                    Your email address is : ' . $email . '<br> Your password is : ' . $query['password'] . '</div></div>';
        } else {
            print '<div class="container col-6 mt-5"><div class="alert alert-danger" role="alert">
                    Please check your email or security question and answer! </div></div>';
        }
    }
}

?>

    <div class="container col-6 mt-5 bg-dark text-white p-4">
        <form action="" method="post">
            <div class="form-group">
                <label for="userEmail">Email address</label>
                <input name="userEmail" type="email" class="form-control" id="userEmail" aria-describedby="emailHelp"
                    placeholder="Enter your email address..">
            </div>
            <div class="form-group">
                <label for="userSecurityQuestion">Security Question</label>
                <select class="form-control" name="userSecurityQuestion" id="userSecurityQuestion">
                    <option value="0">What is your favorite color?</option>
                    <option value="1">What is your lucky number?</option>
                    <option value="2">Who is your best friend?</option>
                    <option value="3">Where is your birthplace?</option>
                </select>
            </div>
            <div class="form-group">
                <label for="userSecurityQuestionAnswer">Your Answer</label>
                <input name="userSecurityQuestionAnswer" type="text" class="form-control"
                    id="userSecurityQuestionAnswer" placeholder="Enter your answer..">
            </div>
            <button type="submit" class="btn btn-primary">Get Your Password</button>
        </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>

</html>