<?php
    $date_id = $_POST['date_id'];
    $temp_id = $_POST['temp_id'];
    $temp_id1 = $_POST['temp_id1'];
    // echo $date_id;
        $conn = mysqli_connect("localhost", "root", "", "admin_agro");
        if($temp_id === "max"){
        $img = mysqli_query($conn, "SELECT weather_max_heat,date FROM image where date = '$date_id'");
        // echo $img;
        while ($row = mysqli_fetch_array($img)) 
        {
        ?>
            <img src="../adminagro/weather_max_image/<?php echo $row['weather_max_heat'] ?>" id="myimage"/>
        <?php
        }
    }
    elseif($temp_id === "min"){
        $img = mysqli_query($conn, "SELECT weather_min_heat,date FROM image where date = '$date_id'");
        // echo $img;
        while ($row = mysqli_fetch_array($img)) 
        {
        ?>
            <img src="../adminagro/weather_min_image/<?php echo $row['weather_min_heat'] ?>" id="myimage"/>
        <?php
        }
    }
    else{
        $img = mysqli_query($conn, "SELECT weather_rain_heat,date FROM image where date = '$date_id'");
        // echo $img;
        while ($row = mysqli_fetch_array($img)) 
        {
        ?>
            <img src="../adminagro/weather_rain_image/<?php echo $row['weather_rain_heat'] ?>" id="myimage"/>
        <?php
        }
    }
?>
