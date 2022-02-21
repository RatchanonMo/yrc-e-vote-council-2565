<?php
session_start();
include('../connect/connect.php');

if (isset($_GET['vote'])) {
    $vote = $_GET['vote'];
    $id = $_SESSION['s_id'];

    date_default_timezone_set("Asia/Bangkok");
    $time = date("d/m/y เวลา H.i น.");


    $sql = "UPDATE student SET s_select = '$vote', s_time = '$time'  WHERE s_id = '$id' ";
    $query = mysqli_query($conn, $sql);
    


    $_SESSION['success'] = '1';

    header('location: ../vote.php');



}
