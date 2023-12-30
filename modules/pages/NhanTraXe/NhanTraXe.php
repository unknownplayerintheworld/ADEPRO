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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>ADEPRO - Nhận/Trả xe</title>

</head>

<body>
    <style>
    * {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        /* overflow-y:hidden; */
    }

    <?php include "../../../guessIndex.css";
    include "../../../bootstrap.css";
    include "../../../connection.php";

    ?>.col {
        width: 80%;
        margin: auto;
    }

    .form-group {
        display: grid;
        grid-template-columns: 40% 60%;
        padding: 5px;
    }
    label{
        margin-top: auto;
        margin-bottom: auto;
    }
    .card-footer {
        display: flex;
        justify-content: space-between;
    }

    input {
        padding-left: 10px
    }

    .errorMessenge {
        display: block;
        color: red;
        grid-column-start: 2;
        text-align: left;
        margin-bottom: 0;
        font-size:0.7rem;
    }
    </style>
    <?php include "../../header-navbar/header.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');

?>
    <!-- <div id="load_data"> </div> -->
    <main class="row" style="margin: 20px;display:grid ; grid-template-columns: repeat(2, 1fr) ">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title text-center">Nhận xe</h3>
                </div>

                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="txtCardID">ID thẻ:</label>
                            <input type="text" class="form-control" id="txtCardID" placeholder="Nhập ID thẻ"
                                value="'. $cardID .'">
                            <p class="errorMessenge">Báo lỗi</p>
                        </div>
                        <div class="form-group">
                            <label for="txtLicensePlate">Biển số xe</label>
                            <input type="text" class="form-control" id="txtLicensePlate" placeholder="Nhập biển số xe"
                                value="'. $licensePlate .'">
                            <p class="errorMessenge">Báo lỗi</p>
                        </div>
                        <div class="form-group">
                            <label for="txtType">Loại thẻ</label>
                            <input readonly type="text" class="form-control" id="txtType" placeholder=""
                                value="'. $type .'">
                            <p class="errorMessenge">Báo lỗi</p>
                        </div>
                        <div class="form-group">
                            <label for="txtDate">Ngày</label>
                            <input readonly type="text" class="form-control" id="txtDate" value="'. $date .'" />
                            <p class="errorMessenge">Báo lỗi</p>
                        </div>
                        <div class="form-group">
                            <label for="txtTime">Giờ</label>
                            <input readonly type="text" class="form-control" id="txtTime" value="'. $time .'">
                            <p class="errorMessenge">Báo lỗi</p>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="reset" class="btn btn-secondary">Đặt lại</button>
                        <button type="submit" class="btn btn-primary">Nhận</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title text-center">Trả xe</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="txtID">ID thẻ:</label>
                            <input type="text" class="form-control" id="ID" placeholder="Nhập ID thẻ"
                                value="'. $cardID .'">
                            <p class="errorMessenge">Báo lỗi</p>

                        </div>
                        <div class="form-group">
                            <label for="txtLicensePlate">Biển số xe</label>
                            <input type="text" class="form-control" id="txtLicensePlate" placeholder="Nhập biển số xe"
                                value="'. $licensePlate .'">
                            <p class="errorMessenge">Báo lỗi</p>
                        </div>
                        <div class="form-group">
                            <label for="txtType">Loại thẻ</label>
                            <input readonly type="text" class="form-control" id="txtType" placeholder=""
                                value="'. $type .'">
                            <p class="errorMessenge">Báo lỗi</p>
                        </div>
                        <div class="form-group">
                            <label for="txtDate">Ngày</label>
                            <input readonly type="text" class="form-control" id="txtDate" value="'. $date .'" />
                            <p class="errorMessenge">Báo lỗi</p>
                        </div>
                        <div class="form-group">
                            <label for="txtTime">Giờ</label>
                            <input readonly type="text" class="form-control" id="txtTime" value="'. $time .'">
                            <p class="errorMessenge">Báo lỗi</p>
                        </div>
                        <div class="form-group">
                            <label for="txtTien">Thành tiền</label>
                            <input readonly class="form-control" id="txtTien" value="<'. $money .'">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="reset" class="btn btn-secondary">Đặt lại</button>
                        <button type="submit" class="btn btn-primary">Trả</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include "../../footer.html" ?>
</body>

</html>


<?php 
    }
  }
?>