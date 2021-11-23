<div class="card-body">
  <div class="row">
    <div class="col-md-8">
      <table id="datatable3" class="table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
      <thead class="thead-light text-center">
          <tr>
            <th>No</th>
            <th>Title Management</th>
            <th>Subitle Management</th>
            <th>Name</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="col-md-4">

      <div class="card">
        <div class="card-header">
          <h5 class="mb-0 judul_nm">Tambah Data</h5>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Title Management<b style="color:red;">*</b></label>
            <input type="hidden" name="idnm" id="idnm" name="" value="">
            <select class="form-control select2" name="idtmtn" id="idtmtn" onchange="setsubt(this.value, 0)" required>
              <option value="">-- Pilih --</option>
              <?php foreach ($mn_title as $key) { ?>
                <option value="<?php echo $key->id_title_management; ?>"><?php echo $key->title_management; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Subitle Management<b style="color:red;">*</b></label>
            <select class="form-control select2" name="idsbmn" id="idsbmn" required>
              <option value="">-- Pilih --</option>
            </select>
          </div>
          <div class="form-group">
            <label>Name Management<b style="color:red;">*</b></label>
            <input type="text" name="nmnm" id="nmnm" class="form-control" required placeholder="Management Name"/>
          </div>
          <i style="color:red;">('*') Menandakan Form Harus di Isi</i>
          
        </div>
        <div class="card-footer d-flex justify-content-end">
          <?php if ($role['create'] == true || $role == null): ?>
            <button class="btn btn-primary waves-effect waves-light mr-2" id="sendnm">Simpan</button>
          <?php endif; ?>
          <button class="btn btn-secondary waves-effect" id="clearnm">Batal</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
