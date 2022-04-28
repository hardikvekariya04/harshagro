<?php
ob_start();
require_once '../config/function.php';
require_once '../config/db.php';

// update();

if (!isset($_SESSION['ID']) && !isset($_SESSION['EMAIL'])) {
  header("location: ../index.php");
}
$current_date = "select max(year) AS year from crop LIMIT 1";
$date_result = mysqli_query($con, $current_date);
$row_date = mysqli_fetch_assoc($date_result);

$date_current = $row_date['year']; 

$current_week = "select max(week) AS week from crop WHERE year = (select max(year) AS year from crop) ";
$week_result = mysqli_query($con, $current_week);
$row_week = mysqli_fetch_assoc($week_result);
$week_current = $row_week['week']; 

if($row_week['week'] > 10){
$full_weeks = $date_current."-W".$week_current;
}
else{
  $full_weeks = $date_current."-W0".$week_current;
}


$current_min_date = "select min(year) AS year from crop LIMIT 1";
$date_min_result = mysqli_query($con, $current_min_date);
$row_min_date = mysqli_fetch_assoc($date_min_result);

$date_min_current = $row_min_date['year']; 

$current_min_week = "select min(week) AS week from crop WHERE year = (select min(year) AS year from crop) ";
$week_min_result = mysqli_query($con, $current_min_week);
$row_min_week = mysqli_fetch_assoc($week_min_result);
$week_min_current = $row_min_week['week']; 

if($row_min_week['week'] > 10){
$full_min_weeks = $date_min_current."-W".$week_min_current;
}
else{
  $full_min_weeks = $date_min_current."-W0".$week_min_current;
}
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

<body class="g-sidenav-show  bg-gray-200">
<div class="loader"></div>
  <!-- <div class="circle"></div> -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps bg-white" id="sidenav-main">
  <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
      <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo" style="min-width: 8rem; min-height: 3rem; top: 0;">
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark " href="../indexD.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Climate</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark active bg-gradient-primary" href="../pages/crop.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1" style="width:200px;font-size:20px;font-weight:bold;">Vegetation</span>
            
          </a>
        </li>

        <li class="nav-item" style="border: 2px solid rgb(168, 168, 168); border-radius: 10%; width:200px;">
          <a class="nav-link text-dark active bg-gradient-info" href="#" style="height: 41px !important;">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">circle</i>
            </div>
            <span class="nav-link-text ms-1">District</span>
          </a>
        </li>

        <li class="nav-item" style="width:200px;">
          <a class="nav-link text-dark active bg-gradient-info" href="../pages/taluka_crop.php" style="height: 41px !important;">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">circle</i>
            </div>
            <span class="nav-link-text ms-1">Taluka</span>
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

        <!-- <li class="nav-item">
          <a class="nav-link text-dark " href="../pages/taluka_crop.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Taluka Crops</span>
            
          </a>
        </li> -->
        
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
        <a class="btn bg-info mt-0 w-100" href="dataset.php" type="button" style="color: #fff;"><i
            class="material-icons opacity-10">info </i> Dataset</a>
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
           

              
                <!-- <label>Select District:</label> -->
                <select id="district" >
                <!-- <option value="" disabled >Select District</option> -->
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

                <!-- <select class="in" name="years" id="years">
                <option value="2018" selected>2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>

              </select> -->
              <!-- <select class="in" name="weeks" id="weeks"> -->
                <!-- <option value="1" selected>01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11" >11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option> -->
                <select class="in" name="type" id="type">
              <option value="NDVI" selected>NDVI</option>
                <!-- <option value="SMT">SMT</option> -->
                <!-- <option value="TCI">TCI</option> -->
                <option value="VCI">VCI</option>
                <option value="VHI">VHI</option>
              </select>
                <input type="week" name="weeks" id="weeks"  min="<?php echo $full_min_weeks?>" max="<?php echo $full_weeks?>" value="<?php echo $full_weeks?>" class="in" style="border:1px solid gray;border-top-right-radius:50px;border-bottom-right-radius:50px;" required>
              <!-- </select> -->


              <!-- <select class="in" name="period" id="per">
              <option value="">Select period </option>
                <option value="last 6 month">last 6 month</option>
                <option value="last 3 year">last 3 year</option>
              </select> -->

              <!-- <input class="in" id="date" type="date" placeholder="DD-MM-YYYY" min="1997-01-01" max="2020-02-15" value="2020-05-30" selected> -->
            </div>
          </div>
          <!-- <input class="in" id="date" type="date" placeholder="YYYY" min="1997" max="2023" value="2020"> -->

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
              <div class="chart" id="chart_data" style="width:550px;">
                  <canvas id="chart-line" class="chart-canvas" height="270" width="290" style="margin-left:0px"></canvas>
              </div>
          </div>
              <hr style="margin-top:-5px;margin-bottom:0px;">

             
                <h6 name="period" id="per" align="center" style="border:1px dashed gray;">LAST 3 YEAR</h6>

              <!-- <a href="#" id="downloadPdf1"><i class="fa fa-download" style="font-size:22px;align-item:right;text-align:right;position:absolute;right:40px;margin-top:-10px;"></i></a> -->

              <a href="#" id="downloadPdf1"><i class="fa fa-download" style="font-size:22px;align-item:right;text-align:right;position:absolute;right:40px;"></i></a>

              <div id="reportPage1">
                <div class="chart" id="chart_data1" style="margin-top:-10px;">
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
  <script src="../assets/js/crop_district.js"></script>
  <script src="../map/crop_district_map.js"></script>
  <!-- <script src="../map/leaf.js" ></script> -->
    <!-- <script src="../map/districts1.js" ></script> -->

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

$weeknumber = substr($full_weeks, strpos($full_weeks,"W") + 1);
  $dto = new DateTime();
  $dto->setISODate($date_current,$weeknumber);
  $ret = $dto->format('Y-m-d');
  $first_year = $dto->format('Y');

  $dto->modify('-7 days');
  $ret2 = $dto->format('Y-m-d');
  $second_year = $dto->format('Y');

  $dto->modify('-7 days');
  $ret3 = $dto->format('Y-m-d');
  $third_year = $dto->format('Y');

  $dto->modify('-7 days');
  $ret4 = $dto->format('Y-m-d');
  $four_year = $dto->format('Y');

  $dto->modify('-7 days');
  $ret5 = $dto->format('Y-m-d');
  $five_year = $dto->format('Y');

  $dto->modify('-7 days');
  $ret6 = $dto->format('Y-m-d');
  $six_year = $dto->format('Y');

  $dto->modify('-7 days');
  $ret7 = $dto->format('Y-m-d');
  $seven_year = $dto->format('Y');

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

// if($week_current > 10){
// $final_first_year = $first_year."-".$week_current;
// }
// else{
//   $final_first_year = $first_year."-0".$week_current;
// }
$final_first_year = $first_year."-".$weeknumber;
$final_second_year = $second_year."-".$weeknumber1;
$final_third_year = $third_year."-".$weeknumber2;
$final_four_year = $four_year."-".$weeknumber3;
$final_five_year = $five_year."-".$weeknumber4;
$final_six_year = $six_year."-".$weeknumber5;
$final_seven_year = $seven_year."-".$weeknumber6;


        $con = new mysqli('localhost','root','','agro');
        $query1 =$con->query("SELECT NDVI from crop where d_id = 0 AND week IN('$weeknumber','$weeknumber1','$weeknumber2','$weeknumber3','$weeknumber4','$weeknumber5','$weeknumber6') AND year  = $date_current" );
        while($row1 = $query1->fetch_assoc()){
          $month1[] = $row1['NDVI'];
        }

$dto = new DateTime();
$dto->setISODate($date_current,$weeknumber);
$ret_0 = $dto->format('Y-m-d');
$month_date1 = $dto->format('Y');
$one_monthly =date("Y - M",strtotime($ret_0));

$ret_1 = date("Y - M",strtotime($one_monthly . ' - 1 year'));
$month_date2 =date("Y",strtotime($ret_1));

$ret_2 = date("Y - M",strtotime($ret_1 . ' - 1 year'));
$month_date3 =date("Y",strtotime($ret_2));

    $query1 =$con->query("SELECT NDVI  from `crop` where d_id = 0  AND week BETWEEN 1 AND 52 AND year = '$month_date1'" );
    while($row1 = $query1->fetch_assoc()){
      $month_1[] = $row1['NDVI'];
    }
  
    $months1 =  json_encode($month_1);
  // echo '<br>';
  $first_month =  implode (",",$month_1);  
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


  $query2 =$con->query("SELECT NDVI  from `crop` where d_id = 0  AND week BETWEEN 1 AND 52 AND year = '$month_date2'" );
    while($row2 = $query2->fetch_assoc()){
      $month2[] = $row2['NDVI'];
    }
    $months2 =  json_encode($month2);
    $second_month =  implode (",",$month2);  
  
  $month_temp2 = $second_month;
  $temp_array2 = explode(',', $month_temp2);
  $tot_temp2 = 0;
  $temp_array_length2 = count($temp_array2);
  foreach($temp_array2 as $temp2)
  {
   $tot_temp2 += $temp2;
  }
   $avg_high_temp2 = $tot_temp2/$temp_array_length2;


    $query3 =$con->query("SELECT NDVI  from `crop` where d_id = 0  AND week BETWEEN 1 AND 52 AND year = '$month_date3'" );
    while($row3 = $query3->fetch_assoc()){
      $month3[] = $row3['NDVI'];
    }
    
    $months4 =  json_encode($month3);
  // echo '<br>';
  $third_month =  implode (",",$month3);  

$month_temp3 = $third_month;
$temp_array3 = explode(',', $month_temp3);
$tot_temp3 = 0;
$temp_array_length3 = count($temp_array3);
foreach($temp_array3 as $temp3)
{
 $tot_temp3 += $temp3;
}
 $avg_high_temp3 = $tot_temp3/$temp_array_length3;
?>
<script>

// var ctx = document.getElementById("chart-bars").getContext("2d");
//     new Chart(ctx, {
//   type: "bar",
//   data: { 
//     labels: [],
//     datasets: [{
//       label: "Temperature",
//       tension: 0.4,
//       borderWidth: 0,
//       borderRadius: 4,
//       borderSkipped: false,
//       backgroundColor: "rgba(000, 000, 000, .8)",
//       data: [],
//       maxBarThickness: 6
//     }, ],
//   },

//   options: {
//     responsive: true,
//     maintainAspectRatio: false,
//     plugins: {
//       legend: {
//         display: true,
//       }
//     },
//     interaction: {
//       intersect: false,
//       mode: 'index',
//     },
//     scales: {
//       y: {
//         grid: {
//           drawBorder: false,
//           display: true,
//           drawOnChartArea: true,
//           drawTicks: false,
//           borderDash: [5, 5],
//           color: 'rgba(000, 000, 000, .2)'
//         },
//         ticks: {
//           suggestedMin: 0,
//           suggestedMax: 500,
//           beginAtZero: true,
//           padding: 10,
//           font: {
//             size: 14,
//             weight: 300,
//             family: "Roboto",
//             style: 'normal',
//             lineHeight: 2
//           },
//           color: "#fff"
//         },
//       },
//       x: {
//         grid: {
//           drawBorder: false,
//           display: true,
//           drawOnChartArea: true,
//           drawTicks: false,
//           borderDash: [5, 5],
//           color: 'rgba(000, 000, 000, .2)'
//         },
//         ticks: {
//           display: true,
//           color: '#000',
//           padding: 10,
//           font: {
//             size: 14,
//             weight: 300,
//             family: "Roboto",
//             style: 'normal',
//             lineHeight: 2
//           },
//         }
//       },
//     },
//   },
// });
var ctx = document.getElementById("chart-bars").getContext("2d");
new Chart(ctx, {
  type: "bar",
  data: { 
    // labels:<?php // echo json_encode($amount1) ?>,
    labels:['<?php echo json_encode($month_date3)?>','<?php echo json_encode($month_date2)?>','<?php echo json_encode($month_date1)?>'],
    datasets: [{
      label: "NDVI",
      tension: 0.4,
      borderWidth: 0,
      borderRadius: 3,
      borderSkipped: false,
      backgroundColor: "rgba(46, 204, 113)",
      data : ['<?php echo json_encode($avg_high_temp3)?>','<?php echo json_encode($avg_high_temp2)?>','<?php echo json_encode($avg_high_temp1)?>'],
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
              text: 'NDVI',
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
            size: 14,
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
            lineHeight: 2
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
        labels: ['<?php echo json_encode($final_seven_year)?>','<?php echo json_encode($final_six_year)?>','<?php echo json_encode($final_five_year)?>','<?php echo json_encode($final_four_year)?>','<?php echo json_encode($final_third_year)?>','<?php echo json_encode($final_second_year)?>','<?php echo json_encode($final_first_year)?>'],
        datasets: [{
          label: "NDVI",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(46, 204, 113)",
          pointBorderColor: "transparent",
          borderColor: "rgba(46, 204, 113)",
          borderColor: "rgba(46, 204, 113)",
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
              text: 'NDVI',
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
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 1.5
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
                lineHeight: 1
              },
            }
          },
        },
      },
    });
    $( window ).on( "load", function() {
        $('.loader').delay(2000).fadeOut(1000);
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
    $(document).on("change", "#district", function () {
    taluka_id1 = $(this).children(":selected").attr("value");
  });
  $(document).on("change", "#weeks", function () {
    year = $(this).val();

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
  
  pdf.save(taluka_id1+"_"+year+'.pdf');
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
  
  pdf.save(taluka_id1+"_"+year+'.pdf');
});
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>