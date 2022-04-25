<?php
$con = new mysqli('localhost','root','','agro');
$weeks = $_POST['weeks'];
$years = $_POST['years'];
$type_id = $_POST['type_id'];
if($type_id === "VHI"){
  $query1 =$con->query("SELECT VHI,year,week from `crop` where  year = '$years'" );
  $month = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['VHI'];
  }
    $return_data = array();
    $return_data['month'] = $month; 
    echo json_encode($return_data);
}
elseif($type_id === "VCI"){
  $query1 =$con->query("SELECT VCI,year,week from `crop` where  year = '$years'" );
  $month = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['VCI'];
  }
    $return_data = array();
    $return_data['month'] = $month; 
    echo json_encode($return_data);
}
else{
  $query1 =$con->query("SELECT NDVI,year,week from `crop` where  year = '$years'" );
  $month = array();
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['NDVI'];
  }
    $return_data = array();
    $return_data['month'] = $month; 
    echo json_encode($return_data);
}
?>