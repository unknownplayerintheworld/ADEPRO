<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ADEPRO - Quản lý khu vực</title>

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

    /* .form-group label{
      width:200px;
    } */
    </style>
    <?php include "../../header-navbar/header-admin.html" ?>
    <main style="margin-top: 10vh">

        <section class="content" style=" margin:auto; max-width:95%;">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-titl e">Danh sách khu vực</h3>
                    <div style="margin-left:auto;">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search"
                                aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 10%">Tên khu</th>
                                <th style="width: 20%">Số xe tối đa</th>
                                <th style="width: 20%" class="text-center">Số xe hiện tại</th>
                                <th style="width: 20%" class="text-center">
                                    <?php
                    include "Area-add.php";
                    ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        // Create connection
              // $connection = new mysqli($servername, $username, $password, $database);
                    // read all row from database table
              $sql = "SELECT * FROM webbaiguixe.area";
              $result = $conn->query($sql);

                    if (!$result) {
                die("Invalid query: " . $connection->error);
              }

                    // read data of each row
              while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td></td>
                            <td>" . $row["areaName"] . "</td>
                            <td>" . $row["maxSize"] . "</td>
                            <td>" . $row["currentSize"] . "</td>
                            <td class='project-actions text-center'>";
                            include "Area-edit.php";
                            echo"
                              <a class='btn btn-danger' href='#'>
                                <i class='fas fa-trash'> </i>
                                Xóa
                              </a>
                            </td>
                        </tr>";
                    }

                    $conn->close();
                    ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item ">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <?php 
        // include "../../feedback-btn.html" ?>
        <?php include "../../footer.html" ?>
</body>