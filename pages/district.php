<?php
ob_start();
require_once '../config/function.php';
require_once '../config/db.php';

// update();

if (!isset($_SESSION['ID']) && !isset($_SESSION['EMAIL'])) {
  header("location: ../index.php");
}

$current_date = "select max(date) AS date from district_data LIMIT 1";
$date_result = mysqli_query($con, $current_date);
$row_date = mysqli_fetch_assoc($date_result);

$date_current = $row_date['date']; 

$current_min_date = "select min(date) AS date from district_data LIMIT 1";
$date_min_result = mysqli_query($con, $current_min_date);
$row_min_date = mysqli_fetch_assoc($date_min_result);

$date_min_current = $row_min_date['date']; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Agrocast
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/papaparse@5.3.1/papaparse.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
</head>
<style>
  .in{
    margin-right:20px;
    height:30px;
  }
  .heading{
    margin-right:7px;
    margin-top:3px;
    font-weight:bold;
  }
  .sub{
    border:1px solid white;
    border-radius:10px;
    width:100px;
    height:35px;
    font-weight:bold;
    background-color:#4CAF50;
    color:white;
  }
  </style>
<body class="g-sidenav-show  bg-gray-200">
<div class="loader"></div>
  <!-- <div class="circle"></div> -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps bg-white" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
      <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo" style="min-width: 8rem; min-height: 3rem; top: 0;">
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark active bg-gradient-primary" href="../indexD.php" style="width:200px;">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1" style="font-size:20px;font-size:20px;font-weight:bold;">Climate</span>
          </a>
        </li>

        <li class="nav-item" style="border: 2px solid rgb(168, 168, 168); border-radius: 10%;width:200px;">
          <a class="nav-link text-dark active bg-gradient-info" href="#" style="height: 41px !important;">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">circle</i>
            </div>
            <span class="nav-link-text ms-1">District</span>
          </a>
        </li>

        <li class="nav-item" style="width:200px;">
          <a class="nav-link text-dark active bg-gradient-info" href="../indexD.php" style="height: 41px !important;">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">circle</i>
            </div>
            <span class="nav-link-text ms-1">Taluka</span>
          </a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link text-dark active bg-gradient-info" href="../pages/heatmap.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">circle</i>
            </div>
            <span class="nav-link-text ms-1">Heatmap</span>
          </a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link text-dark " href="../pages/crop.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Vegetation</span>
            
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark " href="../pages/heatmap.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Heatmap</span>
            
          </a>
        </li>
       
        
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
        <a class="btn bg-info mt-0 w-100" href="dataset.php" type="button" style="color: #fff;"><i
            class="material-icons opacity-10">info </i>About Dataset</a>
      </div>
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-0 w-100" href="https://www.agrocastanalytics.com/index.html" type="button"><i
            class="material-icons opacity-10">home </i> Visit Home page</a>
      </div>
      <div class="mx-3">

        <a class="btn bg-danger mt-0 w-100" href="../logout.php" type="button" style="color: #fff;"><i
            class="material-icons opacity-10">login</i> Log Out</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <!-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Climate</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Districts</li>
          </ol> -->
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
           <form method="POST" action="#">
                <label class="heading">District:</label>
                <select id="district" class="in" style="border-radius:50px">
                <!-- <option value="" disabled selected>Select District</option> -->
                    <option value="Ahmadabad" id="0" selected>Ahmadabad</option>
                    <option value="Anand" id="1">Anand</option>
                    <option value="Banaskantha" id="2">Banaskantha</option>
                    <option value="Bharuch" id="3">Bharuch</option>
                    <option value="Dahod" id="4">Dahod</option>
                    <option value="Gandhinagar" id="5">Gandhinagar</option>
                    <option value="Jamnagar" id="6">Jamnagar</option>
                    <option value="Junagadh" id="7">Junagadh</option>
                    <option value="Kachchh" id="8">Kachchh</option>
                    <option value="Kheda" id="9">Kheda</option>
                    <option value="Mahesana" id="10">Mahesana</option>
                    <option value="Narmada" id="11">Narmada</option>
                    <option value="Navsari" id="12">Navsari</option>
                    <option value="Panchmahal" id="13">Panchmahal</option>
                    <option value="Patan" id="14">Patan</option>
                    <option value="Porbandar" id="15">Porbandar</option>
                    <option value="Rajkot" id="16">Rajkot</option>
                    <option value="Sabarkantha" id="17">Sabarkantha</option>
                    <option value="Surat" id="18">Surat</option>
                    <option value="Surendrangar" id="19">Surendrangar</option>
                    <option value="Dang" id="20">Dang</option>
                    <option value="Vadodara" id="21">Vadodara</option>
                    <option value="Valsad" id="22">Valsad</option>
                    <option value="Tapi" id="23">Tapi</option>
                    <option value="Devbhumi Dwarka" id="24">Devbhumi Dwarka</option>
                    <option value="Morbi" id="25">Morbi</option>
                    <option value="Aravalli" id="26">Aravalli</option>
                    <option value="Chhota Udaipur" id="27">Chhota Udaipur</option>
                    <option value="Amreli" id="28">Amreli</option>
                    <option value="Girsomnath" id="29">Girsomnath</option>
                    <option value="Mahisagar" id="30">Mahisagar</option>
                    <option value="Bhavnagar" id="31">Bhavnagar</option>
                    <option value="Botad" id="32">Botad</option>
                    
                   
                    
                </select>
                <label class="heading">Climate Variable:  </label>
              <select class="in" name="type" id="type" style="border-radius:50px;">
              <!-- <option value="">Select Type</option> -->
                <option value="min" selected>Minimum Temperature</option>
                <option value="max">Maximum Temperature</option>
                <option value="rain">Rainfall</option>
              </select>

              <!-- <select class="in" name="period" id="per">
              <option value="">Select period </option>
                <option value="last 6 month">last 6 month</option>
                <option value="last 3 year">last 3 year</option>
              </select> -->
                <label class="heading">Date:</label>
              <input class="in" id="date" type="date" placeholder="DD-MM-YYYY" min="<?php echo $date_min_current?>" max="<?php echo $date_current?>"
                value="<?php echo $date_current?>" style="border-radius:50px" selected>
                <input name="submit" type="submit" class="sub" id="submit" value="Search">
              </form>
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      
 
    <div class="row mt-0" style="margin-bottom:-80px">
      <div class="col-lg-0 col-md-6 mt-0 mb-4">
          <!-- <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent"> -->
              
                <div class="mapcontainer" id="map1">
    
    
                    <div id="map"></div>
              </div>  
              
            <!-- </div> -->
            <!-- <div class="card-body">
              <h6 class="mb-0 ">District Level Data</h6>
              <p class="text-sm ">Gujrat, India</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated few mins ago </p>
              </div>-->
            <!-- </div>  -->
          </div>
      
        <div class="col-lg-6 col-md-6 mb-4" style="width:570px;margin-top:-20px;">
          <!-- <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent"> -->
            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
            <a href="#" id="downloadPdf"><i class="fa fa-download" style="font-size:22px;align-item:right;text-align:right;position:absolute;right:40px;"></i></a>
              <div id="reportPage">
                  <div class="chart" id="chart_data">
                      <canvas id="chart-line" class="chart-canvas" height="270" width="300" style="margin-left: -17px;"></canvas>
                  </div>
                  <hr style="margin-top:-5px;margin-bottom:0px;">
              </div>
              <select class="in" name="period" id="per" style="margin-bottom:-20px;">
              <!-- <option value="">Select period </option> -->
                <option value="last 6 month" selected>Last 6 Months</option>
                <option value="last 3 year" >Last 3 Years</option>
              </select>
              <input name="submit" type="submit" id="submit1" class="sub" value="Search" style="position:absolute;right:80px;">
              <a href="#" id="downloadPdf1"><i class="fa fa-download" style="font-size:22px;align-item:right;text-align:right;position:absolute;right:40px;"></i></a>
              <div id="reportPage1">
                <div class="chart" id="chart_data1" >
                  <canvas id="chart-bars" class="chart-canvas" height="280" width="300" ></canvas>
                </div>
              </div>
                <!-- <div class="chart">
                  <canvas id="chart-bars1" class="chart-canvas" height="300" width="300"></canvas>
                </div> -->
                
            </div>
            <!-- </div> -->
            <!-- <div class="card-body">
              <h6 class="mb-0 "> Last Year Data </h6>
              <p class="text-sm "> Gujrat, Ahemdabad </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated few mins ago </p>
              </div>
            </div> -->
          <!-- </div>
        </div>-->
         


      

      
      </div>
</div>
      
<footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-5 mb-lg-0 mb-0">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                by
                <a class="font-weight-bold" target="_blank">Agrocast</a>
                </div>
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
               
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/#content4-28" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/#team1-1g" class="nav-link text-muted" target="_blank">Team</a>
                </li>
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/index.html#form1-c" class="nav-link pe-0 text-muted" target="_blank">Get in Touch</a>
                </li>
              </ul>
              
            </div>
            <div class="col-lg-6">
              <!-- <ul class="nav nav-footer justify-content-center justify-content-lg-end">
               
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/#content4-28" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/#team1-1g" class="nav-link text-muted" target="_blank">Team</a>
                </li>
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/index.html#form1-c" class="nav-link pe-0 text-muted" target="_blank">Get in Touch</a>
                </li>
              </ul> -->
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/district_chart.js"></script>
  <!-- <script src="../map/leaf.js" ></script> -->
    <script src="../map/districts1.js" ></script>

  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <!-- <script src="/assets/js/talukas.js"></script>
    <script src="/assets/js/leaf.js"></script> -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

    <!-- <script src="../map/districts.js" ></script> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  
  <script type="text/javascript">

  </script>

<?php
// last 7 days 

// function getStartAndEndDate($week, $year) {
  // $dto = new DateTime();
  // $dto->setISODate(2013,52);
  // $ret = $dto->format('Y-m-d');
  // echo $ret;
  // $dto->modify('+1 days');
  // $ret3 = $dto->format('Y-m-d');
  // echo $ret3;
  // $dto->modify('+6 days');
  // $ret2 = $dto->format('Y-m-d');
  // echo $ret2;
// }

// $week_array = getStartAndEndDate(52,2013);
// print_r($week_array);


$date1 = $date_current;
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


  $con = new mysqli('localhost','root','','agrocast');
  $query1 =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND date IN('$dates1','$dates2','$dates3','$dates4','$dates5','$dates6','$dates7')" );
  while($row1 = $query1->fetch_assoc()){
    $month1[] = $row1['min_temp'];
    $amount1[] = $row1['date'];
  }



// last  6 month 
$query_Date = $date_current;
$final_date = $date_current;
$monthly = date('Y-m-d', strtotime($final_date. ' - 1 month')); 
$monthly1 = date('Y-m-d', strtotime($monthly. ' - 1 month')); 
$monthly2 =date('Y-m-d', strtotime($monthly1. ' - 1 month')); 
$monthly3 =date('Y-m-d', strtotime($monthly2. ' - 1 month')); 
$monthly4 =date('Y-m-d', strtotime($monthly3. ' - 1 month')); 
$monthly5 =date('Y-m-d', strtotime($monthly4. ' - 1 month')); 

$one_monthly =date("Y - M",strtotime($monthly));
$second_monthly =date("Y - M",strtotime($monthly1));
$thrid_monthly =date("Y - M",strtotime($monthly2));
$four_monthly =date("Y - M",strtotime($monthly3));
$five_monthly =date("Y - M",strtotime($monthly4));
$six_monthly =date("Y - M",strtotime($monthly5));
  //$query =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND date IN(date_sub('$query_Date',Interval 1 month))" );
  $query =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND (date_sub('$date_current',Interval 1 month)) < date && date <= '$date_current'");
  $month[] = array();
  $month[] = "";
  $amount[] = array();
  $amount[] = "";
  while($row = $query->fetch_assoc()){
      $month[] = $row['min_temp'];
      $amount[] = $row['date'];
    }
  $months1 =  json_encode($month);
  // echo '<br>';
  $first_month =  implode (",",$month);  
  // echo $hardik;
$month_temp1 = $first_month;//string
$temp_array1 = explode(',', $month_temp1);
$tot_temp1 = 0;
$temp_array_length1 = count($temp_array1);
foreach($temp_array1 as $temp1)
{
 $tot_temp1 += $temp1;
}
 $avg_high_temp1 = $tot_temp1/$temp_array_length1;

//  echo "Average Temperature is : ".$avg_high_temp1.""; 


$query3 =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND  (date_sub('$monthly',Interval 1 month)) < date && date <= '$monthly'" );
$month3[] = array();
$month3[] = "";
$amount3[] = array();
$amount3[] = "";  
while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['min_temp'];
      $amount3[] = $row3['date'];
    }
  $months2 =  json_encode($month3);
  $second_month =  implode (",",$month3);  

$month_temp2 = $second_month;
$temp_array2 = explode(',', $month_temp2);
$tot_temp2 = 0;
$temp_array_length2 = count($temp_array2);
foreach($temp_array2 as $temp2)
{
 $tot_temp2 += $temp2;
}
 $avg_high_temp2 = $tot_temp2/$temp_array_length2;
 //echo "Average Temperature is : ".$avg_high_temp2."";



$query4 =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND (date_sub('$monthly1',Interval 1 month)) < date && date <= '$monthly1'" );
 $month4[] = array();
  $month4[] = "";
  $amount4[] = array();
  $amount4[] = "";  
while($row4 = $query4->fetch_assoc()){
      $month4[] = $row4['min_temp'];
      $amount4[] = $row4['date'];
    }
  $months4 =  json_encode($month4);
  // echo '<br>';
  $third_month =  implode (",",$month4);  

$month_temp3 = $third_month;
$temp_array3 = explode(',', $month_temp3);
$tot_temp3 = 0;
$temp_array_length3 = count($temp_array3);
foreach($temp_array3 as $temp3)
{
 $tot_temp3 += $temp3;
}
 $avg_high_temp3 = $tot_temp3/$temp_array_length3;
 //echo "Average Temperature is : ".$avg_high_temp3."";


$query5 =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND (date_sub('$monthly2',Interval 1 month)) < date && date <= '$monthly2'" );
$month5[] = array();
$month5[] = "";
$amount5[] = array();
$amount5[] = "";  
while($row5 = $query5->fetch_assoc()){
      $month5[] = $row5['min_temp'];
      $amount5[] = $row5['date'];
    }
  $months5 =  json_encode($month5);
  // echo '<br>';
  $four_month =  implode (",",$month5); 

$month_temp4 = $four_month;
$temp_array4 = explode(',', $month_temp4);
$tot_temp4 = 0;
$temp_array_length4 = count($temp_array4);
foreach($temp_array4 as $temp4)
{
 $tot_temp4 += $temp4;
}
 $avg_high_temp4 = $tot_temp4/$temp_array_length4;
 //echo "Average Temperature is : ".$avg_high_temp4."";


$query6 =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND (date_sub('$monthly3',Interval 1 month)) < date && date <= '$monthly3'" );
$month6[] = array();
$month6[] = "";
$amount6[] = array();
$amount6[] = "";  
while($row6 = $query6->fetch_assoc()){
      $month6[] = $row6['min_temp'];
      $amount6[] = $row6['date'];
    }
  $months6 =  json_encode($month6);
  // echo '<br>';
  $five_month =  implode (",",$month6); 
$month_temp5 = $five_month;
$temp_array5 = explode(',', $month_temp5);
$tot_temp5 = 0;
$temp_array_length5 = count($temp_array5);
foreach($temp_array5 as $temp5)
{
 $tot_temp5 += $temp5;
}
 $avg_high_temp5 = $tot_temp5/$temp_array_length5;
 //echo "Average Temperature is : ".$avg_high_temp5."";


$query7 =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND (date_sub('$monthly4',Interval 1 month)) < date && date <= '$monthly4'" );
$month7[] = array();
$month7[] = "";
$amount7[] = array();
$amount7[] = "";  
while($row7 = $query7->fetch_assoc()){
      $month7[] = $row7['min_temp'];
      $amount7[] = $row7['date'];
    }
  $months7 =  json_encode($month7);
  // echo '<br>';
  $six_month =  implode (",",$month7); 
$month_temp6 =$six_month;
$temp_array6 = explode(',', $month_temp6);
$tot_temp6 = 0;
$temp_array_length6 = count($temp_array6);
foreach($temp_array6 as $temp6)
{
 $tot_temp6 += $temp6;
}
 $avg_high_temp6 = $tot_temp6/$temp_array_length6;
 //echo "Average Temperature is : ".$avg_high_temp6."";


$query8 =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND (date_sub('$monthly5',Interval 1 month)) < date && date <= '$monthly5'" );
$month8[] = array();
$month8[] = "";
$amount8[] = array();
$amount8[] = "";  
while($row8 = $query8->fetch_assoc()){
      $month8[] = $row8['min_temp'];
      $amount8[] = $row8['date'];
    }
  $months8 =  json_encode($month8);
  // echo '<br>';
  $seven_month =  implode (",",$month8); 
$month_temp7 = $seven_month;
$temp_array7 = explode(',', $month_temp7);
$tot_temp7 = 0;
$temp_array_length7 = count($temp_array7);
foreach($temp_array7 as $temp7)
{
 $tot_temp7 += $temp7;
}
 $avg_high_temp7 = $tot_temp7/$temp_array_length7;
 //echo "Average Temperature is : ".$avg_high_temp7."";



// last 3 year
$year_date_store = '2020-12-30';
$yearly_one_date = date('Y-m-d', strtotime($year_date_store. ' - 1 year'));
$yearly_second_date = date('Y-m-d', strtotime($yearly_one_date. ' - 1 year'));
$query3 =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND (date_sub('2020-12-30',Interval 1 year)) < date && date <= '2020-12-30'");
  while($row3 = $query3->fetch_assoc()){
      $year[] = $row3['min_temp'];
      $year_date[] = $row3['date'];
    }
    $years1 =  json_encode($year);
    // echo $years1;
    $one_year =  implode (",",$year); 
$year_temp = $one_year;
$year_array = explode(',', $year_temp);
$tot_year_temp = 0;
$temp_array_year_length = count($year_array);
foreach($year_array as $year_temp)
{
 $tot_year_temp += $year_temp;
}
 $avg_high_year_temp = $tot_year_temp/$temp_array_year_length;
//  echo "<br>";
//  echo $avg_high_year_temp;



$query4 =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND (date_sub('$yearly_one_date',Interval 1 year)) < date && date <= '$yearly_one_date'");
  while($row4 = $query4->fetch_assoc()){
      $year1[] = $row4['min_temp'];
      $year_date1[] = $row4['date'];
    }
    $years2 =  json_encode($year1);
    // echo $years1;
    $one_year1 =  implode (",",$year1); 
$year_temp1 = $one_year1;
$year_array1 = explode(',', $year_temp1);
$tot_year_temp1 = 0;
$temp_array_year_length1 = count($year_array1);
foreach($year_array1 as $year_temp1)
{
 $tot_year_temp1 += $year_temp1;
}
 $avg_high_year_temp1 = $tot_year_temp1/$temp_array_year_length1;
//  echo "<br>";
//  echo $avg_high_year_temp1;


 $query5 =$con->query("SELECT min_temp,date from district_data where district_id = 0 AND (date_sub('$yearly_one_date',Interval 1 year)) < date && date <= '$yearly_one_date'");
 while($row5 = $query5->fetch_assoc()){
     $year5[] = $row5['min_temp'];
     $year_date5[] = $row5['date'];
   }
   $years5 =  json_encode($year5);
   // echo $years1;
   $one_year5 =  implode (",",$year5); 
$year_temp5 = $one_year5;
$year_array5 = explode(',', $year_temp5);
$tot_year_temp5 = 0;
$temp_array_year_length5 = count($year_array5);
foreach($year_array5 as $year_temp5)
{
$tot_year_temp5 += $year_temp5;
}
$avg_high_year_temp5 = $tot_year_temp5/$temp_array_year_length5;
// echo "<br>";
// echo $avg_high_year_temp5;
?>
<script>
var ctx = document.getElementById("chart-bars").getContext("2d");
new Chart(ctx, {
  type: "bar",
  data: { 
    // labels:<?php // echo json_encode($amount1) ?>,
    labels:['<?php echo json_encode($six_monthly) ?>','<?php echo json_encode($five_monthly) ?>','<?php echo json_encode($four_monthly) ?>','<?php echo json_encode($thrid_monthly) ?>','<?php echo json_encode($second_monthly) ?>','<?php echo json_encode($one_monthly) ?>'],
    datasets: [{
      label: "Min temp",
      tension: 0.4,
      borderWidth: 0,
      borderRadius: 3,
      borderSkipped: false,
      backgroundColor: "rgba(255,140,0, .8)",
      //data: <?php //echo json_encode($month1) ?>,
      data : ['<?php echo json_encode($avg_high_temp6) ?>','<?php echo json_encode($avg_high_temp5) ?>','<?php echo json_encode($avg_high_temp4) ?>','<?php echo json_encode($avg_high_temp3) ?>','<?php echo json_encode($avg_high_temp2) ?>','<?php echo json_encode($avg_high_temp1) ?>'],
      maxBarThickness: 22
    }, ],
  },

  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        display: true,
            title: {
              display: true,
              text: 'Minimum Temperature(°C)',
          font: {
            family: 'Times',
            size: 15,
            style: 'normal',
          },
          padding: {bottom: 0},
        
        },
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5],
          color: 'rgba(000, 000, 000, .2)'
        },
        ticks: {
          suggestedMin: 0,
          suggestedMax: 500,
          beginAtZero: true,
          padding: 10,
          font: {
            size: 15,
            weight: 300,
            family: "Roboto",
            style: 'normal',
            lineHeight: 1.5
          },
          color: "#000"
        },
      },
      x: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5],
          color: 'rgba(000, 000, 000, .2)'
        },
        ticks: {
          display: true,
          color: '#000',
          padding: 10,
          font: {
            size: 15,
            weight: 300,
            family: "Roboto",
            style: 'normal',
            lineHeight: 1.5
          },
        }
      },
    },
  },
});
    // chart 2 (blue) 
    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: <?php echo json_encode($amount1)?>,
        datasets: [{
          label: "Min Temp",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255,140,0, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255,140,0, .8)",
          borderColor: "rgba(255,140,0, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: <?php echo json_encode($month1)?>,
          maxBarThickness: 6
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            display: true,
            title: {
              display: true,
              text: 'Minimum Temperature(°C)',
          font: {
            family: 'Times',
            size: 15,
            style: 'normal',
          },
          padding: {bottom: 5},
        
        },
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
              
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 15,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
    $( window ).on( "load", function() {
        $('.loader').fadeOut(1000);
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    var taluka_id1 = document.getElementById("district").value;
    // var date_id = document.getElementById("date").value;
    $(document).on("change", "#district", function () {
    taluka_id1 = $(this).children(":selected").attr("value");
  });

  $(document).on("change", "#date", function () {
    date_id1 = $(this).val();
  });
    
    $('#downloadPdf').click(function(event) {
  var reportPageHeight = $('#reportPage').innerHeight();
  var reportPageWidth = $('#reportPage').innerWidth();
  
  var pdfCanvas = $('<canvas />').attr({
    id: "canvaspdf",
    width: reportPageWidth,
    height: reportPageHeight
  });
  
  var pdfctx = $(pdfCanvas)[0].getContext('2d');
  var pdfctxX = 0;
  var pdfctxY = 0;
  var buffer = 100;
  
  $("canvas").each(function(index) {
    var canvasHeight = $(this).innerHeight();
    var canvasWidth = $(this).innerWidth();
    
    pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
    pdfctxX += canvasWidth + buffer;
    
    if (index % 2 === 1) {
      pdfctxX = 0;
      pdfctxY += canvasHeight + buffer;
    }
  });
  
  var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
  pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
  
  pdf.save(taluka_id1+"_"+date_id1+'.pdf');
});


$('#downloadPdf1').click(function(event) {
  var reportPageHeight = $('#reportPage1').innerHeight();
  var reportPageWidth = $('#reportPage1').innerWidth();
  
  var pdfCanvas = $('<canvas />').attr({
    id: "canvaspdf",
    width: reportPageWidth,
    height: reportPageHeight
  });
  
  var pdfctx = $(pdfCanvas)[0].getContext('2d');
  var pdfctxX = 0;
  var pdfctxY = 0;
  var buffer = 100;
  
  $("#chart-bars").each(function(index) {
    var canvasHeight = $(this).innerHeight();
    var canvasWidth = $(this).innerWidth();
    
    pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
    pdfctxX += canvasWidth + buffer;
    
    if (index % 2 === 1) {
      pdfctxX = 0;
      pdfctxY += canvasHeight + buffer;
    }
  });
  
  var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
  pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
  
  pdf.save(taluka_id1+"_"+date_id1+'.pdf');
});
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>