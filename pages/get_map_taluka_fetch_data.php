<?php
$con = new mysqli('localhost','root','','agro');
$weeks = $_POST['weeks'];
$years = $_POST['years'];
$type_id = $_POST['type_id'];
if($type_id === "NDVI"){
  $query1 =$con->query("SELECT NDVI from `taluka_crop` where week = '$weeks' AND year = '$years'" );
  $NDVI = array();
  while($row1 = $query1->fetch_assoc()){
    $NDVI[] = $row1['NDVI'];
  }
//   echo json_encode($NDVI);
    $return_data = array();
    $return_data['NDVI'] = $NDVI; 
    echo json_encode($return_data);
}
elseif($type_id === "SMT"){
  $query1 =$con->query("SELECT SMT from `taluka_crop` where week = '$weeks' AND year = '$years'" );
  $NDVI = array();
  while($row1 = $query1->fetch_assoc()){
    $NDVI[] = $row1['SMT'];
  }
    $return_data = array();
    $return_data['NDVI'] = $NDVI; 
    echo json_encode($return_data);
}
elseif($type_id === "TCI"){
  $query1 =$con->query("SELECT TCI from `taluka_crop` where week = '$weeks' AND year = '$years'" );
  $NDVI = array();
  while($row1 = $query1->fetch_assoc()){
    $NDVI[] = $row1['TCI'];
  }
    $return_data = array();
    $return_data['NDVI'] = $NDVI; 
    echo json_encode($return_data);
}
elseif($type_id === "VCI"){
  $query1 =$con->query("SELECT VCI from `taluka_crop` where week = '$weeks' AND year = '$years'" );
  $NDVI = array();
  while($row1 = $query1->fetch_assoc()){
    $NDVI[] = $row1['VCI'];
  }
    $return_data = array();
    $return_data['NDVI'] = $NDVI; 
    echo json_encode($return_data);
}
else{
  $query1 =$con->query("SELECT VHI,year,week from `taluka_crop` where week = '$weeks' AND year = '$years'" );
  $NDVI = array();
  while($row1 = $query1->fetch_assoc()){
    $NDVI[] = $row1['VHI'];
  }
    $return_data = array();
    $return_data['NDVI'] = $NDVI; 
    echo json_encode($return_data);
}
?>