<?php  
require_once '../config/function.php';
$connect = mysqli_connect("localhost", "root", "", "admin_agro");
if (!isset($_SESSION['ID']) && !isset($_SESSION['EMAIL'])) {
  header("location: index.php");
}
$today = date("F j, Y G:i:s");
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  $full_filename = $filename[0].'.'.$filename[1];
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    //    $item0 = '';
    $item1 = mysqli_real_escape_string($connect, $data[0]);  
                $item2 = mysqli_real_escape_string($connect, $data[1]);
                $item3 = mysqli_real_escape_string($connect, $data[2]);
                $item4 = mysqli_real_escape_string($connect, $data[3]);
                $item5 = mysqli_real_escape_string($connect, $data[4]);
                $item6 = mysqli_real_escape_string($connect, $data[5]);
                $item7 = mysqli_real_escape_string($connect, $data[6]);
                $item8 = mysqli_real_escape_string($connect, $data[7]);
                // $item9 = mysqli_real_escape_string($connect, $data[8]);
                // $item10 = mysqli_real_escape_string($connect, $data[9]);
                $query = "INSERT into district_crop(year,week,d_id,NDVI,SMT,TCI,VCI,VHI) values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8')";
                mysqli_query($connect, $query);
   }
   $queryhistory = "INSERT into upload_history(type,timestamp,filename) values('district_crop','$today','$full_filename')";
   mysqli_query($connect, $queryhistory);
   fclose($handle);
   echo "<script>alert('Import done');</script>";
   header("Location: district_crop.php");
  }
 }
}

if(isset($_POST["submit"]))
{
 if($_FILES['file1']['name'])
 {
  $filename1 = explode(".", $_FILES['file1']['name']);
  $full_filename = $filename[0].'.'.$filename[1];
  if($filename1[1] == 'csv')
  {
   $handle = fopen($_FILES['file1']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    //    $item0 = '';
    $item1 = mysqli_real_escape_string($connect, $data[0]);  
                $item2 = mysqli_real_escape_string($connect, $data[1]);
                $item3 = mysqli_real_escape_string($connect, $data[2]);
                $item4 = mysqli_real_escape_string($connect, $data[3]);
                $item5 = mysqli_real_escape_string($connect, $data[4]);
                $item6 = mysqli_real_escape_string($connect, $data[5]);
                $item7 = mysqli_real_escape_string($connect, $data[6]);
                $item8 = mysqli_real_escape_string($connect, $data[7]);
                // $item9 = mysqli_real_escape_string($connect, $data[8]);
                // $item10 = mysqli_real_escape_string($connect, $data[9]);
                $query = "INSERT into taluka_crop(year,week,t_id,NDVI,SMT,TCI,VCI,VHI) values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8')";
                mysqli_query($connect, $query);
   }
   $queryhistory = "INSERT into upload_history(type,timestamp,filename) values('taluka_crop','$today','$full_filename')";
   mysqli_query($connect, $queryhistory);
   fclose($handle);
   echo "<script>alert('Import done');</script>";
   header("Location: district_crop.php");
  }
 }
}
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
        <a class="btn bg-gradient-primary mt-4 w-100" href="../logout.php" type="button">Log-out</a>
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Upload your CSV File</h6>
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
   <div align="center">  
    <h1>Crop</h1>
    <h6>District</h6>
    <input type="file" name="file" style="width:300px;border : 2px solid #29C5F6;padding:5px;border-radius:10px;color:red;" required/>
    <br />
    <br/>
    <!-- <input type="submit" name="submit" value="Import" class="btn btn-info" style="width:200px;"/> -->

    <h6>Taluka</h6>
    <input type="file" name="file1" style="width:300px;border : 2px solid #29C5F6;padding:5px;border-radius:10px;color:red;" required/>
    <br />
    <br/>
    <input type="submit" name="submit" value="Import" class="btn btn-info" style="width:200px;"/>
   </div>
  </form>
</div>
</div>


<hr style="margin-top: 20px; margin-bottom: 20px;">

<h2>Crop DataTable</h2>
<table id="example2" class="table table-striped" style="width:100%;"  data-order='[[ 0, "desc" ]]'>
  <thead>
      <tr>
          <th>ID</th>
          <th>Type</th>
          <th>Timestamp</th>
          <th>Filename</th>
      </tr>
  </thead>
  <tbody>
  <?php
    $query2 = "select id,type,timestamp,filename from upload_history where type = 'district_crop' OR type = 'taluka_crop'";
    // mysqli_query($connect, $query2);
    $res = $connect->query($query2);       
      if($res->num_rows > 0)
        {
          while($row1 = $res-> fetch_assoc())
          {
         echo  '<tr><td>'.$row1['id'].'</td><td>'.$row1['type'].'</td><td>'.$row1['timestamp'].'</td><td>'.$row1['filename'].'</td></tr>';
          }
        }
  ?>
  </tbody>
</table>










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
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>