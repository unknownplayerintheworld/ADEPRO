  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal">
      <i class="fas fa-light fa-file-pen"></i>Edit
  </button>

  <div class="modal show" id="modal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Sửa thông tin tài khoản</h4>
                  <a type="button" class="close" href="">
                      <span aria-hidden="true">&times;</span>
                  </a>
              </div>
              <div class="modal-body">
                  <div class="row" style="display:block">
                      <div class="col-md-6" style="    max-width: 100%;">
                          <div class="card card-primary" style="box-shadow:none; margin:0;">
                              <div class="card-body">
                              <div class="form-group">
                                        <label for="inputArea">Tên khu</label>
                                        <input type="text" id="inputArea" class="form-control" value="#" />
                                        <p class="errorMessenge">Báo lỗi</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMaxSize">Số xe tối đa</label>
                                        <input type="text" id="inputMaxSize" class="form-control" value="#" />
                                        <p class="errorMessenge">Báo lỗi</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCurrentSize">Số xe hiện tại</label>
                                        <input type="text" id="inputCurrentSize" class="form-control" value="#" />
                                        <p class="errorMessenge">Báo lỗi</p>
                                    </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Reset</button>
                  <button type="button" class="btn btn-primary">Lưu</button>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>