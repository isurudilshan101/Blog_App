<?php include_once('inc/conn.php'); ?>

<?php
if (isset($_POST['submit'])) {
    //declaring variables and assign empty values

    $firstname = "";
    $lastname = "";
    $email = "";
    $password = "";
    $msg = "";

    $firstname = input_verify($_POST['firstname']);
    $lastname = input_verify($_POST['lastname']);
    $email = input_verify($_POST['email']);
    $password = input_verify($_POST['password']);




    // echo $firstname;
    // echo "<br>";
    // echo $lastname;
    // echo "<br>";
    // echo $email;
    // echo "<br>";
    // echo $password;
    // echo "<br>";

    $query1 = "SELECT * FROM TBL_User WHERE Fname='{$firstname}' AND email='{$email}'";
    $showResult = mysqli_query($conn, $query1);

    if ($showResult) {
        if (mysqli_num_rows($showResult) == 1) {
            $msg = "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                <strong>Sorry!</strong>This user already have in the system.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>X</button>
                </div>";
        } else {
            $query = "INSERT INTO TBL_User(Fname,Lname,email,pwd,Reg_DT) VALUES('{$firstname}','{$lastname}','{$email}','{$password}',NOW())";

            $result = mysqli_query($conn, $query);

            if ($result) {
                $msg = "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
    <strong>User Registrstion Success!</strong> Welcome to the Blog App.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>X</button>
    </div>";
            } else {
                echo mysqli_error($conn);
            }
        }
    }
}






function input_verify($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return ($data);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Plugin/bootstrap.min.css">
    <script src="Plugin/jquery.min.js"></script>
    <script src="Plugin/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/sign_up.css">
    <title>Blog App-sign_in</title>
</head>

<body>


    <?php include_once('inc/navbar.php') ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card mt-4">
                    <div class="card-header" id="card-header">
                        <h4>Sign Up Form</h4>
                    </div>
                    <div class="card-body" id="card-body">

                        <form action="sign_up.php" method="POST" autocomplete="off">
                            <?php if (!empty($msg)) {
                                echo $msg;
                            } ?>

                            <!-- <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Enter your first name</small>
                            </div>

                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Enter your last name</small>
                            </div> -->

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Enter your email address</small>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Enter your own password</small>
                            </div>

                    </div>
                    <div class="card-footer" id="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>