<?php
$con = new mysqli('localhost','root','','agro');
// $taluka_id = $_POST['taluka_id'];
$date_id1 = $_POST['date_id1'];
$type_id1 = $_POST['type_id1'];
if($type_id1 === 'min'){
  $query1 =$con->query("SELECT min_temp,date from `district_data`  where date = '$date_id1'" );
  $month = array();
  $amount = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['min_temp'];
    // $amount[] = $row1['date'];
  }
  $return_data = array();
    $return_data['month'] = $month; 
    // $return_data['amount'] = $amount;
    echo json_encode($return_data);
}
elseif($type_id1 === 'max'){
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
}
else{
  $query1 =$con->query("SELECT rainfall,date from `district_data`  where date = '$date_id1'" );
  $month = array();
  $amount = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['rainfall'];
    // $amount[] = $row1['date'];
  }
  $return_data = array();
    $return_data['month'] = $month; 
    // $return_data['amount'] = $amount;
    echo json_encode($return_data);
}
?>