<?php
    $week = $_POST['week'];
    $temp_id1 = $_POST['temp_id1'];

        $conn = mysqli_connect("localhost", "root", "", "agro");
        if($temp_id1 === "NDVI"){
            $img = mysqli_query($conn, "SELECT crop_ndvi,week FROM image where week = '$week'");
            // echo $img;
            while ($row = mysqli_fetch_array($img)) 
            {
            ?>
                <img src="../adminagro/crop_ndvi/<?php echo $row['crop_ndvi'] ?>" id="myimage"/>
            <?php
            }
        }
        elseif($temp_id1 === "VCI"){
            $img = mysqli_query($conn, "SELECT crop_vci,week FROM image where week = '$week'");
            // echo $img;
            while ($row = mysqli_fetch_array($img)) 
            {
            ?>
                <img src="../adminagro/crop_vci/<?php echo $row['crop_vci'] ?>" id="myimage"/>
            <?php
            }
        }
        else{
            $img = mysqli_query($conn, "SELECT crop_vhi,week FROM image where week = '$week'");
            // echo $img;
            while ($row = mysqli_fetch_array($img)) 
            {
            ?>
                <img src="../adminagro/crop_vhi/<?php echo $row['crop_vhi'] ?>" id="myimage"/>
            <?php
            }
        }
?>
