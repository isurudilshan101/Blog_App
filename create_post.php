<?php session_start(); ?>

<?php include_once('inc/conn.php'); ?>

<?php

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
    <title>Blog App-create-blog</title>
</head>

<body>


    <?php include_once('inc/navbar.php') ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card mt-4">
                    <div class="card-header" id="card-header">
                        <h4>Create a new Post</h4>
                    </div>
                    <div class="card-body" id="card-body">

                        <form action="sign_in.php" method="POST" autocomplete="">
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

                            <!-- <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Enter your email address</small>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Enter your own password</small>
                            </div> -->
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Post Title</small>
                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <textarea class="form-control" name="Post_body" id="Post_body" rows="15"></textarea>
                            </div>
                            <small id="helpId" class="text-muted">Post Body</small>
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