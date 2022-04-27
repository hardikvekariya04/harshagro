<?php
ob_start();
require_once '../config/function.php';
require_once '../config/db.php';

// update();

if (!isset($_SESSION['ID']) && !isset($_SESSION['EMAIL'])) {
  header("location: ../index.php");
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
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tachyons/4.11.1/tachyons.min.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.heat/0.2.0/leaflet-heat.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>
  #chart-line1,
  #chart-line2 {
    padding: 10px;
  }

  #chart-line1 img,
  #chart-line2 img {
    border-radius: 7px;
    border: 2px dashed gray;
    width: 50vw;
    height: 65vh;
    /* margin-bottom: -20px; */
    margin-top:10px;
  }
</style>

<body class="g-sidenav-show  bg-gray-200">
<div class="loader"></div>
  <!-- <div class="circle"></div> -->
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps bg-white"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=""
        target="_blank">
        <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo"
          style="min-width: 12rem; min-height: 4rem; top: 0;">
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
          <a class="nav-link text-dark " href="../pages/crop.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Vegetation</span>

          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark active bg-gradient-primary" href=" ">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1" style="font-size:20px;font-weight:bold;">Heatmap</span>
          </a>
        </li>
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
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Climate</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Heatmap</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">

              <!-- <input class="in" id="date" type="date" placeholder="DD-MM-YYYY" min="1997-01-01" max="2020-02-15"
                value="" style="border-top-left-radius:50px;border-bottom-left-radius:50px;width:200px;padding:7px;margin-bottom:-10px;"> -->

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
    <!-- <p id="message"></p> -->
    <!-- End Navbar -->
    <div class="container-fluid py-0" style="margin-top:-30px">
      <div class="row mt-4">
        <div class="col-lg-5.5 col-md-6 mt-4 mb-0">
          <div class="card z-index-2 ">
          <div class="card-body" style="margin-top:-20px;">
              <h3 class="mb-0 ">Weather</h3>
              <p class="text-sm ">Heatmap Data</p>
              <select class="in" name="type" id="type" style="position:absolute;top:10px;left:180px;border-radius:50px;width:150px;">
                <option value="min">Min Temp</option>
                <option value="max">Max Temp</option>
                <option value="rain">Rainfall</option>
              </select>
              <input class="in" id="date" type="date" placeholder="DD-MM-YYYY" min="1997-01-01" max="2020-02-15"
                value="2018-02-07" style="border-top-left-radius:50px;border-bottom-left-radius:50px;width:150px;padding:3px;margin-bottom:-10px;position:absolute;top:10px;left:340px;">
            </div>
            <hr class="dark horizontal" style="margin-top:-30px;margin-bottom:-10px;">
            <div id="chart-line1" class="img-magnifier-container"></div>
          </div>
        </div>
        <div class="col-lg-5.5 col-md-6 mt-4 mb-0" style="margin-left : 20px">
          <div class="card z-index-2  ">
          <div class="card-body" style="margin-top:-20px;">
              <h3 class="mb-0 "> Vegetation </h3>
              <p class="text-sm "> Heatmap Data </p>
              <select class="in" name="type" id="type1" style="position:absolute;top:10px;left:180px;border-radius:50px;width:150px;">
                <option value="NDVI">NDVI</option>
                <option value="VCI">VCI</option>
                <option value="VHI">VHI</option>
              </select>
              <input type="week" name="week" id="week" style="position:absolute;top:10px;left:340px;border-radius:50px;width:150px;padding:3px;border:1px solid gray;" required>
            </div>
            <hr class="dark horizontal" style="margin-top:-30px;margin-bottom:-10px;">
            <div id="chart-line2"></div>
          </div>
        </div>
      </div>

      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,
                by
                <a class="font-weight-bold" target="_blank">Agrocast</a>

              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">

                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/#content4-28" class="nav-link text-muted"
                    target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/#team1-1g" class="nav-link text-muted"
                    target="_blank">Team</a>
                </li>
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/index.html#form1-c" class="nav-link pe-0 text-muted"
                    target="_blank">Get in Touch</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!-- <script src="../assets/js/heatmap.js"></script> -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
  <!-- <script src="/assets/js/talukas.js"></script>
    <script src="/assets/js/leaf.js"></script> -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
  <!-- <script src="../map/districts.js" ></script> -->
  <!-- <script src="../map/leaf.js" ></script> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    var path = "http://localhost/newagro/pages/";
    var date_id = '';
    var temp_id = '';
    var temp_id1 = '';
    var week = '';
    var date_id = document.getElementById("date").value;
    // console.log(date_id);
    fetch_data();
    var temp_id = document.getElementById("type").value;
    fetch_data();
    var temp_id1 = document.getElementById("type1").value;
    fetch_data();
    var week = document.getElementById("week").value;
    fetch_data();
    $(function () {
      $(document).on('change', '#date', function () {
        date_id = $(this).val();
        // console.log(date_id);
        fetch_data();
      })
      $(document).on('change','#type',function(){
        temp_id = $(this).val();
        fetch_data();
    })
    $(document).on('change','#type1',function(){
        temp_id1 = $(this).val();
        fetch_data();
    })
    $(document).on('change','#week',function(){
        week = $(this).val();
        // console.log(week);
        fetch_data();
    })
    });

    function fetch_data() {
      $.ajax({
        url: path + "heatmap_fetch_data.php",
        type: 'POST',
        data: { date_id: date_id,temp_id:temp_id ,temp_id1 : temp_id1},
        success: function (result) {
          $("#chart-line1").html(result);
        }
      });
      $.ajax({
        url: path + "crop_heatmap_fetch_data.php",
        type: 'POST',
        data: { date_id: date_id,temp_id:temp_id,temp_id1 :temp_id1,week :week },
        success: function (result) {
          $("#chart-line2").html(result);
        }
      });
    }
    $( window ).on( "load", function() {
        $('.loader').delay(2000).fadeOut(1000);
    });
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>