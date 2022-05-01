<?php
    $date_id = $_POST['date_id'];
    $temp_id = $_POST['temp_id'];
    // $temp_id1 = $_POST['temp_id1'];
    // echo $date_id;
        $conn = mysqli_connect("localhost", "root", "", "agrocast");

        $first_date= date("Y",strtotime($date_id));
        $second_date= date("m",strtotime($date_id));
        $third_date= date("d",strtotime($date_id));

        $final_first_date = $first_date."_".$second_date."_".$third_date;
        // echo $final_first_date;
        if($temp_id === "max"){
        $img = mysqli_query($conn, "SELECT weather_max_heat FROM maximum_temp where weather_max_heat LIKE '%$final_first_date%'");
        // echo $img;
        while ($row = mysqli_fetch_array($img)) 
        {
        ?>
            <img src="../adminagro/weather_max_image/<?php echo $row['weather_max_heat'] ?>" id="myimage"/>
        <?php
        }
    }
    else if($temp_id === "min"){
        $img = mysqli_query($conn, "SELECT weather_min_heat FROM minimum_temp where weather_min_heat LIKE '%$final_first_date%'");
        // echo $img;
        while ($row = mysqli_fetch_array($img)) 
        {
        ?>
            <img src="../adminagro/weather_min_image/<?php echo $row['weather_min_heat'] ?>" id="myimage"/>
        <?php
        }
    }
    else{
        $img = mysqli_query($conn, "SELECT weather_rain_heat FROM rainfall_image where weather_rain_heat LIKE '%$final_first_date%'");
        // echo $img;
        while ($row = mysqli_fetch_array($img)) 
        {
        ?>
            <img src="../adminagro/weather_rain_image/<?php echo $row['weather_rain_heat'] ?>" id="myimage"/>
        <?php
        }
    }
?>
