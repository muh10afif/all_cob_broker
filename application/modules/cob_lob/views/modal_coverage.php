<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
				<h5 class="modal-title mt-0">Input Coverage</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true" class="text-white">&times;</span>
				</button>
			</div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-7">
          <div class="card">
            <div class="card-body">
              <table id="coveraged" class="table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead class="thead-light text-center">
                    <tr>
                      <th>No</th>
                      <th>Label</th>
                      <th>Rate</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5">

          <div class="card">
            <div class="card-header bg-white">
              <h5 class="mb-0 judul_cov">Tambah Data</h5>
            </div>
            <div class="card-body">
            
                <div class="form-group">
                  <label>Label<b style="color:red;">*</b></label>
                  <input type="hidden" name="idcov" id="idcov">
                  <input type="hidden" name="lbcov" id="lbcov">
                  <input type="text" name="lacov" id="lacov" class="form-control" required placeholder="Label"/>
                </div>
                <div class="form-group">
                  <label>Rate<b style="color:red;">*</b></label>
                  <div class="input-group">
                    <input type="number" name="racov" id="racov" class="form-control" required placeholder="Rate"/>
                    <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="fas fa-percent"></i></span></div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Status<b style="color:red;">*</b></label>
                  <select name="stcov" id="stcov" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="standar">Standar</option>
                    <option value="perluasan">Perluasan</option>
                  </select>
                </div>
                <i class="text-center" style="color:red;">('*') Menandakan Form Harus di Isi</i>
                
              </div>
              <div class="card-footer d-flex justify-content-end bg-white">
                <?php if ($role['create'] == true || $role == null): ?>
                  <button class="btn btn-primary waves-effect waves-light mr-2" id="sendcove">Simpan</button>
                <?php endif; ?>
                <button class="btn btn-secondary waves-effect" id="clearcove">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark waves-effect" data-dismiss="modal"><i class="fas fa-ban mr-2"></i>Tutup</button>
      </div>
    </div>
  </div>
</div>
