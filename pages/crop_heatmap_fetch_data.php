<?php
    $week = $_POST['week'];
    $temp_id1 = $_POST['temp_id1'];

        $conn = mysqli_connect("localhost", "root", "", "agrocast");

        $select_week = substr($week, strpos($week, "W") + 1);
        // echo $select_week;
        $trim_year = explode('-',trim($week))[0];

        $final_week = $trim_year."_0".$select_week;
    $final_week;
        if($temp_id1 === "NDVI"){
            $img = mysqli_query($conn, "SELECT crop_ndvi FROM ndvi where crop_ndvi LIKE '%$final_week%'");
            // echo $img;
            while ($row = mysqli_fetch_array($img)) 
            {
            ?>
                <img src="../adminagro/crop_ndvi/<?php echo $row['crop_ndvi'] ?>" id="myimage"/>
            <?php
            }
        }
        elseif($temp_id1 === "VCI"){
            $img = mysqli_query($conn, "SELECT crop_vci FROM vci where crop_vci LIKE '%$final_week%''");
            // echo $img;
            while ($row = mysqli_fetch_array($img)) 
            {
            ?>
                <img src="../adminagro/crop_vci/<?php echo $row['crop_vci'] ?>" id="myimage"/>
            <?php
            }
        }
        else{
            $img = mysqli_query($conn, "SELECT crop_vhi FROM vhi where crop_vhi  LIKE '%$final_week%'");
            // echo $img;
            while ($row = mysqli_fetch_array($img)) 
            {
            ?>
                <img src="../adminagro/crop_vhi/<?php echo $row['crop_vhi'] ?>" id="myimage"/>
            <?php
            }
        }
?>
