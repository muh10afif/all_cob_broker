<div class="card-body">
  <div class="row">
    <div class="col-md-8">
      <!--  dt-responsive nowrap -->
      <div class="card">
        <div class="card-body">
            <table id="datatable3" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead class="thead-light text-center">
                <tr>
                  <th>No</th>
                  <th>COB</th>
                  <th>Type COB</th>
                  <th>LOB</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">

      <div class="card">
        <div class="card-header bg-white">
          <h5 class="mb-0 judul_all">Tambah Data</h5>
        </div>
        <div class="card-body">
      
            <div class="form-group">
              <label>COB<b style="color:red;">*</b></label>
              <input type="hidden" name="idrel" id="idrel" name="" value="">
              <select class="form-control select2" name="cobty" id="cobty">
                <option value="">-- Pilih --</option>
                <?php foreach ($list_cob as $key) { ?>
                  <option value="<?php echo $key->id_cob; ?>"><?php echo $key->cob; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>LOB<b style="color:red;">*</b></label>
              <select class="form-control select2" name="lobty" id="lobty">
                <option value="">-- Pilih --</option>
                <?php foreach ($list_lob as $key) { ?>
                  <?php if ($key->id_lob != $key->idlob): ?>
                    <option value="<?php echo $key->id_lob; ?>"><?php echo $key->lob; ?></option>
                  <?php endif; ?>
                <?php } ?>
              </select>
            </div>
            <i class="text-center" style="color:red;">('*') Menandakan Form Harus di Isi</i>
            
          </div>
          <div class="card-footer d-flex justify-content-end bg-white">
            <?php if ($role['create'] == true || $role == null): ?>
              <button class="btn btn-primary waves-effect waves-light mr-2" id="sendall">Simpan</button>
            <?php endif; ?>
            <button class="btn btn-secondary waves-effect" id="clearall">Batal</button>
          </div>
      </div>
    </div>
  </div>
</div>
