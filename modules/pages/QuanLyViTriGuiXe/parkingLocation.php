<?php session_start(); 
  if (isset($_SESSION['login']) == false) {
    header("Location: /DoAnWeb/login/index.php");
  }
  else {
    if (($_SESSION['login']) == false) {
      header("Location: /DoAnWeb/login/index.php");
    }
    else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>ADEPRO - Danh sách vị trí </title>
</head>
<body>
<style>
    <?php
    include "../../../guessIndex.css";
    include "../../../bootstrap.css";
    include "../../../connection.php";
    include "parkingLocation.css";
    ?>
    h3{
        text-align:center;
    }
  </style>
    <?php
    include "../../header-navbar/header.php";
  ?>
  <h3>Danh sách vị trí khu <?php  ?></h3>
    <div class="grid-container">
        <?php
        $total = 45;
        $max = 40;
        for ($i = 1; $i <= $max; $i++) {
        ?>
         <div id="grid-item">
                <div id="locationID-wapper">
                    <span name="locationID" id="location_<?php echo($i) ?>" ><?php echo $i; ?><span>
                </div>
                <div id="locationInput">
                     <input type="text" name="txtCardID_<?php echo($i) ?>" id="cardID_<?php echo($i) ?>" placeholder="ID thẻ" value="<?php ?>">
                    <input type="text" name="txtLicensePlate_<?php echo($i) ?>" id="licensePlate_<?php echo($i) ?>" placeholder="Biển số" value="<?php ?>">
                </div>
                <i id="fa" class="<?php
                if (isset($_GET['vehicleType'])) {
                  if ($_GET['vehicleType'] == "Xe máy") {
                    echo("fa-solid fa-motorcycle");
                  }
                  if ($_GET['vehicleType'] == "Ô tô") {
                    echo("fa area-icon fa-car");
                  }
                } else {
                  header("Location: ChonKhu.php");
                }
                ?>"></i>
            </div>
        <?php 
        }
        ?>
    </div>
  <?php include "../../footer.html" ?>

        <!-- need Paging -->

</body>
    <?php 
        }
    }
    ?>
</html>