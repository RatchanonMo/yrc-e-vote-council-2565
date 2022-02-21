<?php
session_start();
include('./connect/connect.php');
include('./function.php');

if (!$_SESSION['s_username']) {
    header('location:index.php');
} else {
    $check5 = "SELECT * FROM student WHERE s_id = " . $_SESSION['s_id'];
    $m5 = mysqli_query($conn, $check5);

    if (mysqli_num_rows($m5) == 1) {
        $num = mysqli_fetch_array($m5);
        $s_pass = $num['s_pass'];
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

        <?php include('./component/link.php') ?>

    </head>

    <body>
        <?php include('./component/sidebar.php') ?>
        <div class="page">
            <div class="page__wrapper">
                <?php include('./component/header.php') ?>
                <div style="margin: 80px 60px 60px 60px">

                    <h1 style="font-weight:700;" align="left">พรรคไธม์ </h1>
                    <h5 style="">THYME</h5>

                   <div class="col-xl-12 box pt-4 pb-4" >
                       <div class="container-fluid" style="max-width: 1000px;">
                       <p align="center">
                           <img src="./img/thyme_logo.png" class="img-fluid" width="20%" alt="">
                       </p>
                       <h5>สโลแกนพรรค</h5>
                       <p></p>
                       </div>
                       
                   </div>
                </div>


                <?php include('./component/linkjs.php') ?>
                
    </body>

    </html>
<?php } ?>