<?php
 session_start();  
 include('db.php');

// set session messg
function set_message($msg)
{
 if(!empty($msg))
 {
     $_SESSION['MESSAGE']=$msg;
 }
 else
 {
     $msg = '';
 }
}


//display session messg
function display_message()
{
 if(isset($_SESSION['MESSAGE']))
 {
     echo $_SESSION['MESSAGE'];
     unset($_SESSION['MESSAGE']);

 }
}
        function register_user()
        {
            
        global $con;
        if(isset($_POST['submit']) || $_SERVER['REQUEST_METHOD']=='POST')
        {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword =$_POST['cpassword'];
    
            if(empty($username) || empty($email) || empty($password) || empty($cpassword))
            {
                $error = "<div style='color:red'> Please Check your Registration </div>";
                set_message($error);
            }
            else
            {
                if($password != $cpassword)
                {
                    $error = "<div style='color:red'> Your Password not matched </div>";
                    set_message($error);
                }
                else
                {
                    $query = "select * from users where username='$username'";
                    $result = mysqli_query($con,$query);
    
                    if(mysqli_num_rows($result))
                    {
                        $error = "<div style='color:red'> Username Already Exists </div>";
                        set_message($error);
                    }
                    else{
                        
                    $query = "select * from users where email='$email'";
                    $result = mysqli_query($con,$query);
    
                    if(mysqli_num_rows($result))
                    {
                        $error = "<div style='color:red'> Email Already Exists </div>";
                        set_message($error);
                    }
                    else
                        {
                            $hash = md5($password);
                            $token = md5(rand());
                            date_default_timezone_set('Asia/Kolkata');
                            $datetime = date("F j, Y g:i:s a");
                            $sql = "insert into users(username, email,create_datetime, password, token) values('$username', '$email', '$datetime', '$hash', '$token')";
                            $data = mysqli_query($con, $sql);
                            if($data)
                            {
                            $error = "<div style='color:red'> Record Successfully Registered :) </div>";
                            set_message($error);
                                
                            }
                            else
                            {
                                $error = "<div style='color:red'> Oops Something Went Wrong :( </div>";
                            set_message($error);
                            }
                        }
    
                    }
                }
            }
    
            // if(($_POST['users']) == 'student') {
            //     $query = "UPDATE `mydatabase` SET `status`='approved' where username = '$username'";
            //     $result = mysqli_query($con,$query);
            // }
        }
        }
    function login_user()
    {
        
    global $con;
    if(isset($_POST['login_submit']) || $_SERVER['REQUEST_METHOD']=='POST')
    {
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);


        if(empty($username) || empty($password) )
        {
            $error = "<div style='color:red'> Please fill your Credentials </div>";
            set_message($error);
        }
        else
        {
            
            $query = "select * from users where username='$username' or email='$username'";
            $result = mysqli_query($con,$query);
            
           if($row=mysqli_fetch_assoc($result))
           {
            $_SESSION['id']= $row['id'];
           $db_pass = $row['password'];
           
                if(md5($password)==$db_pass  )
                {
                    ?>
                <script>
                window.location.href='../user/index.php';
                </script>
            <?php
                    $_SESSION['ID']=$row['id'];
                    $_SESSION['EMAIL']=$row['EMAIL'];
                }
                else
                {
                    $error = "<div style='color:red'> Please Enter Valid Password ! </div>";
                    set_message($error);
                }
           }
           else
           {
            $error = "<div style='color:red'> Please Enter Valid Username or Email ! </div>";
            set_message($error);
           }
           
        }
    }
    }
?>