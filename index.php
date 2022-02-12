<?php session_start(); ?>


<?php include_once('inc/conn.php'); ?>

<?php

$post_body = "";

$query = "SELECT * FROM tbl_post";
$showPost = mysqli_query($conn, $query);

if ($showPost) {
    if (mysqli_num_rows($showPost) > 0) {
        while ($post = mysqli_fetch_assoc($showPost)) {
            // $post_body=$post['Post_Body'];

            // echo $post_body. "<br>" ;

            $post_body .= "<div id='main-div'>";

                    $post_body .= "<h1 id='title'>";
                    $post_body .= "{$post['Post_Title']}";
                    $post_body .= "</h1>";

                    $post_body .= "<div id='body'>";
                    $post_body .= "{$post['Post_Body']}";
                    $post_body .= "</div>";

                    $post_body .= "<div id='body'>";
                    $post_body.="<small>";
                    $post_body .= "Created at-{$post['Create_at']}";

                    $post_body.="</small>";
                    $post_body .= "</div>";
            $post_body .= "</div>";
        }
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
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <script src="Plugin/jquery.min.js"></script>
    <script src="Plugin/bootstrap.min.js"></script>

    <title>Blog App</title>

    <style>
        #main-div{
            border:1px solid #fff;
            margin-bottom: 10px;
            padding:#fff;
            color:#fff;

        }
    </style>
</head>

<body>
    <?php include_once('inc/navbar.php');     ?>

    <!-- <?php
            if (isset($_SESSION['User_Fname'])) {
                echo $_SESSION['User_Fname'];
            } else {
                echo "Session not created !";
            }
            ?>
 -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron mt-4">
                    <h1 id="jumbo-header">Welcome to the My Blog</h1>
                    <h4 id="jumbo-emoji">👾💂👾 </h4>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <?php echo $post_body; ?>
                </div>
            </div>
        </div>
    </div>

    </div>

</body>

</html>