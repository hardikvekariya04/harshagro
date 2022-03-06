<?php
$con = new mysqli('localhost','root','','agro');
// $taluka_id = $_POST['taluka_id'];
$date_id = $_POST['date_id'];

$query1 =$con->query("SELECT taluka_id,date,max_temp,coodinate,lat,lng from newdata1 where date = '${date_id}'");
  $month = array();
  $amount = array();
  $taluka_id = array();
  $coodinate = array();
  $lat = array();
  $lng = array();
$final_array=array();
  while($rows1 = $query1->fetch_assoc()){
    $month[] = $rows1['max_temp'];
    $amount[] = $rows1['date'];
    $taluka_id[] = $rows1['taluka_id'];
    $coodinate[] = array($rows1['lat'], $rows1['lng']);
    $lat[] = $rows1['lat'];
    $lng[] = $rows1['lng'];
  }
  $final_array = array_merge($lat,$lng);
  $return_data = array();
    $return_data['month'] = $month; 
    $return_data['amount'] = $amount;
    $return_data['taluka_id']= $taluka_id;
    // $return_data['final_array']= $final_array;

    $return_data['coodinate'] = $coodinate;
    $return_data['lat'] = $lat;
    $return_data['lng'] = $lng;

    echo json_encode($return_data);
?>