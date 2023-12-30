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
 <script src="../plugins/jquery/jquery.min.js"></script>
<?php
//phân trang,search
    include "../../connection.php";
    if(isset($_GET['search'])){
      $search=$_GET['search'];
      $sql_count = "select * from feedback where display=1 and (userName like '%$search%' or feedbackID like '%$search%') ";
    }else{
    $sql_count = "select * from feedback where display=1";
    }
    $pagesize=1;
    $d = mysqli_query($conn,$sql_count);
    $count=$d->num_rows;
    $ps = ceil($count/$pagesize);
    if(!isset($_GET['currentpage'])){
      $_GET['currentpage'] = 1;
    }
    if($_GET['currentpage']<1){
      $_GET['currentpage'] = 1;
    }
    if($_GET['currentpage'] > $ps){
      $_GET['currentpage'] = $ps;
    }
    $currentpage = $_GET['currentpage'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Feedback</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css" />
</head>

<body>
  <style>
    <?php
    include "../../guessIndex.css";
    include "../../bootstrap.css";
    include "../../connection.php";
    ?>
    th,
    td {
      text-align: center !important;
    }

    .form-group {
      display: grid;
      grid-template-columns: 45% 55%;
      gap: 10px;
    }

    .page-link {
      padding: 10px !important;
      margin: 3px !important;
    }
  </style>
  <?php
    include "../header-navbar/header-admin.html";
  ?>
  <?php
    if (isset($_SESSION['error_del_txt'])) {
      if ($_SESSION['error_del_txt'] != "") {
?>
        <div id="error_box" class="alert alert-danger alert-dismissible fade show" style="position: sticky;top: 8vh;width: 100%; z-index:1; text-align: center;">
          <strong>Thất bại! </strong><span id="error"><?php echo($_SESSION['error_del_txt']) ?></span>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
<?php
        // $_SESSION['error'] = "";
        unset($_SESSION['error_del_txt']);
      }
    }
    else {
      if (isset($_SESSION['success_del_txt'])) {
        if ($_SESSION['success_del_txt'] != "") {
?>
          <div id="error_box" class="alert alert-success alert-dismissible fade show" style="position: sticky;top: 8vh;width: 100%; z-index:1; text-align: center;">
            <strong>Thành công! </strong><span id="error"><?php echo($_SESSION['success_del_txt']) ?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
<?php
          // $_SESSION['success'] = "";
          unset($_SESSION['success_del_txt']);
        }
      }
    }
?>
  <main style="margin-top: 10vh">

    <section class="content" style=" margin:auto; max-width:95%;">
    <div class="card">
        <div class="card-header">
          <h3 class="card-titl e">Danh sách Feedback</h3>
          <div style="margin-left:auto;">
            <div class="input-group rounded">
              <input type="text" id="txtSearchFb" class="form-control rounded" placeholder="Tìm kiếm theo FeedbackID,tên người dùng" aria-label="Search"
                aria-describedby="search-addon" />
                <button id="searchFbon">
                  <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                  </span>
                  </button>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
              <table class="table table-striped projects">
                <thead>
                  <tr>
                    <th style="width: 8%" class="text-center">FeedbackID</th>
                    <th style="width: 20%" class="text-center">Username</th>
                    <th style="width: 50%" class="text-center">Title</th>
                    <th style="width: 15%" class="text-center">
                    <?php
                    ?>
                  </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_GET['search'])){
                      $search=$_GET['search'];
                      if($currentpage<1){
                        $currentpage = 1;}
                        else{ $currentpage; }
                      $sql_limit = "select * from feedback where display=1 and (userName like '%$search%' or feedbackID like '%$search%' ) limit " . ($currentpage-1)*$pagesize .",".$pagesize;
                }
                else{
                  $sql_limit = "select * from feedback where display=1 limit ". ($currentpage-1)*$pagesize .",".$pagesize;
                }
            //  SQl
              $result = $conn->query($sql_limit);

                    if (!$result) {
                die("Invalid query: " . $connection->error);
              }

                    // read data of each row
              while($row = $result->fetch_assoc()) {
                if($row['display']==1){
                        echo "<tr>
                            <td>" . $row["feedbackID"] . "</td>
                            <td>" . $row["userName"] . "</td>
                            <td>" . $row["content"] . "</td> 
                            <td class='project-actions text-center'>";
                            ?>
<?php
                            echo"
                            <button type='button' class='btn btn-danger'  data-toggle='modal' data-target='#modalDel'>
                            <i class='fas fa-trash'> </i>
                            Xóa
                          </button>
                            </td>
                        </tr>";
                    }
                  }
                    $conn->close();
                    ?>
                        </tbody>
                      </table>
                    </div>
                    <div aria-label="Page navigation">
                      <ul class="pagination justify-content-center">
                      <li>
                          <a class="page-link" href="feedback_list.php?currentpage=1&search=<?php 
                            if(isset($_GET['search'])){
                              $search = $_GET['search'];
                              echo $search; 
                            }
                          ?>">First</a>
                        </li>
                        <li class="page-item ">
                          <a class="page-link" href="feedback_list.php?currentpage=<?php if($currentpage>1){ echo ($currentpage-1);}
                          else echo $currentpage;
                          ?>&search=<?php 
                            if(isset($_GET['search'])){
                              $search = $_GET['search'];
                              echo $search;
                            }
                          ?>" tabindex="-1">Previous</a>
                        </li>
<?php 
                    if ($currentpage > 3) {
?>
                        <b style="margin-top: 7px;"> . . . </b>
<?php
                    }
                    for($i=1;$i<=$ps;$i++){
                      if(abs($currentpage-$i)<=2){
                        if($i==$currentpage){
?>
                          <li class='page-item'><a class='page-link' style='background-color:#ccc;' href='feedback_list.php?currentpage=<?php echo $i; ?>&search=<?php 
                            if(isset($_GET['search'])){
                              $search = $_GET['search'];
                              echo $search;
                            }
                          ?>'><?php echo $i; ?></a></li>
<?php
                        }
                        else{
?>
                          <li class='page-item'><a class='page-link' href='feedback_list.php?currentpage=<?php echo $i; ?>&search=<?php 
                            if(isset($_GET['search'])){
                              $search = $_GET['search'];
                              echo $search;
                            }
                          ?>'><?php echo $i; ?></a></li>
<?php
                      }}}
                      if ($ps - $currentpage > 2) {
?>
                          <b style="margin-top: 7px;"> . . . </b>
<?php
                      }
?>
                      </li>
                      <li>
                          <a class="page-link" href="feedback_list.php?currentpage=<?php echo ($currentpage+1) ?>&search=<?php 
                            if(isset($_GET['search'])){
                              $search = $_GET['search'];
                              echo $search;
                            }
                          ?>">Next</a>
                        </li>
                        <li>
                          <a class="page-link" href="feedback_list.php?currentpage=<?php echo $ps ?>&search=<?php 
                            if(isset($_GET['search'])){
                              $search = $_GET['search'];
                              echo $search;
                            }
                          ?>">Last</a>
                        </li>
                </ul>
              </div>
            </div>
          </div>
                    <!-- /.card-body -->
                 
                  <!-- /.card -->
    </section>
  </main>
  <?php
    include "../footer.html";
  ?>
    <?php     include "feedback_list_delete_confirm.php" ;?>
</body>
<script>
    $(document).ready(function(){
<?php
      if (isset($_GET['search'])) {
?>
        $("#txtSearchFb").val("<?php echo($_GET['search']) ?>");
<?php
      }
?>
      $("#searchFbon").click(function(){
      var search = $("#txtSearchFb").val();
      // if (search != "") {
        window.location.href = "feedback_list.php?search="+ search;
        
      // }
    });
    });




</script>
    </html>
    <?php
        }
      }
    }
    ?>