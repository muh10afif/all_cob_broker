<div class="card-body">
  <h4 class="mt-0 header-title">Value</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <input type="hidden" name="idval" id="idval" value="<?php echo $dvalu[0]->id_value; ?>">
        <textarea name="nval" id="nval"><?php echo $dvalu[0]->value; ?></textarea>
      </div>
      <div class="form-group text-right mb-0 mt-2">
        <?php if ($role['create'] == true || $role == null): ?>
          <button class="btn btn-primary waves-effect waves-light mr-2" id="sendval">Simpan</button>
          <button class="btn btn-secondary waves-effect" id="clearval">Batal</button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
