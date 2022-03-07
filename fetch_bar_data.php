<?php
$con = new mysqli('localhost','root','','agro');
$taluka_id = $_POST['taluka_id'];
$date_id = $_POST['date_id'];
$temp_id = $_POST['temp_id'];
$per_id = $_POST['per_id'];

$monthly = date('Y-m-d', strtotime($date_id. ' - 1 month')); 
$monthly1 = date('Y-m-d', strtotime($monthly. ' - 1 month')); 
$monthly2 =date('Y-m-d', strtotime($monthly1. ' - 1 month')); 
$monthly3 =date('Y-m-d', strtotime($monthly2. ' - 1 month')); 
$monthly4 =date('Y-m-d', strtotime($monthly3. ' - 1 month')); 
$monthly5 =date('Y-m-d', strtotime($monthly4. ' - 1 month')); 

if($temp_id === 'max' && $per_id === 'last 6 month'){
  $query =$con->query("SELECT AVG(max_temp) as max_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$date_id',Interval 1 month)) < date && date <= '$date_id'");

while($row = $query->fetch_assoc()){
    $month1[] = $row['max_temp'];
    $amount1[] = $row['date'];
  }

$query3 =$con->query("SELECT AVG(max_temp) as max_temp,date from newdata where taluka_id = ".$taluka_id." AND  (date_sub('$monthly',Interval 1 month)) < date && date <= '$monthly'" );
$month3 = array();

  while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['max_temp'];
      $amount3[] = $row3['date'];
    }

$query4 =$con->query("SELECT AVG(max_temp) as max_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$monthly1',Interval 1 month)) < date && date <= '$monthly1'" );
while($row4 = $query4->fetch_assoc()){
        $month4[] = $row4['max_temp'];
        $amount4[] = $row4['date'];
      }

$query5 =$con->query("SELECT AVG(max_temp) as max_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$monthly2',Interval 1 month)) < date && date <= '$monthly2'" );
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['max_temp'];
      $amount5[] = $row5['date'];
    }
  
$query6 =$con->query("SELECT AVG(max_temp) as max_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$monthly3',Interval 1 month)) < date && date <= '$monthly3'" );
  while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['max_temp'];
      $amount6[] = $row6['date'];
    }

$query7 =$con->query("SELECT AVG(max_temp) as max_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$monthly4',Interval 1 month)) < date && date <= '$monthly4'" );
  while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['max_temp'];
      $amount7[] = $row7['date'];
    }
    
    $one_month_date = array();
    $second_month_date =array();
    $third_month_date = array();
    $four_month_date = array();
    $five_month_date = array();
    $six_month_date = array();


    $one_month_date[] = strval($date_id);
    $second_month_date[] = strval($monthly);
    $third_month_date[] = strval($monthly1);
    $four_month_date[] = strval($monthly2);
    $five_month_date[] = strval($monthly3);
    $six_month_date[] = strval($monthly4);


    // $final_array = array_merge($month1,$month3,$month4,$month5,$month6,$month7);
    // $date_array = array_merge($one_month_date,$second_month_date,$third_month_date,$four_month_date,$five_month_date,$six_month_date);

    $final_array = array_merge($month7,$month6,$month5,$month4,$month3,$month1);
    $date_array = array_merge($six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }

elseif($temp_id === 'min' && $per_id === 'last 6 month'){
    $query =$con->query("SELECT AVG(min_temp) as min_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$date_id',Interval 1 month)) < date && date <= '$date_id'");

while($row = $query->fetch_assoc()){
    $month1[] = $row['min_temp'];
    $amount1[] = $row['date'];
  }

$query3 =$con->query("SELECT AVG(min_temp) as min_temp,date from newdata where taluka_id = ".$taluka_id." AND  (date_sub('$monthly',Interval 1 month)) < date && date <= '$monthly'" );
$month3 = array();

  while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['min_temp'];
      $amount3[] = $row3['date'];
    }

$query4 =$con->query("SELECT AVG(min_temp) as min_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$monthly1',Interval 1 month)) < date && date <= '$monthly1'" );
while($row4 = $query4->fetch_assoc()){
        $month4[] = $row4['min_temp'];
        $amount4[] = $row4['date'];
      }

$query5 =$con->query("SELECT AVG(min_temp) as min_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$monthly2',Interval 1 month)) < date && date <= '$monthly2'" );
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['min_temp'];
      $amount5[] = $row5['date'];
    }
  
$query6 =$con->query("SELECT AVG(min_temp) as min_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$monthly3',Interval 1 month)) < date && date <= '$monthly3'" );
  while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['min_temp'];
      $amount6[] = $row6['date'];
    }

$query7 =$con->query("SELECT AVG(min_temp) as min_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$monthly4',Interval 1 month)) < date && date <= '$monthly4'" );
  while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['min_temp'];
      $amount7[] = $row7['date'];
    }
    
    $one_month_date = array();
    $second_month_date =array();
    $third_month_date = array();
    $four_month_date = array();
    $five_month_date = array();
    $six_month_date = array();


    $one_month_date[] = strval($date_id);
    $second_month_date[] = strval($monthly);
    $third_month_date[] = strval($monthly1);
    $four_month_date[] = strval($monthly2);
    $five_month_date[] = strval($monthly3);
    $six_month_date[] = strval($monthly4);


    // $final_array = array_merge($month1,$month3,$month4,$month5,$month6,$month7);
    // $date_array = array_merge($one_month_date,$second_month_date,$third_month_date,$four_month_date,$five_month_date,$six_month_date);

    $final_array = array_merge($month7,$month6,$month5,$month4,$month3,$month1);
    $date_array = array_merge($six_month_date,$five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }
  elseif($temp_id === 'max' && $per_id === 'last 3 year'){
    $year_date_store = $date_id;
    $yearly_one_date = date('Y-m-d', strtotime($year_date_store. ' - 1 year'));
    $yearly_second_date = date('Y-m-d', strtotime($yearly_one_date. ' - 1 year'));
    $query3 =$con->query("SELECT AVG(max_temp) as max_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$year_date_store',Interval 1 year)) < date && date <= '$year_date_store'");
  while($row3 = $query3->fetch_assoc()){
      $year[] = $row3['max_temp'];
      $year_date[] = $row3['date'];
    }


    $query4 =$con->query("SELECT AVG(max_temp) as max_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$yearly_one_date',Interval 1 year)) < date && date <= '$yearly_one_date'");
  while($row4 = $query4->fetch_assoc()){
      $year1[] = $row4['max_temp'];
      $year_date1[] = $row4['date'];
    }

    $query5 =$con->query("SELECT AVG(max_temp) as max_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$yearly_second_date',Interval 1 year)) < date && date <= '$yearly_second_date'");
    while($row5 = $query5->fetch_assoc()){
        $year5[] = $row5['max_temp'];
        $year_date5[] = $row5['date'];
      }

    $one_year_date = array();
    $second_year_date =array();
    $third_year_date = array();

    $one_year_date[] = strval($year_date_store);
    $second_year_date[] = strval($yearly_one_date);
    $third_year_date[] = strval($yearly_second_date);

    $final_array = array_merge($year5,$year1,$year);
    $date_array = array_merge($third_year_date,$second_year_date,$one_year_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }
  else{
    $year_date_store = date('Y-m-d', strtotime($date_id. ' +0 year'));
    $yearly_one_date = date('Y-m-d', strtotime($year_date_store. ' - 1 year'));
    $yearly_second_date = date('Y-m-d', strtotime($yearly_one_date. ' - 1 year'));
    $query3 =$con->query("SELECT AVG(min_temp) as min_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$year_date_store',Interval 1 year)) < date && date <= '$year_date_store'");
  while($row3 = $query3->fetch_assoc()){
      $year[] = $row3['min_temp'];
      $year_date[] = $row3['date'];
    }


    $query4 =$con->query("SELECT AVG(min_temp) as min_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$yearly_one_date',Interval 1 year)) < date && date <= '$yearly_one_date'");
  while($row4 = $query4->fetch_assoc()){
      $year1[] = $row4['min_temp'];
      $year_date1[] = $row4['date'];
    }

    $query5 =$con->query("SELECT AVG(min_temp) as min_temp,date from newdata where taluka_id = ".$taluka_id." AND (date_sub('$yearly_second_date',Interval 1 year)) < date && date <= '$yearly_second_date'");
    while($row5 = $query5->fetch_assoc()){
        $year5[] = $row5['min_temp'];
        $year_date5[] = $row5['date'];
      }

    $one_year_date = array();
    $second_year_date =array();
    $third_year_date = array();

    $one_year_date[] = strval($year_date_store);
    $second_year_date[] = strval($yearly_one_date);
    $third_year_date[] = strval($yearly_second_date);

    $final_array = array_merge($year5,$year1,$year);
    $date_array = array_merge($third_year_date,$second_year_date,$one_year_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }
?>