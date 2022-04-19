<?php
    $date_id = $_POST['date_id'];

        $conn = mysqli_connect("localhost", "root", "", "admin_agro");
        $img = mysqli_query($conn, "SELECT crop_heatmap,date FROM image where date = '$date_id'");

        while ($row = mysqli_fetch_array($img)) 
        {
        ?>
            <img src="../adminagro/crop_image/<?php echo $row['crop_heatmap'] ?>" class="image2"/>
        <?php
        }
?>
