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
        $s_select = $num['s_select'];
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
                <div class="space">

                    <h1 style="font-weight:700;color:#1c1d5a" align="left">ระบบเลือกตั้งคณะกรรมการสภานักเรียน</h1>
                    <h5 style="color:#1c1d5a">โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่</h5>

                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <div class="box" style="padding-top:20px">
                                <div class="container">
                                    <h5 align="center" style="color:#ed3e63">ข้อมูลผู้มีสิทธิ์เลือกตั้ง</h5>
                                    <hr>
                                    <p>
                                        <i class="fas fa-user" style="color:#ed3e63"></i> &nbsp; ชื่อ : <?php echo $_SESSION['s_title'] . $_SESSION['s_name'] . " " . $_SESSION['s_surname'] ?>
                                    </p>
                                    <p>
                                        <i class="fas fa-chart-line" style="color:#ed3e63"></i> &nbsp; ชั้นมัธยมศึกษาปีที่ <?php echo $_SESSION['s_level'] . "/" . $_SESSION['s_room'] ?>
                                    </p>

                                    <?php
                                    if ($s_select < 1) {
                                    ?>
                                        <div class="d-grid gap-2 mt-3">
                                            <a class="btn btn-danger " style="pointer-events: none;">ยังไม่ได้ลงคะแนน</a>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="d-grid gap-2 mt-3">
                                            <a class="btn btn-success " style="pointer-events: none;">ลงคะแนนเรียบร้อยแล้ว</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <?php
                            if ($s_select > 0) {
                            ?>

                            <?php } else { ?>

                            <?php } ?>
                            <div class="box">
                                <div style="background:#ed3e63;border-radius:20px 20px 0px 0px">
                                    <h5 class="p-3" style="color:white" align="center">
                                        <?php
                                        if ($s_select > 0) {
                                        ?>
                                            คณะกรรมการที่คุณลงคะแนน
                                        <?php } else { ?>
                                            คณะกรรมการสภานักเรียน
                                        <?php } ?>
                                    </h5>
                                </div>
                                <div class="container">
                                    <?php
                                    if ($s_select == 1) {

                                    ?>

                                        <div class="row pt-4 pb-4 ">
                                            <div class="col-xl-12 ">
                                                <p align="center">
                                                    <img src="./img/yrc_logo.png" class="img-fluid" width="20%" alt="">
                                                <h5 align="center" style="font-weight: 500;">คุณได้ใช้สิทธิ์เลือกตั้งเรียบร้อยแล้ว </h5>
                                                </p>

                                               

                                            </div>
                                        </div>

                                    <?php } ?>

                                    <?php
                                    if ($s_select == 2) {
                                    ?>
                                        <div class="row pt-4 pb-4 ">
                                            <div class="col-xl-12 ">
                                                <p align="center">
                                                    <img src="./img/yrc_logo.png" class="img-fluid" width="20%" alt="">
                                                <h5 align="center" style="font-weight: 500;">คุณได้ใช้สิทธิ์เลือกตั้งเรียบร้อยแล้ว </h5>
                                                </p>

                                               

                                            </div>
                                        </div>
                                    <?php }
                                    if ($s_select < 1) { ?>
                                        <div class="row ">
                                            <div class="col-xl-6 col-lg-6 pt-4 pb-4">

                                                <p align="center">
                                                    <img src="./img/thyme_logo.png" class="img-fluid" width="50%" alt="">
                                                <p class="mt-3" align="center">หมายเลข 1</p>
                                                <h2 align="center" style="font-weight: 700;color:#ed3e63;margin:0">พรรคไธม์ </h2>
                                                <p align="center">
                                                    <a href="./pdf/thyme.pdf" target="_blank" style="color:#7c7575;">นโยบายพรรค</a>
                                                </p>
                                                </p>
                                               

                                                <p align="center" class="mt-2">
                                                    <a style="font-family: 'Kanit';" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Thyme">ลงคะแนนเสียง</a>

                                                </p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 pt-4 pb-4">
                                                <p align="center">
                                                    <img src="./img/magent_logo.png" class="img-fluid" width="50%" alt="">
                                                <p class="mt-3" align="center">หมายเลข 2</p>
                                                <h2 align="center" style="font-weight: 700;color:#ed3e63;margin:0">พรรคมาเจนท์ </h2>

                                                </p>
                                                <p align="center">
                                                    <a href="./pdf/magent.pdf" target="_blank" style="color:#7c7575">นโยบายพรรค</a>
                                                </p>
                                                <p align="center" class="mt-2">
                                                    <a style="font-family: 'Kanit';" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Magent">ลงคะแนนเสียง</a>

                                                </p>
                                            </div>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Thyme -->
                <div class="modal fade" id="Thyme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลงคะแนนเสียง</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                คุณต้องการลงคะแนนเสียงให้ <strong>หมายเลข 1 พรรคไธม์ (Thyme) </strong> ใช่หรือไม่
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <a href="./process/submit.php?vote=1" type="button" class="btn btn-primary">ตกลง</a>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Magent -->
                <div class="modal fade" id="Magent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลงคะแนนเสียง</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                คุณต้องการลงคะแนนเสียงให้ <strong>หมายเลข 2 พรรคมาเจนท์ (Magent) </strong> ใช่หรือไม่
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <a href="./process/submit.php?vote=2" type="button" class="btn btn-primary">ตกลง</a>

                            </div>
                        </div>
                    </div>
                </div>




                <?php include('./component/linkjs.php') ?>
                <?php
                if (isset($_SESSION['success'])) {
                ?>
                    <script>
                        Swal.fire({
                            title: 'เสร็จสิ้น!',
                            text: 'คุณลงคะแนนเสียงเรียบร้อยแล้ว',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                            confirmButtonColor: '#198754'
                        })
                    </script>
                <?php }
                unset($_SESSION['success']);
                ?>
    </body>

    </html>
<?php } ?>