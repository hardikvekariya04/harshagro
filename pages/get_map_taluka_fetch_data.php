<?php
$con = new mysqli('localhost','root','','agrocast');
$weeks = $_POST['weeks'];

$select_week = substr($weeks, strpos($weeks, "W") + 1);

$trim_year = explode('-',trim($weeks))[0];

$type_id = $_POST['type_id'];
if($type_id === "VHI"){
  $query1 =$con->query("SELECT VHI,year,week from `taluka_crop` where  week='$select_week' AND year = '$trim_year'" );
  $NDVI = array();
  while($row1 = $query1->fetch_assoc()){
    $NDVI[] = $row1['VHI'];
  }
//   echo json_encode($NDVI);
    $return_data = array();
    $return_data['NDVI'] = $NDVI; 
    echo json_encode($return_data);
}
elseif($type_id === "VCI"){
  $query1 =$con->query("SELECT VCI,year,week from `taluka_crop` where week='$select_week' AND year = '$trim_year'" );
  $NDVI = array();
  while($row1 = $query1->fetch_assoc()){
    $NDVI[] = $row1['VCI'];
  }
    $return_data = array();
    $return_data['NDVI'] = $NDVI; 
    echo json_encode($return_data);
}
else{
  $query1 =$con->query("SELECT NDVI,year,week from `taluka_crop` where week='$select_week' AND year = '$trim_year'" );
  $NDVI = array();
  while($row1 = $query1->fetch_assoc()){
    $NDVI[] = $row1['NDVI'];
  }
    $return_data = array();
    $return_data['NDVI'] = $NDVI; 
    echo json_encode($return_data);
}
?>