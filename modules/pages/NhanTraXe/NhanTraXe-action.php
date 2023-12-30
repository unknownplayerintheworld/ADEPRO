<?php
    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y/m/d");
    $time = date("H:i:s");
    

    $output = '<main class="row" style="display:grid ; grid-template-columns: repeat(2, 1fr) ">
          <div class="col">            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title text-center">Nhận xe</h3>
              </div>

              <form>
                <div class="card-body" >
                  <div class="form-group">
                    <label for="txtCardID">ID thẻ:</label>
                    <input type="text" class="form-control" id="txtCardID" placeholder="Nhập ID thẻ" value="'. $cardID .'">
                  </div>
                  <div class="form-group">
                    <label for="txtLicensePlate">Biển số xe</label>
                    <input type="text" class="form-control" id="txtLicensePlate" placeholder="Nhập biển số xe" value="'. $licensePlate .'">
                  </div>
                  <div class="form-group">
                    <label for="txtType">Loại thẻ</label>
                    <input readonly type="text" class="form-control" id="txtType" placeholder="" value="'. $type .'">
                  </div>
                  <div class="form-group">
                    <label for="txtDate">Ngày</label>
                    <input readonly type="text" class="form-control" id="txtDate" value="'. $date .'"  />
                  </div>
                  <div class="form-group">
                    <label for="txtTime">Giờ</label>
                    <input readonly type="text" class="form-control" id="txtTime" value="'. $time .'">
                  </div>
                  <div class="form-group" style="visibility:hidden">
                      <label for=""></label>
                      <input readonly type="text" class="form-control" id="" value="">
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
                <div class="card-body" >
                  <div class="form-group">
                    <label for="txtID">ID thẻ:</label>
                    <input type="text" class="form-control" id="ID" placeholder="Nhập ID thẻ" value="'. $cardID .'">
                  </div>
                  <div class="form-group">
                    <label for="txtLicensePlate">Biển số xe</label>
                    <input type="text" class="form-control" id="txtLicensePlate" placeholder="Nhập biển số xe" value="'. $licensePlate .'">
                  </div>
                  <div class="form-group">
                    <label for="txtType">Loại thẻ</label>
                    <input readonly type="text" class="form-control" id="txtType" placeholder="" value="'. $type .'">
                  </div>
                  <div class="form-group">
                    <label for="txtDate">Ngày</label>
                    <input readonly type="text" class="form-control" id="txtDate" value="'. $date .'"  />
                  </div>
                  <div class="form-group">
                    <label for="txtTime">Giờ</label>
                    <input readonly type="text" class="form-control" id="txtTime" value="'. $time .'">
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
    </main>';
?>
