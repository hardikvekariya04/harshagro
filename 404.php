<?php
ob_start();

require_once 'config/db.php';

if (isset($_POST["reset"])) {
  $email = mysqli_real_escape_string($con, $_POST["email"]);

  $check_email = mysqli_query($con, "select * from users where email='$email'");

  if (mysqli_num_rows($check_email) > 0) {
      $data = mysqli_fetch_assoc($check_email);
      
      $to = $email;
      $subject = "Reset Password - SXCA Coders Club";
    
      $message = "
<!doctype html>
<html lang='en-US'>

<head>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
    <title>Reset Password Email Template</title>
    <meta name='description' content='Reset Password.'>
    <style type='text/css'>
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body marginheight='0' topmargin='0' marginwidth='0' style='margin: 0px; background-color: #f2f3f8;' leftmargin='0'>
    <!--100% body table-->
    <table cellspacing='0' border='0' cellpadding='0' width='100%' bgcolor='#f2f3f8'
        style='@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;'>
        <tr>
            <td>
                <table style='background-color: #f2f3f8; max-width:670px;  margin:0 auto;' width='100%' border='0'
                    align='center' cellpadding='0' cellspacing='0'>
                    <tr>
                        <td style='height:80px;'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='text-align:center;'>
                          <a href='https://sxcacoders.pages.dev/' title='logo' target='_blank'>
                            <img width='60' src='https://sxcacoders.pages.dev/logo1.png' style='border-radius:50px;' title='logo' alt='logo'>
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style='height:20px;'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width='95%' border='0' align='center' cellpadding='0' cellspacing='0'
                                style='max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);'>
                                <tr>
                                    <td style='height:40px;'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style='padding:0 35px;'>
                                        <h1 style='color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;'>You have
                                            requested to reset your password</h1>
                                        <span
                                            style='display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;'></span>
                                        <p style='color:#455056; font-size:15px;line-height:24px; margin:0;'>
                                            We cannot simply send you your old password. A unique link to reset your
                                            password has been generated for you. To reset your password, click the
                                            following link and follow the instructions.
                                        </p>
                                        <a href='http://sxcacoderz.atwebpages.com/user/reset-password.php?token={$data['token']}'
                                            style='background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;'>Reset
                                            Password</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='height:40px;'>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style='height:20px;'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='text-align:center;'>
                            <p style='font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;'>&copy; <strong>SXCA Coders Club</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style='height:80px;'>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>";
    
      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
      // More headers
      $headers .= "From: no-reply@sxcacoders.tk" ;
    
      if (mail($to,$subject,$message,$headers)) {
        echo "<script>alert('We have sent a reset password link to your email - {$email}');</script>";
        header("Location: 404.php?mail=sent");

      } else {
        echo "<script>alert('Mail not sent. Please try again.');</script>";
      }
  } else {
      echo "<script>alert('Email not found on our database.');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Us</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="assets/css/plugins/animate.min.css"/>
  <link href="assets/css/material-dashboard.css" rel="stylesheet">
  <script src="asset/js/jquery.min.js"></script>

  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      html, body {
        height: 100vh;
        overflow-y: hidden;
        overflow-x: hidden;
      }
      body {
  font-family: "Source Sans Pro","Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 13px;
  background-color:#f0f3f4;
  line-height: 1.42857143 !important;
  color: #58666e !important;
}
      input {
        padding: 8px 20px;
        border: 1px solid rgb(144, 144, 144);
      }
      .bottom {
        position: relative;
        bottom: -15vh;
      }
      .sub {
        background-color: rgb(32, 112, 178);
        border: 1px solid rgb(150, 150, 150);
        color: #fff;
        margin-top: 10px;
        padding: 5px 25px;
      }
      .sub:hover {
        background-color: rgb(35, 156, 255);

      }
    </style>
  </head>

  <body id="mimin">
   
  <div class="col-md-12">

    <!-- start: Content -->
    <center>
      <div class="page-404 animated flipInX">
        <img src="assets/img/404.gif" class="img-responsive"/>
        <br>
        <a href="index.php"> Do you have a problem?</br><span class="icons icon-arrow-down"></span></a>
        <h2 id="textid" style="color: rgb(7, 111, 248);">Forgot Password ?</h2>
        <!-- <p>Don't Worry</p> -->
      <!-- <form method="post">
        <input type="email" placeholder="Enter Your Email" name="email" required><br>
        <input type="submit" class="sub" name="reset">
      </form> -->
           <h4 class="bottom">Contact Us: hardik@gmail.com</h4>

      </div>
    </center>
    <!-- end: content -->
  </div>

<!-- start: Javascript -->

<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>


<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>


<!-- custom -->
<script src="asset/js/main.js"></script>
<script type="text/javascript">
  if(window.location.search == "?mail=sent") {
    $('form').css("display", "none");
    $('#textid').text("Check your mail in spam");
  }
 
</script>
<!-- end: Javascript -->
</body>
</html>