<div class="modal fade" id="modal-update<?php echo $row['id_kendaraan']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Update Kendaraan </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <!-- Form modal untuk menginputkan data kendaraan -->
            <form action="" method="POST">

                <div class="form-group">
                    <label for="id_kendaraan">ID Kendaraan</label>
                    <input class="form-control" type="text" name="id_kendaraan" value="<?php echo $row['id_kendaraan'];?>" readonly/>
                </div>

                <div class="form-group">
                    <label for="jeniskendaraan">Jenis Kendaraan</label>
                    <input class="form-control" type="text" name="jeniskendaraan" value="<?php echo $row['jeniskendaraan'];?>" required/>
                </div>

                <div class="form-group">
                    <label for="namakendaraan">Nama Kendaraan</label>
                    <input class="form-control" type="text" name="namakendaraan" value="<?php echo $row['namakendaraan'];?>" required/>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input class="form-control" type="number" name="jumlah" value="<?php echo $row['jumlah'];?>" required/>
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="update" value="update" />

        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"></div>

    </div>
  </div>
</div>
