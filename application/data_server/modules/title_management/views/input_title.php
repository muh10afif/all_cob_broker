<div class="card-body">
  <div class="row">
    <div class="col-md-7">
      <table id="datatable1" class="table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
      <thead class="thead-light text-center">
          <tr>
            <th>No</th>
            <th>Title Management</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="col-md-5">
    <div class="card">
        <div class="card-header">
          <h5 class="mb-0 judul_tm">Tambah Data</h5>
        </div>
        <div class="card-body">

          <div class="form-group">
            <label>Title Management<b style="color:red;">*</b></label>
            <input type="hidden" name="idtm" id="idtm" name="" value="">
            <input type="text" name="nmtm" id="nmtm" class="form-control" required placeholder="Title Management Name"/>
          </div>
          <i style="color:red;">('*') Menandakan Form Harus di Isi</i>
          
        </div>
        <div class="card-footer d-flex justify-content-end">
          <?php if ($role['create'] == true || $role == null): ?>
            <button class="btn btn-primary waves-effect waves-light mr-2" id="sendtm">Simpan</button>
          <?php endif; ?>
          <button class="btn btn-secondary waves-effect" id="cleartm">Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>
