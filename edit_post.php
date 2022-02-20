<!-- <?php
 $post_id= $_GET['post_id'];


?> -->

<?php session_start(); ?>

<?php include_once('inc/conn.php'); ?>

<?php
if (isset($_GET['post_id'])) {

    // echo $_GET['post_id'];

    $Post_Id = $_GET['post_id'];
    $post_title = "";
    $post_srt_nt="";
    $post_body = "";
    $post_create = "";
    $query = "SELECT * FROM tbl_post WHERE Id={$Post_Id}";
    $show_post = mysqli_query($conn, $query);

    if ($show_post) {
        if (mysqli_num_rows($show_post) > 0) {
            $post = mysqli_fetch_assoc($show_post);

            $post_title = $post['Post_Title'];
            $post_srt_nt=$post['Post_Srt_Nt'];

            $post_body = $post['Post_Body'];
            $post_create = $post['Create_at'];
        }
    }
}



?>

<!-- Update  -->

<?php 

        if(isset($_POST['submit'])){

            
            $Post_Id = $_GET['post_id'];
            $post_title = $_POST['title'];
            $post_srt_nt= $_POST['shrt_Nt'];;
            $post_body = $_POST['Post_body'];


            $query="UPDATE tbl_post SET
            Post_Title='{$post_title}',
            Post_Srt_Nt='{$post_srt_nt}',
            Post_Body='{$post_body}' WHERE Id={$Post_Id}";

            $result=mysqli_query($conn, $query);

            if($result){
                $msg = "

                <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                <strong>Update  Post Successfully !</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>X</button>
                </div>
                ";

            }else{
                echo mysqli_error($conn);
            }


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
    <title>Blog App-Edit-Post</title>
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

                        <form action="edit_post.php?post_id=<?php echo $post_id?>" method="POST" autocomplete="">
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
                                <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $post_title?>">
                                <small id="helpId" class="text-muted">Post Title</small>
                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                
                                <textarea class="form-control" name="shrt_Nt" id="shrt_Nt" rows="5" ><?php echo $post_srt_nt ?></textarea>
                                
                                <small id="helpId" class="text-muted">Short Note </small>


                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <script src="Plugin/ckeditor/ckeditor.js"></script>
                                <textarea class="form-control" name="Post_body" id="Post_body" rows="15"><?php echo $post_body; ?></textarea>
                                <script>
                                    CKEDITOR.replace('Post_body');
                                </script>
                                <small id="helpId" class="text-muted">Post Body</small>


                            </div>
                    </div>
                    <div class="card-footer" id="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Update Post</button>
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>