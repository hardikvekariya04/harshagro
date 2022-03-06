<?php
  // $m1= date('01');

  // $de1= date('10');
  
  // $y1= date('2018');
  // // $dates1 = array();
  // for($i=0; $i<=7; $i++){
  // $dates1 =  date('d-m-y',mktime(0,0,0,$m1,($de1-$i),$y1));
  // echo $dates1;
  // echo "<br>";
  // }
$date1 = "2018-01-10";
$date1 = strtotime($date1);

$date1 = strtotime("+0 day", $date1);
$date2 = strtotime("-1 day", $date1);
$date3 = strtotime("-2 day", $date1);
$date4 = strtotime("-3 day", $date1);
$date5 = strtotime("-4 day", $date1);
$date6 = strtotime("-5 day", $date1);
$date7 = strtotime("-6 day", $date1);
$dates1 =  date('Y-m-d', $date1);
$dates2  =date('Y-m-d', $date2 );
$dates3  =date('Y-m-d', $date3 );
$dates4  =date('Y-m-d', $date4 );
$dates5  =date('Y-m-d', $date5 );
$dates6  =date('Y-m-d', $date6 );
$dates7  =date('Y-m-d', $date7 );
echo '<br>';
echo  date('Y-m-d', $date3);
  $con = new mysqli('localhost','root','','agro');
  // $currDate = "2018-01-07";
  //$query =$con->query("SELECT max_temp,date from newdata where taluka_id = 2 AND date >= CURDATE() - INTERVAL 7 DAY");
  $query =$con->query("SELECT max_temp,date from newdata where taluka_id = 2 AND date IN('$dates1','$dates2','$dates3','$dates4','$dates5','$dates6','$dates7')" );
  while($row = $query->fetch_assoc()){
  // foreach($query as $data)
  // {
    $month[] = $row['max_temp'];
    $amount[] = $row['date'];
  }
  

?>