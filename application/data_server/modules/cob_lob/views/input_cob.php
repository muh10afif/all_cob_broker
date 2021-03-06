<div class="card-body">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <table id="datatable1" class="table table-bordered table-hover nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="thead-light text-center">
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama COB</th>
                <th>Type COB</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header bg-white">
          <h5 class="mb-0 judul_cob">Tambah Data</h5>
        </div>
        <div class="card-body">
          <div class="form-group">
              <label>Kode COB</label>
              <input type="text" name="cobkd" id="cobkd" class="form-control" placeholder="Kode COB" readonly/>
            </div>
            <div class="form-group">
              <label>Nama<b style="color:red;">*</b></label>
              <input type="hidden" name="idcob" id="idcob" name="" value="">
              <input type="text" name="cobnme" id="cobnme" class="form-control" required placeholder="Name"/>
            </div>
            <div class="form-group">
              <label>Type</label>
              <select class="form-control select2" name="cobtyp" id="cobtyp">
                <option value="0">-- Pilih --</option>
                <?php foreach ($tipe_cob as $key ) { ?>
                  <option value="<?php echo $key->id_tipe_cob; ?>"><?php echo $key->tipe_cob; ?></option>
                <?php } ?>
              </select>
            </div>
            <i class="text-center" style="color:red;">('*') Menandakan Form Harus di Isi</i>
          </div>
          <div class="card-footer d-flex justify-content-end bg-white">
            <?php if ($role['create'] == true || $role == null): ?>
              <button class="btn btn-primary waves-effect waves-light mr-2" id="sendcob">Simpan</button>
            <?php endif; ?>
            <button class="btn btn-secondary waves-effect" id="clearcob">Batal</button>
          </div>
        </div>
      
    </div>
  </div>
</div>
