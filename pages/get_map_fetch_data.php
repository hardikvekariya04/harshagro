<?php
$con = new mysqli('localhost','root','','agro');
// $taluka_id = $_POST['taluka_id'];
$date_id1 = $_POST['date_id1'];

  $query1 =$con->query("SELECT max_temp,date from `district_data`  where date = '$date_id1'" );
  $month = array();
  $amount = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['max_temp'];
    // $amount[] = $row1['date'];
  }
  $return_data = array();
    $return_data['month'] = $month; 
    // $return_data['amount'] = $amount;
    echo json_encode($return_data);
?>