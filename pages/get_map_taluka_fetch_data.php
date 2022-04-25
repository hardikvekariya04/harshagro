<?php
$con = new mysqli('localhost','root','','agro');
$weeks = $_POST['weeks'];
$years = $_POST['years'];
$type_id = $_POST['type_id'];
if($type_id === "VHI"){
  $query1 =$con->query("SELECT VHI from `taluka_crop` where  year = '$years'" );
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
  $query1 =$con->query("SELECT VCI from `taluka_crop` where  year = '$years'" );
  $NDVI = array();
  while($row1 = $query1->fetch_assoc()){
    $NDVI[] = $row1['VCI'];
  }
    $return_data = array();
    $return_data['NDVI'] = $NDVI; 
    echo json_encode($return_data);
}
else{
  $query1 =$con->query("SELECT NDVI,year,week from `taluka_crop` where  year = '$years'" );
  $NDVI = array();
  while($row1 = $query1->fetch_assoc()){
    $NDVI[] = $row1['NDVI'];
  }
    $return_data = array();
    $return_data['NDVI'] = $NDVI; 
    echo json_encode($return_data);
}
?>