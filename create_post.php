<?php session_start(); ?>

<?php include_once('inc/conn.php'); ?>

<?php
if (!isset($_SESSION['User_Fname'])) {
    header('Location:index.php');
}
?>

<?php
if (isset($_POST['submit'])) {
    $post_title =input_verify($_POST['title']);
    $post_srt_nt=input_verify($_POST['shrt_Nt']);
    $post_body = input_verify($_POST['Post_body']);

    $query = "INSERT INTO tbl_post(Post_Title,Post_Srt_Nt,Post_Body,Create_at) VALUES('{$post_title}','{$post_srt_nt}','{$post_body}',NOW())";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // echo "Post created Successfully !";
        $msg = "

                <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                <strong>Create a Post Successfully !</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>X</button>
                </div>
                ";
    } else {
        echo "Post not created" . mysqli_error($conn);
    }
}



function input_verify($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = html_entity_decode($data);

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

                        <form action="create_post.php" method="POST" autocomplete="">
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
                                
                                <textarea class="form-control" name="shrt_Nt" id="shrt_Nt" rows="5"></textarea>
                                
                                <small id="helpId" class="text-muted">Short Note </small>


                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <script src="Plugin/ckeditor/ckeditor.js"></script>
                                <textarea class="form-control" name="Post_body" id="Post_body" rows="15"></textarea>
                                <script>
                                    CKEDITOR.replace('Post_body');
                                </script>
                                <small id="helpId" class="text-muted">Post Body</small>


                            </div>
                    </div>
                    <div class="card-footer" id="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Create Post</button>
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>