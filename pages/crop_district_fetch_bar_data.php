<?php
$con = new mysqli('localhost','root','','agro');
$d_id = $_POST['d_id'];
$week = $_POST['week'];
$year = $_POST['year'];
$per_id = $_POST['per_id'];
$period_id = $_POST['period_id'];

if($period_id === 'last 6 month' && $per_id === "NDVI"){
  $dto = new DateTime();
  $dto->setISODate($year,$week);
  $ret = $dto->format('Y-m-d');
  $month_date1 = $dto->format('Y');
  $one_monthly =date("Y - M",strtotime($ret));

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
    $month1 = array();
    $month1[] = "";
    while($row1 = $query1->fetch_assoc()){
      $month1[] = $row1['NDVI'];
    }
  
  $query2 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
  $month2 = array();
    $month2[] = "";  
  while($row2 = $query2->fetch_assoc()){
      $month2[] = $row2['NDVI'];
    }
  
    $query3 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
    $month3 = array();
    $month3[] = "";
    while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['NDVI'];
    }
  
    $query4 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
    $month4 = array();
    $month4[] = "";
    while($row4 = $query4->fetch_assoc()){
      $month4[] = $row4['NDVI'];
    }
  
  $one_month_avg=array();
   $month_final1 = array_merge($month4,$month3,$month2,$month1);
   $one_month_avg[] = array_sum($month_final1)/4;
  
   // ------------------------------------------------------------------------------------//
  
   // second month
  $dto->modify('-7 days');
  $ret5 = $dto->format('Y-m-d');
  $month_date5 = $dto->format('Y');
  $second_monthly =date("Y - M",strtotime($ret5));

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
  $month5 = array();
    $month5[] = "";  
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['NDVI'];
    }
    $query6 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
    $month6 = array();
    $month6[] = "";
    while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['NDVI'];
    }
    $query7 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
    $month7 = array();
    $month7[] = "";
    while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['NDVI'];
    }
    $query8 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
    $month8 = array();
    $month8[] = "";
    while($row8 = $query8->fetch_assoc()){
      $month8[] = $row8['NDVI'];
    }
  
    $second_month_avg= array();
    $month_final2 = array_merge($month5,$month6,$month7,$month8);
    $second_month_avg[] = array_sum($month_final2)/4;
  
  //-------------------------------------------------------------------------------------------------------
    //Third month
  
  $dto->modify('-7 days');
  $ret9 = $dto->format('Y-m-d');
  $month_date9 = $dto->format('Y');
  $third_monthly =date("Y - M",strtotime($ret9));

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
  $month9 = array();
    $month9[] = "";  
  while($row9 = $query9->fetch_assoc()){
      $month9[] = $row9['NDVI'];
    }
    // echo json_encode($month9);
    $query10 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
    $month10 = array();
    $month10[] = "";
    while($row10 = $query10->fetch_assoc()){
      $month10[] = $row10['NDVI'];
    }
    $query11 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
    $month11 = array();
    $month11[] = "";
    while($row11 = $query11->fetch_assoc()){
      $month11[] = $row11['NDVI'];
    }
    
    $query12 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
    $month12 = array();
    $month12[] = "";
    while($row12 = $query12->fetch_assoc()){
      $month12[] = $row12['NDVI'];
    }
  
    $third_month_avg= array();
    $month_final3 = array_merge($month9,$month10,$month11,$month12);
    $third_month_avg[] = array_sum($month_final3)/4;
  
     /* ============================================================================================*/
     //four month
  
  $dto->modify('-7 days');
  $ret13 = $dto->format('Y-m-d');
  $month_date13 = $dto->format('Y');
  $four_monthly =date("Y - M",strtotime($ret13));

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
  $month13 = array();
    $month13[] = "";  
  while($row13 = $query13->fetch_assoc()){
      $month13[] = $row13['NDVI'];
    }
    $query14 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
    $month14 = array();
    $month14[] = "";
    while($row14 = $query14->fetch_assoc()){
      $month14[] = $row14['NDVI'];
    }
    $query15 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
    $month15 = array();
    $month15[] = "";
    while($row15 = $query15->fetch_assoc()){
      $month15[] = $row15['NDVI'];
    }
    $query16 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
    $month16 = array();
    $month16[] = "";
    while($row16 = $query16->fetch_assoc()){
      $month16[] = $row16['NDVI'];
    }
  
    $four_month_avg= array();
    $month_final4 = array_merge($month13,$month14,$month15,$month16);
    $four_month_avg[] = array_sum($month_final4)/4;
  
    /*============================================================================*/
    // five month
    $dto->modify('-7 days');
  $ret17 = $dto->format('Y-m-d');
  $month_date17 = $dto->format('Y');
  $five_monthly =date("Y - M",strtotime($ret17));

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
  $month17 = array();
    $month17[] = "";  
  while($row17 = $query17->fetch_assoc()){
      $month17[] = $row17['NDVI'];
    }
    $query18 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
    $month18 = array();
    $month18[] = "";
    while($row18 = $query18->fetch_assoc()){
      $month18[] = $row18['NDVI'];
    }
    $query19 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
    $month19 = array();
    $month19[] = "";
    while($row19 = $query19->fetch_assoc()){
      $month19[] = $row19['NDVI'];
    }
    $query20 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
    $month20 = array();
    $month20[] = "";
    while($row20 = $query20->fetch_assoc()){
      $month20[] = $row20['NDVI'];
    }
  
    $five_month_avg= array();
    $month_final5 = array_merge($month17,$month18,$month19,$month20);
    $five_month_avg[] = array_sum($month_final5)/4;
  
  /*--------------------------------------------------------------------------------------------*/
  //six month
  $dto->modify('-7 days');
  $ret21 = $dto->format('Y-m-d');
  $month_date21 = $dto->format('Y');
  $six_monthly =date("Y - M",strtotime($ret21));

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
  $month21 = array();
    $month21[] = "";  
  while($row21 = $query21->fetch_assoc()){
      $month21[] = $row21['NDVI'];
    }
    $query22 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
    $month22 = array();
    $month22[] = "";
    while($row22 = $query22->fetch_assoc()){
      $month22[] = $row22['NDVI'];
    }
    $query23 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
    $month23 = array();
    $month23[] = "";
    while($row23 = $query23->fetch_assoc()){
      $month23[] = $row23['NDVI'];
    }
    $query24 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
    $month24 = array();
    $month24[] = "";
    while($row24 = $query24->fetch_assoc()){
      $month24[] = $row24['NDVI'];
    }
  
    $six_month_avg= array();
    $month_final6 = array_merge($month21,$month22,$month23,$month24);
    $six_month_avg[] = array_sum($month_final6)/4;
  
  
      $one_month_date = array();
      $second_month_date =array();
      $third_month_date = array();
      $four_month_date = array();
      $five_month_date = array();
      $six_month_date = array();
  
  
      $one_month_date[] = strval($one_monthly);
      $second_month_date[] = strval($second_monthly);
      $third_month_date[] = strval($third_monthly);
      $four_month_date[] = strval($four_monthly);
      $five_month_date[] = strval($five_monthly);
      $six_month_date[] = strval($six_monthly);
  
  
      $date_array = array_merge($six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
      $yearly_month_array = array_merge($six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
    $return_data = array();
    $return_data['yearly_month_array'] =$yearly_month_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  
}
// elseif($period_id === 'last 6 month' && $per_id === "SMT"){
//     $dto = new DateTime();
//   $dto->setISODate($year,$week);
//   $ret = $dto->format('Y-m-d');
//   $month_date1 = $dto->format('Y');
//   $one_monthly =date("Y - M",strtotime($ret));

//   $dto->modify('-7 days');
//   $ret2 = $dto->format('Y-m-d');
//   $month_date2 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret3 = $dto->format('Y-m-d');
//   $month_date3 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret4 = $dto->format('Y-m-d');
//   $month_date4 = $dto->format('Y');
  
//   $date = new DateTime($ret2);
//   $weeknumber1 = $date->format("W");
  
//   $date2 = new DateTime($ret3);
//   $weeknumber2 = $date2->format("W");
  
//   $date3 = new DateTime($ret4);
//   $weeknumber3 = $date3->format("W");
  
//     $query1 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$week' AND year = '$year'" );
//     $month1 = array();
//     $month1[] = "";
//     while($row1 = $query1->fetch_assoc()){
//       $month1[] = $row1['SMT'];
//     }
  
//   $query2 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
//   $month2 = array();
//     $month2[] = "";  
//   while($row2 = $query2->fetch_assoc()){
//       $month2[] = $row2['SMT'];
//     }
  
//     $query3 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
//     $month3 = array();
//     $month3[] = "";
//     while($row3 = $query3->fetch_assoc()){
//       $month3[] = $row3['SMT'];
//     }
  
//     $query4 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
//     $month4 = array();
//     $month4[] = "";
//     while($row4 = $query4->fetch_assoc()){
//       $month4[] = $row4['SMT'];
//     }
  
//   $one_month_avg=array();
//    $month_final1 = array_merge($month4,$month3,$month2,$month1);
//    $one_month_avg[] = array_sum($month_final1)/4;
  
//    // ------------------------------------------------------------------------------------//
  
//    // second month
//   $dto->modify('-7 days');
//   $ret5 = $dto->format('Y-m-d');
//   $month_date5 = $dto->format('Y');
//   $second_monthly =date("Y - M",strtotime($ret5));

//   $dto->modify('-7 days');
//   $ret6 = $dto->format('Y-m-d');
//   $month_date6 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret7 = $dto->format('Y-m-d');
//   $month_date7 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret8 = $dto->format('Y-m-d');
//   $month_date8 = $dto->format('Y');
  
//   $date4 = new DateTime($ret5);
//   $weeknumber4 = $date4->format("W");
  
//   $date5 = new DateTime($ret6);
//   $weeknumber5 = $date5->format("W");
  
//   $date6 = new DateTime($ret7);
//   $weeknumber6 = $date6->format("W");
  
//   $date7 = new DateTime($ret8);
//   $weeknumber7 = $date7->format("W");
  
//   $query5 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$month_date5'" );
//   $month5 = array();
//     $month5[] = "";  
//   while($row5 = $query5->fetch_assoc()){
//       $month5[] = $row5['SMT'];
//     }
//     $query6 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
//     $month6 = array();
//     $month6[] = "";
//     while($row6 = $query6->fetch_assoc()){
//       $month6[] = $row6['SMT'];
//     }
//     $query7 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
//     $month7 = array();
//     $month7[] = "";
//     while($row7 = $query7->fetch_assoc()){
//       $month7[] = $row7['SMT'];
//     }
//     $query8 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
//     $month8 = array();
//     $month8[] = "";
//     while($row8 = $query8->fetch_assoc()){
//       $month8[] = $row8['SMT'];
//     }
  
//     $second_month_avg= array();
//     $month_final2 = array_merge($month5,$month6,$month7,$month8);
//     $second_month_avg[] = array_sum($month_final2)/4;
  
//   //-------------------------------------------------------------------------------------------------------
//     //Third month
  
//   $dto->modify('-7 days');
//   $ret9 = $dto->format('Y-m-d');
//   $month_date9 = $dto->format('Y');
//   $third_monthly =date("Y - M",strtotime($ret9));

//   $dto->modify('-7 days');
//   $ret10 = $dto->format('Y-m-d');
//   $month_date10 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret11 = $dto->format('Y-m-d');
//   $month_date11 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret12 = $dto->format('Y-m-d');
//   $month_date12 = $dto->format('Y');
  
//   $date9 = new DateTime($ret9);
//   $weeknumber9 = $date9->format("W");
  
//   $date10 = new DateTime($ret10);
//   $weeknumber10 = $date10->format("W");
  
//   $date11 = new DateTime($ret11);
//   $weeknumber11 = $date11->format("W");
  
//   $date12 = new DateTime($ret12);
//   $weeknumber12 = $date12->format("W");
  
  
//   $query9 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber9' AND year = '$month_date9'" );
//   $month9 = array();
//     $month9[] = "";  
//   while($row9 = $query9->fetch_assoc()){
//       $month9[] = $row9['SMT'];
//     }
//     // echo json_encode($month9);
//     $query10 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
//     $month10 = array();
//     $month10[] = "";
//     while($row10 = $query10->fetch_assoc()){
//       $month10[] = $row10['SMT'];
//     }
//     $query11 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
//     $month11 = array();
//     $month11[] = "";
//     while($row11 = $query11->fetch_assoc()){
//       $month11[] = $row11['SMT'];
//     }
    
//     $query12 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
//     $month12 = array();
//     $month12[] = "";
//     while($row12 = $query12->fetch_assoc()){
//       $month12[] = $row12['SMT'];
//     }
  
//     $third_month_avg= array();
//     $month_final3 = array_merge($month9,$month10,$month11,$month12);
//     $third_month_avg[] = array_sum($month_final3)/4;
  
//      /* ============================================================================================*/
//      //four month
  
//   $dto->modify('-7 days');
//   $ret13 = $dto->format('Y-m-d');
//   $month_date13 = $dto->format('Y');
//   $four_monthly =date("Y - M",strtotime($ret13));

//   $dto->modify('-7 days');
//   $ret14 = $dto->format('Y-m-d');
//   $month_date14 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret15 = $dto->format('Y-m-d');
//   $month_date15 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret16 = $dto->format('Y-m-d');
//   $month_date16 = $dto->format('Y');
  
//   $date13 = new DateTime($ret13);
//   $weeknumber13 = $date13->format("W");
  
//   $date14 = new DateTime($ret14);
//   $weeknumber14 = $date14->format("W");
  
//   $date15 = new DateTime($ret15);
//   $weeknumber15 = $date15->format("W");
  
//   $date16 = new DateTime($ret16);
//   $weeknumber16 = $date16->format("W");
  
  
//   $query13 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber13' AND year = '$month_date13'" );
//   $month13 = array();
//     $month13[] = "";  
//   while($row13 = $query13->fetch_assoc()){
//       $month13[] = $row13['SMT'];
//     }
//     $query14 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
//     $month14 = array();
//     $month14[] = "";
//     while($row14 = $query14->fetch_assoc()){
//       $month14[] = $row14['SMT'];
//     }
//     $query15 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
//     $month15 = array();
//     $month15[] = "";
//     while($row15 = $query15->fetch_assoc()){
//       $month15[] = $row15['SMT'];
//     }
//     $query16 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
//     $month16 = array();
//     $month16[] = "";
//     while($row16 = $query16->fetch_assoc()){
//       $month16[] = $row16['SMT'];
//     }
  
//     $four_month_avg= array();
//     $month_final4 = array_merge($month13,$month14,$month15,$month16);
//     $four_month_avg[] = array_sum($month_final4)/4;
  
//     /*============================================================================*/
//     // five month
//     $dto->modify('-7 days');
//   $ret17 = $dto->format('Y-m-d');
//   $month_date17 = $dto->format('Y');
//   $five_monthly =date("Y - M",strtotime($ret17));

//   $dto->modify('-7 days');
//   $ret18 = $dto->format('Y-m-d');
//   $month_date18 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret19 = $dto->format('Y-m-d');
//   $month_date19 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret20 = $dto->format('Y-m-d');
//   $month_date20 = $dto->format('Y');
  
//   $date17 = new DateTime($ret17);
//   $weeknumber17 = $date17->format("W");
  
//   $date18 = new DateTime($ret18);
//   $weeknumber18 = $date18->format("W");
  
//   $date19 = new DateTime($ret19);
//   $weeknumber19 = $date19->format("W");
  
//   $date20 = new DateTime($ret20);
//   $weeknumber20 = $date20->format("W");
  
  
//   $query17 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber17' AND year = '$month_date17'" );
//   $month17 = array();
//     $month17[] = "";  
//   while($row17 = $query17->fetch_assoc()){
//       $month17[] = $row17['SMT'];
//     }
//     $query18 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
//     $month18 = array();
//     $month18[] = "";
//     while($row18 = $query18->fetch_assoc()){
//       $month18[] = $row18['SMT'];
//     }
//     $query19 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
//     $month19 = array();
//     $month19[] = "";
//     while($row19 = $query19->fetch_assoc()){
//       $month19[] = $row19['SMT'];
//     }
//     $query20 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
//     $month20 = array();
//     $month20[] = "";
//     while($row20 = $query20->fetch_assoc()){
//       $month20[] = $row20['SMT'];
//     }
  
//     $five_month_avg= array();
//     $month_final5 = array_merge($month17,$month18,$month19,$month20);
//     $five_month_avg[] = array_sum($month_final5)/4;
  
//   /*--------------------------------------------------------------------------------------------*/
//   //six month
//   $dto->modify('-7 days');
//   $ret21 = $dto->format('Y-m-d');
//   $month_date21 = $dto->format('Y');
//   $six_monthly =date("Y - M",strtotime($ret21));

//   $dto->modify('-7 days');
//   $ret22 = $dto->format('Y-m-d');
//   $month_date22 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret23 = $dto->format('Y-m-d');
//   $month_date23 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret24 = $dto->format('Y-m-d');
//   $month_date24 = $dto->format('Y');
  
//   $date21 = new DateTime($ret21);
//   $weeknumber21 = $date21->format("W");
  
//   $date22 = new DateTime($ret22);
//   $weeknumber22 = $date22->format("W");
  
//   $date23 = new DateTime($ret23);
//   $weeknumber23 = $date23->format("W");
  
//   $date24 = new DateTime($ret24);
//   $weeknumber24 = $date24->format("W");
  
  
//   $query21 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber21' AND year = '$month_date21'" );
//   $month21 = array();
//     $month21[] = "";  
//   while($row21 = $query21->fetch_assoc()){
//       $month21[] = $row21['SMT'];
//     }
//     $query22 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
//     $month22 = array();
//     $month22[] = "";
//     while($row22 = $query22->fetch_assoc()){
//       $month22[] = $row22['SMT'];
//     }
//     $query23 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
//     $month23 = array();
//     $month23[] = "";
//     while($row23 = $query23->fetch_assoc()){
//       $month23[] = $row23['SMT'];
//     }
//     $query24 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
//     $month24 = array();
//     $month24[] = "";
//     while($row24 = $query24->fetch_assoc()){
//       $month24[] = $row24['SMT'];
//     }
  
//     $six_month_avg= array();
//     $month_final6 = array_merge($month21,$month22,$month23,$month24);
//     $six_month_avg[] = array_sum($month_final6)/4;
  
  
//       $one_month_date = array();
//       $second_month_date =array();
//       $third_month_date = array();
//       $four_month_date = array();
//       $five_month_date = array();
//       $six_month_date = array();
  
  
//       $one_month_date[] = strval($one_monthly);
//       $second_month_date[] = strval($second_monthly);
//       $third_month_date[] = strval($third_monthly);
//       $four_month_date[] = strval($four_monthly);
//       $five_month_date[] = strval($five_monthly);
//       $six_month_date[] = strval($six_monthly);
  
  
//       $date_array = array_merge($six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
//       $yearly_month_array = array_merge($six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
//     $return_data = array();
//     $return_data['yearly_month_array'] =$yearly_month_array;
//     $return_data['date_array'] =$date_array;
//     echo json_encode($return_data);
// }
// elseif($period_id === 'last 6 month' && $per_id === "TCI"){
//       $dto = new DateTime();
//   $dto->setISODate($year,$week);
//   $ret = $dto->format('Y-m-d');
//   $month_date1 = $dto->format('Y');
//   $one_monthly =date("Y - M",strtotime($ret));

//   $dto->modify('-7 days');
//   $ret2 = $dto->format('Y-m-d');
//   $month_date2 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret3 = $dto->format('Y-m-d');
//   $month_date3 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret4 = $dto->format('Y-m-d');
//   $month_date4 = $dto->format('Y');
  
//   $date = new DateTime($ret2);
//   $weeknumber1 = $date->format("W");
  
//   $date2 = new DateTime($ret3);
//   $weeknumber2 = $date2->format("W");
  
//   $date3 = new DateTime($ret4);
//   $weeknumber3 = $date3->format("W");
  
//     $query1 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$week' AND year = '$year'" );
//     $month1 = array();
//     $month1[] = "";
//     while($row1 = $query1->fetch_assoc()){
//       $month1[] = $row1['TCI'];
//     }
  
//   $query2 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
//   $month2 = array();
//     $month2[] = "";  
//   while($row2 = $query2->fetch_assoc()){
//       $month2[] = $row2['TCI'];
//     }
  
//     $query3 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
//     $month3 = array();
//     $month3[] = "";
//     while($row3 = $query3->fetch_assoc()){
//       $month3[] = $row3['TCI'];
//     }
  
//     $query4 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
//     $month4 = array();
//     $month4[] = "";
//     while($row4 = $query4->fetch_assoc()){
//       $month4[] = $row4['TCI'];
//     }
  
//   $one_month_avg=array();
//    $month_final1 = array_merge($month4,$month3,$month2,$month1);
//    $one_month_avg[] = array_sum($month_final1)/4;
  
//    // ------------------------------------------------------------------------------------//
  
//    // second month
//   $dto->modify('-7 days');
//   $ret5 = $dto->format('Y-m-d');
//   $month_date5 = $dto->format('Y');
//   $second_monthly =date("Y - M",strtotime($ret5));

//   $dto->modify('-7 days');
//   $ret6 = $dto->format('Y-m-d');
//   $month_date6 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret7 = $dto->format('Y-m-d');
//   $month_date7 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret8 = $dto->format('Y-m-d');
//   $month_date8 = $dto->format('Y');
  
//   $date4 = new DateTime($ret5);
//   $weeknumber4 = $date4->format("W");
  
//   $date5 = new DateTime($ret6);
//   $weeknumber5 = $date5->format("W");
  
//   $date6 = new DateTime($ret7);
//   $weeknumber6 = $date6->format("W");
  
//   $date7 = new DateTime($ret8);
//   $weeknumber7 = $date7->format("W");
  
//   $query5 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$month_date5'" );
//   $month5 = array();
//     $month5[] = "";  
//   while($row5 = $query5->fetch_assoc()){
//       $month5[] = $row5['TCI'];
//     }
//     $query6 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
//     $month6 = array();
//     $month6[] = "";
//     while($row6 = $query6->fetch_assoc()){
//       $month6[] = $row6['TCI'];
//     }
//     $query7 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
//     $month7 = array();
//     $month7[] = "";
//     while($row7 = $query7->fetch_assoc()){
//       $month7[] = $row7['TCI'];
//     }
//     $query8 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
//     $month8 = array();
//     $month8[] = "";
//     while($row8 = $query8->fetch_assoc()){
//       $month8[] = $row8['TCI'];
//     }
  
//     $second_month_avg= array();
//     $month_final2 = array_merge($month5,$month6,$month7,$month8);
//     $second_month_avg[] = array_sum($month_final2)/4;
  
//   //-------------------------------------------------------------------------------------------------------
//     //Third month
  
//   $dto->modify('-7 days');
//   $ret9 = $dto->format('Y-m-d');
//   $month_date9 = $dto->format('Y');
//   $third_monthly =date("Y - M",strtotime($ret9));

//   $dto->modify('-7 days');
//   $ret10 = $dto->format('Y-m-d');
//   $month_date10 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret11 = $dto->format('Y-m-d');
//   $month_date11 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret12 = $dto->format('Y-m-d');
//   $month_date12 = $dto->format('Y');
  
//   $date9 = new DateTime($ret9);
//   $weeknumber9 = $date9->format("W");
  
//   $date10 = new DateTime($ret10);
//   $weeknumber10 = $date10->format("W");
  
//   $date11 = new DateTime($ret11);
//   $weeknumber11 = $date11->format("W");
  
//   $date12 = new DateTime($ret12);
//   $weeknumber12 = $date12->format("W");
  
  
//   $query9 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber9' AND year = '$month_date9'" );
//   $month9 = array();
//     $month9[] = "";  
//   while($row9 = $query9->fetch_assoc()){
//       $month9[] = $row9['TCI'];
//     }
//     // echo json_encode($month9);
//     $query10 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
//     $month10 = array();
//     $month10[] = "";
//     while($row10 = $query10->fetch_assoc()){
//       $month10[] = $row10['TCI'];
//     }
//     $query11 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
//     $month11 = array();
//     $month11[] = "";
//     while($row11 = $query11->fetch_assoc()){
//       $month11[] = $row11['TCI'];
//     }
    
//     $query12 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
//     $month12 = array();
//     $month12[] = "";
//     while($row12 = $query12->fetch_assoc()){
//       $month12[] = $row12['TCI'];
//     }
  
//     $third_month_avg= array();
//     $month_final3 = array_merge($month9,$month10,$month11,$month12);
//     $third_month_avg[] = array_sum($month_final3)/4;
  
//      /* ============================================================================================*/
//      //four month
  
//   $dto->modify('-7 days');
//   $ret13 = $dto->format('Y-m-d');
//   $month_date13 = $dto->format('Y');
//   $four_monthly =date("Y - M",strtotime($ret13));

//   $dto->modify('-7 days');
//   $ret14 = $dto->format('Y-m-d');
//   $month_date14 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret15 = $dto->format('Y-m-d');
//   $month_date15 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret16 = $dto->format('Y-m-d');
//   $month_date16 = $dto->format('Y');
  
//   $date13 = new DateTime($ret13);
//   $weeknumber13 = $date13->format("W");
  
//   $date14 = new DateTime($ret14);
//   $weeknumber14 = $date14->format("W");
  
//   $date15 = new DateTime($ret15);
//   $weeknumber15 = $date15->format("W");
  
//   $date16 = new DateTime($ret16);
//   $weeknumber16 = $date16->format("W");
  
  
//   $query13 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber13' AND year = '$month_date13'" );
//   $month13 = array();
//     $month13[] = "";  
//   while($row13 = $query13->fetch_assoc()){
//       $month13[] = $row13['TCI'];
//     }
//     $query14 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
//     $month14 = array();
//     $month14[] = "";
//     while($row14 = $query14->fetch_assoc()){
//       $month14[] = $row14['TCI'];
//     }
//     $query15 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
//     $month15 = array();
//     $month15[] = "";
//     while($row15 = $query15->fetch_assoc()){
//       $month15[] = $row15['TCI'];
//     }
//     $query16 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
//     $month16 = array();
//     $month16[] = "";
//     while($row16 = $query16->fetch_assoc()){
//       $month16[] = $row16['TCI'];
//     }
  
//     $four_month_avg= array();
//     $month_final4 = array_merge($month13,$month14,$month15,$month16);
//     $four_month_avg[] = array_sum($month_final4)/4;
  
//     /*============================================================================*/
//     // five month
//     $dto->modify('-7 days');
//   $ret17 = $dto->format('Y-m-d');
//   $month_date17 = $dto->format('Y');
//   $five_monthly =date("Y - M",strtotime($ret17));

//   $dto->modify('-7 days');
//   $ret18 = $dto->format('Y-m-d');
//   $month_date18 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret19 = $dto->format('Y-m-d');
//   $month_date19 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret20 = $dto->format('Y-m-d');
//   $month_date20 = $dto->format('Y');
  
//   $date17 = new DateTime($ret17);
//   $weeknumber17 = $date17->format("W");
  
//   $date18 = new DateTime($ret18);
//   $weeknumber18 = $date18->format("W");
  
//   $date19 = new DateTime($ret19);
//   $weeknumber19 = $date19->format("W");
  
//   $date20 = new DateTime($ret20);
//   $weeknumber20 = $date20->format("W");
  
  
//   $query17 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber17' AND year = '$month_date17'" );
//   $month17 = array();
//     $month17[] = "";  
//   while($row17 = $query17->fetch_assoc()){
//       $month17[] = $row17['TCI'];
//     }
//     $query18 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
//     $month18 = array();
//     $month18[] = "";
//     while($row18 = $query18->fetch_assoc()){
//       $month18[] = $row18['TCI'];
//     }
//     $query19 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
//     $month19 = array();
//     $month19[] = "";
//     while($row19 = $query19->fetch_assoc()){
//       $month19[] = $row19['TCI'];
//     }
//     $query20 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
//     $month20 = array();
//     $month20[] = "";
//     while($row20 = $query20->fetch_assoc()){
//       $month20[] = $row20['TCI'];
//     }
  
//     $five_month_avg= array();
//     $month_final5 = array_merge($month17,$month18,$month19,$month20);
//     $five_month_avg[] = array_sum($month_final5)/4;
  
//   /*--------------------------------------------------------------------------------------------*/
//   //six month
//   $dto->modify('-7 days');
//   $ret21 = $dto->format('Y-m-d');
//   $month_date21 = $dto->format('Y');
//   $six_monthly =date("Y - M",strtotime($ret21));

//   $dto->modify('-7 days');
//   $ret22 = $dto->format('Y-m-d');
//   $month_date22 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret23 = $dto->format('Y-m-d');
//   $month_date23 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret24 = $dto->format('Y-m-d');
//   $month_date24 = $dto->format('Y');
  
//   $date21 = new DateTime($ret21);
//   $weeknumber21 = $date21->format("W");
  
//   $date22 = new DateTime($ret22);
//   $weeknumber22 = $date22->format("W");
  
//   $date23 = new DateTime($ret23);
//   $weeknumber23 = $date23->format("W");
  
//   $date24 = new DateTime($ret24);
//   $weeknumber24 = $date24->format("W");
  
  
//   $query21 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber21' AND year = '$month_date21'" );
//   $month21 = array();
//     $month21[] = "";  
//   while($row21 = $query21->fetch_assoc()){
//       $month21[] = $row21['TCI'];
//     }
//     $query22 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
//     $month22 = array();
//     $month22[] = "";
//     while($row22 = $query22->fetch_assoc()){
//       $month22[] = $row22['TCI'];
//     }
//     $query23 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
//     $month23 = array();
//     $month23[] = "";
//     while($row23 = $query23->fetch_assoc()){
//       $month23[] = $row23['TCI'];
//     }
//     $query24 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
//     $month24 = array();
//     $month24[] = "";
//     while($row24 = $query24->fetch_assoc()){
//       $month24[] = $row24['TCI'];
//     }
  
//     $six_month_avg= array();
//     $month_final6 = array_merge($month21,$month22,$month23,$month24);
//     $six_month_avg[] = array_sum($month_final6)/4;
  
  
//       $one_month_date = array();
//       $second_month_date =array();
//       $third_month_date = array();
//       $four_month_date = array();
//       $five_month_date = array();
//       $six_month_date = array();
  
  
//       $one_month_date[] = strval($one_monthly);
//       $second_month_date[] = strval($second_monthly);
//       $third_month_date[] = strval($third_monthly);
//       $four_month_date[] = strval($four_monthly);
//       $five_month_date[] = strval($five_monthly);
//       $six_month_date[] = strval($six_monthly);
  
  
//       $date_array = array_merge($six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
//       $yearly_month_array = array_merge($six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
//     $return_data = array();
//     $return_data['yearly_month_array'] =$yearly_month_array;
//     $return_data['date_array'] =$date_array;
//     echo json_encode($return_data);
// }
elseif($period_id === 'last 6 month' && $per_id === "VCI"){
  $dto = new DateTime();
  $dto->setISODate($year,$week);
  $ret = $dto->format('Y-m-d');
  $month_date1 = $dto->format('Y');
  $one_monthly =date("Y - M",strtotime($ret));

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
  
    $query1 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$week' AND year = '$year'" );
    $month1 = array();
    $month1[] = "";
    while($row1 = $query1->fetch_assoc()){
      $month1[] = $row1['VCI'];
    }
  
  $query2 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
  $month2 = array();
    $month2[] = "";  
  while($row2 = $query2->fetch_assoc()){
      $month2[] = $row2['VCI'];
    }
  
    $query3 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
    $month3 = array();
    $month3[] = "";
    while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['VCI'];
    }
  
    $query4 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
    $month4 = array();
    $month4[] = "";
    while($row4 = $query4->fetch_assoc()){
      $month4[] = $row4['VCI'];
    }
  
  $one_month_avg=array();
   $month_final1 = array_merge($month4,$month3,$month2,$month1);
   $one_month_avg[] = array_sum($month_final1)/4;
  
   // ------------------------------------------------------------------------------------//
  
   // second month
  $dto->modify('-7 days');
  $ret5 = $dto->format('Y-m-d');
  $month_date5 = $dto->format('Y');
  $second_monthly =date("Y - M",strtotime($ret5));

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
  
  $query5 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$month_date5'" );
  $month5 = array();
    $month5[] = "";  
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['VCI'];
    }
    $query6 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
    $month6 = array();
    $month6[] = "";
    while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['VCI'];
    }
    $query7 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
    $month7 = array();
    $month7[] = "";
    while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['VCI'];
    }
    $query8 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
    $month8 = array();
    $month8[] = "";
    while($row8 = $query8->fetch_assoc()){
      $month8[] = $row8['VCI'];
    }
  
    $second_month_avg= array();
    $month_final2 = array_merge($month5,$month6,$month7,$month8);
    $second_month_avg[] = array_sum($month_final2)/4;
  
  //-------------------------------------------------------------------------------------------------------
    //Third month
  
  $dto->modify('-7 days');
  $ret9 = $dto->format('Y-m-d');
  $month_date9 = $dto->format('Y');
  $third_monthly =date("Y - M",strtotime($ret9));

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
  
  
  $query9 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber9' AND year = '$month_date9'" );
  $month9 = array();
    $month9[] = "";  
  while($row9 = $query9->fetch_assoc()){
      $month9[] = $row9['VCI'];
    }
    // echo json_encode($month9);
    $query10 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
    $month10 = array();
    $month10[] = "";
    while($row10 = $query10->fetch_assoc()){
      $month10[] = $row10['VCI'];
    }
    $query11 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
    $month11 = array();
    $month11[] = "";
    while($row11 = $query11->fetch_assoc()){
      $month11[] = $row11['VCI'];
    }
    
    $query12 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
    $month12 = array();
    $month12[] = "";
    while($row12 = $query12->fetch_assoc()){
      $month12[] = $row12['VCI'];
    }
  
    $third_month_avg= array();
    $month_final3 = array_merge($month9,$month10,$month11,$month12);
    $third_month_avg[] = array_sum($month_final3)/4;
  
     /* ============================================================================================*/
     //four month
  
  $dto->modify('-7 days');
  $ret13 = $dto->format('Y-m-d');
  $month_date13 = $dto->format('Y');
  $four_monthly =date("Y - M",strtotime($ret13));

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
  
  
  $query13 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber13' AND year = '$month_date13'" );
  $month13 = array();
    $month13[] = "";  
  while($row13 = $query13->fetch_assoc()){
      $month13[] = $row13['VCI'];
    }
    $query14 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
    $month14 = array();
    $month14[] = "";
    while($row14 = $query14->fetch_assoc()){
      $month14[] = $row14['VCI'];
    }
    $query15 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
    $month15 = array();
    $month15[] = "";
    while($row15 = $query15->fetch_assoc()){
      $month15[] = $row15['VCI'];
    }
    $query16 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
    $month16 = array();
    $month16[] = "";
    while($row16 = $query16->fetch_assoc()){
      $month16[] = $row16['VCI'];
    }
  
    $four_month_avg= array();
    $month_final4 = array_merge($month13,$month14,$month15,$month16);
    $four_month_avg[] = array_sum($month_final4)/4;
  
    /*============================================================================*/
    // five month
    $dto->modify('-7 days');
  $ret17 = $dto->format('Y-m-d');
  $month_date17 = $dto->format('Y');
  $five_monthly =date("Y - M",strtotime($ret17));

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
  
  
  $query17 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber17' AND year = '$month_date17'" );
  $month17 = array();
    $month17[] = "";  
  while($row17 = $query17->fetch_assoc()){
      $month17[] = $row17['VCI'];
    }
    $query18 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
    $month18 = array();
    $month18[] = "";
    while($row18 = $query18->fetch_assoc()){
      $month18[] = $row18['VCI'];
    }
    $query19 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
    $month19 = array();
    $month19[] = "";
    while($row19 = $query19->fetch_assoc()){
      $month19[] = $row19['VCI'];
    }
    $query20 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
    $month20 = array();
    $month20[] = "";
    while($row20 = $query20->fetch_assoc()){
      $month20[] = $row20['VCI'];
    }
  
    $five_month_avg= array();
    $month_final5 = array_merge($month17,$month18,$month19,$month20);
    $five_month_avg[] = array_sum($month_final5)/4;
  
  /*--------------------------------------------------------------------------------------------*/
  //six month
  $dto->modify('-7 days');
  $ret21 = $dto->format('Y-m-d');
  $month_date21 = $dto->format('Y');
  $six_monthly =date("Y - M",strtotime($ret21));

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
  
  
  $query21 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber21' AND year = '$month_date21'" );
  $month21 = array();
    $month21[] = "";  
  while($row21 = $query21->fetch_assoc()){
      $month21[] = $row21['VCI'];
    }
    $query22 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
    $month22 = array();
    $month22[] = "";
    while($row22 = $query22->fetch_assoc()){
      $month22[] = $row22['VCI'];
    }
    $query23 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
    $month23 = array();
    $month23[] = "";
    while($row23 = $query23->fetch_assoc()){
      $month23[] = $row23['VCI'];
    }
    $query24 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
    $month24 = array();
    $month24[] = "";
    while($row24 = $query24->fetch_assoc()){
      $month24[] = $row24['VCI'];
    }
  
    $six_month_avg= array();
    $month_final6 = array_merge($month21,$month22,$month23,$month24);
    $six_month_avg[] = array_sum($month_final6)/4;
  
  
      $one_month_date = array();
      $second_month_date =array();
      $third_month_date = array();
      $four_month_date = array();
      $five_month_date = array();
      $six_month_date = array();
  
  
      $one_month_date[] = strval($one_monthly);
      $second_month_date[] = strval($second_monthly);
      $third_month_date[] = strval($third_monthly);
      $four_month_date[] = strval($four_monthly);
      $five_month_date[] = strval($five_monthly);
      $six_month_date[] = strval($six_monthly);
  
  
      $date_array = array_merge($six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
      $yearly_month_array = array_merge($six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
    $return_data = array();
    $return_data['yearly_month_array'] =$yearly_month_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
}
        elseif($period_id === 'last 6 month' && $per_id === "VHI"){
          $dto = new DateTime();
  $dto->setISODate($year,$week);
  $ret = $dto->format('Y-m-d');
  $month_date1 = $dto->format('Y');
  $one_monthly =date("Y - M",strtotime($ret));

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
  
    $query1 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$week' AND year = '$year'" );
    $month1 = array();
    $month1[] = "";
    while($row1 = $query1->fetch_assoc()){
      $month1[] = $row1['VHI'];
    }
  
  $query2 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
  $month2 = array();
    $month2[] = "";  
  while($row2 = $query2->fetch_assoc()){
      $month2[] = $row2['VHI'];
    }
  
    $query3 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
    $month3 = array();
    $month3[] = "";
    while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['VHI'];
    }
  
    $query4 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
    $month4 = array();
    $month4[] = "";
    while($row4 = $query4->fetch_assoc()){
      $month4[] = $row4['VHI'];
    }
  
  $one_month_avg=array();
   $month_final1 = array_merge($month4,$month3,$month2,$month1);
   $one_month_avg[] = array_sum($month_final1)/4;
  
   // ------------------------------------------------------------------------------------//
  
   // second month
  $dto->modify('-7 days');
  $ret5 = $dto->format('Y-m-d');
  $month_date5 = $dto->format('Y');
  $second_monthly =date("Y - M",strtotime($ret5));

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
  
  $query5 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$month_date5'" );
  $month5 = array();
    $month5[] = "";  
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['VHI'];
    }
    $query6 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
    $month6 = array();
    $month6[] = "";
    while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['VHI'];
    }
    $query7 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
    $month7 = array();
    $month7[] = "";
    while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['VHI'];
    }
    $query8 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
    $month8 = array();
    $month8[] = "";
    while($row8 = $query8->fetch_assoc()){
      $month8[] = $row8['VHI'];
    }
  
    $second_month_avg= array();
    $month_final2 = array_merge($month5,$month6,$month7,$month8);
    $second_month_avg[] = array_sum($month_final2)/4;
  
  //-------------------------------------------------------------------------------------------------------
    //Third month
  
  $dto->modify('-7 days');
  $ret9 = $dto->format('Y-m-d');
  $month_date9 = $dto->format('Y');
  $third_monthly =date("Y - M",strtotime($ret9));

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
  
  
  $query9 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber9' AND year = '$month_date9'" );
  $month9 = array();
    $month9[] = "";  
  while($row9 = $query9->fetch_assoc()){
      $month9[] = $row9['VHI'];
    }
    // echo json_encode($month9);
    $query10 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
    $month10 = array();
    $month10[] = "";
    while($row10 = $query10->fetch_assoc()){
      $month10[] = $row10['VHI'];
    }
    $query11 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
    $month11 = array();
    $month11[] = "";
    while($row11 = $query11->fetch_assoc()){
      $month11[] = $row11['VHI'];
    }
    
    $query12 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
    $month12 = array();
    $month12[] = "";
    while($row12 = $query12->fetch_assoc()){
      $month12[] = $row12['VHI'];
    }
  
    $third_month_avg= array();
    $month_final3 = array_merge($month9,$month10,$month11,$month12);
    $third_month_avg[] = array_sum($month_final3)/4;
  
     /* ============================================================================================*/
     //four month
  
  $dto->modify('-7 days');
  $ret13 = $dto->format('Y-m-d');
  $month_date13 = $dto->format('Y');
  $four_monthly =date("Y - M",strtotime($ret13));

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
  
  
  $query13 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber13' AND year = '$month_date13'" );
  $month13 = array();
    $month13[] = "";  
  while($row13 = $query13->fetch_assoc()){
      $month13[] = $row13['VHI'];
    }
    $query14 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
    $month14 = array();
    $month14[] = "";
    while($row14 = $query14->fetch_assoc()){
      $month14[] = $row14['VHI'];
    }
    $query15 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
    $month15 = array();
    $month15[] = "";
    while($row15 = $query15->fetch_assoc()){
      $month15[] = $row15['VHI'];
    }
    $query16 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
    $month16 = array();
    $month16[] = "";
    while($row16 = $query16->fetch_assoc()){
      $month16[] = $row16['VHI'];
    }
  
    $four_month_avg= array();
    $month_final4 = array_merge($month13,$month14,$month15,$month16);
    $four_month_avg[] = array_sum($month_final4)/4;
  
    /*============================================================================*/
    // five month
    $dto->modify('-7 days');
  $ret17 = $dto->format('Y-m-d');
  $month_date17 = $dto->format('Y');
  $five_monthly =date("Y - M",strtotime($ret17));

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
  
  
  $query17 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber17' AND year = '$month_date17'" );
  $month17 = array();
    $month17[] = "";  
  while($row17 = $query17->fetch_assoc()){
      $month17[] = $row17['VHI'];
    }
    $query18 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
    $month18 = array();
    $month18[] = "";
    while($row18 = $query18->fetch_assoc()){
      $month18[] = $row18['VHI'];
    }
    $query19 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
    $month19 = array();
    $month19[] = "";
    while($row19 = $query19->fetch_assoc()){
      $month19[] = $row19['VHI'];
    }
    $query20 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
    $month20 = array();
    $month20[] = "";
    while($row20 = $query20->fetch_assoc()){
      $month20[] = $row20['VHI'];
    }
  
    $five_month_avg= array();
    $month_final5 = array_merge($month17,$month18,$month19,$month20);
    $five_month_avg[] = array_sum($month_final5)/4;
  
  /*--------------------------------------------------------------------------------------------*/
  //six month
  $dto->modify('-7 days');
  $ret21 = $dto->format('Y-m-d');
  $month_date21 = $dto->format('Y');
  $six_monthly =date("Y - M",strtotime($ret21));

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
  
  
  $query21 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber21' AND year = '$month_date21'" );
  $month21 = array();
    $month21[] = "";  
  while($row21 = $query21->fetch_assoc()){
      $month21[] = $row21['VHI'];
    }
    $query22 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
    $month22 = array();
    $month22[] = "";
    while($row22 = $query22->fetch_assoc()){
      $month22[] = $row22['VHI'];
    }
    $query23 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
    $month23 = array();
    $month23[] = "";
    while($row23 = $query23->fetch_assoc()){
      $month23[] = $row23['VHI'];
    }
    $query24 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
    $month24 = array();
    $month24[] = "";
    while($row24 = $query24->fetch_assoc()){
      $month24[] = $row24['VHI'];
    }
  
    $six_month_avg= array();
    $month_final6 = array_merge($month21,$month22,$month23,$month24);
    $six_month_avg[] = array_sum($month_final6)/4;
  
  
      $one_month_date = array();
      $second_month_date =array();
      $third_month_date = array();
      $four_month_date = array();
      $five_month_date = array();
      $six_month_date = array();
  
  
      $one_month_date[] = strval($one_monthly);
      $second_month_date[] = strval($second_monthly);
      $third_month_date[] = strval($third_monthly);
      $four_month_date[] = strval($four_monthly);
      $five_month_date[] = strval($five_monthly);
      $six_month_date[] = strval($six_monthly);
  
  
      $date_array = array_merge($six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
      $yearly_month_array = array_merge($six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
    $return_data = array();
    $return_data['yearly_month_array'] =$yearly_month_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
          }

elseif($period_id === 'last 3 year' && $per_id === "NDVI"){
  $dto = new DateTime();
  $dto->setISODate($year,$week);
  $ret = $dto->format('Y-m-d');
  $month_date1 = $dto->format('Y');
  $one_monthly =date("Y - M",strtotime($ret));

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
    $month1 = array();
    $month1[] = "";
    while($row1 = $query1->fetch_assoc()){
      $month1[] = $row1['NDVI'];
    }
  
  $query2 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
  $month2 = array();
  $month2[] = "";
    while($row2 = $query2->fetch_assoc()){
      $month2[] = $row2['NDVI'];
    }
  
    $query3 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
    $month3 = array();
    $month3[] = "";
    while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['NDVI'];
    }
  
    $query4 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
    $month4 = array();
    $month4[] = "";
    while($row4 = $query4->fetch_assoc()){
      $month4[] = $row4['NDVI'];
    }
  
  $one_month_avg=array();
   $month_final1 = array_merge($month4,$month3,$month2,$month1);
   $one_month_avg[] = array_sum($month_final1)/4;
  
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
  $month5 =array();
  $month5[] = '';  
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['NDVI'];
    }
    // echo json_encode($month5);
    $query6 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
    $month6 = array();
    $month6[] = "";
    while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['NDVI'];
    }
    $query7 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
    $month7 = array();
    $month7[] = "";
    while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['NDVI'];
    }
    $query8 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
    $month8 = array();
    $month8[] = "";
    while($row8 = $query8->fetch_assoc()){
      $month8[] = $row8['NDVI'];
    }
  
    $second_month_avg= array();
    $month_final2 = array_merge($month5,$month6,$month7,$month8);
    $second_month_avg[] = array_sum($month_final2)/4;
  
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
  $month9 = array();
    $month9[] = "";  
  while($row9 = $query9->fetch_assoc()){
      $month9[] = $row9['NDVI'];
    }
    $query10 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
    $month10 = array();
    $month10[] = "";
    while($row10 = $query10->fetch_assoc()){
      $month10[] = $row10['NDVI'];
    }
    $query11 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
    $month11 = array();
    $month11[] = "";
    while($row11 = $query11->fetch_assoc()){
      $month11[] = $row11['NDVI'];
    }
    $query12 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
    $month12 = array();
    $month12[] = "";
    while($row12 = $query12->fetch_assoc()){
      $month12[] = $row12['NDVI'];
    }
  
    $third_month_avg= array();
    $month_final3 = array_merge($month9,$month10,$month11,$month12);
    $third_month_avg[] = array_sum($month_final3)/4;
  
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
  $month13 = array();
  $month13[] = "";
    while($row13 = $query13->fetch_assoc()){
      $month13[] = $row13['NDVI'];
    }
    // echo json_encode($month13);
    $query14 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
    $month14 = array();
    $month14[] = "";
    while($row14 = $query14->fetch_assoc()){
      $month14[] = $row14['NDVI'];
    }
    $query15 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
    $month15 = array();
    $month15[] = "";
    while($row15 = $query15->fetch_assoc()){
      $month15[] = $row15['NDVI'];
    }
    $query16 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
    $month16 = array();
    $month16[] = "";
    while($row16 = $query16->fetch_assoc()){
      $month16[] = $row16['NDVI'];
    }
  
    $four_month_avg= array();
    $month_final4 = array_merge($month13,$month14,$month15,$month16);
    $four_month_avg[] = array_sum($month_final4)/4;
  
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
  $month17 = array();
    $month17[] = "";  
  while($row17 = $query17->fetch_assoc()){
      $month17[] = $row17['NDVI'];
    }
    $query18 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
    $month18 = array();
    $month18[] = "";
    while($row18 = $query18->fetch_assoc()){
      $month18[] = $row18['NDVI'];
    }
    $query19 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
    $month19 = array();
    $month19[] = "";
    while($row19 = $query19->fetch_assoc()){
      $month19[] = $row19['NDVI'];
    }
    $query20 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
    $month20 = array();
    $month20[] = "";
    while($row20 = $query20->fetch_assoc()){
      $month20[] = $row20['NDVI'];
    }
  
    $five_month_avg= array();
    $month_final5 = array_merge($month17,$month18,$month19,$month20);
    $five_month_avg[] = array_sum($month_final5)/4;
  
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
  $month21 = array();
    $month21[] = "";  
  while($row21 = $query21->fetch_assoc()){
      $month21[] = $row21['NDVI'];
    }
    $query22 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
    $month22 = array();
    $month22[] = "";
    while($row22 = $query22->fetch_assoc()){
      $month22[] = $row22['NDVI'];
    }
    $query23 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
    $month23 = array();
    $month23[] = "";
    while($row23 = $query23->fetch_assoc()){
      $month23[] = $row23['NDVI'];
    }
    $query24 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
    $month24 = array();
    $month24[] = "";
    while($row24 = $query24->fetch_assoc()){
      $month24[] = $row24['NDVI'];
    }
  
    $six_month_avg= array();
    $month_final6 = array_merge($month21,$month22,$month23,$month24);
    $six_month_avg[] = array_sum($month_final6)/4;
  
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
  $month25 = array();
    $month25[] = "";  
  while($row25 = $query25->fetch_assoc()){
      $month25[] = $row25['NDVI'];
    }
    $query26 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber26' AND year = '$month_date26'" );
    $month26 = array();
    $month26[] = "";
    while($row26 = $query26->fetch_assoc()){
      $month26[] = $row26['NDVI'];
    }
    $query27 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber27' AND year = '$month_date27'" );
    $month27 = array();
    $month27[] = "";
    while($row27 = $query27->fetch_assoc()){
      $month27[] = $row27['NDVI'];
    }
    $query28 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber28' AND year = '$month_date28'" );
    $month28 = array();
    $month28[] = "";
    while($row28 = $query28->fetch_assoc()){
      $month28[] = $row28['NDVI'];
    }
  
    $seven_month_avg= array();
    $month_final7 = array_merge($month25,$month26,$month27,$month28);
    $seven_month_avg[] = array_sum($month_final7)/4;
  
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
  $month29 = array();
    $month29[] = "";  
  while($row29 = $query29->fetch_assoc()){
      $month29[] = $row29['NDVI'];
    }
    $query30 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber30' AND year = '$month_date30'" );
    $month30 = array();
    $month30[] = "";
    while($row30 = $query30->fetch_assoc()){
      $month30[] = $row30['NDVI'];
    }
    $query31 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber31' AND year = '$month_date31'" );
    $month31 = array();
    $month31[] = "";
    while($row31 = $query31->fetch_assoc()){
      $month31[] = $row31['NDVI'];
    }
    $query32 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber32' AND year = '$month_date32'" );
    $month32 = array();
    $month32[] = "";
    while($row32 = $query32->fetch_assoc()){
      $month32[] = $row32['NDVI'];
    }
  
    $eight_month_avg= array();
    $month_final8 = array_merge($month29,$month30,$month31,$month32);
    $eight_month_avg[] = array_sum($month_final8)/4;
  
  
      // $one_month_date = array();
      // $second_month_date =array();
      // $third_month_date = array();
      // $four_month_date = array();
      // $five_month_date = array();
      // $six_month_date = array();
      // $seven_month_date = array();
      // $eight_month_date = array();
      // $nine_month_date = array();
  
      // $one_month_date[] = strval($ret);
      // $second_month_date[] = strval($ret5);
      // $third_month_date[] = strval($ret9);
      // $four_month_date[] = strval($ret13);
      // $five_month_date[] = strval($ret17);
      // $six_month_date[] = strval($ret21);
      // $seven_month_date[] = strval($ret25);
      // $eight_month_date[] = strval($ret29);
      // $nine_month_date[] = strval($ret21);
  
  
      // $date_array = array_merge($eight_month_date,$seven_month_date,$six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
      // $final_month_array = array_merge($eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
  
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
      $month33 = array();
    $month33[] = "";  
      while($row33 = $query33->fetch_assoc()){
          $month33[] = $row33['NDVI'];
        }
        $query34 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber34' AND year = '$month_date34'" );
        $month34 = array();
    $month34[] = "";
        while($row34 = $query34->fetch_assoc()){
          $month34[] = $row34['NDVI'];
        }
        $query35 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber35' AND year = '$month_date35'" );
        $month35 = array();
    $month35[] = "";
        while($row35 = $query35->fetch_assoc()){
          $month35[] = $row35['NDVI'];
        }
        $query36 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber36' AND year = '$month_date36'" );
        $month36 = array();
    $month36[] = "";
        while($row36 = $query36->fetch_assoc()){
          $month36[] = $row36['NDVI'];
        }
      
        $nine_month_avg= array();
        $month_final9 = array_merge($month33,$month34,$month35,$month36);
        $nine_month_avg[] = array_sum($month_final9)/4;
      
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
      $month37 = array();
    $month37[] = "";  
      while($row37 = $query37->fetch_assoc()){
          $month37[] = $row37['NDVI'];
        }
        $query38 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber38' AND year = '$month_date38'" );
        $month38 = array();
        $month38[] = "";
        while($row38 = $query38->fetch_assoc()){
          $month38[] = $row38['NDVI'];
        }
        $query39 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber39' AND year = '$month_date39'" );
        $month39 = array();
        $month39[] = "";
        while($row39 = $query39->fetch_assoc()){
          $month39[] = $row39['NDVI'];
        }
        $query40 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber40' AND year = '$month_date40'" );
        $month40 = array();
        $month40[] = "";
        while($row40 = $query40->fetch_assoc()){
          $month40[] = $row40['NDVI'];
        }
      
        $ten_month_avg= array();
        $month_final10 = array_merge($month37,$month38,$month39,$month40);
        $ten_month_avg[] = array_sum($month_final10)/4;
        
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
    $month41 = array();
    $month41[] = "";  
    while($row41 = $query41->fetch_assoc()){
        $month41[] = $row41['NDVI'];
      }
      $query42 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber42' AND year = '$month_date42'" );
      $month42 = array();
    $month42[] = "";
      while($row42 = $query42->fetch_assoc()){
        $month42[] = $row42['NDVI'];
      }
      $query43 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber43' AND year = '$month_date43'" );
      $month43 = array();
    $month43[] = "";
      while($row43 = $query43->fetch_assoc()){
        $month43[] = $row43['NDVI'];
      }
      $query44 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber44' AND year = '$month_date44'" );
      $month44 = array();
    $month44[] = "";
      while($row44 = $query44->fetch_assoc()){
        $month44[] = $row44['NDVI'];
      }
    
      $eleven_month_avg= array();
      $month_final11 = array_merge($month41,$month42,$month43,$month44);
      $eleven_month_avg[] = array_sum($month_final11)/4;
  
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
      $month45 = array();
    $month45[] = "";  
      while($row45 = $query45->fetch_assoc()){
          $month45[] = $row45['NDVI'];
        }
        $query46 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber46' AND year = '$month_date46'" );
        $month46 = array();
    $month46[] = "";
        while($row46 = $query46->fetch_assoc()){
          $month46[] = $row46['NDVI'];
        }
        $query47 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber47' AND year = '$month_date47'" );
        $month47 = array();
    $month47[] = "";
        while($row47 = $query47->fetch_assoc()){
          $month47[] = $row47['NDVI'];
        }
        $query48 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber48' AND year = '$month_date48'" );
        $month48 = array();
    $month48[] = "";
        while($row48 = $query48->fetch_assoc()){
          $month48[] = $row48['NDVI'];
        }
      
        $twelve_month_avg= array();
        $month_final12 = array_merge($month45,$month46,$month47,$month48);
        $twelve_month_avg[] = array_sum($month_final12)/4;
        
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
      $month49 = array();
    $month49[] = "";  
      while($row_49 = $query49->fetch_assoc()){
          $month49[] = $row_49['NDVI'];
        }
        //  json_encode($month49);
        $query50 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber50' AND year = '$month_date50'" );
        $month50 = array();
    $month50[] = "";
        while($row_50 = $query50->fetch_assoc()){
          $month50[] = $row_50['NDVI'];
        }
        //  json_encode($month50);
        $query51 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber51' AND year = '$month_date51'" );
        $month51 = array();
    $month51[] = "";
        while($row_51 = $query51->fetch_assoc()){
          $month51[] = $row_51['NDVI'];
        }
        //  json_encode($month51);
        $query52 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber52' AND year = '$month_date52'" );
        $month52 = array();
    $month52[] = "";
        while($row_52 = $query52->fetch_assoc()){
          $month52[] = $row_52['NDVI'];
        }
        //  json_encode($month52);
        $extra_month_avg= array();
        // $month_final13 = array();
        $month_final13 = array_merge($month49,$month50,$month51,$month52);
         $extra_month_avg[] = array_sum($month_final13)/4;
  
  
        //second year 
        //one month
        $dto->modify('-7 days');
        $ret53 = $dto->format('Y-m-d');
        $month_date53 = $dto->format('Y');
        $second_monthly =date("Y - M",strtotime($ret53));

        $dto->modify('-7 days');
        $ret54 = $dto->format('Y-m-d');
        $month_date54 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret55 = $dto->format('Y-m-d');
        $month_date55 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret56 = $dto->format('Y-m-d');
        $month_date56 = $dto->format('Y');
        
        $date53 = new DateTime($ret53);
        $weeknumber53 = $date53->format("W");
        
        $date54 = new DateTime($ret54);
        $weeknumber54 = $date54->format("W");
        
        $date55 = new DateTime($ret55);
        $weeknumber55 = $date55->format("W");
        
        $date56 = new DateTime($ret56);
        $weeknumber56 = $date56->format("W");
        
        
        $query53 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber53' AND year = '$month_date53'" );
        $month53 = array();
        $month53[] = "";  
        while($row53 = $query53->fetch_assoc()){
            $month53[] = $row53['NDVI'];
          }
          $query54 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber54' AND year = '$month_date54'" );
          $month54 = array();
          $month54[] = "";
          while($row54 = $query54->fetch_assoc()){
            $month54[] = $row54['NDVI'];
          }
          $query55 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber55' AND year = '$month_date55'" );
          $month55 = array();
          $month55[] = "";
          while($row55 = $query55->fetch_assoc()){
            $month55[] = $row55['NDVI'];
          }
          $query56 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber56' AND year = '$month_date56'" );
          $month56 = array();
          $month56[] = "";
          while($row56 = $query56->fetch_assoc()){
            $month56[] = $row56['NDVI'];
          }
        
          $second_year_avg= array();
          $month_final14 = array_merge($month53,$month54,$month55,$month56);
          $second_year_avg[] = array_sum($month_final14)/4;
  
          //second month
          $dto->modify('-7 days');
      $ret57 = $dto->format('Y-m-d');
      $month_date57 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret58 = $dto->format('Y-m-d');
      $month_date58 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret59 = $dto->format('Y-m-d');
      $month_date59 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret60 = $dto->format('Y-m-d');
      $month_date60 = $dto->format('Y');
      
      $date57 = new DateTime($ret57);
      $weeknumber57 = $date57->format("W");
      
      $date58 = new DateTime($ret58);
      $weeknumber58 = $date58->format("W");
      
      $date59 = new DateTime($ret59);
      $weeknumber59 = $date59->format("W");
      
      $date60 = new DateTime($ret60);
      $weeknumber60 = $date60->format("W");
      
      
      $query57 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber57' AND year = '$month_date57'" );
      $month57 = array();
      $month57[] = "";  
      while($row57 = $query57->fetch_assoc()){
          $month57[] = $row57['NDVI'];
        }
        $query58 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber58' AND year = '$month_date58'" );
        $month58 = array();
        $month58[] = "";
        while($row58 = $query58->fetch_assoc()){
          $month58[] = $row58['NDVI'];
        }
        $query59 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber59' AND year = '$month_date59'" );
        $month59 = array();
        $month59[] = "";
        while($row59 = $query59->fetch_assoc()){
          $month59[] = $row59['NDVI'];
        }
        $query60 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber60' AND year = '$month_date60'" );
        $month60 = array();
        $month60[] = "";
        while($row60 = $query60->fetch_assoc()){
          $month60[] = $row60['NDVI'];
        }
      
        $second_year_avg1= array();
        $month_final15 = array_merge($month57,$month58,$month59,$month60);
        $second_year_avg1[] = array_sum($month_final15)/4;
  
        //thrid month
        $dto->modify('-7 days');
      $ret61 = $dto->format('Y-m-d');
      $month_date61 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret62 = $dto->format('Y-m-d');
      $month_date62 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret63 = $dto->format('Y-m-d');
      $month_date63 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret64 = $dto->format('Y-m-d');
      $month_date64 = $dto->format('Y');
      
      $date61 = new DateTime($ret61);
      $weeknumber61 = $date61->format("W");
      
      $date62 = new DateTime($ret62);
      $weeknumber62 = $date62->format("W");
      
      $date63 = new DateTime($ret63);
      $weeknumber63 = $date63->format("W");
      
      $date64 = new DateTime($ret64);
      $weeknumber64 = $date64->format("W");
      
      
      $query61 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber61' AND year = '$month_date61'" );
      $month61 = array();
      $month61[] = "";  
      while($row61 = $query61->fetch_assoc()){
          $month61[] = $row61['NDVI'];
        }
        $query62 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber62' AND year = '$month_date62'" );
        $month62 = array();
        $month62[] = "";
        while($row62 = $query62->fetch_assoc()){
          $month62[] = $row62['NDVI'];
        }
        $query63 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber63' AND year = '$month_date63'" );
        $month63 = array();
        $month63[] = "";
        while($row63 = $query63->fetch_assoc()){
          $month63[] = $row63['NDVI'];
        }
        $query64 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber64' AND year = '$month_date64'" );
        $month64 = array();
        $month64[] = "";
        while($row64 = $query64->fetch_assoc()){
          $month64[] = $row64['NDVI'];
        }
      
        $second_year_avg2= array();
        $month_final16 = array_merge($month61,$month62,$month63,$month64);
        $second_year_avg2[] = array_sum($month_final16)/4;
  
        //four month
        $dto->modify('-7 days');
      $ret65 = $dto->format('Y-m-d');
      $month_date65 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret66 = $dto->format('Y-m-d');
      $month_date66 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret67 = $dto->format('Y-m-d');
      $month_date67 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret68 = $dto->format('Y-m-d');
      $month_date68 = $dto->format('Y');
      
      $date65 = new DateTime($ret65);
      $weeknumber65 = $date65->format("W");
      
      $date66 = new DateTime($ret66);
      $weeknumber66 = $date66->format("W");
      
      $date67 = new DateTime($ret67);
      $weeknumber67 = $date67->format("W");
      
      $date68 = new DateTime($ret68);
      $weeknumber68 = $date68->format("W");
      
      
      $query65 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber65' AND year = '$month_date65'" );
      $month65 = array();
      $month65[] = "";  
      while($row65 = $query65->fetch_assoc()){
          $month65[] = $row65['NDVI'];
        }
        $query66 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber66' AND year = '$month_date66'" );
        $month66 = array();
        $month66[] = "";
        while($row66 = $query66->fetch_assoc()){
          $month66[] = $row66['NDVI'];
        }
        $query67 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber67' AND year = '$month_date67'" );
        $month67 = array();
        $month67[] = "";
        while($row67 = $query67->fetch_assoc()){
          $month67[] = $row67['NDVI'];
        }
        $query68 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber68' AND year = '$month_date68'" );
        $month68 = array();
        $month68[] = "";
        while($row68 = $query68->fetch_assoc()){
          $month68[] = $row68['NDVI'];
        }
      
        $second_year_avg3= array();
        $month_final17 = array_merge($month65,$month66,$month67,$month68);
        $second_year_avg3[] = array_sum($month_final17)/4;
  
        //five month
        $dto->modify('-7 days');
      $ret69 = $dto->format('Y-m-d');
      $month_date69 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret70 = $dto->format('Y-m-d');
      $month_date70 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret71 = $dto->format('Y-m-d');
      $month_date71 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret72 = $dto->format('Y-m-d');
      $month_date72 = $dto->format('Y');
      
      $date69 = new DateTime($ret69);
      $weeknumber69 = $date69->format("W");
      
      $date70 = new DateTime($ret70);
      $weeknumber70 = $date70->format("W");
      
      $date71 = new DateTime($ret71);
      $weeknumber71 = $date71->format("W");
      
      $date72 = new DateTime($ret72);
      $weeknumber72 = $date72->format("W");
      
      
      $query69 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber69' AND year = '$month_date69'" );
      $month69 = array();
      $month69[] = "";  
      while($row69 = $query69->fetch_assoc()){
          $month69[] = $row69['NDVI'];
        }
        $query70 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber70' AND year = '$month_date70'" );
        $month70 = array();
        $month70[] = "";
        while($row70 = $query70->fetch_assoc()){
          $month70[] = $row70['NDVI'];
        }
        $query71 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber71' AND year = '$month_date71'" );
        $month71 = array();
        $month71[] = "";
        while($row71 = $query71->fetch_assoc()){
          $month71[] = $row71['NDVI'];
        }
        $query72 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber72' AND year = '$month_date72'" );
        $month72 = array();
        $month72[] = "";
        while($row72 = $query72->fetch_assoc()){
          $month72[] = $row72['NDVI'];
        }
      
        $second_year_avg4= array();
        $month_final18 = array_merge($month69,$month70,$month71,$month72);
        $second_year_avg4[] = array_sum($month_final18)/4;
  
        //six month
        $dto->modify('-7 days');
      $ret73 = $dto->format('Y-m-d');
      $month_date73 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret74 = $dto->format('Y-m-d');
      $month_date74 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret75 = $dto->format('Y-m-d');
      $month_date75 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret76 = $dto->format('Y-m-d');
      $month_date76 = $dto->format('Y');
      
      $date73 = new DateTime($ret73);
      $weeknumber73 = $date73->format("W");
      
      $date74 = new DateTime($ret74);
      $weeknumber74 = $date74->format("W");
      
      $date75 = new DateTime($ret75);
      $weeknumber75 = $date75->format("W");
      
      $date76 = new DateTime($ret76);
      $weeknumber76 = $date76->format("W");
      
      
      $query73 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber73' AND year = '$month_date73'" );
      $month73 = array();
      $month73[] = "";  
      while($row73 = $query73->fetch_assoc()){
          $month73[] = $row73['NDVI'];
        }
        $query74 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber74' AND year = '$month_date74'" );
        $month74 = array();
        $month74[] = "";
        while($row74 = $query74->fetch_assoc()){
          $month74[] = $row74['NDVI'];
        }
        $query75 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber75' AND year = '$month_date75'" );
        $month75 = array();
        $month75[] = "";
        while($row75 = $query75->fetch_assoc()){
          $month75[] = $row75['NDVI'];
        }
        $query76 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber76' AND year = '$month_date76'" );
        $month76 = array();
        $month76[] = "";
        while($row76 = $query76->fetch_assoc()){
          $month76[] = $row76['NDVI'];
        }
      
        $second_year_avg5= array();
        $month_final19 = array_merge($month73,$month74,$month75,$month76);
        $second_year_avg5[] = array_sum($month_final19)/4;
        
        //seven month
        $dto->modify('-7 days');
      $ret77 = $dto->format('Y-m-d');
      $month_date77 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret78 = $dto->format('Y-m-d');
      $month_date78 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret79 = $dto->format('Y-m-d');
      $month_date79 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret80 = $dto->format('Y-m-d');
      $month_date80 = $dto->format('Y');
      
      $date77 = new DateTime($ret77);
      $weeknumber77 = $date77->format("W");
      
      $date78 = new DateTime($ret78);
      $weeknumber78 = $date78->format("W");
      
      $date79 = new DateTime($ret79);
      $weeknumber79 = $date79->format("W");
      
      $date80 = new DateTime($ret80);
      $weeknumber80 = $date80->format("W");
      
      
      $query77 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber77' AND year = '$month_date77'" );
      $month77 = array();
      $month77[] = "";  
      while($row77 = $query77->fetch_assoc()){
          $month77[] = $row77['NDVI'];
        }
        $query78 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber78' AND year = '$month_date78'" );
        $month78 = array();
        $month78[] = "";
        while($row78 = $query78->fetch_assoc()){
          $month78[] = $row78['NDVI'];
        }
        $query79 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber79' AND year = '$month_date79'" );
        $month79 = array();
        $month79[] = "";
        while($row79 = $query79->fetch_assoc()){
          $month79[] = $row79['NDVI'];
        }
        $query80 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber80' AND year = '$month_date80'" );
        $month80 = array();
        $month80[] = "";
        while($row80 = $query80->fetch_assoc()){
          $month80[] = $row80['NDVI'];
        }
      
        $second_year_avg6= array();
        $month_final20 = array_merge($month77,$month78,$month79,$month80);
        $second_year_avg6[] = array_sum($month_final20)/4;
  
        //eigth month
        $dto->modify('-7 days');
      $ret81 = $dto->format('Y-m-d');
      $month_date81 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret82 = $dto->format('Y-m-d');
      $month_date82 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret83 = $dto->format('Y-m-d');
      $month_date83 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret84 = $dto->format('Y-m-d');
      $month_date84 = $dto->format('Y');
      
      $date81 = new DateTime($ret81);
      $weeknumber81 = $date81->format("W");
      
      $date82 = new DateTime($ret82);
      $weeknumber82 = $date82->format("W");
      
      $date83 = new DateTime($ret83);
      $weeknumber83 = $date83->format("W");
      
      $date84 = new DateTime($ret84);
      $weeknumber84 = $date84->format("W");
      
      
      $query81 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber81' AND year = '$month_date81'" );
      $month81 = array();
      $month81[] = "";  
      while($row81 = $query81->fetch_assoc()){
          $month81[] = $row81['NDVI'];
        }
        $query82 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber82' AND year = '$month_date82'" );
        $month82 = array();
        $month82[] = "";
        while($row82 = $query82->fetch_assoc()){
          $month82[] = $row82['NDVI'];
        }
        $query83 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber83' AND year = '$month_date83'" );
        $month83 = array();
        $month83[] = "";
        while($row83 = $query83->fetch_assoc()){
          $month83[] = $row83['NDVI'];
        }
        $query84 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber84' AND year = '$month_date84'" );
        $month84 = array();
        $month84[] = "";
        while($row84 = $query84->fetch_assoc()){
          $month84[] = $row84['NDVI'];
        }
      
        $second_year_avg7= array();
        $month_final21 = array_merge($month81,$month82,$month83,$month84);
        $second_year_avg7[] = array_sum($month_final21)/4;
  
        //nine month
        $dto->modify('-7 days');
      $ret85 = $dto->format('Y-m-d');
      $month_date85 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret86 = $dto->format('Y-m-d');
      $month_date86 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret87 = $dto->format('Y-m-d');
      $month_date87 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret88 = $dto->format('Y-m-d');
      $month_date88 = $dto->format('Y');
      
      $date85 = new DateTime($ret85);
      $weeknumber85 = $date85->format("W");
      
      $date86 = new DateTime($ret86);
      $weeknumber86 = $date86->format("W");
      
      $date87 = new DateTime($ret87);
      $weeknumber87 = $date87->format("W");
      
      $date88 = new DateTime($ret88);
      $weeknumber88 = $date88->format("W");
      
      
      $query85 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber85' AND year = '$month_date85'" );
      $month85 = array();
      $month85[] = "";  
      while($row85 = $query85->fetch_assoc()){
          $month85[] = $row85['NDVI'];
        }
        $query86 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber86' AND year = '$month_date86'" );
        $month86 = array();
        $month86[] = "";
        while($row86 = $query86->fetch_assoc()){
          $month86[] = $row86['NDVI'];
        }
        $query87 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber87' AND year = '$month_date87'" );
        $month87 = array();
        $month87[] = "";
        while($row87 = $query87->fetch_assoc()){
          $month87[] = $row87['NDVI'];
        }
        $query88 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber88' AND year = '$month_date88'" );
        $month88 = array();
        $month88[] = "";
        while($row88 = $query88->fetch_assoc()){
          $month88[] = $row88['NDVI'];
        }
      
        $second_year_avg8= array();
        $month_final22 = array_merge($month85,$month86,$month87,$month88);
        $second_year_avg8[] = array_sum($month_final22)/4;
  
        //ten month
        $dto->modify('-7 days');
      $ret89 = $dto->format('Y-m-d');
      $month_date89 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret90 = $dto->format('Y-m-d');
      $month_date90 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret91 = $dto->format('Y-m-d');
      $month_date91 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret92 = $dto->format('Y-m-d');
      $month_date92 = $dto->format('Y');
      
      $date89 = new DateTime($ret89);
      $weeknumber89 = $date89->format("W");
      
      $date90 = new DateTime($ret90);
      $weeknumber90 = $date90->format("W");
      
      $date91 = new DateTime($ret91);
      $weeknumber91 = $date91->format("W");
      
      $date92 = new DateTime($ret92);
      $weeknumber92 = $date92->format("W");
      
      
      $query89 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber89' AND year = '$month_date89'" );
      $month89 = array();
      $month89[] = "";  
      while($row89 = $query89->fetch_assoc()){
          $month89[] = $row89['NDVI'];
        }
        $query90 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber90' AND year = '$month_date90'" );
        $month90 = array();
        $month90[] = "";
        while($row90 = $query90->fetch_assoc()){
          $month90[] = $row90['NDVI'];
        }
        $query91 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber91' AND year = '$month_date91'" );
        $month91 = array();
        $month91[] = "";
        while($row91 = $query91->fetch_assoc()){
          $month91[] = $row91['NDVI'];
        }
        $query92 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber92' AND year = '$month_date92'" );
        $month92 = array();
        $month92[] = "";
        while($row92 = $query92->fetch_assoc()){
          $month92[] = $row92['NDVI'];
        }
      
        $second_year_avg9= array();
        $month_final23 = array_merge($month89,$month90,$month91,$month92);
        $second_year_avg9[] = array_sum($month_final23)/4;
  
        //eleven month
        $dto->modify('-7 days');
      $ret93 = $dto->format('Y-m-d');
      $month_date93 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret94 = $dto->format('Y-m-d');
      $month_date94 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret95 = $dto->format('Y-m-d');
      $month_date95 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret96 = $dto->format('Y-m-d');
      $month_date96 = $dto->format('Y');
      
      $date93 = new DateTime($ret93);
      $weeknumber93 = $date93->format("W");
      
      $date94 = new DateTime($ret94);
      $weeknumber94 = $date94->format("W");
      
      $date95 = new DateTime($ret95);
      $weeknumber95 = $date95->format("W");
      
      $date96 = new DateTime($ret96);
      $weeknumber96 = $date96->format("W");
      
      
      $query93 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber93' AND year = '$month_date93'" );
      $month93 = array();
      $month93[] = "";  
      while($row93 = $query93->fetch_assoc()){
          $month93[] = $row93['NDVI'];
        }
        $query94 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber94' AND year = '$month_date94'" );
        $month94 = array();
        $month94[] = "";
        while($row94 = $query94->fetch_assoc()){
          $month94[] = $row94['NDVI'];
        }
        $query95 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber95' AND year = '$month_date95'" );
        $month95 = array();
        $month95[] = "";
        while($row95 = $query95->fetch_assoc()){
          $month95[] = $row95['NDVI'];
        }
        $query96 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber96' AND year = '$month_date96'" );
        $month96 = array();
        $month96[] = "";
        while($row96 = $query96->fetch_assoc()){
          $month96[] = $row96['NDVI'];
        }
      
        $second_year_avg10= array();
        $month_final24 = array_merge($month93,$month94,$month95,$month96);
        $second_year_avg10[] = array_sum($month_final24)/4;
  
        //tweleve month
        $dto->modify('-7 days');
      $ret97 = $dto->format('Y-m-d');
      $month_date97 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret98 = $dto->format('Y-m-d');
      $month_date98 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret99 = $dto->format('Y-m-d');
      $month_date99 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret100 = $dto->format('Y-m-d');
      $month_date100 = $dto->format('Y');
      
      $date97 = new DateTime($ret97);
      $weeknumber97 = $date97->format("W");
      
      $date98 = new DateTime($ret98);
      $weeknumber98 = $date98->format("W");
      
      $date99 = new DateTime($ret99);
      $weeknumber99 = $date99->format("W");
      
      $date100 = new DateTime($ret100);
      $weeknumber100 = $date100->format("W");
      
      
      $query97 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber97' AND year = '$month_date97'" );
      $month97 = array();
      $month97[] = "";  
      while($row97 = $query97->fetch_assoc()){
          $month97[] = $row97['NDVI'];
        }
        $query98 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber98' AND year = '$month_date98'" );
        $month98 = array();
        $month98[] = "";
        while($row98 = $query98->fetch_assoc()){
          $month98[] = $row98['NDVI'];
        }
        $query99 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber99' AND year = '$month_date99'" );
        $month99 = array();
        $month99[] = "";
        while($row99 = $query99->fetch_assoc()){
          $month99[] = $row99['NDVI'];
        }
        $query100 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber100' AND year = '$month_date100'" );
        $month100 = array();
        $month100[] = "";
        while($row100 = $query100->fetch_assoc()){
          $month100[] = $row100['NDVI'];
        }
      
        $second_year_avg11= array();
        $month_final25 = array_merge($month97,$month98,$month99,$month100);
        $second_year_avg11[] = array_sum($month_final25)/4;
  
        //extra month
        $dto->modify('-7 days');
      $ret_97 = $dto->format('Y-m-d');
      $month_date_97 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret_98 = $dto->format('Y-m-d');
      $month_date_98 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret_99 = $dto->format('Y-m-d');
      $month_date_99 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret_100 = $dto->format('Y-m-d');
      $month_date_100 = $dto->format('Y');
      
      $date_97 = new DateTime($ret_97);
      $weeknumber_97 = $date_97->format("W");
      
      $date_98 = new DateTime($ret_98);
      $weeknumber_98 = $date_98->format("W");
      
      $date_99 = new DateTime($ret_99);
      $weeknumber_99 = $date_99->format("W");
      
      $date_100 = new DateTime($ret_100);
      $weeknumber_100 = $date_100->format("W");
      
      
      $query_97 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_97' AND year = '$month_date_97'" );
      $month_97 = array();
      $month_97[] = "";  
      while($row_97 = $query_97->fetch_assoc()){
          $month_97[] = $row_97['NDVI'];
        }
        $query_98 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_98' AND year = '$month_date_98'" );
        $month_98 = array();
        $month_98[] = "";
        while($row_98 = $query_98->fetch_assoc()){
          $month_98[] = $row_98['NDVI'];
        }
        $query_99 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_99' AND year = '$month_date_99'" );
        $month_99 = array();
        $month_99[] = "";
        while($row_99 = $query_99->fetch_assoc()){
          $month_99[] = $row_99['NDVI'];
        }
        $query_100 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_100' AND year = '$month_date_100'" );
        $month_100 = array();
        $month_100[] = "";
        while($row_100 = $query_100->fetch_assoc()){
          $month_100[] = $row_100['NDVI'];
        }
      
        $second_year_avg_11= array();
        $month_final_25 = array_merge($month_97,$month_98,$month_99,$month_100);
        $second_year_avg_11[] = array_sum($month_final_25)/4;
  
  
        //third year
        //one month
        $dto->modify('-7 days');
      $ret101 = $dto->format('Y-m-d');
      $month_date101 = $dto->format('Y');
      $third_monthly =date("Y - M",strtotime($ret101));

      $dto->modify('-7 days');
      $ret102 = $dto->format('Y-m-d');
      $month_date102 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret103 = $dto->format('Y-m-d');
      $month_date103 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret104 = $dto->format('Y-m-d');
      $month_date104 = $dto->format('Y');
      
      $date101 = new DateTime($ret101);
      $weeknumber101 = $date101->format("W");
      
      $date102 = new DateTime($ret102);
      $weeknumber102 = $date102->format("W");
      
      $date103 = new DateTime($ret103);
      $weeknumber103 = $date103->format("W");
      
      $date104 = new DateTime($ret104);
      $weeknumber104 = $date104->format("W");
      
      
  $query101 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber101' AND year = '$month_date101'" );
  $month101 = array();
  $month101[] = "";      
  while($row101 = $query101->fetch_assoc()){
          $month101[] = $row101['NDVI'];
        }
      $query102 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber102' AND year = '$month_date102'" );
      $month102 = array();
  $month102[] = "";    
      while($row102 = $query102->fetch_assoc()){
          $month102[] = $row102['NDVI'];
        }
      $query103 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber103' AND year = '$month_date103'" );
      $month103 = array();
  $month103[] = "";    
      while($row103 = $query103->fetch_assoc()){
          $month103[] = $row103['NDVI'];
        }
      $query104 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber104' AND year = '$month_date104'" );
      $month104 = array();
  $month104[] = "";    
      while($row104 = $query104->fetch_assoc()){
          $month104[] = $row104['NDVI'];
        }
      
        $third_month_avg= array();
        $month_final101 = array_merge($month101,$month102,$month103,$month104);
        $third_month_avg[] = array_sum($month_final101)/4;
  
        //second month
        $dto->modify('-7 days');
        $ret105 = $dto->format('Y-m-d');
        $month_date105 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret106 = $dto->format('Y-m-d');
        $month_date106 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret107 = $dto->format('Y-m-d');
        $month_date107 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret108 = $dto->format('Y-m-d');
        $month_date108 = $dto->format('Y');
        
        $date105 = new DateTime($ret105);
        $weeknumber105 = $date105->format("W");
   
        $date106 = new DateTime($ret106);
        $weeknumber106 = $date106->format("W");
        
        $date107 = new DateTime($ret107);
        $weeknumber107 = $date107->format("W");
        
        $date108 = new DateTime($ret108);
        $weeknumber108 = $date108->format("W");
        
        
    $query105 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber105' AND year = '$month_date105'" );
    $month105 = array();
  $month105[] = "";        
    while($row105 = $query105->fetch_assoc()){
            $month105[] = $row105['NDVI'];
          }
        $query106 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber106' AND year = '$month_date106'" );
        $month106 = array();
  $month106[] = "";    
        while($row106 = $query106->fetch_assoc()){
            $month106[] = $row106['NDVI'];
          }
        $query107 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber107' AND year = '$month_date107'" );
        $month107 = array();
  $month107[] = "";    
        while($row107 = $query107->fetch_assoc()){
            $month107[] = $row107['NDVI'];
          }
        $query108 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber108' AND year = '$month_date108'" );
        $month108 = array();
  $month108[] = "";    
        while($row108 = $query108->fetch_assoc()){
            $month108[] = $row108['NDVI'];
          }
        
          $third_month_avg1= array();
          $month_final102 = array_merge($month105,$month106,$month107,$month108);
          $third_month_avg1[] = array_sum($month_final102)/4;
  
          //third month
          $dto->modify('-7 days');
          $ret109 = $dto->format('Y-m-d');
          $month_date109 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret110 = $dto->format('Y-m-d');
          $month_date110 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret111 = $dto->format('Y-m-d');
          $month_date111 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret112 = $dto->format('Y-m-d');
          $month_date112 = $dto->format('Y');
          
          $date109 = new DateTime($ret109);
          $weeknumber109 = $date109->format("W");
          
          $date110 = new DateTime($ret110);
          $weeknumber110 = $date110->format("W");
          
          $date111 = new DateTime($ret111);
          $weeknumber111 = $date111->format("W");
          
           $date112 = new DateTime($ret112);
         $weeknumber112 = $date112->format("W");
          
          
      $query109 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber109' AND year = '$month_date109'" );
      $month109 = array();
  $month109[] = "";        
      while($row109 = $query109->fetch_assoc()){
              $month109[] = $row109['NDVI'];
            }
          $query110 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber110' AND year = '$month_date110'" );
          $month110 = array();
  $month110[] = "";   
          while($row110 = $query110->fetch_assoc()){
              $month110[] = $row110['NDVI'];
            }
          $query111 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber111' AND year = '$month_date111'" );
          $month111 = array();
  $month111[] = "";    
          while($row111 = $query111->fetch_assoc()){
              $month111[] = $row111['NDVI'];
            }
          $query112 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber112' AND year = '$month_date112'" );
          $month112 = array();
  $month112[] = "";    
          while($row112 = $query112->fetch_assoc()){
              $month112[] = $row112['NDVI'];
            }
          
            $third_month_avg2= array();
            $month_final103 = array_merge($month109,$month110,$month111,$month112);
            $third_month_avg2[] = array_sum($month_final103)/4;
        //four month
        $dto->modify('-7 days');
      $ret113 = $dto->format('Y-m-d');
      $month_date113 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret114 = $dto->format('Y-m-d');
      $month_date114 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret115 = $dto->format('Y-m-d');
      $month_date115 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret116 = $dto->format('Y-m-d');
      $month_date116 = $dto->format('Y');
      
      $date113 = new DateTime($ret113);
       $weeknumber113 = $date113->format("W");
      
      $date114 = new DateTime($ret114);
      $weeknumber114 = $date114->format("W");
      
      $date115 = new DateTime($ret115);
      $weeknumber115 = $date115->format("W");
      
      $date116 = new DateTime($ret116);
      $weeknumber116 = $date116->format("W");
      
      
  $query113 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber113' AND year = '$month_date113'" );
  $month113 = array();
  $month113[] = "";        
  while($row113 = $query113->fetch_assoc()){
          $month113[] = $row113['NDVI'];
        }
        // echo json_encode($month113);
      $query114 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber114' AND year = '$month_date114'" );
      $month114 = array();
  $month114[] = "";    
      while($row114 = $query114->fetch_assoc()){
          $month114[] = $row114['NDVI'];
        }
      $query115 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber115' AND year = '$month_date115'" );
      $month115 = array();
  $month115[] = "";    
      while($row115 = $query115->fetch_assoc()){
          $month115[] = $row115['NDVI'];
        }
      $query116 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber116' AND year = '$month_date116'" );
      $month116 = array();
  $month116[] = "";    
      while($row116 = $query116->fetch_assoc()){
          $month116[] = $row116['NDVI'];
        }
      
        $third_month_avg3= array();
        $month_final104 = array_merge($month113,$month114,$month115,$month116);
        $third_month_avg3[] = array_sum($month_final104)/4;
  
        //five month
        $dto->modify('-7 days');
      $ret117 = $dto->format('Y-m-d');
      $month_date117 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret118 = $dto->format('Y-m-d');
      $month_date118 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret119 = $dto->format('Y-m-d');
      $month_date119 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret120 = $dto->format('Y-m-d');
      $month_date120 = $dto->format('Y');
      
      $date117 = new DateTime($ret117);
     $weeknumber117 = $date117->format("W");
      
      $date118 = new DateTime($ret118);
      $weeknumber118 = $date118->format("W");
      
      $date119 = new DateTime($ret119);
      $weeknumber119 = $date119->format("W");
      
      $date120 = new DateTime($ret120);
      $weeknumber120 = $date120->format("W");
      
      
      $query117 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber117' AND year = '$month_date117'" );
      $month117 = array();
  $month117[] = "";    
      while($row117 = $query117->fetch_assoc()){
          $month117[] = $row117['NDVI'];
        }
        $query118 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber118' AND year = '$month_date118'" );
        $month118 = array();
  $month118[] = "";  
        while($row118 = $query118->fetch_assoc()){
          $month118[] = $row118['NDVI'];
        }
        $query119 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber119' AND year = '$month_date119'" );
        $month119 = array();
  $month119[] = "";  
        while($row119 = $query119->fetch_assoc()){
          $month119[] = $row119['NDVI'];
        }
        $query120 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber120' AND year = '$month_date120'" );
        $month120 = array();
  $month120[] = "";  
        while($row120 = $query120->fetch_assoc()){
          $month120[] = $row120['NDVI'];
        }
      
        $third_month_avg4= array();
        $month_final105 = array_merge($month117,$month118,$month119,$month120);
        $third_month_avg4[] = array_sum($month_final105)/4;
  
  //       //six month
        $dto->modify('-7 days');
      $ret221 = $dto->format('Y-m-d');
      $month_date221 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret222 = $dto->format('Y-m-d');
      $month_date222 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret223 = $dto->format('Y-m-d');
      $month_date223 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret224 = $dto->format('Y-m-d');
      $month_date224 = $dto->format('Y');
      
      $date221 = new DateTime($ret221);
      $weeknumber221 = $date221->format("W");
      
      $date222 = new DateTime($ret222);
      $weeknumber222 = $date222->format("W");
      
      $date223 = new DateTime($ret223);
      $weeknumber223 = $date223->format("W");
      
      $date224 = new DateTime($ret224);
      $weeknumber224 = $date224->format("W");
      
      
      $query221 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber221' AND year = '$month_date221'" );
      $month221 = array();
  $month221[] = "";    
      while($row221 = $query221->fetch_assoc()){
          $month221[] = $row221['NDVI'];
        }
        $query222 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber222' AND year = '$month_date222'" );
        $month222 = array();
  $month222[] = ""; 
        while($row222 = $query222->fetch_assoc()){
          $month222[] = $row222['NDVI'];
        }
        $query223 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber223' AND year = '$month_date223'" );
        $month223 = array();
  $month223[] = ""; 
        while($row223 = $query223->fetch_assoc()){
          $month223[] = $row223['NDVI'];
        }
        $query224 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber224' AND year = '$month_date224'" );
        $month224 = array();
  $month224[] = ""; 
        while($row224 = $query224->fetch_assoc()){
          $month224[] = $row224['NDVI'];
        }
      
        $third_month_avg5= array();
        $month_final106 = array_merge($month221,$month222,$month223,$month224);
        $third_month_avg5[] = array_sum($month_final106)/4;
  
  // //       //seven month
        $dto->modify('-7 days');
      $ret225 = $dto->format('Y-m-d');
      $month_date225 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret226 = $dto->format('Y-m-d');
      $month_date226 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret227 = $dto->format('Y-m-d');
      $month_date227 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret228 = $dto->format('Y-m-d');
      $month_date228 = $dto->format('Y');
      
      $date225 = new DateTime($ret225);
      $weeknumber225 = $date225->format("W");
      
      $date226 = new DateTime($ret226);
      $weeknumber226 = $date226->format("W");
      
      $date227 = new DateTime($ret227);
      $weeknumber227 = $date227->format("W");
      
      $date228 = new DateTime($ret228);
      $weeknumber228 = $date228->format("W");
      
      
      $query225 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber225' AND year = '$month_date225'" );
      $month225 = array();
  $month225[] = "";   
      while($row225 = $query225->fetch_assoc()){
          $month225[] = $row225['NDVI'];
        }
        $query226 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber226' AND year = '$month_date226'" );
        $month226 = array();
  $month226[] = ""; 
        while($row226 = $query226->fetch_assoc()){
          $month226[] = $row226['NDVI'];
        }
        $query227 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber227' AND year = '$month_date227'" );
        $month227 = array();
  $month227[] = ""; 
        while($row227 = $query227->fetch_assoc()){
          $month227[] = $row227['NDVI'];
        }
        $query228 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber228' AND year = '$month_date228'" );
        $month228 = array();
  $month228[] = ""; 
        while($row228 = $query228->fetch_assoc()){
          $month228[] = $row228['NDVI'];
        }
      
        $third_month_avg6= array();
        $month_final107 = array_merge($month225,$month226,$month227,$month228);
        $third_month_avg6[] = array_sum($month_final107)/4;
        //eight month
        $dto->modify('-7 days');
        $ret229 = $dto->format('Y-m-d');
        $month_date229 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret230 = $dto->format('Y-m-d');
        $month_date230 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret231 = $dto->format('Y-m-d');
         $month_date231 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret232 = $dto->format('Y-m-d');
        $month_date232 = $dto->format('Y');
        
        $date229 = new DateTime($ret229);
        $weeknumber229 = $date229->format("W");
        
        $date230 = new DateTime($ret230);
        $weeknumber230 = $date230->format("W");
        
        $date231 = new DateTime($ret231);
        $weeknumber231 = $date231->format("W");
        
        $date232 = new DateTime($ret232);
        $weeknumber232 = $date232->format("W");
        
        
        $query229 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber229' AND year = '$month_date229'" );
        $month229 = array();
  $month229[] = "";   
        while($row229 = $query229->fetch_assoc()){
            $month229[] = $row229['NDVI'];
          }
          $query230 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber230' AND year = '$month_date230'" );
          $month230 = array();
  $month230[] = ""; 
          while($row230 = $query230->fetch_assoc()){
            $month230[] = $row230['NDVI'];
          }
          $query231 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber231' AND year = '$month_date231'" );
          $month231 = array();
  $month231[] = ""; 
          while($row231 = $query231->fetch_assoc()){
            $month231[] = $row231['NDVI'];
          }
          $query232 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber232' AND year = '$month_date232'" );
          $month232 = array();
  $month232[] = ""; 
          while($row232 = $query232->fetch_assoc()){
            $month232[] = $row232['NDVI'];
          }
        
          $third_month_avg7= array();
          $month_final108 = array_merge($month229,$month230,$month231,$month232);
          $third_month_avg7[] = array_sum($month_final108)/4;
  
  //       //nine month
        $dto->modify('-7 days');
        $ret233 = $dto->format('Y-m-d');
        $month_date233 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret234 = $dto->format('Y-m-d');
        $month_date234 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret235 = $dto->format('Y-m-d');
        $month_date235 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret236 = $dto->format('Y-m-d');
        $month_date236 = $dto->format('Y');
        
        $date233 = new DateTime($ret233);
        $weeknumber233 = $date233->format("W");
        
        $date234 = new DateTime($ret234);
        $weeknumber234 = $date234->format("W");
        
        $date235 = new DateTime($ret235);
        $weeknumber235 = $date235->format("W");
        
        $date236 = new DateTime($ret236);
        $weeknumber236 = $date236->format("W");
        
        
        $query233 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber233' AND year = '$month_date233'" );
        $month233 = array();
  $month233[] = "";   
        while($row233 = $query233->fetch_assoc()){
            $month233[] = $row233['NDVI'];
          }
          $query234 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber234' AND year = '$month_date234'" );
          $month234 = array();
  $month234[] = ""; 
          while($row234 = $query234->fetch_assoc()){
            $month234[] = $row234['NDVI'];
          }
          $query235 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber235' AND year = '$month_date235'" );
          $month235 = array();
  $month235[] = ""; 
          while($row235 = $query235->fetch_assoc()){
            $month235[] = $row235['NDVI'];
          }
          $query236 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber236' AND year = '$month_date236'" );
          $month236 = array();
  $month236[] = ""; 
          while($row236 = $query236->fetch_assoc()){
            $month236[] = $row236['NDVI'];
          }
        
          $third_month_avg8= array();
          $month_final109 = array_merge($month233,$month234,$month235,$month236);
          $third_month_avg8[] = array_sum($month_final109)/4;
  
  // //ten month
  $dto->modify('-7 days');
      $ret237 = $dto->format('Y-m-d');
      $month_date237 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret238 = $dto->format('Y-m-d');
      $month_date238 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret239 = $dto->format('Y-m-d');
      $month_date239 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret240 = $dto->format('Y-m-d');
      $month_date240 = $dto->format('Y');
      
      $date237 = new DateTime($ret237);
      $weeknumber237 = $date237->format("W");
      
      $date238 = new DateTime($ret238);
      $weeknumber238 = $date238->format("W");
      
      $date239 = new DateTime($ret239);
      $weeknumber239 = $date239->format("W");
      
      $date240 = new DateTime($ret240);
      $weeknumber240 = $date240->format("W");
      
      
      $query237 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber237' AND year = '$month_date237'" );
      $month237 = array();
  $month237[] = "";   
      while($row237 = $query237->fetch_assoc()){
          $month237[] = $row237['NDVI'];
        }
        $query238 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber238' AND year = '$month_date238'" );
        $month238 = array();
  $month238[] = ""; 
        while($row238 = $query238->fetch_assoc()){
          $month238[] = $row238['NDVI'];
        }
        $query239 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber239' AND year = '$month_date239'" );
        $month239 = array();
  $month239[] = ""; 
        while($row239 = $query239->fetch_assoc()){
          $month239[] = $row239['NDVI'];
        }
        $query240 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber240' AND year = '$month_date240'" );
        $month240 = array();
  $month240[] = ""; 
        while($row240 = $query240->fetch_assoc()){
          $month240[] = $row240['NDVI'];
        }
      
        $third_month_avg9= array();
        $month_final110 = array_merge($month237,$month238,$month239,$month240);
        $third_month_avg9[] = array_sum($month_final110)/4;
  
  //       //eleven month
        $dto->modify('-7 days');
      $ret241 = $dto->format('Y-m-d');
      $month_date241 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret242 = $dto->format('Y-m-d');
      $month_date242 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret243 = $dto->format('Y-m-d');
      $month_date243 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret244 = $dto->format('Y-m-d');
      $month_date244 = $dto->format('Y');
      
      $date241 = new DateTime($ret241);
      $weeknumber241 = $date241->format("W");
      
      $date242 = new DateTime($ret242);
      $weeknumber242 = $date242->format("W");
      
      $date243 = new DateTime($ret243);
      $weeknumber243 = $date243->format("W");
      
      $date244 = new DateTime($ret244);
      $weeknumber244 = $date244->format("W");
      
      
      $query241 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber241' AND year = '$month_date241'" );
      $month241 = array();
      $month241[] = "";   
      while($row241 = $query241->fetch_assoc()){
          $month241[] = $row241['NDVI'];
        }
        $query242 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber242' AND year = '$month_date242'" );
        $month242 = array();
        $month242[] = ""; 
        while($row242 = $query242->fetch_assoc()){
          $month242[] = $row242['NDVI'];
        }
        $query243 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber243' AND year = '$month_date243'" );
        $month243 = array();
        $month243[] = ""; 
        while($row243 = $query243->fetch_assoc()){
          $month243[] = $row243['NDVI'];
        }
        $query244 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber244' AND year = '$month_date244'" );
        $month244 = array();
        $month244[] = ""; 
        while($row244 = $query244->fetch_assoc()){
          $month244[] = $row244['NDVI'];
        }
      
        $third_month_avg10= array();
        $month_final111 = array_merge($month241,$month242,$month243,$month244);
        $third_month_avg10[] = array_sum($month_final111)/4;
        
  //       //twelvw month
        $dto->modify('-7 days');
        $ret245 = $dto->format('Y-m-d');
        $month_date245 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret246 = $dto->format('Y-m-d');
        $month_date246 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret247 = $dto->format('Y-m-d');
        $month_date247 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret248 = $dto->format('Y-m-d');
        $month_date248 = $dto->format('Y');
        
        $date245 = new DateTime($ret245);
        $weeknumber245 = $date245->format("W");
        
        $date246 = new DateTime($ret246);
        $weeknumber246 = $date246->format("W");
        
        $date247 = new DateTime($ret247);
        $weeknumber247 = $date247->format("W");
        
        $date248 = new DateTime($ret248);
        $weeknumber248 = $date248->format("W");
        
        
        $query245 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber245' AND year = '$month_date245'" );
        $month245 = array();
  $month245[] = "";   
        while($row245 = $query245->fetch_assoc()){
            $month245[] = $row245['NDVI'];
          }
          $query246 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber246' AND year = '$month_date246'" );
          $month246 = array();
  $month246[] = ""; 
          while($row246 = $query246->fetch_assoc()){
            $month246[] = $row246['NDVI'];
          }
          $query247 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber247' AND year = '$month_date247'" );
          $month247 = array();
  $month247[] = ""; 
          while($row247 = $query247->fetch_assoc()){
            $month247[] = $row247['NDVI'];
          }
          $query248 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber248' AND year = '$month_date248'" );
          $month248 = array();
  $month248[] = ""; 
          while($row248 = $query248->fetch_assoc()){
            $month248[] = $row248['NDVI'];
          }
        
          $third_month_avg11= array();
          $month_final112 = array_merge($month245,$month246,$month247,$month248);
          $third_month_avg11[] = array_sum($month_final112)/4;
  
          //extra month
          $dto->modify('-7 days');
          $ret_245 = $dto->format('Y-m-d');
          $month_date_245 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret_246 = $dto->format('Y-m-d');
          $month_date_246 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret_247 = $dto->format('Y-m-d');
          $month_date_247 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret_248 = $dto->format('Y-m-d');
          $month_date_248 = $dto->format('Y');
          
          $date_245 = new DateTime($ret_245);
          $weeknumber_245 = $date_245->format("W");
          
          $date_246 = new DateTime($ret_246);
          $weeknumber_246 = $date_246->format("W");
          
          $date_247 = new DateTime($ret_247);
          $weeknumber_247 = $date_247->format("W");
          
          $date_248 = new DateTime($ret_248);
          $weeknumber_248 = $date_248->format("W");
          
          
          $query_245 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_245' AND year = '$month_date_245'" );
          $month_245 = array();
    $month_245[] = "";   
          while($row_245 = $query_245->fetch_assoc()){
              $month_245[] = $row_245['NDVI'];
            }
            $query_246 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_246' AND year = '$month_date_246'" );
            $month_246 = array();
    $month_246[] = ""; 
            while($row_246 = $query_246->fetch_assoc()){
              $month_246[] = $row_246['NDVI'];
            }
            $query_247 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_247' AND year = '$month_date_247'" );
            $month_247 = array();
    $month_247[] = ""; 
            while($row247 = $query_247->fetch_assoc()){
              $month_247[] = $row247['NDVI'];
            }
            $query_248 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_248' AND year = '$month_date_248'" );
            $month_248 = array();
    $month_248[] = ""; 
            while($row_248 = $query_248->fetch_assoc()){
              $month_248[] = $row_248['NDVI'];
            }
          
            $third_month_avg_11= array();
            $month_final_113 = array_merge($month_245,$month_246,$month_247,$month_248);
            $third_month_avg_11[] = array_sum($month_final_113)/4;
  
          $one_month_date = array();
          $second_month_date =array();
          $third_month_date = array();

  
          $one_month_date[] = strval($one_monthly);
          $second_month_date[] = strval($second_monthly);
          $third_month_date[] = strval($third_monthly);

  
          $date_array = array_merge($third_month_date,$second_month_date,$one_month_date);
          
          $final_month_array_avg = array_merge($extra_month_avg,$twelve_month_avg,$eleven_month_avg,$ten_month_avg,$nine_month_avg,$eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
          // echo $final_month_array_avg;
  
          $final_month_array = array();
          $final_month_array[] = array_sum($final_month_array_avg)/count($final_month_array_avg);
  
          $final_month_array_avg1 = array_merge($second_year_avg,$second_year_avg1,$second_year_avg2,$second_year_avg3,$second_year_avg4,$second_year_avg5,$second_year_avg6,$second_year_avg7,$second_year_avg8,$second_year_avg9,$second_year_avg10,$second_year_avg11,$second_year_avg_11);
  
          // // echo $final_month_array_avg1;
  
          $final_month_array1 = array();
          $final_month_array1[] = array_sum($final_month_array_avg1)/count($final_month_array_avg1);
  
          $final_month_array_avg2 = array_merge($third_month_avg,$third_month_avg1,$third_month_avg2,$third_month_avg3,$third_month_avg4,$third_month_avg5,$third_month_avg6,$third_month_avg7,$third_month_avg8,$third_month_avg9,$third_month_avg10,$third_month_avg11,$third_month_avg_11);
  
          $final_month_array2 = array();
          $final_month_array2[] = array_sum($final_month_array_avg2)/count($final_month_array_avg2);
          $yearly_month_array =array();
          $yearly_month_array = array_merge($final_month_array2,$final_month_array1,$final_month_array);
  
    $return_data = array();
    $return_data['yearly_month_array'] =$yearly_month_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  
  
}
// elseif($period_id === 'last 3 year' && $per_id === "SMT"){
//     $dto = new DateTime();
//   $dto->setISODate($year,$week);
//   $ret = $dto->format('Y-m-d');
//   $month_date1 = $dto->format('Y');
//   $one_monthly =date("Y - M",strtotime($ret));
  
//   $dto->modify('-7 days');
//   $ret2 = $dto->format('Y-m-d');
//   $month_date2 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret3 = $dto->format('Y-m-d');
//   $month_date3 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret4 = $dto->format('Y-m-d');
//   $month_date4 = $dto->format('Y');
  
//   $date = new DateTime($ret2);
//   $weeknumber1 = $date->format("W");
  
//   $date2 = new DateTime($ret3);
//   $weeknumber2 = $date2->format("W");
  
//   $date3 = new DateTime($ret4);
//   $weeknumber3 = $date3->format("W");
  
//     $query1 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$week' AND year = '$year'" );
//     $month1 = array();
//     $month1[] = "";
//     while($row1 = $query1->fetch_assoc()){
//       $month1[] = $row1['SMT'];
//     }
  
//   $query2 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
//   $month2 = array();
//   $month2[] = "";
//     while($row2 = $query2->fetch_assoc()){
//       $month2[] = $row2['SMT'];
//     }
  
//     $query3 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
//     $month3 = array();
//     $month3[] = "";
//     while($row3 = $query3->fetch_assoc()){
//       $month3[] = $row3['SMT'];
//     }
  
//     $query4 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
//     $month4 = array();
//     $month4[] = "";
//     while($row4 = $query4->fetch_assoc()){
//       $month4[] = $row4['SMT'];
//     }
  
//   $one_month_avg=array();
//    $month_final1 = array_merge($month4,$month3,$month2,$month1);
//    $one_month_avg[] = array_sum($month_final1)/4;
  
//    // ------------------------------------------------------------------------------------//
  
//    // second month
//   $dto->modify('-7 days');
//   $ret5 = $dto->format('Y-m-d');
//   $month_date5 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret6 = $dto->format('Y-m-d');
//   $month_date6 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret7 = $dto->format('Y-m-d');
//   $month_date7 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret8 = $dto->format('Y-m-d');
//   $month_date8 = $dto->format('Y');
  
//   $date4 = new DateTime($ret5);
//   $weeknumber4 = $date4->format("W");
  
//   $date5 = new DateTime($ret6);
//   $weeknumber5 = $date5->format("W");
  
//   $date6 = new DateTime($ret7);
//   $weeknumber6 = $date6->format("W");
  
//   $date7 = new DateTime($ret8);
//   $weeknumber7 = $date7->format("W");
  
//   $query5 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$month_date5'" );
//   $month5 =array();
//   $month5[] = '';  
//   while($row5 = $query5->fetch_assoc()){
//       $month5[] = $row5['SMT'];
//     }
//     // echo json_encode($month5);
//     $query6 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
//     $month6 = array();
//     $month6[] = "";
//     while($row6 = $query6->fetch_assoc()){
//       $month6[] = $row6['SMT'];
//     }
//     $query7 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
//     $month7 = array();
//     $month7[] = "";
//     while($row7 = $query7->fetch_assoc()){
//       $month7[] = $row7['SMT'];
//     }
//     $query8 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
//     $month8 = array();
//     $month8[] = "";
//     while($row8 = $query8->fetch_assoc()){
//       $month8[] = $row8['SMT'];
//     }
  
//     $second_month_avg= array();
//     $month_final2 = array_merge($month5,$month6,$month7,$month8);
//     $second_month_avg[] = array_sum($month_final2)/4;
  
//   //-------------------------------------------------------------------------------------------------------
//     //Third month
  
//   $dto->modify('-7 days');
//   $ret9 = $dto->format('Y-m-d');
//   $month_date9 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret10 = $dto->format('Y-m-d');
//   $month_date10 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret11 = $dto->format('Y-m-d');
//   $month_date11 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret12 = $dto->format('Y-m-d');
//   $month_date12 = $dto->format('Y');
  
//   $date9 = new DateTime($ret9);
//   $weeknumber9 = $date9->format("W");
  
//   $date10 = new DateTime($ret10);
//   $weeknumber10 = $date10->format("W");
  
//   $date11 = new DateTime($ret11);
//   $weeknumber11 = $date11->format("W");
  
//   $date12 = new DateTime($ret12);
//   $weeknumber12 = $date12->format("W");
  
  
//   $query9 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber9' AND year = '$month_date9'" );
//   $month9 = array();
//     $month9[] = "";  
//   while($row9 = $query9->fetch_assoc()){
//       $month9[] = $row9['SMT'];
//     }
//     $query10 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
//     $month10 = array();
//     $month10[] = "";
//     while($row10 = $query10->fetch_assoc()){
//       $month10[] = $row10['SMT'];
//     }
//     $query11 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
//     $month11 = array();
//     $month11[] = "";
//     while($row11 = $query11->fetch_assoc()){
//       $month11[] = $row11['SMT'];
//     }
//     $query12 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
//     $month12 = array();
//     $month12[] = "";
//     while($row12 = $query12->fetch_assoc()){
//       $month12[] = $row12['SMT'];
//     }
  
//     $third_month_avg= array();
//     $month_final3 = array_merge($month9,$month10,$month11,$month12);
//     $third_month_avg[] = array_sum($month_final3)/4;
  
//      /* ============================================================================================*/
//      //four month
  
//   $dto->modify('-7 days');
//   $ret13 = $dto->format('Y-m-d');
//   $month_date13 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret14 = $dto->format('Y-m-d');
//   $month_date14 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret15 = $dto->format('Y-m-d');
//   $month_date15 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret16 = $dto->format('Y-m-d');
//   $month_date16 = $dto->format('Y');
  
//   $date13 = new DateTime($ret13);
//   $weeknumber13 = $date13->format("W");
  
//   $date14 = new DateTime($ret14);
//   $weeknumber14 = $date14->format("W");
  
//   $date15 = new DateTime($ret15);
//   $weeknumber15 = $date15->format("W");
  
//   $date16 = new DateTime($ret16);
//   $weeknumber16 = $date16->format("W");
  
  
//   $query13 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber13' AND year = '$month_date13'" );
//   $month13 = array();
//   $month13[] = "";
//     while($row13 = $query13->fetch_assoc()){
//       $month13[] = $row13['SMT'];
//     }
//     // echo json_encode($month13);
//     $query14 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
//     $month14 = array();
//     $month14[] = "";
//     while($row14 = $query14->fetch_assoc()){
//       $month14[] = $row14['SMT'];
//     }
//     $query15 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
//     $month15 = array();
//     $month15[] = "";
//     while($row15 = $query15->fetch_assoc()){
//       $month15[] = $row15['SMT'];
//     }
//     $query16 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
//     $month16 = array();
//     $month16[] = "";
//     while($row16 = $query16->fetch_assoc()){
//       $month16[] = $row16['SMT'];
//     }
  
//     $four_month_avg= array();
//     $month_final4 = array_merge($month13,$month14,$month15,$month16);
//     $four_month_avg[] = array_sum($month_final4)/4;
  
//     /*============================================================================*/
//     // five month
//     $dto->modify('-7 days');
//   $ret17 = $dto->format('Y-m-d');
//   $month_date17 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret18 = $dto->format('Y-m-d');
//   $month_date18 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret19 = $dto->format('Y-m-d');
//   $month_date19 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret20 = $dto->format('Y-m-d');
//   $month_date20 = $dto->format('Y');
  
//   $date17 = new DateTime($ret17);
//   $weeknumber17 = $date17->format("W");
  
//   $date18 = new DateTime($ret18);
//   $weeknumber18 = $date18->format("W");
  
//   $date19 = new DateTime($ret19);
//   $weeknumber19 = $date19->format("W");
  
//   $date20 = new DateTime($ret20);
//   $weeknumber20 = $date20->format("W");
  
  
//   $query17 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber17' AND year = '$month_date17'" );
//   $month17 = array();
//     $month17[] = "";  
//   while($row17 = $query17->fetch_assoc()){
//       $month17[] = $row17['SMT'];
//     }
//     $query18 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
//     $month18 = array();
//     $month18[] = "";
//     while($row18 = $query18->fetch_assoc()){
//       $month18[] = $row18['SMT'];
//     }
//     $query19 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
//     $month19 = array();
//     $month19[] = "";
//     while($row19 = $query19->fetch_assoc()){
//       $month19[] = $row19['SMT'];
//     }
//     $query20 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
//     $month20 = array();
//     $month20[] = "";
//     while($row20 = $query20->fetch_assoc()){
//       $month20[] = $row20['SMT'];
//     }
  
//     $five_month_avg= array();
//     $month_final5 = array_merge($month17,$month18,$month19,$month20);
//     $five_month_avg[] = array_sum($month_final5)/4;
  
//   /*--------------------------------------------------------------------------------------------*/
//   //six month
//   $dto->modify('-7 days');
//   $ret21 = $dto->format('Y-m-d');
//   $month_date21 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret22 = $dto->format('Y-m-d');
//   $month_date22 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret23 = $dto->format('Y-m-d');
//   $month_date23 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret24 = $dto->format('Y-m-d');
//   $month_date24 = $dto->format('Y');
  
//   $date21 = new DateTime($ret21);
//   $weeknumber21 = $date21->format("W");
  
//   $date22 = new DateTime($ret22);
//   $weeknumber22 = $date22->format("W");
  
//   $date23 = new DateTime($ret23);
//   $weeknumber23 = $date23->format("W");
  
//   $date24 = new DateTime($ret24);
//   $weeknumber24 = $date24->format("W");
  
  
//   $query21 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber21' AND year = '$month_date21'" );
//   $month21 = array();
//     $month21[] = "";  
//   while($row21 = $query21->fetch_assoc()){
//       $month21[] = $row21['SMT'];
//     }
//     $query22 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
//     $month22 = array();
//     $month22[] = "";
//     while($row22 = $query22->fetch_assoc()){
//       $month22[] = $row22['SMT'];
//     }
//     $query23 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
//     $month23 = array();
//     $month23[] = "";
//     while($row23 = $query23->fetch_assoc()){
//       $month23[] = $row23['SMT'];
//     }
//     $query24 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
//     $month24 = array();
//     $month24[] = "";
//     while($row24 = $query24->fetch_assoc()){
//       $month24[] = $row24['SMT'];
//     }
  
//     $six_month_avg= array();
//     $month_final6 = array_merge($month21,$month22,$month23,$month24);
//     $six_month_avg[] = array_sum($month_final6)/4;
  
//   //seven month
//   $dto->modify('-7 days');
//   $ret25 = $dto->format('Y-m-d');
//   $month_date25 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret26 = $dto->format('Y-m-d');
//   $month_date26 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret27 = $dto->format('Y-m-d');
//   $month_date27 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret28 = $dto->format('Y-m-d');
//   $month_date28 = $dto->format('Y');
  
//   $date25 = new DateTime($ret25);
//   $weeknumber25 = $date25->format("W");
  
//   $date26 = new DateTime($ret26);
//   $weeknumber26 = $date26->format("W");
  
//   $date27 = new DateTime($ret27);
//   $weeknumber27 = $date27->format("W");
  
//   $date28 = new DateTime($ret28);
//   $weeknumber28 = $date28->format("W");
  
  
//   $query25 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber25' AND year = '$month_date25'" );
//   $month25 = array();
//     $month25[] = "";  
//   while($row25 = $query25->fetch_assoc()){
//       $month25[] = $row25['SMT'];
//     }
//     $query26 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber26' AND year = '$month_date26'" );
//     $month26 = array();
//     $month26[] = "";
//     while($row26 = $query26->fetch_assoc()){
//       $month26[] = $row26['SMT'];
//     }
//     $query27 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber27' AND year = '$month_date27'" );
//     $month27 = array();
//     $month27[] = "";
//     while($row27 = $query27->fetch_assoc()){
//       $month27[] = $row27['SMT'];
//     }
//     $query28 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber28' AND year = '$month_date28'" );
//     $month28 = array();
//     $month28[] = "";
//     while($row28 = $query28->fetch_assoc()){
//       $month28[] = $row28['SMT'];
//     }
  
//     $seven_month_avg= array();
//     $month_final7 = array_merge($month25,$month26,$month27,$month28);
//     $seven_month_avg[] = array_sum($month_final7)/4;
  
//   //eight month
  
//   $dto->modify('-7 days');
//   $ret29 = $dto->format('Y-m-d');
//   $month_date29 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret30 = $dto->format('Y-m-d');
//   $month_date30 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret31 = $dto->format('Y-m-d');
//   $month_date31 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret32 = $dto->format('Y-m-d');
//   $month_date32 = $dto->format('Y');
  
//   $date29 = new DateTime($ret29);
//   $weeknumber29 = $date29->format("W");
  
//   $date30 = new DateTime($ret30);
//   $weeknumber30 = $date30->format("W");
  
//   $date31 = new DateTime($ret31);
//   $weeknumber31 = $date31->format("W");
  
//   $date32 = new DateTime($ret32);
//   $weeknumber32 = $date32->format("W");
  
  
//   $query29 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber29' AND year = '$month_date29'" );
//   $month29 = array();
//     $month29[] = "";  
//   while($row29 = $query29->fetch_assoc()){
//       $month29[] = $row29['SMT'];
//     }
//     $query30 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber30' AND year = '$month_date30'" );
//     $month30 = array();
//     $month30[] = "";
//     while($row30 = $query30->fetch_assoc()){
//       $month30[] = $row30['SMT'];
//     }
//     $query31 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber31' AND year = '$month_date31'" );
//     $month31 = array();
//     $month31[] = "";
//     while($row31 = $query31->fetch_assoc()){
//       $month31[] = $row31['SMT'];
//     }
//     $query32 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber32' AND year = '$month_date32'" );
//     $month32 = array();
//     $month32[] = "";
//     while($row32 = $query32->fetch_assoc()){
//       $month32[] = $row32['SMT'];
//     }
  
//     $eight_month_avg= array();
//     $month_final8 = array_merge($month29,$month30,$month31,$month32);
//     $eight_month_avg[] = array_sum($month_final8)/4;
  
  
//       // $one_month_date = array();
//       // $second_month_date =array();
//       // $third_month_date = array();
//       // $four_month_date = array();
//       // $five_month_date = array();
//       // $six_month_date = array();
//       // $seven_month_date = array();
//       // $eight_month_date = array();
//       // $nine_month_date = array();
  
//       // $one_month_date[] = strval($ret);
//       // $second_month_date[] = strval($ret5);
//       // $third_month_date[] = strval($ret9);
//       // $four_month_date[] = strval($ret13);
//       // $five_month_date[] = strval($ret17);
//       // $six_month_date[] = strval($ret21);
//       // $seven_month_date[] = strval($ret25);
//       // $eight_month_date[] = strval($ret29);
//       // $nine_month_date[] = strval($ret21);
  
  
//       // $date_array = array_merge($eight_month_date,$seven_month_date,$six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
//       // $final_month_array = array_merge($eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
  
//       //nine month 
//       $dto->modify('-7 days');
//       $ret33 = $dto->format('Y-m-d');
//       $month_date33 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret34 = $dto->format('Y-m-d');
//       $month_date34 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret35 = $dto->format('Y-m-d');
//       $month_date35 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret36 = $dto->format('Y-m-d');
//       $month_date36 = $dto->format('Y');
      
//       $date33 = new DateTime($ret33);
//       $weeknumber33 = $date33->format("W");
      
//       $date34 = new DateTime($ret34);
//       $weeknumber34 = $date34->format("W");
      
//       $date35 = new DateTime($ret35);
//       $weeknumber35 = $date35->format("W");
      
//       $date36 = new DateTime($ret36);
//       $weeknumber36 = $date36->format("W");
      
      
//       $query33 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber33' AND year = '$month_date33'" );
//       $month33 = array();
//     $month33[] = "";  
//       while($row33 = $query33->fetch_assoc()){
//           $month33[] = $row33['SMT'];
//         }
//         $query34 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber34' AND year = '$month_date34'" );
//         $month34 = array();
//     $month34[] = "";
//         while($row34 = $query34->fetch_assoc()){
//           $month34[] = $row34['SMT'];
//         }
//         $query35 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber35' AND year = '$month_date35'" );
//         $month35 = array();
//     $month35[] = "";
//         while($row35 = $query35->fetch_assoc()){
//           $month35[] = $row35['SMT'];
//         }
//         $query36 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber36' AND year = '$month_date36'" );
//         $month36 = array();
//     $month36[] = "";
//         while($row36 = $query36->fetch_assoc()){
//           $month36[] = $row36['SMT'];
//         }
      
//         $nine_month_avg= array();
//         $month_final9 = array_merge($month33,$month34,$month35,$month36);
//         $nine_month_avg[] = array_sum($month_final9)/4;
      
//    //ten month
//    $dto->modify('-7 days');
//       $ret37 = $dto->format('Y-m-d');
//       $month_date37 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret38 = $dto->format('Y-m-d');
//       $month_date38 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret39 = $dto->format('Y-m-d');
//       $month_date39 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret40 = $dto->format('Y-m-d');
//       $month_date40 = $dto->format('Y');
      
//       $date37 = new DateTime($ret37);
//       $weeknumber37 = $date37->format("W");
      
//       $date38 = new DateTime($ret38);
//       $weeknumber38 = $date38->format("W");
      
//       $date39 = new DateTime($ret39);
//       $weeknumber39 = $date39->format("W");
      
//       $date40 = new DateTime($ret40);
//       $weeknumber40 = $date40->format("W");
      
      
//       $query37 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber37' AND year = '$month_date37'" );
//       $month37 = array();
//     $month37[] = "";  
//       while($row37 = $query37->fetch_assoc()){
//           $month37[] = $row37['SMT'];
//         }
//         $query38 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber38' AND year = '$month_date38'" );
//         $month38 = array();
//         $month38[] = "";
//         while($row38 = $query38->fetch_assoc()){
//           $month38[] = $row38['SMT'];
//         }
//         $query39 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber39' AND year = '$month_date39'" );
//         $month39 = array();
//         $month39[] = "";
//         while($row39 = $query39->fetch_assoc()){
//           $month39[] = $row39['SMT'];
//         }
//         $query40 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber40' AND year = '$month_date40'" );
//         $month40 = array();
//         $month40[] = "";
//         while($row40 = $query40->fetch_assoc()){
//           $month40[] = $row40['SMT'];
//         }
      
//         $ten_month_avg= array();
//         $month_final10 = array_merge($month37,$month38,$month39,$month40);
//         $ten_month_avg[] = array_sum($month_final10)/4;
        
//     //eleven month
//     $dto->modify('-7 days');
//     $ret41 = $dto->format('Y-m-d');
//     $month_date41 = $dto->format('Y');
    
//     $dto->modify('-7 days');
//     $ret42 = $dto->format('Y-m-d');
//     $month_date42 = $dto->format('Y');
    
//     $dto->modify('-7 days');
//     $ret43 = $dto->format('Y-m-d');
//     $month_date43 = $dto->format('Y');
    
//     $dto->modify('-7 days');
//     $ret44 = $dto->format('Y-m-d');
//     $month_date44 = $dto->format('Y');
    
//     $date41 = new DateTime($ret41);
//     $weeknumber41 = $date41->format("W");
    
//     $date42 = new DateTime($ret42);
//     $weeknumber42 = $date42->format("W");
    
//     $date43 = new DateTime($ret43);
//     $weeknumber43 = $date43->format("W");
    
//     $date44 = new DateTime($ret44);
//     $weeknumber44 = $date44->format("W");
    
    
//     $query41 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber41' AND year = '$month_date41'" );
//     $month41 = array();
//     $month41[] = "";  
//     while($row41 = $query41->fetch_assoc()){
//         $month41[] = $row41['SMT'];
//       }
//       $query42 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber42' AND year = '$month_date42'" );
//       $month42 = array();
//     $month42[] = "";
//       while($row42 = $query42->fetch_assoc()){
//         $month42[] = $row42['SMT'];
//       }
//       $query43 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber43' AND year = '$month_date43'" );
//       $month43 = array();
//     $month43[] = "";
//       while($row43 = $query43->fetch_assoc()){
//         $month43[] = $row43['SMT'];
//       }
//       $query44 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber44' AND year = '$month_date44'" );
//       $month44 = array();
//     $month44[] = "";
//       while($row44 = $query44->fetch_assoc()){
//         $month44[] = $row44['SMT'];
//       }
    
//       $eleven_month_avg= array();
//       $month_final11 = array_merge($month41,$month42,$month43,$month44);
//       $eleven_month_avg[] = array_sum($month_final11)/4;
  
//       //tewlve month
//       $dto->modify('-7 days');
//       $ret45 = $dto->format('Y-m-d');
//       $month_date45 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret46 = $dto->format('Y-m-d');
//       $month_date46 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret47 = $dto->format('Y-m-d');
//       $month_date47 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret48 = $dto->format('Y-m-d');
//       $month_date48 = $dto->format('Y');
      
//       $date45 = new DateTime($ret45);
//       $weeknumber45 = $date45->format("W");
      
//       $date46 = new DateTime($ret46);
//       $weeknumber46 = $date46->format("W");
      
//       $date47 = new DateTime($ret47);
//       $weeknumber47 = $date47->format("W");
      
//       $date48 = new DateTime($ret48);
//       $weeknumber48 = $date48->format("W");
      
      
//       $query45 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber45' AND year = '$month_date45'" );
//       $month45 = array();
//     $month45[] = "";  
//       while($row45 = $query45->fetch_assoc()){
//           $month45[] = $row45['SMT'];
//         }
//         $query46 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber46' AND year = '$month_date46'" );
//         $month46 = array();
//     $month46[] = "";
//         while($row46 = $query46->fetch_assoc()){
//           $month46[] = $row46['SMT'];
//         }
//         $query47 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber47' AND year = '$month_date47'" );
//         $month47 = array();
//     $month47[] = "";
//         while($row47 = $query47->fetch_assoc()){
//           $month47[] = $row47['SMT'];
//         }
//         $query48 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber48' AND year = '$month_date48'" );
//         $month48 = array();
//     $month48[] = "";
//         while($row48 = $query48->fetch_assoc()){
//           $month48[] = $row48['SMT'];
//         }
      
//         $twelve_month_avg= array();
//         $month_final12 = array_merge($month45,$month46,$month47,$month48);
//         $twelve_month_avg[] = array_sum($month_final12)/4;
        
//     //extra month
//     $dto->modify('-7 days');
//       $ret49 = $dto->format('Y-m-d');
//        $month_date49 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret50 = $dto->format('Y-m-d');
//       $month_date50 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret51 = $dto->format('Y-m-d');
//       $month_date51 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret52 = $dto->format('Y-m-d');
//       $month_date52 = $dto->format('Y');
      
//       $date49 = new DateTime($ret49);
//       $weeknumber49 = $date49->format("W");
      
//       $date50 = new DateTime($ret50);
//       $weeknumber50 = $date50->format("W");
      
//       $date51 = new DateTime($ret51);
//       $weeknumber51 = $date51->format("W");
      
//       $date52 = new DateTime($ret52);
//       $weeknumber52 = $date52->format("W");
      
      
//       $query49 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber49' AND year = '$month_date49'" );
//       $month49 = array();
//     $month49[] = "";  
//       while($row_49 = $query49->fetch_assoc()){
//           $month49[] = $row_49['SMT'];
//         }
//         //  json_encode($month49);
//         $query50 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber50' AND year = '$month_date50'" );
//         $month50 = array();
//     $month50[] = "";
//         while($row_50 = $query50->fetch_assoc()){
//           $month50[] = $row_50['SMT'];
//         }
//         //  json_encode($month50);
//         $query51 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber51' AND year = '$month_date51'" );
//         $month51 = array();
//     $month51[] = "";
//         while($row_51 = $query51->fetch_assoc()){
//           $month51[] = $row_51['SMT'];
//         }
//         //  json_encode($month51);
//         $query52 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber52' AND year = '$month_date52'" );
//         $month52 = array();
//     $month52[] = "";
//         while($row_52 = $query52->fetch_assoc()){
//           $month52[] = $row_52['SMT'];
//         }
//         //  json_encode($month52);
//         $extra_month_avg= array();
//         // $month_final13 = array();
//         $month_final13 = array_merge($month49,$month50,$month51,$month52);
//          $extra_month_avg[] = array_sum($month_final13)/4;
  
  
//         //second year 
//         //one month
//         $dto->modify('-7 days');
//         $ret53 = $dto->format('Y-m-d');
//         $month_date53 = $dto->format('Y');
//         $second_monthly =date("Y - M",strtotime($ret53));

//         $dto->modify('-7 days');
//         $ret54 = $dto->format('Y-m-d');
//         $month_date54 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret55 = $dto->format('Y-m-d');
//         $month_date55 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret56 = $dto->format('Y-m-d');
//         $month_date56 = $dto->format('Y');
        
//         $date53 = new DateTime($ret53);
//         $weeknumber53 = $date53->format("W");
        
//         $date54 = new DateTime($ret54);
//         $weeknumber54 = $date54->format("W");
        
//         $date55 = new DateTime($ret55);
//         $weeknumber55 = $date55->format("W");
        
//         $date56 = new DateTime($ret56);
//         $weeknumber56 = $date56->format("W");
        
        
//         $query53 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber53' AND year = '$month_date53'" );
//         $month53 = array();
//         $month53[] = "";  
//         while($row53 = $query53->fetch_assoc()){
//             $month53[] = $row53['SMT'];
//           }
//           $query54 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber54' AND year = '$month_date54'" );
//           $month54 = array();
//           $month54[] = "";
//           while($row54 = $query54->fetch_assoc()){
//             $month54[] = $row54['SMT'];
//           }
//           $query55 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber55' AND year = '$month_date55'" );
//           $month55 = array();
//           $month55[] = "";
//           while($row55 = $query55->fetch_assoc()){
//             $month55[] = $row55['SMT'];
//           }
//           $query56 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber56' AND year = '$month_date56'" );
//           $month56 = array();
//           $month56[] = "";
//           while($row56 = $query56->fetch_assoc()){
//             $month56[] = $row56['SMT'];
//           }
        
//           $second_year_avg= array();
//           $month_final14 = array_merge($month53,$month54,$month55,$month56);
//           $second_year_avg[] = array_sum($month_final14)/4;
  
//           //second month
//           $dto->modify('-7 days');
//       $ret57 = $dto->format('Y-m-d');
//       $month_date57 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret58 = $dto->format('Y-m-d');
//       $month_date58 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret59 = $dto->format('Y-m-d');
//       $month_date59 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret60 = $dto->format('Y-m-d');
//       $month_date60 = $dto->format('Y');
      
//       $date57 = new DateTime($ret57);
//       $weeknumber57 = $date57->format("W");
      
//       $date58 = new DateTime($ret58);
//       $weeknumber58 = $date58->format("W");
      
//       $date59 = new DateTime($ret59);
//       $weeknumber59 = $date59->format("W");
      
//       $date60 = new DateTime($ret60);
//       $weeknumber60 = $date60->format("W");
      
      
//       $query57 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber57' AND year = '$month_date57'" );
//       $month57 = array();
//       $month57[] = "";  
//       while($row57 = $query57->fetch_assoc()){
//           $month57[] = $row57['SMT'];
//         }
//         $query58 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber58' AND year = '$month_date58'" );
//         $month58 = array();
//         $month58[] = "";
//         while($row58 = $query58->fetch_assoc()){
//           $month58[] = $row58['SMT'];
//         }
//         $query59 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber59' AND year = '$month_date59'" );
//         $month59 = array();
//         $month59[] = "";
//         while($row59 = $query59->fetch_assoc()){
//           $month59[] = $row59['SMT'];
//         }
//         $query60 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber60' AND year = '$month_date60'" );
//         $month60 = array();
//         $month60[] = "";
//         while($row60 = $query60->fetch_assoc()){
//           $month60[] = $row60['SMT'];
//         }
      
//         $second_year_avg1= array();
//         $month_final15 = array_merge($month57,$month58,$month59,$month60);
//         $second_year_avg1[] = array_sum($month_final15)/4;
  
//         //thrid month
//         $dto->modify('-7 days');
//       $ret61 = $dto->format('Y-m-d');
//       $month_date61 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret62 = $dto->format('Y-m-d');
//       $month_date62 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret63 = $dto->format('Y-m-d');
//       $month_date63 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret64 = $dto->format('Y-m-d');
//       $month_date64 = $dto->format('Y');
      
//       $date61 = new DateTime($ret61);
//       $weeknumber61 = $date61->format("W");
      
//       $date62 = new DateTime($ret62);
//       $weeknumber62 = $date62->format("W");
      
//       $date63 = new DateTime($ret63);
//       $weeknumber63 = $date63->format("W");
      
//       $date64 = new DateTime($ret64);
//       $weeknumber64 = $date64->format("W");
      
      
//       $query61 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber61' AND year = '$month_date61'" );
//       $month61 = array();
//       $month61[] = "";  
//       while($row61 = $query61->fetch_assoc()){
//           $month61[] = $row61['SMT'];
//         }
//         $query62 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber62' AND year = '$month_date62'" );
//         $month62 = array();
//         $month62[] = "";
//         while($row62 = $query62->fetch_assoc()){
//           $month62[] = $row62['SMT'];
//         }
//         $query63 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber63' AND year = '$month_date63'" );
//         $month63 = array();
//         $month63[] = "";
//         while($row63 = $query63->fetch_assoc()){
//           $month63[] = $row63['SMT'];
//         }
//         $query64 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber64' AND year = '$month_date64'" );
//         $month64 = array();
//         $month64[] = "";
//         while($row64 = $query64->fetch_assoc()){
//           $month64[] = $row64['SMT'];
//         }
      
//         $second_year_avg2= array();
//         $month_final16 = array_merge($month61,$month62,$month63,$month64);
//         $second_year_avg2[] = array_sum($month_final16)/4;
  
//         //four month
//         $dto->modify('-7 days');
//       $ret65 = $dto->format('Y-m-d');
//       $month_date65 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret66 = $dto->format('Y-m-d');
//       $month_date66 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret67 = $dto->format('Y-m-d');
//       $month_date67 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret68 = $dto->format('Y-m-d');
//       $month_date68 = $dto->format('Y');
      
//       $date65 = new DateTime($ret65);
//       $weeknumber65 = $date65->format("W");
      
//       $date66 = new DateTime($ret66);
//       $weeknumber66 = $date66->format("W");
      
//       $date67 = new DateTime($ret67);
//       $weeknumber67 = $date67->format("W");
      
//       $date68 = new DateTime($ret68);
//       $weeknumber68 = $date68->format("W");
      
      
//       $query65 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber65' AND year = '$month_date65'" );
//       $month65 = array();
//       $month65[] = "";  
//       while($row65 = $query65->fetch_assoc()){
//           $month65[] = $row65['SMT'];
//         }
//         $query66 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber66' AND year = '$month_date66'" );
//         $month66 = array();
//         $month66[] = "";
//         while($row66 = $query66->fetch_assoc()){
//           $month66[] = $row66['SMT'];
//         }
//         $query67 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber67' AND year = '$month_date67'" );
//         $month67 = array();
//         $month67[] = "";
//         while($row67 = $query67->fetch_assoc()){
//           $month67[] = $row67['SMT'];
//         }
//         $query68 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber68' AND year = '$month_date68'" );
//         $month68 = array();
//         $month68[] = "";
//         while($row68 = $query68->fetch_assoc()){
//           $month68[] = $row68['SMT'];
//         }
      
//         $second_year_avg3= array();
//         $month_final17 = array_merge($month65,$month66,$month67,$month68);
//         $second_year_avg3[] = array_sum($month_final17)/4;
  
//         //five month
//         $dto->modify('-7 days');
//       $ret69 = $dto->format('Y-m-d');
//       $month_date69 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret70 = $dto->format('Y-m-d');
//       $month_date70 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret71 = $dto->format('Y-m-d');
//       $month_date71 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret72 = $dto->format('Y-m-d');
//       $month_date72 = $dto->format('Y');
      
//       $date69 = new DateTime($ret69);
//       $weeknumber69 = $date69->format("W");
      
//       $date70 = new DateTime($ret70);
//       $weeknumber70 = $date70->format("W");
      
//       $date71 = new DateTime($ret71);
//       $weeknumber71 = $date71->format("W");
      
//       $date72 = new DateTime($ret72);
//       $weeknumber72 = $date72->format("W");
      
      
//       $query69 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber69' AND year = '$month_date69'" );
//       $month69 = array();
//       $month69[] = "";  
//       while($row69 = $query69->fetch_assoc()){
//           $month69[] = $row69['SMT'];
//         }
//         $query70 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber70' AND year = '$month_date70'" );
//         $month70 = array();
//         $month70[] = "";
//         while($row70 = $query70->fetch_assoc()){
//           $month70[] = $row70['SMT'];
//         }
//         $query71 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber71' AND year = '$month_date71'" );
//         $month71 = array();
//         $month71[] = "";
//         while($row71 = $query71->fetch_assoc()){
//           $month71[] = $row71['SMT'];
//         }
//         $query72 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber72' AND year = '$month_date72'" );
//         $month72 = array();
//         $month72[] = "";
//         while($row72 = $query72->fetch_assoc()){
//           $month72[] = $row72['SMT'];
//         }
      
//         $second_year_avg4= array();
//         $month_final18 = array_merge($month69,$month70,$month71,$month72);
//         $second_year_avg4[] = array_sum($month_final18)/4;
  
//         //six month
//         $dto->modify('-7 days');
//       $ret73 = $dto->format('Y-m-d');
//       $month_date73 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret74 = $dto->format('Y-m-d');
//       $month_date74 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret75 = $dto->format('Y-m-d');
//       $month_date75 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret76 = $dto->format('Y-m-d');
//       $month_date76 = $dto->format('Y');
      
//       $date73 = new DateTime($ret73);
//       $weeknumber73 = $date73->format("W");
      
//       $date74 = new DateTime($ret74);
//       $weeknumber74 = $date74->format("W");
      
//       $date75 = new DateTime($ret75);
//       $weeknumber75 = $date75->format("W");
      
//       $date76 = new DateTime($ret76);
//       $weeknumber76 = $date76->format("W");
      
      
//       $query73 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber73' AND year = '$month_date73'" );
//       $month73 = array();
//       $month73[] = "";  
//       while($row73 = $query73->fetch_assoc()){
//           $month73[] = $row73['SMT'];
//         }
//         $query74 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber74' AND year = '$month_date74'" );
//         $month74 = array();
//         $month74[] = "";
//         while($row74 = $query74->fetch_assoc()){
//           $month74[] = $row74['SMT'];
//         }
//         $query75 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber75' AND year = '$month_date75'" );
//         $month75 = array();
//         $month75[] = "";
//         while($row75 = $query75->fetch_assoc()){
//           $month75[] = $row75['SMT'];
//         }
//         $query76 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber76' AND year = '$month_date76'" );
//         $month76 = array();
//         $month76[] = "";
//         while($row76 = $query76->fetch_assoc()){
//           $month76[] = $row76['SMT'];
//         }
      
//         $second_year_avg5= array();
//         $month_final19 = array_merge($month73,$month74,$month75,$month76);
//         $second_year_avg5[] = array_sum($month_final19)/4;
        
//         //seven month
//         $dto->modify('-7 days');
//       $ret77 = $dto->format('Y-m-d');
//       $month_date77 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret78 = $dto->format('Y-m-d');
//       $month_date78 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret79 = $dto->format('Y-m-d');
//       $month_date79 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret80 = $dto->format('Y-m-d');
//       $month_date80 = $dto->format('Y');
      
//       $date77 = new DateTime($ret77);
//       $weeknumber77 = $date77->format("W");
      
//       $date78 = new DateTime($ret78);
//       $weeknumber78 = $date78->format("W");
      
//       $date79 = new DateTime($ret79);
//       $weeknumber79 = $date79->format("W");
      
//       $date80 = new DateTime($ret80);
//       $weeknumber80 = $date80->format("W");
      
      
//       $query77 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber77' AND year = '$month_date77'" );
//       $month77 = array();
//       $month77[] = "";  
//       while($row77 = $query77->fetch_assoc()){
//           $month77[] = $row77['SMT'];
//         }
//         $query78 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber78' AND year = '$month_date78'" );
//         $month78 = array();
//         $month78[] = "";
//         while($row78 = $query78->fetch_assoc()){
//           $month78[] = $row78['SMT'];
//         }
//         $query79 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber79' AND year = '$month_date79'" );
//         $month79 = array();
//         $month79[] = "";
//         while($row79 = $query79->fetch_assoc()){
//           $month79[] = $row79['SMT'];
//         }
//         $query80 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber80' AND year = '$month_date80'" );
//         $month80 = array();
//         $month80[] = "";
//         while($row80 = $query80->fetch_assoc()){
//           $month80[] = $row80['SMT'];
//         }
      
//         $second_year_avg6= array();
//         $month_final20 = array_merge($month77,$month78,$month79,$month80);
//         $second_year_avg6[] = array_sum($month_final20)/4;
  
//         //eigth month
//         $dto->modify('-7 days');
//       $ret81 = $dto->format('Y-m-d');
//       $month_date81 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret82 = $dto->format('Y-m-d');
//       $month_date82 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret83 = $dto->format('Y-m-d');
//       $month_date83 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret84 = $dto->format('Y-m-d');
//       $month_date84 = $dto->format('Y');
      
//       $date81 = new DateTime($ret81);
//       $weeknumber81 = $date81->format("W");
      
//       $date82 = new DateTime($ret82);
//       $weeknumber82 = $date82->format("W");
      
//       $date83 = new DateTime($ret83);
//       $weeknumber83 = $date83->format("W");
      
//       $date84 = new DateTime($ret84);
//       $weeknumber84 = $date84->format("W");
      
      
//       $query81 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber81' AND year = '$month_date81'" );
//       $month81 = array();
//       $month81[] = "";  
//       while($row81 = $query81->fetch_assoc()){
//           $month81[] = $row81['SMT'];
//         }
//         $query82 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber82' AND year = '$month_date82'" );
//         $month82 = array();
//         $month82[] = "";
//         while($row82 = $query82->fetch_assoc()){
//           $month82[] = $row82['SMT'];
//         }
//         $query83 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber83' AND year = '$month_date83'" );
//         $month83 = array();
//         $month83[] = "";
//         while($row83 = $query83->fetch_assoc()){
//           $month83[] = $row83['SMT'];
//         }
//         $query84 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber84' AND year = '$month_date84'" );
//         $month84 = array();
//         $month84[] = "";
//         while($row84 = $query84->fetch_assoc()){
//           $month84[] = $row84['SMT'];
//         }
      
//         $second_year_avg7= array();
//         $month_final21 = array_merge($month81,$month82,$month83,$month84);
//         $second_year_avg7[] = array_sum($month_final21)/4;
  
//         //nine month
//         $dto->modify('-7 days');
//       $ret85 = $dto->format('Y-m-d');
//       $month_date85 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret86 = $dto->format('Y-m-d');
//       $month_date86 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret87 = $dto->format('Y-m-d');
//       $month_date87 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret88 = $dto->format('Y-m-d');
//       $month_date88 = $dto->format('Y');
      
//       $date85 = new DateTime($ret85);
//       $weeknumber85 = $date85->format("W");
      
//       $date86 = new DateTime($ret86);
//       $weeknumber86 = $date86->format("W");
      
//       $date87 = new DateTime($ret87);
//       $weeknumber87 = $date87->format("W");
      
//       $date88 = new DateTime($ret88);
//       $weeknumber88 = $date88->format("W");
      
      
//       $query85 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber85' AND year = '$month_date85'" );
//       $month85 = array();
//       $month85[] = "";  
//       while($row85 = $query85->fetch_assoc()){
//           $month85[] = $row85['SMT'];
//         }
//         $query86 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber86' AND year = '$month_date86'" );
//         $month86 = array();
//         $month86[] = "";
//         while($row86 = $query86->fetch_assoc()){
//           $month86[] = $row86['SMT'];
//         }
//         $query87 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber87' AND year = '$month_date87'" );
//         $month87 = array();
//         $month87[] = "";
//         while($row87 = $query87->fetch_assoc()){
//           $month87[] = $row87['SMT'];
//         }
//         $query88 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber88' AND year = '$month_date88'" );
//         $month88 = array();
//         $month88[] = "";
//         while($row88 = $query88->fetch_assoc()){
//           $month88[] = $row88['SMT'];
//         }
      
//         $second_year_avg8= array();
//         $month_final22 = array_merge($month85,$month86,$month87,$month88);
//         $second_year_avg8[] = array_sum($month_final22)/4;
  
//         //ten month
//         $dto->modify('-7 days');
//       $ret89 = $dto->format('Y-m-d');
//       $month_date89 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret90 = $dto->format('Y-m-d');
//       $month_date90 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret91 = $dto->format('Y-m-d');
//       $month_date91 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret92 = $dto->format('Y-m-d');
//       $month_date92 = $dto->format('Y');
      
//       $date89 = new DateTime($ret89);
//       $weeknumber89 = $date89->format("W");
      
//       $date90 = new DateTime($ret90);
//       $weeknumber90 = $date90->format("W");
      
//       $date91 = new DateTime($ret91);
//       $weeknumber91 = $date91->format("W");
      
//       $date92 = new DateTime($ret92);
//       $weeknumber92 = $date92->format("W");
      
      
//       $query89 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber89' AND year = '$month_date89'" );
//       $month89 = array();
//       $month89[] = "";  
//       while($row89 = $query89->fetch_assoc()){
//           $month89[] = $row89['SMT'];
//         }
//         $query90 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber90' AND year = '$month_date90'" );
//         $month90 = array();
//         $month90[] = "";
//         while($row90 = $query90->fetch_assoc()){
//           $month90[] = $row90['SMT'];
//         }
//         $query91 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber91' AND year = '$month_date91'" );
//         $month91 = array();
//         $month91[] = "";
//         while($row91 = $query91->fetch_assoc()){
//           $month91[] = $row91['SMT'];
//         }
//         $query92 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber92' AND year = '$month_date92'" );
//         $month92 = array();
//         $month92[] = "";
//         while($row92 = $query92->fetch_assoc()){
//           $month92[] = $row92['SMT'];
//         }
      
//         $second_year_avg9= array();
//         $month_final23 = array_merge($month89,$month90,$month91,$month92);
//         $second_year_avg9[] = array_sum($month_final23)/4;
  
//         //eleven month
//         $dto->modify('-7 days');
//       $ret93 = $dto->format('Y-m-d');
//       $month_date93 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret94 = $dto->format('Y-m-d');
//       $month_date94 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret95 = $dto->format('Y-m-d');
//       $month_date95 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret96 = $dto->format('Y-m-d');
//       $month_date96 = $dto->format('Y');
      
//       $date93 = new DateTime($ret93);
//       $weeknumber93 = $date93->format("W");
      
//       $date94 = new DateTime($ret94);
//       $weeknumber94 = $date94->format("W");
      
//       $date95 = new DateTime($ret95);
//       $weeknumber95 = $date95->format("W");
      
//       $date96 = new DateTime($ret96);
//       $weeknumber96 = $date96->format("W");
      
      
//       $query93 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber93' AND year = '$month_date93'" );
//       $month93 = array();
//       $month93[] = "";  
//       while($row93 = $query93->fetch_assoc()){
//           $month93[] = $row93['SMT'];
//         }
//         $query94 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber94' AND year = '$month_date94'" );
//         $month94 = array();
//         $month94[] = "";
//         while($row94 = $query94->fetch_assoc()){
//           $month94[] = $row94['SMT'];
//         }
//         $query95 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber95' AND year = '$month_date95'" );
//         $month95 = array();
//         $month95[] = "";
//         while($row95 = $query95->fetch_assoc()){
//           $month95[] = $row95['SMT'];
//         }
//         $query96 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber96' AND year = '$month_date96'" );
//         $month96 = array();
//         $month96[] = "";
//         while($row96 = $query96->fetch_assoc()){
//           $month96[] = $row96['SMT'];
//         }
      
//         $second_year_avg10= array();
//         $month_final24 = array_merge($month93,$month94,$month95,$month96);
//         $second_year_avg10[] = array_sum($month_final24)/4;
  
//         //tweleve month
//         $dto->modify('-7 days');
//       $ret97 = $dto->format('Y-m-d');
//       $month_date97 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret98 = $dto->format('Y-m-d');
//       $month_date98 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret99 = $dto->format('Y-m-d');
//       $month_date99 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret100 = $dto->format('Y-m-d');
//       $month_date100 = $dto->format('Y');
      
//       $date97 = new DateTime($ret97);
//       $weeknumber97 = $date97->format("W");
      
//       $date98 = new DateTime($ret98);
//       $weeknumber98 = $date98->format("W");
      
//       $date99 = new DateTime($ret99);
//       $weeknumber99 = $date99->format("W");
      
//       $date100 = new DateTime($ret100);
//       $weeknumber100 = $date100->format("W");
      
      
//       $query97 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber97' AND year = '$month_date97'" );
//       $month97 = array();
//       $month97[] = "";  
//       while($row97 = $query97->fetch_assoc()){
//           $month97[] = $row97['SMT'];
//         }
//         $query98 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber98' AND year = '$month_date98'" );
//         $month98 = array();
//         $month98[] = "";
//         while($row98 = $query98->fetch_assoc()){
//           $month98[] = $row98['SMT'];
//         }
//         $query99 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber99' AND year = '$month_date99'" );
//         $month99 = array();
//         $month99[] = "";
//         while($row99 = $query99->fetch_assoc()){
//           $month99[] = $row99['SMT'];
//         }
//         $query100 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber100' AND year = '$month_date100'" );
//         $month100 = array();
//         $month100[] = "";
//         while($row100 = $query100->fetch_assoc()){
//           $month100[] = $row100['SMT'];
//         }
      
//         $second_year_avg11= array();
//         $month_final25 = array_merge($month97,$month98,$month99,$month100);
//         $second_year_avg11[] = array_sum($month_final25)/4;
  
//         //extra month
//         $dto->modify('-7 days');
//       $ret_97 = $dto->format('Y-m-d');
//       $month_date_97 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret_98 = $dto->format('Y-m-d');
//       $month_date_98 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret_99 = $dto->format('Y-m-d');
//       $month_date_99 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret_100 = $dto->format('Y-m-d');
//       $month_date_100 = $dto->format('Y');
      
//       $date_97 = new DateTime($ret_97);
//       $weeknumber_97 = $date_97->format("W");
      
//       $date_98 = new DateTime($ret_98);
//       $weeknumber_98 = $date_98->format("W");
      
//       $date_99 = new DateTime($ret_99);
//       $weeknumber_99 = $date_99->format("W");
      
//       $date_100 = new DateTime($ret_100);
//       $weeknumber_100 = $date_100->format("W");
      
      
//       $query_97 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_97' AND year = '$month_date_97'" );
//       $month_97 = array();
//       $month_97[] = "";  
//       while($row_97 = $query_97->fetch_assoc()){
//           $month_97[] = $row_97['SMT'];
//         }
//         $query_98 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_98' AND year = '$month_date_98'" );
//         $month_98 = array();
//         $month_98[] = "";
//         while($row_98 = $query_98->fetch_assoc()){
//           $month_98[] = $row_98['SMT'];
//         }
//         $query_99 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_99' AND year = '$month_date_99'" );
//         $month_99 = array();
//         $month_99[] = "";
//         while($row_99 = $query_99->fetch_assoc()){
//           $month_99[] = $row_99['SMT'];
//         }
//         $query_100 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_100' AND year = '$month_date_100'" );
//         $month_100 = array();
//         $month_100[] = "";
//         while($row_100 = $query_100->fetch_assoc()){
//           $month_100[] = $row_100['SMT'];
//         }
      
//         $second_year_avg_11= array();
//         $month_final_25 = array_merge($month_97,$month_98,$month_99,$month_100);
//         $second_year_avg_11[] = array_sum($month_final_25)/4;
  
  
//         //third year
//         //one month
//         $dto->modify('-7 days');
//       $ret101 = $dto->format('Y-m-d');
//       $month_date101 = $dto->format('Y');
//       $third_monthly =date("Y - M",strtotime($ret101));

//       $dto->modify('-7 days');
//       $ret102 = $dto->format('Y-m-d');
//       $month_date102 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret103 = $dto->format('Y-m-d');
//       $month_date103 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret104 = $dto->format('Y-m-d');
//       $month_date104 = $dto->format('Y');
      
//       $date101 = new DateTime($ret101);
//       $weeknumber101 = $date101->format("W");
      
//       $date102 = new DateTime($ret102);
//       $weeknumber102 = $date102->format("W");
      
//       $date103 = new DateTime($ret103);
//       $weeknumber103 = $date103->format("W");
      
//       $date104 = new DateTime($ret104);
//       $weeknumber104 = $date104->format("W");
      
      
//   $query101 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber101' AND year = '$month_date101'" );
//   $month101 = array();
//   $month101[] = "";      
//   while($row101 = $query101->fetch_assoc()){
//           $month101[] = $row101['SMT'];
//         }
//       $query102 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber102' AND year = '$month_date102'" );
//       $month102 = array();
//   $month102[] = "";    
//       while($row102 = $query102->fetch_assoc()){
//           $month102[] = $row102['SMT'];
//         }
//       $query103 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber103' AND year = '$month_date103'" );
//       $month103 = array();
//   $month103[] = "";    
//       while($row103 = $query103->fetch_assoc()){
//           $month103[] = $row103['SMT'];
//         }
//       $query104 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber104' AND year = '$month_date104'" );
//       $month104 = array();
//   $month104[] = "";    
//       while($row104 = $query104->fetch_assoc()){
//           $month104[] = $row104['SMT'];
//         }
      
//         $third_month_avg= array();
//         $month_final101 = array_merge($month101,$month102,$month103,$month104);
//         $third_month_avg[] = array_sum($month_final101)/4;
  
//         //second month
//         $dto->modify('-7 days');
//         $ret105 = $dto->format('Y-m-d');
//         $month_date105 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret106 = $dto->format('Y-m-d');
//         $month_date106 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret107 = $dto->format('Y-m-d');
//         $month_date107 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret108 = $dto->format('Y-m-d');
//         $month_date108 = $dto->format('Y');
        
//         $date105 = new DateTime($ret105);
//         $weeknumber105 = $date105->format("W");
   
//         $date106 = new DateTime($ret106);
//         $weeknumber106 = $date106->format("W");
        
//         $date107 = new DateTime($ret107);
//         $weeknumber107 = $date107->format("W");
        
//         $date108 = new DateTime($ret108);
//         $weeknumber108 = $date108->format("W");
        
        
//     $query105 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber105' AND year = '$month_date105'" );
//     $month105 = array();
//   $month105[] = "";        
//     while($row105 = $query105->fetch_assoc()){
//             $month105[] = $row105['SMT'];
//           }
//         $query106 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber106' AND year = '$month_date106'" );
//         $month106 = array();
//   $month106[] = "";    
//         while($row106 = $query106->fetch_assoc()){
//             $month106[] = $row106['SMT'];
//           }
//         $query107 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber107' AND year = '$month_date107'" );
//         $month107 = array();
//   $month107[] = "";    
//         while($row107 = $query107->fetch_assoc()){
//             $month107[] = $row107['SMT'];
//           }
//         $query108 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber108' AND year = '$month_date108'" );
//         $month108 = array();
//   $month108[] = "";    
//         while($row108 = $query108->fetch_assoc()){
//             $month108[] = $row108['SMT'];
//           }
        
//           $third_month_avg1= array();
//           $month_final102 = array_merge($month105,$month106,$month107,$month108);
//           $third_month_avg1[] = array_sum($month_final102)/4;
  
//           //third month
//           $dto->modify('-7 days');
//           $ret109 = $dto->format('Y-m-d');
//           $month_date109 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret110 = $dto->format('Y-m-d');
//           $month_date110 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret111 = $dto->format('Y-m-d');
//           $month_date111 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret112 = $dto->format('Y-m-d');
//           $month_date112 = $dto->format('Y');
          
//           $date109 = new DateTime($ret109);
//           $weeknumber109 = $date109->format("W");
          
//           $date110 = new DateTime($ret110);
//           $weeknumber110 = $date110->format("W");
          
//           $date111 = new DateTime($ret111);
//           $weeknumber111 = $date111->format("W");
          
//            $date112 = new DateTime($ret112);
//          $weeknumber112 = $date112->format("W");
          
          
//       $query109 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber109' AND year = '$month_date109'" );
//       $month109 = array();
//   $month109[] = "";        
//       while($row109 = $query109->fetch_assoc()){
//               $month109[] = $row109['SMT'];
//             }
//           $query110 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber110' AND year = '$month_date110'" );
//           $month110 = array();
//   $month110[] = "";   
//           while($row110 = $query110->fetch_assoc()){
//               $month110[] = $row110['SMT'];
//             }
//           $query111 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber111' AND year = '$month_date111'" );
//           $month111 = array();
//   $month111[] = "";    
//           while($row111 = $query111->fetch_assoc()){
//               $month111[] = $row111['SMT'];
//             }
//           $query112 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber112' AND year = '$month_date112'" );
//           $month112 = array();
//   $month112[] = "";    
//           while($row112 = $query112->fetch_assoc()){
//               $month112[] = $row112['SMT'];
//             }
          
//             $third_month_avg2= array();
//             $month_final103 = array_merge($month109,$month110,$month111,$month112);
//             $third_month_avg2[] = array_sum($month_final103)/4;
//         //four month
//         $dto->modify('-7 days');
//       $ret113 = $dto->format('Y-m-d');
//       $month_date113 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret114 = $dto->format('Y-m-d');
//       $month_date114 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret115 = $dto->format('Y-m-d');
//       $month_date115 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret116 = $dto->format('Y-m-d');
//       $month_date116 = $dto->format('Y');
      
//       $date113 = new DateTime($ret113);
//        $weeknumber113 = $date113->format("W");
      
//       $date114 = new DateTime($ret114);
//       $weeknumber114 = $date114->format("W");
      
//       $date115 = new DateTime($ret115);
//       $weeknumber115 = $date115->format("W");
      
//       $date116 = new DateTime($ret116);
//       $weeknumber116 = $date116->format("W");
      
      
//   $query113 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber113' AND year = '$month_date113'" );
//   $month113 = array();
//   $month113[] = "";        
//   while($row113 = $query113->fetch_assoc()){
//           $month113[] = $row113['SMT'];
//         }
//         // echo json_encode($month113);
//       $query114 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber114' AND year = '$month_date114'" );
//       $month114 = array();
//   $month114[] = "";    
//       while($row114 = $query114->fetch_assoc()){
//           $month114[] = $row114['SMT'];
//         }
//       $query115 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber115' AND year = '$month_date115'" );
//       $month115 = array();
//   $month115[] = "";    
//       while($row115 = $query115->fetch_assoc()){
//           $month115[] = $row115['SMT'];
//         }
//       $query116 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber116' AND year = '$month_date116'" );
//       $month116 = array();
//   $month116[] = "";    
//       while($row116 = $query116->fetch_assoc()){
//           $month116[] = $row116['SMT'];
//         }
      
//         $third_month_avg3= array();
//         $month_final104 = array_merge($month113,$month114,$month115,$month116);
//         $third_month_avg3[] = array_sum($month_final104)/4;
  
//         //five month
//         $dto->modify('-7 days');
//       $ret117 = $dto->format('Y-m-d');
//       $month_date117 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret118 = $dto->format('Y-m-d');
//       $month_date118 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret119 = $dto->format('Y-m-d');
//       $month_date119 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret120 = $dto->format('Y-m-d');
//       $month_date120 = $dto->format('Y');
      
//       $date117 = new DateTime($ret117);
//      $weeknumber117 = $date117->format("W");
      
//       $date118 = new DateTime($ret118);
//       $weeknumber118 = $date118->format("W");
      
//       $date119 = new DateTime($ret119);
//       $weeknumber119 = $date119->format("W");
      
//       $date120 = new DateTime($ret120);
//       $weeknumber120 = $date120->format("W");
      
      
//       $query117 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber117' AND year = '$month_date117'" );
//       $month117 = array();
//   $month117[] = "";    
//       while($row117 = $query117->fetch_assoc()){
//           $month117[] = $row117['SMT'];
//         }
//         $query118 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber118' AND year = '$month_date118'" );
//         $month118 = array();
//   $month118[] = "";  
//         while($row118 = $query118->fetch_assoc()){
//           $month118[] = $row118['SMT'];
//         }
//         $query119 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber119' AND year = '$month_date119'" );
//         $month119 = array();
//   $month119[] = "";  
//         while($row119 = $query119->fetch_assoc()){
//           $month119[] = $row119['SMT'];
//         }
//         $query120 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber120' AND year = '$month_date120'" );
//         $month120 = array();
//   $month120[] = "";  
//         while($row120 = $query120->fetch_assoc()){
//           $month120[] = $row120['SMT'];
//         }
      
//         $third_month_avg4= array();
//         $month_final105 = array_merge($month117,$month118,$month119,$month120);
//         $third_month_avg4[] = array_sum($month_final105)/4;
  
//   //       //six month
//         $dto->modify('-7 days');
//       $ret221 = $dto->format('Y-m-d');
//       $month_date221 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret222 = $dto->format('Y-m-d');
//       $month_date222 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret223 = $dto->format('Y-m-d');
//       $month_date223 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret224 = $dto->format('Y-m-d');
//       $month_date224 = $dto->format('Y');
      
//       $date221 = new DateTime($ret221);
//       $weeknumber221 = $date221->format("W");
      
//       $date222 = new DateTime($ret222);
//       $weeknumber222 = $date222->format("W");
      
//       $date223 = new DateTime($ret223);
//       $weeknumber223 = $date223->format("W");
      
//       $date224 = new DateTime($ret224);
//       $weeknumber224 = $date224->format("W");
      
      
//       $query221 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber221' AND year = '$month_date221'" );
//       $month221 = array();
//   $month221[] = "";    
//       while($row221 = $query221->fetch_assoc()){
//           $month221[] = $row221['SMT'];
//         }
//         $query222 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber222' AND year = '$month_date222'" );
//         $month222 = array();
//   $month222[] = ""; 
//         while($row222 = $query222->fetch_assoc()){
//           $month222[] = $row222['SMT'];
//         }
//         $query223 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber223' AND year = '$month_date223'" );
//         $month223 = array();
//   $month223[] = ""; 
//         while($row223 = $query223->fetch_assoc()){
//           $month223[] = $row223['SMT'];
//         }
//         $query224 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber224' AND year = '$month_date224'" );
//         $month224 = array();
//   $month224[] = ""; 
//         while($row224 = $query224->fetch_assoc()){
//           $month224[] = $row224['SMT'];
//         }
      
//         $third_month_avg5= array();
//         $month_final106 = array_merge($month221,$month222,$month223,$month224);
//         $third_month_avg5[] = array_sum($month_final106)/4;
  
//   // //       //seven month
//         $dto->modify('-7 days');
//       $ret225 = $dto->format('Y-m-d');
//       $month_date225 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret226 = $dto->format('Y-m-d');
//       $month_date226 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret227 = $dto->format('Y-m-d');
//       $month_date227 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret228 = $dto->format('Y-m-d');
//       $month_date228 = $dto->format('Y');
      
//       $date225 = new DateTime($ret225);
//       $weeknumber225 = $date225->format("W");
      
//       $date226 = new DateTime($ret226);
//       $weeknumber226 = $date226->format("W");
      
//       $date227 = new DateTime($ret227);
//       $weeknumber227 = $date227->format("W");
      
//       $date228 = new DateTime($ret228);
//       $weeknumber228 = $date228->format("W");
      
      
//       $query225 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber225' AND year = '$month_date225'" );
//       $month225 = array();
//   $month225[] = "";   
//       while($row225 = $query225->fetch_assoc()){
//           $month225[] = $row225['SMT'];
//         }
//         $query226 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber226' AND year = '$month_date226'" );
//         $month226 = array();
//   $month226[] = ""; 
//         while($row226 = $query226->fetch_assoc()){
//           $month226[] = $row226['SMT'];
//         }
//         $query227 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber227' AND year = '$month_date227'" );
//         $month227 = array();
//   $month227[] = ""; 
//         while($row227 = $query227->fetch_assoc()){
//           $month227[] = $row227['SMT'];
//         }
//         $query228 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber228' AND year = '$month_date228'" );
//         $month228 = array();
//   $month228[] = ""; 
//         while($row228 = $query228->fetch_assoc()){
//           $month228[] = $row228['SMT'];
//         }
      
//         $third_month_avg6= array();
//         $month_final107 = array_merge($month225,$month226,$month227,$month228);
//         $third_month_avg6[] = array_sum($month_final107)/4;
//         //eight month
//         $dto->modify('-7 days');
//         $ret229 = $dto->format('Y-m-d');
//         $month_date229 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret230 = $dto->format('Y-m-d');
//         $month_date230 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret231 = $dto->format('Y-m-d');
//          $month_date231 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret232 = $dto->format('Y-m-d');
//         $month_date232 = $dto->format('Y');
        
//         $date229 = new DateTime($ret229);
//         $weeknumber229 = $date229->format("W");
        
//         $date230 = new DateTime($ret230);
//         $weeknumber230 = $date230->format("W");
        
//         $date231 = new DateTime($ret231);
//         $weeknumber231 = $date231->format("W");
        
//         $date232 = new DateTime($ret232);
//         $weeknumber232 = $date232->format("W");
        
        
//         $query229 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber229' AND year = '$month_date229'" );
//         $month229 = array();
//   $month229[] = "";   
//         while($row229 = $query229->fetch_assoc()){
//             $month229[] = $row229['SMT'];
//           }
//           $query230 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber230' AND year = '$month_date230'" );
//           $month230 = array();
//   $month230[] = ""; 
//           while($row230 = $query230->fetch_assoc()){
//             $month230[] = $row230['SMT'];
//           }
//           $query231 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber231' AND year = '$month_date231'" );
//           $month231 = array();
//   $month231[] = ""; 
//           while($row231 = $query231->fetch_assoc()){
//             $month231[] = $row231['SMT'];
//           }
//           $query232 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber232' AND year = '$month_date232'" );
//           $month232 = array();
//   $month232[] = ""; 
//           while($row232 = $query232->fetch_assoc()){
//             $month232[] = $row232['SMT'];
//           }
        
//           $third_month_avg7= array();
//           $month_final108 = array_merge($month229,$month230,$month231,$month232);
//           $third_month_avg7[] = array_sum($month_final108)/4;
  
//   //       //nine month
//         $dto->modify('-7 days');
//         $ret233 = $dto->format('Y-m-d');
//         $month_date233 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret234 = $dto->format('Y-m-d');
//         $month_date234 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret235 = $dto->format('Y-m-d');
//         $month_date235 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret236 = $dto->format('Y-m-d');
//         $month_date236 = $dto->format('Y');
        
//         $date233 = new DateTime($ret233);
//         $weeknumber233 = $date233->format("W");
        
//         $date234 = new DateTime($ret234);
//         $weeknumber234 = $date234->format("W");
        
//         $date235 = new DateTime($ret235);
//         $weeknumber235 = $date235->format("W");
        
//         $date236 = new DateTime($ret236);
//         $weeknumber236 = $date236->format("W");
        
        
//         $query233 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber233' AND year = '$month_date233'" );
//         $month233 = array();
//   $month233[] = "";   
//         while($row233 = $query233->fetch_assoc()){
//             $month233[] = $row233['SMT'];
//           }
//           $query234 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber234' AND year = '$month_date234'" );
//           $month234 = array();
//   $month234[] = ""; 
//           while($row234 = $query234->fetch_assoc()){
//             $month234[] = $row234['SMT'];
//           }
//           $query235 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber235' AND year = '$month_date235'" );
//           $month235 = array();
//   $month235[] = ""; 
//           while($row235 = $query235->fetch_assoc()){
//             $month235[] = $row235['SMT'];
//           }
//           $query236 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber236' AND year = '$month_date236'" );
//           $month236 = array();
//   $month236[] = ""; 
//           while($row236 = $query236->fetch_assoc()){
//             $month236[] = $row236['SMT'];
//           }
        
//           $third_month_avg8= array();
//           $month_final109 = array_merge($month233,$month234,$month235,$month236);
//           $third_month_avg8[] = array_sum($month_final109)/4;
  
//   // //ten month
//   $dto->modify('-7 days');
//       $ret237 = $dto->format('Y-m-d');
//       $month_date237 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret238 = $dto->format('Y-m-d');
//       $month_date238 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret239 = $dto->format('Y-m-d');
//       $month_date239 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret240 = $dto->format('Y-m-d');
//       $month_date240 = $dto->format('Y');
      
//       $date237 = new DateTime($ret237);
//       $weeknumber237 = $date237->format("W");
      
//       $date238 = new DateTime($ret238);
//       $weeknumber238 = $date238->format("W");
      
//       $date239 = new DateTime($ret239);
//       $weeknumber239 = $date239->format("W");
      
//       $date240 = new DateTime($ret240);
//       $weeknumber240 = $date240->format("W");
      
      
//       $query237 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber237' AND year = '$month_date237'" );
//       $month237 = array();
//   $month237[] = "";   
//       while($row237 = $query237->fetch_assoc()){
//           $month237[] = $row237['SMT'];
//         }
//         $query238 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber238' AND year = '$month_date238'" );
//         $month238 = array();
//   $month238[] = ""; 
//         while($row238 = $query238->fetch_assoc()){
//           $month238[] = $row238['SMT'];
//         }
//         $query239 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber239' AND year = '$month_date239'" );
//         $month239 = array();
//   $month239[] = ""; 
//         while($row239 = $query239->fetch_assoc()){
//           $month239[] = $row239['SMT'];
//         }
//         $query240 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber240' AND year = '$month_date240'" );
//         $month240 = array();
//   $month240[] = ""; 
//         while($row240 = $query240->fetch_assoc()){
//           $month240[] = $row240['SMT'];
//         }
      
//         $third_month_avg9= array();
//         $month_final110 = array_merge($month237,$month238,$month239,$month240);
//         $third_month_avg9[] = array_sum($month_final110)/4;
  
//   //       //eleven month
//         $dto->modify('-7 days');
//       $ret241 = $dto->format('Y-m-d');
//       $month_date241 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret242 = $dto->format('Y-m-d');
//       $month_date242 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret243 = $dto->format('Y-m-d');
//       $month_date243 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret244 = $dto->format('Y-m-d');
//       $month_date244 = $dto->format('Y');
      
//       $date241 = new DateTime($ret241);
//       $weeknumber241 = $date241->format("W");
      
//       $date242 = new DateTime($ret242);
//       $weeknumber242 = $date242->format("W");
      
//       $date243 = new DateTime($ret243);
//       $weeknumber243 = $date243->format("W");
      
//       $date244 = new DateTime($ret244);
//       $weeknumber244 = $date244->format("W");
      
      
//       $query241 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber241' AND year = '$month_date241'" );
//       $month241 = array();
//       $month241[] = "";   
//       while($row241 = $query241->fetch_assoc()){
//           $month241[] = $row241['SMT'];
//         }
//         $query242 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber242' AND year = '$month_date242'" );
//         $month242 = array();
//         $month242[] = ""; 
//         while($row242 = $query242->fetch_assoc()){
//           $month242[] = $row242['SMT'];
//         }
//         $query243 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber243' AND year = '$month_date243'" );
//         $month243 = array();
//         $month243[] = ""; 
//         while($row243 = $query243->fetch_assoc()){
//           $month243[] = $row243['SMT'];
//         }
//         $query244 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber244' AND year = '$month_date244'" );
//         $month244 = array();
//         $month244[] = ""; 
//         while($row244 = $query244->fetch_assoc()){
//           $month244[] = $row244['SMT'];
//         }
      
//         $third_month_avg10= array();
//         $month_final111 = array_merge($month241,$month242,$month243,$month244);
//         $third_month_avg10[] = array_sum($month_final111)/4;
        
//   //       //twelvw month
//         $dto->modify('-7 days');
//         $ret245 = $dto->format('Y-m-d');
//         $month_date245 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret246 = $dto->format('Y-m-d');
//         $month_date246 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret247 = $dto->format('Y-m-d');
//         $month_date247 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret248 = $dto->format('Y-m-d');
//         $month_date248 = $dto->format('Y');
        
//         $date245 = new DateTime($ret245);
//         $weeknumber245 = $date245->format("W");
        
//         $date246 = new DateTime($ret246);
//         $weeknumber246 = $date246->format("W");
        
//         $date247 = new DateTime($ret247);
//         $weeknumber247 = $date247->format("W");
        
//         $date248 = new DateTime($ret248);
//         $weeknumber248 = $date248->format("W");
        
        
//         $query245 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber245' AND year = '$month_date245'" );
//         $month245 = array();
//   $month245[] = "";   
//         while($row245 = $query245->fetch_assoc()){
//             $month245[] = $row245['SMT'];
//           }
//           $query246 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber246' AND year = '$month_date246'" );
//           $month246 = array();
//   $month246[] = ""; 
//           while($row246 = $query246->fetch_assoc()){
//             $month246[] = $row246['SMT'];
//           }
//           $query247 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber247' AND year = '$month_date247'" );
//           $month247 = array();
//   $month247[] = ""; 
//           while($row247 = $query247->fetch_assoc()){
//             $month247[] = $row247['SMT'];
//           }
//           $query248 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber248' AND year = '$month_date248'" );
//           $month248 = array();
//   $month248[] = ""; 
//           while($row248 = $query248->fetch_assoc()){
//             $month248[] = $row248['SMT'];
//           }
        
//           $third_month_avg11= array();
//           $month_final112 = array_merge($month245,$month246,$month247,$month248);
//           $third_month_avg11[] = array_sum($month_final112)/4;
  
//           //extra month
//           $dto->modify('-7 days');
//           $ret_245 = $dto->format('Y-m-d');
//           $month_date_245 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret_246 = $dto->format('Y-m-d');
//           $month_date_246 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret_247 = $dto->format('Y-m-d');
//           $month_date_247 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret_248 = $dto->format('Y-m-d');
//           $month_date_248 = $dto->format('Y');
          
//           $date_245 = new DateTime($ret_245);
//           $weeknumber_245 = $date_245->format("W");
          
//           $date_246 = new DateTime($ret_246);
//           $weeknumber_246 = $date_246->format("W");
          
//           $date_247 = new DateTime($ret_247);
//           $weeknumber_247 = $date_247->format("W");
          
//           $date_248 = new DateTime($ret_248);
//           $weeknumber_248 = $date_248->format("W");
          
          
//           $query_245 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_245' AND year = '$month_date_245'" );
//           $month_245 = array();
//     $month_245[] = "";   
//           while($row_245 = $query_245->fetch_assoc()){
//               $month_245[] = $row_245['SMT'];
//             }
//             $query_246 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_246' AND year = '$month_date_246'" );
//             $month_246 = array();
//     $month_246[] = ""; 
//             while($row_246 = $query_246->fetch_assoc()){
//               $month_246[] = $row_246['SMT'];
//             }
//             $query_247 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_247' AND year = '$month_date_247'" );
//             $month_247 = array();
//     $month_247[] = ""; 
//             while($row247 = $query_247->fetch_assoc()){
//               $month_247[] = $row247['SMT'];
//             }
//             $query_248 =$con->query("SELECT SMT  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_248' AND year = '$month_date_248'" );
//             $month_248 = array();
//     $month_248[] = ""; 
//             while($row_248 = $query_248->fetch_assoc()){
//               $month_248[] = $row_248['SMT'];
//             }
          
//             $third_month_avg_11= array();
//             $month_final_113 = array_merge($month_245,$month_246,$month_247,$month_248);
//             $third_month_avg_11[] = array_sum($month_final_113)/4;
  
//           $one_month_date = array();
//           $second_month_date =array();
//           $third_month_date = array();

  
//           $one_month_date[] = strval($one_monthly);
//           $second_month_date[] = strval($second_monthly);
//           $third_month_date[] = strval($third_monthly);

  
//           $date_array = array_merge($third_month_date,$second_month_date,$one_month_date);
          
//           $final_month_array_avg = array_merge($extra_month_avg,$twelve_month_avg,$eleven_month_avg,$ten_month_avg,$nine_month_avg,$eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
//           // echo $final_month_array_avg;
  
//           $final_month_array = array();
//           $final_month_array[] = array_sum($final_month_array_avg)/count($final_month_array_avg);
  
//           $final_month_array_avg1 = array_merge($second_year_avg,$second_year_avg1,$second_year_avg2,$second_year_avg3,$second_year_avg4,$second_year_avg5,$second_year_avg6,$second_year_avg7,$second_year_avg8,$second_year_avg9,$second_year_avg10,$second_year_avg11,$second_year_avg_11);
  
//           // // echo $final_month_array_avg1;
  
//           $final_month_array1 = array();
//           $final_month_array1[] = array_sum($final_month_array_avg1)/count($final_month_array_avg1);
  
//           $final_month_array_avg2 = array_merge($third_month_avg,$third_month_avg1,$third_month_avg2,$third_month_avg3,$third_month_avg4,$third_month_avg5,$third_month_avg6,$third_month_avg7,$third_month_avg8,$third_month_avg9,$third_month_avg10,$third_month_avg11,$third_month_avg_11);
  
//           $final_month_array2 = array();
//           $final_month_array2[] = array_sum($final_month_array_avg2)/count($final_month_array_avg2);
//           $yearly_month_array =array();
//           $yearly_month_array = array_merge($final_month_array2,$final_month_array1,$final_month_array);
  
//     $return_data = array();
//     $return_data['yearly_month_array'] =$yearly_month_array;
//     $return_data['date_array'] =$date_array;
//     echo json_encode($return_data);
  
  
// }
// elseif($period_id === 'last 3 year' && $per_id === "TCI"){
//     $dto = new DateTime();
//   $dto->setISODate($year,$week);
//   $ret = $dto->format('Y-m-d');
//   $month_date1 = $dto->format('Y');
//   $one_monthly =date("Y - M",strtotime($ret));

//   $dto->modify('-7 days');
//   $ret2 = $dto->format('Y-m-d');
//   $month_date2 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret3 = $dto->format('Y-m-d');
//   $month_date3 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret4 = $dto->format('Y-m-d');
//   $month_date4 = $dto->format('Y');
  
//   $date = new DateTime($ret2);
//   $weeknumber1 = $date->format("W");
  
//   $date2 = new DateTime($ret3);
//   $weeknumber2 = $date2->format("W");
  
//   $date3 = new DateTime($ret4);
//   $weeknumber3 = $date3->format("W");
  
//     $query1 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$week' AND year = '$year'" );
//     $month1 = array();
//     $month1[] = "";
//     while($row1 = $query1->fetch_assoc()){
//       $month1[] = $row1['TCI'];
//     }
  
//   $query2 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
//   $month2 = array();
//   $month2[] = "";
//     while($row2 = $query2->fetch_assoc()){
//       $month2[] = $row2['TCI'];
//     }
  
//     $query3 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
//     $month3 = array();
//     $month3[] = "";
//     while($row3 = $query3->fetch_assoc()){
//       $month3[] = $row3['TCI'];
//     }
  
//     $query4 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
//     $month4 = array();
//     $month4[] = "";
//     while($row4 = $query4->fetch_assoc()){
//       $month4[] = $row4['TCI'];
//     }
  
//   $one_month_avg=array();
//    $month_final1 = array_merge($month4,$month3,$month2,$month1);
//    $one_month_avg[] = array_sum($month_final1)/4;
  
//    // ------------------------------------------------------------------------------------//
  
//    // second month
//   $dto->modify('-7 days');
//   $ret5 = $dto->format('Y-m-d');
//   $month_date5 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret6 = $dto->format('Y-m-d');
//   $month_date6 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret7 = $dto->format('Y-m-d');
//   $month_date7 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret8 = $dto->format('Y-m-d');
//   $month_date8 = $dto->format('Y');
  
//   $date4 = new DateTime($ret5);
//   $weeknumber4 = $date4->format("W");
  
//   $date5 = new DateTime($ret6);
//   $weeknumber5 = $date5->format("W");
  
//   $date6 = new DateTime($ret7);
//   $weeknumber6 = $date6->format("W");
  
//   $date7 = new DateTime($ret8);
//   $weeknumber7 = $date7->format("W");
  
//   $query5 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$month_date5'" );
//   $month5 =array();
//   $month5[] = '';  
//   while($row5 = $query5->fetch_assoc()){
//       $month5[] = $row5['TCI'];
//     }
//     // echo json_encode($month5);
//     $query6 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
//     $month6 = array();
//     $month6[] = "";
//     while($row6 = $query6->fetch_assoc()){
//       $month6[] = $row6['TCI'];
//     }
//     $query7 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
//     $month7 = array();
//     $month7[] = "";
//     while($row7 = $query7->fetch_assoc()){
//       $month7[] = $row7['TCI'];
//     }
//     $query8 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
//     $month8 = array();
//     $month8[] = "";
//     while($row8 = $query8->fetch_assoc()){
//       $month8[] = $row8['TCI'];
//     }
  
//     $second_month_avg= array();
//     $month_final2 = array_merge($month5,$month6,$month7,$month8);
//     $second_month_avg[] = array_sum($month_final2)/4;
  
//   //-------------------------------------------------------------------------------------------------------
//     //Third month
  
//   $dto->modify('-7 days');
//   $ret9 = $dto->format('Y-m-d');
//   $month_date9 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret10 = $dto->format('Y-m-d');
//   $month_date10 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret11 = $dto->format('Y-m-d');
//   $month_date11 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret12 = $dto->format('Y-m-d');
//   $month_date12 = $dto->format('Y');
  
//   $date9 = new DateTime($ret9);
//   $weeknumber9 = $date9->format("W");
  
//   $date10 = new DateTime($ret10);
//   $weeknumber10 = $date10->format("W");
  
//   $date11 = new DateTime($ret11);
//   $weeknumber11 = $date11->format("W");
  
//   $date12 = new DateTime($ret12);
//   $weeknumber12 = $date12->format("W");
  
  
//   $query9 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber9' AND year = '$month_date9'" );
//   $month9 = array();
//     $month9[] = "";  
//   while($row9 = $query9->fetch_assoc()){
//       $month9[] = $row9['TCI'];
//     }
//     $query10 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
//     $month10 = array();
//     $month10[] = "";
//     while($row10 = $query10->fetch_assoc()){
//       $month10[] = $row10['TCI'];
//     }
//     $query11 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
//     $month11 = array();
//     $month11[] = "";
//     while($row11 = $query11->fetch_assoc()){
//       $month11[] = $row11['TCI'];
//     }
//     $query12 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
//     $month12 = array();
//     $month12[] = "";
//     while($row12 = $query12->fetch_assoc()){
//       $month12[] = $row12['TCI'];
//     }
  
//     $third_month_avg= array();
//     $month_final3 = array_merge($month9,$month10,$month11,$month12);
//     $third_month_avg[] = array_sum($month_final3)/4;
  
//      /* ============================================================================================*/
//      //four month
  
//   $dto->modify('-7 days');
//   $ret13 = $dto->format('Y-m-d');
//   $month_date13 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret14 = $dto->format('Y-m-d');
//   $month_date14 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret15 = $dto->format('Y-m-d');
//   $month_date15 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret16 = $dto->format('Y-m-d');
//   $month_date16 = $dto->format('Y');
  
//   $date13 = new DateTime($ret13);
//   $weeknumber13 = $date13->format("W");
  
//   $date14 = new DateTime($ret14);
//   $weeknumber14 = $date14->format("W");
  
//   $date15 = new DateTime($ret15);
//   $weeknumber15 = $date15->format("W");
  
//   $date16 = new DateTime($ret16);
//   $weeknumber16 = $date16->format("W");
  
  
//   $query13 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber13' AND year = '$month_date13'" );
//   $month13 = array();
//   $month13[] = "";
//     while($row13 = $query13->fetch_assoc()){
//       $month13[] = $row13['TCI'];
//     }
//     // echo json_encode($month13);
//     $query14 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
//     $month14 = array();
//     $month14[] = "";
//     while($row14 = $query14->fetch_assoc()){
//       $month14[] = $row14['TCI'];
//     }
//     $query15 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
//     $month15 = array();
//     $month15[] = "";
//     while($row15 = $query15->fetch_assoc()){
//       $month15[] = $row15['TCI'];
//     }
//     $query16 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
//     $month16 = array();
//     $month16[] = "";
//     while($row16 = $query16->fetch_assoc()){
//       $month16[] = $row16['TCI'];
//     }
  
//     $four_month_avg= array();
//     $month_final4 = array_merge($month13,$month14,$month15,$month16);
//     $four_month_avg[] = array_sum($month_final4)/4;
  
//     /*============================================================================*/
//     // five month
//     $dto->modify('-7 days');
//   $ret17 = $dto->format('Y-m-d');
//   $month_date17 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret18 = $dto->format('Y-m-d');
//   $month_date18 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret19 = $dto->format('Y-m-d');
//   $month_date19 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret20 = $dto->format('Y-m-d');
//   $month_date20 = $dto->format('Y');
  
//   $date17 = new DateTime($ret17);
//   $weeknumber17 = $date17->format("W");
  
//   $date18 = new DateTime($ret18);
//   $weeknumber18 = $date18->format("W");
  
//   $date19 = new DateTime($ret19);
//   $weeknumber19 = $date19->format("W");
  
//   $date20 = new DateTime($ret20);
//   $weeknumber20 = $date20->format("W");
  
  
//   $query17 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber17' AND year = '$month_date17'" );
//   $month17 = array();
//     $month17[] = "";  
//   while($row17 = $query17->fetch_assoc()){
//       $month17[] = $row17['TCI'];
//     }
//     $query18 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
//     $month18 = array();
//     $month18[] = "";
//     while($row18 = $query18->fetch_assoc()){
//       $month18[] = $row18['TCI'];
//     }
//     $query19 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
//     $month19 = array();
//     $month19[] = "";
//     while($row19 = $query19->fetch_assoc()){
//       $month19[] = $row19['TCI'];
//     }
//     $query20 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
//     $month20 = array();
//     $month20[] = "";
//     while($row20 = $query20->fetch_assoc()){
//       $month20[] = $row20['TCI'];
//     }
  
//     $five_month_avg= array();
//     $month_final5 = array_merge($month17,$month18,$month19,$month20);
//     $five_month_avg[] = array_sum($month_final5)/4;
  
//   /*--------------------------------------------------------------------------------------------*/
//   //six month
//   $dto->modify('-7 days');
//   $ret21 = $dto->format('Y-m-d');
//   $month_date21 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret22 = $dto->format('Y-m-d');
//   $month_date22 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret23 = $dto->format('Y-m-d');
//   $month_date23 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret24 = $dto->format('Y-m-d');
//   $month_date24 = $dto->format('Y');
  
//   $date21 = new DateTime($ret21);
//   $weeknumber21 = $date21->format("W");
  
//   $date22 = new DateTime($ret22);
//   $weeknumber22 = $date22->format("W");
  
//   $date23 = new DateTime($ret23);
//   $weeknumber23 = $date23->format("W");
  
//   $date24 = new DateTime($ret24);
//   $weeknumber24 = $date24->format("W");
  
  
//   $query21 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber21' AND year = '$month_date21'" );
//   $month21 = array();
//     $month21[] = "";  
//   while($row21 = $query21->fetch_assoc()){
//       $month21[] = $row21['TCI'];
//     }
//     $query22 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
//     $month22 = array();
//     $month22[] = "";
//     while($row22 = $query22->fetch_assoc()){
//       $month22[] = $row22['TCI'];
//     }
//     $query23 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
//     $month23 = array();
//     $month23[] = "";
//     while($row23 = $query23->fetch_assoc()){
//       $month23[] = $row23['TCI'];
//     }
//     $query24 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
//     $month24 = array();
//     $month24[] = "";
//     while($row24 = $query24->fetch_assoc()){
//       $month24[] = $row24['TCI'];
//     }
  
//     $six_month_avg= array();
//     $month_final6 = array_merge($month21,$month22,$month23,$month24);
//     $six_month_avg[] = array_sum($month_final6)/4;
  
//   //seven month
//   $dto->modify('-7 days');
//   $ret25 = $dto->format('Y-m-d');
//   $month_date25 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret26 = $dto->format('Y-m-d');
//   $month_date26 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret27 = $dto->format('Y-m-d');
//   $month_date27 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret28 = $dto->format('Y-m-d');
//   $month_date28 = $dto->format('Y');
  
//   $date25 = new DateTime($ret25);
//   $weeknumber25 = $date25->format("W");
  
//   $date26 = new DateTime($ret26);
//   $weeknumber26 = $date26->format("W");
  
//   $date27 = new DateTime($ret27);
//   $weeknumber27 = $date27->format("W");
  
//   $date28 = new DateTime($ret28);
//   $weeknumber28 = $date28->format("W");
  
  
//   $query25 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber25' AND year = '$month_date25'" );
//   $month25 = array();
//     $month25[] = "";  
//   while($row25 = $query25->fetch_assoc()){
//       $month25[] = $row25['TCI'];
//     }
//     $query26 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber26' AND year = '$month_date26'" );
//     $month26 = array();
//     $month26[] = "";
//     while($row26 = $query26->fetch_assoc()){
//       $month26[] = $row26['TCI'];
//     }
//     $query27 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber27' AND year = '$month_date27'" );
//     $month27 = array();
//     $month27[] = "";
//     while($row27 = $query27->fetch_assoc()){
//       $month27[] = $row27['TCI'];
//     }
//     $query28 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber28' AND year = '$month_date28'" );
//     $month28 = array();
//     $month28[] = "";
//     while($row28 = $query28->fetch_assoc()){
//       $month28[] = $row28['TCI'];
//     }
  
//     $seven_month_avg= array();
//     $month_final7 = array_merge($month25,$month26,$month27,$month28);
//     $seven_month_avg[] = array_sum($month_final7)/4;
  
//   //eight month
  
//   $dto->modify('-7 days');
//   $ret29 = $dto->format('Y-m-d');
//   $month_date29 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret30 = $dto->format('Y-m-d');
//   $month_date30 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret31 = $dto->format('Y-m-d');
//   $month_date31 = $dto->format('Y');
  
//   $dto->modify('-7 days');
//   $ret32 = $dto->format('Y-m-d');
//   $month_date32 = $dto->format('Y');
  
//   $date29 = new DateTime($ret29);
//   $weeknumber29 = $date29->format("W");
  
//   $date30 = new DateTime($ret30);
//   $weeknumber30 = $date30->format("W");
  
//   $date31 = new DateTime($ret31);
//   $weeknumber31 = $date31->format("W");
  
//   $date32 = new DateTime($ret32);
//   $weeknumber32 = $date32->format("W");
  
  
//   $query29 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber29' AND year = '$month_date29'" );
//   $month29 = array();
//     $month29[] = "";  
//   while($row29 = $query29->fetch_assoc()){
//       $month29[] = $row29['TCI'];
//     }
//     $query30 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber30' AND year = '$month_date30'" );
//     $month30 = array();
//     $month30[] = "";
//     while($row30 = $query30->fetch_assoc()){
//       $month30[] = $row30['TCI'];
//     }
//     $query31 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber31' AND year = '$month_date31'" );
//     $month31 = array();
//     $month31[] = "";
//     while($row31 = $query31->fetch_assoc()){
//       $month31[] = $row31['TCI'];
//     }
//     $query32 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber32' AND year = '$month_date32'" );
//     $month32 = array();
//     $month32[] = "";
//     while($row32 = $query32->fetch_assoc()){
//       $month32[] = $row32['TCI'];
//     }
  
//     $eight_month_avg= array();
//     $month_final8 = array_merge($month29,$month30,$month31,$month32);
//     $eight_month_avg[] = array_sum($month_final8)/4;
  
  
//       // $one_month_date = array();
//       // $second_month_date =array();
//       // $third_month_date = array();
//       // $four_month_date = array();
//       // $five_month_date = array();
//       // $six_month_date = array();
//       // $seven_month_date = array();
//       // $eight_month_date = array();
//       // $nine_month_date = array();
  
//       // $one_month_date[] = strval($ret);
//       // $second_month_date[] = strval($ret5);
//       // $third_month_date[] = strval($ret9);
//       // $four_month_date[] = strval($ret13);
//       // $five_month_date[] = strval($ret17);
//       // $six_month_date[] = strval($ret21);
//       // $seven_month_date[] = strval($ret25);
//       // $eight_month_date[] = strval($ret29);
//       // $nine_month_date[] = strval($ret21);
  
  
//       // $date_array = array_merge($eight_month_date,$seven_month_date,$six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
//       // $final_month_array = array_merge($eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
  
//       //nine month 
//       $dto->modify('-7 days');
//       $ret33 = $dto->format('Y-m-d');
//       $month_date33 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret34 = $dto->format('Y-m-d');
//       $month_date34 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret35 = $dto->format('Y-m-d');
//       $month_date35 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret36 = $dto->format('Y-m-d');
//       $month_date36 = $dto->format('Y');
      
//       $date33 = new DateTime($ret33);
//       $weeknumber33 = $date33->format("W");
      
//       $date34 = new DateTime($ret34);
//       $weeknumber34 = $date34->format("W");
      
//       $date35 = new DateTime($ret35);
//       $weeknumber35 = $date35->format("W");
      
//       $date36 = new DateTime($ret36);
//       $weeknumber36 = $date36->format("W");
      
      
//       $query33 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber33' AND year = '$month_date33'" );
//       $month33 = array();
//     $month33[] = "";  
//       while($row33 = $query33->fetch_assoc()){
//           $month33[] = $row33['TCI'];
//         }
//         $query34 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber34' AND year = '$month_date34'" );
//         $month34 = array();
//     $month34[] = "";
//         while($row34 = $query34->fetch_assoc()){
//           $month34[] = $row34['TCI'];
//         }
//         $query35 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber35' AND year = '$month_date35'" );
//         $month35 = array();
//     $month35[] = "";
//         while($row35 = $query35->fetch_assoc()){
//           $month35[] = $row35['TCI'];
//         }
//         $query36 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber36' AND year = '$month_date36'" );
//         $month36 = array();
//     $month36[] = "";
//         while($row36 = $query36->fetch_assoc()){
//           $month36[] = $row36['TCI'];
//         }
      
//         $nine_month_avg= array();
//         $month_final9 = array_merge($month33,$month34,$month35,$month36);
//         $nine_month_avg[] = array_sum($month_final9)/4;
      
//    //ten month
//    $dto->modify('-7 days');
//       $ret37 = $dto->format('Y-m-d');
//       $month_date37 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret38 = $dto->format('Y-m-d');
//       $month_date38 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret39 = $dto->format('Y-m-d');
//       $month_date39 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret40 = $dto->format('Y-m-d');
//       $month_date40 = $dto->format('Y');
      
//       $date37 = new DateTime($ret37);
//       $weeknumber37 = $date37->format("W");
      
//       $date38 = new DateTime($ret38);
//       $weeknumber38 = $date38->format("W");
      
//       $date39 = new DateTime($ret39);
//       $weeknumber39 = $date39->format("W");
      
//       $date40 = new DateTime($ret40);
//       $weeknumber40 = $date40->format("W");
      
      
//       $query37 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber37' AND year = '$month_date37'" );
//       $month37 = array();
//     $month37[] = "";  
//       while($row37 = $query37->fetch_assoc()){
//           $month37[] = $row37['TCI'];
//         }
//         $query38 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber38' AND year = '$month_date38'" );
//         $month38 = array();
//         $month38[] = "";
//         while($row38 = $query38->fetch_assoc()){
//           $month38[] = $row38['TCI'];
//         }
//         $query39 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber39' AND year = '$month_date39'" );
//         $month39 = array();
//         $month39[] = "";
//         while($row39 = $query39->fetch_assoc()){
//           $month39[] = $row39['TCI'];
//         }
//         $query40 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber40' AND year = '$month_date40'" );
//         $month40 = array();
//         $month40[] = "";
//         while($row40 = $query40->fetch_assoc()){
//           $month40[] = $row40['TCI'];
//         }
      
//         $ten_month_avg= array();
//         $month_final10 = array_merge($month37,$month38,$month39,$month40);
//         $ten_month_avg[] = array_sum($month_final10)/4;
        
//     //eleven month
//     $dto->modify('-7 days');
//     $ret41 = $dto->format('Y-m-d');
//     $month_date41 = $dto->format('Y');
    
//     $dto->modify('-7 days');
//     $ret42 = $dto->format('Y-m-d');
//     $month_date42 = $dto->format('Y');
    
//     $dto->modify('-7 days');
//     $ret43 = $dto->format('Y-m-d');
//     $month_date43 = $dto->format('Y');
    
//     $dto->modify('-7 days');
//     $ret44 = $dto->format('Y-m-d');
//     $month_date44 = $dto->format('Y');
    
//     $date41 = new DateTime($ret41);
//     $weeknumber41 = $date41->format("W");
    
//     $date42 = new DateTime($ret42);
//     $weeknumber42 = $date42->format("W");
    
//     $date43 = new DateTime($ret43);
//     $weeknumber43 = $date43->format("W");
    
//     $date44 = new DateTime($ret44);
//     $weeknumber44 = $date44->format("W");
    
    
//     $query41 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber41' AND year = '$month_date41'" );
//     $month41 = array();
//     $month41[] = "";  
//     while($row41 = $query41->fetch_assoc()){
//         $month41[] = $row41['TCI'];
//       }
//       $query42 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber42' AND year = '$month_date42'" );
//       $month42 = array();
//     $month42[] = "";
//       while($row42 = $query42->fetch_assoc()){
//         $month42[] = $row42['TCI'];
//       }
//       $query43 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber43' AND year = '$month_date43'" );
//       $month43 = array();
//     $month43[] = "";
//       while($row43 = $query43->fetch_assoc()){
//         $month43[] = $row43['TCI'];
//       }
//       $query44 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber44' AND year = '$month_date44'" );
//       $month44 = array();
//     $month44[] = "";
//       while($row44 = $query44->fetch_assoc()){
//         $month44[] = $row44['TCI'];
//       }
    
//       $eleven_month_avg= array();
//       $month_final11 = array_merge($month41,$month42,$month43,$month44);
//       $eleven_month_avg[] = array_sum($month_final11)/4;
  
//       //tewlve month
//       $dto->modify('-7 days');
//       $ret45 = $dto->format('Y-m-d');
//       $month_date45 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret46 = $dto->format('Y-m-d');
//       $month_date46 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret47 = $dto->format('Y-m-d');
//       $month_date47 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret48 = $dto->format('Y-m-d');
//       $month_date48 = $dto->format('Y');
      
//       $date45 = new DateTime($ret45);
//       $weeknumber45 = $date45->format("W");
      
//       $date46 = new DateTime($ret46);
//       $weeknumber46 = $date46->format("W");
      
//       $date47 = new DateTime($ret47);
//       $weeknumber47 = $date47->format("W");
      
//       $date48 = new DateTime($ret48);
//       $weeknumber48 = $date48->format("W");
      
      
//       $query45 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber45' AND year = '$month_date45'" );
//       $month45 = array();
//     $month45[] = "";  
//       while($row45 = $query45->fetch_assoc()){
//           $month45[] = $row45['TCI'];
//         }
//         $query46 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber46' AND year = '$month_date46'" );
//         $month46 = array();
//     $month46[] = "";
//         while($row46 = $query46->fetch_assoc()){
//           $month46[] = $row46['TCI'];
//         }
//         $query47 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber47' AND year = '$month_date47'" );
//         $month47 = array();
//     $month47[] = "";
//         while($row47 = $query47->fetch_assoc()){
//           $month47[] = $row47['TCI'];
//         }
//         $query48 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber48' AND year = '$month_date48'" );
//         $month48 = array();
//     $month48[] = "";
//         while($row48 = $query48->fetch_assoc()){
//           $month48[] = $row48['TCI'];
//         }
      
//         $twelve_month_avg= array();
//         $month_final12 = array_merge($month45,$month46,$month47,$month48);
//         $twelve_month_avg[] = array_sum($month_final12)/4;
        
//     //extra month
//     $dto->modify('-7 days');
//       $ret49 = $dto->format('Y-m-d');
//        $month_date49 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret50 = $dto->format('Y-m-d');
//       $month_date50 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret51 = $dto->format('Y-m-d');
//       $month_date51 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret52 = $dto->format('Y-m-d');
//       $month_date52 = $dto->format('Y');
      
//       $date49 = new DateTime($ret49);
//       $weeknumber49 = $date49->format("W");
      
//       $date50 = new DateTime($ret50);
//       $weeknumber50 = $date50->format("W");
      
//       $date51 = new DateTime($ret51);
//       $weeknumber51 = $date51->format("W");
      
//       $date52 = new DateTime($ret52);
//       $weeknumber52 = $date52->format("W");
      
      
//       $query49 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber49' AND year = '$month_date49'" );
//       $month49 = array();
//     $month49[] = "";  
//       while($row_49 = $query49->fetch_assoc()){
//           $month49[] = $row_49['TCI'];
//         }
//         //  json_encode($month49);
//         $query50 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber50' AND year = '$month_date50'" );
//         $month50 = array();
//     $month50[] = "";
//         while($row_50 = $query50->fetch_assoc()){
//           $month50[] = $row_50['TCI'];
//         }
//         //  json_encode($month50);
//         $query51 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber51' AND year = '$month_date51'" );
//         $month51 = array();
//     $month51[] = "";
//         while($row_51 = $query51->fetch_assoc()){
//           $month51[] = $row_51['TCI'];
//         }
//         //  json_encode($month51);
//         $query52 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber52' AND year = '$month_date52'" );
//         $month52 = array();
//     $month52[] = "";
//         while($row_52 = $query52->fetch_assoc()){
//           $month52[] = $row_52['TCI'];
//         }
//         //  json_encode($month52);
//         $extra_month_avg= array();
//         // $month_final13 = array();
//         $month_final13 = array_merge($month49,$month50,$month51,$month52);
//          $extra_month_avg[] = array_sum($month_final13)/4;
  
  
//         //second year 
//         //one month
//         $dto->modify('-7 days');
//         $ret53 = $dto->format('Y-m-d');
//         $month_date53 = $dto->format('Y');
//         $second_monthly =date("Y - M",strtotime($ret53));

//         $dto->modify('-7 days');
//         $ret54 = $dto->format('Y-m-d');
//         $month_date54 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret55 = $dto->format('Y-m-d');
//         $month_date55 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret56 = $dto->format('Y-m-d');
//         $month_date56 = $dto->format('Y');
        
//         $date53 = new DateTime($ret53);
//         $weeknumber53 = $date53->format("W");
        
//         $date54 = new DateTime($ret54);
//         $weeknumber54 = $date54->format("W");
        
//         $date55 = new DateTime($ret55);
//         $weeknumber55 = $date55->format("W");
        
//         $date56 = new DateTime($ret56);
//         $weeknumber56 = $date56->format("W");
        
        
//         $query53 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber53' AND year = '$month_date53'" );
//         $month53 = array();
//         $month53[] = "";  
//         while($row53 = $query53->fetch_assoc()){
//             $month53[] = $row53['TCI'];
//           }
//           $query54 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber54' AND year = '$month_date54'" );
//           $month54 = array();
//           $month54[] = "";
//           while($row54 = $query54->fetch_assoc()){
//             $month54[] = $row54['TCI'];
//           }
//           $query55 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber55' AND year = '$month_date55'" );
//           $month55 = array();
//           $month55[] = "";
//           while($row55 = $query55->fetch_assoc()){
//             $month55[] = $row55['TCI'];
//           }
//           $query56 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber56' AND year = '$month_date56'" );
//           $month56 = array();
//           $month56[] = "";
//           while($row56 = $query56->fetch_assoc()){
//             $month56[] = $row56['TCI'];
//           }
        
//           $second_year_avg= array();
//           $month_final14 = array_merge($month53,$month54,$month55,$month56);
//           $second_year_avg[] = array_sum($month_final14)/4;
  
//           //second month
//           $dto->modify('-7 days');
//       $ret57 = $dto->format('Y-m-d');
//       $month_date57 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret58 = $dto->format('Y-m-d');
//       $month_date58 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret59 = $dto->format('Y-m-d');
//       $month_date59 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret60 = $dto->format('Y-m-d');
//       $month_date60 = $dto->format('Y');
      
//       $date57 = new DateTime($ret57);
//       $weeknumber57 = $date57->format("W");
      
//       $date58 = new DateTime($ret58);
//       $weeknumber58 = $date58->format("W");
      
//       $date59 = new DateTime($ret59);
//       $weeknumber59 = $date59->format("W");
      
//       $date60 = new DateTime($ret60);
//       $weeknumber60 = $date60->format("W");
      
      
//       $query57 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber57' AND year = '$month_date57'" );
//       $month57 = array();
//       $month57[] = "";  
//       while($row57 = $query57->fetch_assoc()){
//           $month57[] = $row57['TCI'];
//         }
//         $query58 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber58' AND year = '$month_date58'" );
//         $month58 = array();
//         $month58[] = "";
//         while($row58 = $query58->fetch_assoc()){
//           $month58[] = $row58['TCI'];
//         }
//         $query59 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber59' AND year = '$month_date59'" );
//         $month59 = array();
//         $month59[] = "";
//         while($row59 = $query59->fetch_assoc()){
//           $month59[] = $row59['TCI'];
//         }
//         $query60 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber60' AND year = '$month_date60'" );
//         $month60 = array();
//         $month60[] = "";
//         while($row60 = $query60->fetch_assoc()){
//           $month60[] = $row60['TCI'];
//         }
      
//         $second_year_avg1= array();
//         $month_final15 = array_merge($month57,$month58,$month59,$month60);
//         $second_year_avg1[] = array_sum($month_final15)/4;
  
//         //thrid month
//         $dto->modify('-7 days');
//       $ret61 = $dto->format('Y-m-d');
//       $month_date61 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret62 = $dto->format('Y-m-d');
//       $month_date62 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret63 = $dto->format('Y-m-d');
//       $month_date63 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret64 = $dto->format('Y-m-d');
//       $month_date64 = $dto->format('Y');
      
//       $date61 = new DateTime($ret61);
//       $weeknumber61 = $date61->format("W");
      
//       $date62 = new DateTime($ret62);
//       $weeknumber62 = $date62->format("W");
      
//       $date63 = new DateTime($ret63);
//       $weeknumber63 = $date63->format("W");
      
//       $date64 = new DateTime($ret64);
//       $weeknumber64 = $date64->format("W");
      
      
//       $query61 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber61' AND year = '$month_date61'" );
//       $month61 = array();
//       $month61[] = "";  
//       while($row61 = $query61->fetch_assoc()){
//           $month61[] = $row61['TCI'];
//         }
//         $query62 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber62' AND year = '$month_date62'" );
//         $month62 = array();
//         $month62[] = "";
//         while($row62 = $query62->fetch_assoc()){
//           $month62[] = $row62['TCI'];
//         }
//         $query63 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber63' AND year = '$month_date63'" );
//         $month63 = array();
//         $month63[] = "";
//         while($row63 = $query63->fetch_assoc()){
//           $month63[] = $row63['TCI'];
//         }
//         $query64 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber64' AND year = '$month_date64'" );
//         $month64 = array();
//         $month64[] = "";
//         while($row64 = $query64->fetch_assoc()){
//           $month64[] = $row64['TCI'];
//         }
      
//         $second_year_avg2= array();
//         $month_final16 = array_merge($month61,$month62,$month63,$month64);
//         $second_year_avg2[] = array_sum($month_final16)/4;
  
//         //four month
//         $dto->modify('-7 days');
//       $ret65 = $dto->format('Y-m-d');
//       $month_date65 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret66 = $dto->format('Y-m-d');
//       $month_date66 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret67 = $dto->format('Y-m-d');
//       $month_date67 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret68 = $dto->format('Y-m-d');
//       $month_date68 = $dto->format('Y');
      
//       $date65 = new DateTime($ret65);
//       $weeknumber65 = $date65->format("W");
      
//       $date66 = new DateTime($ret66);
//       $weeknumber66 = $date66->format("W");
      
//       $date67 = new DateTime($ret67);
//       $weeknumber67 = $date67->format("W");
      
//       $date68 = new DateTime($ret68);
//       $weeknumber68 = $date68->format("W");
      
      
//       $query65 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber65' AND year = '$month_date65'" );
//       $month65 = array();
//       $month65[] = "";  
//       while($row65 = $query65->fetch_assoc()){
//           $month65[] = $row65['TCI'];
//         }
//         $query66 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber66' AND year = '$month_date66'" );
//         $month66 = array();
//         $month66[] = "";
//         while($row66 = $query66->fetch_assoc()){
//           $month66[] = $row66['TCI'];
//         }
//         $query67 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber67' AND year = '$month_date67'" );
//         $month67 = array();
//         $month67[] = "";
//         while($row67 = $query67->fetch_assoc()){
//           $month67[] = $row67['TCI'];
//         }
//         $query68 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber68' AND year = '$month_date68'" );
//         $month68 = array();
//         $month68[] = "";
//         while($row68 = $query68->fetch_assoc()){
//           $month68[] = $row68['TCI'];
//         }
      
//         $second_year_avg3= array();
//         $month_final17 = array_merge($month65,$month66,$month67,$month68);
//         $second_year_avg3[] = array_sum($month_final17)/4;
  
//         //five month
//         $dto->modify('-7 days');
//       $ret69 = $dto->format('Y-m-d');
//       $month_date69 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret70 = $dto->format('Y-m-d');
//       $month_date70 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret71 = $dto->format('Y-m-d');
//       $month_date71 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret72 = $dto->format('Y-m-d');
//       $month_date72 = $dto->format('Y');
      
//       $date69 = new DateTime($ret69);
//       $weeknumber69 = $date69->format("W");
      
//       $date70 = new DateTime($ret70);
//       $weeknumber70 = $date70->format("W");
      
//       $date71 = new DateTime($ret71);
//       $weeknumber71 = $date71->format("W");
      
//       $date72 = new DateTime($ret72);
//       $weeknumber72 = $date72->format("W");
      
      
//       $query69 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber69' AND year = '$month_date69'" );
//       $month69 = array();
//       $month69[] = "";  
//       while($row69 = $query69->fetch_assoc()){
//           $month69[] = $row69['TCI'];
//         }
//         $query70 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber70' AND year = '$month_date70'" );
//         $month70 = array();
//         $month70[] = "";
//         while($row70 = $query70->fetch_assoc()){
//           $month70[] = $row70['TCI'];
//         }
//         $query71 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber71' AND year = '$month_date71'" );
//         $month71 = array();
//         $month71[] = "";
//         while($row71 = $query71->fetch_assoc()){
//           $month71[] = $row71['TCI'];
//         }
//         $query72 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber72' AND year = '$month_date72'" );
//         $month72 = array();
//         $month72[] = "";
//         while($row72 = $query72->fetch_assoc()){
//           $month72[] = $row72['TCI'];
//         }
      
//         $second_year_avg4= array();
//         $month_final18 = array_merge($month69,$month70,$month71,$month72);
//         $second_year_avg4[] = array_sum($month_final18)/4;
  
//         //six month
//         $dto->modify('-7 days');
//       $ret73 = $dto->format('Y-m-d');
//       $month_date73 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret74 = $dto->format('Y-m-d');
//       $month_date74 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret75 = $dto->format('Y-m-d');
//       $month_date75 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret76 = $dto->format('Y-m-d');
//       $month_date76 = $dto->format('Y');
      
//       $date73 = new DateTime($ret73);
//       $weeknumber73 = $date73->format("W");
      
//       $date74 = new DateTime($ret74);
//       $weeknumber74 = $date74->format("W");
      
//       $date75 = new DateTime($ret75);
//       $weeknumber75 = $date75->format("W");
      
//       $date76 = new DateTime($ret76);
//       $weeknumber76 = $date76->format("W");
      
      
//       $query73 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber73' AND year = '$month_date73'" );
//       $month73 = array();
//       $month73[] = "";  
//       while($row73 = $query73->fetch_assoc()){
//           $month73[] = $row73['TCI'];
//         }
//         $query74 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber74' AND year = '$month_date74'" );
//         $month74 = array();
//         $month74[] = "";
//         while($row74 = $query74->fetch_assoc()){
//           $month74[] = $row74['TCI'];
//         }
//         $query75 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber75' AND year = '$month_date75'" );
//         $month75 = array();
//         $month75[] = "";
//         while($row75 = $query75->fetch_assoc()){
//           $month75[] = $row75['TCI'];
//         }
//         $query76 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber76' AND year = '$month_date76'" );
//         $month76 = array();
//         $month76[] = "";
//         while($row76 = $query76->fetch_assoc()){
//           $month76[] = $row76['TCI'];
//         }
      
//         $second_year_avg5= array();
//         $month_final19 = array_merge($month73,$month74,$month75,$month76);
//         $second_year_avg5[] = array_sum($month_final19)/4;
        
//         //seven month
//         $dto->modify('-7 days');
//       $ret77 = $dto->format('Y-m-d');
//       $month_date77 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret78 = $dto->format('Y-m-d');
//       $month_date78 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret79 = $dto->format('Y-m-d');
//       $month_date79 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret80 = $dto->format('Y-m-d');
//       $month_date80 = $dto->format('Y');
      
//       $date77 = new DateTime($ret77);
//       $weeknumber77 = $date77->format("W");
      
//       $date78 = new DateTime($ret78);
//       $weeknumber78 = $date78->format("W");
      
//       $date79 = new DateTime($ret79);
//       $weeknumber79 = $date79->format("W");
      
//       $date80 = new DateTime($ret80);
//       $weeknumber80 = $date80->format("W");
      
      
//       $query77 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber77' AND year = '$month_date77'" );
//       $month77 = array();
//       $month77[] = "";  
//       while($row77 = $query77->fetch_assoc()){
//           $month77[] = $row77['TCI'];
//         }
//         $query78 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber78' AND year = '$month_date78'" );
//         $month78 = array();
//         $month78[] = "";
//         while($row78 = $query78->fetch_assoc()){
//           $month78[] = $row78['TCI'];
//         }
//         $query79 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber79' AND year = '$month_date79'" );
//         $month79 = array();
//         $month79[] = "";
//         while($row79 = $query79->fetch_assoc()){
//           $month79[] = $row79['TCI'];
//         }
//         $query80 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber80' AND year = '$month_date80'" );
//         $month80 = array();
//         $month80[] = "";
//         while($row80 = $query80->fetch_assoc()){
//           $month80[] = $row80['TCI'];
//         }
      
//         $second_year_avg6= array();
//         $month_final20 = array_merge($month77,$month78,$month79,$month80);
//         $second_year_avg6[] = array_sum($month_final20)/4;
  
//         //eigth month
//         $dto->modify('-7 days');
//       $ret81 = $dto->format('Y-m-d');
//       $month_date81 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret82 = $dto->format('Y-m-d');
//       $month_date82 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret83 = $dto->format('Y-m-d');
//       $month_date83 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret84 = $dto->format('Y-m-d');
//       $month_date84 = $dto->format('Y');
      
//       $date81 = new DateTime($ret81);
//       $weeknumber81 = $date81->format("W");
      
//       $date82 = new DateTime($ret82);
//       $weeknumber82 = $date82->format("W");
      
//       $date83 = new DateTime($ret83);
//       $weeknumber83 = $date83->format("W");
      
//       $date84 = new DateTime($ret84);
//       $weeknumber84 = $date84->format("W");
      
      
//       $query81 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber81' AND year = '$month_date81'" );
//       $month81 = array();
//       $month81[] = "";  
//       while($row81 = $query81->fetch_assoc()){
//           $month81[] = $row81['TCI'];
//         }
//         $query82 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber82' AND year = '$month_date82'" );
//         $month82 = array();
//         $month82[] = "";
//         while($row82 = $query82->fetch_assoc()){
//           $month82[] = $row82['TCI'];
//         }
//         $query83 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber83' AND year = '$month_date83'" );
//         $month83 = array();
//         $month83[] = "";
//         while($row83 = $query83->fetch_assoc()){
//           $month83[] = $row83['TCI'];
//         }
//         $query84 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber84' AND year = '$month_date84'" );
//         $month84 = array();
//         $month84[] = "";
//         while($row84 = $query84->fetch_assoc()){
//           $month84[] = $row84['TCI'];
//         }
      
//         $second_year_avg7= array();
//         $month_final21 = array_merge($month81,$month82,$month83,$month84);
//         $second_year_avg7[] = array_sum($month_final21)/4;
  
//         //nine month
//         $dto->modify('-7 days');
//       $ret85 = $dto->format('Y-m-d');
//       $month_date85 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret86 = $dto->format('Y-m-d');
//       $month_date86 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret87 = $dto->format('Y-m-d');
//       $month_date87 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret88 = $dto->format('Y-m-d');
//       $month_date88 = $dto->format('Y');
      
//       $date85 = new DateTime($ret85);
//       $weeknumber85 = $date85->format("W");
      
//       $date86 = new DateTime($ret86);
//       $weeknumber86 = $date86->format("W");
      
//       $date87 = new DateTime($ret87);
//       $weeknumber87 = $date87->format("W");
      
//       $date88 = new DateTime($ret88);
//       $weeknumber88 = $date88->format("W");
      
      
//       $query85 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber85' AND year = '$month_date85'" );
//       $month85 = array();
//       $month85[] = "";  
//       while($row85 = $query85->fetch_assoc()){
//           $month85[] = $row85['TCI'];
//         }
//         $query86 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber86' AND year = '$month_date86'" );
//         $month86 = array();
//         $month86[] = "";
//         while($row86 = $query86->fetch_assoc()){
//           $month86[] = $row86['TCI'];
//         }
//         $query87 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber87' AND year = '$month_date87'" );
//         $month87 = array();
//         $month87[] = "";
//         while($row87 = $query87->fetch_assoc()){
//           $month87[] = $row87['TCI'];
//         }
//         $query88 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber88' AND year = '$month_date88'" );
//         $month88 = array();
//         $month88[] = "";
//         while($row88 = $query88->fetch_assoc()){
//           $month88[] = $row88['TCI'];
//         }
      
//         $second_year_avg8= array();
//         $month_final22 = array_merge($month85,$month86,$month87,$month88);
//         $second_year_avg8[] = array_sum($month_final22)/4;
  
//         //ten month
//         $dto->modify('-7 days');
//       $ret89 = $dto->format('Y-m-d');
//       $month_date89 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret90 = $dto->format('Y-m-d');
//       $month_date90 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret91 = $dto->format('Y-m-d');
//       $month_date91 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret92 = $dto->format('Y-m-d');
//       $month_date92 = $dto->format('Y');
      
//       $date89 = new DateTime($ret89);
//       $weeknumber89 = $date89->format("W");
      
//       $date90 = new DateTime($ret90);
//       $weeknumber90 = $date90->format("W");
      
//       $date91 = new DateTime($ret91);
//       $weeknumber91 = $date91->format("W");
      
//       $date92 = new DateTime($ret92);
//       $weeknumber92 = $date92->format("W");
      
      
//       $query89 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber89' AND year = '$month_date89'" );
//       $month89 = array();
//       $month89[] = "";  
//       while($row89 = $query89->fetch_assoc()){
//           $month89[] = $row89['TCI'];
//         }
//         $query90 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber90' AND year = '$month_date90'" );
//         $month90 = array();
//         $month90[] = "";
//         while($row90 = $query90->fetch_assoc()){
//           $month90[] = $row90['TCI'];
//         }
//         $query91 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber91' AND year = '$month_date91'" );
//         $month91 = array();
//         $month91[] = "";
//         while($row91 = $query91->fetch_assoc()){
//           $month91[] = $row91['TCI'];
//         }
//         $query92 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber92' AND year = '$month_date92'" );
//         $month92 = array();
//         $month92[] = "";
//         while($row92 = $query92->fetch_assoc()){
//           $month92[] = $row92['TCI'];
//         }
      
//         $second_year_avg9= array();
//         $month_final23 = array_merge($month89,$month90,$month91,$month92);
//         $second_year_avg9[] = array_sum($month_final23)/4;
  
//         //eleven month
//         $dto->modify('-7 days');
//       $ret93 = $dto->format('Y-m-d');
//       $month_date93 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret94 = $dto->format('Y-m-d');
//       $month_date94 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret95 = $dto->format('Y-m-d');
//       $month_date95 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret96 = $dto->format('Y-m-d');
//       $month_date96 = $dto->format('Y');
      
//       $date93 = new DateTime($ret93);
//       $weeknumber93 = $date93->format("W");
      
//       $date94 = new DateTime($ret94);
//       $weeknumber94 = $date94->format("W");
      
//       $date95 = new DateTime($ret95);
//       $weeknumber95 = $date95->format("W");
      
//       $date96 = new DateTime($ret96);
//       $weeknumber96 = $date96->format("W");
      
      
//       $query93 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber93' AND year = '$month_date93'" );
//       $month93 = array();
//       $month93[] = "";  
//       while($row93 = $query93->fetch_assoc()){
//           $month93[] = $row93['TCI'];
//         }
//         $query94 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber94' AND year = '$month_date94'" );
//         $month94 = array();
//         $month94[] = "";
//         while($row94 = $query94->fetch_assoc()){
//           $month94[] = $row94['TCI'];
//         }
//         $query95 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber95' AND year = '$month_date95'" );
//         $month95 = array();
//         $month95[] = "";
//         while($row95 = $query95->fetch_assoc()){
//           $month95[] = $row95['TCI'];
//         }
//         $query96 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber96' AND year = '$month_date96'" );
//         $month96 = array();
//         $month96[] = "";
//         while($row96 = $query96->fetch_assoc()){
//           $month96[] = $row96['TCI'];
//         }
      
//         $second_year_avg10= array();
//         $month_final24 = array_merge($month93,$month94,$month95,$month96);
//         $second_year_avg10[] = array_sum($month_final24)/4;
  
//         //tweleve month
//         $dto->modify('-7 days');
//       $ret97 = $dto->format('Y-m-d');
//       $month_date97 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret98 = $dto->format('Y-m-d');
//       $month_date98 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret99 = $dto->format('Y-m-d');
//       $month_date99 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret100 = $dto->format('Y-m-d');
//       $month_date100 = $dto->format('Y');
      
//       $date97 = new DateTime($ret97);
//       $weeknumber97 = $date97->format("W");
      
//       $date98 = new DateTime($ret98);
//       $weeknumber98 = $date98->format("W");
      
//       $date99 = new DateTime($ret99);
//       $weeknumber99 = $date99->format("W");
      
//       $date100 = new DateTime($ret100);
//       $weeknumber100 = $date100->format("W");
      
      
//       $query97 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber97' AND year = '$month_date97'" );
//       $month97 = array();
//       $month97[] = "";  
//       while($row97 = $query97->fetch_assoc()){
//           $month97[] = $row97['TCI'];
//         }
//         $query98 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber98' AND year = '$month_date98'" );
//         $month98 = array();
//         $month98[] = "";
//         while($row98 = $query98->fetch_assoc()){
//           $month98[] = $row98['TCI'];
//         }
//         $query99 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber99' AND year = '$month_date99'" );
//         $month99 = array();
//         $month99[] = "";
//         while($row99 = $query99->fetch_assoc()){
//           $month99[] = $row99['TCI'];
//         }
//         $query100 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber100' AND year = '$month_date100'" );
//         $month100 = array();
//         $month100[] = "";
//         while($row100 = $query100->fetch_assoc()){
//           $month100[] = $row100['TCI'];
//         }
      
//         $second_year_avg11= array();
//         $month_final25 = array_merge($month97,$month98,$month99,$month100);
//         $second_year_avg11[] = array_sum($month_final25)/4;
  
//         //extra month
//         $dto->modify('-7 days');
//       $ret_97 = $dto->format('Y-m-d');
//       $month_date_97 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret_98 = $dto->format('Y-m-d');
//       $month_date_98 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret_99 = $dto->format('Y-m-d');
//       $month_date_99 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret_100 = $dto->format('Y-m-d');
//       $month_date_100 = $dto->format('Y');
      
//       $date_97 = new DateTime($ret_97);
//       $weeknumber_97 = $date_97->format("W");
      
//       $date_98 = new DateTime($ret_98);
//       $weeknumber_98 = $date_98->format("W");
      
//       $date_99 = new DateTime($ret_99);
//       $weeknumber_99 = $date_99->format("W");
      
//       $date_100 = new DateTime($ret_100);
//       $weeknumber_100 = $date_100->format("W");
      
      
//       $query_97 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_97' AND year = '$month_date_97'" );
//       $month_97 = array();
//       $month_97[] = "";  
//       while($row_97 = $query_97->fetch_assoc()){
//           $month_97[] = $row_97['TCI'];
//         }
//         $query_98 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_98' AND year = '$month_date_98'" );
//         $month_98 = array();
//         $month_98[] = "";
//         while($row_98 = $query_98->fetch_assoc()){
//           $month_98[] = $row_98['TCI'];
//         }
//         $query_99 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_99' AND year = '$month_date_99'" );
//         $month_99 = array();
//         $month_99[] = "";
//         while($row_99 = $query_99->fetch_assoc()){
//           $month_99[] = $row_99['TCI'];
//         }
//         $query_100 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_100' AND year = '$month_date_100'" );
//         $month_100 = array();
//         $month_100[] = "";
//         while($row_100 = $query_100->fetch_assoc()){
//           $month_100[] = $row_100['TCI'];
//         }
      
//         $second_year_avg_11= array();
//         $month_final_25 = array_merge($month_97,$month_98,$month_99,$month_100);
//         $second_year_avg_11[] = array_sum($month_final_25)/4;
  
  
//         //third year
//         //one month
//         $dto->modify('-7 days');
//       $ret101 = $dto->format('Y-m-d');
//       $month_date101 = $dto->format('Y');
//       $third_monthly =date("Y - M",strtotime($ret101));

//       $dto->modify('-7 days');
//       $ret102 = $dto->format('Y-m-d');
//       $month_date102 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret103 = $dto->format('Y-m-d');
//       $month_date103 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret104 = $dto->format('Y-m-d');
//       $month_date104 = $dto->format('Y');
      
//       $date101 = new DateTime($ret101);
//       $weeknumber101 = $date101->format("W");
      
//       $date102 = new DateTime($ret102);
//       $weeknumber102 = $date102->format("W");
      
//       $date103 = new DateTime($ret103);
//       $weeknumber103 = $date103->format("W");
      
//       $date104 = new DateTime($ret104);
//       $weeknumber104 = $date104->format("W");
      
      
//   $query101 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber101' AND year = '$month_date101'" );
//   $month101 = array();
//   $month101[] = "";      
//   while($row101 = $query101->fetch_assoc()){
//           $month101[] = $row101['TCI'];
//         }
//       $query102 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber102' AND year = '$month_date102'" );
//       $month102 = array();
//   $month102[] = "";    
//       while($row102 = $query102->fetch_assoc()){
//           $month102[] = $row102['TCI'];
//         }
//       $query103 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber103' AND year = '$month_date103'" );
//       $month103 = array();
//   $month103[] = "";    
//       while($row103 = $query103->fetch_assoc()){
//           $month103[] = $row103['TCI'];
//         }
//       $query104 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber104' AND year = '$month_date104'" );
//       $month104 = array();
//   $month104[] = "";    
//       while($row104 = $query104->fetch_assoc()){
//           $month104[] = $row104['TCI'];
//         }
      
//         $third_month_avg= array();
//         $month_final101 = array_merge($month101,$month102,$month103,$month104);
//         $third_month_avg[] = array_sum($month_final101)/4;
  
//         //second month
//         $dto->modify('-7 days');
//         $ret105 = $dto->format('Y-m-d');
//         $month_date105 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret106 = $dto->format('Y-m-d');
//         $month_date106 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret107 = $dto->format('Y-m-d');
//         $month_date107 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret108 = $dto->format('Y-m-d');
//         $month_date108 = $dto->format('Y');
        
//         $date105 = new DateTime($ret105);
//         $weeknumber105 = $date105->format("W");
   
//         $date106 = new DateTime($ret106);
//         $weeknumber106 = $date106->format("W");
        
//         $date107 = new DateTime($ret107);
//         $weeknumber107 = $date107->format("W");
        
//         $date108 = new DateTime($ret108);
//         $weeknumber108 = $date108->format("W");
        
        
//     $query105 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber105' AND year = '$month_date105'" );
//     $month105 = array();
//   $month105[] = "";        
//     while($row105 = $query105->fetch_assoc()){
//             $month105[] = $row105['TCI'];
//           }
//         $query106 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber106' AND year = '$month_date106'" );
//         $month106 = array();
//   $month106[] = "";    
//         while($row106 = $query106->fetch_assoc()){
//             $month106[] = $row106['TCI'];
//           }
//         $query107 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber107' AND year = '$month_date107'" );
//         $month107 = array();
//   $month107[] = "";    
//         while($row107 = $query107->fetch_assoc()){
//             $month107[] = $row107['TCI'];
//           }
//         $query108 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber108' AND year = '$month_date108'" );
//         $month108 = array();
//   $month108[] = "";    
//         while($row108 = $query108->fetch_assoc()){
//             $month108[] = $row108['TCI'];
//           }
        
//           $third_month_avg1= array();
//           $month_final102 = array_merge($month105,$month106,$month107,$month108);
//           $third_month_avg1[] = array_sum($month_final102)/4;
  
//           //third month
//           $dto->modify('-7 days');
//           $ret109 = $dto->format('Y-m-d');
//           $month_date109 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret110 = $dto->format('Y-m-d');
//           $month_date110 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret111 = $dto->format('Y-m-d');
//           $month_date111 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret112 = $dto->format('Y-m-d');
//           $month_date112 = $dto->format('Y');
          
//           $date109 = new DateTime($ret109);
//           $weeknumber109 = $date109->format("W");
          
//           $date110 = new DateTime($ret110);
//           $weeknumber110 = $date110->format("W");
          
//           $date111 = new DateTime($ret111);
//           $weeknumber111 = $date111->format("W");
          
//            $date112 = new DateTime($ret112);
//          $weeknumber112 = $date112->format("W");
          
          
//       $query109 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber109' AND year = '$month_date109'" );
//       $month109 = array();
//   $month109[] = "";        
//       while($row109 = $query109->fetch_assoc()){
//               $month109[] = $row109['TCI'];
//             }
//           $query110 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber110' AND year = '$month_date110'" );
//           $month110 = array();
//   $month110[] = "";   
//           while($row110 = $query110->fetch_assoc()){
//               $month110[] = $row110['TCI'];
//             }
//           $query111 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber111' AND year = '$month_date111'" );
//           $month111 = array();
//   $month111[] = "";    
//           while($row111 = $query111->fetch_assoc()){
//               $month111[] = $row111['TCI'];
//             }
//           $query112 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber112' AND year = '$month_date112'" );
//           $month112 = array();
//   $month112[] = "";    
//           while($row112 = $query112->fetch_assoc()){
//               $month112[] = $row112['TCI'];
//             }
          
//             $third_month_avg2= array();
//             $month_final103 = array_merge($month109,$month110,$month111,$month112);
//             $third_month_avg2[] = array_sum($month_final103)/4;
//         //four month
//         $dto->modify('-7 days');
//       $ret113 = $dto->format('Y-m-d');
//       $month_date113 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret114 = $dto->format('Y-m-d');
//       $month_date114 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret115 = $dto->format('Y-m-d');
//       $month_date115 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret116 = $dto->format('Y-m-d');
//       $month_date116 = $dto->format('Y');
      
//       $date113 = new DateTime($ret113);
//        $weeknumber113 = $date113->format("W");
      
//       $date114 = new DateTime($ret114);
//       $weeknumber114 = $date114->format("W");
      
//       $date115 = new DateTime($ret115);
//       $weeknumber115 = $date115->format("W");
      
//       $date116 = new DateTime($ret116);
//       $weeknumber116 = $date116->format("W");
      
      
//   $query113 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber113' AND year = '$month_date113'" );
//   $month113 = array();
//   $month113[] = "";        
//   while($row113 = $query113->fetch_assoc()){
//           $month113[] = $row113['TCI'];
//         }
//         // echo json_encode($month113);
//       $query114 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber114' AND year = '$month_date114'" );
//       $month114 = array();
//   $month114[] = "";    
//       while($row114 = $query114->fetch_assoc()){
//           $month114[] = $row114['TCI'];
//         }
//       $query115 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber115' AND year = '$month_date115'" );
//       $month115 = array();
//   $month115[] = "";    
//       while($row115 = $query115->fetch_assoc()){
//           $month115[] = $row115['TCI'];
//         }
//       $query116 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber116' AND year = '$month_date116'" );
//       $month116 = array();
//   $month116[] = "";    
//       while($row116 = $query116->fetch_assoc()){
//           $month116[] = $row116['TCI'];
//         }
      
//         $third_month_avg3= array();
//         $month_final104 = array_merge($month113,$month114,$month115,$month116);
//         $third_month_avg3[] = array_sum($month_final104)/4;
  
//         //five month
//         $dto->modify('-7 days');
//       $ret117 = $dto->format('Y-m-d');
//       $month_date117 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret118 = $dto->format('Y-m-d');
//       $month_date118 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret119 = $dto->format('Y-m-d');
//       $month_date119 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret120 = $dto->format('Y-m-d');
//       $month_date120 = $dto->format('Y');
      
//       $date117 = new DateTime($ret117);
//      $weeknumber117 = $date117->format("W");
      
//       $date118 = new DateTime($ret118);
//       $weeknumber118 = $date118->format("W");
      
//       $date119 = new DateTime($ret119);
//       $weeknumber119 = $date119->format("W");
      
//       $date120 = new DateTime($ret120);
//       $weeknumber120 = $date120->format("W");
      
      
//       $query117 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber117' AND year = '$month_date117'" );
//       $month117 = array();
//   $month117[] = "";    
//       while($row117 = $query117->fetch_assoc()){
//           $month117[] = $row117['TCI'];
//         }
//         $query118 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber118' AND year = '$month_date118'" );
//         $month118 = array();
//   $month118[] = "";  
//         while($row118 = $query118->fetch_assoc()){
//           $month118[] = $row118['TCI'];
//         }
//         $query119 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber119' AND year = '$month_date119'" );
//         $month119 = array();
//   $month119[] = "";  
//         while($row119 = $query119->fetch_assoc()){
//           $month119[] = $row119['TCI'];
//         }
//         $query120 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber120' AND year = '$month_date120'" );
//         $month120 = array();
//   $month120[] = "";  
//         while($row120 = $query120->fetch_assoc()){
//           $month120[] = $row120['TCI'];
//         }
      
//         $third_month_avg4= array();
//         $month_final105 = array_merge($month117,$month118,$month119,$month120);
//         $third_month_avg4[] = array_sum($month_final105)/4;
  
//   //       //six month
//         $dto->modify('-7 days');
//       $ret221 = $dto->format('Y-m-d');
//       $month_date221 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret222 = $dto->format('Y-m-d');
//       $month_date222 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret223 = $dto->format('Y-m-d');
//       $month_date223 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret224 = $dto->format('Y-m-d');
//       $month_date224 = $dto->format('Y');
      
//       $date221 = new DateTime($ret221);
//       $weeknumber221 = $date221->format("W");
      
//       $date222 = new DateTime($ret222);
//       $weeknumber222 = $date222->format("W");
      
//       $date223 = new DateTime($ret223);
//       $weeknumber223 = $date223->format("W");
      
//       $date224 = new DateTime($ret224);
//       $weeknumber224 = $date224->format("W");
      
      
//       $query221 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber221' AND year = '$month_date221'" );
//       $month221 = array();
//   $month221[] = "";    
//       while($row221 = $query221->fetch_assoc()){
//           $month221[] = $row221['TCI'];
//         }
//         $query222 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber222' AND year = '$month_date222'" );
//         $month222 = array();
//   $month222[] = ""; 
//         while($row222 = $query222->fetch_assoc()){
//           $month222[] = $row222['TCI'];
//         }
//         $query223 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber223' AND year = '$month_date223'" );
//         $month223 = array();
//   $month223[] = ""; 
//         while($row223 = $query223->fetch_assoc()){
//           $month223[] = $row223['TCI'];
//         }
//         $query224 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber224' AND year = '$month_date224'" );
//         $month224 = array();
//   $month224[] = ""; 
//         while($row224 = $query224->fetch_assoc()){
//           $month224[] = $row224['TCI'];
//         }
      
//         $third_month_avg5= array();
//         $month_final106 = array_merge($month221,$month222,$month223,$month224);
//         $third_month_avg5[] = array_sum($month_final106)/4;
  
//   // //       //seven month
//         $dto->modify('-7 days');
//       $ret225 = $dto->format('Y-m-d');
//       $month_date225 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret226 = $dto->format('Y-m-d');
//       $month_date226 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret227 = $dto->format('Y-m-d');
//       $month_date227 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret228 = $dto->format('Y-m-d');
//       $month_date228 = $dto->format('Y');
      
//       $date225 = new DateTime($ret225);
//       $weeknumber225 = $date225->format("W");
      
//       $date226 = new DateTime($ret226);
//       $weeknumber226 = $date226->format("W");
      
//       $date227 = new DateTime($ret227);
//       $weeknumber227 = $date227->format("W");
      
//       $date228 = new DateTime($ret228);
//       $weeknumber228 = $date228->format("W");
      
      
//       $query225 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber225' AND year = '$month_date225'" );
//       $month225 = array();
//   $month225[] = "";   
//       while($row225 = $query225->fetch_assoc()){
//           $month225[] = $row225['TCI'];
//         }
//         $query226 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber226' AND year = '$month_date226'" );
//         $month226 = array();
//   $month226[] = ""; 
//         while($row226 = $query226->fetch_assoc()){
//           $month226[] = $row226['TCI'];
//         }
//         $query227 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber227' AND year = '$month_date227'" );
//         $month227 = array();
//   $month227[] = ""; 
//         while($row227 = $query227->fetch_assoc()){
//           $month227[] = $row227['TCI'];
//         }
//         $query228 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber228' AND year = '$month_date228'" );
//         $month228 = array();
//   $month228[] = ""; 
//         while($row228 = $query228->fetch_assoc()){
//           $month228[] = $row228['TCI'];
//         }
      
//         $third_month_avg6= array();
//         $month_final107 = array_merge($month225,$month226,$month227,$month228);
//         $third_month_avg6[] = array_sum($month_final107)/4;
//         //eight month
//         $dto->modify('-7 days');
//         $ret229 = $dto->format('Y-m-d');
//         $month_date229 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret230 = $dto->format('Y-m-d');
//         $month_date230 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret231 = $dto->format('Y-m-d');
//          $month_date231 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret232 = $dto->format('Y-m-d');
//         $month_date232 = $dto->format('Y');
        
//         $date229 = new DateTime($ret229);
//         $weeknumber229 = $date229->format("W");
        
//         $date230 = new DateTime($ret230);
//         $weeknumber230 = $date230->format("W");
        
//         $date231 = new DateTime($ret231);
//         $weeknumber231 = $date231->format("W");
        
//         $date232 = new DateTime($ret232);
//         $weeknumber232 = $date232->format("W");
        
        
//         $query229 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber229' AND year = '$month_date229'" );
//         $month229 = array();
//   $month229[] = "";   
//         while($row229 = $query229->fetch_assoc()){
//             $month229[] = $row229['TCI'];
//           }
//           $query230 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber230' AND year = '$month_date230'" );
//           $month230 = array();
//   $month230[] = ""; 
//           while($row230 = $query230->fetch_assoc()){
//             $month230[] = $row230['TCI'];
//           }
//           $query231 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber231' AND year = '$month_date231'" );
//           $month231 = array();
//   $month231[] = ""; 
//           while($row231 = $query231->fetch_assoc()){
//             $month231[] = $row231['TCI'];
//           }
//           $query232 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber232' AND year = '$month_date232'" );
//           $month232 = array();
//   $month232[] = ""; 
//           while($row232 = $query232->fetch_assoc()){
//             $month232[] = $row232['TCI'];
//           }
        
//           $third_month_avg7= array();
//           $month_final108 = array_merge($month229,$month230,$month231,$month232);
//           $third_month_avg7[] = array_sum($month_final108)/4;
  
//   //       //nine month
//         $dto->modify('-7 days');
//         $ret233 = $dto->format('Y-m-d');
//         $month_date233 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret234 = $dto->format('Y-m-d');
//         $month_date234 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret235 = $dto->format('Y-m-d');
//         $month_date235 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret236 = $dto->format('Y-m-d');
//         $month_date236 = $dto->format('Y');
        
//         $date233 = new DateTime($ret233);
//         $weeknumber233 = $date233->format("W");
        
//         $date234 = new DateTime($ret234);
//         $weeknumber234 = $date234->format("W");
        
//         $date235 = new DateTime($ret235);
//         $weeknumber235 = $date235->format("W");
        
//         $date236 = new DateTime($ret236);
//         $weeknumber236 = $date236->format("W");
        
        
//         $query233 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber233' AND year = '$month_date233'" );
//         $month233 = array();
//   $month233[] = "";   
//         while($row233 = $query233->fetch_assoc()){
//             $month233[] = $row233['TCI'];
//           }
//           $query234 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber234' AND year = '$month_date234'" );
//           $month234 = array();
//   $month234[] = ""; 
//           while($row234 = $query234->fetch_assoc()){
//             $month234[] = $row234['TCI'];
//           }
//           $query235 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber235' AND year = '$month_date235'" );
//           $month235 = array();
//   $month235[] = ""; 
//           while($row235 = $query235->fetch_assoc()){
//             $month235[] = $row235['TCI'];
//           }
//           $query236 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber236' AND year = '$month_date236'" );
//           $month236 = array();
//   $month236[] = ""; 
//           while($row236 = $query236->fetch_assoc()){
//             $month236[] = $row236['TCI'];
//           }
        
//           $third_month_avg8= array();
//           $month_final109 = array_merge($month233,$month234,$month235,$month236);
//           $third_month_avg8[] = array_sum($month_final109)/4;
  
//   // //ten month
//   $dto->modify('-7 days');
//       $ret237 = $dto->format('Y-m-d');
//       $month_date237 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret238 = $dto->format('Y-m-d');
//       $month_date238 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret239 = $dto->format('Y-m-d');
//       $month_date239 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret240 = $dto->format('Y-m-d');
//       $month_date240 = $dto->format('Y');
      
//       $date237 = new DateTime($ret237);
//       $weeknumber237 = $date237->format("W");
      
//       $date238 = new DateTime($ret238);
//       $weeknumber238 = $date238->format("W");
      
//       $date239 = new DateTime($ret239);
//       $weeknumber239 = $date239->format("W");
      
//       $date240 = new DateTime($ret240);
//       $weeknumber240 = $date240->format("W");
      
      
//       $query237 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber237' AND year = '$month_date237'" );
//       $month237 = array();
//   $month237[] = "";   
//       while($row237 = $query237->fetch_assoc()){
//           $month237[] = $row237['TCI'];
//         }
//         $query238 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber238' AND year = '$month_date238'" );
//         $month238 = array();
//   $month238[] = ""; 
//         while($row238 = $query238->fetch_assoc()){
//           $month238[] = $row238['TCI'];
//         }
//         $query239 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber239' AND year = '$month_date239'" );
//         $month239 = array();
//   $month239[] = ""; 
//         while($row239 = $query239->fetch_assoc()){
//           $month239[] = $row239['TCI'];
//         }
//         $query240 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber240' AND year = '$month_date240'" );
//         $month240 = array();
//   $month240[] = ""; 
//         while($row240 = $query240->fetch_assoc()){
//           $month240[] = $row240['TCI'];
//         }
      
//         $third_month_avg9= array();
//         $month_final110 = array_merge($month237,$month238,$month239,$month240);
//         $third_month_avg9[] = array_sum($month_final110)/4;
  
//   //       //eleven month
//         $dto->modify('-7 days');
//       $ret241 = $dto->format('Y-m-d');
//       $month_date241 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret242 = $dto->format('Y-m-d');
//       $month_date242 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret243 = $dto->format('Y-m-d');
//       $month_date243 = $dto->format('Y');
      
//       $dto->modify('-7 days');
//       $ret244 = $dto->format('Y-m-d');
//       $month_date244 = $dto->format('Y');
      
//       $date241 = new DateTime($ret241);
//       $weeknumber241 = $date241->format("W");
      
//       $date242 = new DateTime($ret242);
//       $weeknumber242 = $date242->format("W");
      
//       $date243 = new DateTime($ret243);
//       $weeknumber243 = $date243->format("W");
      
//       $date244 = new DateTime($ret244);
//       $weeknumber244 = $date244->format("W");
      
      
//       $query241 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber241' AND year = '$month_date241'" );
//       $month241 = array();
//       $month241[] = "";   
//       while($row241 = $query241->fetch_assoc()){
//           $month241[] = $row241['TCI'];
//         }
//         $query242 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber242' AND year = '$month_date242'" );
//         $month242 = array();
//         $month242[] = ""; 
//         while($row242 = $query242->fetch_assoc()){
//           $month242[] = $row242['TCI'];
//         }
//         $query243 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber243' AND year = '$month_date243'" );
//         $month243 = array();
//         $month243[] = ""; 
//         while($row243 = $query243->fetch_assoc()){
//           $month243[] = $row243['TCI'];
//         }
//         $query244 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber244' AND year = '$month_date244'" );
//         $month244 = array();
//         $month244[] = ""; 
//         while($row244 = $query244->fetch_assoc()){
//           $month244[] = $row244['TCI'];
//         }
      
//         $third_month_avg10= array();
//         $month_final111 = array_merge($month241,$month242,$month243,$month244);
//         $third_month_avg10[] = array_sum($month_final111)/4;
        
//   //       //twelvw month
//         $dto->modify('-7 days');
//         $ret245 = $dto->format('Y-m-d');
//         $month_date245 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret246 = $dto->format('Y-m-d');
//         $month_date246 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret247 = $dto->format('Y-m-d');
//         $month_date247 = $dto->format('Y');
        
//         $dto->modify('-7 days');
//         $ret248 = $dto->format('Y-m-d');
//         $month_date248 = $dto->format('Y');
        
//         $date245 = new DateTime($ret245);
//         $weeknumber245 = $date245->format("W");
        
//         $date246 = new DateTime($ret246);
//         $weeknumber246 = $date246->format("W");
        
//         $date247 = new DateTime($ret247);
//         $weeknumber247 = $date247->format("W");
        
//         $date248 = new DateTime($ret248);
//         $weeknumber248 = $date248->format("W");
        
        
//         $query245 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber245' AND year = '$month_date245'" );
//         $month245 = array();
//   $month245[] = "";   
//         while($row245 = $query245->fetch_assoc()){
//             $month245[] = $row245['TCI'];
//           }
//           $query246 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber246' AND year = '$month_date246'" );
//           $month246 = array();
//   $month246[] = ""; 
//           while($row246 = $query246->fetch_assoc()){
//             $month246[] = $row246['TCI'];
//           }
//           $query247 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber247' AND year = '$month_date247'" );
//           $month247 = array();
//   $month247[] = ""; 
//           while($row247 = $query247->fetch_assoc()){
//             $month247[] = $row247['TCI'];
//           }
//           $query248 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber248' AND year = '$month_date248'" );
//           $month248 = array();
//   $month248[] = ""; 
//           while($row248 = $query248->fetch_assoc()){
//             $month248[] = $row248['TCI'];
//           }
        
//           $third_month_avg11= array();
//           $month_final112 = array_merge($month245,$month246,$month247,$month248);
//           $third_month_avg11[] = array_sum($month_final112)/4;
  
//           //extra month
//           $dto->modify('-7 days');
//           $ret_245 = $dto->format('Y-m-d');
//           $month_date_245 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret_246 = $dto->format('Y-m-d');
//           $month_date_246 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret_247 = $dto->format('Y-m-d');
//           $month_date_247 = $dto->format('Y');
          
//           $dto->modify('-7 days');
//           $ret_248 = $dto->format('Y-m-d');
//           $month_date_248 = $dto->format('Y');
          
//           $date_245 = new DateTime($ret_245);
//           $weeknumber_245 = $date_245->format("W");
          
//           $date_246 = new DateTime($ret_246);
//           $weeknumber_246 = $date_246->format("W");
          
//           $date_247 = new DateTime($ret_247);
//           $weeknumber_247 = $date_247->format("W");
          
//           $date_248 = new DateTime($ret_248);
//           $weeknumber_248 = $date_248->format("W");
          
          
//           $query_245 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_245' AND year = '$month_date_245'" );
//           $month_245 = array();
//     $month_245[] = "";   
//           while($row_245 = $query_245->fetch_assoc()){
//               $month_245[] = $row_245['TCI'];
//             }
//             $query_246 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_246' AND year = '$month_date_246'" );
//             $month_246 = array();
//     $month_246[] = ""; 
//             while($row_246 = $query_246->fetch_assoc()){
//               $month_246[] = $row_246['TCI'];
//             }
//             $query_247 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_247' AND year = '$month_date_247'" );
//             $month_247 = array();
//     $month_247[] = ""; 
//             while($row247 = $query_247->fetch_assoc()){
//               $month_247[] = $row247['TCI'];
//             }
//             $query_248 =$con->query("SELECT TCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_248' AND year = '$month_date_248'" );
//             $month_248 = array();
//     $month_248[] = ""; 
//             while($row_248 = $query_248->fetch_assoc()){
//               $month_248[] = $row_248['TCI'];
//             }
          
//             $third_month_avg_11= array();
//             $month_final_113 = array_merge($month_245,$month_246,$month_247,$month_248);
//             $third_month_avg_11[] = array_sum($month_final_113)/4;
  
//           $one_month_date = array();
//           $second_month_date =array();
//           $third_month_date = array();

  
//         $one_month_date[] = strval($one_monthly);
//         $second_month_date[] = strval($second_monthly);
//         $third_month_date[] = strval($third_monthly);

  
//           $date_array = array_merge($third_month_date,$second_month_date,$one_month_date);
          
//           $final_month_array_avg = array_merge($extra_month_avg,$twelve_month_avg,$eleven_month_avg,$ten_month_avg,$nine_month_avg,$eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
//           // echo $final_month_array_avg;
  
//           $final_month_array = array();
//           $final_month_array[] = array_sum($final_month_array_avg)/count($final_month_array_avg);
  
//           $final_month_array_avg1 = array_merge($second_year_avg,$second_year_avg1,$second_year_avg2,$second_year_avg3,$second_year_avg4,$second_year_avg5,$second_year_avg6,$second_year_avg7,$second_year_avg8,$second_year_avg9,$second_year_avg10,$second_year_avg11,$second_year_avg_11);
  
//           // // echo $final_month_array_avg1;
  
//           $final_month_array1 = array();
//           $final_month_array1[] = array_sum($final_month_array_avg1)/count($final_month_array_avg1);
  
//           $final_month_array_avg2 = array_merge($third_month_avg,$third_month_avg1,$third_month_avg2,$third_month_avg3,$third_month_avg4,$third_month_avg5,$third_month_avg6,$third_month_avg7,$third_month_avg8,$third_month_avg9,$third_month_avg10,$third_month_avg11,$third_month_avg_11);
  
//           $final_month_array2 = array();
//           $final_month_array2[] = array_sum($final_month_array_avg2)/count($final_month_array_avg2);
//           $yearly_month_array =array();
//           $yearly_month_array = array_merge($final_month_array2,$final_month_array1,$final_month_array);
  
//     $return_data = array();
//     $return_data['yearly_month_array'] =$yearly_month_array;
//     $return_data['date_array'] =$date_array;
//     echo json_encode($return_data);
  
  
// }
  elseif($period_id === 'last 3 year' && $per_id === "VCI"){
    $dto = new DateTime();
  $dto->setISODate($year,$week);
  $ret = $dto->format('Y-m-d');
  $month_date1 = $dto->format('Y');
  $one_monthly =date("Y - M",strtotime($ret));

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
  
    $query1 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$week' AND year = '$year'" );
    $month1 = array();
    $month1[] = "";
    while($row1 = $query1->fetch_assoc()){
      $month1[] = $row1['VCI'];
    }
  
  $query2 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
  $month2 = array();
  $month2[] = "";
    while($row2 = $query2->fetch_assoc()){
      $month2[] = $row2['VCI'];
    }
  
    $query3 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
    $month3 = array();
    $month3[] = "";
    while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['VCI'];
    }
  
    $query4 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
    $month4 = array();
    $month4[] = "";
    while($row4 = $query4->fetch_assoc()){
      $month4[] = $row4['VCI'];
    }
  
  $one_month_avg=array();
   $month_final1 = array_merge($month4,$month3,$month2,$month1);
   $one_month_avg[] = array_sum($month_final1)/4;
  
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
  
  $query5 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$month_date5'" );
  $month5 =array();
  $month5[] = '';  
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['VCI'];
    }
    // echo json_encode($month5);
    $query6 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
    $month6 = array();
    $month6[] = "";
    while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['VCI'];
    }
    $query7 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
    $month7 = array();
    $month7[] = "";
    while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['VCI'];
    }
    $query8 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
    $month8 = array();
    $month8[] = "";
    while($row8 = $query8->fetch_assoc()){
      $month8[] = $row8['VCI'];
    }
  
    $second_month_avg= array();
    $month_final2 = array_merge($month5,$month6,$month7,$month8);
    $second_month_avg[] = array_sum($month_final2)/4;
  
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
  
  
  $query9 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber9' AND year = '$month_date9'" );
  $month9 = array();
    $month9[] = "";  
  while($row9 = $query9->fetch_assoc()){
      $month9[] = $row9['VCI'];
    }
    $query10 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
    $month10 = array();
    $month10[] = "";
    while($row10 = $query10->fetch_assoc()){
      $month10[] = $row10['VCI'];
    }
    $query11 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
    $month11 = array();
    $month11[] = "";
    while($row11 = $query11->fetch_assoc()){
      $month11[] = $row11['VCI'];
    }
    $query12 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
    $month12 = array();
    $month12[] = "";
    while($row12 = $query12->fetch_assoc()){
      $month12[] = $row12['VCI'];
    }
  
    $third_month_avg= array();
    $month_final3 = array_merge($month9,$month10,$month11,$month12);
    $third_month_avg[] = array_sum($month_final3)/4;
  
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
  
  
  $query13 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber13' AND year = '$month_date13'" );
  $month13 = array();
  $month13[] = "";
    while($row13 = $query13->fetch_assoc()){
      $month13[] = $row13['VCI'];
    }
    // echo json_encode($month13);
    $query14 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
    $month14 = array();
    $month14[] = "";
    while($row14 = $query14->fetch_assoc()){
      $month14[] = $row14['VCI'];
    }
    $query15 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
    $month15 = array();
    $month15[] = "";
    while($row15 = $query15->fetch_assoc()){
      $month15[] = $row15['VCI'];
    }
    $query16 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
    $month16 = array();
    $month16[] = "";
    while($row16 = $query16->fetch_assoc()){
      $month16[] = $row16['VCI'];
    }
  
    $four_month_avg= array();
    $month_final4 = array_merge($month13,$month14,$month15,$month16);
    $four_month_avg[] = array_sum($month_final4)/4;
  
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
  
  
  $query17 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber17' AND year = '$month_date17'" );
  $month17 = array();
    $month17[] = "";  
  while($row17 = $query17->fetch_assoc()){
      $month17[] = $row17['VCI'];
    }
    $query18 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
    $month18 = array();
    $month18[] = "";
    while($row18 = $query18->fetch_assoc()){
      $month18[] = $row18['VCI'];
    }
    $query19 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
    $month19 = array();
    $month19[] = "";
    while($row19 = $query19->fetch_assoc()){
      $month19[] = $row19['VCI'];
    }
    $query20 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
    $month20 = array();
    $month20[] = "";
    while($row20 = $query20->fetch_assoc()){
      $month20[] = $row20['VCI'];
    }
  
    $five_month_avg= array();
    $month_final5 = array_merge($month17,$month18,$month19,$month20);
    $five_month_avg[] = array_sum($month_final5)/4;
  
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
  
  
  $query21 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber21' AND year = '$month_date21'" );
  $month21 = array();
    $month21[] = "";  
  while($row21 = $query21->fetch_assoc()){
      $month21[] = $row21['VCI'];
    }
    $query22 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
    $month22 = array();
    $month22[] = "";
    while($row22 = $query22->fetch_assoc()){
      $month22[] = $row22['VCI'];
    }
    $query23 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
    $month23 = array();
    $month23[] = "";
    while($row23 = $query23->fetch_assoc()){
      $month23[] = $row23['VCI'];
    }
    $query24 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
    $month24 = array();
    $month24[] = "";
    while($row24 = $query24->fetch_assoc()){
      $month24[] = $row24['VCI'];
    }
  
    $six_month_avg= array();
    $month_final6 = array_merge($month21,$month22,$month23,$month24);
    $six_month_avg[] = array_sum($month_final6)/4;
  
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
  
  
  $query25 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber25' AND year = '$month_date25'" );
  $month25 = array();
    $month25[] = "";  
  while($row25 = $query25->fetch_assoc()){
      $month25[] = $row25['VCI'];
    }
    $query26 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber26' AND year = '$month_date26'" );
    $month26 = array();
    $month26[] = "";
    while($row26 = $query26->fetch_assoc()){
      $month26[] = $row26['VCI'];
    }
    $query27 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber27' AND year = '$month_date27'" );
    $month27 = array();
    $month27[] = "";
    while($row27 = $query27->fetch_assoc()){
      $month27[] = $row27['VCI'];
    }
    $query28 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber28' AND year = '$month_date28'" );
    $month28 = array();
    $month28[] = "";
    while($row28 = $query28->fetch_assoc()){
      $month28[] = $row28['VCI'];
    }
  
    $seven_month_avg= array();
    $month_final7 = array_merge($month25,$month26,$month27,$month28);
    $seven_month_avg[] = array_sum($month_final7)/4;
  
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
  
  
  $query29 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber29' AND year = '$month_date29'" );
  $month29 = array();
    $month29[] = "";  
  while($row29 = $query29->fetch_assoc()){
      $month29[] = $row29['VCI'];
    }
    $query30 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber30' AND year = '$month_date30'" );
    $month30 = array();
    $month30[] = "";
    while($row30 = $query30->fetch_assoc()){
      $month30[] = $row30['VCI'];
    }
    $query31 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber31' AND year = '$month_date31'" );
    $month31 = array();
    $month31[] = "";
    while($row31 = $query31->fetch_assoc()){
      $month31[] = $row31['VCI'];
    }
    $query32 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber32' AND year = '$month_date32'" );
    $month32 = array();
    $month32[] = "";
    while($row32 = $query32->fetch_assoc()){
      $month32[] = $row32['VCI'];
    }
  
    $eight_month_avg= array();
    $month_final8 = array_merge($month29,$month30,$month31,$month32);
    $eight_month_avg[] = array_sum($month_final8)/4;
  
  
      // $one_month_date = array();
      // $second_month_date =array();
      // $third_month_date = array();
      // $four_month_date = array();
      // $five_month_date = array();
      // $six_month_date = array();
      // $seven_month_date = array();
      // $eight_month_date = array();
      // $nine_month_date = array();
  
      // $one_month_date[] = strval($ret);
      // $second_month_date[] = strval($ret5);
      // $third_month_date[] = strval($ret9);
      // $four_month_date[] = strval($ret13);
      // $five_month_date[] = strval($ret17);
      // $six_month_date[] = strval($ret21);
      // $seven_month_date[] = strval($ret25);
      // $eight_month_date[] = strval($ret29);
      // $nine_month_date[] = strval($ret21);
  
  
      // $date_array = array_merge($eight_month_date,$seven_month_date,$six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
      // $final_month_array = array_merge($eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
  
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
      
      
      $query33 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber33' AND year = '$month_date33'" );
      $month33 = array();
    $month33[] = "";  
      while($row33 = $query33->fetch_assoc()){
          $month33[] = $row33['VCI'];
        }
        $query34 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber34' AND year = '$month_date34'" );
        $month34 = array();
    $month34[] = "";
        while($row34 = $query34->fetch_assoc()){
          $month34[] = $row34['VCI'];
        }
        $query35 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber35' AND year = '$month_date35'" );
        $month35 = array();
    $month35[] = "";
        while($row35 = $query35->fetch_assoc()){
          $month35[] = $row35['VCI'];
        }
        $query36 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber36' AND year = '$month_date36'" );
        $month36 = array();
    $month36[] = "";
        while($row36 = $query36->fetch_assoc()){
          $month36[] = $row36['VCI'];
        }
      
        $nine_month_avg= array();
        $month_final9 = array_merge($month33,$month34,$month35,$month36);
        $nine_month_avg[] = array_sum($month_final9)/4;
      
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
      
      
      $query37 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber37' AND year = '$month_date37'" );
      $month37 = array();
    $month37[] = "";  
      while($row37 = $query37->fetch_assoc()){
          $month37[] = $row37['VCI'];
        }
        $query38 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber38' AND year = '$month_date38'" );
        $month38 = array();
        $month38[] = "";
        while($row38 = $query38->fetch_assoc()){
          $month38[] = $row38['VCI'];
        }
        $query39 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber39' AND year = '$month_date39'" );
        $month39 = array();
        $month39[] = "";
        while($row39 = $query39->fetch_assoc()){
          $month39[] = $row39['VCI'];
        }
        $query40 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber40' AND year = '$month_date40'" );
        $month40 = array();
        $month40[] = "";
        while($row40 = $query40->fetch_assoc()){
          $month40[] = $row40['VCI'];
        }
      
        $ten_month_avg= array();
        $month_final10 = array_merge($month37,$month38,$month39,$month40);
        $ten_month_avg[] = array_sum($month_final10)/4;
        
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
    
    
    $query41 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber41' AND year = '$month_date41'" );
    $month41 = array();
    $month41[] = "";  
    while($row41 = $query41->fetch_assoc()){
        $month41[] = $row41['VCI'];
      }
      $query42 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber42' AND year = '$month_date42'" );
      $month42 = array();
    $month42[] = "";
      while($row42 = $query42->fetch_assoc()){
        $month42[] = $row42['VCI'];
      }
      $query43 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber43' AND year = '$month_date43'" );
      $month43 = array();
    $month43[] = "";
      while($row43 = $query43->fetch_assoc()){
        $month43[] = $row43['VCI'];
      }
      $query44 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber44' AND year = '$month_date44'" );
      $month44 = array();
    $month44[] = "";
      while($row44 = $query44->fetch_assoc()){
        $month44[] = $row44['VCI'];
      }
    
      $eleven_month_avg= array();
      $month_final11 = array_merge($month41,$month42,$month43,$month44);
      $eleven_month_avg[] = array_sum($month_final11)/4;
  
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
      
      
      $query45 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber45' AND year = '$month_date45'" );
      $month45 = array();
    $month45[] = "";  
      while($row45 = $query45->fetch_assoc()){
          $month45[] = $row45['VCI'];
        }
        $query46 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber46' AND year = '$month_date46'" );
        $month46 = array();
    $month46[] = "";
        while($row46 = $query46->fetch_assoc()){
          $month46[] = $row46['VCI'];
        }
        $query47 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber47' AND year = '$month_date47'" );
        $month47 = array();
    $month47[] = "";
        while($row47 = $query47->fetch_assoc()){
          $month47[] = $row47['VCI'];
        }
        $query48 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber48' AND year = '$month_date48'" );
        $month48 = array();
    $month48[] = "";
        while($row48 = $query48->fetch_assoc()){
          $month48[] = $row48['VCI'];
        }
      
        $twelve_month_avg= array();
        $month_final12 = array_merge($month45,$month46,$month47,$month48);
        $twelve_month_avg[] = array_sum($month_final12)/4;
        
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
      
      
      $query49 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber49' AND year = '$month_date49'" );
      $month49 = array();
    $month49[] = "";  
      while($row_49 = $query49->fetch_assoc()){
          $month49[] = $row_49['VCI'];
        }
        //  json_encode($month49);
        $query50 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber50' AND year = '$month_date50'" );
        $month50 = array();
    $month50[] = "";
        while($row_50 = $query50->fetch_assoc()){
          $month50[] = $row_50['VCI'];
        }
        //  json_encode($month50);
        $query51 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber51' AND year = '$month_date51'" );
        $month51 = array();
    $month51[] = "";
        while($row_51 = $query51->fetch_assoc()){
          $month51[] = $row_51['VCI'];
        }
        //  json_encode($month51);
        $query52 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber52' AND year = '$month_date52'" );
        $month52 = array();
    $month52[] = "";
        while($row_52 = $query52->fetch_assoc()){
          $month52[] = $row_52['VCI'];
        }
        //  json_encode($month52);
        $extra_month_avg= array();
        // $month_final13 = array();
        $month_final13 = array_merge($month49,$month50,$month51,$month52);
         $extra_month_avg[] = array_sum($month_final13)/4;
  
  
        //second year 
        //one month
        $dto->modify('-7 days');
        $ret53 = $dto->format('Y-m-d');
        $month_date53 = $dto->format('Y');
        $second_monthly =date("Y - M",strtotime($ret53));

        $dto->modify('-7 days');
        $ret54 = $dto->format('Y-m-d');
        $month_date54 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret55 = $dto->format('Y-m-d');
        $month_date55 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret56 = $dto->format('Y-m-d');
        $month_date56 = $dto->format('Y');
        
        $date53 = new DateTime($ret53);
        $weeknumber53 = $date53->format("W");
        
        $date54 = new DateTime($ret54);
        $weeknumber54 = $date54->format("W");
        
        $date55 = new DateTime($ret55);
        $weeknumber55 = $date55->format("W");
        
        $date56 = new DateTime($ret56);
        $weeknumber56 = $date56->format("W");
        
        
        $query53 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber53' AND year = '$month_date53'" );
        $month53 = array();
        $month53[] = "";  
        while($row53 = $query53->fetch_assoc()){
            $month53[] = $row53['VCI'];
          }
          $query54 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber54' AND year = '$month_date54'" );
          $month54 = array();
          $month54[] = "";
          while($row54 = $query54->fetch_assoc()){
            $month54[] = $row54['VCI'];
          }
          $query55 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber55' AND year = '$month_date55'" );
          $month55 = array();
          $month55[] = "";
          while($row55 = $query55->fetch_assoc()){
            $month55[] = $row55['VCI'];
          }
          $query56 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber56' AND year = '$month_date56'" );
          $month56 = array();
          $month56[] = "";
          while($row56 = $query56->fetch_assoc()){
            $month56[] = $row56['VCI'];
          }
        
          $second_year_avg= array();
          $month_final14 = array_merge($month53,$month54,$month55,$month56);
          $second_year_avg[] = array_sum($month_final14)/4;
  
          //second month
          $dto->modify('-7 days');
      $ret57 = $dto->format('Y-m-d');
      $month_date57 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret58 = $dto->format('Y-m-d');
      $month_date58 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret59 = $dto->format('Y-m-d');
      $month_date59 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret60 = $dto->format('Y-m-d');
      $month_date60 = $dto->format('Y');
      
      $date57 = new DateTime($ret57);
      $weeknumber57 = $date57->format("W");
      
      $date58 = new DateTime($ret58);
      $weeknumber58 = $date58->format("W");
      
      $date59 = new DateTime($ret59);
      $weeknumber59 = $date59->format("W");
      
      $date60 = new DateTime($ret60);
      $weeknumber60 = $date60->format("W");
      
      
      $query57 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber57' AND year = '$month_date57'" );
      $month57 = array();
      $month57[] = "";  
      while($row57 = $query57->fetch_assoc()){
          $month57[] = $row57['VCI'];
        }
        $query58 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber58' AND year = '$month_date58'" );
        $month58 = array();
        $month58[] = "";
        while($row58 = $query58->fetch_assoc()){
          $month58[] = $row58['VCI'];
        }
        $query59 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber59' AND year = '$month_date59'" );
        $month59 = array();
        $month59[] = "";
        while($row59 = $query59->fetch_assoc()){
          $month59[] = $row59['VCI'];
        }
        $query60 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber60' AND year = '$month_date60'" );
        $month60 = array();
        $month60[] = "";
        while($row60 = $query60->fetch_assoc()){
          $month60[] = $row60['VCI'];
        }
      
        $second_year_avg1= array();
        $month_final15 = array_merge($month57,$month58,$month59,$month60);
        $second_year_avg1[] = array_sum($month_final15)/4;
  
        //thrid month
        $dto->modify('-7 days');
      $ret61 = $dto->format('Y-m-d');
      $month_date61 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret62 = $dto->format('Y-m-d');
      $month_date62 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret63 = $dto->format('Y-m-d');
      $month_date63 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret64 = $dto->format('Y-m-d');
      $month_date64 = $dto->format('Y');
      
      $date61 = new DateTime($ret61);
      $weeknumber61 = $date61->format("W");
      
      $date62 = new DateTime($ret62);
      $weeknumber62 = $date62->format("W");
      
      $date63 = new DateTime($ret63);
      $weeknumber63 = $date63->format("W");
      
      $date64 = new DateTime($ret64);
      $weeknumber64 = $date64->format("W");
      
      
      $query61 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber61' AND year = '$month_date61'" );
      $month61 = array();
      $month61[] = "";  
      while($row61 = $query61->fetch_assoc()){
          $month61[] = $row61['VCI'];
        }
        $query62 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber62' AND year = '$month_date62'" );
        $month62 = array();
        $month62[] = "";
        while($row62 = $query62->fetch_assoc()){
          $month62[] = $row62['VCI'];
        }
        $query63 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber63' AND year = '$month_date63'" );
        $month63 = array();
        $month63[] = "";
        while($row63 = $query63->fetch_assoc()){
          $month63[] = $row63['VCI'];
        }
        $query64 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber64' AND year = '$month_date64'" );
        $month64 = array();
        $month64[] = "";
        while($row64 = $query64->fetch_assoc()){
          $month64[] = $row64['VCI'];
        }
      
        $second_year_avg2= array();
        $month_final16 = array_merge($month61,$month62,$month63,$month64);
        $second_year_avg2[] = array_sum($month_final16)/4;
  
        //four month
        $dto->modify('-7 days');
      $ret65 = $dto->format('Y-m-d');
      $month_date65 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret66 = $dto->format('Y-m-d');
      $month_date66 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret67 = $dto->format('Y-m-d');
      $month_date67 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret68 = $dto->format('Y-m-d');
      $month_date68 = $dto->format('Y');
      
      $date65 = new DateTime($ret65);
      $weeknumber65 = $date65->format("W");
      
      $date66 = new DateTime($ret66);
      $weeknumber66 = $date66->format("W");
      
      $date67 = new DateTime($ret67);
      $weeknumber67 = $date67->format("W");
      
      $date68 = new DateTime($ret68);
      $weeknumber68 = $date68->format("W");
      
      
      $query65 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber65' AND year = '$month_date65'" );
      $month65 = array();
      $month65[] = "";  
      while($row65 = $query65->fetch_assoc()){
          $month65[] = $row65['VCI'];
        }
        $query66 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber66' AND year = '$month_date66'" );
        $month66 = array();
        $month66[] = "";
        while($row66 = $query66->fetch_assoc()){
          $month66[] = $row66['VCI'];
        }
        $query67 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber67' AND year = '$month_date67'" );
        $month67 = array();
        $month67[] = "";
        while($row67 = $query67->fetch_assoc()){
          $month67[] = $row67['VCI'];
        }
        $query68 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber68' AND year = '$month_date68'" );
        $month68 = array();
        $month68[] = "";
        while($row68 = $query68->fetch_assoc()){
          $month68[] = $row68['VCI'];
        }
      
        $second_year_avg3= array();
        $month_final17 = array_merge($month65,$month66,$month67,$month68);
        $second_year_avg3[] = array_sum($month_final17)/4;
  
        //five month
        $dto->modify('-7 days');
      $ret69 = $dto->format('Y-m-d');
      $month_date69 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret70 = $dto->format('Y-m-d');
      $month_date70 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret71 = $dto->format('Y-m-d');
      $month_date71 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret72 = $dto->format('Y-m-d');
      $month_date72 = $dto->format('Y');
      
      $date69 = new DateTime($ret69);
      $weeknumber69 = $date69->format("W");
      
      $date70 = new DateTime($ret70);
      $weeknumber70 = $date70->format("W");
      
      $date71 = new DateTime($ret71);
      $weeknumber71 = $date71->format("W");
      
      $date72 = new DateTime($ret72);
      $weeknumber72 = $date72->format("W");
      
      
      $query69 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber69' AND year = '$month_date69'" );
      $month69 = array();
      $month69[] = "";  
      while($row69 = $query69->fetch_assoc()){
          $month69[] = $row69['VCI'];
        }
        $query70 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber70' AND year = '$month_date70'" );
        $month70 = array();
        $month70[] = "";
        while($row70 = $query70->fetch_assoc()){
          $month70[] = $row70['VCI'];
        }
        $query71 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber71' AND year = '$month_date71'" );
        $month71 = array();
        $month71[] = "";
        while($row71 = $query71->fetch_assoc()){
          $month71[] = $row71['VCI'];
        }
        $query72 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber72' AND year = '$month_date72'" );
        $month72 = array();
        $month72[] = "";
        while($row72 = $query72->fetch_assoc()){
          $month72[] = $row72['VCI'];
        }
      
        $second_year_avg4= array();
        $month_final18 = array_merge($month69,$month70,$month71,$month72);
        $second_year_avg4[] = array_sum($month_final18)/4;
  
        //six month
        $dto->modify('-7 days');
      $ret73 = $dto->format('Y-m-d');
      $month_date73 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret74 = $dto->format('Y-m-d');
      $month_date74 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret75 = $dto->format('Y-m-d');
      $month_date75 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret76 = $dto->format('Y-m-d');
      $month_date76 = $dto->format('Y');
      
      $date73 = new DateTime($ret73);
      $weeknumber73 = $date73->format("W");
      
      $date74 = new DateTime($ret74);
      $weeknumber74 = $date74->format("W");
      
      $date75 = new DateTime($ret75);
      $weeknumber75 = $date75->format("W");
      
      $date76 = new DateTime($ret76);
      $weeknumber76 = $date76->format("W");
      
      
      $query73 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber73' AND year = '$month_date73'" );
      $month73 = array();
      $month73[] = "";  
      while($row73 = $query73->fetch_assoc()){
          $month73[] = $row73['VCI'];
        }
        $query74 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber74' AND year = '$month_date74'" );
        $month74 = array();
        $month74[] = "";
        while($row74 = $query74->fetch_assoc()){
          $month74[] = $row74['VCI'];
        }
        $query75 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber75' AND year = '$month_date75'" );
        $month75 = array();
        $month75[] = "";
        while($row75 = $query75->fetch_assoc()){
          $month75[] = $row75['VCI'];
        }
        $query76 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber76' AND year = '$month_date76'" );
        $month76 = array();
        $month76[] = "";
        while($row76 = $query76->fetch_assoc()){
          $month76[] = $row76['VCI'];
        }
      
        $second_year_avg5= array();
        $month_final19 = array_merge($month73,$month74,$month75,$month76);
        $second_year_avg5[] = array_sum($month_final19)/4;
        
        //seven month
        $dto->modify('-7 days');
      $ret77 = $dto->format('Y-m-d');
      $month_date77 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret78 = $dto->format('Y-m-d');
      $month_date78 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret79 = $dto->format('Y-m-d');
      $month_date79 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret80 = $dto->format('Y-m-d');
      $month_date80 = $dto->format('Y');
      
      $date77 = new DateTime($ret77);
      $weeknumber77 = $date77->format("W");
      
      $date78 = new DateTime($ret78);
      $weeknumber78 = $date78->format("W");
      
      $date79 = new DateTime($ret79);
      $weeknumber79 = $date79->format("W");
      
      $date80 = new DateTime($ret80);
      $weeknumber80 = $date80->format("W");
      
      
      $query77 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber77' AND year = '$month_date77'" );
      $month77 = array();
      $month77[] = "";  
      while($row77 = $query77->fetch_assoc()){
          $month77[] = $row77['VCI'];
        }
        $query78 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber78' AND year = '$month_date78'" );
        $month78 = array();
        $month78[] = "";
        while($row78 = $query78->fetch_assoc()){
          $month78[] = $row78['VCI'];
        }
        $query79 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber79' AND year = '$month_date79'" );
        $month79 = array();
        $month79[] = "";
        while($row79 = $query79->fetch_assoc()){
          $month79[] = $row79['VCI'];
        }
        $query80 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber80' AND year = '$month_date80'" );
        $month80 = array();
        $month80[] = "";
        while($row80 = $query80->fetch_assoc()){
          $month80[] = $row80['VCI'];
        }
      
        $second_year_avg6= array();
        $month_final20 = array_merge($month77,$month78,$month79,$month80);
        $second_year_avg6[] = array_sum($month_final20)/4;
  
        //eigth month
        $dto->modify('-7 days');
      $ret81 = $dto->format('Y-m-d');
      $month_date81 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret82 = $dto->format('Y-m-d');
      $month_date82 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret83 = $dto->format('Y-m-d');
      $month_date83 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret84 = $dto->format('Y-m-d');
      $month_date84 = $dto->format('Y');
      
      $date81 = new DateTime($ret81);
      $weeknumber81 = $date81->format("W");
      
      $date82 = new DateTime($ret82);
      $weeknumber82 = $date82->format("W");
      
      $date83 = new DateTime($ret83);
      $weeknumber83 = $date83->format("W");
      
      $date84 = new DateTime($ret84);
      $weeknumber84 = $date84->format("W");
      
      
      $query81 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber81' AND year = '$month_date81'" );
      $month81 = array();
      $month81[] = "";  
      while($row81 = $query81->fetch_assoc()){
          $month81[] = $row81['VCI'];
        }
        $query82 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber82' AND year = '$month_date82'" );
        $month82 = array();
        $month82[] = "";
        while($row82 = $query82->fetch_assoc()){
          $month82[] = $row82['VCI'];
        }
        $query83 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber83' AND year = '$month_date83'" );
        $month83 = array();
        $month83[] = "";
        while($row83 = $query83->fetch_assoc()){
          $month83[] = $row83['VCI'];
        }
        $query84 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber84' AND year = '$month_date84'" );
        $month84 = array();
        $month84[] = "";
        while($row84 = $query84->fetch_assoc()){
          $month84[] = $row84['VCI'];
        }
      
        $second_year_avg7= array();
        $month_final21 = array_merge($month81,$month82,$month83,$month84);
        $second_year_avg7[] = array_sum($month_final21)/4;
  
        //nine month
        $dto->modify('-7 days');
      $ret85 = $dto->format('Y-m-d');
      $month_date85 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret86 = $dto->format('Y-m-d');
      $month_date86 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret87 = $dto->format('Y-m-d');
      $month_date87 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret88 = $dto->format('Y-m-d');
      $month_date88 = $dto->format('Y');
      
      $date85 = new DateTime($ret85);
      $weeknumber85 = $date85->format("W");
      
      $date86 = new DateTime($ret86);
      $weeknumber86 = $date86->format("W");
      
      $date87 = new DateTime($ret87);
      $weeknumber87 = $date87->format("W");
      
      $date88 = new DateTime($ret88);
      $weeknumber88 = $date88->format("W");
      
      
      $query85 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber85' AND year = '$month_date85'" );
      $month85 = array();
      $month85[] = "";  
      while($row85 = $query85->fetch_assoc()){
          $month85[] = $row85['VCI'];
        }
        $query86 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber86' AND year = '$month_date86'" );
        $month86 = array();
        $month86[] = "";
        while($row86 = $query86->fetch_assoc()){
          $month86[] = $row86['VCI'];
        }
        $query87 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber87' AND year = '$month_date87'" );
        $month87 = array();
        $month87[] = "";
        while($row87 = $query87->fetch_assoc()){
          $month87[] = $row87['VCI'];
        }
        $query88 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber88' AND year = '$month_date88'" );
        $month88 = array();
        $month88[] = "";
        while($row88 = $query88->fetch_assoc()){
          $month88[] = $row88['VCI'];
        }
      
        $second_year_avg8= array();
        $month_final22 = array_merge($month85,$month86,$month87,$month88);
        $second_year_avg8[] = array_sum($month_final22)/4;
  
        //ten month
        $dto->modify('-7 days');
      $ret89 = $dto->format('Y-m-d');
      $month_date89 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret90 = $dto->format('Y-m-d');
      $month_date90 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret91 = $dto->format('Y-m-d');
      $month_date91 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret92 = $dto->format('Y-m-d');
      $month_date92 = $dto->format('Y');
      
      $date89 = new DateTime($ret89);
      $weeknumber89 = $date89->format("W");
      
      $date90 = new DateTime($ret90);
      $weeknumber90 = $date90->format("W");
      
      $date91 = new DateTime($ret91);
      $weeknumber91 = $date91->format("W");
      
      $date92 = new DateTime($ret92);
      $weeknumber92 = $date92->format("W");
      
      
      $query89 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber89' AND year = '$month_date89'" );
      $month89 = array();
      $month89[] = "";  
      while($row89 = $query89->fetch_assoc()){
          $month89[] = $row89['VCI'];
        }
        $query90 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber90' AND year = '$month_date90'" );
        $month90 = array();
        $month90[] = "";
        while($row90 = $query90->fetch_assoc()){
          $month90[] = $row90['VCI'];
        }
        $query91 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber91' AND year = '$month_date91'" );
        $month91 = array();
        $month91[] = "";
        while($row91 = $query91->fetch_assoc()){
          $month91[] = $row91['VCI'];
        }
        $query92 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber92' AND year = '$month_date92'" );
        $month92 = array();
        $month92[] = "";
        while($row92 = $query92->fetch_assoc()){
          $month92[] = $row92['VCI'];
        }
      
        $second_year_avg9= array();
        $month_final23 = array_merge($month89,$month90,$month91,$month92);
        $second_year_avg9[] = array_sum($month_final23)/4;
  
        //eleven month
        $dto->modify('-7 days');
      $ret93 = $dto->format('Y-m-d');
      $month_date93 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret94 = $dto->format('Y-m-d');
      $month_date94 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret95 = $dto->format('Y-m-d');
      $month_date95 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret96 = $dto->format('Y-m-d');
      $month_date96 = $dto->format('Y');
      
      $date93 = new DateTime($ret93);
      $weeknumber93 = $date93->format("W");
      
      $date94 = new DateTime($ret94);
      $weeknumber94 = $date94->format("W");
      
      $date95 = new DateTime($ret95);
      $weeknumber95 = $date95->format("W");
      
      $date96 = new DateTime($ret96);
      $weeknumber96 = $date96->format("W");
      
      
      $query93 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber93' AND year = '$month_date93'" );
      $month93 = array();
      $month93[] = "";  
      while($row93 = $query93->fetch_assoc()){
          $month93[] = $row93['VCI'];
        }
        $query94 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber94' AND year = '$month_date94'" );
        $month94 = array();
        $month94[] = "";
        while($row94 = $query94->fetch_assoc()){
          $month94[] = $row94['VCI'];
        }
        $query95 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber95' AND year = '$month_date95'" );
        $month95 = array();
        $month95[] = "";
        while($row95 = $query95->fetch_assoc()){
          $month95[] = $row95['VCI'];
        }
        $query96 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber96' AND year = '$month_date96'" );
        $month96 = array();
        $month96[] = "";
        while($row96 = $query96->fetch_assoc()){
          $month96[] = $row96['VCI'];
        }
      
        $second_year_avg10= array();
        $month_final24 = array_merge($month93,$month94,$month95,$month96);
        $second_year_avg10[] = array_sum($month_final24)/4;
  
        //tweleve month
        $dto->modify('-7 days');
      $ret97 = $dto->format('Y-m-d');
      $month_date97 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret98 = $dto->format('Y-m-d');
      $month_date98 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret99 = $dto->format('Y-m-d');
      $month_date99 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret100 = $dto->format('Y-m-d');
      $month_date100 = $dto->format('Y');
      
      $date97 = new DateTime($ret97);
      $weeknumber97 = $date97->format("W");
      
      $date98 = new DateTime($ret98);
      $weeknumber98 = $date98->format("W");
      
      $date99 = new DateTime($ret99);
      $weeknumber99 = $date99->format("W");
      
      $date100 = new DateTime($ret100);
      $weeknumber100 = $date100->format("W");
      
      
      $query97 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber97' AND year = '$month_date97'" );
      $month97 = array();
      $month97[] = "";  
      while($row97 = $query97->fetch_assoc()){
          $month97[] = $row97['VCI'];
        }
        $query98 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber98' AND year = '$month_date98'" );
        $month98 = array();
        $month98[] = "";
        while($row98 = $query98->fetch_assoc()){
          $month98[] = $row98['VCI'];
        }
        $query99 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber99' AND year = '$month_date99'" );
        $month99 = array();
        $month99[] = "";
        while($row99 = $query99->fetch_assoc()){
          $month99[] = $row99['VCI'];
        }
        $query100 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber100' AND year = '$month_date100'" );
        $month100 = array();
        $month100[] = "";
        while($row100 = $query100->fetch_assoc()){
          $month100[] = $row100['VCI'];
        }
      
        $second_year_avg11= array();
        $month_final25 = array_merge($month97,$month98,$month99,$month100);
        $second_year_avg11[] = array_sum($month_final25)/4;
  
        //extra month
        $dto->modify('-7 days');
      $ret_97 = $dto->format('Y-m-d');
      $month_date_97 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret_98 = $dto->format('Y-m-d');
      $month_date_98 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret_99 = $dto->format('Y-m-d');
      $month_date_99 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret_100 = $dto->format('Y-m-d');
      $month_date_100 = $dto->format('Y');
      
      $date_97 = new DateTime($ret_97);
      $weeknumber_97 = $date_97->format("W");
      
      $date_98 = new DateTime($ret_98);
      $weeknumber_98 = $date_98->format("W");
      
      $date_99 = new DateTime($ret_99);
      $weeknumber_99 = $date_99->format("W");
      
      $date_100 = new DateTime($ret_100);
      $weeknumber_100 = $date_100->format("W");
      
      
      $query_97 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_97' AND year = '$month_date_97'" );
      $month_97 = array();
      $month_97[] = "";  
      while($row_97 = $query_97->fetch_assoc()){
          $month_97[] = $row_97['VCI'];
        }
        $query_98 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_98' AND year = '$month_date_98'" );
        $month_98 = array();
        $month_98[] = "";
        while($row_98 = $query_98->fetch_assoc()){
          $month_98[] = $row_98['VCI'];
        }
        $query_99 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_99' AND year = '$month_date_99'" );
        $month_99 = array();
        $month_99[] = "";
        while($row_99 = $query_99->fetch_assoc()){
          $month_99[] = $row_99['VCI'];
        }
        $query_100 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_100' AND year = '$month_date_100'" );
        $month_100 = array();
        $month_100[] = "";
        while($row_100 = $query_100->fetch_assoc()){
          $month_100[] = $row_100['VCI'];
        }
      
        $second_year_avg_11= array();
        $month_final_25 = array_merge($month_97,$month_98,$month_99,$month_100);
        $second_year_avg_11[] = array_sum($month_final_25)/4;
  
  
        //third year
        //one month
        $dto->modify('-7 days');
      $ret101 = $dto->format('Y-m-d');
      $month_date101 = $dto->format('Y');
      $third_monthly =date("Y - M",strtotime($ret101));

      $dto->modify('-7 days');
      $ret102 = $dto->format('Y-m-d');
      $month_date102 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret103 = $dto->format('Y-m-d');
      $month_date103 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret104 = $dto->format('Y-m-d');
      $month_date104 = $dto->format('Y');
      
      $date101 = new DateTime($ret101);
      $weeknumber101 = $date101->format("W");
      
      $date102 = new DateTime($ret102);
      $weeknumber102 = $date102->format("W");
      
      $date103 = new DateTime($ret103);
      $weeknumber103 = $date103->format("W");
      
      $date104 = new DateTime($ret104);
      $weeknumber104 = $date104->format("W");
      
      
  $query101 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber101' AND year = '$month_date101'" );
  $month101 = array();
  $month101[] = "";      
  while($row101 = $query101->fetch_assoc()){
          $month101[] = $row101['VCI'];
        }
      $query102 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber102' AND year = '$month_date102'" );
      $month102 = array();
  $month102[] = "";    
      while($row102 = $query102->fetch_assoc()){
          $month102[] = $row102['VCI'];
        }
      $query103 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber103' AND year = '$month_date103'" );
      $month103 = array();
  $month103[] = "";    
      while($row103 = $query103->fetch_assoc()){
          $month103[] = $row103['VCI'];
        }
      $query104 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber104' AND year = '$month_date104'" );
      $month104 = array();
  $month104[] = "";    
      while($row104 = $query104->fetch_assoc()){
          $month104[] = $row104['VCI'];
        }
      
        $third_month_avg= array();
        $month_final101 = array_merge($month101,$month102,$month103,$month104);
        $third_month_avg[] = array_sum($month_final101)/4;
  
        //second month
        $dto->modify('-7 days');
        $ret105 = $dto->format('Y-m-d');
        $month_date105 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret106 = $dto->format('Y-m-d');
        $month_date106 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret107 = $dto->format('Y-m-d');
        $month_date107 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret108 = $dto->format('Y-m-d');
        $month_date108 = $dto->format('Y');
        
        $date105 = new DateTime($ret105);
        $weeknumber105 = $date105->format("W");
   
        $date106 = new DateTime($ret106);
        $weeknumber106 = $date106->format("W");
        
        $date107 = new DateTime($ret107);
        $weeknumber107 = $date107->format("W");
        
        $date108 = new DateTime($ret108);
        $weeknumber108 = $date108->format("W");
        
        
    $query105 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber105' AND year = '$month_date105'" );
    $month105 = array();
  $month105[] = "";        
    while($row105 = $query105->fetch_assoc()){
            $month105[] = $row105['VCI'];
          }
        $query106 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber106' AND year = '$month_date106'" );
        $month106 = array();
  $month106[] = "";    
        while($row106 = $query106->fetch_assoc()){
            $month106[] = $row106['VCI'];
          }
        $query107 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber107' AND year = '$month_date107'" );
        $month107 = array();
  $month107[] = "";    
        while($row107 = $query107->fetch_assoc()){
            $month107[] = $row107['VCI'];
          }
        $query108 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber108' AND year = '$month_date108'" );
        $month108 = array();
  $month108[] = "";    
        while($row108 = $query108->fetch_assoc()){
            $month108[] = $row108['VCI'];
          }
        
          $third_month_avg1= array();
          $month_final102 = array_merge($month105,$month106,$month107,$month108);
          $third_month_avg1[] = array_sum($month_final102)/4;
  
          //third month
          $dto->modify('-7 days');
          $ret109 = $dto->format('Y-m-d');
          $month_date109 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret110 = $dto->format('Y-m-d');
          $month_date110 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret111 = $dto->format('Y-m-d');
          $month_date111 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret112 = $dto->format('Y-m-d');
          $month_date112 = $dto->format('Y');
          
          $date109 = new DateTime($ret109);
          $weeknumber109 = $date109->format("W");
          
          $date110 = new DateTime($ret110);
          $weeknumber110 = $date110->format("W");
          
          $date111 = new DateTime($ret111);
          $weeknumber111 = $date111->format("W");
          
           $date112 = new DateTime($ret112);
         $weeknumber112 = $date112->format("W");
          
          
      $query109 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber109' AND year = '$month_date109'" );
      $month109 = array();
  $month109[] = "";        
      while($row109 = $query109->fetch_assoc()){
              $month109[] = $row109['VCI'];
            }
          $query110 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber110' AND year = '$month_date110'" );
          $month110 = array();
  $month110[] = "";   
          while($row110 = $query110->fetch_assoc()){
              $month110[] = $row110['VCI'];
            }
          $query111 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber111' AND year = '$month_date111'" );
          $month111 = array();
  $month111[] = "";    
          while($row111 = $query111->fetch_assoc()){
              $month111[] = $row111['VCI'];
            }
          $query112 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber112' AND year = '$month_date112'" );
          $month112 = array();
  $month112[] = "";    
          while($row112 = $query112->fetch_assoc()){
              $month112[] = $row112['VCI'];
            }
          
            $third_month_avg2= array();
            $month_final103 = array_merge($month109,$month110,$month111,$month112);
            $third_month_avg2[] = array_sum($month_final103)/4;
        //four month
        $dto->modify('-7 days');
      $ret113 = $dto->format('Y-m-d');
      $month_date113 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret114 = $dto->format('Y-m-d');
      $month_date114 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret115 = $dto->format('Y-m-d');
      $month_date115 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret116 = $dto->format('Y-m-d');
      $month_date116 = $dto->format('Y');
      
      $date113 = new DateTime($ret113);
       $weeknumber113 = $date113->format("W");
      
      $date114 = new DateTime($ret114);
      $weeknumber114 = $date114->format("W");
      
      $date115 = new DateTime($ret115);
      $weeknumber115 = $date115->format("W");
      
      $date116 = new DateTime($ret116);
      $weeknumber116 = $date116->format("W");
      
      
  $query113 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber113' AND year = '$month_date113'" );
  $month113 = array();
  $month113[] = "";        
  while($row113 = $query113->fetch_assoc()){
          $month113[] = $row113['VCI'];
        }
        // echo json_encode($month113);
      $query114 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber114' AND year = '$month_date114'" );
      $month114 = array();
  $month114[] = "";    
      while($row114 = $query114->fetch_assoc()){
          $month114[] = $row114['VCI'];
        }
      $query115 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber115' AND year = '$month_date115'" );
      $month115 = array();
  $month115[] = "";    
      while($row115 = $query115->fetch_assoc()){
          $month115[] = $row115['VCI'];
        }
      $query116 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber116' AND year = '$month_date116'" );
      $month116 = array();
  $month116[] = "";    
      while($row116 = $query116->fetch_assoc()){
          $month116[] = $row116['VCI'];
        }
      
        $third_month_avg3= array();
        $month_final104 = array_merge($month113,$month114,$month115,$month116);
        $third_month_avg3[] = array_sum($month_final104)/4;
  
        //five month
        $dto->modify('-7 days');
      $ret117 = $dto->format('Y-m-d');
      $month_date117 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret118 = $dto->format('Y-m-d');
      $month_date118 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret119 = $dto->format('Y-m-d');
      $month_date119 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret120 = $dto->format('Y-m-d');
      $month_date120 = $dto->format('Y');
      
      $date117 = new DateTime($ret117);
     $weeknumber117 = $date117->format("W");
      
      $date118 = new DateTime($ret118);
      $weeknumber118 = $date118->format("W");
      
      $date119 = new DateTime($ret119);
      $weeknumber119 = $date119->format("W");
      
      $date120 = new DateTime($ret120);
      $weeknumber120 = $date120->format("W");
      
      
      $query117 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber117' AND year = '$month_date117'" );
      $month117 = array();
  $month117[] = "";    
      while($row117 = $query117->fetch_assoc()){
          $month117[] = $row117['VCI'];
        }
        $query118 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber118' AND year = '$month_date118'" );
        $month118 = array();
  $month118[] = "";  
        while($row118 = $query118->fetch_assoc()){
          $month118[] = $row118['VCI'];
        }
        $query119 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber119' AND year = '$month_date119'" );
        $month119 = array();
  $month119[] = "";  
        while($row119 = $query119->fetch_assoc()){
          $month119[] = $row119['VCI'];
        }
        $query120 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber120' AND year = '$month_date120'" );
        $month120 = array();
  $month120[] = "";  
        while($row120 = $query120->fetch_assoc()){
          $month120[] = $row120['VCI'];
        }
      
        $third_month_avg4= array();
        $month_final105 = array_merge($month117,$month118,$month119,$month120);
        $third_month_avg4[] = array_sum($month_final105)/4;
  
  //       //six month
        $dto->modify('-7 days');
      $ret221 = $dto->format('Y-m-d');
      $month_date221 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret222 = $dto->format('Y-m-d');
      $month_date222 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret223 = $dto->format('Y-m-d');
      $month_date223 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret224 = $dto->format('Y-m-d');
      $month_date224 = $dto->format('Y');
      
      $date221 = new DateTime($ret221);
      $weeknumber221 = $date221->format("W");
      
      $date222 = new DateTime($ret222);
      $weeknumber222 = $date222->format("W");
      
      $date223 = new DateTime($ret223);
      $weeknumber223 = $date223->format("W");
      
      $date224 = new DateTime($ret224);
      $weeknumber224 = $date224->format("W");
      
      
      $query221 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber221' AND year = '$month_date221'" );
      $month221 = array();
  $month221[] = "";    
      while($row221 = $query221->fetch_assoc()){
          $month221[] = $row221['VCI'];
        }
        $query222 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber222' AND year = '$month_date222'" );
        $month222 = array();
  $month222[] = ""; 
        while($row222 = $query222->fetch_assoc()){
          $month222[] = $row222['VCI'];
        }
        $query223 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber223' AND year = '$month_date223'" );
        $month223 = array();
  $month223[] = ""; 
        while($row223 = $query223->fetch_assoc()){
          $month223[] = $row223['VCI'];
        }
        $query224 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber224' AND year = '$month_date224'" );
        $month224 = array();
  $month224[] = ""; 
        while($row224 = $query224->fetch_assoc()){
          $month224[] = $row224['VCI'];
        }
      
        $third_month_avg5= array();
        $month_final106 = array_merge($month221,$month222,$month223,$month224);
        $third_month_avg5[] = array_sum($month_final106)/4;
  
  // //       //seven month
        $dto->modify('-7 days');
      $ret225 = $dto->format('Y-m-d');
      $month_date225 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret226 = $dto->format('Y-m-d');
      $month_date226 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret227 = $dto->format('Y-m-d');
      $month_date227 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret228 = $dto->format('Y-m-d');
      $month_date228 = $dto->format('Y');
      
      $date225 = new DateTime($ret225);
      $weeknumber225 = $date225->format("W");
      
      $date226 = new DateTime($ret226);
      $weeknumber226 = $date226->format("W");
      
      $date227 = new DateTime($ret227);
      $weeknumber227 = $date227->format("W");
      
      $date228 = new DateTime($ret228);
      $weeknumber228 = $date228->format("W");
      
      
      $query225 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber225' AND year = '$month_date225'" );
      $month225 = array();
  $month225[] = "";   
      while($row225 = $query225->fetch_assoc()){
          $month225[] = $row225['VCI'];
        }
        $query226 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber226' AND year = '$month_date226'" );
        $month226 = array();
  $month226[] = ""; 
        while($row226 = $query226->fetch_assoc()){
          $month226[] = $row226['VCI'];
        }
        $query227 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber227' AND year = '$month_date227'" );
        $month227 = array();
  $month227[] = ""; 
        while($row227 = $query227->fetch_assoc()){
          $month227[] = $row227['VCI'];
        }
        $query228 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber228' AND year = '$month_date228'" );
        $month228 = array();
  $month228[] = ""; 
        while($row228 = $query228->fetch_assoc()){
          $month228[] = $row228['VCI'];
        }
      
        $third_month_avg6= array();
        $month_final107 = array_merge($month225,$month226,$month227,$month228);
        $third_month_avg6[] = array_sum($month_final107)/4;
        //eight month
        $dto->modify('-7 days');
        $ret229 = $dto->format('Y-m-d');
        $month_date229 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret230 = $dto->format('Y-m-d');
        $month_date230 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret231 = $dto->format('Y-m-d');
         $month_date231 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret232 = $dto->format('Y-m-d');
        $month_date232 = $dto->format('Y');
        
        $date229 = new DateTime($ret229);
        $weeknumber229 = $date229->format("W");
        
        $date230 = new DateTime($ret230);
        $weeknumber230 = $date230->format("W");
        
        $date231 = new DateTime($ret231);
        $weeknumber231 = $date231->format("W");
        
        $date232 = new DateTime($ret232);
        $weeknumber232 = $date232->format("W");
        
        
        $query229 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber229' AND year = '$month_date229'" );
        $month229 = array();
  $month229[] = "";   
        while($row229 = $query229->fetch_assoc()){
            $month229[] = $row229['VCI'];
          }
          $query230 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber230' AND year = '$month_date230'" );
          $month230 = array();
  $month230[] = ""; 
          while($row230 = $query230->fetch_assoc()){
            $month230[] = $row230['VCI'];
          }
          $query231 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber231' AND year = '$month_date231'" );
          $month231 = array();
  $month231[] = ""; 
          while($row231 = $query231->fetch_assoc()){
            $month231[] = $row231['VCI'];
          }
          $query232 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber232' AND year = '$month_date232'" );
          $month232 = array();
  $month232[] = ""; 
          while($row232 = $query232->fetch_assoc()){
            $month232[] = $row232['VCI'];
          }
        
          $third_month_avg7= array();
          $month_final108 = array_merge($month229,$month230,$month231,$month232);
          $third_month_avg7[] = array_sum($month_final108)/4;
  
  //       //nine month
        $dto->modify('-7 days');
        $ret233 = $dto->format('Y-m-d');
        $month_date233 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret234 = $dto->format('Y-m-d');
        $month_date234 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret235 = $dto->format('Y-m-d');
        $month_date235 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret236 = $dto->format('Y-m-d');
        $month_date236 = $dto->format('Y');
        
        $date233 = new DateTime($ret233);
        $weeknumber233 = $date233->format("W");
        
        $date234 = new DateTime($ret234);
        $weeknumber234 = $date234->format("W");
        
        $date235 = new DateTime($ret235);
        $weeknumber235 = $date235->format("W");
        
        $date236 = new DateTime($ret236);
        $weeknumber236 = $date236->format("W");
        
        
        $query233 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber233' AND year = '$month_date233'" );
        $month233 = array();
  $month233[] = "";   
        while($row233 = $query233->fetch_assoc()){
            $month233[] = $row233['VCI'];
          }
          $query234 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber234' AND year = '$month_date234'" );
          $month234 = array();
  $month234[] = ""; 
          while($row234 = $query234->fetch_assoc()){
            $month234[] = $row234['VCI'];
          }
          $query235 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber235' AND year = '$month_date235'" );
          $month235 = array();
  $month235[] = ""; 
          while($row235 = $query235->fetch_assoc()){
            $month235[] = $row235['VCI'];
          }
          $query236 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber236' AND year = '$month_date236'" );
          $month236 = array();
  $month236[] = ""; 
          while($row236 = $query236->fetch_assoc()){
            $month236[] = $row236['VCI'];
          }
        
          $third_month_avg8= array();
          $month_final109 = array_merge($month233,$month234,$month235,$month236);
          $third_month_avg8[] = array_sum($month_final109)/4;
  
  // //ten month
  $dto->modify('-7 days');
      $ret237 = $dto->format('Y-m-d');
      $month_date237 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret238 = $dto->format('Y-m-d');
      $month_date238 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret239 = $dto->format('Y-m-d');
      $month_date239 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret240 = $dto->format('Y-m-d');
      $month_date240 = $dto->format('Y');
      
      $date237 = new DateTime($ret237);
      $weeknumber237 = $date237->format("W");
      
      $date238 = new DateTime($ret238);
      $weeknumber238 = $date238->format("W");
      
      $date239 = new DateTime($ret239);
      $weeknumber239 = $date239->format("W");
      
      $date240 = new DateTime($ret240);
      $weeknumber240 = $date240->format("W");
      
      
      $query237 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber237' AND year = '$month_date237'" );
      $month237 = array();
  $month237[] = "";   
      while($row237 = $query237->fetch_assoc()){
          $month237[] = $row237['VCI'];
        }
        $query238 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber238' AND year = '$month_date238'" );
        $month238 = array();
  $month238[] = ""; 
        while($row238 = $query238->fetch_assoc()){
          $month238[] = $row238['VCI'];
        }
        $query239 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber239' AND year = '$month_date239'" );
        $month239 = array();
  $month239[] = ""; 
        while($row239 = $query239->fetch_assoc()){
          $month239[] = $row239['VCI'];
        }
        $query240 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber240' AND year = '$month_date240'" );
        $month240 = array();
  $month240[] = ""; 
        while($row240 = $query240->fetch_assoc()){
          $month240[] = $row240['VCI'];
        }
      
        $third_month_avg9= array();
        $month_final110 = array_merge($month237,$month238,$month239,$month240);
        $third_month_avg9[] = array_sum($month_final110)/4;
  
  //       //eleven month
        $dto->modify('-7 days');
      $ret241 = $dto->format('Y-m-d');
      $month_date241 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret242 = $dto->format('Y-m-d');
      $month_date242 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret243 = $dto->format('Y-m-d');
      $month_date243 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret244 = $dto->format('Y-m-d');
      $month_date244 = $dto->format('Y');
      
      $date241 = new DateTime($ret241);
      $weeknumber241 = $date241->format("W");
      
      $date242 = new DateTime($ret242);
      $weeknumber242 = $date242->format("W");
      
      $date243 = new DateTime($ret243);
      $weeknumber243 = $date243->format("W");
      
      $date244 = new DateTime($ret244);
      $weeknumber244 = $date244->format("W");
      
      
      $query241 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber241' AND year = '$month_date241'" );
      $month241 = array();
      $month241[] = "";   
      while($row241 = $query241->fetch_assoc()){
          $month241[] = $row241['VCI'];
        }
        $query242 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber242' AND year = '$month_date242'" );
        $month242 = array();
        $month242[] = ""; 
        while($row242 = $query242->fetch_assoc()){
          $month242[] = $row242['VCI'];
        }
        $query243 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber243' AND year = '$month_date243'" );
        $month243 = array();
        $month243[] = ""; 
        while($row243 = $query243->fetch_assoc()){
          $month243[] = $row243['VCI'];
        }
        $query244 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber244' AND year = '$month_date244'" );
        $month244 = array();
        $month244[] = ""; 
        while($row244 = $query244->fetch_assoc()){
          $month244[] = $row244['VCI'];
        }
      
        $third_month_avg10= array();
        $month_final111 = array_merge($month241,$month242,$month243,$month244);
        $third_month_avg10[] = array_sum($month_final111)/4;
        
  //       //twelvw month
        $dto->modify('-7 days');
        $ret245 = $dto->format('Y-m-d');
        $month_date245 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret246 = $dto->format('Y-m-d');
        $month_date246 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret247 = $dto->format('Y-m-d');
        $month_date247 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret248 = $dto->format('Y-m-d');
        $month_date248 = $dto->format('Y');
        
        $date245 = new DateTime($ret245);
        $weeknumber245 = $date245->format("W");
        
        $date246 = new DateTime($ret246);
        $weeknumber246 = $date246->format("W");
        
        $date247 = new DateTime($ret247);
        $weeknumber247 = $date247->format("W");
        
        $date248 = new DateTime($ret248);
        $weeknumber248 = $date248->format("W");
        
        
        $query245 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber245' AND year = '$month_date245'" );
        $month245 = array();
  $month245[] = "";   
        while($row245 = $query245->fetch_assoc()){
            $month245[] = $row245['VCI'];
          }
          $query246 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber246' AND year = '$month_date246'" );
          $month246 = array();
  $month246[] = ""; 
          while($row246 = $query246->fetch_assoc()){
            $month246[] = $row246['VCI'];
          }
          $query247 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber247' AND year = '$month_date247'" );
          $month247 = array();
  $month247[] = ""; 
          while($row247 = $query247->fetch_assoc()){
            $month247[] = $row247['VCI'];
          }
          $query248 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber248' AND year = '$month_date248'" );
          $month248 = array();
  $month248[] = ""; 
          while($row248 = $query248->fetch_assoc()){
            $month248[] = $row248['VCI'];
          }
        
          $third_month_avg11= array();
          $month_final112 = array_merge($month245,$month246,$month247,$month248);
          $third_month_avg11[] = array_sum($month_final112)/4;
  
          //extra month
          $dto->modify('-7 days');
          $ret_245 = $dto->format('Y-m-d');
          $month_date_245 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret_246 = $dto->format('Y-m-d');
          $month_date_246 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret_247 = $dto->format('Y-m-d');
          $month_date_247 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret_248 = $dto->format('Y-m-d');
          $month_date_248 = $dto->format('Y');
          
          $date_245 = new DateTime($ret_245);
          $weeknumber_245 = $date_245->format("W");
          
          $date_246 = new DateTime($ret_246);
          $weeknumber_246 = $date_246->format("W");
          
          $date_247 = new DateTime($ret_247);
          $weeknumber_247 = $date_247->format("W");
          
          $date_248 = new DateTime($ret_248);
          $weeknumber_248 = $date_248->format("W");
          
          
          $query_245 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_245' AND year = '$month_date_245'" );
          $month_245 = array();
    $month_245[] = "";   
          while($row_245 = $query_245->fetch_assoc()){
              $month_245[] = $row_245['VCI'];
            }
            $query_246 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_246' AND year = '$month_date_246'" );
            $month_246 = array();
    $month_246[] = ""; 
            while($row_246 = $query_246->fetch_assoc()){
              $month_246[] = $row_246['VCI'];
            }
            $query_247 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_247' AND year = '$month_date_247'" );
            $month_247 = array();
    $month_247[] = ""; 
            while($row247 = $query_247->fetch_assoc()){
              $month_247[] = $row247['VCI'];
            }
            $query_248 =$con->query("SELECT VCI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_248' AND year = '$month_date_248'" );
            $month_248 = array();
    $month_248[] = ""; 
            while($row_248 = $query_248->fetch_assoc()){
              $month_248[] = $row_248['VCI'];
            }
          
            $third_month_avg_11= array();
            $month_final_113 = array_merge($month_245,$month_246,$month_247,$month_248);
            $third_month_avg_11[] = array_sum($month_final_113)/4;
  
          $one_month_date = array();
          $second_month_date =array();
          $third_month_date = array();

  
        $one_month_date[] = strval($one_monthly);
        $second_month_date[] = strval($second_monthly);
        $third_month_date[] = strval($third_monthly);

  
          $date_array = array_merge($third_month_date,$second_month_date,$one_month_date);
          
          $final_month_array_avg = array_merge($extra_month_avg,$twelve_month_avg,$eleven_month_avg,$ten_month_avg,$nine_month_avg,$eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
          // echo $final_month_array_avg;
  
          $final_month_array = array();
          $final_month_array[] = array_sum($final_month_array_avg)/count($final_month_array_avg);
  
          $final_month_array_avg1 = array_merge($second_year_avg,$second_year_avg1,$second_year_avg2,$second_year_avg3,$second_year_avg4,$second_year_avg5,$second_year_avg6,$second_year_avg7,$second_year_avg8,$second_year_avg9,$second_year_avg10,$second_year_avg11,$second_year_avg_11);
  
          // // echo $final_month_array_avg1;
  
          $final_month_array1 = array();
          $final_month_array1[] = array_sum($final_month_array_avg1)/count($final_month_array_avg1);
  
          $final_month_array_avg2 = array_merge($third_month_avg,$third_month_avg1,$third_month_avg2,$third_month_avg3,$third_month_avg4,$third_month_avg5,$third_month_avg6,$third_month_avg7,$third_month_avg8,$third_month_avg9,$third_month_avg10,$third_month_avg11,$third_month_avg_11);
  
          $final_month_array2 = array();
          $final_month_array2[] = array_sum($final_month_array_avg2)/count($final_month_array_avg2);
          $yearly_month_array =array();
          $yearly_month_array = array_merge($final_month_array2,$final_month_array1,$final_month_array);
  
    $return_data = array();
    $return_data['yearly_month_array'] =$yearly_month_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  
  
  }
  elseif($period_id === 'last 3 year' && $per_id === 'VHI'){
    $dto = new DateTime();
  $dto->setISODate($year,$week);
  $ret = $dto->format('Y-m-d');
  $month_date1 = $dto->format('Y');
  $one_monthly =date("Y - M",strtotime($ret));
  
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
  
    $query1 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$week' AND year = '$year'" );
    $month1 = array();
    $month1[] = "";
    while($row1 = $query1->fetch_assoc()){
      $month1[] = $row1['VHI'];
    }
  
  $query2 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
  $month2 = array();
  $month2[] = "";
    while($row2 = $query2->fetch_assoc()){
      $month2[] = $row2['VHI'];
    }
  
    $query3 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
    $month3 = array();
    $month3[] = "";
    while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['VHI'];
    }
  
    $query4 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
    $month4 = array();
    $month4[] = "";
    while($row4 = $query4->fetch_assoc()){
      $month4[] = $row4['VHI'];
    }
  
  $one_month_avg=array();
   $month_final1 = array_merge($month4,$month3,$month2,$month1);
   $one_month_avg[] = array_sum($month_final1)/4;
  
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
  
  $query5 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$month_date5'" );
  $month5 =array();
  $month5[] = '';  
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['VHI'];
    }
    // echo json_encode($month5);
    $query6 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
    $month6 = array();
    $month6[] = "";
    while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['VHI'];
    }
    $query7 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
    $month7 = array();
    $month7[] = "";
    while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['VHI'];
    }
    $query8 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
    $month8 = array();
    $month8[] = "";
    while($row8 = $query8->fetch_assoc()){
      $month8[] = $row8['VHI'];
    }
  
    $second_month_avg= array();
    $month_final2 = array_merge($month5,$month6,$month7,$month8);
    $second_month_avg[] = array_sum($month_final2)/4;
  
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
  
  
  $query9 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber9' AND year = '$month_date9'" );
  $month9 = array();
    $month9[] = "";  
  while($row9 = $query9->fetch_assoc()){
      $month9[] = $row9['VHI'];
    }
    $query10 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
    $month10 = array();
    $month10[] = "";
    while($row10 = $query10->fetch_assoc()){
      $month10[] = $row10['VHI'];
    }
    $query11 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
    $month11 = array();
    $month11[] = "";
    while($row11 = $query11->fetch_assoc()){
      $month11[] = $row11['VHI'];
    }
    $query12 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
    $month12 = array();
    $month12[] = "";
    while($row12 = $query12->fetch_assoc()){
      $month12[] = $row12['VHI'];
    }
  
    $third_month_avg= array();
    $month_final3 = array_merge($month9,$month10,$month11,$month12);
    $third_month_avg[] = array_sum($month_final3)/4;
  
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
  
  
  $query13 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber13' AND year = '$month_date13'" );
  $month13 = array();
  $month13[] = "";
    while($row13 = $query13->fetch_assoc()){
      $month13[] = $row13['VHI'];
    }
    // echo json_encode($month13);
    $query14 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
    $month14 = array();
    $month14[] = "";
    while($row14 = $query14->fetch_assoc()){
      $month14[] = $row14['VHI'];
    }
    $query15 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
    $month15 = array();
    $month15[] = "";
    while($row15 = $query15->fetch_assoc()){
      $month15[] = $row15['VHI'];
    }
    $query16 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
    $month16 = array();
    $month16[] = "";
    while($row16 = $query16->fetch_assoc()){
      $month16[] = $row16['VHI'];
    }
  
    $four_month_avg= array();
    $month_final4 = array_merge($month13,$month14,$month15,$month16);
    $four_month_avg[] = array_sum($month_final4)/4;
  
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
  
  
  $query17 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber17' AND year = '$month_date17'" );
  $month17 = array();
    $month17[] = "";  
  while($row17 = $query17->fetch_assoc()){
      $month17[] = $row17['VHI'];
    }
    $query18 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
    $month18 = array();
    $month18[] = "";
    while($row18 = $query18->fetch_assoc()){
      $month18[] = $row18['VHI'];
    }
    $query19 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
    $month19 = array();
    $month19[] = "";
    while($row19 = $query19->fetch_assoc()){
      $month19[] = $row19['VHI'];
    }
    $query20 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
    $month20 = array();
    $month20[] = "";
    while($row20 = $query20->fetch_assoc()){
      $month20[] = $row20['VHI'];
    }
  
    $five_month_avg= array();
    $month_final5 = array_merge($month17,$month18,$month19,$month20);
    $five_month_avg[] = array_sum($month_final5)/4;
  
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
  
  
  $query21 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber21' AND year = '$month_date21'" );
  $month21 = array();
    $month21[] = "";  
  while($row21 = $query21->fetch_assoc()){
      $month21[] = $row21['VHI'];
    }
    $query22 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
    $month22 = array();
    $month22[] = "";
    while($row22 = $query22->fetch_assoc()){
      $month22[] = $row22['VHI'];
    }
    $query23 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
    $month23 = array();
    $month23[] = "";
    while($row23 = $query23->fetch_assoc()){
      $month23[] = $row23['VHI'];
    }
    $query24 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
    $month24 = array();
    $month24[] = "";
    while($row24 = $query24->fetch_assoc()){
      $month24[] = $row24['VHI'];
    }
  
    $six_month_avg= array();
    $month_final6 = array_merge($month21,$month22,$month23,$month24);
    $six_month_avg[] = array_sum($month_final6)/4;
  
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
  
  
  $query25 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber25' AND year = '$month_date25'" );
  $month25 = array();
    $month25[] = "";  
  while($row25 = $query25->fetch_assoc()){
      $month25[] = $row25['VHI'];
    }
    $query26 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber26' AND year = '$month_date26'" );
    $month26 = array();
    $month26[] = "";
    while($row26 = $query26->fetch_assoc()){
      $month26[] = $row26['VHI'];
    }
    $query27 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber27' AND year = '$month_date27'" );
    $month27 = array();
    $month27[] = "";
    while($row27 = $query27->fetch_assoc()){
      $month27[] = $row27['VHI'];
    }
    $query28 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber28' AND year = '$month_date28'" );
    $month28 = array();
    $month28[] = "";
    while($row28 = $query28->fetch_assoc()){
      $month28[] = $row28['VHI'];
    }
  
    $seven_month_avg= array();
    $month_final7 = array_merge($month25,$month26,$month27,$month28);
    $seven_month_avg[] = array_sum($month_final7)/4;
  
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
  
  
  $query29 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber29' AND year = '$month_date29'" );
  $month29 = array();
    $month29[] = "";  
  while($row29 = $query29->fetch_assoc()){
      $month29[] = $row29['VHI'];
    }
    $query30 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber30' AND year = '$month_date30'" );
    $month30 = array();
    $month30[] = "";
    while($row30 = $query30->fetch_assoc()){
      $month30[] = $row30['VHI'];
    }
    $query31 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber31' AND year = '$month_date31'" );
    $month31 = array();
    $month31[] = "";
    while($row31 = $query31->fetch_assoc()){
      $month31[] = $row31['VHI'];
    }
    $query32 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber32' AND year = '$month_date32'" );
    $month32 = array();
    $month32[] = "";
    while($row32 = $query32->fetch_assoc()){
      $month32[] = $row32['VHI'];
    }
  
    $eight_month_avg= array();
    $month_final8 = array_merge($month29,$month30,$month31,$month32);
    $eight_month_avg[] = array_sum($month_final8)/4;
  
  
      // $one_month_date = array();
      // $second_month_date =array();
      // $third_month_date = array();
      // $four_month_date = array();
      // $five_month_date = array();
      // $six_month_date = array();
      // $seven_month_date = array();
      // $eight_month_date = array();
      // $nine_month_date = array();
  
      // $one_month_date[] = strval($ret);
      // $second_month_date[] = strval($ret5);
      // $third_month_date[] = strval($ret9);
      // $four_month_date[] = strval($ret13);
      // $five_month_date[] = strval($ret17);
      // $six_month_date[] = strval($ret21);
      // $seven_month_date[] = strval($ret25);
      // $eight_month_date[] = strval($ret29);
      // $nine_month_date[] = strval($ret21);
  
  
      // $date_array = array_merge($eight_month_date,$seven_month_date,$six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
      // $final_month_array = array_merge($eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
  
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
      
      
      $query33 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber33' AND year = '$month_date33'" );
      $month33 = array();
    $month33[] = "";  
      while($row33 = $query33->fetch_assoc()){
          $month33[] = $row33['VHI'];
        }
        $query34 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber34' AND year = '$month_date34'" );
        $month34 = array();
    $month34[] = "";
        while($row34 = $query34->fetch_assoc()){
          $month34[] = $row34['VHI'];
        }
        $query35 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber35' AND year = '$month_date35'" );
        $month35 = array();
    $month35[] = "";
        while($row35 = $query35->fetch_assoc()){
          $month35[] = $row35['VHI'];
        }
        $query36 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber36' AND year = '$month_date36'" );
        $month36 = array();
    $month36[] = "";
        while($row36 = $query36->fetch_assoc()){
          $month36[] = $row36['VHI'];
        }
      
        $nine_month_avg= array();
        $month_final9 = array_merge($month33,$month34,$month35,$month36);
        $nine_month_avg[] = array_sum($month_final9)/4;
      
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
      
      
      $query37 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber37' AND year = '$month_date37'" );
      $month37 = array();
    $month37[] = "";  
      while($row37 = $query37->fetch_assoc()){
          $month37[] = $row37['VHI'];
        }
        $query38 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber38' AND year = '$month_date38'" );
        $month38 = array();
        $month38[] = "";
        while($row38 = $query38->fetch_assoc()){
          $month38[] = $row38['VHI'];
        }
        $query39 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber39' AND year = '$month_date39'" );
        $month39 = array();
        $month39[] = "";
        while($row39 = $query39->fetch_assoc()){
          $month39[] = $row39['VHI'];
        }
        $query40 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber40' AND year = '$month_date40'" );
        $month40 = array();
        $month40[] = "";
        while($row40 = $query40->fetch_assoc()){
          $month40[] = $row40['VHI'];
        }
      
        $ten_month_avg= array();
        $month_final10 = array_merge($month37,$month38,$month39,$month40);
        $ten_month_avg[] = array_sum($month_final10)/4;
        
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
    
    
    $query41 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber41' AND year = '$month_date41'" );
    $month41 = array();
    $month41[] = "";  
    while($row41 = $query41->fetch_assoc()){
        $month41[] = $row41['VHI'];
      }
      $query42 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber42' AND year = '$month_date42'" );
      $month42 = array();
    $month42[] = "";
      while($row42 = $query42->fetch_assoc()){
        $month42[] = $row42['VHI'];
      }
      $query43 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber43' AND year = '$month_date43'" );
      $month43 = array();
    $month43[] = "";
      while($row43 = $query43->fetch_assoc()){
        $month43[] = $row43['VHI'];
      }
      $query44 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber44' AND year = '$month_date44'" );
      $month44 = array();
    $month44[] = "";
      while($row44 = $query44->fetch_assoc()){
        $month44[] = $row44['VHI'];
      }
    
      $eleven_month_avg= array();
      $month_final11 = array_merge($month41,$month42,$month43,$month44);
      $eleven_month_avg[] = array_sum($month_final11)/4;
  
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
      
      
      $query45 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber45' AND year = '$month_date45'" );
      $month45 = array();
    $month45[] = "";  
      while($row45 = $query45->fetch_assoc()){
          $month45[] = $row45['VHI'];
        }
        $query46 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber46' AND year = '$month_date46'" );
        $month46 = array();
    $month46[] = "";
        while($row46 = $query46->fetch_assoc()){
          $month46[] = $row46['VHI'];
        }
        $query47 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber47' AND year = '$month_date47'" );
        $month47 = array();
    $month47[] = "";
        while($row47 = $query47->fetch_assoc()){
          $month47[] = $row47['VHI'];
        }
        $query48 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber48' AND year = '$month_date48'" );
        $month48 = array();
    $month48[] = "";
        while($row48 = $query48->fetch_assoc()){
          $month48[] = $row48['VHI'];
        }
      
        $twelve_month_avg= array();
        $month_final12 = array_merge($month45,$month46,$month47,$month48);
        $twelve_month_avg[] = array_sum($month_final12)/4;
        
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
      
      
      $query49 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber49' AND year = '$month_date49'" );
      $month49 = array();
    $month49[] = "";  
      while($row_49 = $query49->fetch_assoc()){
          $month49[] = $row_49['VHI'];
        }
        //  json_encode($month49);
        $query50 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber50' AND year = '$month_date50'" );
        $month50 = array();
    $month50[] = "";
        while($row_50 = $query50->fetch_assoc()){
          $month50[] = $row_50['VHI'];
        }
        //  json_encode($month50);
        $query51 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber51' AND year = '$month_date51'" );
        $month51 = array();
    $month51[] = "";
        while($row_51 = $query51->fetch_assoc()){
          $month51[] = $row_51['VHI'];
        }
        //  json_encode($month51);
        $query52 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber52' AND year = '$month_date52'" );
        $month52 = array();
    $month52[] = "";
        while($row_52 = $query52->fetch_assoc()){
          $month52[] = $row_52['VHI'];
        }
        //  json_encode($month52);
        $extra_month_avg= array();
        // $month_final13 = array();
        $month_final13 = array_merge($month49,$month50,$month51,$month52);
         $extra_month_avg[] = array_sum($month_final13)/4;
  
  
        //second year 
        //one month
        $dto->modify('-7 days');
        $ret53 = $dto->format('Y-m-d');
        $month_date53 = $dto->format('Y');
        $second_monthly =date("Y - M",strtotime($ret53));

        $dto->modify('-7 days');
        $ret54 = $dto->format('Y-m-d');
        $month_date54 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret55 = $dto->format('Y-m-d');
        $month_date55 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret56 = $dto->format('Y-m-d');
        $month_date56 = $dto->format('Y');
        
        $date53 = new DateTime($ret53);
        $weeknumber53 = $date53->format("W");
        
        $date54 = new DateTime($ret54);
        $weeknumber54 = $date54->format("W");
        
        $date55 = new DateTime($ret55);
        $weeknumber55 = $date55->format("W");
        
        $date56 = new DateTime($ret56);
        $weeknumber56 = $date56->format("W");
        
        
        $query53 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber53' AND year = '$month_date53'" );
        $month53 = array();
        $month53[] = "";  
        while($row53 = $query53->fetch_assoc()){
            $month53[] = $row53['VHI'];
          }
          $query54 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber54' AND year = '$month_date54'" );
          $month54 = array();
          $month54[] = "";
          while($row54 = $query54->fetch_assoc()){
            $month54[] = $row54['VHI'];
          }
          $query55 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber55' AND year = '$month_date55'" );
          $month55 = array();
          $month55[] = "";
          while($row55 = $query55->fetch_assoc()){
            $month55[] = $row55['VHI'];
          }
          $query56 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber56' AND year = '$month_date56'" );
          $month56 = array();
          $month56[] = "";
          while($row56 = $query56->fetch_assoc()){
            $month56[] = $row56['VHI'];
          }
        
          $second_year_avg= array();
          $month_final14 = array_merge($month53,$month54,$month55,$month56);
          $second_year_avg[] = array_sum($month_final14)/4;
  
          //second month
          $dto->modify('-7 days');
      $ret57 = $dto->format('Y-m-d');
      $month_date57 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret58 = $dto->format('Y-m-d');
      $month_date58 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret59 = $dto->format('Y-m-d');
      $month_date59 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret60 = $dto->format('Y-m-d');
      $month_date60 = $dto->format('Y');
      
      $date57 = new DateTime($ret57);
      $weeknumber57 = $date57->format("W");
      
      $date58 = new DateTime($ret58);
      $weeknumber58 = $date58->format("W");
      
      $date59 = new DateTime($ret59);
      $weeknumber59 = $date59->format("W");
      
      $date60 = new DateTime($ret60);
      $weeknumber60 = $date60->format("W");
      
      
      $query57 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber57' AND year = '$month_date57'" );
      $month57 = array();
      $month57[] = "";  
      while($row57 = $query57->fetch_assoc()){
          $month57[] = $row57['VHI'];
        }
        $query58 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber58' AND year = '$month_date58'" );
        $month58 = array();
        $month58[] = "";
        while($row58 = $query58->fetch_assoc()){
          $month58[] = $row58['VHI'];
        }
        $query59 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber59' AND year = '$month_date59'" );
        $month59 = array();
        $month59[] = "";
        while($row59 = $query59->fetch_assoc()){
          $month59[] = $row59['VHI'];
        }
        $query60 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber60' AND year = '$month_date60'" );
        $month60 = array();
        $month60[] = "";
        while($row60 = $query60->fetch_assoc()){
          $month60[] = $row60['VHI'];
        }
      
        $second_year_avg1= array();
        $month_final15 = array_merge($month57,$month58,$month59,$month60);
        $second_year_avg1[] = array_sum($month_final15)/4;
  
        //thrid month
        $dto->modify('-7 days');
      $ret61 = $dto->format('Y-m-d');
      $month_date61 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret62 = $dto->format('Y-m-d');
      $month_date62 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret63 = $dto->format('Y-m-d');
      $month_date63 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret64 = $dto->format('Y-m-d');
      $month_date64 = $dto->format('Y');
      
      $date61 = new DateTime($ret61);
      $weeknumber61 = $date61->format("W");
      
      $date62 = new DateTime($ret62);
      $weeknumber62 = $date62->format("W");
      
      $date63 = new DateTime($ret63);
      $weeknumber63 = $date63->format("W");
      
      $date64 = new DateTime($ret64);
      $weeknumber64 = $date64->format("W");
      
      
      $query61 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber61' AND year = '$month_date61'" );
      $month61 = array();
      $month61[] = "";  
      while($row61 = $query61->fetch_assoc()){
          $month61[] = $row61['VHI'];
        }
        $query62 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber62' AND year = '$month_date62'" );
        $month62 = array();
        $month62[] = "";
        while($row62 = $query62->fetch_assoc()){
          $month62[] = $row62['VHI'];
        }
        $query63 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber63' AND year = '$month_date63'" );
        $month63 = array();
        $month63[] = "";
        while($row63 = $query63->fetch_assoc()){
          $month63[] = $row63['VHI'];
        }
        $query64 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber64' AND year = '$month_date64'" );
        $month64 = array();
        $month64[] = "";
        while($row64 = $query64->fetch_assoc()){
          $month64[] = $row64['VHI'];
        }
      
        $second_year_avg2= array();
        $month_final16 = array_merge($month61,$month62,$month63,$month64);
        $second_year_avg2[] = array_sum($month_final16)/4;
  
        //four month
        $dto->modify('-7 days');
      $ret65 = $dto->format('Y-m-d');
      $month_date65 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret66 = $dto->format('Y-m-d');
      $month_date66 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret67 = $dto->format('Y-m-d');
      $month_date67 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret68 = $dto->format('Y-m-d');
      $month_date68 = $dto->format('Y');
      
      $date65 = new DateTime($ret65);
      $weeknumber65 = $date65->format("W");
      
      $date66 = new DateTime($ret66);
      $weeknumber66 = $date66->format("W");
      
      $date67 = new DateTime($ret67);
      $weeknumber67 = $date67->format("W");
      
      $date68 = new DateTime($ret68);
      $weeknumber68 = $date68->format("W");
      
      
      $query65 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber65' AND year = '$month_date65'" );
      $month65 = array();
      $month65[] = "";  
      while($row65 = $query65->fetch_assoc()){
          $month65[] = $row65['VHI'];
        }
        $query66 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber66' AND year = '$month_date66'" );
        $month66 = array();
        $month66[] = "";
        while($row66 = $query66->fetch_assoc()){
          $month66[] = $row66['VHI'];
        }
        $query67 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber67' AND year = '$month_date67'" );
        $month67 = array();
        $month67[] = "";
        while($row67 = $query67->fetch_assoc()){
          $month67[] = $row67['VHI'];
        }
        $query68 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber68' AND year = '$month_date68'" );
        $month68 = array();
        $month68[] = "";
        while($row68 = $query68->fetch_assoc()){
          $month68[] = $row68['VHI'];
        }
      
        $second_year_avg3= array();
        $month_final17 = array_merge($month65,$month66,$month67,$month68);
        $second_year_avg3[] = array_sum($month_final17)/4;
  
        //five month
        $dto->modify('-7 days');
      $ret69 = $dto->format('Y-m-d');
      $month_date69 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret70 = $dto->format('Y-m-d');
      $month_date70 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret71 = $dto->format('Y-m-d');
      $month_date71 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret72 = $dto->format('Y-m-d');
      $month_date72 = $dto->format('Y');
      
      $date69 = new DateTime($ret69);
      $weeknumber69 = $date69->format("W");
      
      $date70 = new DateTime($ret70);
      $weeknumber70 = $date70->format("W");
      
      $date71 = new DateTime($ret71);
      $weeknumber71 = $date71->format("W");
      
      $date72 = new DateTime($ret72);
      $weeknumber72 = $date72->format("W");
      
      
      $query69 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber69' AND year = '$month_date69'" );
      $month69 = array();
      $month69[] = "";  
      while($row69 = $query69->fetch_assoc()){
          $month69[] = $row69['VHI'];
        }
        $query70 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber70' AND year = '$month_date70'" );
        $month70 = array();
        $month70[] = "";
        while($row70 = $query70->fetch_assoc()){
          $month70[] = $row70['VHI'];
        }
        $query71 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber71' AND year = '$month_date71'" );
        $month71 = array();
        $month71[] = "";
        while($row71 = $query71->fetch_assoc()){
          $month71[] = $row71['VHI'];
        }
        $query72 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber72' AND year = '$month_date72'" );
        $month72 = array();
        $month72[] = "";
        while($row72 = $query72->fetch_assoc()){
          $month72[] = $row72['VHI'];
        }
      
        $second_year_avg4= array();
        $month_final18 = array_merge($month69,$month70,$month71,$month72);
        $second_year_avg4[] = array_sum($month_final18)/4;
  
        //six month
        $dto->modify('-7 days');
      $ret73 = $dto->format('Y-m-d');
      $month_date73 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret74 = $dto->format('Y-m-d');
      $month_date74 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret75 = $dto->format('Y-m-d');
      $month_date75 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret76 = $dto->format('Y-m-d');
      $month_date76 = $dto->format('Y');
      
      $date73 = new DateTime($ret73);
      $weeknumber73 = $date73->format("W");
      
      $date74 = new DateTime($ret74);
      $weeknumber74 = $date74->format("W");
      
      $date75 = new DateTime($ret75);
      $weeknumber75 = $date75->format("W");
      
      $date76 = new DateTime($ret76);
      $weeknumber76 = $date76->format("W");
      
      
      $query73 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber73' AND year = '$month_date73'" );
      $month73 = array();
      $month73[] = "";  
      while($row73 = $query73->fetch_assoc()){
          $month73[] = $row73['VHI'];
        }
        $query74 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber74' AND year = '$month_date74'" );
        $month74 = array();
        $month74[] = "";
        while($row74 = $query74->fetch_assoc()){
          $month74[] = $row74['VHI'];
        }
        $query75 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber75' AND year = '$month_date75'" );
        $month75 = array();
        $month75[] = "";
        while($row75 = $query75->fetch_assoc()){
          $month75[] = $row75['VHI'];
        }
        $query76 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber76' AND year = '$month_date76'" );
        $month76 = array();
        $month76[] = "";
        while($row76 = $query76->fetch_assoc()){
          $month76[] = $row76['VHI'];
        }
      
        $second_year_avg5= array();
        $month_final19 = array_merge($month73,$month74,$month75,$month76);
        $second_year_avg5[] = array_sum($month_final19)/4;
        
        //seven month
        $dto->modify('-7 days');
      $ret77 = $dto->format('Y-m-d');
      $month_date77 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret78 = $dto->format('Y-m-d');
      $month_date78 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret79 = $dto->format('Y-m-d');
      $month_date79 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret80 = $dto->format('Y-m-d');
      $month_date80 = $dto->format('Y');
      
      $date77 = new DateTime($ret77);
      $weeknumber77 = $date77->format("W");
      
      $date78 = new DateTime($ret78);
      $weeknumber78 = $date78->format("W");
      
      $date79 = new DateTime($ret79);
      $weeknumber79 = $date79->format("W");
      
      $date80 = new DateTime($ret80);
      $weeknumber80 = $date80->format("W");
      
      
      $query77 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber77' AND year = '$month_date77'" );
      $month77 = array();
      $month77[] = "";  
      while($row77 = $query77->fetch_assoc()){
          $month77[] = $row77['VHI'];
        }
        $query78 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber78' AND year = '$month_date78'" );
        $month78 = array();
        $month78[] = "";
        while($row78 = $query78->fetch_assoc()){
          $month78[] = $row78['VHI'];
        }
        $query79 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber79' AND year = '$month_date79'" );
        $month79 = array();
        $month79[] = "";
        while($row79 = $query79->fetch_assoc()){
          $month79[] = $row79['VHI'];
        }
        $query80 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber80' AND year = '$month_date80'" );
        $month80 = array();
        $month80[] = "";
        while($row80 = $query80->fetch_assoc()){
          $month80[] = $row80['VHI'];
        }
      
        $second_year_avg6= array();
        $month_final20 = array_merge($month77,$month78,$month79,$month80);
        $second_year_avg6[] = array_sum($month_final20)/4;
  
        //eigth month
        $dto->modify('-7 days');
      $ret81 = $dto->format('Y-m-d');
      $month_date81 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret82 = $dto->format('Y-m-d');
      $month_date82 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret83 = $dto->format('Y-m-d');
      $month_date83 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret84 = $dto->format('Y-m-d');
      $month_date84 = $dto->format('Y');
      
      $date81 = new DateTime($ret81);
      $weeknumber81 = $date81->format("W");
      
      $date82 = new DateTime($ret82);
      $weeknumber82 = $date82->format("W");
      
      $date83 = new DateTime($ret83);
      $weeknumber83 = $date83->format("W");
      
      $date84 = new DateTime($ret84);
      $weeknumber84 = $date84->format("W");
      
      
      $query81 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber81' AND year = '$month_date81'" );
      $month81 = array();
      $month81[] = "";  
      while($row81 = $query81->fetch_assoc()){
          $month81[] = $row81['VHI'];
        }
        $query82 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber82' AND year = '$month_date82'" );
        $month82 = array();
        $month82[] = "";
        while($row82 = $query82->fetch_assoc()){
          $month82[] = $row82['VHI'];
        }
        $query83 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber83' AND year = '$month_date83'" );
        $month83 = array();
        $month83[] = "";
        while($row83 = $query83->fetch_assoc()){
          $month83[] = $row83['VHI'];
        }
        $query84 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber84' AND year = '$month_date84'" );
        $month84 = array();
        $month84[] = "";
        while($row84 = $query84->fetch_assoc()){
          $month84[] = $row84['VHI'];
        }
      
        $second_year_avg7= array();
        $month_final21 = array_merge($month81,$month82,$month83,$month84);
        $second_year_avg7[] = array_sum($month_final21)/4;
  
        //nine month
        $dto->modify('-7 days');
      $ret85 = $dto->format('Y-m-d');
      $month_date85 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret86 = $dto->format('Y-m-d');
      $month_date86 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret87 = $dto->format('Y-m-d');
      $month_date87 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret88 = $dto->format('Y-m-d');
      $month_date88 = $dto->format('Y');
      
      $date85 = new DateTime($ret85);
      $weeknumber85 = $date85->format("W");
      
      $date86 = new DateTime($ret86);
      $weeknumber86 = $date86->format("W");
      
      $date87 = new DateTime($ret87);
      $weeknumber87 = $date87->format("W");
      
      $date88 = new DateTime($ret88);
      $weeknumber88 = $date88->format("W");
      
      
      $query85 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber85' AND year = '$month_date85'" );
      $month85 = array();
      $month85[] = "";  
      while($row85 = $query85->fetch_assoc()){
          $month85[] = $row85['VHI'];
        }
        $query86 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber86' AND year = '$month_date86'" );
        $month86 = array();
        $month86[] = "";
        while($row86 = $query86->fetch_assoc()){
          $month86[] = $row86['VHI'];
        }
        $query87 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber87' AND year = '$month_date87'" );
        $month87 = array();
        $month87[] = "";
        while($row87 = $query87->fetch_assoc()){
          $month87[] = $row87['VHI'];
        }
        $query88 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber88' AND year = '$month_date88'" );
        $month88 = array();
        $month88[] = "";
        while($row88 = $query88->fetch_assoc()){
          $month88[] = $row88['VHI'];
        }
      
        $second_year_avg8= array();
        $month_final22 = array_merge($month85,$month86,$month87,$month88);
        $second_year_avg8[] = array_sum($month_final22)/4;
  
        //ten month
        $dto->modify('-7 days');
      $ret89 = $dto->format('Y-m-d');
      $month_date89 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret90 = $dto->format('Y-m-d');
      $month_date90 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret91 = $dto->format('Y-m-d');
      $month_date91 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret92 = $dto->format('Y-m-d');
      $month_date92 = $dto->format('Y');
      
      $date89 = new DateTime($ret89);
      $weeknumber89 = $date89->format("W");
      
      $date90 = new DateTime($ret90);
      $weeknumber90 = $date90->format("W");
      
      $date91 = new DateTime($ret91);
      $weeknumber91 = $date91->format("W");
      
      $date92 = new DateTime($ret92);
      $weeknumber92 = $date92->format("W");
      
      
      $query89 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber89' AND year = '$month_date89'" );
      $month89 = array();
      $month89[] = "";  
      while($row89 = $query89->fetch_assoc()){
          $month89[] = $row89['VHI'];
        }
        $query90 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber90' AND year = '$month_date90'" );
        $month90 = array();
        $month90[] = "";
        while($row90 = $query90->fetch_assoc()){
          $month90[] = $row90['VHI'];
        }
        $query91 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber91' AND year = '$month_date91'" );
        $month91 = array();
        $month91[] = "";
        while($row91 = $query91->fetch_assoc()){
          $month91[] = $row91['VHI'];
        }
        $query92 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber92' AND year = '$month_date92'" );
        $month92 = array();
        $month92[] = "";
        while($row92 = $query92->fetch_assoc()){
          $month92[] = $row92['VHI'];
        }
      
        $second_year_avg9= array();
        $month_final23 = array_merge($month89,$month90,$month91,$month92);
        $second_year_avg9[] = array_sum($month_final23)/4;
  
        //eleven month
        $dto->modify('-7 days');
      $ret93 = $dto->format('Y-m-d');
      $month_date93 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret94 = $dto->format('Y-m-d');
      $month_date94 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret95 = $dto->format('Y-m-d');
      $month_date95 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret96 = $dto->format('Y-m-d');
      $month_date96 = $dto->format('Y');
      
      $date93 = new DateTime($ret93);
      $weeknumber93 = $date93->format("W");
      
      $date94 = new DateTime($ret94);
      $weeknumber94 = $date94->format("W");
      
      $date95 = new DateTime($ret95);
      $weeknumber95 = $date95->format("W");
      
      $date96 = new DateTime($ret96);
      $weeknumber96 = $date96->format("W");
      
      
      $query93 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber93' AND year = '$month_date93'" );
      $month93 = array();
      $month93[] = "";  
      while($row93 = $query93->fetch_assoc()){
          $month93[] = $row93['VHI'];
        }
        $query94 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber94' AND year = '$month_date94'" );
        $month94 = array();
        $month94[] = "";
        while($row94 = $query94->fetch_assoc()){
          $month94[] = $row94['VHI'];
        }
        $query95 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber95' AND year = '$month_date95'" );
        $month95 = array();
        $month95[] = "";
        while($row95 = $query95->fetch_assoc()){
          $month95[] = $row95['VHI'];
        }
        $query96 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber96' AND year = '$month_date96'" );
        $month96 = array();
        $month96[] = "";
        while($row96 = $query96->fetch_assoc()){
          $month96[] = $row96['VHI'];
        }
      
        $second_year_avg10= array();
        $month_final24 = array_merge($month93,$month94,$month95,$month96);
        $second_year_avg10[] = array_sum($month_final24)/4;
  
        //tweleve month
        $dto->modify('-7 days');
      $ret97 = $dto->format('Y-m-d');
      $month_date97 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret98 = $dto->format('Y-m-d');
      $month_date98 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret99 = $dto->format('Y-m-d');
      $month_date99 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret100 = $dto->format('Y-m-d');
      $month_date100 = $dto->format('Y');
      
      $date97 = new DateTime($ret97);
      $weeknumber97 = $date97->format("W");
      
      $date98 = new DateTime($ret98);
      $weeknumber98 = $date98->format("W");
      
      $date99 = new DateTime($ret99);
      $weeknumber99 = $date99->format("W");
      
      $date100 = new DateTime($ret100);
      $weeknumber100 = $date100->format("W");
      
      
      $query97 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber97' AND year = '$month_date97'" );
      $month97 = array();
      $month97[] = "";  
      while($row97 = $query97->fetch_assoc()){
          $month97[] = $row97['VHI'];
        }
        $query98 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber98' AND year = '$month_date98'" );
        $month98 = array();
        $month98[] = "";
        while($row98 = $query98->fetch_assoc()){
          $month98[] = $row98['VHI'];
        }
        $query99 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber99' AND year = '$month_date99'" );
        $month99 = array();
        $month99[] = "";
        while($row99 = $query99->fetch_assoc()){
          $month99[] = $row99['VHI'];
        }
        $query100 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber100' AND year = '$month_date100'" );
        $month100 = array();
        $month100[] = "";
        while($row100 = $query100->fetch_assoc()){
          $month100[] = $row100['VHI'];
        }
      
        $second_year_avg11= array();
        $month_final25 = array_merge($month97,$month98,$month99,$month100);
        $second_year_avg11[] = array_sum($month_final25)/4;
  
        //extra month
        $dto->modify('-7 days');
      $ret_97 = $dto->format('Y-m-d');
      $month_date_97 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret_98 = $dto->format('Y-m-d');
      $month_date_98 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret_99 = $dto->format('Y-m-d');
      $month_date_99 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret_100 = $dto->format('Y-m-d');
      $month_date_100 = $dto->format('Y');
      
      $date_97 = new DateTime($ret_97);
      $weeknumber_97 = $date_97->format("W");
      
      $date_98 = new DateTime($ret_98);
      $weeknumber_98 = $date_98->format("W");
      
      $date_99 = new DateTime($ret_99);
      $weeknumber_99 = $date_99->format("W");
      
      $date_100 = new DateTime($ret_100);
      $weeknumber_100 = $date_100->format("W");
      
      
      $query_97 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_97' AND year = '$month_date_97'" );
      $month_97 = array();
      $month_97[] = "";  
      while($row_97 = $query_97->fetch_assoc()){
          $month_97[] = $row_97['VHI'];
        }
        $query_98 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_98' AND year = '$month_date_98'" );
        $month_98 = array();
        $month_98[] = "";
        while($row_98 = $query_98->fetch_assoc()){
          $month_98[] = $row_98['VHI'];
        }
        $query_99 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_99' AND year = '$month_date_99'" );
        $month_99 = array();
        $month_99[] = "";
        while($row_99 = $query_99->fetch_assoc()){
          $month_99[] = $row_99['VHI'];
        }
        $query_100 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_100' AND year = '$month_date_100'" );
        $month_100 = array();
        $month_100[] = "";
        while($row_100 = $query_100->fetch_assoc()){
          $month_100[] = $row_100['VHI'];
        }
      
        $second_year_avg_11= array();
        $month_final_25 = array_merge($month_97,$month_98,$month_99,$month_100);
        $second_year_avg_11[] = array_sum($month_final_25)/4;
  
  
        //third year
        //one month
        $dto->modify('-7 days');
      $ret101 = $dto->format('Y-m-d');
      $month_date101 = $dto->format('Y');
      $third_monthly =date("Y - M",strtotime($ret101));

      $dto->modify('-7 days');
      $ret102 = $dto->format('Y-m-d');
      $month_date102 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret103 = $dto->format('Y-m-d');
      $month_date103 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret104 = $dto->format('Y-m-d');
      $month_date104 = $dto->format('Y');
      
      $date101 = new DateTime($ret101);
      $weeknumber101 = $date101->format("W");
      
      $date102 = new DateTime($ret102);
      $weeknumber102 = $date102->format("W");
      
      $date103 = new DateTime($ret103);
      $weeknumber103 = $date103->format("W");
      
      $date104 = new DateTime($ret104);
      $weeknumber104 = $date104->format("W");
      
      
  $query101 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber101' AND year = '$month_date101'" );
  $month101 = array();
  $month101[] = "";      
  while($row101 = $query101->fetch_assoc()){
          $month101[] = $row101['VHI'];
        }
      $query102 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber102' AND year = '$month_date102'" );
      $month102 = array();
  $month102[] = "";    
      while($row102 = $query102->fetch_assoc()){
          $month102[] = $row102['VHI'];
        }
      $query103 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber103' AND year = '$month_date103'" );
      $month103 = array();
  $month103[] = "";    
      while($row103 = $query103->fetch_assoc()){
          $month103[] = $row103['VHI'];
        }
      $query104 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber104' AND year = '$month_date104'" );
      $month104 = array();
  $month104[] = "";    
      while($row104 = $query104->fetch_assoc()){
          $month104[] = $row104['VHI'];
        }
      
        $third_month_avg= array();
        $month_final101 = array_merge($month101,$month102,$month103,$month104);
        $third_month_avg[] = array_sum($month_final101)/4;
  
        //second month
        $dto->modify('-7 days');
        $ret105 = $dto->format('Y-m-d');
        $month_date105 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret106 = $dto->format('Y-m-d');
        $month_date106 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret107 = $dto->format('Y-m-d');
        $month_date107 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret108 = $dto->format('Y-m-d');
        $month_date108 = $dto->format('Y');
        
        $date105 = new DateTime($ret105);
        $weeknumber105 = $date105->format("W");
   
        $date106 = new DateTime($ret106);
        $weeknumber106 = $date106->format("W");
        
        $date107 = new DateTime($ret107);
        $weeknumber107 = $date107->format("W");
        
        $date108 = new DateTime($ret108);
        $weeknumber108 = $date108->format("W");
        
        
    $query105 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber105' AND year = '$month_date105'" );
    $month105 = array();
  $month105[] = "";        
    while($row105 = $query105->fetch_assoc()){
            $month105[] = $row105['VHI'];
          }
        $query106 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber106' AND year = '$month_date106'" );
        $month106 = array();
  $month106[] = "";    
        while($row106 = $query106->fetch_assoc()){
            $month106[] = $row106['VHI'];
          }
        $query107 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber107' AND year = '$month_date107'" );
        $month107 = array();
  $month107[] = "";    
        while($row107 = $query107->fetch_assoc()){
            $month107[] = $row107['VHI'];
          }
        $query108 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber108' AND year = '$month_date108'" );
        $month108 = array();
  $month108[] = "";    
        while($row108 = $query108->fetch_assoc()){
            $month108[] = $row108['VHI'];
          }
        
          $third_month_avg1= array();
          $month_final102 = array_merge($month105,$month106,$month107,$month108);
          $third_month_avg1[] = array_sum($month_final102)/4;
  
          //third month
          $dto->modify('-7 days');
          $ret109 = $dto->format('Y-m-d');
          $month_date109 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret110 = $dto->format('Y-m-d');
          $month_date110 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret111 = $dto->format('Y-m-d');
          $month_date111 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret112 = $dto->format('Y-m-d');
          $month_date112 = $dto->format('Y');
          
          $date109 = new DateTime($ret109);
          $weeknumber109 = $date109->format("W");
          
          $date110 = new DateTime($ret110);
          $weeknumber110 = $date110->format("W");
          
          $date111 = new DateTime($ret111);
          $weeknumber111 = $date111->format("W");
          
           $date112 = new DateTime($ret112);
         $weeknumber112 = $date112->format("W");
          
          
      $query109 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber109' AND year = '$month_date109'" );
      $month109 = array();
  $month109[] = "";        
      while($row109 = $query109->fetch_assoc()){
              $month109[] = $row109['VHI'];
            }
          $query110 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber110' AND year = '$month_date110'" );
          $month110 = array();
  $month110[] = "";   
          while($row110 = $query110->fetch_assoc()){
              $month110[] = $row110['VHI'];
            }
          $query111 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber111' AND year = '$month_date111'" );
          $month111 = array();
  $month111[] = "";    
          while($row111 = $query111->fetch_assoc()){
              $month111[] = $row111['VHI'];
            }
          $query112 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber112' AND year = '$month_date112'" );
          $month112 = array();
  $month112[] = "";    
          while($row112 = $query112->fetch_assoc()){
              $month112[] = $row112['VHI'];
            }
          
            $third_month_avg2= array();
            $month_final103 = array_merge($month109,$month110,$month111,$month112);
            $third_month_avg2[] = array_sum($month_final103)/4;
        //four month
        $dto->modify('-7 days');
      $ret113 = $dto->format('Y-m-d');
      $month_date113 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret114 = $dto->format('Y-m-d');
      $month_date114 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret115 = $dto->format('Y-m-d');
      $month_date115 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret116 = $dto->format('Y-m-d');
      $month_date116 = $dto->format('Y');
      
      $date113 = new DateTime($ret113);
       $weeknumber113 = $date113->format("W");
      
      $date114 = new DateTime($ret114);
      $weeknumber114 = $date114->format("W");
      
      $date115 = new DateTime($ret115);
      $weeknumber115 = $date115->format("W");
      
      $date116 = new DateTime($ret116);
      $weeknumber116 = $date116->format("W");
      
      
  $query113 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber113' AND year = '$month_date113'" );
  $month113 = array();
  $month113[] = "";        
  while($row113 = $query113->fetch_assoc()){
          $month113[] = $row113['VHI'];
        }
        // echo json_encode($month113);
      $query114 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber114' AND year = '$month_date114'" );
      $month114 = array();
  $month114[] = "";    
      while($row114 = $query114->fetch_assoc()){
          $month114[] = $row114['VHI'];
        }
      $query115 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber115' AND year = '$month_date115'" );
      $month115 = array();
  $month115[] = "";    
      while($row115 = $query115->fetch_assoc()){
          $month115[] = $row115['VHI'];
        }
      $query116 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber116' AND year = '$month_date116'" );
      $month116 = array();
  $month116[] = "";    
      while($row116 = $query116->fetch_assoc()){
          $month116[] = $row116['VHI'];
        }
      
        $third_month_avg3= array();
        $month_final104 = array_merge($month113,$month114,$month115,$month116);
        $third_month_avg3[] = array_sum($month_final104)/4;
  
        //five month
        $dto->modify('-7 days');
      $ret117 = $dto->format('Y-m-d');
      $month_date117 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret118 = $dto->format('Y-m-d');
      $month_date118 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret119 = $dto->format('Y-m-d');
      $month_date119 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret120 = $dto->format('Y-m-d');
      $month_date120 = $dto->format('Y');
      
      $date117 = new DateTime($ret117);
     $weeknumber117 = $date117->format("W");
      
      $date118 = new DateTime($ret118);
      $weeknumber118 = $date118->format("W");
      
      $date119 = new DateTime($ret119);
      $weeknumber119 = $date119->format("W");
      
      $date120 = new DateTime($ret120);
      $weeknumber120 = $date120->format("W");
      
      
      $query117 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber117' AND year = '$month_date117'" );
      $month117 = array();
  $month117[] = "";    
      while($row117 = $query117->fetch_assoc()){
          $month117[] = $row117['VHI'];
        }
        $query118 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber118' AND year = '$month_date118'" );
        $month118 = array();
  $month118[] = "";  
        while($row118 = $query118->fetch_assoc()){
          $month118[] = $row118['VHI'];
        }
        $query119 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber119' AND year = '$month_date119'" );
        $month119 = array();
  $month119[] = "";  
        while($row119 = $query119->fetch_assoc()){
          $month119[] = $row119['VHI'];
        }
        $query120 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber120' AND year = '$month_date120'" );
        $month120 = array();
  $month120[] = "";  
        while($row120 = $query120->fetch_assoc()){
          $month120[] = $row120['VHI'];
        }
      
        $third_month_avg4= array();
        $month_final105 = array_merge($month117,$month118,$month119,$month120);
        $third_month_avg4[] = array_sum($month_final105)/4;
  
  //       //six month
        $dto->modify('-7 days');
      $ret221 = $dto->format('Y-m-d');
      $month_date221 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret222 = $dto->format('Y-m-d');
      $month_date222 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret223 = $dto->format('Y-m-d');
      $month_date223 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret224 = $dto->format('Y-m-d');
      $month_date224 = $dto->format('Y');
      
      $date221 = new DateTime($ret221);
      $weeknumber221 = $date221->format("W");
      
      $date222 = new DateTime($ret222);
      $weeknumber222 = $date222->format("W");
      
      $date223 = new DateTime($ret223);
      $weeknumber223 = $date223->format("W");
      
      $date224 = new DateTime($ret224);
      $weeknumber224 = $date224->format("W");
      
      
      $query221 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber221' AND year = '$month_date221'" );
      $month221 = array();
  $month221[] = "";    
      while($row221 = $query221->fetch_assoc()){
          $month221[] = $row221['VHI'];
        }
        $query222 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber222' AND year = '$month_date222'" );
        $month222 = array();
  $month222[] = ""; 
        while($row222 = $query222->fetch_assoc()){
          $month222[] = $row222['VHI'];
        }
        $query223 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber223' AND year = '$month_date223'" );
        $month223 = array();
  $month223[] = ""; 
        while($row223 = $query223->fetch_assoc()){
          $month223[] = $row223['VHI'];
        }
        $query224 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber224' AND year = '$month_date224'" );
        $month224 = array();
  $month224[] = ""; 
        while($row224 = $query224->fetch_assoc()){
          $month224[] = $row224['VHI'];
        }
      
        $third_month_avg5= array();
        $month_final106 = array_merge($month221,$month222,$month223,$month224);
        $third_month_avg5[] = array_sum($month_final106)/4;
  
  // //       //seven month
        $dto->modify('-7 days');
      $ret225 = $dto->format('Y-m-d');
      $month_date225 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret226 = $dto->format('Y-m-d');
      $month_date226 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret227 = $dto->format('Y-m-d');
      $month_date227 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret228 = $dto->format('Y-m-d');
      $month_date228 = $dto->format('Y');
      
      $date225 = new DateTime($ret225);
      $weeknumber225 = $date225->format("W");
      
      $date226 = new DateTime($ret226);
      $weeknumber226 = $date226->format("W");
      
      $date227 = new DateTime($ret227);
      $weeknumber227 = $date227->format("W");
      
      $date228 = new DateTime($ret228);
      $weeknumber228 = $date228->format("W");
      
      
      $query225 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber225' AND year = '$month_date225'" );
      $month225 = array();
  $month225[] = "";   
      while($row225 = $query225->fetch_assoc()){
          $month225[] = $row225['VHI'];
        }
        $query226 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber226' AND year = '$month_date226'" );
        $month226 = array();
  $month226[] = ""; 
        while($row226 = $query226->fetch_assoc()){
          $month226[] = $row226['VHI'];
        }
        $query227 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber227' AND year = '$month_date227'" );
        $month227 = array();
  $month227[] = ""; 
        while($row227 = $query227->fetch_assoc()){
          $month227[] = $row227['VHI'];
        }
        $query228 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber228' AND year = '$month_date228'" );
        $month228 = array();
  $month228[] = ""; 
        while($row228 = $query228->fetch_assoc()){
          $month228[] = $row228['VHI'];
        }
      
        $third_month_avg6= array();
        $month_final107 = array_merge($month225,$month226,$month227,$month228);
        $third_month_avg6[] = array_sum($month_final107)/4;
        //eight month
        $dto->modify('-7 days');
        $ret229 = $dto->format('Y-m-d');
        $month_date229 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret230 = $dto->format('Y-m-d');
        $month_date230 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret231 = $dto->format('Y-m-d');
         $month_date231 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret232 = $dto->format('Y-m-d');
        $month_date232 = $dto->format('Y');
        
        $date229 = new DateTime($ret229);
        $weeknumber229 = $date229->format("W");
        
        $date230 = new DateTime($ret230);
        $weeknumber230 = $date230->format("W");
        
        $date231 = new DateTime($ret231);
        $weeknumber231 = $date231->format("W");
        
        $date232 = new DateTime($ret232);
        $weeknumber232 = $date232->format("W");
        
        
        $query229 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber229' AND year = '$month_date229'" );
        $month229 = array();
  $month229[] = "";   
        while($row229 = $query229->fetch_assoc()){
            $month229[] = $row229['VHI'];
          }
          $query230 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber230' AND year = '$month_date230'" );
          $month230 = array();
  $month230[] = ""; 
          while($row230 = $query230->fetch_assoc()){
            $month230[] = $row230['VHI'];
          }
          $query231 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber231' AND year = '$month_date231'" );
          $month231 = array();
  $month231[] = ""; 
          while($row231 = $query231->fetch_assoc()){
            $month231[] = $row231['VHI'];
          }
          $query232 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber232' AND year = '$month_date232'" );
          $month232 = array();
  $month232[] = ""; 
          while($row232 = $query232->fetch_assoc()){
            $month232[] = $row232['VHI'];
          }
        
          $third_month_avg7= array();
          $month_final108 = array_merge($month229,$month230,$month231,$month232);
          $third_month_avg7[] = array_sum($month_final108)/4;
  
  //       //nine month
        $dto->modify('-7 days');
        $ret233 = $dto->format('Y-m-d');
        $month_date233 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret234 = $dto->format('Y-m-d');
        $month_date234 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret235 = $dto->format('Y-m-d');
        $month_date235 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret236 = $dto->format('Y-m-d');
        $month_date236 = $dto->format('Y');
        
        $date233 = new DateTime($ret233);
        $weeknumber233 = $date233->format("W");
        
        $date234 = new DateTime($ret234);
        $weeknumber234 = $date234->format("W");
        
        $date235 = new DateTime($ret235);
        $weeknumber235 = $date235->format("W");
        
        $date236 = new DateTime($ret236);
        $weeknumber236 = $date236->format("W");
        
        
        $query233 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber233' AND year = '$month_date233'" );
        $month233 = array();
  $month233[] = "";   
        while($row233 = $query233->fetch_assoc()){
            $month233[] = $row233['VHI'];
          }
          $query234 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber234' AND year = '$month_date234'" );
          $month234 = array();
  $month234[] = ""; 
          while($row234 = $query234->fetch_assoc()){
            $month234[] = $row234['VHI'];
          }
          $query235 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber235' AND year = '$month_date235'" );
          $month235 = array();
  $month235[] = ""; 
          while($row235 = $query235->fetch_assoc()){
            $month235[] = $row235['VHI'];
          }
          $query236 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber236' AND year = '$month_date236'" );
          $month236 = array();
  $month236[] = ""; 
          while($row236 = $query236->fetch_assoc()){
            $month236[] = $row236['VHI'];
          }
        
          $third_month_avg8= array();
          $month_final109 = array_merge($month233,$month234,$month235,$month236);
          $third_month_avg8[] = array_sum($month_final109)/4;
  
  // //ten month
  $dto->modify('-7 days');
      $ret237 = $dto->format('Y-m-d');
      $month_date237 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret238 = $dto->format('Y-m-d');
      $month_date238 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret239 = $dto->format('Y-m-d');
      $month_date239 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret240 = $dto->format('Y-m-d');
      $month_date240 = $dto->format('Y');
      
      $date237 = new DateTime($ret237);
      $weeknumber237 = $date237->format("W");
      
      $date238 = new DateTime($ret238);
      $weeknumber238 = $date238->format("W");
      
      $date239 = new DateTime($ret239);
      $weeknumber239 = $date239->format("W");
      
      $date240 = new DateTime($ret240);
      $weeknumber240 = $date240->format("W");
      
      
      $query237 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber237' AND year = '$month_date237'" );
      $month237 = array();
  $month237[] = "";   
      while($row237 = $query237->fetch_assoc()){
          $month237[] = $row237['VHI'];
        }
        $query238 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber238' AND year = '$month_date238'" );
        $month238 = array();
  $month238[] = ""; 
        while($row238 = $query238->fetch_assoc()){
          $month238[] = $row238['VHI'];
        }
        $query239 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber239' AND year = '$month_date239'" );
        $month239 = array();
  $month239[] = ""; 
        while($row239 = $query239->fetch_assoc()){
          $month239[] = $row239['VHI'];
        }
        $query240 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber240' AND year = '$month_date240'" );
        $month240 = array();
  $month240[] = ""; 
        while($row240 = $query240->fetch_assoc()){
          $month240[] = $row240['VHI'];
        }
      
        $third_month_avg9= array();
        $month_final110 = array_merge($month237,$month238,$month239,$month240);
        $third_month_avg9[] = array_sum($month_final110)/4;
  
  //       //eleven month
        $dto->modify('-7 days');
      $ret241 = $dto->format('Y-m-d');
      $month_date241 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret242 = $dto->format('Y-m-d');
      $month_date242 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret243 = $dto->format('Y-m-d');
      $month_date243 = $dto->format('Y');
      
      $dto->modify('-7 days');
      $ret244 = $dto->format('Y-m-d');
      $month_date244 = $dto->format('Y');
      
      $date241 = new DateTime($ret241);
      $weeknumber241 = $date241->format("W");
      
      $date242 = new DateTime($ret242);
      $weeknumber242 = $date242->format("W");
      
      $date243 = new DateTime($ret243);
      $weeknumber243 = $date243->format("W");
      
      $date244 = new DateTime($ret244);
      $weeknumber244 = $date244->format("W");
      
      
      $query241 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber241' AND year = '$month_date241'" );
      $month241 = array();
      $month241[] = "";   
      while($row241 = $query241->fetch_assoc()){
          $month241[] = $row241['VHI'];
        }
        $query242 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber242' AND year = '$month_date242'" );
        $month242 = array();
        $month242[] = ""; 
        while($row242 = $query242->fetch_assoc()){
          $month242[] = $row242['VHI'];
        }
        $query243 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber243' AND year = '$month_date243'" );
        $month243 = array();
        $month243[] = ""; 
        while($row243 = $query243->fetch_assoc()){
          $month243[] = $row243['VHI'];
        }
        $query244 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber244' AND year = '$month_date244'" );
        $month244 = array();
        $month244[] = ""; 
        while($row244 = $query244->fetch_assoc()){
          $month244[] = $row244['VHI'];
        }
      
        $third_month_avg10= array();
        $month_final111 = array_merge($month241,$month242,$month243,$month244);
        $third_month_avg10[] = array_sum($month_final111)/4;
        
  //       //twelvw month
        $dto->modify('-7 days');
        $ret245 = $dto->format('Y-m-d');
        $month_date245 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret246 = $dto->format('Y-m-d');
        $month_date246 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret247 = $dto->format('Y-m-d');
        $month_date247 = $dto->format('Y');
        
        $dto->modify('-7 days');
        $ret248 = $dto->format('Y-m-d');
        $month_date248 = $dto->format('Y');
        
        $date245 = new DateTime($ret245);
        $weeknumber245 = $date245->format("W");
        
        $date246 = new DateTime($ret246);
        $weeknumber246 = $date246->format("W");
        
        $date247 = new DateTime($ret247);
        $weeknumber247 = $date247->format("W");
        
        $date248 = new DateTime($ret248);
        $weeknumber248 = $date248->format("W");
        
        
        $query245 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber245' AND year = '$month_date245'" );
        $month245 = array();
  $month245[] = "";   
        while($row245 = $query245->fetch_assoc()){
            $month245[] = $row245['VHI'];
          }
          $query246 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber246' AND year = '$month_date246'" );
          $month246 = array();
  $month246[] = ""; 
          while($row246 = $query246->fetch_assoc()){
            $month246[] = $row246['VHI'];
          }
          $query247 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber247' AND year = '$month_date247'" );
          $month247 = array();
  $month247[] = ""; 
          while($row247 = $query247->fetch_assoc()){
            $month247[] = $row247['VHI'];
          }
          $query248 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber248' AND year = '$month_date248'" );
          $month248 = array();
  $month248[] = ""; 
          while($row248 = $query248->fetch_assoc()){
            $month248[] = $row248['VHI'];
          }
        
          $third_month_avg11= array();
          $month_final112 = array_merge($month245,$month246,$month247,$month248);
          $third_month_avg11[] = array_sum($month_final112)/4;
  
          //extra month
          $dto->modify('-7 days');
          $ret_245 = $dto->format('Y-m-d');
          $month_date_245 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret_246 = $dto->format('Y-m-d');
          $month_date_246 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret_247 = $dto->format('Y-m-d');
          $month_date_247 = $dto->format('Y');
          
          $dto->modify('-7 days');
          $ret_248 = $dto->format('Y-m-d');
          $month_date_248 = $dto->format('Y');
          
          $date_245 = new DateTime($ret_245);
          $weeknumber_245 = $date_245->format("W");
          
          $date_246 = new DateTime($ret_246);
          $weeknumber_246 = $date_246->format("W");
          
          $date_247 = new DateTime($ret_247);
          $weeknumber_247 = $date_247->format("W");
          
          $date_248 = new DateTime($ret_248);
          $weeknumber_248 = $date_248->format("W");
          
          
          $query_245 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_245' AND year = '$month_date_245'" );
          $month_245 = array();
    $month_245[] = "";   
          while($row_245 = $query_245->fetch_assoc()){
              $month_245[] = $row_245['VHI'];
            }
            $query_246 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_246' AND year = '$month_date_246'" );
            $month_246 = array();
    $month_246[] = ""; 
            while($row_246 = $query_246->fetch_assoc()){
              $month_246[] = $row_246['VHI'];
            }
            $query_247 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_247' AND year = '$month_date_247'" );
            $month_247 = array();
    $month_247[] = ""; 
            while($row247 = $query_247->fetch_assoc()){
              $month_247[] = $row247['VHI'];
            }
            $query_248 =$con->query("SELECT VHI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber_248' AND year = '$month_date_248'" );
            $month_248 = array();
    $month_248[] = ""; 
            while($row_248 = $query_248->fetch_assoc()){
              $month_248[] = $row_248['VHI'];
            }
          
            $third_month_avg_11= array();
            $month_final_113 = array_merge($month_245,$month_246,$month_247,$month_248);
            $third_month_avg_11[] = array_sum($month_final_113)/4;
  
          $one_month_date = array();
          $second_month_date =array();
          $third_month_date = array();

  
          
            $one_month_date[] = strval($one_monthly);
            $second_month_date[] = strval($second_monthly);
            $third_month_date[] = strval($third_monthly);

  
          $date_array = array_merge($third_month_date,$second_month_date,$one_month_date);
          
          $final_month_array_avg = array_merge($extra_month_avg,$twelve_month_avg,$eleven_month_avg,$ten_month_avg,$nine_month_avg,$eight_month_avg,$seven_month_avg,$six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
          // echo $final_month_array_avg;
  
          $final_month_array = array();
          $final_month_array[] = array_sum($final_month_array_avg)/count($final_month_array_avg);
  
          $final_month_array_avg1 = array_merge($second_year_avg,$second_year_avg1,$second_year_avg2,$second_year_avg3,$second_year_avg4,$second_year_avg5,$second_year_avg6,$second_year_avg7,$second_year_avg8,$second_year_avg9,$second_year_avg10,$second_year_avg11,$second_year_avg_11);
  
          // // echo $final_month_array_avg1;
  
          $final_month_array1 = array();
          $final_month_array1[] = array_sum($final_month_array_avg1)/count($final_month_array_avg1);
  
          $final_month_array_avg2 = array_merge($third_month_avg,$third_month_avg1,$third_month_avg2,$third_month_avg3,$third_month_avg4,$third_month_avg5,$third_month_avg6,$third_month_avg7,$third_month_avg8,$third_month_avg9,$third_month_avg10,$third_month_avg11,$third_month_avg_11);
  
          $final_month_array2 = array();
          $final_month_array2[] = array_sum($final_month_array_avg2)/count($final_month_array_avg2);
          $yearly_month_array =array();
          $yearly_month_array = array_merge($final_month_array2,$final_month_array1,$final_month_array);
  
    $return_data = array();
    $return_data['yearly_month_array'] =$yearly_month_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  
  
  }
  
  else{
    $dto = new DateTime();
  $dto->setISODate($year,$week);
  $ret = $dto->format('Y-m-d');
  $month_date1 = $dto->format('Y');
  $one_monthly =date("Y - M",strtotime($ret));

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
    $month1 = array();
    $month1[] = "";
    while($row1 = $query1->fetch_assoc()){
      $month1[] = $row1['NDVI'];
    }
  
  $query2 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$month_date2'" );
  $month2 = array();
    $month2[] = "";  
  while($row2 = $query2->fetch_assoc()){
      $month2[] = $row2['NDVI'];
    }
  
    $query3 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$month_date3'" );
    $month3 = array();
    $month3[] = "";
    while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['NDVI'];
    }
  
    $query4 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$month_date4'" );
    $month4 = array();
    $month4[] = "";
    while($row4 = $query4->fetch_assoc()){
      $month4[] = $row4['NDVI'];
    }
  
  $one_month_avg=array();
   $month_final1 = array_merge($month4,$month3,$month2,$month1);
   $one_month_avg[] = array_sum($month_final1)/4;
  
   // ------------------------------------------------------------------------------------//
  
   // second month
  $dto->modify('-7 days');
  $ret5 = $dto->format('Y-m-d');
  $month_date5 = $dto->format('Y');
  $second_monthly =date("Y - M",strtotime($ret5));

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
  $month5 = array();
    $month5[] = "";  
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['NDVI'];
    }
    $query6 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$month_date6'" );
    $month6 = array();
    $month6[] = "";
    while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['NDVI'];
    }
    $query7 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$month_date7'" );
    $month7 = array();
    $month7[] = "";
    while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['NDVI'];
    }
    $query8 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber7' AND year = '$month_date8'" );
    $month8 = array();
    $month8[] = "";
    while($row8 = $query8->fetch_assoc()){
      $month8[] = $row8['NDVI'];
    }
  
    $second_month_avg= array();
    $month_final2 = array_merge($month5,$month6,$month7,$month8);
    $second_month_avg[] = array_sum($month_final2)/4;
  
  //-------------------------------------------------------------------------------------------------------
    //Third month
  
  $dto->modify('-7 days');
  $ret9 = $dto->format('Y-m-d');
  $month_date9 = $dto->format('Y');
  $third_monthly =date("Y - M",strtotime($ret9));

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
  $month9 = array();
    $month9[] = "";  
  while($row9 = $query9->fetch_assoc()){
      $month9[] = $row9['NDVI'];
    }
    // echo json_encode($month9);
    $query10 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber10' AND year = '$month_date10'" );
    $month10 = array();
    $month10[] = "";
    while($row10 = $query10->fetch_assoc()){
      $month10[] = $row10['NDVI'];
    }
    $query11 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber11' AND year = '$month_date11'" );
    $month11 = array();
    $month11[] = "";
    while($row11 = $query11->fetch_assoc()){
      $month11[] = $row11['NDVI'];
    }
    
    $query12 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber12' AND year = '$month_date12'" );
    $month12 = array();
    $month12[] = "";
    while($row12 = $query12->fetch_assoc()){
      $month12[] = $row12['NDVI'];
    }
  
    $third_month_avg= array();
    $month_final3 = array_merge($month9,$month10,$month11,$month12);
    $third_month_avg[] = array_sum($month_final3)/4;
  
     /* ============================================================================================*/
     //four month
  
  $dto->modify('-7 days');
  $ret13 = $dto->format('Y-m-d');
  $month_date13 = $dto->format('Y');
  $four_monthly =date("Y - M",strtotime($ret13));

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
  $month13 = array();
    $month13[] = "";  
  while($row13 = $query13->fetch_assoc()){
      $month13[] = $row13['NDVI'];
    }
    $query14 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber14' AND year = '$month_date14'" );
    $month14 = array();
    $month14[] = "";
    while($row14 = $query14->fetch_assoc()){
      $month14[] = $row14['NDVI'];
    }
    $query15 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber15' AND year = '$month_date15'" );
    $month15 = array();
    $month15[] = "";
    while($row15 = $query15->fetch_assoc()){
      $month15[] = $row15['NDVI'];
    }
    $query16 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber16' AND year = '$month_date16'" );
    $month16 = array();
    $month16[] = "";
    while($row16 = $query16->fetch_assoc()){
      $month16[] = $row16['NDVI'];
    }
  
    $four_month_avg= array();
    $month_final4 = array_merge($month13,$month14,$month15,$month16);
    $four_month_avg[] = array_sum($month_final4)/4;
  
    /*============================================================================*/
    // five month
    $dto->modify('-7 days');
  $ret17 = $dto->format('Y-m-d');
  $month_date17 = $dto->format('Y');
  $five_monthly =date("Y - M",strtotime($ret17));

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
  $month17 = array();
    $month17[] = "";  
  while($row17 = $query17->fetch_assoc()){
      $month17[] = $row17['NDVI'];
    }
    $query18 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber18' AND year = '$month_date18'" );
    $month18 = array();
    $month18[] = "";
    while($row18 = $query18->fetch_assoc()){
      $month18[] = $row18['NDVI'];
    }
    $query19 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber19' AND year = '$month_date19'" );
    $month19 = array();
    $month19[] = "";
    while($row19 = $query19->fetch_assoc()){
      $month19[] = $row19['NDVI'];
    }
    $query20 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber20' AND year = '$month_date20'" );
    $month20 = array();
    $month20[] = "";
    while($row20 = $query20->fetch_assoc()){
      $month20[] = $row20['NDVI'];
    }
  
    $five_month_avg= array();
    $month_final5 = array_merge($month17,$month18,$month19,$month20);
    $five_month_avg[] = array_sum($month_final5)/4;
  
  /*--------------------------------------------------------------------------------------------*/
  //six month
  $dto->modify('-7 days');
  $ret21 = $dto->format('Y-m-d');
  $month_date21 = $dto->format('Y');
  $six_monthly =date("Y - M",strtotime($ret21));

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
  $month21 = array();
    $month21[] = "";  
  while($row21 = $query21->fetch_assoc()){
      $month21[] = $row21['NDVI'];
    }
    $query22 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber22' AND year = '$month_date22'" );
    $month22 = array();
    $month22[] = "";
    while($row22 = $query22->fetch_assoc()){
      $month22[] = $row22['NDVI'];
    }
    $query23 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber23' AND year = '$month_date23'" );
    $month23 = array();
    $month23[] = "";
    while($row23 = $query23->fetch_assoc()){
      $month23[] = $row23['NDVI'];
    }
    $query24 =$con->query("SELECT NDVI  from `crop` where d_id = ".$d_id."  AND week = '$weeknumber24' AND year = '$month_date24'" );
    $month24 = array();
    $month24[] = "";
    while($row24 = $query24->fetch_assoc()){
      $month24[] = $row24['NDVI'];
    }
  
    $six_month_avg= array();
    $month_final6 = array_merge($month21,$month22,$month23,$month24);
    $six_month_avg[] = array_sum($month_final6)/4;
  
  
      $one_month_date = array();
      $second_month_date =array();
      $third_month_date = array();
      $four_month_date = array();
      $five_month_date = array();
      $six_month_date = array();
  
  
      $one_month_date[] = strval($one_monthly);
      $second_month_date[] = strval($second_monthly);
      $third_month_date[] = strval($third_monthly);
      $four_month_date[] = strval($four_monthly);
      $five_month_date[] = strval($five_monthly);
      $six_month_date[] = strval($six_monthly);
  
  
      $date_array = array_merge($six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
      $yearly_month_array = array_merge($six_month_avg,$five_month_avg,$four_month_avg,$third_month_avg,$second_month_avg,$one_month_avg);
  
    $return_data = array();
    $return_data['yearly_month_array'] =$yearly_month_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  
  }
?>