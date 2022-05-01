<?php
$con = new mysqli('localhost','root','','agrocast');
$d_id = $_POST['d_id'];
$week = $_POST['week'];
$per_id = $_POST['per_id'];

$select_week = substr($week, strpos($week, "W") + 1);
// echo $select_week;
$trim_year = explode('-',trim($week))[0];
// echo $trim_year;
//last 7 days data fetch :

// if($week > '7'){
$dto = new DateTime();
$dto->setISODate($trim_year,$select_week);
$ret = $dto->format('d-m-Y');
$select_year1 = $dto->format('Y');

$dto->modify('-7 days');
$ret2 = $dto->format('d-m-Y');
 $select_year2 = $dto->format('Y');

$dto->modify('-7 days');
$ret3 = $dto->format('d-m-Y');
 $select_year3 = $dto->format('Y');

$dto->modify('-7 days');
$ret4 = $dto->format('d-m-Y');
 $select_year4 = $dto->format('Y');

$dto->modify('-7 days');
$ret5 = $dto->format('d-m-Y');
 $select_year5 = $dto->format('Y');

$dto->modify('-7 days');
$ret6 = $dto->format('d-m-Y');
 $select_year6 = $dto->format('Y');

$dto->modify('-7 days');
$ret7 = $dto->format('d-m-Y');
 $select_year7 = $dto->format('Y');

$date = new DateTime($ret2);
 $weeknumber1 = $date->format("W");

$date2 = new DateTime($ret3);
 $weeknumber2 = $date2->format("W");

$date3 = new DateTime($ret4);
 $weeknumber3 = $date3->format("W");

$date4 = new DateTime($ret5);
 $weeknumber4 = $date4->format("W");

$date5 = new DateTime($ret6);
 $weeknumber5 = $date5->format("W");

$date6 = new DateTime($ret7);
 $weeknumber6 = $date6->format("W");

 
$final_first_year = $select_year1."-".$select_week;
$final_second_year = $select_year2."-".$weeknumber1;
$final_third_year = $select_year3."-".$weeknumber2;
$final_four_year = $select_year4."-".$weeknumber3;
$final_five_year = $select_year5."-".$weeknumber4;
$final_six_year = $select_year6."-".$weeknumber5;
$final_seven_year = $select_year7."-".$weeknumber6;

if($per_id === 'NDVI'){
$query1 =$con->query("SELECT NDVI from `district_crop` where d_id = ".$d_id."  AND week = '$select_week' AND year = '$trim_year' " );
  while($row1 = $query1->fetch_assoc()){
    $month[] = $row1['NDVI'];
  }

$query2 =$con->query("SELECT NDVI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$select_year2' " );
  while($row2 = $query2->fetch_assoc()){
    $month1[] = $row2['NDVI'];
  }

$query3 =$con->query("SELECT NDVI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$select_year3' " );
  while($row3 = $query3->fetch_assoc()){
    $month2[] = $row3['NDVI'];
  }

$query4 =$con->query("SELECT NDVI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$select_year4' " );
  while($row4 = $query4->fetch_assoc()){
    $month3[] = $row4['NDVI'];
  }

$query5 =$con->query("SELECT NDVI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$select_year5' " );
  while($row5 = $query5->fetch_assoc()){
    $month4[] = $row5['NDVI'];
  }

  $query6 =$con->query("SELECT NDVI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$select_year6' " );
  while($row6 = $query6->fetch_assoc()){
    $month5[] = $row6['NDVI'];
  }

  $query7 =$con->query("SELECT NDVI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$select_year7' " );
  while($row7 = $query7->fetch_assoc()){
    $month6[] = $row7['NDVI'];
  }

    $one_week_date = array();
    $second_week_date =array();
    $third_week_date = array();
    $four_week_date = array();
    $five_week_date = array();
    $six_week_date = array();
    $seven_week_date = array();

    $one_week_date[] = strval($final_first_year);
    $second_week_date[] = strval($final_second_year);
    $third_week_date[] = strval($final_third_year);
    $four_week_date[] = strval($final_four_year);
    $five_week_date[] = strval($final_five_year);
    $six_week_date[] = strval($final_six_year);
    $seven_week_date[] = strval($final_seven_year);

    $month_final = array_merge($month6,$month5,$month4,$month3,$month2,$month1,$month);
    $final_array = array_merge($seven_week_date,$six_week_date,$five_week_date,$four_week_date,$third_week_date,$second_week_date,$one_week_date);

    $return_data = array();
    $return_data['month_final'] = $month_final; 
    $return_data['final_array'] = $final_array;
    echo json_encode($return_data);
}
elseif($per_id === 'VCI'){
      $query1 =$con->query("SELECT VCI from `district_crop` where d_id = ".$d_id."  AND week = '$select_week' AND year = '$trim_year' " );
        while($row1 = $query1->fetch_assoc()){
          $month[] = $row1['VCI'];
        }
      
      $query2 =$con->query("SELECT VCI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$select_year2' " );
        while($row2 = $query2->fetch_assoc()){
          $month1[] = $row2['VCI'];
        }
      
      $query3 =$con->query("SELECT VCI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$select_year3' " );
        while($row3 = $query3->fetch_assoc()){
          $month2[] = $row3['VCI'];
        }
      
      $query4 =$con->query("SELECT VCI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$select_year4' " );
        while($row4 = $query4->fetch_assoc()){
          $month3[] = $row4['VCI'];
        }
      
      $query5 =$con->query("SELECT VCI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$select_year5' " );
        while($row5 = $query5->fetch_assoc()){
          $month4[] = $row5['VCI'];
        }
      
        $query6 =$con->query("SELECT VCI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$select_year6' " );
        while($row6 = $query6->fetch_assoc()){
          $month5[] = $row6['VCI'];
        }
      
        $query7 =$con->query("SELECT VCI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$select_year7' " );
        while($row7 = $query7->fetch_assoc()){
          $month6[] = $row7['VCI'];
        }
      
          $one_week_date = array();
          $second_week_date =array();
          $third_week_date = array();
          $four_week_date = array();
          $five_week_date = array();
          $six_week_date = array();
          $seven_week_date = array();
      
          $one_week_date[] = strval($final_first_year);
    $second_week_date[] = strval($final_second_year);
    $third_week_date[] = strval($final_third_year);
    $four_week_date[] = strval($final_four_year);
    $five_week_date[] = strval($final_five_year);
    $six_week_date[] = strval($final_six_year);
    $seven_week_date[] = strval($final_seven_year);
      
          $month_final = array_merge($month6,$month5,$month4,$month3,$month2,$month1,$month);
          $final_array = array_merge($seven_week_date,$six_week_date,$five_week_date,$four_week_date,$third_week_date,$second_week_date,$one_week_date);
      
          $return_data = array();
          $return_data['month_final'] = $month_final; 
          $return_data['final_array'] = $final_array;
          echo json_encode($return_data);
}
else{
        $query1 =$con->query("SELECT VHI FROM `district_crop` where d_id = ".$d_id."  AND week = '$select_week' AND year = '$trim_year' " );
          while($row1 = $query1->fetch_assoc()){
            $month[] = $row1['VHI'];
          }
        
        $query2 =$con->query("SELECT VHI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber1' AND year = '$select_year2' " );
          while($row2 = $query2->fetch_assoc()){
            $month1[] = $row2['VHI'];
          }
        
        $query3 =$con->query("SELECT VHI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber2' AND year = '$select_year3' " );
          while($row3 = $query3->fetch_assoc()){
            $month2[] = $row3['VHI'];
          }
        
        $query4 =$con->query("SELECT VHI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber3' AND year = '$select_year4' " );
          while($row4 = $query4->fetch_assoc()){
            $month3[] = $row4['VHI'];
          }
        
        $query5 =$con->query("SELECT VHI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber4' AND year = '$select_year5' " );
          while($row5 = $query5->fetch_assoc()){
            $month4[] = $row5['VHI'];
          }
        
          $query6 =$con->query("SELECT VHI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber5' AND year = '$select_year6' " );
          while($row6 = $query6->fetch_assoc()){
            $month5[] = $row6['VHI'];
          }
        
          $query7 =$con->query("SELECT VHI from `district_crop` where d_id = ".$d_id."  AND week = '$weeknumber6' AND year = '$select_year7' " );
          while($row7 = $query7->fetch_assoc()){
            $month6[] = $row7['VHI'];
          }
        
            $one_week_date = array();
            $second_week_date =array();
            $third_week_date = array();
            $four_week_date = array();
            $five_week_date = array();
            $six_week_date = array();
            $seven_week_date = array();
        
            $one_week_date[] = strval($final_first_year);
    $second_week_date[] = strval($final_second_year);
    $third_week_date[] = strval($final_third_year);
    $four_week_date[] = strval($final_four_year);
    $five_week_date[] = strval($final_five_year);
    $six_week_date[] = strval($final_six_year);
    $seven_week_date[] = strval($final_seven_year);
        
            $month_final = array_merge($month6,$month5,$month4,$month3,$month2,$month1,$month);
            $final_array = array_merge($seven_week_date,$six_week_date,$five_week_date,$four_week_date,$third_week_date,$second_week_date,$one_week_date);
        
            $return_data = array();
            $return_data['month_final'] = $month_final; 
            $return_data['final_array'] = $final_array;
            echo json_encode($return_data);
        }
      