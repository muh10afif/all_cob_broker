<style type="text/css">
  .swal-wide { width:700px !important; }
</style>

<style>

    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        color: #fff;
        background-color: #02a4af;
    }

    /* a {
        color: #02a4af;
    } */
    
    .custom-control-input:checked ~ .custom-control-label::before {
        color: #fff;
        border-color: #006c45;
        background-color: #006c45;
    }

    .nav-tabs .nav-item .nav-link.active {
        color: white;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #495057;
        background-color: #006c45;
        border-color: #006c45 #006c45 #006c45;
    }
    .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
        border-color: #006c45 #006c45 #006c45;
    }
    .tab-bordered .tab-pane {
        padding: 15px;
        border: 5px solid #006c45;
        margin-top: -1px;
        border-radius: 5px;
    }
    .nav-tabs .nav-item .nav-link {
        color: #006c45;
    }
    .nav-tabs {
        border-bottom: 3px solid #006c45;
    }
    .tab-pane.active {
        animation: slide-down 0.2s ease-out;
    }
    @keyframes slide-down {
        0% { opacity: 0; transform: translateY(100%); }
        100% { opacity: 1; transform: translateY(0); }
    }

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
  <div class="row">
    <div class="col-md-7">
      <ul class="nav nav-tabs d-flex justify-content-center" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#pro" role="tab">
            <span class="d-none d-md-block">Perorangan</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#pru" role="tab">
            <span class="d-none d-md-block">Perusahaan</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
          </a>
        </li>
      </ul>
      <div class="card shadow">
        <div class="tab-content">
          <div class="tab-pane active p-3" id="pro" role="tabpanel">
            <div class="card-body">
              <table id="datatable_ro" class="table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="thead-light text-center">
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <div class="tab-pane p-3" id="pru" role="tabpanel">
            <div class="card-body">
              <table id="datatable_ru" class="table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="thead-light text-center">
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card shadow">
        <div class="card-header">
          <h5 class="mb-0 judul">Tambah Data</h5>
        </div>

        <form id="colectlssa" method="post">
          <div class="card-body">
            <div class="form-group">
              <label>Status Keanggotaan<b style="color:red;">*</b></label>
              <div class="row mt-2 mr-2">
                <div class="col-sm-6">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="stat1" value="t" name="stat">
                    <label class="custom-control-label" for="stat1">Perorangan</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="stat2" value="f" name="stat">
                    <label class="custom-control-label" for="stat2">Perusahaan</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Kode Loss Adjuster</label>
              <input type="text" name="kdls" id="kdls" class="form-control" required placeholder="Kode Loss Adjuster" readonly/>
            </div>
            <div class="form-group">
              <label>Nama<b style="color:red;">*</b></label>
              <input type="hidden" name="idla" id="idla" value="">
              <input type="text" name="nmla" id="nmla" class="form-control" required placeholder="Nama"/>
            </div>
            <div class="form-group">
              <label>No. Telepon<b style="color:red;">*</b></label>
              <input type="text" name="tlla" id="tlla" class="form-control numeric" required placeholder="Telepon"/>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label>Negara<b style="color:red;">*</b></label>
                <select class="form-control select2" name="idnega" id="idnega">
                  <?php foreach ($list_negara as $key => $value): ?>
                    <option value="<?= $value->id_negara ?>" <?php echo $value->id_negara == 2 ?'selected':''; ?>><?= $value->negara ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-6">
                <label>Provinsi<b style="color:red;">*</b></label>
                <select class="form-control select2" name="idprov" id="idprov">
                  <option value="">-- Pilih Provinsi --</option>
                  <?php foreach ($isprovinsi as $key => $value): ?>
                    <option value="<?php echo $value->id_provinsi; ?>"><?php echo $value->provinsi; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label>Kabupaten/Kota<b style="color:red;">*</b></label>
                <select class="form-control select2" name="idkab" id="idkab">
                  <option value="">-- Pilih Kota/Kabupaten --</option>
                </select>
              </div>
              <div class="col-md-6">
                <label>Kecamatan<b style="color:red;">*</b></label>
                <select class="form-control select2" name="idkec" id="idkec">
                  <option value="">-- Pilih Kecamatan --</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label>Kelurahan<b style="color:red;">*</b></label>
                <select class="form-control select2" name="idkel" id="idkel">
                  <option value="">-- Pilih Desa/Kelurahan --</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label>Alamat<b style="color:red;">*</b></label>
              <textarea name="alla" id="alla" class="form-control" required placeholder="Alamat" rows="8" cols="80"></textarea>
            </div>
            <i style="color:red;">('*') Menandakan Form Harus di Isi</i>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <?php if ($role['create'] == true || $role == null): ?>
              <button class="btn btn-primary waves-effect waves-light mr-2" id="senddata">Simpan</button>
            <?php endif; ?>
            <button class="btn btn-secondary waves-effect" id="clearall">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>


<div class="modal fade" id="modal_detail" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title mt-0">Detail Loss Adjuster</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row p-3">
              <div class="col-md-6">
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Kode Loss Adjuster</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_kode"</span>
                      </div>
                    </div>
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-left">Nama</label>
                      <div class="col-md-8 mt-1">
                          <span id="t_nama"></span>
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
              </div>
          </div>
          <hr>
          <h5>Alamat Agent</h5>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban mr-2"></i>Tutup</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  var table_lostadj_ru = '';
  var table_lostadj_ro = '';

  function getkode() {
    $.ajax({
      type:"GET",
      url:"<?php echo base_url(); ?>lost_adjuster/loss_kode",
      success  : function (data) {
        $('#kdls').val(data);
      }
    });
  }

  $(document).ready(function () {
    var act = "<?=$role['update'].'_'.$role['delete']?>";

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
         .columns.adjust()
         .responsive.recalc();
    });

    table_lostadj_ro = $('#datatable_ro').DataTable({
      "responsive": true,
      "processing" : true,
      "serverSide" : true,
      "order" : [],
      "ajax" : {
        "url" : "<?php echo base_url(); ?>lost_adjuster/ajaxdata/"+act,
        "type" : "POST",
        "data" : { "tipen":'t' }
      },
      "columnDefs" : [{
        "targets" : [0,5],
        "orderable" : false
      },{
        'targets' : [0,5],
        'className' : 'text-center',
      }]
    });

    table_lostadj_ru = $('#datatable_ru').DataTable({
      "responsive": true,
      "processing" : true,
      "serverSide" : true,
      "order" : [],
      "ajax" : {
        "url" : "<?php echo base_url(); ?>lost_adjuster/ajaxdata/"+act,
        "type" : "POST",
        "data" : { "tipen":'f' }
      },
      "columnDefs" : [{
        "targets" : [0,5],
        "orderable" : false
      },{
        'targets' : [0,5],
        'className' : 'text-center',
      }]
    });

    getkode();

    $('#clearall').on('click', function (e) {
      e.preventDefault();
      $('#nmla').val('');
      $('#tlla').val('');
      $('#alla').val('');
      $('#idla').val('');
      $('[name="stat"]').each(function () {
        if (this.checked)
          this.checked = false;
      });
      $('#idprov').val(null).trigger('change');
      $('#idkab').empty();
      $('#idkec').empty();
      $('#idkel').empty();
      getkode();

      $('.judul').text('Tambah Data');
    })

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
          var lanm = $('#nmla').val();
          var latl = $('#tlla').val();
          var laal = $('#alla').val();
          var laid = $('#idla').val();
          if (laal == "" || latl == "" || lanm == "") {
            swal({
              title             : "Gagal",
              text              : "Form ada yang Tidak di isi.",
              type              : 'warning',
              showConfirmButton : false,
              timer               : 3000
            });
            return true;
          } else {
            if (laid == '') {
              $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>lost_adjuster/add",
                beforeSend : function () {
                  swal({
                    title  : 'Menunggu',
                    html   : 'Memproses Data',
                    onOpen : () => {
                      swal.showLoading();
                    }
                  })
                },
                data : $('#colectlssa').serialize(),
                dataType : "JSON",
                success  : function (data) {
                  swal({
                    title             : data['status'],
                    text              : data['pesan'],
                    type              : data['altr'],
                    showConfirmButton : false,
                    timer               : 3000
                  });
                  if (data['altr'] == 'success') {
                    $('#clearall').trigger('click');
                  }
                  getkode();
                  return true;
                },
                error: function (jqXHR, textStatus, errorThrown) {
                  swal({
                    title             : "Peringatan",
                    text              : "Koneksi Tidak Terhubung",
                    type              : 'warning',
                    showConfirmButton : false,
                    timer               : 3000
                  });
                  return false;
                }
              });
            } else {
              $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>lost_adjuster/edit/"+laid,
                beforeSend : function () {
                  swal({
                    title  : 'Menunggu',
                    html   : 'Memproses Data',
                    onOpen : () => {
                      swal.showLoading();
                    }
                  })
                },
                data : $('#colectlssa').serialize(),
                dataType : "JSON",
                success  : function (data) {
                  swal({
                    title             : data['status'],
                    text              : data['pesan'],
                    type              : data['altr'],
                    showConfirmButton : false,
                    timer               : 3000
                  });
                  if (data['altr'] == 'success') {
                    $('#clearall').trigger('click');
                  }
                  return true;
                },
                error: function (jqXHR, textStatus, errorThrown) {
                  swal({
                    title             : "Peringatan",
                    text              : "Koneksi Tidak Terhubung",
                    type              : 'warning',
                    showConfirmButton : false,
                    timer               : 3000
                  });
                  return false;
                }
              });
            }
          }
          table_lostadj_ru.ajax.reload();
          table_lostadj_ro.ajax.reload();
          table_lostadj_ru.columns.adjust().draw();
          table_lostadj_ro.columns.adjust().draw();
        } else if (result.dismiss === swal.DismissReason.cancel) {
          swal({
            title               : "Batal",
            text                : 'Anda membatalkan Penginputan Data Loss Adjuster',
            buttonsStyling      : false,
            confirmButtonClass  : "btn btn-primary",
            type                : 'error',
            showConfirmButton   : false,
            timer               : 3000
          });
        }
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
  });

  function ubahubah(id) {
    window.scrollTo(0,0);
    $.ajax({
      type:"GET",
      url:"<?php echo base_url(); ?>lost_adjuster/show/"+id,
      success  : function (data) {
        var hss = JSON.parse(data);
        $('#kdls').val(hss[0].kode_loss_adjuster);
        $('#nmla').val(hss[0].nama);
        $('#tlla').val(hss[0].telp);
        $('#alla').val(hss[0].alamat);
        $('#idla').val(hss[0].id_loss_adjuster);
        var cek = '';
        if (typeof hss[0].status == 'boolean') {
          cek = hss[0].status == true ? 't':'f';
        } else {
          cek = hss[0].status;
        }
        $('[name="stat"]').each(function () {
          if (cek == this.value)
            this.checked = true;
        });
        $('#idprov').val(hss[0].id_provinsi).trigger('change');
        setkab(hss[0].id_provinsi,hss[0].id_kota);
        setkec(hss[0].id_kota,hss[0].id_kecamatan);
        setkel(hss[0].id_kecamatan,hss[0].id_desa);

        $('.judul').text('Ubah Data');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        swal({
          title             : "Peringatan",
          text              : "Koneksi Tidak Terhubung",
          type              : 'warning',
          showConfirmButton : false,
          timer               : 3000
        });
        return false;
      }
    });
  }

  function detaild(id) {
    window.scrollTo(0,0);
    $.ajax({
      type:"GET",
      url:"<?php echo base_url(); ?>lost_adjuster/detail/"+id,
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
        var hss = JSON.parse(data);

        swal.close();

        $("#t_kode").text(": "+hss[0].kode_loss_adjuster);
        $("#t_nama").text(": "+hss[0].nama);
        $("#t_telepon").text(": "+hss[0].telp);
        $("#t_negara").text(": "+(hss[0].negara == null?'-':hss[0].negara));
        $("#t_provinsi").text(": "+(hss[0].provinsi == null?'-':hss[0].provinsi));
        $("#t_kota").text(": "+(hss[0].kota == null?'-':hss[0].kota));
        $("#t_kecamatan").text(": "+(hss[0].kecamatan == null?'-':hss[0].kecamatan));
        $("#t_desa").text(": "+(hss[0].desa == null?'-':hss[0].desa));
        $("#t_alamat").text(": "+(hss[0].alamat == null?'-':hss[0].alamat));
        
        $('#modal_detail').modal('show');
      }
    });
  }

  function setkab(idpr, idkb) {
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

  function setkec(idkb, idkc) {
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

  function setkel(idkc, idkl) {
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
          url:"<?php echo base_url(); ?>lost_adjuster/remove/"+id,
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
              text              : "Data Lost Adjuster telah di Hapus",
              type              : 'success',
              showConfirmButton : false,
              timer               : 3000
            });
            getkode();
            table_lostadj_ro.ajax.reload();
            table_lostadj_ru.ajax.reload();
            return true;
          },
          error: function (jqXHR, textStatus, errorThrown) {
            swal({
              title             : "Peringatan",
              text              : "Koneksi Tidak Terhubung",
              type              : 'warning',
              showConfirmButton : false,
              timer               : 3000
            });
            return false;
          }
        });
      } else if (result.dismiss === swal.DismissReason.cancel) {
        // swal({
        //   title               : "Batal",
        //   text                : 'Anda membatalkan Hapus Data',
        //   buttonsStyling      : false,
        //   confirmButtonClass  : "btn btn-primary",
        //   type                : 'error',
        //   showConfirmButton   : false,
        //   timer               : 3000
        // });
      }
    });
  }
</script>
