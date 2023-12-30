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
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    />
    <title>ADEPRO - Chọn khu quản lý</title>
	 
</head>
<body>
<style>
    <?php
    include "../../../guessIndex.css";
    include "./chiaKhu.css";
    include "../../../bootstrap.css";
    ?>
    
</style>
<?php   
    include "../../header-navbar/header.php";
    // include "./chiaKhu.html";
  ?>
   <h3>chọn vị trí quản lý</h3>
  <main>
    <div class="Areas">
      <h5>vị trí cho xe máy</h5>
      <div class="Area-list">
        <a class="area-link" href="../QuanLyViTriGuiXe/parkingLocation.php?vehicleType=Xe máy">
          <div class="Area">
            <i
              class="fa area-icon fa-motorcycle"
              style="font-size: 2rem !important"
            ></i>
            <div class="Area-details">
              <h6>Khu B</h6>
              <p>Số xe đã nhận:</p>
            </div>
          </div>
        </a>
        <!-- <a class="area-link" href="">
            <div class="Area">
              <i class="fa area-icon fa-motorcycle"></i>
              <div class="Area-details">
                <h6>khu</h6>
                <p>Số xe đã nhận: 9/10</p>
              </div>
            </div>
          </a> -->
      </div>
    </div>
    <div class="Areas">
      <h5>vị trí cho ô tô</h5>
      <div class="Area-list">
        <a class="area-link" href="../QuanLyViTriGuiXe/parkingLocation.php?vehicleType=Ô tô">
          <div class="Area">
            <i
              class="fa area-icon fa-car"
              style="font-size: 2rem !important"
            ></i>
            <div class="Area-details">
              <h6>Khu C</h6>
              <p>Số xe đã nhận:</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </main>
    <?php include "../../footer.html" ?>
</body>
<?php 
    }
  }
    ?>
</html>