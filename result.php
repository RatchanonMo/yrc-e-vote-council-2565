<?php
session_start();
include('./connect/connect.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <?php include('./component/link.php') ?>

</head>

<body style="background-image: url('./img/paper.jpg');
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
    <div class="page">
        <div class="container-fluid result" style="max-width: 1000px;">
            <div style="margin:80px 0px">
                <h1 style="font-weight:700;color:#1c1d5a" align="left">รายงานผลการเลือกตั้งคณะกรรมการสภานักเรียน </h1>
                <h5 style="color:#1c1d5a">ปีการศึกษา 2565</h5>
                <hr>

                <div class="col-xl-12">
                    <div class="box">
                        <div style="background:#d91b5c;border-radius:20px 20px 0px 0px">
                            <h5 class="p-3" style="color: white" align="center">ปีการศึกษา 2565</h5>
                        </div>
                        <div class="container-fluid pt-4" style="max-width: 900px">

                            <div class="row">
                                <div class="col-xl-6 col-lg-6 pt-4 pb-5 ">

                                <?php 
                                    $s = "SELECT * FROM student WHERE s_select = '1' ";
                                    $q = mysqli_query($conn, $s);
                                    $n = mysqli_num_rows($q);
                                ?>

                                    <p align="center">
                                        <img src="./img/thyme_logo.png" class="img-fluid" width="50%" alt="">
                                    <p class="mt-3" align="center">หมายเลข 1</p>
                                    <h2 align="center" style="font-weight: 700;color:#ed3e63;margin:0">พรรคไธม์ </h2>
                                    <p align="center">
                                        <a href="./pdf/thyme.pdf" target="_blank" style="color:#7c7575;">นโยบายพรรค</a>
                                    </p>
                                    </p>

                                    <p align="center">
                                        <span class="badge rounded-pill bg-light text-dark mt-3" style="font-weight:normal;font-size:20px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="ได้รับคะแนน <?php echo $n ?> เสียง">
                                            <i style="color:#d63384" class="fas fa-vote-yea"></i>&nbsp;
                                            <?php echo $n ?></span>
                                    </p>

                                </div>
                                <div class="col-xl-6 col-lg-6 pt-4 pb-5 ">

                                <?php 
                                    $s1 = "SELECT * FROM student WHERE s_select = '2' ";
                                    $q1 = mysqli_query($conn, $s1);
                                    $n1 = mysqli_num_rows($q1);
                                ?>

                                    <p align="center">
                                        <img src="./img/magent_logo.png" class="img-fluid" width="50%" alt="">
                                    <p class="mt-3" align="center">หมายเลข 2</p>
                                    <h2 align="center" style="font-weight: 700;color:#ed3e63;margin:0">พรรคมาเจนท์ </h2>
                                    <p align="center">
                                        <a href="./pdf/magent.pdf" target="_blank" style="color:#7c7575;">นโยบายพรรค</a>
                                    </p>
                                    </p>

                                    <p align="center">
                                        <span class="badge rounded-pill bg-light text-dark mt-3" style="font-weight:normal;font-size:20px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="ได้รับคะแนน <?php echo $n1 ?> เสียง">
                                            <i style="color:#d63384" class="fas fa-vote-yea"></i>&nbsp;
                                            <?php echo $n1 ?></span>
                                    </p>

                                </div>
                            </div>
                            <hr>

                            <p class="mt-5"><i class="fas fa-clipboard-list" style="color:#d91b5c"></i>&nbsp;
                                จำนวนนักเรียนที่มีสิทธิ์โหวต
                                <?php
                                $sql = "SELECT s_id FROM student ";
                                $query = mysqli_query($conn, $sql);

                                echo mysqli_num_rows($query);
                                ?>

                                คน
                            </p>
                            <p class="pb-4"><i class="fas fa-clipboard-list" style="color:#d91b5c"></i>&nbsp;
                                มีนักเรียนที่โหวตแล้ว

                                <?php
                                $sql = "SELECT s_id FROM student WHERE s_select > 0 ";
                                $query = mysqli_query($conn, $sql);


                                $sql1 = "SELECT s_id FROM student ";
                                $query1 = mysqli_query($conn, $sql1);

                                $percent = (mysqli_num_rows($query) / mysqli_num_rows($query1)) * 100;

                                echo mysqli_num_rows($query);
                                ?>

                                คน &nbsp;
                                <span style="color:#d91b5c">
                                    คิดเป็นร้อยละ <?php echo round($percent, 2) ?>
                                </span>

                            </p>
                            <p align="center">แผนภูมิแท่งแสดงจำนวนการลงคะแนนของแต่ละสายชั้น</p>
                            <?php
                            $query22 = "SELECT s_level, count(*) as s_select FROM student WHERE s_select > '0' GROUP BY s_level";
                            $result22 = mysqli_query($conn, $query22);
                            ?>
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load('current', {
                                    packages: ['corechart', 'bar']
                                });
                                google.charts.setOnLoadCallback(drawBasic);

                                function drawBasic() {

                                    var data = new google.visualization.DataTable();
                                    data.addColumn('string', 'จำนวนผู้โหวต');
                                    data.addColumn('number', 'จำนวนผู้โหวต');




                                    data.addRows([
                                        <?php
                                        while ($row22 = mysqli_fetch_array($result22)) {
                                            echo "['ชั้นมัธยมศึกษาปีที่ " . $row22["s_level"] . "', " . $row22["s_select"] . " ],";
                                        }
                                        ?>

                                    ]);

                                    var options = {

                                        hAxis: {
                                            title: 'นักเรียนที่มาโหวต',
                                            fontSize: 100,
                                        },

                                    };

                                    var chart = new google.visualization.ColumnChart(
                                        document.getElementById('chart_div'));

                                    chart.draw(data, options);
                                }

                                $(window).resize(function() {
                                    drawBasic();

                                });
                            </script>
                            <div id="chart_div" class=""></div>
                            <?php
                            date_default_timezone_set("Asia/Bangkok");

                            $date =  date("d/m/Y");
                            $time = date("H.i");
                            ?>
                            <p class="mt-3 mb-5"><i class="fas fa-clock" style="color:#d91b5c"></i> &nbsp;ข้อมูลอัพเดทเมื่อ <?php echo $date ?> เวลา <?php echo $time ?> น.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include('./component/linkjs.php') ?>


</body>

</html>