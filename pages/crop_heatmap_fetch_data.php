<?php
    $date_id = $_POST['date_id'];
    $temp_id1 = $_POST['temp_id1'];
        $conn = mysqli_connect("localhost", "root", "", "admin_agro");
        if($temp_id1 === "max"){
            $img = mysqli_query($conn, "SELECT crop_max_heat,date FROM image where date = '$date_id'");
            // echo $img;
            while ($row = mysqli_fetch_array($img)) 
            {
            ?>
                <img src="../adminagro/crop_max_image/<?php echo $row['crop_max_heat'] ?>" id="myimage"/>
            <?php
            }
        }
        elseif($temp_id1 === "min"){
            $img = mysqli_query($conn, "SELECT crop_min_heat,date FROM image where date = '$date_id'");
            // echo $img;
            while ($row = mysqli_fetch_array($img)) 
            {
            ?>
                <img src="../adminagro/crop_min_image/<?php echo $row['crop_min_heat'] ?>" id="myimage"/>
            <?php
            }
        }
        else{
            $img = mysqli_query($conn, "SELECT crop_rain_heat,date FROM image where date = '$date_id'");
            // echo $img;
            while ($row = mysqli_fetch_array($img)) 
            {
            ?>
                <img src="../adminagro/crop_rain_image/<?php echo $row['crop_rain_heat'] ?>" id="myimage"/>
            <?php
            }
        }
?>
