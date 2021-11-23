<div class="f_tambah22">
<div class="card shadow">
    <div class="card-header mb-0">
      <button class="btn btn-light float-right batal_entry2"><i class="mdi mdi-close mdi-18px"></i></button>
      <h5 id="judul" class="mb-0 mt-1">Form Tambah Data</h5>
    </div>
    <div class="card-body table-responsive">

      <div class="row mb-2">
          <div class="col-md-12 text-center">
              <h5>SPPA Number : <samp><mark id="sppa_number"> <?= $sppa_number ?> </mark></samp></h5>
          </div>
      </div>

      <div class="row f_tab">
        <div class="col-md-12">

          <ul class="nav nav-tabs d-flex justify-content-center mt-2" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#t_client_data" role="tab">
                <span class="d-none d-md-block">Client Data</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link link_entry link_t_detail disabled" data-toggle="tab" href="#t_detail" role="tab">
                <span class="d-none d-md-block">Detail Insured</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link link_entry link_t_dok disabled" data-toggle="tab" href="#t_dok" role="tab">
                <span class="d-none d-md-block">Documents</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link link_entry link_t_premi disabled" data-toggle="tab" href="#t_premi" role="tab">
                <span class="d-none d-md-block">Premium Calculation</span><span class="d-block d-md-none"><i class="mdi mdi-settings h5"></i></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link link_entry link_t_released disabled" data-toggle="tab" href="#t_released" role="tab">
                <span class="d-none d-md-block">Debit Note</span><span class="d-block d-md-none"><i class="mdi mdi-settings h5"></i></span>
              </a>
            </li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active p-3" id="t_client_data" role="tabpanel">
              <form action="#" id="form_client">
              <input type="hidden" class="sppa_number" name="sppa_number" value="<?= $sppa_number ?>">
              <input type="hidden" class="id_sppa" name="id_sppa">
              <input type="hidden" class="id_entry_sppa" name="id_entry_sppa">
              <input type="hidden" class="nama_sob" name="nama_sob">
              <input type="hidden" class="id_relasi" name="id_relasi"> 
              <input type="hidden" class="id_mop" name="id_mop"> 
            
              <div class="row mb-3">
                <div class="col-md-6">
                <!-- <h4>MOP</h4> -->
                </div>
                <div class="col-md-6 text-right mt-3">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="acc_mop">
                    <label class="custom-control-label" for="acc_mop">Aktifkan MOP</label>
                  </div>
                </div>
              </div>
              <!-- <hr class="mt-0"> -->
              <div class="sel_mop" style="display: none;">
                
                <div class="d-flex justify-content-center">
                  
                  <div class="col-md-6  mt-2">
                    <div class="form-group row">
                      <label for="sobb" class="col-sm-4 col-form-label">No Reff MOP</label>
                      <div class="col-sm-8">
                        <select name="no_reff_mop" id="no_reff_mop" class="select2">
                          <option value="">Pilih</option>
                          <?php foreach ($no_reff as $n): ?>
                            <option value="<?= $n['id_mop'] ?>"><?= $n['no_reff_mop'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="non_mop">
              <h4>Source of Bussiness</h4><hr>
              <div class="d-flex justify-content-center">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="sobb" class="col-sm-4 col-form-label text-left">Source of Business</label>
                    <div class="col-sm-8">
                      <select name="id_sob" id="sobb" class="select2">
                        <option value="pilih">Pilih</option>
                        <?php foreach ($list_sob as $key) { ?>
                          <option value="<?php echo $key->id_sob; ?>"><?php echo $key->sob; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 d_sob">
                  <div class="form-group row">
                    <label for="tocc" class="col-sm-4 col-form-label" id="lbln">Detail SOB</label>
                    <div class="col-sm-8">
                      <select name="nama_sob" id="tocc" class="select2" disabled>
                        <option value="pilih">Pilih</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <div class="col-md-6 d2_sob" style="display: none;">
                  <div class="form-group row">
                    <label for="sobb" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8 mt-1">
                      <span id="d2_nama">: </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 d2_sob" style="display: none;">
                  <div class="form-group row">
                    <label for="tocc" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8 mt-1">
                      <span id="d2_alamat">: </span>
                    </div>
                  </div>
                </div>
              </div><br>
              <h4>Type of Business</h4><hr>
              <div class="d-flex justify-content-center">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="no_klaim" class="col-sm-4 col-form-label">Class of Business</label>
                    <div class="col-sm-8">
                      <select name="id_cob" id="cobb" class="select2">
                        <option value="pilih">Pilih</option>
                        <?php foreach ($list_cob as $key) { ?>
                          <option value="<?php echo $key->id_cob; ?>"><?php echo $key->cob; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 c_lob">
                  <div class="form-group row">
                    <label for="no_klaim" class="col-sm-4 col-form-label">Line of Business</label>
                    <div class="col-sm-8">
                      <input type="hidden" id="id_lobb">
                      <select name="id_lob" id="lobb" class="select2" disabled>
                        <option value="pilih">Pilih</option>
                      </select>
                    </div>
                  </div>
                </div>
                
              </div>
              </div>
              <!-- <hr>
              <div class="form-group row float-right mb-0 btn_simpan">
                  <button type="button" class="btn btn-primary mr-2" id="simpan_client" disabled><i class="ti-check-box mr-2"></i>Simpan & Lanjutkan</button>
              </div> -->
              <hr>
              <div class="form-group row float-right mb-0">
                  <div class="row">
                      <div class="col-md-6">

                      </div>
                      <div class="col-md-6 d-flex justify-content-end">
                      <button type="button" aksi="t_detail" class="btn btn-warning mr-2 text-dark lanjutkan" disabled><i class="ti-arrow-right mr-2"></i>Lanjutkan</button>
                      <button type="button" class="btn btn-primary mr-2 simpan_semua" aksi="" disabled><i class="ti-check-box mr-2"></i>Simpan</button>
                      <button type="button" class="btn btn-danger batal_entry"><i class="ti-close mr-2"></i>Batal</button>
                      </div>
                  </div>
              </div>
              </form>
            </div>
            <div class="tab-pane p-3" id="t_detail" role="tabpanel">
            <form action="#" id="form_detail">
              <input type="hidden" class="id_sppa" name="id_sppa" >
              <input type="hidden" class="id_lob" name="id_lob" value="2">
              <input type="hidden" class="id_entry_sppa" name="id_entry_sppa">
              <input type="hidden" class="id_relasi" name="id_relasi_detail"> 
              <h4>Class of Business</h4><hr>
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-center">
                        <div class="col-md-8" id="here">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <hr>
              <div class="form-group row float-right mb-0">
                  <button type="button" class="btn btn-primary mr-2" id="simpan_detail"><i class="ti-check-box mr-2"></i>Simpan & Lanjutkan</button>
              </div> -->
              <hr>
              <div class="form-group row float-right mb-0">
                  <div class="row">
                      <div class="col-md-6">

                      </div>
                      <div class="col-md-6 d-flex justify-content-end">
                      <button type="button" aksi="t_dok" class="btn btn-warning mr-2 text-dark lanjutkan"><i class="ti-arrow-right mr-2"></i>Lanjutkan</button>
                      <button type="button" class="btn btn-primary mr-2 simpan_semua" aksi=""><i class="ti-check-box mr-2"></i>Simpan</button>
                      <button type="button" class="btn btn-danger batal_entry"><i class="ti-close mr-2"></i>Batal</button>
                      </div>
                  </div>
              </div>
            </form>
            </div>
            <div class="tab-pane p-3" id="t_dok" role="tabpanel">

              <form action="" id="form_dokumen">
              <input type="hidden" id="aksi" name="aksi" value="Tambah">
              <input type="hidden" id="id_dokumen" name="id_dokumen">
              <input type="hidden" id="nama_dokumen" name="nama_dokumen">
              <input type="hidden" class="id_sppa" name="id_sppa" id="id_sppa_dok" >
              <input type="hidden" class="id_entry_sppa" name="id_entry_sppa">
              <input type="hidden" class="sppa_number" name="sppa_number" value="<?= $sppa_number ?>">
              <div class="d-flex justify-content-center mb-1 mt-3">
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label for="no_klaim" class="col-sm-3 col-form-label text-right">File</label>
                      <div class="col-sm-9">
                        <input type="file" id="doc" class="form-control" accept="application/msword, application/pdf" name="dokumen">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                      <div class="form-group row">
                        <label for="no_klaim" class="col-sm-3 col-form-label text-right">Deskripsi</label>
                        <div class="col-sm-9">
                          <input type="input" id="desc" class="form-control" name="desc" placeholder="Masukkan Deskripsi">
                        </div>
                      </div>
                  </div>
                  <div class="col-md-2">
                      <div class="form-group row p-0">
                          <div class="col-sm-12">
                              <button type="button" class="btn btn-primary btn-block" id="simpan_dok">Simpan</button>
                          </div>
                      </div>
                      
                  </div>
              </div>
              </form>
              <hr>
              <table class="mt-3 table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="tabel_dok" width="100%" cellspacing="0">
                  <thead class="thead-light text-center">
                      <tr>
                          <th width="5%">No</th>
                          <th>Description</th>
                          <th>Filename</th>
                          <th>Size</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>

            <!-- <form action="#" id="form_dokumen">
              <div class="d-flex justify-content-center mb-1 mt-3">
                  <div class="col-md-3 text-right mt-1">
                      <label class="control-label">Dokumen</label>
                  </div>
                  <div class="col-md-4">
                      <input type="file" id="doc" class="form-control" accept="application/msword, application/pdf" name="dokumen[]">
                  </div>
                  <div class="col-md-2">
                      <div class="form-group row p-0">
                          <div class="col-sm-12">
                              <button type="button" class="btn btn-warning" id="tambah_dok"><i class="ti-plus" data-toggle="tooltip" data-placement="top" title="Tambah Dokumen"></i></button>
                          </div>
                      </div>
                      
                  </div>
              </div>

              <div class="list_baru_dok">

              </div>
           
              <hr>
              <div class="form-group text-right mb-0">
                  <button type="button" class="btn btn-primary mr-2 dok" id="simpan_dok"><i class="ti-check-box mr-2" aksi="simpan_dokumen"></i>Simpan & Lanjutkan</button>
                  <button type="button" id="" class="btn btn-danger batal_entry"><i class="ti-na mr-2"></i>Batal</button>
              </div>
              </form> -->

              <!-- <hr>
              <div class="form-group text-right mb-0">
                  <button type="button" class="btn btn-primary mr-2 dok" id="simpan_tab_dok"><i class="ti-check-box mr-2" aksi="simpan_dokumen"></i>Simpan & Lanjutkan</button>
              </div> -->
              <hr>
              <div class="form-group row float-right mb-0">
                  <div class="row">
                      <div class="col-md-6">

                      </div>
                      <div class="col-md-6 d-flex justify-content-end">
                      <button type="button" aksi="t_premi" class="btn btn-warning mr-2 text-dark lanjutkan"><i class="ti-arrow-right mr-2"></i>Lanjutkan</button>
                      <button type="button" class="btn btn-primary mr-2 simpan_semua" aksi=""><i class="ti-check-box mr-2"></i>Simpan</button>
                      <button type="button" class="btn btn-danger batal_entry"><i class="ti-close mr-2"></i>Batal</button>
                      </div>
                  </div>
              </div>
            </div>
            <div class="tab-pane p-3" id="t_premi" role="tabpanel">
            <form action="" id="form_premi">
              <input type="hidden" class="id_sppa" name="id_sppa" id="id_sppa_premi" >
              <h4>Premium and Payment</h4>
              <ul class="nav nav-tabs d-flex justify-content-center mt-2" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#total_premium" role="tab">
                    <span class="d-none d-md-block">Total Premium</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#termin_bayar" role="tab">
                    <span class="d-none d-md-block">Termin Pembayaran</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                  </a>
                </li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane active p-3" id="total_premium" role="tabpanel">
                  <input type="hidden" id="kondisi_diskon">
                  <h4>Sum Insured and Premium</h4><hr>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="no_klaim" class="col-sm-4 col-form-label">Total Sum Insured</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                  </div>
                                  <input type="text" class="text-right form-control number_separator numeric" id="tsi" name="tsi" placeholder="0">
                                </div>
                            </div>
                        </div> 
                        
                        <div class="form-group row">
                          <label for="no_klaim" class="col-sm-4 col-form-label">Discount</label>
                          <div class="col-sm-8 input-group">
                              <input type="text" class="form-control text-right numeric" id="diskon" name="diskon" placeholder="Masukkan Diskon" value="0">
                              <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon2">%</span>
                              </div>
                          </div>
                      </div> 
                        
                    </div>
                    <div class="col-md-6" id="show_premi">

                    </div>
                </div><hr>
                <button type="button" class="btn btn-primary mb-2" id="tambah_additional">Tambah Additional</button>
                <div id="show_additional" class="mt-3">
                
                </div>
                
                <h4>Total</h4><hr>
                <div class="row">
                    <div class="col-md-6">
                      
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="no_klaim" class="col-sm-4 col-form-label">Total Akhir Premi</label>
                            <div class='col-sm-4'>
                              <div class='input-group'>
                                <input type='text' class='form-control text-right persen' id="total_persen_premi" value="0" readonly>
                                <div class='input-group-append'>
                                    <span class='input-group-text' id='basic-addon2'>%</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control text-right" id="total_akhir_premi" value="0" readonly>
                                <input type="hidden" class="form-control text-right" id="total_akhir_premi_asli" value="0">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="no_klaim" class="col-sm-4 col-form-label">Biaya Admin</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                  </div>
                                  <input type="text" class="text-right form-control number_separator numeric" name="biaya_admin" id="biaya_admin" placeholder="0" value="0">
                                </div>
                            </div>
                        </div> <hr>
                        <div class="form-group row">
                            <label for="no_klaim" class="col-sm-4 col-form-label">Total Tagihan</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                  </div>
                                  <input type="text" class="text-right form-control number_separator numeric" placeholder="0" id="total_tagihan" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
                <h4>Payment Method</h4><hr>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label for="no_klaim" class="col-sm-4 col-form-label">Paymnet Method</label>
                            <div class="col-sm-8">
                                <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                        </div> 
                        
                    </div>
                    <div class="col-md-3 f_pay" style="display: none;">
                      <div class="form-group row">
                          <label for="no_klaim" class="col-sm-4 col-form-label">Tahun</label>
                          <div class="col-sm-8">
                              <input type="text" class="text-center form-control tahun numeric" id="tahun_pay" placeholder="Tahun">
                          </div>
                      </div> 
                    </div>
                    <div class="col-md-4 f_pay" style="display: none;">
                      <div class="form-group row">
                          <label for="no_klaim" class="col-sm-4 col-form-label">Jumlah Cicilan</label>
                          <div class="col-sm-7">
                              <input type="text" class="text-center form-control cicilan numeric" id="jumlah_cicilan" placeholder="Cicilan">
                          </div>
                      </div> 
                    </div>
                    
                </div>
                
                </div>
                <div class="tab-pane p-3" id="termin_bayar" role="tabpanel">
                  <button type="button" class="btn btn-primary float-left ml-3" id="tambah_pembayaran">Tambah Pembayaran</button>
                  <table class="table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="tabel_termin" width="100%" cellspacing="0">
                    <thead class="thead-light text-center">
                      <tr>
                        <th width="5%">No</th>
                        <th>No. Dokumen</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah</th>
                        <th>Cara Bayar</th>
                        <th>Tanggal Terima</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- <hr>
              <div class="form-group row float-right mb-0">
                  <button type="button" class="btn btn-primary mr-2" id="simpan_premi"><i class="ti-check-box mr-2"></i>Simpan & Lanjutkan</button>
              </div> -->
              <hr>
              <div class="form-group row float-right mb-0">
                  <div class="row">
                      <div class="col-md-6">

                      </div>
                      <div class="col-md-6 d-flex justify-content-end">
                      <button type="button" class="btn btn-primary mr-2 simpan_semua" aksi="t_released"><i class="ti-check-box mr-2"></i>Selesai</button>
                      <button type="button" class="btn btn-danger batal_entry"><i class="ti-close mr-2"></i>Batal</button>
                      </div>
                  </div>
              </div>
            </form>
            </div>
            <div class="tab-pane p-3" id="t_released" role="tabpanel">
              <form action="<?= base_url() ?>entry_sppa/cetak_invoice" method="POST">
                <input type="hidden" class="id_sppa"  id="id_sppa_invoice" name="id_sppa_invoice">
                <div class="alert alert-primary mb-0 text-center" role="alert">
                  <h4 class="alert-heading mt-2 font-18">Semua Data Berhasil Disimpan.</h4>
                  <p>Silahkan tekan tombol cetak invoice bila data telah lengkap.</p>
                  <p><button type="submit" class="btn btn-warning text-dark">Cetak Invoice</button></p>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>

    </div>
    <div class="card-footer footer_input" style="display: none;">
      <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6 d-flex justify-content-end">
          <button type="button" id="simpan_edit" class="btn btn-primary mr-2"><i class="ti-check-box mr-2"></i>Simpan</button>
          <button type="button" id="batal_edit" class="btn btn-danger batal_entry"><i class="ti-na mr-2"></i>Batal</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_termin" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title mt-0" id="judul_modal">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
        <form id="form_termin_m" autocomplete="off" class="form-control-line">
            <input type="hidden" name="id_termin" id="id_termin">
            <input type="hidden" name="aksi" id="aksi_termin" value="Tambah">
            <input type="hidden" class="id_sppa" name="id_sppa" >
            <input type="hidden" class="sppa_number" name="sppa_number" value="<?= $sppa_number ?>">
            <div class="modal-body">
                <div class="col-md-12 p-3">
                    <div class="form-group row">
                        <label for="tgl_awal" class="col-sm-3 col-form-label">No Dokumen</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="no_dokumen" id="no_dokumen" placeholder="Masukkan No Dokumen">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="tgl_awal" class="col-sm-3 col-form-label">Tanggal Bayar</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control datepicker" name="tgl_bayar" id="tgl_bayar" placeholder="Masukkan Tanggal Bayar" readonly>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="tgl_awal" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control numeric number_separator" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="tgl_awal" class="col-sm-3 col-form-label">Cara Bayar</label>
                        <div class="col-sm-9">
                          <select name="cara_bayar" id="cara_bayar" class="form-control">
                            <option value="">Pilih</option>
                            <option value="cash">Cash</option>
                            <option value="transfer">Transfer</option>
                          </select>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="tgl_akhir" class="col-sm-3 col-form-label">Tanggal Terima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control datepicker" name="tgl_terima" id="tgl_terima" placeholder="Masukkan Tanggal Akhir" readonly>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="simpan_termin"><i class="fas fa-check mr-2"></i>Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban mr-2"></i>Batal</button>
            </div>
        </form>
    </div>
  </div>
</div>

<?php $this->load->view('jsnya'); ?>

<script>

    $(document).ready(function () {

        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: false,
            format: "dd-mm-yyyy",
            clearBtn: true,
            orientation: 'bottom'
        });

        $('.select2').select2({
            theme       : 'bootstrap4',
            width       : 'style',
            placeholder : $(this).attr('placeholder'),
            allowClear  : false
        });

        $('.numeric').numericOnly();

        $('.number_separator').divide({
            delimiter:'.',
            divideThousand: true, // 1,000..9,999
            delimiterRegExp: /[\.\,\s]/g
        });

        // $('.batal_entry2').on('click', function () {

        //     $('.f_tambah22').slideUp();

        // })
    })
    
</script>
