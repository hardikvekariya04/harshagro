<?php
$con = new mysqli('localhost','root','','agro');
$taluka_id = $_POST['taluka_id'];
$date_id = $_POST['date_id'];
$temp_id = $_POST['temp_id'];

//last 7 days data fetch :
// $date1 = $date_id;
// $date1 = strtotime($date_id);
// // $monthly = date('Y-m-d', strtotime($date_id. ' - 1 month')); 
// // $date10 =strtotime($date1. '+0 day');
// // $date2 = strtotime($date1. '-1 day');
// // $date3 = strtotime($date1. '-2 day');
// // $date4 = strtotime($date1. '-3 day');
// // $date5 = strtotime($date1. '-4 day');
// // $date6 = strtotime($date1. '-5 day');
// // $date7 = strtotime($date1. '-6 day');
$dates1 =  date('Y-m-d', strtotime($date_id. '+0 day'));
// $hardik_dates = date('m', strtotime($dates1);
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
// else{

// $dates1 =  date('Y-m-d', strtotime($date_id. '+0 day'));
// $dates2  =date('Y-m-d', strtotime($dates1. '-1 day'));
// $dates3  =date('Y-m-d', strtotime($dates2.'-2 day'));
// $dates4  =date('Y-m-d', strtotime($dates3.'-1 day'));
// $dates5  =date('Y-m-d', strtotime($dates4.'-1 day'));
// $dates6  =date('Y-m-d', strtotime($dates5.'-1 day'));
// $dates7  =date('Y-m-d', strtotime($dates6.'-1 day'));


//   $query1 =$con->query("SELECT min_temp,date from newdata where taluka_id = ".$taluka_id." AND date IN('$dates1')" );
//   $month = array();
//   // $amount = array();
//   while($row1 = $query1->fetch_assoc()){
//     $month[] = $row1['min_temp'];
//     $amount[] = $row1['date'];
//   }

//   $query2 =$con->query("SELECT min_temp,date from newdata where taluka_id = ".$taluka_id." AND date IN('$dates2')" );
//   $month2 = array();
//   // $amount = array();
//   while($row2 = $query2->fetch_assoc()){
//     $month2[] = $row2['min_temp'];
//     $amount2[] = $row2['date'];
//   }

//   $query3 =$con->query("SELECT min_temp,date from newdata where taluka_id = ".$taluka_id." AND date IN('$dates3')" );
//   $month3 = array();
//   // $amount = array();
//   while($row3 = $query3->fetch_assoc()){
//     $month3[] = $row3['min_temp'];
//     $amount3[] = $row3['date'];
//   }

//   $query4 =$con->query("SELECT min_temp,date from newdata where taluka_id = ".$taluka_id." AND date IN('$dates4')" );
//   $month4 = array();
//   // $amount = array();
//   while($row4 = $query4->fetch_assoc()){
//     $month4[] = $row4['min_temp'];
//     $amount4[] = $row4['date'];
//   }

//   $query5 =$con->query("SELECT min_temp,date from newdata where taluka_id = ".$taluka_id." AND date IN('$dates5')" );
//   $month5 = array();
//   // $amount = array();
//   while($row5 = $query5->fetch_assoc()){
//     $month5[] = $row5['min_temp'];
//     $amount[] = $row5['date'];
//   }

//   $query6 =$con->query("SELECT min_temp,date from newdata where taluka_id = ".$taluka_id." AND date IN('$dates6')" );
//   $month6 = array();
//   // $amount = array();
//   while($row6 = $query6->fetch_assoc()){
//     $month6[] = $row6['min_temp'];
//     $amount[] = $row6['date'];
//   }

//     $hardik_one_date = array();
//     $hardik_second_date =array();
//     $hardik_third_date = array();
//     $hardik_four_date = array();
//     $hardik_five_date = array();
//     $hardik_six_date = array();

//     $hardik_one_date[] = strval($dates1);
//     $hardik_second_date[] = strval($dates2);
//     $hardik_third_date[] = strval($dates3);
//     $hardik_four_date[] = strval($dates4);
//     $hardik_five_date[] = strval($dates5);
//     $hardik_six_date[] = strval($dates6);
// // $final_array = array();
//     $final_array = array_merge($month,$month2,$month3,$month4,$month5,$month6);
//     $date_array = array_merge($hardik_one_date,$hardik_second_date,$hardik_third_date,$hardik_four_date,$hardik_five_date,$hardik_six_date);


//   $return_data = array();
//     $return_data['final_array'] = $final_array; 
//     $return_data['date_array'] = $date_array;
//     echo json_encode($return_data);
// }
  // echo '<br>';


//last 6 months
// $query_Date = $date_id;
// $final_date = $date_id;
// $monthly = date('Y-m-d', strtotime($final_date. ' - 1 month')); 
// $monthly1 = date('Y-m-d', strtotime($monthly. ' - 1 month')); 
// $monthly2 =date('Y-m-d', strtotime($monthly1. ' - 1 month')); 
// $monthly3 =date('Y-m-d', strtotime($monthly2. ' - 1 month')); 
// $monthly4 =date('Y-m-d', strtotime($monthly3. ' - 1 month')); 
// $monthly5 =date('Y-m-d', strtotime($monthly4. ' - 1 month')); 
//   $query_bar =$con->query("SELECT max_temp,date from newdata where taluka_id = ".$taluka_id." AND date > date_sub('$query_Date',Interval 1 month)" );
//   $bar_chart_month = array();
//   $bar_chart_amount = array();
//   while($row = $query_bar->fetch_assoc()){
//       $bar_chart_month[] = $row['max_temp'];
//       $bar_chart_amount[] = $row['date'];
//     }
//     $return_data_bar = array();
//     $return_data_bar['bar_chart_month'] = $bar_chart_month; 
//     $return_data_bar['bar_chart_amount'] = $bar_chart_amount;
//     echo json_encode($return_data_bar);

// $query_Date = $date_id;
// $final_date = '2018-09-30';
// $monthly = date('Y-m-d', strtotime($final_date. ' - 1 month')); 
// $monthly1 = date('Y-m-d', strtotime($monthly. ' - 1 month')); 
// $monthly2 =date('Y-m-d', strtotime($monthly1. ' - 1 month')); 
// $monthly3 =date('Y-m-d', strtotime($monthly2. ' - 1 month')); 
// $monthly4 =date('Y-m-d', strtotime($monthly3. ' - 1 month')); 
// $monthly5 =date('Y-m-d', strtotime($monthly4. ' - 1 month')); 
//   //$query =$con->query("SELECT max_temp,date from newdata where taluka_id = 2 AND date IN(date_sub('$query_Date',Interval 1 month))" );
//   $query =$con->query("SELECT max_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$date_id',Interval 1 month)) < date && date <= '.$date_id.'");
//   // $avg_high_temp1 = array();
//   // $query_Date = array();
//   while($row = $query->fetch_assoc()){
//       $month[] = $row['max_temp'];
//       $amount20[] = $row['date'];
//     }
//   echo  json_encode($month);
//   echo $months1;
//   $first_month =  implode (",",$months1);  
//   // echo $hardik;
// $month_temp1 = $first_month;//string
// $temp_array1 = explode(',', $month_temp1);
// $tot_temp1 = 0;
// $temp_array_length1 = count($temp_array1);
// foreach($temp_array1 as $temp1)
// {
//  $tot_temp1 += $temp1;
// }
//  $avg_high_temp1 = $tot_temp1/$temp_array_length1;

//  echo "Average Temperature is : ".$avg_high_temp1.""; 
//     $return_data_bar = array();
//     $return_data_bar['avg_high_temp1'] = $avg_high_temp1; 
//     $return_data_bar['query_Date'] = $query_Date;
//     echo json_encode($return_data_bar);



// $query_Date = $date_id;
// $final_date = '2018-09-30';
// $monthly = date('Y-m-d', strtotime($final_date. ' - 1 month')); 
// $monthly1 = date('Y-m-d', strtotime($monthly. ' - 1 month')); 
// $monthly2 =date('Y-m-d', strtotime($monthly1. ' - 1 month')); 
// $monthly3 =date('Y-m-d', strtotime($monthly2. ' - 1 month')); 
// $monthly4 =date('Y-m-d', strtotime($monthly3. ' - 1 month')); 
// $monthly5 =date('Y-m-d', strtotime($monthly4. ' - 1 month')); 
//   //$query =$con->query("SELECT max_temp,date from newdata where taluka_id = 2 AND date IN(date_sub('$query_Date',Interval 1 month))" );
//   $query =$con->query("SELECT max_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$date_id',Interval 1 month)) < date && date <= '.$date_id.'");
// //   $avg_high_temp1 = array();
// $month1 = array();
// //   $date_id = array();
// $amount1 = array();
//   while($row = $query->fetch_assoc()){
//       $month1[] = $row['max_temp'];
//       $amount1[] = $row['date'];
//     }
// //     $months1 =  json_encode($month);
// //     echo '<br>';
// //     $first_month =  implode (",",$month);  
// //     // echo $hardik;
// //   $month_temp1 = $first_month;//string
// //   $temp_array1 = explode(',', $month_temp1);
// //   $tot_temp1 = 0;
// //   $temp_array_length1 = count($temp_array1);
// //   foreach($temp_array1 as $temp1)
// //   {
// //    $tot_temp1 += $temp1;
// //   }
// //    $avg_high_temp1 = $tot_temp1/$temp_array_length1;
  
// //    echo "hardik Average Temperature is : ".$avg_high_temp1.""; 
// //    $return_data = array();
// //    $return_data['avg_high_temp1'] = $avg_high_temp1;
// //    $return_data['date_id'] = $date_id;
// //    echo json_encode($return_data);
// $return_data = array();
// $return_data['month1'] = $month1; 
// $return_data['amount1'] = $amount1;
// echo json_encode($return_data);
?>