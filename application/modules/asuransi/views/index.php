<style type="text/css">
  .col-form-label { font-size: 12px; }
  .swal-wide { width:920px !important; }
</style>
<div class="page-title-box">
  <div class="row align-items-center">
    <div class="col-sm-6"><h4><?= $title ?></h4></div>
    <div class="col-sm-6">
      <?php echo bredcumx(); ?>
    </div>
  </div>
</div>

<?php if ($role['read'] == true || $role == null): ?>
  <input type="hidden" id="status_toggle">
  <div class="row">
    <?php $this->load->view('input'); ?>
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-sm-6">
              <div class="text-left">
                <h5>List <?= $title ?></h5>
              </div>
            </div>
            <div class="col-sm-6">
              <?php if ($role['create'] == true || $role == null): ?>
                <div class="text-right">
                  <button class="btn btn-primary waves-effect waves-light mr-2" id="sendasu">Tambah Asuransi</button>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table id="datatable" class="table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" width="100%" cellspacing="0">
            <thead class="thead-light text-center">
              <tr>
                <th width="5%">No</th>
                <th width="20%">Kode</th>
                <th width="20%">Asuransi</th>
                <th width="20%">Telepon</th>
                <th width="20%">PIC</th>
                <th width="5%">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<div class="modal fade" id="modal_detail" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title mt-0">Detail Insurer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row p-3">
              <div class="col-md-6">
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Kode Asuransi</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_kode_asuransi"</span>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Nama</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_nama_asuransi"</span>
                      </div>
                  </div> 
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Singkatan</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_singkatan"></span>
                      </div>
                  </div> 
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Tipe Asuransi</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_tipe_asuransi"></span>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Kategori Asuransi</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_kategori_asuransi"></span>
                      </div>
                  </div>
                  
              </div>

              <div class="col-md-6">
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Telepon</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_telepon"></span>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Fax</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_fax"></span>
                      </div>
                  </div> 
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Website</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_website"></span>
                      </div>
                  </div>  
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Email</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_email"></span>
                      </div>
                  </div>  
              </div>
          </div>
          <hr>
          <h5>Alamat Asuransi</h5>
          <div class="row p-3">
              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="id_insured" class="col-md-4 col-form-label text-left" id="l_detail">Negara</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_negara"></span>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="no_polis" class="col-md-4 col-form-label text-left">Kota</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_kota"></span>
                      </div>
                  </div> 
                  <div class="form-group row">
                      <label for="id_insured" class="col-md-4 col-form-label text-left">Desa</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_desa"></span>
                      </div>
                  </div>  
                    
              </div>
              <div class="col-md-6">
                  <div class="form-group row">
                      <label for="id_insured" class="col-md-4 col-form-label text-left" id="l_detail">Provinsi</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_provinsi"></span>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="no_polis" class="col-md-4 col-form-label text-left">Kecamatan</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_kecamatan"></span>
                      </div>
                  </div>  
                  <div class="form-group row">
                      <label for="id_insured" class="col-md-4 col-form-label text-left">Alamat</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_alamat"></span>
                      </div>
                  </div>  
                    
              </div>

            </div>

            <hr>
            <h5>Data PIC</h5>
            <div class="row p-3">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-left">PIC</label>
                        <div class="col-md-8 mt-1">
                            <span id="t_pic"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-left">Telepon</label>
                        <div class="col-md-8 mt-1">
                            <span id="t_telepon_pic"></span>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-left">Email</label>
                        <div class="col-md-8 mt-1">
                            <span id="t_email_pic"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-left">Alamat</label>
                        <div class="col-md-8 mt-1">
                            <span id="t_alamat_pic"></span>
                        </div>
                    </div>
                </div>

              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban mr-2"></i>Tutup</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var table_asuransi = '';
  $(document).ready(function () {
    var act = "<?=$role['update'].'_'.$role['delete']?>";
    table_asuransi = $('#datatable').DataTable({
      "processing" : true,
      "serverSide" : true,
      "order" : [],
      "ajax" : {
        "url" : "<?php echo base_url(); ?>asuransi/ajaxdata/"+act,
        "type" : "POST"
      },
      "columnDefs" : [{
        "targets" : [0,5],
        "orderable" : false
      },{
        'targets' : [0,5],
        'className' : 'text-center',
      }],
      "scrollX" : true
    });

    $('#sendasu').on('click', function () {
      $('.f_tambah').slideToggle('fast', function() {
        $('#changetitlenm').html('Input <?= $title ?>');
        if ($(this).is(':visible')) {
          $('#status_toggle').val(1);
        } else {
          $('#status_toggle').val(0);
        }
        getkode();
      });
    });

    $('.batal_entry').on('click', function (e) {
      e.preventDefault();
      $('.f_tambah').slideToggle('fast', function() {
        if ($(this).is(':visible')) {
          $('#status_toggle').val(1);
        } else {
          $('#status_toggle').val(0);
        }
        $('.hapus-asuransi').removeAttr('hidden');
        $('#sendasu').attr('hidden', false);
        $('#nama_asuransi').val('');
        $('#singkatan').val('');
        $('#id_tipe_as').val(null).trigger('change');
        $('#id_kategori_as').val(null).trigger('change');
        $('#telp').val('');
        $('#fax').val('');
        $('#website').val('');
        $('#email').val('');
        $('#idprov').val(null).trigger('change');
        $('#idkab').empty();
        $('#idkec').empty();
        $('#idkel').empty();
        $('#alamat').val('');
        $('#pic').val('');
        $('#telp_pic').val('');
        $('#email_pic').val('');
        $('#alamat_pic').val('');
      });
    });

    $('#idnega').on('change', function () {
      $("#idprov").empty();
      if ($(this).val() != '') {
        $.ajax({
          type:"GET",
          url:"<?php echo base_url(); ?>nasabah/getprov/"+$(this).val(),
          success  : function (data) {
            var prov = JSON.parse(data); var provv = "<option value=''>-- Pilih Provinsi --</option>";
            for (var i = 0; i < prov.length; i++) {
              provv = provv+"<option value='"+prov[i].id_provinsi+"'>"+prov[i].provinsi+"</option>";
            }
            $('#idprov').append(provv);
          }
        });
      }
    });

    $('#idprov').on('change', function () {
      $("#idkab").empty();
      if ($(this).val() != '') {
        $.ajax({
          type:"GET",
          url:"<?php echo base_url(); ?>nasabah/getkab/"+$(this).val(),
          success  : function (data) {
            var kab = JSON.parse(data); var kabkab = "<option value=''>-- Pilih Kota/Kabupaten --</option>";
            for (var i = 0; i < kab.length; i++) {
              kabkab = kabkab+"<option value='"+kab[i].id_kota+"'>"+kab[i].kota+"</option>";
            }
            $('#idkab').append(kabkab);
          }
        });
      }
    });

    $('#idkab').on('change', function () {
      $("#idkec").empty();
      if ($(this).val() != '') {
        $.ajax({
          type:"GET",
          url:"<?php echo base_url(); ?>nasabah/getkec/"+$(this).val(),
          success  : function (data) {
            var kec = JSON.parse(data); var keckec = "<option value=''>-- Pilih Kecamatan --</option>";
            for (var i = 0; i < kec.length; i++) {
              keckec = keckec+"<option value='"+kec[i].id_kecamatan+"'>"+kec[i].kecamatan+"</option>";
            }
            $('#idkec').append(keckec);
          }
        });
      }
    });

    $('#idkec').on('change', function () {
      $("#idkel").empty();
      if ($(this).val() != '') {
        $.ajax({
          type:"GET",
          url:"<?php echo base_url(); ?>nasabah/getkel/"+$(this).val(),
          success  : function (data) {
            var kel = JSON.parse(data); var kelkel = "<option value=''>-- Pilih Desa/Kelurahan --</option>";
            for (var i = 0; i < kel.length; i++) {
              kelkel = kelkel+"<option value='"+kel[i].id_desa+"'>"+kel[i].desa+"</option>";
            }
            $("#idkel").append(kelkel);
          }
        });
      }
    });

    $('#senddata').on('click', function (e) {
      e.preventDefault();
      swal({
        title       : 'Konfirmasi',
        text        : 'Yakin data yang di input Sudah Benar ?',
        type        : 'warning',
        buttonsStyling      : false,
        confirmButtonClass  : "btn btn-primary",
        cancelButtonClass   : "btn btn-warning mr-3",
        showCancelButton    : true,
        confirmButtonText   : 'Ya',
        confirmButtonColor  : '#3085d6',
        cancelButtonColor   : '#d33',
        cancelButtonText    : 'Batal',
        reverseButtons      : true
      }).then((result) => {
        if (result.value) {
          var idas = $('#idasu').val();
          if (idas == "") {
            $.ajax({
              type:"POST",
              url:"<?php echo base_url(); ?>asuransi/add",
              beforeSend : function () {
                swal({
                  title  : 'Menunggu',
                  html   : 'Memproses Data',
                  onOpen : () => {
                    swal.showLoading();
                  }
                })
              },
              data: $('#colectasu').serialize(),
              dataType : "JSON",
              success  : function (data) {
                var isck = '';
                $(data['hasil']).each(function () {
                  if ($(this)[0].innerHTML != undefined) {
                    isck = isck+$(this)[0].innerHTML;
                  }
                });
                if (isck == "Format Email Tidak Sesuai" || isck == "Format Email Tidak SesuaiFormat Email Tidak Sesuai") {
                  swal({
                    title             : data['status'],
                    text              : "Format Email Tidak Sesuai",
                    type              : data['altr'],
                    showConfirmButton : false,
                    timer             : 3000
                  });
                } else {
                  swal({
                    title             : data['status'],
                    text              : data['pesan'],
                    type              : data['altr'],
                    showConfirmButton : false,
                    timer             : 3000
                  });
                  if (data['altr'] == 'success') {
                    alertfun(data['altr']);
                  }
                }
                table_asuransi.ajax.reload();
                return true;
              },
              error: function (jqXHR, textStatus, errorThrown) {
                swal({
                  title             : "Peringatan",
                  text              : "Koneksi Tidak Terhubung",
                  type              : 'warning',
                  showConfirmButton : false,
                  timer             : 3000
                });
                return false;
              }
            });
          } else {
            $.ajax({
              type:"POST",
              url:"<?php echo base_url(); ?>asuransi/edit/"+idas,
              beforeSend : function () {
                swal({
                  title  : 'Menunggu',
                  html   : 'Memproses Data',
                  onOpen : () => {
                    swal.showLoading();
                  }
                })
              },
              data: $('#colectasu').serialize(),
              dataType : "JSON",
              success  : function (data) {
                var isck = '';
                $(data['hasil']).each(function () {
                  if ($(this)[0].innerHTML != undefined) {
                    isck = isck+$(this)[0].innerHTML;
                  }
                });
                if (isck == "Format Email Tidak Sesuai" || isck == "Format Email Tidak SesuaiFormat Email Tidak Sesuai") {
                  swal({
                    title             : data['status'],
                    html              : data['hasil'],
                    type              : data['altr'],
                    showConfirmButton : false,
                    timer             : 3000
                  });
                } else {
                  swal({
                    title             : data['status'],
                    text              : data['pesan'],
                    type              : data['altr'],
                    showConfirmButton : false,
                    timer             : 3000
                  });
                  if (data['altr'] == 'success') {
                    $('#idasu').val('');
                    alertfun(data['altr']);
                  }
                }
                table_asuransi.ajax.reload();
                return true;
              },
              error: function (jqXHR, textStatus, errorThrown) {
                swal({
                  title             : "Peringatan",
                  text              : "Koneksi Tidak Terhubung",
                  type              : 'warning',
                  showConfirmButton : false,
                  timer             : 3000
                });
                return false;
              }
            });
          }
        } else if (result.dismiss === swal.DismissReason.cancel) {
          swal({
            title               : "Batal",
            text                : 'Anda membatalkan Penginputan Data Asuransi',
            buttonsStyling      : false,
            confirmButtonClass  : "btn btn-primary",
            type                : 'error',
            showConfirmButton   : false,
            timer             : 3000
          });
        }
      });
    });

    function alertfun(cekk) {
      if (cekk == 'success') {
        $('.f_tambah').slideToggle('fast', function() {
          if ($(this).is(':visible')) {
            $('#status_toggle').val(1);
          } else {
            $('#status_toggle').val(0);
          }
          $('#sendasu').attr('hidden', false);
        });
        window.scrollTo(0,0);
        $('.hapus-asuransi').removeAttr('hidden');
        $('#nama_asuransi').val('');
        $('#singkatan').val('');
        $('#id_tipe_as').val(null).trigger('change');
        $('#id_kategori_as').val(null).trigger('change');
        $('#telp').val('');
        $('#fax').val('');
        $('#website').val('');
        $('#email').val('');
        $('#idprov').val(null).trigger('change');
        $('#idkab').empty();
        $('#idkec').empty();
        $('#idkel').empty();
        $('#alamat').val('');
        $('#pic').val('');
        $('#telp_pic').val('');
        $('#email_pic').val('');
        $('#alamat_pic').val('');
        getkode();
      }
    }

    function getkode() {
      $.ajax({
        type:"GET",
        url:"<?php echo base_url(); ?>asuransi/asuransi_kode",
        success  : function (data) {
          $('#kode_asuransi').val(data);
        }
      });
    }
  });

  function ubahubah(id) {
    $('#changetitlenm').html('Edit <?= $title ?>');
    $('.hapus-asuransi').attr('hidden', true);
    $('html, body').animate({
      scrollTop: $('body').offset().top
    }, 800);
    $.ajax({
      type:"GET",
      url:"<?php echo base_url(); ?>asuransi/show/"+id,
      success  : function (data) {
        var hss = JSON.parse(data);
        $('#idasu').val(hss[0].id_asuransi);
        $('#kode_asuransi').val(hss[0].kode_asuransi);
        $('#nama_asuransi').val(hss[0].nama_asuransi);
        $('#singkatan').val(hss[0].singkatan);
        $('#id_tipe_as').val(hss[0].id_tipe_as).trigger('change');
        $('#id_kategori_as').val(hss[0].id_kategori_as).trigger('change');
        $('#telp').val(hss[0].telp);
        $('#fax').val(hss[0].fax);
        $('#website').val(hss[0].website);
        $('#email').val(hss[0].email);
        $('#alamat').val(hss[0].alamat);
        $('#pic').val(hss[0].pic);
        $('#telp_pic').val(hss[0].telp_pic);
        $('#email_pic').val(hss[0].email_pic);
        $('#alamat_pic').val(hss[0].alamat_pic);
        $('#idprov').val(hss[0].id_provinsi).trigger('change');
        setkab(hss[0].id_provinsi,hss[0].id_kota);
        setkec(hss[0].id_kota,hss[0].id_kecamatan);
        setkel(hss[0].id_kecamatan,hss[0].id_desa);
        if ($('#status_toggle').val() == 0) {
          $('.f_tambah').slideToggle('fast', function() {
            if ($(this).is(':visible')) {
              $('#status_toggle').val(1);
            } else {
              $('#status_toggle').val(0);
            }
          });
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        swal({
          title             : "Peringatan",
          text              : "Koneksi Tidak Terhubung",
          type              : 'warning',
          showConfirmButton : false,
          timer             : 3000
        });
        return false;
      }
    });
  }

  function detaild(id) {
    window.scrollTo(0,0);
    $.ajax({
      type:"GET",
      url:"<?php echo base_url(); ?>asuransi/detail/"+id,
      beforeSend : function () {
        swal({
          title  : 'Menunggu',
          html   : 'Memproses Data',
          onOpen : () => {
            swal.showLoading();
          }
        })
      },
      success  : function (data) {
        swal.close();
        
        var hss = JSON.parse(data);

        $("#t_kode_asuransi").text(": "+hss[0].kode_asuransi);
        $("#t_nama_asuransi").text(": "+hss[0].nama_asuransi);
        $("#t_singkatan").text(": "+(hss[0].singkatan == ""?'-':hss[0].singkatan));
        $("#t_tipe_asuransi").text(": "+(hss[0].tipe_as == null?'-':hss[0].tipe_as));
        $("#t_kategori_asuransi").text(": "+(hss[0].kategori_as == null?'-':hss[0].kategori_as));
        $("#t_telepon").text(": "+hss[0].telp);
        $("#t_fax").text(": "+(hss[0].fax == ""?'-':hss[0].fax));
        $("#t_website").text(": "+(hss[0].website == ""?'-':hss[0].website));
        $("#t_email").text(": "+hss[0].email);
        $("#t_negara").text(": "+(hss[0].negara == null?'-':hss[0].negara));
        $("#t_kota").text(": "+(hss[0].kota == null?'-':hss[0].kota));
        $("#t_desa").text(": "+(hss[0].desa == null?'-':hss[0].desa));
        $("#t_provinsi").text(": "+(hss[0].kecamatan == null?'-':hss[0].kecamatan));
        $("#t_kecamatan").text(": "+(hss[0].desa == null?'-':hss[0].desa));
        $("#t_alamat").text(": "+(hss[0].alamat == null?'-':hss[0].alamat));
        $("#t_pic").text(": "+hss[0].pic);
        $("#t_telepon_pic").text(": "+hss[0].telp_pic);
        $("#t_email_pic").text(": "+hss[0].email_pic);
        $("#t_alamat_pic").text(": "+hss[0].alamat_pic);
        
        $('#modal_detail').modal('show');
      }
    });
  }

  function setkab(idpr, idkb) {
    if (idpr != null) {
      $("#idkab").empty();
      $.ajax({
        type:"GET",
        url:"<?php echo base_url(); ?>nasabah/getkab/"+idpr,
        success  : function (data) {
          var kab = JSON.parse(data); var kabkab = "<option value=''>-- Pilih Kota/Kabupaten --</option>";
          for (var i = 0; i < kab.length; i++) {
            if (kab[i].id_kota == idkb) {
              kabkab = kabkab+"<option value='"+kab[i].id_kota+"' selected>"+kab[i].kota+"</option>";
            } else {
              kabkab = kabkab+"<option value='"+kab[i].id_kota+"'>"+kab[i].kota+"</option>";
            }
          }
          $('#idkab').append(kabkab);
        }
      });
    }
  }

  function setkec(idkb, idkc) {
    if (idkb != null) {
      $("#idkec").empty();
      $.ajax({
        type:"GET",
        url:"<?php echo base_url(); ?>nasabah/getkec/"+idkb,
        success  : function (data) {
          var kec = JSON.parse(data); var keckec = "<option value=''>-- Pilih Kecamatan --</option>";
          for (var i = 0; i < kec.length; i++) {
            if (kec[i].id_kecamatan == idkc) {
              keckec = keckec+"<option value='"+kec[i].id_kecamatan+"' selected>"+kec[i].kecamatan+"</option>";
            } else {
              keckec = keckec+"<option value='"+kec[i].id_kecamatan+"'>"+kec[i].kecamatan+"</option>";
            }
          }
          $('#idkec').append(keckec);
        }
      });
    }
  }

  function setkel(idkc, idkl) {
    if (idkc != null) {
      $("#idkel").empty();
      $.ajax({
        type:"GET",
        url:"<?php echo base_url(); ?>nasabah/getkel/"+idkc,
        success  : function (data) {
          var kel = JSON.parse(data); var kelkel = "<option value=''>-- Pilih Kelurahan --</option>";
          for (var i = 0; i < kel.length; i++) {
            if (kel[i].id_desa == idkl) {
              kelkel = kelkel+"<option value='"+kel[i].id_desa+"' selected>"+kel[i].desa+"</option>";
            } else {
              kelkel = kelkel+"<option value='"+kel[i].id_desa+"'>"+kel[i].desa+"</option>";
            }
          }
          $('#idkel').append(kelkel);
        }
      });
    }
  }

  function deletedel(id) {
    swal({
      title       : 'Konfirmasi',
      text        : 'Yakin akan menghapus data ini?',
      type        : 'warning',
      buttonsStyling      : false,
      confirmButtonClass  : "btn btn-danger",
      cancelButtonClass   : "btn btn-primary mr-3",
      showCancelButton    : true,
      confirmButtonText   : 'Ya',
      confirmButtonColor  : '#3085d6',
      cancelButtonColor   : '#d33',
      cancelButtonText    : 'Batal',
      reverseButtons      : true
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:"GET",
          url:"<?php echo base_url(); ?>asuransi/remove/"+id,
          beforeSend : function () {
            swal({
              title  : 'Menunggu',
              html   : 'Memproses Data',
              onOpen : () => {
                swal.showLoading();
              }
            })
          },
          success  : function (data) {
            swal({
              title             : "Berhasil",
              text              : "Data Asuransi telah di Hapus",
              type              : 'success',
              showConfirmButton : false,
              timer             : 3000
            });
            table_asuransi.ajax.reload();
            $.ajax({
              type:"GET",
              url:"<?php echo base_url(); ?>asuransi/asuransi_kode",
              success  : function (data) {
                $('#kode_asuransi').val(data);
              }
            });
            return true;
          },
          error: function (jqXHR, textStatus, errorThrown) {
            swal({
              title             : "Peringatan",
              text              : "Koneksi Tidak Terhubung",
              type              : 'warning',
              showConfirmButton : false,
              timer             : 3000
            });
            return false;
          }
        });
      } else if (result.dismiss === swal.DismissReason.cancel) {
        // swal({
        //   title               : "Batal",
        //   text                : 'Anda membatalkan Hapus Asuransi',
        //   buttonsStyling      : false,
        //   confirmButtonClass  : "btn btn-primary",
        //   type                : 'error',
        //   showConfirmButton   : false,
        //   timer             : 3000
        // });
      }
    });
  }
</script>
