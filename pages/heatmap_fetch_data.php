<?php
    $date_id = $_POST['date_id'];
    // echo $date_id;
        $conn = mysqli_connect("localhost", "root", "", "admin_agro");
        $img = mysqli_query($conn, "SELECT weather_heatmap,date FROM image where date = '$date_id'");
        // echo $img;
        while ($row = mysqli_fetch_array($img)) 
        {
        ?>
            <img src="../adminagro/weather_image/<?php echo $row['weather_heatmap'] ?>" id="myimage"/>
        <?php
        }
?>
