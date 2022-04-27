<?php
require_once '../config/function.php';
if (!isset($_SESSION['ID']) && !isset($_SESSION['EMAIL'])) {
  header("location: index.php");
}
$msg = "";
// check if the user has clicked the button "UPLOAD" 
if (isset($_POST['uploadfile'])) {
    $date = $_POST['date'];
    // $datepicker = $_POST['datepicker'];
    $week = $_POST['week'];
    $weather_max_heatmap = $_FILES["choosefile"]["name"];
    $weather_min_heatmap = $_FILES["choosefile1"]["name"];
    $weather_rain_heatmap = $_FILES["choosefile2"]["name"];

    $crop_ndvi = $_FILES["choosefile3"]["name"];
    $crop_vci = $_FILES["choosefile4"]["name"];
    $crop_vhi = $_FILES["choosefile5"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];  
    $tempname1 = $_FILES["choosefile1"]["tmp_name"];  
    $tempname2 = $_FILES["choosefile2"]["tmp_name"];  
    $tempname3 = $_FILES["choosefile3"]["tmp_name"];  
    $tempname4 = $_FILES["choosefile4"]["tmp_name"];  
    $tempname5 = $_FILES["choosefile5"]["tmp_name"];  

    $folder = "weather_max_image/".$weather_max_heatmap;
    $folder1 = "weather_min_image/".$weather_min_heatmap;
    $folder2 = "weather_rain_image/".$weather_rain_heatmap;

    $folder3 = "crop_ndvi/".$crop_ndvi;
    $folder4 = "crop_vci/".$crop_vci;
    $folder5 = "crop_vhi/".$crop_vhi;

      // connect with the database
    $db = mysqli_connect("localhost", "root", "", "admin_agro");
        $sql = "INSERT INTO image (weather_max_heat,weather_min_heat,weather_rain_heat,crop_ndvi,crop_vci,crop_vhi,date,week) VALUES ('$weather_max_heatmap','$weather_min_heatmap','$weather_rain_heatmap','$crop_ndvi','$crop_vci','$crop_vhi','$date','$week')";
     // function to execute above query
        mysqli_query($db, $sql);       
        // Add the image to the "image" folder"
        if (move_uploaded_file($tempname, $folder) && move_uploaded_file($tempname1, $folder1) && move_uploaded_file($tempname2, $folder2) && move_uploaded_file($tempname3, $folder3) && move_uploaded_file($tempname4, $folder4) && move_uploaded_file($tempname5, $folder5)) {
            echo '<script language="javascript">';
            echo 'alert("Successfully Added")'; 
            echo '</script>';
           ?>
             <script>
                window.location.href = "heatmap.php";
                </script>
           <?php
        }else{
            $msg = "Failed to upload image";
    }
//     if (move_uploaded_file($tempname1, $folder1)) {
//         $msg = "Image uploaded successfully";
//     }else{
//         $msg = "Failed to upload weather minimum temp image";
// }
}
// $result = mysqli_query($db, "SELECT * FROM image");
?> 
<?php  
$connect = mysqli_connect("localhost", "root", "", "admin_agro");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Agrocast Admin page
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> 
  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
  <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
  <style>
    .vrLine {
      border-left: 5px solid green;
      height: 400px;
      position: absolute;
      left: 45%;
      top: 50%;
      transform: translate(-50%, -50%);
    }
    .col-12 {
      display: grid;
     
    }
    .col-2 {
      grid-column: 2/2;
    }

    @media only screen and (max-width: 600px) {
    
      .vrLine {
        position: relative;
        left: 0;
        top: 0;
        transform: translate(0);
        margin-top: 30px;
        margin-bottom: 30px;
        border-top: 5px solid green;
        width: 100%;
        height: 5px;
      }
      .infile {
        width: 80vw !important;
      }
      .infile > input {
        width: 100vw !important;
      }

      .col-12 {
      display: block !important;
     
    }
    .col-2 {
      margin-left: 0px !important;
    }
    .submit-btn {
      position: relative !important;
      left: 0 !important;
      top: 0 !important;
      transform: translate(0,0) !important;
    }

    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
  
        <img src="./assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo" style="min-width: 12rem; min-height: 4rem; top: 0;">

        </span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="climate_district.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Climate</span>
          </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link text-white " href="taluka_climate.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">Taluka_climate</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link text-white " href="district_crop.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">Crop</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="heatmap.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">Heatmap</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="subscriber.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">Subscriber</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="dataset_admin.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">About dataset</span>
            </a>
          </li>
        <!-- <li class="nav-item">
          <a class="nav-link text-white " href="users.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li> -->
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="../logout.php" type="button" >Log-out</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Heatmap</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Upload Heatmap image</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
           
          </div>
          
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4" style="width:95%">
      <div class="row min-vh-80 h-100">
        <div class="col-12">
     
  <!-- <form method="post" enctype="multipart/form-data">
<div class="col-1">
        <h2>Climate</h2>

        District
        <div class="infile" style="border: 1px solid black; width: 25rem; background-color: rgb(255, 255, 255); margin-bottom: 50px; ">
          <input  type="file" name="file" style="width: 50vw;" required>
        </div>
</div>

<input class="submit-btn" type="submit" name="submit" value="Import" style="width: 150px !important; height: 50px; position: absolute; left: 45%; top: 50%; transform: translate(-50%, -50%); padding: 15px;">

  </form> -->
  <form method="post" enctype="multipart/form-data">
   <div align="center" style="margin-top:-50px;">  
    <h3>Climate and Crop</h3>
    <h6>Heatmap photo upload</h6>
    <hr>
    <h2>Weather</h2>
    <div>
        <label>Date</label>
        <input type="date" name="date" class="form-control" style="width: 500px;" required/>
    </div>
    <br/>

   
    <div style="display:flex">
    <h6 style="margin-right:5px;">Max : </h6>
    <input type="file" name="choosefile" style="width:280px;border : 2px solid #29C5F6;padding:5px;border-radius:10px;color:red;" required/>
    <h6 style="margin-right:5px;margin-left:20px;">Min : </h6>
    <input type="file" name="choosefile1" style="width:280px;border : 2px solid #29C5F6;padding:5px;border-radius:10px;color:red;" required/>
    <h6 style="margin-right:5px;margin-left:20px;">Rain : </h6>
    <input type="file" name="choosefile2" style="width:280px;border : 2px solid #29C5F6;padding:5px;border-radius:10px;color:red;" required/>
    </div>
    <hr> 
    <h2>crop</h2>
   
    <div align = "center" >
        <!-- <h6>Year : </h6>
        <input type="text" class="form-control" name="datepicker" id="datepicker" style="width:400px;" /> -->
        <label >Week : </label>
                <input type="week" name="week" class="form-control" style="width: 500px;" required>
    </div>
    <br>
  <div style="display:flex">
    <h6 style="margin-right:5px;">NDVI : </h6>
    <input type="file" name="choosefile3" style="width:280px;border : 2px solid #29C5F6;padding:5px;border-radius:10px;color:red;"  required/>
    <h6 style="margin-right:5px;margin-left:20px;">VCI : </h6>
    <input type="file" name="choosefile4" style="width:280px;border : 2px solid #29C5F6;padding:5px;border-radius:10px;color:red;" required/>
    <h6 style="margin-right:5px;margin-left:20px;">VHI : </h6>
    <input type="file" name="choosefile5" style="width:280px;border : 2px solid #29C5F6;padding:5px;border-radius:10px;color:red;" required/>
  </div>
  <hr>

    <input type="submit" name="uploadfile" value="Upload" class="btn btn-info" style="width:200px;"/>
   </div>
  </form>
</div>
</div>

    <footer class="footer pt-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            
          </div>
          
        </div>
      </div>
    </footer>
  </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#example1').DataTable();
    $('#example2').DataTable();

} );
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    $(document).ready(function(){
  $("#datepicker").datepicker({
     format: "yyyy",
     viewMode: "years", 
     minViewMode: "years",
     autoclose:true
  });   
})
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>