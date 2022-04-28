<?php
$con = new mysqli('localhost','root','','agro');
$weeks = $_POST['weeks'];
$type_id = $_POST['type_id'];

$select_week = substr($weeks, strpos($weeks, "W") + 1);
// echo $select_week;
$trim_year = explode('-',trim($weeks))[0];
if($type_id === "VHI"){
  $query1 =$con->query("SELECT VHI,week,year from `crop` where  week='$select_week' AND  year = '$trim_year'" );
  $month = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['VHI'];
  }
    $return_data = array();
    $return_data['month'] = $month; 
    echo json_encode($return_data);
}
elseif($type_id === "VCI"){
  $query1 =$con->query("SELECT VCI,week,year from `crop` where week='$select_week' AND  year = '$trim_year'" );
  $month = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['VCI'];
  }
    $return_data = array();
    $return_data['month'] = $month; 
    echo json_encode($return_data);
}
else{
  $query1 =$con->query("SELECT NDVI,week,year from `crop` where week='$select_week' AND  year = '$trim_year'" );
  $month = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['NDVI'];
  }
    $return_data = array();
    $return_data['month'] = $month; 
    echo json_encode($return_data);
}
?>