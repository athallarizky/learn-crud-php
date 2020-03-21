<!-- The Modal -->
<div class="modal fade" id="modal-delete<?php echo $row['id_kendaraan']; ?>">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">


      <!-- Modal body -->
      <div class="modal-body">
        <div class="row jarak-modal">
          <div class="col-12">
            <h5 class="text-center modal-del">Are you sure?</h5>
          </div>
          <div class="col-12 text-center">
            <form method="post" action="">
              <button type="button" class="btn btn-light lebar-but" data-dismiss="modal">No</button>
              &nbsp;&nbsp;&nbsp;
              <input type="submit" class="btn btn-dark lebar-but" name="delete" value="Yes" />
              <input type="hidden" name="id_kendaraan" value="<?php echo $row['id_kendaraan']; ?>">
           </form>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
