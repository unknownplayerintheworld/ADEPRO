<div class="modal show" id="modalDel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Xóa dữ liệu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
              <div class="card-body">
                <div class="form-group">
                  <label for="confirm">Bạn có chắc chắn XÓA?</label>
                </div>
              </div>
      </div>
      <div class="modal-footer justify-content-between">
        <a class="btn btn-secondary" id="btn_submit_delete" href='feedback_list_delete_be.php?feedbackID=<?php echo $row['feedbackID']; ?>'>Có</a>
        <button class="btn btn-primary" data-dismiss="modal" aria-label="Close">Không</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->