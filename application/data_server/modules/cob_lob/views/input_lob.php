<div class="card-body">
  <div class="row">
    <div class="col-md-8">
    <div class="card">
        <div class="card-body">
          <table id="datatable2" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="thead-light text-center">
              <tr>
                <th>No</th>
                <th>Kode LOB</th>
                <th>Nama LOB</th>
                <th>Singkatan</th>
                <th>Tipe Diskon</th>
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
            <h5 class="mb-0 judul_lob">Tambah Data</h5>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Kode LOB</label>
              <input type="text" name="lobkd" id="lobkd" class="form-control" placeholder="Kode LOB" readonly/>
            </div>
            <div class="form-group">
              <label>Nama LOB<b style="color:red;">*</b></label>
              <input type="hidden" name="idlob" id="idlob" name="" value="">
              <input type="text" name="lobnme" id="lobnme" class="form-control" required placeholder="LOB"/>
            </div>
            <div class="form-group">
              <label>Singkatan<b style="color:red;">*</b></label>
              <input type="text" name="singkatan" id="singkatan" class="form-control" required placeholder="Singkatan"/>
            </div>
            <div class="form-group">
              <label>Tipe Diskon<b style="color:red;">*</b></label>
              <select class="form-control" name="tdisk" id="tdisk" required>
                <option value="">-- Pilih --</option>
                <option value="premi standar">Premi Standar</option>
                <option value="total premi">Total Premi</option>
              </select>
            </div>
            <i class="text-center" style="color:red;">('*') Menandakan Form Harus di Isi</i>
          </div>
          <div class="card-footer d-flex justify-content-end bg-white">
            <?php if ($role['create'] == true || $role == null): ?>
              <button class="btn btn-primary waves-effect waves-light mr-2" id="sendlob">Simpan</button>
            <?php endif; ?>
            <button class="btn btn-secondary waves-effect" id="clearlob">Batal</button>
          </div>
      </div>
    </div>
  </div>
</div>
