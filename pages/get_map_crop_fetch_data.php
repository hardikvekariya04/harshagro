<?php
$con = new mysqli('localhost','root','','agro');
$weeks = $_POST['weeks'];
$years = $_POST['years'];

  $query1 =$con->query("SELECT SMT,year,week from `crop` where week = '$weeks' AND year = '$years'" );
  $month = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['SMT'];
  }
    $return_data = array();
    $return_data['month'] = $month; 
    echo json_encode($return_data);
?>