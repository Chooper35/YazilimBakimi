<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Profile</title>
</head>

<body>

    <?php
ob_start();
session_start();
include('includes/navigationBar.php');
include('includes/database.php');
$user_id = $_SESSION['user'];

if (isset($_POST['submit'])) {
    if (isset($_POST['userFullName'], $_POST['userEmail'], $_POST['userPassword'], $_POST['userPhoneNumber'])) {
        $fullName = trim($_POST['userFullName']);
        $email = trim($_POST['userEmail']);
        $password = trim($_POST['userPassword']);
        $phoneNumber = trim($_POST['userPhoneNumber']);
        if ($fullName != "" && $email != "" && $password != "" && $phoneNumber != "") {
            try {
                $query = $db->prepare(/** @lang text */ "UPDATE users SET
        full_name = :userFullName, email = :userEmail, password = :userPassword, phone_number = :userPhoneNumber
        WHERE id = :userId");
                $update = $query->execute(array(
                    "userFullName" => $_POST['userFullName'],
                    "userEmail" => $_POST['userEmail'],
                    "userPassword" => $_POST['userPassword'],
                    "userPhoneNumber" => $_POST['userPhoneNumber'],
                    "userId" => $user_id
                ));
                if ($update) {
                    $_SESSION['userEdited'] = '<div class="container col-6 mt-5"><div class="alert alert-success" role="alert">
                 You edited your profile successfully.
               </div></div>';
                }

                header('Location: ' . $_SERVER["PHP_SELF"], true, 303);
                exit();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else
            print '<div class="container col-6 mt-5"><div class="alert alert-danger" role="alert">
                User can not edited! <br>
                 Please fill the blanks!
               </div></div>';
    }
}

if (isset($_SESSION['userEdited'])) {
    echo $_SESSION['userEdited'];
}
?>

    <div class="container col-9 mt-4">
        <h2 class="text-center"> Edit Your Profile </h2>

        <div class="col-12 ml-auto mr-auto mt-4">
            <div class="row">
                <?php
            $query = $db->query(/** @lang text */ "SELECT * FROM users WHERE id=$user_id")->fetch(PDO::FETCH_ASSOC);
            if ($query) :
                ?>
                <div class="col-12">
                    <form action="" method="post" class="bg-dark text-white p-4 mt-3" style="border-radius: 10px">
                        <div class="form-group">
                            <label for="userFullName">Full Name</label>
                            <input id="userFullName" name="userFullName" class="form-control" type="text"
                                placeholder="Enter your name here.." value="<?= $query['full_name'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="userEmail">Email</label>
                            <input id="userEmail" name="userEmail" class="form-control" type="email"
                                placeholder="Enter your email here.." value="<?= $query['email'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="userPassword">Password</label>
                            <input id="userPassword" name="userPassword" class="form-control" type="password"
                                placeholder="Enter your password here.." value="<?= $query['password'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="userPhoneNumber">Phone Number</label>
                            <input id="userPhoneNumber" name="userPhoneNumber" class="form-control" type="text"
                                placeholder="Enter your phone number here.." pattern="[0-9]{11}"
                                onKeyPress="if(this.value.length==11) return false;"
                                value="<?= $query['phone_number'] ?>" required>
                        </div>
                        <button id="submit" name="submit" type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
                <?php
            else :
                ?>

                <?php
            endif;
            ?>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>

<?php
unset($_SESSION['userEdited']);
ob_end_flush();
?>