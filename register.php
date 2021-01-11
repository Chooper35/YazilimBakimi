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
include 'includes/database.php';
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
include 'includes/navigationBar.php';

if (isset($_SESSION['user'])) {
    header("Location: /");
}

if (isset($_POST['fullName'], $_POST['phoneNumber'], $_POST['email'], $_POST['password'], $_POST['passwordCheck'], $_POST['userSecurityQuestion'], $_POST['userSecurityQuestionAnswer'])) {

    if ($_POST['fullName'] == "" || $_POST['phoneNumber'] == "" || $_POST['email'] == "" || $_POST['password'] == "" || $_POST['passwordCheck'] == "" || $_POST['userSecurityQuestionAnswer'] == "") {
        print '<div class="container col-6 mt-5"><div class="alert alert-danger" role="alert">
        Fill the blanks! </div></div>';
    } else {
        if ($_POST['password'] != $_POST['passwordCheck']) {
            print '<div class="container col-6 mt-5"><div class="alert alert-danger" role="alert">
            Password\'s must match.</div></div>';
        } else {
            try {
                $query = $db->prepare(
                    'INSERT INTO users SET
                            full_name = :fullName,
                            phone_number = :phoneNumber,
                            email = :email,
                            password = :password,
                            security_question = :securityQuestion,
                            security_question_answer = :securityQuestionAnswer ');
                $insert = $query->execute(array(
                    "fullName" => $_POST['fullName'],
                    "phoneNumber" => $_POST['phoneNumber'],
                    "email" => $_POST['email'],
                    "password" => $_POST['password'],
                    "securityQuestion" => $_POST['userSecurityQuestion'],
                    "securityQuestionAnswer" => $_POST['userSecurityQuestionAnswer']
                ));
    
                if ($insert) {
                    print '<div class="container col-6 mt-5"><div class="alert alert-success" role="alert">
                            You are registered successfully.</div></div>';
                }
            } catch (PDOException $e) {
                print '<div class="container col-6 mt-5"><div class="alert alert-danger" role="alert">'.$e->getMessage().'
                            </div></div>';
            }
        }
    }
}

?>

    <div class="container col-6 mt-5 bg-dark text-white p-4">
        <form action="" method="post">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input name="fullName" type="text" class="form-control" id="fullName"
                    placeholder="Enter your full name.." required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Enter phone number.."
                    type="text" pattern="[0-9]{11}" onKeyPress="if(this.value.length==11) return false;" required>
            </div>
            <div class="form-group">
                <label for="emailAddress">Email address</label>
                <input name="email" type="email" class="form-control" id="emailAddress" aria-describedby="emailHelp"
                    placeholder="Enter your email address.." required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password"
                    placeholder="Enter your password.." required>
            </div>
            <div class="form-group">
                <label for="passwordCheck">Password Again</label>
                <input name="passwordCheck" type="password" class="form-control" id="passwordCheck"
                    placeholder="Enter your password again.." required>
            </div>
            <div class="form-group">
                <label for="userSecurtityQuestion">Security Question</label>
                <select class="form-control" name="userSecurityQuestion" id="userSecurtityQuestion" required>
                    <option value="0">What is your favorite color?</option>
                    <option value="1">What is your lucky number?</option>
                    <option value="2">Who is your best friend?</option>
                    <option value="3">Where is your birthplace?</option>
                </select>
            </div>
            <div class="form-group">
                <label for="userSecurityQuestionAnswer">Your Answer</label>
                <input name="userSecurityQuestionAnswer" type="text" class="form-control"
                    id="userSecurityQuestionAnswer" placeholder="Enter your answer.." required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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