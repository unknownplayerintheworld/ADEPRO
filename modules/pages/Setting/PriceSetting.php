<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ADEPRO - Setting</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>
    <style>
    <?php include "../../../guessIndex.css";
    include "../../../bootstrap.css";
    include "../../../connection.php";

    ?>th,td {
        text-align: center !important;
    }

    .form-group {
        display: grid;
        grid-template-columns: 40% 50%;
        gap: 10px;
    }
    label{
        margin-top: auto;
        margin-bottom: auto;
    }
    .page-link {
        padding: 10px !important;
    }

    .errorMessenge {
        display: block;
        color: red;
        grid-column-start: 2;
        text-align: left;
        margin-bottom: 0;
        font-size:0.7rem;
    }
    .cardType{
      padding:10px;
      margin-left:20px;
    }
    .submit{
      padding:10px !important;
      margin-right:10px;
    }
    
        /* .form-group label{
      width:200px;
    } */
    </style>
    <?php include "../../header-navbar/header-admin.html" ?>
    <main style="margin-top: 10vh">

        <section class="content" style=" margin:auto; max-width:95%;">
        <form class="card">
                <div class="card-header">
                    <h3 class="card-titl e">Biểu phí dịch vụ ADEPRO</h3>
                </div>
                <h3 class="cardType">Thẻ thường</h3>
                <div class="card-body p-0">
                <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 15%">Loại phương tiện</th>
                                <th style="width: 20%">Giá dịch vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        // Create connection
              // $connection = new mysqli($servername, $username, $password, $database);
                    // read all row from database table
              $sql = "SELECT * FROM webbaiguixe.pricelist";
              $result = $conn->query($sql);

                    if (!$result) {
                die("Invalid query: " . $connection->error);
              }

                    // read data of each row
              while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td></td>
                            <td>" . "Xe máy" . "</td>
                            <td><input class='text-center' type='text' value=". $row["motor"] . "></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>" . "Ô tô" . "</td>
                            <td><input class='text-center' type='text' value=". $row["car"] . "></td>
                        </tr>
                        ";
                    

                    ?>
                        </tbody>
                    </table>
                    <h3 class="cardType">Thẻ tháng</h3>
                <div class="card-body p-0">
                <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 15%">Loại phương tiện</th>
                                <th style="width: 20%">Giá dịch vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        echo "<tr>
                            <td></td>
                            <td>" . "Xe máy" . "</td>
                            <td><input class='text-center' type='text' value=". $row["motorMonth"] . "></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>" . "Ô tô" . "</td>
                            <td><input class='text-center' type='text' value=". $row["carMonth"] . "></td>
                        </tr>
                        ";
                    }

                    $conn->close();
                    ?>
                        </tbody>
                    </table>
                    <input class="right submit" type="submit" value="Lưu">
                  </form>
                <!-- /.card-body -->
            </div>


                
        </section>
                </main>
        <?php 
        // include "../../feedback-btn.html" ?>
        <?php include "../../footer.html" ?>
</body>