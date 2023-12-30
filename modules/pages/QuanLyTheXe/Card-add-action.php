<?php include "../../../connection.php"; ?>

<?php
    session_start();
    date_default_timezone_set("Asia/Bangkok");

    $status = 1;
    $date = date("Y/m/d");
    $customerName = "";
    $display = 1;
    $error = "";

    $isValid = true;
    try {
        if (empty($_POST['txtCardID_Add']) == false) {
            $cardID = $_POST['txtCardID_Add'];

// Check unique
            $result = mysqli_query($conn, "SELECT * FROM card WHERE cardID = $cardID;");
            if (mysqli_num_rows($result) > 0) {
                $error .= "ID thẻ đã tồn tại. ";
                $isValid = false;
            }
            else {
                $vehicleType = $_POST['selectVehicleType_Add'];
                $type = $_POST['selectType_Add'];
        
                if ($type == "Tháng") {
                    $customerName = $_POST['txtCustomerName_Add'];
                    $customerIdentityCard = $_POST['txtCustomerIdentityCard_Add'];
                    $phoneNumber = $_POST['txtPhoneNumber_Add'];
                    $licensePlate = $_POST['txtLicensePlate_Add'];
                }

// INSERT
                if ($isValid == true) {
                    if ($type == "Thường") {
                        $sqlQuery = "INSERT INTO card VALUES (". $cardID .",  ". $status .", '". $vehicleType ."', '". $type ."', ". $display .");";
                        mysqli_query($conn, $sqlQuery);
                    }
                    if ($type == "Tháng") {
                        $sqlQuery = "INSERT INTO card VALUES (". $cardID .",  ". $status .", '". $vehicleType ."', '". $type ."', ". $display .");";
                        mysqli_query($conn, $sqlQuery);
                        $sqlQuery = "INSERT INTO monthcard VALUES (". $cardID .",  '". $date ."', '". $customerName ."', '". $customerIdentityCard ."', '". $phoneNumber ."', '". $licensePlate ."', ". $display .");";
                        mysqli_query($conn, $sqlQuery);
                    }
                }
            }
        }
    }
    catch (Exception $ex) {
        $error .= "<br><br>Lỗi hệ thống.<br>- Mã lỗi: ". $ex->getCode() ."<br>- Chi tiết: ". $ex->getMessage() ."<br>- Tại dòng code: ". $ex->getLine();
        $isValid = false;
    }
    // echo($error);   // ĐÃ XONG thông báo ngầm
    if ($isValid == true) {
        $_SESSION['success'] = "Thêm thẻ mới thành công!";
    }
    else {
        if ($error != "") {
            $_SESSION['error'] = $error;
        }
    }
    mysqli_close($conn);
    header("Location: Card.php?page=999999999");
?>
