<?php
$con = new mysqli('localhost','root','','agro');
$d_id = $_POST['d_id'];
$week = $_POST['week'];
$year = $_POST['year'];
$per_id = $_POST['per_id'];
$period_id = $_POST['period_id'];
// $ret = array();
//last 7 days data fetch :
if($period_id === 'last 6 month'){
$dto = new DateTime();
$dto->setISODate($year,$week);
$ret = $dto->format('Y-m-d');
$month_date1 = $dto->format('Y');

$dto->modify('-7 days');
$ret2 = $dto->format('Y-m-d');
$month_date2 = $dto->format('Y');

$dto->modify('-7 days');
$ret3 = $dto->format('Y-m-d');
$month_date3 = $dto->format('Y');

$dto->modify('-7 days');
$ret4 = $dto->format('Y-m-d');
$month_date4 = $dto->format('Y');

$date = new DateTime($ret2);
$weeknumber1 = $date->format("W");

$date2 = new DateTime($ret3);
$weeknumber2 = $date2->format("W");

$date3 = new DateTime($ret4);
$weeknumber3 = $date3->format("W");

  $query1 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$week' AND year = '$year'" );
  while($row1 = $query1->fetch_assoc()){
    $month1[] = $row1['SMT'];
  }

$query2 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
  while($row2 = $query2->fetch_assoc()){
    $month2[] = $row2['SMT'];
  }

  $query3 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
  while($row3 = $query3->fetch_assoc()){
    $month3[] = $row3['SMT'];
  }

  $query4 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
  while($row4 = $query4->fetch_assoc()){
    $month4[] = $row4['SMT'];
  }

$one_month_avg=array();
 $month_final1 = array_merge($month4,$month3,$month2,$month1);
 $one_month_avg[] = array_sum($month_final1)/count($month_final1);

 // ------------------------------------------------------------------------------------//

 // second month
$dto->modify('-7 days');
$ret5 = $dto->format('Y-m-d');
$month_date5 = $dto->format('Y');

$dto->modify('-7 days');
$ret6 = $dto->format('Y-m-d');
$month_date6 = $dto->format('Y');

$dto->modify('-7 days');
$ret7 = $dto->format('Y-m-d');
$month_date7 = $dto->format('Y');

$dto->modify('-7 days');
$ret8 = $dto->format('Y-m-d');
$month_date8 = $dto->format('Y');

$date4 = new DateTime($ret5);
$weeknumber4 = $date4->format("W");

$date5 = new DateTime($ret6);
$weeknumber5 = $date5->format("W");

$date6 = new DateTime($ret7);
$weeknumber6 = $date6->format("W");

$date7 = new DateTime($ret8);
$weeknumber7 = $date7->format("W");

$query5 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$month_date5'" );
  while($row5 = $query5->fetch_assoc()){
    $month5[] = $row5['SMT'];
  }
  $query6 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
  while($row6 = $query6->fetch_assoc()){
    $month6[] = $row6['SMT'];
  }
  $query7 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
  while($row7 = $query7->fetch_assoc()){
    $month7[] = $row7['SMT'];
  }
  $query8 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
  while($row8 = $query8->fetch_assoc()){
    $month8[] = $row8['SMT'];
  }

  $second_month_avg= array();
  $month_final2 = array_merge($month5,$month6,$month7,$month8);
  $second_month_avg[] = array_sum($month_final2)/count($month_final2);

//-------------------------------------------------------------------------------------------------------
  //Third month

$dto->modify('-7 days');
$ret9 = $dto->format('Y-m-d');
$month_date9 = $dto->format('Y');

$dto->modify('-7 days');
$ret10 = $dto->format('Y-m-d');
$month_date10 = $dto->format('Y');

$dto->modify('-7 days');
$ret11 = $dto->format('Y-m-d');
$month_date11 = $dto->format('Y');

$dto->modify('-7 days');
$ret12 = $dto->format('Y-m-d');
$month_date12 = $dto->format('Y');

$date9 = new DateTime($ret9);
$weeknumber9 = $date9->format("W");

$date10 = new DateTime($ret10);
$weeknumber10 = $date10->format("W");

$date11 = new DateTime($ret11);
$weeknumber11 = $date11->format("W");

$date12 = new DateTime($ret12);
$weeknumber12 = $date12->format("W");


$query9 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber9' AND year = '$month_date9'" );
  while($row9 = $query9->fetch_assoc()){
    $month9[] = $row9['SMT'];
  }
  $query10 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
  while($row10 = $query10->fetch_assoc()){
    $month10[] = $row10['SMT'];
  }
  $query11 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
  while($row11 = $query11->fetch_assoc()){
    $month11[] = $row11['SMT'];
  }
  $query12 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
  while($row12 = $query12->fetch_assoc()){
    $month12[] = $row12['SMT'];
  }

  $third_month_avg= array();
  $month_final3 = array_merge($month9,$month10,$month11,$month12);
  $third_month_avg[] = array_sum($month_final3)/count($month_final3);

   /* ============================================================================================*/
   //four month

$dto->modify('-7 days');
$ret13 = $dto->format('Y-m-d');
$month_date13 = $dto->format('Y');

$dto->modify('-7 days');
$ret14 = $dto->format('Y-m-d');
$month_date14 = $dto->format('Y');

$dto->modify('-7 days');
$ret15 = $dto->format('Y-m-d');
$month_date15 = $dto->format('Y');

$dto->modify('-7 days');
$ret16 = $dto->format('Y-m-d');
$month_date16 = $dto->format('Y');

$date13 = new DateTime($ret13);
$weeknumber13 = $date13->format("W");

$date14 = new DateTime($ret14);
$weeknumber14 = $date14->format("W");

$date15 = new DateTime($ret15);
$weeknumber15 = $date15->format("W");

$date16 = new DateTime($ret16);
$weeknumber16 = $date16->format("W");


$query13 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber13' AND year = '$month_date13'" );
  while($row13 = $query13->fetch_assoc()){
    $month13[] = $row13['SMT'];
  }
  $query14 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
  while($row14 = $query14->fetch_assoc()){
    $month14[] = $row14['SMT'];
  }
  $query15 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
  while($row15 = $query15->fetch_assoc()){
    $month15[] = $row15['SMT'];
  }
  $query16 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
  while($row16 = $query16->fetch_assoc()){
    $month16[] = $row16['SMT'];
  }

  $four_month_avg= array();
  $month_final4 = array_merge($month13,$month14,$month15,$month16);
  $four_month_avg[] = array_sum($month_final4)/count($month_final4);

  /*============================================================================*/
  // five month
  $dto->modify('-7 days');
$ret17 = $dto->format('Y-m-d');
$month_date17 = $dto->format('Y');

$dto->modify('-7 days');
$ret18 = $dto->format('Y-m-d');
$month_date18 = $dto->format('Y');

$dto->modify('-7 days');
$ret19 = $dto->format('Y-m-d');
$month_date19 = $dto->format('Y');

$dto->modify('-7 days');
$ret20 = $dto->format('Y-m-d');
$month_date20 = $dto->format('Y');

$date17 = new DateTime($ret17);
$weeknumber17 = $date17->format("W");

$date18 = new DateTime($ret18);
$weeknumber18 = $date18->format("W");

$date19 = new DateTime($ret19);
$weeknumber19 = $date19->format("W");

$date20 = new DateTime($ret20);
$weeknumber20 = $date20->format("W");


$query17 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber17' AND year = '$month_date17'" );
  while($row17 = $query17->fetch_assoc()){
    $month17[] = $row17['SMT'];
  }
  $query18 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
  while($row18 = $query18->fetch_assoc()){
    $month18[] = $row18['SMT'];
  }
  $query19 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
  while($row19 = $query19->fetch_assoc()){
    $month19[] = $row19['SMT'];
  }
  $query20 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
  while($row20 = $query20->fetch_assoc()){
    $month20[] = $row20['SMT'];
  }

  $five_month_avg= array();
  $month_final5 = array_merge($month17,$month18,$month19,$month20);
  $five_month_avg[] = array_sum($month_final5)/count($month_final5);

/*--------------------------------------------------------------------------------------------*/
//six month
$dto->modify('-7 days');
$ret21 = $dto->format('Y-m-d');
$month_date21 = $dto->format('Y');

$dto->modify('-7 days');
$ret22 = $dto->format('Y-m-d');
$month_date22 = $dto->format('Y');

$dto->modify('-7 days');
$ret23 = $dto->format('Y-m-d');
$month_date23 = $dto->format('Y');

$dto->modify('-7 days');
$ret24 = $dto->format('Y-m-d');
$month_date24 = $dto->format('Y');

$date21 = new DateTime($ret21);
$weeknumber21 = $date21->format("W");

$date22 = new DateTime($ret22);
$weeknumber22 = $date22->format("W");

$date23 = new DateTime($ret23);
$weeknumber23 = $date23->format("W");

$date24 = new DateTime($ret24);
$weeknumber24 = $date24->format("W");


$query21 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber21' AND year = '$month_date21'" );
  while($row21 = $query21->fetch_assoc()){
    $month21[] = $row21['SMT'];
  }
  $query22 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
  while($row22 = $query22->fetch_assoc()){
    $month22[] = $row22['SMT'];
  }
  $query23 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
  while($row23 = $query23->fetch_assoc()){
    $month23[] = $row23['SMT'];
  }
  $query24 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
  while($row24 = $query24->fetch_assoc()){
    $month24[] = $row24['SMT'];
  }

  $six_month_avg= array();
  $month_final6 = array_merge($month21,$month22,$month23,$month24);
  $six_month_avg[] = array_sum($month_final6)/count($month_final6);


    $one_month_date = array();
    $second_month_date =array();
    $third_month_date = array();
    $four_month_date = array();
    $five_month_date = array();
    $six_month_date = array();


    $one_month_date[] = strval($ret);
    $second_month_date[] = strval($ret5);
    $third_month_date[] = strval($ret9);
    $four_month_date[] = strval($ret13);
    $five_month_date[] = strval($ret17);
    $six_month_date[] = strval($ret21);


    $date_array = array_merge($six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
    $final_month_array = array_merge($six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);

  $return_data = array();
  $return_data['final_month_array'] =$final_month_array;
  $return_data['date_array'] =$date_array;
  echo json_encode($return_data);
}


else{
  $dto = new DateTime();
$dto->setISODate($year,$week);
$ret = $dto->format('Y-m-d');
$month_date1 = $dto->format('Y');

$dto->modify('-7 days');
$ret2 = $dto->format('Y-m-d');
$month_date2 = $dto->format('Y');

$dto->modify('-7 days');
$ret3 = $dto->format('Y-m-d');
$month_date3 = $dto->format('Y');

$dto->modify('-7 days');
$ret4 = $dto->format('Y-m-d');
$month_date4 = $dto->format('Y');

$date = new DateTime($ret2);
$weeknumber1 = $date->format("W");

$date2 = new DateTime($ret3);
$weeknumber2 = $date2->format("W");

$date3 = new DateTime($ret4);
$weeknumber3 = $date3->format("W");

  $query1 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$week' AND year = '$year'" );
  while($row1 = $query1->fetch_assoc()){
    $month1[] = $row1['NDVI'];
  }

$query2 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
  while($row2 = $query2->fetch_assoc()){
    $month2[] = $row2['NDVI'];
  }

  $query3 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
  while($row3 = $query3->fetch_assoc()){
    $month3[] = $row3['NDVI'];
  }

  $query4 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
  while($row4 = $query4->fetch_assoc()){
    $month4[] = $row4['NDVI'];
  }

$one_month_avg=array();
 $month_final1 = array_merge($month4,$month3,$month2,$month1);
 $one_month_avg[] = array_sum($month_final1)/count($month_final1);

 // ------------------------------------------------------------------------------------//

 // second month
$dto->modify('-7 days');
$ret5 = $dto->format('Y-m-d');
$month_date5 = $dto->format('Y');

$dto->modify('-7 days');
$ret6 = $dto->format('Y-m-d');
$month_date6 = $dto->format('Y');

$dto->modify('-7 days');
$ret7 = $dto->format('Y-m-d');
$month_date7 = $dto->format('Y');

$dto->modify('-7 days');
$ret8 = $dto->format('Y-m-d');
$month_date8 = $dto->format('Y');

$date4 = new DateTime($ret5);
$weeknumber4 = $date4->format("W");

$date5 = new DateTime($ret6);
$weeknumber5 = $date5->format("W");

$date6 = new DateTime($ret7);
$weeknumber6 = $date6->format("W");

$date7 = new DateTime($ret8);
$weeknumber7 = $date7->format("W");

$query5 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$month_date5'" );
  while($row5 = $query5->fetch_assoc()){
    $month5[] = $row5['NDVI'];
  }
  $query6 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
  while($row6 = $query6->fetch_assoc()){
    $month6[] = $row6['NDVI'];
  }
  $query7 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
  while($row7 = $query7->fetch_assoc()){
    $month7[] = $row7['NDVI'];
  }
  $query8 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
  while($row8 = $query8->fetch_assoc()){
    $month8[] = $row8['NDVI'];
  }

  $second_month_avg= array();
  $month_final2 = array_merge($month5,$month6,$month7,$month8);
  $second_month_avg[] = array_sum($month_final2)/count($month_final2);

//-------------------------------------------------------------------------------------------------------
  //Third month

$dto->modify('-7 days');
$ret9 = $dto->format('Y-m-d');
$month_date9 = $dto->format('Y');

$dto->modify('-7 days');
$ret10 = $dto->format('Y-m-d');
$month_date10 = $dto->format('Y');

$dto->modify('-7 days');
$ret11 = $dto->format('Y-m-d');
$month_date11 = $dto->format('Y');

$dto->modify('-7 days');
$ret12 = $dto->format('Y-m-d');
$month_date12 = $dto->format('Y');

$date9 = new DateTime($ret9);
$weeknumber9 = $date9->format("W");

$date10 = new DateTime($ret10);
$weeknumber10 = $date10->format("W");

$date11 = new DateTime($ret11);
$weeknumber11 = $date11->format("W");

$date12 = new DateTime($ret12);
$weeknumber12 = $date12->format("W");


$query9 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber9' AND year = '$month_date9'" );
  while($row9 = $query9->fetch_assoc()){
    $month9[] = $row9['NDVI'];
  }
  $query10 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
  while($row10 = $query10->fetch_assoc()){
    $month10[] = $row10['NDVI'];
  }
  $query11 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
  while($row11 = $query11->fetch_assoc()){
    $month11[] = $row11['NDVI'];
  }
  $query12 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
  while($row12 = $query12->fetch_assoc()){
    $month12[] = $row12['NDVI'];
  }

  $third_month_avg= array();
  $month_final3 = array_merge($month9,$month10,$month11,$month12);
  $third_month_avg[] = array_sum($month_final3)/count($month_final3);

   /* ============================================================================================*/
   //four month

$dto->modify('-7 days');
$ret13 = $dto->format('Y-m-d');
$month_date13 = $dto->format('Y');

$dto->modify('-7 days');
$ret14 = $dto->format('Y-m-d');
$month_date14 = $dto->format('Y');

$dto->modify('-7 days');
$ret15 = $dto->format('Y-m-d');
$month_date15 = $dto->format('Y');

$dto->modify('-7 days');
$ret16 = $dto->format('Y-m-d');
$month_date16 = $dto->format('Y');

$date13 = new DateTime($ret13);
$weeknumber13 = $date13->format("W");

$date14 = new DateTime($ret14);
$weeknumber14 = $date14->format("W");

$date15 = new DateTime($ret15);
$weeknumber15 = $date15->format("W");

$date16 = new DateTime($ret16);
$weeknumber16 = $date16->format("W");


$query13 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber13' AND year = '$month_date13'" );
  while($row13 = $query13->fetch_assoc()){
    $month13[] = $row13['NDVI'];
  }
  $query14 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
  while($row14 = $query14->fetch_assoc()){
    $month14[] = $row14['NDVI'];
  }
  $query15 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
  while($row15 = $query15->fetch_assoc()){
    $month15[] = $row15['NDVI'];
  }
  $query16 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
  while($row16 = $query16->fetch_assoc()){
    $month16[] = $row16['NDVI'];
  }

  $four_month_avg= array();
  $month_final4 = array_merge($month13,$month14,$month15,$month16);
  $four_month_avg[] = array_sum($month_final4)/count($month_final4);

  /*============================================================================*/
  // five month
  $dto->modify('-7 days');
$ret17 = $dto->format('Y-m-d');
$month_date17 = $dto->format('Y');

$dto->modify('-7 days');
$ret18 = $dto->format('Y-m-d');
$month_date18 = $dto->format('Y');

$dto->modify('-7 days');
$ret19 = $dto->format('Y-m-d');
$month_date19 = $dto->format('Y');

$dto->modify('-7 days');
$ret20 = $dto->format('Y-m-d');
$month_date20 = $dto->format('Y');

$date17 = new DateTime($ret17);
$weeknumber17 = $date17->format("W");

$date18 = new DateTime($ret18);
$weeknumber18 = $date18->format("W");

$date19 = new DateTime($ret19);
$weeknumber19 = $date19->format("W");

$date20 = new DateTime($ret20);
$weeknumber20 = $date20->format("W");


$query17 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber17' AND year = '$month_date17'" );
  while($row17 = $query17->fetch_assoc()){
    $month17[] = $row17['NDVI'];
  }
  $query18 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
  while($row18 = $query18->fetch_assoc()){
    $month18[] = $row18['NDVI'];
  }
  $query19 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
  while($row19 = $query19->fetch_assoc()){
    $month19[] = $row19['NDVI'];
  }
  $query20 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
  while($row20 = $query20->fetch_assoc()){
    $month20[] = $row20['NDVI'];
  }

  $five_month_avg= array();
  $month_final5 = array_merge($month17,$month18,$month19,$month20);
  $five_month_avg[] = array_sum($month_final5)/count($month_final5);

/*--------------------------------------------------------------------------------------------*/
//six month
$dto->modify('-7 days');
$ret21 = $dto->format('Y-m-d');
$month_date21 = $dto->format('Y');

$dto->modify('-7 days');
$ret22 = $dto->format('Y-m-d');
$month_date22 = $dto->format('Y');

$dto->modify('-7 days');
$ret23 = $dto->format('Y-m-d');
$month_date23 = $dto->format('Y');

$dto->modify('-7 days');
$ret24 = $dto->format('Y-m-d');
$month_date24 = $dto->format('Y');

$date21 = new DateTime($ret21);
$weeknumber21 = $date21->format("W");

$date22 = new DateTime($ret22);
$weeknumber22 = $date22->format("W");

$date23 = new DateTime($ret23);
$weeknumber23 = $date23->format("W");

$date24 = new DateTime($ret24);
$weeknumber24 = $date24->format("W");


$query21 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber21' AND year = '$month_date21'" );
  while($row21 = $query21->fetch_assoc()){
    $month21[] = $row21['NDVI'];
  }
  $query22 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
  while($row22 = $query22->fetch_assoc()){
    $month22[] = $row22['NDVI'];
  }
  $query23 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
  while($row23 = $query23->fetch_assoc()){
    $month23[] = $row23['NDVI'];
  }
  $query24 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
  while($row24 = $query24->fetch_assoc()){
    $month24[] = $row24['NDVI'];
  }

  $six_month_avg= array();
  $month_final6 = array_merge($month21,$month22,$month23,$month24);
  $six_month_avg[] = array_sum($month_final6)/count($month_final6);

//seven month
$dto->modify('-7 days');
$ret25 = $dto->format('Y-m-d');
$month_date25 = $dto->format('Y');

$dto->modify('-7 days');
$ret26 = $dto->format('Y-m-d');
$month_date26 = $dto->format('Y');

$dto->modify('-7 days');
$ret27 = $dto->format('Y-m-d');
$month_date27 = $dto->format('Y');

$dto->modify('-7 days');
$ret28 = $dto->format('Y-m-d');
$month_date28 = $dto->format('Y');

$date25 = new DateTime($ret25);
$weeknumber25 = $date25->format("W");

$date26 = new DateTime($ret26);
$weeknumber26 = $date26->format("W");

$date27 = new DateTime($ret27);
$weeknumber27 = $date27->format("W");

$date28 = new DateTime($ret28);
$weeknumber28 = $date28->format("W");


$query25 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber25' AND year = '$month_date25'" );
  while($row25 = $query25->fetch_assoc()){
    $month25[] = $row25['NDVI'];
  }
  $query26 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber26' AND year = '$month_date26'" );
  while($row26 = $query26->fetch_assoc()){
    $month26[] = $row26['NDVI'];
  }
  $query27 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber27' AND year = '$month_date27'" );
  while($row27 = $query27->fetch_assoc()){
    $month27[] = $row27['NDVI'];
  }
  $query28 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber28' AND year = '$month_date28'" );
  while($row28 = $query28->fetch_assoc()){
    $month28[] = $row28['NDVI'];
  }

  $seven_month_avg= array();
  $month_final7 = array_merge($month25,$month26,$month27,$month28);
  $seven_month_avg[] = array_sum($month_final7)/count($month_final7);

//eight month

$dto->modify('-7 days');
$ret29 = $dto->format('Y-m-d');
$month_date29 = $dto->format('Y');

$dto->modify('-7 days');
$ret30 = $dto->format('Y-m-d');
$month_date30 = $dto->format('Y');

$dto->modify('-7 days');
$ret31 = $dto->format('Y-m-d');
$month_date31 = $dto->format('Y');

$dto->modify('-7 days');
$ret32 = $dto->format('Y-m-d');
$month_date32 = $dto->format('Y');

$date29 = new DateTime($ret29);
$weeknumber29 = $date29->format("W");

$date30 = new DateTime($ret30);
$weeknumber30 = $date30->format("W");

$date31 = new DateTime($ret31);
$weeknumber31 = $date31->format("W");

$date32 = new DateTime($ret32);
$weeknumber32 = $date32->format("W");


$query29 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber29' AND year = '$month_date29'" );
  while($row29 = $query29->fetch_assoc()){
    $month29[] = $row29['NDVI'];
  }
  $query30 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber30' AND year = '$month_date30'" );
  while($row30 = $query30->fetch_assoc()){
    $month30[] = $row30['NDVI'];
  }
  $query31 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber31' AND year = '$month_date31'" );
  while($row31 = $query31->fetch_assoc()){
    $month31[] = $row31['NDVI'];
  }
  $query32 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber32' AND year = '$month_date32'" );
  while($row32 = $query32->fetch_assoc()){
    $month32[] = $row32['NDVI'];
  }

  $eight_month_avg= array();
  $month_final8 = array_merge($month29,$month30,$month31,$month32);
  $eight_month_avg[] = array_sum($month_final8)/count($month_final8);


    $one_month_date = array();
    $second_month_date =array();
    $third_month_date = array();
    $four_month_date = array();
    $five_month_date = array();
    $six_month_date = array();
    $seven_month_date = array();
    $eight_month_date = array();
    $nine_month_date = array();

    $one_month_date[] = strval($ret);
    $second_month_date[] = strval($ret5);
    $third_month_date[] = strval($ret9);
    $four_month_date[] = strval($ret13);
    $five_month_date[] = strval($ret17);
    $six_month_date[] = strval($ret21);
    $seven_month_date[] = strval($ret25);
    $eight_month_date[] = strval($ret29);
    $nine_month_date[] = strval($ret21);


    $date_array = array_merge($eight_month_date,$seven_month_date,$six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
    $final_month_array = array_merge($eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);


    //nine month 
    $dto->modify('-7 days');
    $ret33 = $dto->format('Y-m-d');
    $month_date33 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret34 = $dto->format('Y-m-d');
    $month_date34 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret35 = $dto->format('Y-m-d');
    $month_date35 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret36 = $dto->format('Y-m-d');
    $month_date36 = $dto->format('Y');
    
    $date33 = new DateTime($ret33);
    $weeknumber33 = $date33->format("W");
    
    $date34 = new DateTime($ret34);
    $weeknumber34 = $date34->format("W");
    
    $date35 = new DateTime($ret35);
    $weeknumber35 = $date35->format("W");
    
    $date36 = new DateTime($ret36);
    $weeknumber36 = $date36->format("W");
    
    
    $query33 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber33' AND year = '$month_date33'" );
      while($row33 = $query33->fetch_assoc()){
        $month33[] = $row33['NDVI'];
      }
      $query34 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber34' AND year = '$month_date34'" );
      while($row34 = $query34->fetch_assoc()){
        $month34[] = $row34['NDVI'];
      }
      $query35 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber35' AND year = '$month_date35'" );
      while($row35 = $query35->fetch_assoc()){
        $month35[] = $row35['NDVI'];
      }
      $query36 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber36' AND year = '$month_date36'" );
      while($row36 = $query36->fetch_assoc()){
        $month36[] = $row36['NDVI'];
      }
    
      $nine_month_avg= array();
      $month_final9 = array_merge($month33,$month34,$month35,$month36);
      $nine_month_avg[] = array_sum($month_final9)/count($month_final9);
    
 //ten month
 $dto->modify('-7 days');
    $ret37 = $dto->format('Y-m-d');
    $month_date37 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret38 = $dto->format('Y-m-d');
    $month_date38 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret39 = $dto->format('Y-m-d');
    $month_date39 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret40 = $dto->format('Y-m-d');
    $month_date40 = $dto->format('Y');
    
    $date37 = new DateTime($ret37);
    $weeknumber37 = $date37->format("W");
    
    $date38 = new DateTime($ret38);
    $weeknumber38 = $date38->format("W");
    
    $date39 = new DateTime($ret39);
    $weeknumber39 = $date39->format("W");
    
    $date40 = new DateTime($ret40);
    $weeknumber40 = $date40->format("W");
    
    
    $query37 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber37' AND year = '$month_date37'" );
      while($row37 = $query37->fetch_assoc()){
        $month37[] = $row37['NDVI'];
      }
      $query38 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber38' AND year = '$month_date38'" );
      while($row38 = $query38->fetch_assoc()){
        $month38[] = $row38['NDVI'];
      }
      $query39 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber39' AND year = '$month_date39'" );
      while($row39 = $query39->fetch_assoc()){
        $month39[] = $row39['NDVI'];
      }
      $query40 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber40' AND year = '$month_date40'" );
      while($row40 = $query40->fetch_assoc()){
        $month40[] = $row40['NDVI'];
      }
    
      $ten_month_avg= array();
      $month_final10 = array_merge($month37,$month38,$month39,$month40);
      $ten_month_avg[] = array_sum($month_final10)/count($month_final10);
      
  //eleven month
  $dto->modify('-7 days');
  $ret41 = $dto->format('Y-m-d');
  $month_date41 = $dto->format('Y');
  
  $dto->modify('-7 days');
  $ret42 = $dto->format('Y-m-d');
  $month_date42 = $dto->format('Y');
  
  $dto->modify('-7 days');
  $ret43 = $dto->format('Y-m-d');
  $month_date43 = $dto->format('Y');
  
  $dto->modify('-7 days');
  $ret44 = $dto->format('Y-m-d');
  $month_date44 = $dto->format('Y');
  
  $date41 = new DateTime($ret41);
  $weeknumber41 = $date41->format("W");
  
  $date42 = new DateTime($ret42);
  $weeknumber42 = $date42->format("W");
  
  $date43 = new DateTime($ret43);
  $weeknumber43 = $date43->format("W");
  
  $date44 = new DateTime($ret44);
  $weeknumber44 = $date44->format("W");
  
  
  $query41 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber41' AND year = '$month_date41'" );
    while($row41 = $query41->fetch_assoc()){
      $month41[] = $row41['NDVI'];
    }
    $query42 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber42' AND year = '$month_date42'" );
    while($row42 = $query42->fetch_assoc()){
      $month42[] = $row42['NDVI'];
    }
    $query43 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber43' AND year = '$month_date43'" );
    while($row43 = $query43->fetch_assoc()){
      $month43[] = $row43['NDVI'];
    }
    $query44 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber44' AND year = '$month_date44'" );
    while($row44 = $query44->fetch_assoc()){
      $month44[] = $row44['NDVI'];
    }
  
    $eleven_month_avg= array();
    $month_final11 = array_merge($month41,$month42,$month43,$month44);
    $eleven_month_avg[] = array_sum($month_final11)/count($month_final11);

    //tewlve month
    $dto->modify('-7 days');
    $ret45 = $dto->format('Y-m-d');
    $month_date45 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret46 = $dto->format('Y-m-d');
    $month_date46 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret47 = $dto->format('Y-m-d');
    $month_date47 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret48 = $dto->format('Y-m-d');
    $month_date48 = $dto->format('Y');
    
    $date45 = new DateTime($ret45);
    $weeknumber45 = $date45->format("W");
    
    $date46 = new DateTime($ret46);
    $weeknumber46 = $date46->format("W");
    
    $date47 = new DateTime($ret47);
    $weeknumber47 = $date47->format("W");
    
    $date48 = new DateTime($ret48);
    $weeknumber48 = $date48->format("W");
    
    
    $query45 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber45' AND year = '$month_date45'" );
      while($row45 = $query45->fetch_assoc()){
        $month45[] = $row45['NDVI'];
      }
      $query46 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber46' AND year = '$month_date46'" );
      while($row46 = $query46->fetch_assoc()){
        $month46[] = $row46['NDVI'];
      }
      $query47 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber47' AND year = '$month_date47'" );
      while($row47 = $query47->fetch_assoc()){
        $month47[] = $row47['NDVI'];
      }
      $query48 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber48' AND year = '$month_date48'" );
      while($row48 = $query48->fetch_assoc()){
        $month48[] = $row48['NDVI'];
      }
    
      $twelve_month_avg= array();
      $month_final12 = array_merge($month45,$month46,$month47,$month48);
      $twelve_month_avg[] = array_sum($month_final12)/count($month_final12);
      
  //extra month
  $dto->modify('-7 days');
    $ret49 = $dto->format('Y-m-d');
    $month_date49 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret50 = $dto->format('Y-m-d');
    $month_date50 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret51 = $dto->format('Y-m-d');
    $month_date51 = $dto->format('Y');
    
    $dto->modify('-7 days');
    $ret52 = $dto->format('Y-m-d');
    $month_date52 = $dto->format('Y');
    
    $date49 = new DateTime($ret49);
    $weeknumber49 = $date49->format("W");
    
    $date50 = new DateTime($ret50);
    $weeknumber50 = $date50->format("W");
    
    $date51 = new DateTime($ret51);
    $weeknumber51 = $date51->format("W");
    
    $date52 = new DateTime($ret52);
    $weeknumber52 = $date52->format("W");
    
    
    $query49 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber49' AND year = '$month_date49'" );
      while($row49 = $query49->fetch_assoc()){
        $month49[] = $row49['NDVI'];
      }
      $query50 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber50' AND year = '$month_date50'" );
      while($row50 = $query50->fetch_assoc()){
        $month50[] = $row50['NDVI'];
      }
      $query51 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber51' AND year = '$month_date51'" );
      while($row51 = $query51->fetch_assoc()){
        $month51[] = $row51['NDVI'];
      }
      $query52 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber52' AND year = '$month_date52'" );
      while($row52 = $query52->fetch_assoc()){
        $month52[] = $row52['NDVI'];
      }
    
      $extra_month_avg= array();
      $month_final13 = array_merge($month49,$month50,$month51,$month52);
      $extra_month_avg[] = array_sum($month_final13)/count($month_final13);


        $one_month_date = array();
        $second_month_date =array();
        $third_month_date = array();
        $four_month_date = array();
        $five_month_date = array();
        $six_month_date = array();
        $seven_month_date = array();
        $eight_month_date = array();
        $nine_month_date = array();
        $ten_month_date = array();
        $eleven_month_date = array();
        $twelve_month_date = array();
        $extra_month_date = array();

        $one_month_date[] = strval($ret);
        $second_month_date[] = strval($ret5);
        $third_month_date[] = strval($ret9);
        $four_month_date[] = strval($ret13);
        $five_month_date[] = strval($ret17);
        $six_month_date[] = strval($ret21);
        $seven_month_date[] = strval($ret25);
        $eight_month_date[] = strval($ret29);
        $nine_month_date[] = strval($ret33);
        $ten_month_date[] = strval($ret37);
        $eleven_month_date[] = strval($ret41);
        $twelve_month_date[] = strval($ret45);
        $extra_month_date[] = strval($ret49);

        $date_array = array_merge($extra_month_date,$twelve_month_date,$eleven_month_date,$ten_month_date,$nine_month_date,$eight_month_date,$seven_month_date,$six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
        $final_month_array = array_merge($extra_month_avg,$twelve_month_avg,$eleven_month_avg,$ten_month_avg,$nine_month_avg,$eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);

  $return_data = array();
  $return_data['final_month_array'] =$final_month_array;
  $return_data['date_array'] =$date_array;
  echo json_encode($return_data);


}
