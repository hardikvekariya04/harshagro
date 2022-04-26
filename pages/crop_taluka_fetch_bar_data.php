<?php
$con = new mysqli('localhost','root','','agro');
$t_id = $_POST['t_id'];
$week = $_POST['week'];
$year = $_POST['year'];
$per_id = $_POST['per_id'];
$period_id = $_POST['period_id'];

$dto = new DateTime();
$dto->setISODate($year,$week);
$ret = $dto->format('Y-m-d');
$month_date1 = $dto->format('Y');
$one_monthly =date("Y - M",strtotime($ret));

$ret1 = date("Y - M",strtotime($one_monthly . ' - 1 year'));
$month_date2 =date("Y",strtotime($ret1));

$ret2 = date("Y - M",strtotime($ret1 . ' - 1 year'));
$month_date3 =date("Y",strtotime($ret2));

if($per_id === "VCI"){
    $query1 =$con->query("SELECT AVG(VCI) as VCI from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date1'" );
    while($row1 = $query1->fetch_assoc()){
      $month1[] = $row1['VCI'];
    }
  
  $query2 =$con->query("SELECT AVG(VCI) as VCI  from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date2'" );
    while($row2 = $query2->fetch_assoc()){
      $month2[] = $row2['VCI'];
    }

    $query3 =$con->query("SELECT AVG(VCI) as VCI  from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date3'" );
    while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['VCI'];
    }
  
      $four_month_date = array();
      $five_month_date = array();
      $six_month_date = array();
  
      $four_month_date[] = strval($month_date3);
      $five_month_date[] = strval($month_date1);
      $six_month_date[] = strval($month_date2);
  
      $date_array = array_merge($four_month_date,$six_month_date,$five_month_date);
      $yearly_month_array = array_merge($month3,$month2,$month1);
  
    $return_data = array();
    $return_data['yearly_month_array'] =$yearly_month_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  
}
elseif($per_id === "VHI"){
  $query1 =$con->query("SELECT AVG(VHI) as VHI from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date1'" );
  while($row1 = $query1->fetch_assoc()){
    $month1[] = $row1['VHI'];
  }

$query2 =$con->query("SELECT AVG(VHI) as VHI  from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date2'" );
  while($row2 = $query2->fetch_assoc()){
    $month2[] = $row2['VHI'];
  }

  $query3 =$con->query("SELECT AVG(VHI) as VHI  from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date3'" );
  while($row3 = $query3->fetch_assoc()){
    $month3[] = $row3['VHI'];
  }

    $four_month_date = array();
    $five_month_date = array();
    $six_month_date = array();

    $four_month_date[] = strval($month_date3);
    $five_month_date[] = strval($month_date1);
    $six_month_date[] = strval($month_date2);

    $date_array = array_merge($four_month_date,$six_month_date,$five_month_date);
    $yearly_month_array = array_merge($month3,$month2,$month1);

  $return_data = array();
  $return_data['yearly_month_array'] =$yearly_month_array;
  $return_data['date_array'] =$date_array;
  echo json_encode($return_data);

}
elseif($per_id === "NDVI"){
  $query1 =$con->query("SELECT AVG(NDVI) as NDVI from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date1'" );
  while($row1 = $query1->fetch_assoc()){
    $month1[] = $row1['NDVI'];
  }

$query2 =$con->query("SELECT AVG(NDVI) as NDVI  from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date2'" );
  while($row2 = $query2->fetch_assoc()){
    $month2[] = $row2['NDVI'];
  }

  $query3 =$con->query("SELECT AVG(NDVI) as NDVI  from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date3'" );
  while($row3 = $query3->fetch_assoc()){
    $month3[] = $row3['NDVI'];
  }

    $four_month_date = array();
    $five_month_date = array();
    $six_month_date = array();

    $four_month_date[] = strval($month_date3);
    $five_month_date[] = strval($month_date1);
    $six_month_date[] = strval($month_date2);

    $date_array = array_merge($four_month_date,$six_month_date,$five_month_date);
    $yearly_month_array = array_merge($month3,$month2,$month1);

  $return_data = array();
  $return_data['yearly_month_array'] =$yearly_month_array;
  $return_data['date_array'] =$date_array;
  echo json_encode($return_data);

}
else{
  $query1 =$con->query("SELECT AVG(NDVI) as NDVI from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date1'" );
  while($row1 = $query1->fetch_assoc()){
    $month1[] = $row1['NDVI'];
  }

$query2 =$con->query("SELECT AVG(NDVI) as NDVI  from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date2'" );
  while($row2 = $query2->fetch_assoc()){
    $month2[] = $row2['NDVI'];
  }

  $query3 =$con->query("SELECT AVG(NDVI) as NDVI  from `taluka_crop` where t_id = ".$t_id."  AND week BETWEEN 1 AND 52 AND year = '$month_date3'" );
  while($row3 = $query3->fetch_assoc()){
    $month3[] = $row3['NDVI'];
  }

    $four_month_date = array();
    $five_month_date = array();
    $six_month_date = array();

    $four_month_date[] = strval($month_date3);
    $five_month_date[] = strval($month_date1);
    $six_month_date[] = strval($month_date2);

    $date_array = array_merge($four_month_date,$six_month_date,$five_month_date);
    $yearly_month_array = array_merge($month3,$month2,$month1);

  $return_data = array();
  $return_data['yearly_month_array'] =$yearly_month_array;
  $return_data['date_array'] =$date_array;
  echo json_encode($return_data);

}
?>