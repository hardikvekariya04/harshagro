<?php
    session_start();
    include ("db.php");
    $id = $_SESSION['ID'];
$query_row = "select * from users where id='$id'";
$result_row = mysqli_query($con, $query_row);
$rows = mysqli_fetch_assoc($result_row);
    // $_SESSION['ID']=$rows['id'];
    // $_SESSION['EMAIL']=$rows['EMAIL'];
?>