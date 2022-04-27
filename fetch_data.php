<?php
$con = new mysqli('localhost','root','','agro');
$taluka_id = $_POST['taluka_id'];
$date_id = $_POST['date_id'];
$temp_id = $_POST['temp_id'];

//last 7 days data fetch :

$dates1 =  date('Y-m-d', strtotime($date_id. '+0 day'));
$dates2  =date('Y-m-d', strtotime($date_id. '-1 day'));
$dates3  =date('Y-m-d', strtotime($date_id.'-2 day'));
$dates4  =date('Y-m-d', strtotime($date_id.'-3 day'));
$dates5  =date('Y-m-d', strtotime($date_id.'-4 day'));
$dates6  =date('Y-m-d', strtotime($date_id.'-5 day'));
$dates7  =date('Y-m-d', strtotime($date_id.'-6 day'));
if($temp_id === 'max' ){
  $query1 =$con->query("SELECT max_temp,date from newdata where taluka_id = ".$taluka_id." AND date IN('$dates1','$dates2','$dates3','$dates4','$dates5','$dates6','$dates7')" );
  $month = array();
  $amount = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['max_temp'];
    $amount[] = $row1['date'];
  }
  $return_data = array();
    $return_data['month'] = $month; 
    $return_data['amount'] = $amount;
    echo json_encode($return_data);
}
else if($temp_id === 'rain'){
  $query1 =$con->query("SELECT min_temp,date from newdata where taluka_id = ".$taluka_id." AND date IN('$dates1','$dates2','$dates3','$dates4','$dates5','$dates6','$dates7')" );
  $month = array();
  $amount = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['min_temp'];
    $amount[] = $row1['date'];
  }
  
  $return_data = array();
    $return_data['month'] = $month; 
    $return_data['amount'] = $amount;
    echo json_encode($return_data);
}
else{
  $query1 =$con->query("SELECT min_temp,date from newdata where taluka_id = ".$taluka_id." AND date IN('$dates1','$dates2','$dates3','$dates4','$dates5','$dates6','$dates7')" );
  $month = array();
  $amount = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['min_temp'];
    $amount[] = $row1['date'];
  }
  
  $return_data = array();
    $return_data['month'] = $month; 
    $return_data['amount'] = $amount;
    echo json_encode($return_data);
}
?>