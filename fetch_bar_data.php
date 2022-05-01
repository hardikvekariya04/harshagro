<?php
$con = new mysqli('localhost','root','','agrocast');
$taluka_id = $_POST['taluka_id'];
$date_id = $_POST['date_id'];
$temp_id = $_POST['temp_id'];
$per_id = $_POST['per_id'];

// $query_date = '2010-02-04';
$first_month_start = date('Y-m-01', strtotime($date_id));
$first_month_end = date('Y-m-t', strtotime($date_id));

$monthly = date('Y-m-d', strtotime($first_month_start. ' - 1 month')); 
$second_month_start = date('Y-m-01', strtotime($monthly));
$second_month_end = date('Y-m-t', strtotime($monthly));

$monthly1 = date('Y-m-d', strtotime($monthly. ' - 1 month')); 
$third_month_start = date('Y-m-01', strtotime($monthly1));
$third_month_end = date('Y-m-t', strtotime($monthly1));

$monthly2 =date('Y-m-d', strtotime($monthly1. ' - 1 month')); 
$four_month_start = date('Y-m-01', strtotime($monthly2));
$four_month_end = date('Y-m-t', strtotime($monthly2));

$monthly3 =date('Y-m-d', strtotime($monthly2. ' - 1 month')); 
$five_month_start = date('Y-m-01', strtotime($monthly3));
$five_month_end = date('Y-m-t', strtotime($monthly3));

$monthly4 =date('Y-m-d', strtotime($monthly3. ' - 1 month'));
$six_month_start = date('Y-m-01', strtotime($monthly4));
$six_month_end = date('Y-m-t', strtotime($monthly4));

$monthly5 =date('Y-m-d', strtotime($monthly4. ' - 1 month'));
$seven_month_start = date('Y-m-01', strtotime($monthly5));
$seven_month_end = date('Y-m-t', strtotime($monthly5)); 

$date_id_monthly = date("Y - M",strtotime($first_month_start));
$one_monthly =date("Y - M",strtotime($second_month_start));
$second_monthly =date("Y - M",strtotime($third_month_start));
$thrid_monthly =date("Y - M",strtotime($four_month_start));
$four_monthly =date("Y - M",strtotime($five_month_start));
$five_monthly =date("Y - M",strtotime($six_month_start));
$six_monthly =date("Y - M",strtotime($seven_month_start));

if($temp_id === 'max' && $per_id === 'last 6 month'){
  $query =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$first_month_start' AND '$first_month_end'");
while($row = $query->fetch_assoc()){
    $month1[] = $row['max_temp'];
    $amount1[] = $row['date'];
  }

$query3 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$second_month_start' AND '$second_month_end'");
$month3 = array();

  while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['max_temp'];
      $amount3[] = $row3['date'];
    }

$query4 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$third_month_start' AND '$third_month_end'");
while($row4 = $query4->fetch_assoc()){
        $month4[] = $row4['max_temp'];
        $amount4[] = $row4['date'];
      }

$query5 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$four_month_start' AND '$four_month_end'");
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['max_temp'];
      $amount5[] = $row5['date'];
    }
  
$query6 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$five_month_start' AND '$five_month_end'");
  while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['max_temp'];
      $amount6[] = $row6['date'];
    }

$query7 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$six_month_start' AND '$six_month_end'");
  while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['max_temp'];
      $amount7[] = $row7['date'];
    }
    
    $start_date = array();
    $one_month_date = array();
    $second_month_date =array();
    $third_month_date = array();
    $four_month_date = array();
    $five_month_date = array();
    $six_month_date = array();

    
    $start_date[] = strval($date_id_monthly);
    $one_month_date[] = strval($one_monthly);
    $second_month_date[] = strval($second_monthly);
    $third_month_date[] = strval($thrid_monthly);
    $four_month_date[] = strval($four_monthly);
    $five_month_date[] = strval($five_monthly);
    $six_month_date[] = strval($six_monthly);

    $final_array = array_merge($month7,$month6,$month5,$month4,$month3,$month1);
    $date_array = array_merge($five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date,$start_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }

elseif($temp_id === 'min' && $per_id === 'last 6 month'){
  $query =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$first_month_start' AND '$first_month_end'");
  while($row = $query->fetch_assoc()){
      $month1[] = $row['min_temp'];
      $amount1[] = $row['date'];
    }
  
  $query3 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$second_month_start' AND '$second_month_end'");
  $month3 = array();
  
    while($row3 = $query3->fetch_assoc()){
        $month3[] = $row3['min_temp'];
        $amount3[] = $row3['date'];
      }
  
  $query4 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$third_month_start' AND '$third_month_end'");
  while($row4 = $query4->fetch_assoc()){
          $month4[] = $row4['min_temp'];
          $amount4[] = $row4['date'];
        }
  
  $query5 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$four_month_start' AND '$four_month_end'");
    while($row5 = $query5->fetch_assoc()){
        $month5[] = $row5['min_temp'];
        $amount5[] = $row5['date'];
      }
    
  $query6 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$five_month_start' AND '$five_month_end'");
    while($row6 = $query6->fetch_assoc()){
        $month6[] = $row6['min_temp'];
        $amount6[] = $row6['date'];
      }
  
  $query7 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$six_month_start' AND '$six_month_end'");
    while($row7 = $query7->fetch_assoc()){
        $month7[] = $row7['min_temp'];
        $amount7[] = $row7['date'];
      }
      
      $start_date = array();
      $one_month_date = array();
      $second_month_date =array();
      $third_month_date = array();
      $four_month_date = array();
      $five_month_date = array();
      $six_month_date = array();
  
      
      $start_date[] = strval($date_id_monthly);
      $one_month_date[] = strval($one_monthly);
      $second_month_date[] = strval($second_monthly);
      $third_month_date[] = strval($thrid_monthly);
      $four_month_date[] = strval($four_monthly);
      $five_month_date[] = strval($five_monthly);
      $six_month_date[] = strval($six_monthly);
  
      $final_array = array_merge($month7,$month6,$month5,$month4,$month3,$month1);
      $date_array = array_merge($five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date,$start_date);
      
      $return_data = array();
      $return_data['final_array'] =$final_array;
      $return_data['date_array'] =$date_array;
      echo json_encode($return_data);
}
elseif($temp_id === 'rain' && $per_id === 'last 6 month'){
  $query =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$first_month_start' AND '$first_month_end'");
  while($row = $query->fetch_assoc()){
      $month1[] = $row['rainfall'];
      $amount1[] = $row['date'];
    }
  
  $query3 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$second_month_start' AND '$second_month_end'");
  $month3 = array();
  
    while($row3 = $query3->fetch_assoc()){
        $month3[] = $row3['rainfall'];
        $amount3[] = $row3['date'];
      }
  
  $query4 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$third_month_start' AND '$third_month_end'");
  while($row4 = $query4->fetch_assoc()){
          $month4[] = $row4['rainfall'];
          $amount4[] = $row4['date'];
        }
  
  $query5 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$four_month_start' AND '$four_month_end'");
    while($row5 = $query5->fetch_assoc()){
        $month5[] = $row5['rainfall'];
        $amount5[] = $row5['date'];
      }
    
  $query6 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$five_month_start' AND '$five_month_end'");
    while($row6 = $query6->fetch_assoc()){
        $month6[] = $row6['rainfall'];
        $amount6[] = $row6['date'];
      }
  
  $query7 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$six_month_start' AND '$six_month_end'");
    while($row7 = $query7->fetch_assoc()){
        $month7[] = $row7['rainfall'];
        $amount7[] = $row7['date'];
      }
      
      $start_date = array();
      $one_month_date = array();
      $second_month_date =array();
      $third_month_date = array();
      $four_month_date = array();
      $five_month_date = array();
      $six_month_date = array();
  
      
      $start_date[] = strval($date_id_monthly);
      $one_month_date[] = strval($one_monthly);
      $second_month_date[] = strval($second_monthly);
      $third_month_date[] = strval($thrid_monthly);
      $four_month_date[] = strval($four_monthly);
      $five_month_date[] = strval($five_monthly);
      $six_month_date[] = strval($six_monthly);
  
      $final_array = array_merge($month7,$month6,$month5,$month4,$month3,$month1);
      $date_array = array_merge($five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date,$start_date);
      
      $return_data = array();
      $return_data['final_array'] =$final_array;
      $return_data['date_array'] =$date_array;
      echo json_encode($return_data);
}
  elseif($per_id === 'last 6 month'){
    $query =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$first_month_start' AND '$first_month_end'");
while($row = $query->fetch_assoc()){
    $month1[] = $row['max_temp'];
    $amount1[] = $row['date'];
  }

$query3 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$second_month_start' AND '$second_month_end'");
$month3 = array();

  while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['max_temp'];
      $amount3[] = $row3['date'];
    }

$query4 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$third_month_start' AND '$third_month_end'");
while($row4 = $query4->fetch_assoc()){
        $month4[] = $row4['max_temp'];
        $amount4[] = $row4['date'];
      }

$query5 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$four_month_start' AND '$four_month_end'");
  while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['max_temp'];
      $amount5[] = $row5['date'];
    }
  
$query6 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$five_month_start' AND '$five_month_end'");
  while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['max_temp'];
      $amount6[] = $row6['date'];
    }

$query7 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$six_month_start' AND '$six_month_end'");
  while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['max_temp'];
      $amount7[] = $row7['date'];
    }
    
    $start_date = array();
    $one_month_date = array();
    $second_month_date =array();
    $third_month_date = array();
    $four_month_date = array();
    $five_month_date = array();
    $six_month_date = array();

    
    $start_date[] = strval($date_id_monthly);
    $one_month_date[] = strval($one_monthly);
    $second_month_date[] = strval($second_monthly);
    $third_month_date[] = strval($thrid_monthly);
    $four_month_date[] = strval($four_monthly);
    $five_month_date[] = strval($five_monthly);
    $six_month_date[] = strval($six_monthly);

    $final_array = array_merge($month7,$month6,$month5,$month4,$month3,$month1);
    $date_array = array_merge($five_month_date,$four_month_date,$third_month_date,$second_month_date,$one_month_date,$start_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }
  elseif($temp_id === 'max' && $per_id === 'last 3 year'){
    $year_date_store = $date_id;

    $first_start_date = date("Y-01-01", strtotime($date_id));
    $first_end_date = date("Y-12-t", strtotime($first_start_date));

    $second_date = date('Y-m-d', strtotime($year_date_store. ' - 1 year'));
    $yearly_one_date = date('Y-m-d', strtotime($first_start_date. ' - 1 year'));
    $second_start_date = date("Y-01-01", strtotime($yearly_one_date));
    $second_end_date = date("Y-12-t", strtotime($second_start_date));

    $third_date = date('Y-m-d', strtotime($second_date. ' - 1 year'));
    $yearly_second_date = date('Y-m-d', strtotime($second_start_date. ' - 1 year'));
    $third_start_date = date("Y-01-01", strtotime($yearly_second_date));
    $third_end_date = date("Y-12-t", strtotime($third_start_date));

    $one_month_dates =date("Y - M",strtotime($year_date_store));
    $second_month_dates =date("Y - M",strtotime($second_date));
    $thrid_month_dates =date("Y - M",strtotime($third_date));

    $query3 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$first_start_date' AND '$first_end_date'");
     while($row3 = $query3->fetch_assoc()){
      $year[] = $row3['max_temp'];
      $year_date[] = $row3['date'];
    }


    $query4 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$second_start_date' AND '$second_end_date'");
    while($row4 = $query4->fetch_assoc()){
      $year1[] = $row4['max_temp'];
      $year_date1[] = $row4['date'];
    }

    $query5 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$third_start_date' AND '$third_end_date'");
    while($row5 = $query5->fetch_assoc()){
        $year5[] = $row5['max_temp'];
        $year_date5[] = $row5['date'];
      }

    $one_year_date = array();
    $second_year_date =array();
    $third_year_date = array();

    $one_year_date[] = strval($one_month_dates);
    $second_year_date[] = strval($second_month_dates);
    $third_year_date[] = strval($thrid_month_dates);


    $final_array = array_merge($year5,$year1,$year);
    $date_array = array_merge($third_year_date,$second_year_date,$one_year_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }
  elseif($temp_id === 'rain' && $per_id === 'last 3 year'){
    $year_date_store = $date_id;

    $first_start_date = date("Y-01-01", strtotime($date_id));
    $first_end_date = date("Y-12-t", strtotime($first_start_date));

    $second_date = date('Y-m-d', strtotime($year_date_store. ' - 1 year'));
    $yearly_one_date = date('Y-m-d', strtotime($first_start_date. ' - 1 year'));
    $second_start_date = date("Y-01-01", strtotime($yearly_one_date));
    $second_end_date = date("Y-12-t", strtotime($second_start_date));

    $third_date = date('Y-m-d', strtotime($second_date. ' - 1 year'));
    $yearly_second_date = date('Y-m-d', strtotime($second_start_date. ' - 1 year'));
    $third_start_date = date("Y-01-01", strtotime($yearly_second_date));
    $third_end_date = date("Y-12-t", strtotime($third_start_date));

    $one_month_dates =date("Y - M",strtotime($year_date_store));
    $second_month_dates =date("Y - M",strtotime($second_date));
    $thrid_month_dates =date("Y - M",strtotime($third_date));

    $query3 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$first_start_date' AND '$first_end_date'");
     while($row3 = $query3->fetch_assoc()){
      $year[] = $row3['rainfall'];
      $year_date[] = $row3['date'];
    }


    $query4 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$second_start_date' AND '$second_end_date'");
    while($row4 = $query4->fetch_assoc()){
      $year1[] = $row4['rainfall'];
      $year_date1[] = $row4['date'];
    }

    $query5 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$third_start_date' AND '$third_end_date'");
    while($row5 = $query5->fetch_assoc()){
        $year5[] = $row5['rainfall'];
        $year_date5[] = $row5['date'];
      }

    $one_year_date = array();
    $second_year_date =array();
    $third_year_date = array();

    $one_year_date[] = strval($one_month_dates);
    $second_year_date[] = strval($second_month_dates);
    $third_year_date[] = strval($thrid_month_dates);


    $final_array = array_merge($year5,$year1,$year);
    $date_array = array_merge($third_year_date,$second_year_date,$one_year_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }
  elseif($temp_id === 'min'){
    $year_date_store = $date_id;

    $first_start_date = date("Y-01-01", strtotime($date_id));
    $first_end_date = date("Y-12-t", strtotime($first_start_date));

    $second_date = date('Y-m-d', strtotime($year_date_store. ' - 1 year'));
    $yearly_one_date = date('Y-m-d', strtotime($first_start_date. ' - 1 year'));
    $second_start_date = date("Y-01-01", strtotime($yearly_one_date));
    $second_end_date = date("Y-12-t", strtotime($second_start_date));

    $third_date = date('Y-m-d', strtotime($second_date. ' - 1 year'));
    $yearly_second_date = date('Y-m-d', strtotime($second_start_date. ' - 1 year'));
    $third_start_date = date("Y-01-01", strtotime($yearly_second_date));
    $third_end_date = date("Y-12-t", strtotime($third_start_date));

    $one_month_dates =date("Y - M",strtotime($year_date_store));
$second_month_dates =date("Y - M",strtotime($second_date));
$thrid_month_dates =date("Y - M",strtotime($third_date));

    $query3 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$first_start_date' AND '$first_end_date'");
  while($row3 = $query3->fetch_assoc()){
      $year[] = $row3['min_temp'];
      $year_date[] = $row3['date'];
    }


    $query4 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$second_start_date' AND '$second_end_date'");
  while($row4 = $query4->fetch_assoc()){
      $year1[] = $row4['min_temp'];
      $year_date1[] = $row4['date'];
    }

    $query5 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$third_start_date' AND '$third_end_date'");
    while($row5 = $query5->fetch_assoc()){
        $year5[] = $row5['min_temp'];
        $year_date5[] = $row5['date'];
      }

    $one_year_date = array();
    $second_year_date =array();
    $third_year_date = array();

    $one_year_date[] = strval($one_month_dates);
    $second_year_date[] = strval($second_month_dates);
    $third_year_date[] = strval($thrid_month_dates);


    $final_array = array_merge($year5,$year1,$year);
    $date_array = array_merge($third_year_date,$second_year_date,$one_year_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }
  elseif($temp_id === 'rain'){
    $year_date_store = $date_id;

    $first_start_date = date("Y-01-01", strtotime($date_id));
    $first_end_date = date("Y-12-t", strtotime($first_start_date));

    $second_date = date('Y-m-d', strtotime($year_date_store. ' - 1 year'));
    $yearly_one_date = date('Y-m-d', strtotime($first_start_date. ' - 1 year'));
    $second_start_date = date("Y-01-01", strtotime($yearly_one_date));
    $second_end_date = date("Y-12-t", strtotime($second_start_date));

    $third_date = date('Y-m-d', strtotime($second_date. ' - 1 year'));
    $yearly_second_date = date('Y-m-d', strtotime($second_start_date. ' - 1 year'));
    $third_start_date = date("Y-01-01", strtotime($yearly_second_date));
    $third_end_date = date("Y-12-t", strtotime($third_start_date));

    $one_month_dates =date("Y - M",strtotime($year_date_store));
$second_month_dates =date("Y - M",strtotime($second_date));
$thrid_month_dates =date("Y - M",strtotime($third_date));

    $query3 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$first_start_date' AND '$first_end_date'");
  while($row3 = $query3->fetch_assoc()){
      $year[] = $row3['rainfall'];
      $year_date[] = $row3['date'];
    }


    $query4 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$second_start_date' AND '$second_end_date'");
  while($row4 = $query4->fetch_assoc()){
      $year1[] = $row4['rainfall'];
      $year_date1[] = $row4['date'];
    }

    $query5 =$con->query("SELECT AVG(rainfall) as rainfall,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$third_start_date' AND '$third_end_date'");
    while($row5 = $query5->fetch_assoc()){
        $year5[] = $row5['rainfall'];
        $year_date5[] = $row5['date'];
      }

    $one_year_date = array();
    $second_year_date =array();
    $third_year_date = array();

    $one_year_date[] = strval($one_month_dates);
    $second_year_date[] = strval($second_month_dates);
    $third_year_date[] = strval($thrid_month_dates);


    $final_array = array_merge($year5,$year1,$year);
    $date_array = array_merge($third_year_date,$second_year_date,$one_year_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }
  elseif($temp_id === 'max'){
    $year_date_store = $date_id;

    $first_start_date = date("Y-01-01", strtotime($date_id));
    $first_end_date = date("Y-12-t", strtotime($first_start_date));

    $second_date = date('Y-m-d', strtotime($year_date_store. ' - 1 year'));
    $yearly_one_date = date('Y-m-d', strtotime($first_start_date. ' - 1 year'));
    $second_start_date = date("Y-01-01", strtotime($yearly_one_date));
    $second_end_date = date("Y-12-t", strtotime($second_start_date));

    $third_date = date('Y-m-d', strtotime($second_date. ' - 1 year'));
    $yearly_second_date = date('Y-m-d', strtotime($second_start_date. ' - 1 year'));
    $third_start_date = date("Y-01-01", strtotime($yearly_second_date));
    $third_end_date = date("Y-12-t", strtotime($third_start_date));

    $one_month_dates =date("Y - M",strtotime($year_date_store));
$second_month_dates =date("Y - M",strtotime($second_date));
$thrid_month_dates =date("Y - M",strtotime($third_date));

    $query3 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$first_start_date' AND '$first_end_date'");
  while($row3 = $query3->fetch_assoc()){
      $year[] = $row3['max_temp'];
      $year_date[] = $row3['date'];
    }


    $query4 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$second_start_date' AND '$second_end_date'");
  while($row4 = $query4->fetch_assoc()){
      $year1[] = $row4['max_temp'];
      $year_date1[] = $row4['date'];
    }

    $query5 =$con->query("SELECT AVG(max_temp) as max_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$third_start_date' AND '$third_end_date'");
    while($row5 = $query5->fetch_assoc()){
        $year5[] = $row5['max_temp'];
        $year_date5[] = $row5['date'];
      }

    $one_year_date = array();
    $second_year_date =array();
    $third_year_date = array();

    $one_year_date[] = strval($one_month_dates);
    $second_year_date[] = strval($second_month_dates);
    $third_year_date[] = strval($thrid_month_dates);


    $final_array = array_merge($year5,$year1,$year);
    $date_array = array_merge($third_year_date,$second_year_date,$one_year_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }
  else{
    $year_date_store = $date_id;

    $first_start_date = date("Y-01-01", strtotime($date_id));
    $first_end_date = date("Y-12-t", strtotime($first_start_date));

    $second_date = date('Y-m-d', strtotime($year_date_store. ' - 1 year'));
    $yearly_one_date = date('Y-m-d', strtotime($first_start_date. ' - 1 year'));
    $second_start_date = date("Y-01-01", strtotime($yearly_one_date));
    $second_end_date = date("Y-12-t", strtotime($second_start_date));

    $third_date = date('Y-m-d', strtotime($second_date. ' - 1 year'));
    $yearly_second_date = date('Y-m-d', strtotime($second_start_date. ' - 1 year'));
    $third_start_date = date("Y-01-01", strtotime($yearly_second_date));
    $third_end_date = date("Y-12-t", strtotime($third_start_date));

    $one_month_dates =date("Y - M",strtotime($year_date_store));
$second_month_dates =date("Y - M",strtotime($second_date));
$thrid_month_dates =date("Y - M",strtotime($third_date));

    $query3 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$first_start_date' AND '$first_end_date'");
  while($row3 = $query3->fetch_assoc()){
      $year[] = $row3['min_temp'];
      $year_date[] = $row3['date'];
    }


    $query4 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$second_start_date' AND '$second_end_date'");
  while($row4 = $query4->fetch_assoc()){
      $year1[] = $row4['min_temp'];
      $year_date1[] = $row4['date'];
    }

    $query5 =$con->query("SELECT AVG(min_temp) as min_temp,date from taluka_data where taluka_id = ".$taluka_id." AND date BETWEEN '$third_start_date' AND '$third_end_date'");
    while($row5 = $query5->fetch_assoc()){
        $year5[] = $row5['min_temp'];
        $year_date5[] = $row5['date'];
      }

    $one_year_date = array();
    $second_year_date =array();
    $third_year_date = array();

    $one_year_date[] = strval($one_month_dates);
    $second_year_date[] = strval($second_month_dates);
    $third_year_date[] = strval($thrid_month_dates);


    $final_array = array_merge($year5,$year1,$year);
    $date_array = array_merge($third_year_date,$second_year_date,$one_year_date);
    
    $return_data = array();
    $return_data['final_array'] =$final_array;
    $return_data['date_array'] =$date_array;
    echo json_encode($return_data);
  }
?>