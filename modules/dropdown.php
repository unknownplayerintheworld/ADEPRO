<?php
    session_start();
    if (isset($_SESSION['login']) == false) {
      header("Location: /DoAnWeb/login/index.php");
    }
    else {
      if (($_SESSION['login']) == false) {
        header("Location: /DoAnWeb/login/index.php");
      }
      else {
        if (($_SESSION['position']) == "Nhân viên") {
          header("Location: /DoAnWeb/index-employee.php");
        }
        else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<script src="./plugins/jquery/jquery.min.js"></script>
<body>
    <style>
        <?php
    include "../../guessIndex.css";
    include "../../bootstrap.css";
    include "../../connection.php";
    ?>
        #dropdown-test {
            position: relative;
            display: block;
            padding: 0;
            margin: 0;
        }
        div#dropdown-test {
            padding-bottom: 40px;
        }
        
        .dropdown-list {
            position: relative;
            display: block;
            width: 800px;
            height: 400px;
            background-color: black;
            color: aliceblue;
            border: 3px solid rgb(226, 147, 0);
            border-radius: 5px;
            margin-left: 25%;
        }
        
        .close-dropdown {
            position: absolute;
            right: 0;
            top: 0;
            color: #fff;
            padding: 12px;
            cursor: pointer;
            opacity: 0.9;
        }
        
        .close-dropdown:hover {
            opacity: 0.9;
            background-color: rgb(226, 147, 0);
            cursor: pointer;
        }
        
        .dropdown-list-name {
            position: relative;
            text-align: center;
            font-size: 30px;
            background: linear-gradient(to top, #FFAE46, #FFF050);
            text-transform: uppercase;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .dropdown-time {
            padding-top: 5px;
            padding-bottom: 20px;
            font-size: 20px;
            text-align: center;
        }
        
        .dropdown-time-input {
            width: 130px;
            height: 25px;
            border: 2px solid rgb(226, 147, 0);
            border-radius: 2px;
            font-size: 18px;
        }
        
        .dropdown-button {
            cursor: pointer;
            color: #fff;
            background-color: rgb(226, 147, 0);
            font-size: 20px;
            width: 100px;
            height: 35px;
            outline: none;
            border: 2px solid white;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            position: relative;
            margin-bottom: 5px;
        }
        
        .dropdown-list-enter-out {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .dropdown-list-enter {
            width: 30%;
            height: 100%;
            background-color: #000;
            text-align: center;
            padding-bottom: 20px;
            border-radius: 5px;
            border: 2px solid rgb(226, 147, 0);
            margin-right: 100px;
        }
        
        .dropdown-list-out {
            width: 30%;
            height: 100%;
            background-color: #000;
            text-align: center;
            padding-bottom: 20px;
            border-radius: 5px;
            border: 2px solid rgb(226, 147, 0);
            margin-left: 100px;
        }
        
        .dropdown-input {
            width: 100px;
            height: 25px;
            border: 2px solid rgb(226, 147, 0);
            border-radius: 2px;
            font-size: 18px;
        }
        
        .back-feedback {
            cursor: pointer;
            color: #fff;
            background-color: rgb(226, 147, 0);
            font-size: 20px;
            width: 100px;
            height: 40px;
            outline: none;
            border: 2px solid white;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            position: relative;
        }
    </style>
    <?php
    include "../modules/header-navbar/header-admin.html";
    ?>
    <main style="margin-top: 10vh">
<?php
    if (isset($_SESSION['error_dd_txt'])) {
      if ($_SESSION['error_dd_txt'] != "") {
?>
        <div id="error_box" class="alert alert-danger alert-dismissible fade show" style="position: sticky;top: 8vh;width: 100%; z-index:1; text-align: center;">
          <strong>Thất bại! </strong><span id="error"><?php echo($_SESSION['error_dd_txt']) ?></span>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
<?php
        // $_SESSION['error'] = "";
        unset($_SESSION['error_dd_txt']);
      }
    }
    else {
      if (isset($_SESSION['success_dd_txt'])) {
        if ($_SESSION['success_dd_txt'] != "") {
?>
          <div id="error_box" class="alert alert-success alert-dismissible fade show" style="position: sticky;top: 8vh;width: 100%; z-index:1; text-align: center;">
            <strong>Thành công! </strong><span id="error"><?php echo($_SESSION['success_dd_txt']) ?>,Từ ngày <?php if(isset($_SESSION['txtDateStart'])){echo $_SESSION['txtDateStart'];} 
          ?> đến ngày <?php if(isset($_SESSION['txtDateEnd'])){echo $_SESSION['txtDateEnd'];} else {echo "chu";} ?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
<?php
          // $_SESSION['success'] = "";
          unset($_SESSION['success_dd_txt']);
        }
      }
    }
?>
        <section>
        <div id="dropdown-test">
            <div class="dropdown-list">
                <div class="close-dropdown">
                    <i class="bi bi-x-lg"></i>
                </div>
                <form action="dropdown_be.php" method="post">
                <h1 class="dropdown-list-name">Lượng xe vào ra</h1>
                <div class="dropdown-time">
                    Từ
                    <input type="date" id="txtDateStart" name="txtDateStart" class="dropdown-time-input" required oninvalid="this.setCustomValidity('Không được để trống')" oninput="this.setCustomValidity('')"> 
                    Đến
                    <input type="date" id="txtDateEnd" name="txtDateEnd" class="dropdown-time-input" required oninvalid="this.setCustomValidity('Không được để trống')" oninput="this.setCustomValidity('')">
                    <button class="dropdown-button" id="searchddbtn">Tìm</button>
                    <button class="dropdown-button">Back</button>
                </div>
                </form>
                <div class="dropdown-list-enter-out">
                    <div class="dropdown-list-enter">
                        <h2>Lượng xe vào</h2>
                        <div>
                            <h3>Ô tô</h3>
                            <input type="number" value="<?php if(isset($_SESSION['c1'])){
                                echo $_SESSION['c1'];
                            }else{ echo 0;} ?>" class="dropdown-list-enter-car dropdown-input">
                        </div>
                        <div>
                            <h3>Xe máy</h3>
                            <input type="number" value="<?php if(isset($_SESSION['m1'])){
                                echo $_SESSION['m1'];
                            } else{ echo 0;} ?>" class="dropdown-list-enter-moto dropdown-input">
                        </div>
                    </div>
                    <div class="dropdown-list-out">
                        <h2>Lượng xe ra</h2>
                        <div>
                            <h3>Ô tô</h3>
                            <input type="number" value="<?php if(isset($_SESSION['c0'])){
                                echo $_SESSION['c0'];
                            } else{ echo 0;} ?>" class="dropdown-list-out-car dropdown-input">
                        </div>
                        <div>
                            <h3>Xe máy</h3>
                            <input type="number" value="<?php if(isset($_SESSION['m1'])){
                                echo $_SESSION['m1'];
                            } else{ echo 0;} ?>" class="dropdown-list-out-moto dropdown-input">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </main>
        <?php include "../modules/footer.html" ?>
</body>

<script>
<?php
      if (isset($_POST['txtDateStart'])) {
?>
        $("#txtDateStart").val("<?php echo($_POST['txtDateStart']) ?>");
<?php
      }
?>
<?php
      if (isset($_POST['txtDateEnd'])) {
?>
        $("#txtDateEnd").val("<?php echo($_POST['txtDateEnd']) ?>");
<?php
      }
?>
    // $("document").ready(function(){
    //     var SearchDDArr = $("#searchddbtn");
    //     SearchDDArr.onclick(function(e){
    //         var dates = $(this).data("dates");
    //         var datee = $(this).data("datee");
    //         $.ajax({
    //       url:"dropdown_be.php",
    //       type:"post",
    //       dataType:"html",
    //       data:{
    //         dates,datee
    //       }
    //     }).done(function(rs){
    //       var row = JSON.parse(rs);
    //       var userName = row.userName;
    //       var password = row.password;
    //       var name = row.name;
    //       var position = row.position;
    //       var identityCard = row.identityCard;
    //       var birth = row.birth;
    //       var sex = row.sex;

          
    //       $("#inputUser_Edit").val(userName);
    //       $("#inputPassword_Edit").val(password);
    //       $("#inputName_Edit").val(name);
    //       $("#inputCCCD_Edit").val(identityCard);
    //       $("#inputBday_Edit").val(birth);
    //       // alert(userName +" "+ password +" "+ name +" "+ position +" "+ identityCard +" "+ birth +" "+ sex);
    //       $("#selectChucVu_Edit option[value='"+ position +"']").prop("selected", true);
    //       $("#selectGioiTinh_Edit option[value='"+ sex +"']").prop("selected", true);
    //     });
    //     });
    //     });
</script>
</html>
<?php
        }
    }
}
?>