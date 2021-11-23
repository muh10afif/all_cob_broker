<style type="text/css">
  .swal-wide { width:550px !important; }
</style>
<div class="page-title-box">
  <div class="row align-items-center">
    <div class="col-sm-6"><h4 class="page-title"><?= $title ?></h4></div>
    <div class="col-sm-6">
      <?php echo bredcumx(); ?>
    </div>
  </div>
</div>

<?php if ($role['read'] == true || $role == null): ?>
  <div class="row">
    <div class="col-md-7">
      <div class="card shadow">
        <div class="card-body table-responsive">
          <table id="datatable" class="table table-bordered table-hover table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="thead-light text-center">
              <tr>
                <th>No</th>
                <th>kota</th>
                <th>Provinsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card shadow">
        <div class="card-header">
          <h5 class="mb-0 judul">Tambah Data</h5>
        </div>

        <div class="card-body">
          <form id="colectkta" method="post">
            <div class="form-group row">
              <label for="nama_negara" class="col-sm-3 col-form-label">Negara<b style="color:red;">*</b></label>
              <div class="col-sm-8">
                <input type="hidden" name="idkta" id="idkta" value="">
                <select class="form-control select2" name="nama_negara" id="nama_negara" onchange="getprovinsi(this.value,0)">
                  <option value="">-- Pilih Negara --</option>
                  <?php foreach ($list_negara as $key => $value): ?>
                    <option value="<?= $value->id_negara ?>"><?= $value->negara ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama_provinsi" class="col-sm-3 col-form-label">Provinsi<b style="color:red;">*</b></label>
              <div class="col-sm-8">
                <select class="form-control select2" name="nama_provinsi" id="nama_provinsi">
                  <option value="">-- Pilih Provinsi --</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama_kota" class="col-sm-3 col-form-label">Kota<b style="color:red;">*</b></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nama_kota" id="nama_kota" placeholder="Masukkan Nama Kota/Kabupaten">
              </div>
            </div>
            <i class="text-center" style="color:red;">('*') Menandakan Form Harus di Isi</i>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <?php if ($role['create'] == true || $role == null): ?>
              <button type="button" class="btn btn-primary waves-effect waves-light mr-2" id="senddata">Simpan</button>
            <?php endif; ?>
            <button type="button" class="btn btn-secondary waves-effect" id="clearall">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="modal_detail" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title mt-0">Detail Kota</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row p-3">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-left">Negara</label>
                        <div class="col-md-8 mt-2">
                            <span id="t_negara">: </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-left">Provinsi</label>
                        <div class="col-md-8 mt-2">
                            <span id="t_provinsi">: </span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-left">Kabupaten/kota</label>
                        <div class="col-md-8 mt-2">
                            <span id="t_kota">: </span>
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
  var tabel_kota = '';
  $(document).ready(function () {
    var act = "<?=$role['update'].'_'.$role['delete']?>";
    tabel_kota = $('#datatable').DataTable({
      "processing" : true,
      "serverSide" : true,
      "order" : [],
      "ajax" : {
        "url" : "<?php echo base_url(); ?>kota/ajaxdata/"+act,
        "type" : "POST"
      },
      "columnDefs" : [{
        "targets" : [0,3],
        "orderable" : false
      },{
        'targets' : [0,3],
        'className' : 'text-center',
      }],
      "scrollX" : true
    });

    $('#clearall').on('click', function (e) {
      e.preventDefault();
      $('#idkta').val('');
      $('#nama_kota').val('');
      $('#nama_provinsi').val("").trigger('change');
      $('#nama_negara').val(null).trigger('change');
      $('.judul').text('Tambah Data');

    });

    $('#senddata').on('click', function (e) {
      e.preventDefault();
      var idkta = $('#idkta').val();
      if (idkta == "") { //insert
        $.ajax({
          type:"POST",
          url:"<?php echo base_url(); ?>kota/add",
          beforeSend : function () {
            swal({
              title  : 'Menunggu',
              html   : 'Memproses Data',
              onOpen : () => {
                swal.showLoading();
              }
            })
          },
          data : $('#colectkta').serialize(),
          dataType : "JSON",
          success  : function (data) {
            swal({
              title             : data['status'],
              text              : data['pesan'],
              type              : data['altr'],
              showConfirmButton : false,
              timer             : 3000
            });
            if (data['altr'] == 'success') {
              $('#clearall').trigger('click');
            }
            tabel_kota.ajax.reload();
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
      } else { //update
        $.ajax({
          type:"POST",
          url:"<?php echo base_url(); ?>kota/edit/"+idkta,
          beforeSend : function () {
            swal({
              title  : 'Menunggu',
              html   : 'Memproses Data',
              onOpen : () => {
                swal.showLoading();
              }
            })
          },
          data : $('#colectkta').serialize(),
          dataType : "JSON",
          success  : function (data) {
            swal({
              title             : data['status'],
              text              : data['pesan'],
              type              : data['altr'],
              showConfirmButton : false,
              timer             : 3000
            });
            if (data['altr'] == 'success') {
              $('#clearall').trigger('click');
            }
            tabel_kota.ajax.reload();
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
    });
  });

  function getprovinsi(isi, cek) {
    $("#nama_provinsi").empty();
    if (isi != '') {
      $.ajax({
        type:"GET",
        url:"<?php echo base_url(); ?>provinsi/provinsibynegara/"+isi,
        dataType : "JSON",
        success  : function (data) {
          var prv = "<option value=''>-- Pilih Provinsi --</option>";
          for (var i = 0; i < data.length; i++) {
            if (cek == 0) {
              prv = prv+"<option value='"+data[i].id_provinsi+"'>"+data[i].provinsi+"</option>";
            } else {
              if (cek == data[i].id_provinsi) {
                prv = prv+"<option value='"+data[i].id_provinsi+"' selected>"+data[i].provinsi+"</option>";
              } else {
                prv = prv+"<option value='"+data[i].id_provinsi+"'>"+data[i].provinsi+"</option>";
              }
            }
          }
          $('#nama_provinsi').append(prv);
        }
      });
    } else {
      $('#nama_provinsi').append("<option value=''>-- Pilih Provinsi --</option>");
    }
  }

  function ubahubah(id) {
    window.scrollTo(0,0);
    $.ajax({
      type:"GET",
      url:"<?php echo base_url(); ?>kota/show/"+id,
      success  : function (data) {
        var hss = JSON.parse(data);
        console.log(hss);
        $('#idkta').val(hss[0].id_kota);
        $('#nama_negara').val(hss[0].id_negara).trigger('change');
        getprovinsi(hss[0].id_negara,hss[0].id_provinsi);
        $('#nama_kota').val(hss[0].kota);

        $('.judul').text('Ubah Data');

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
      url:"<?php echo base_url(); ?>kota/show/"+id,
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

        $("#t_negara").text(": "+hss[0].negara);
        $("#t_provinsi").text(": "+hss[0].provinsi);
        $("#t_kota").text(": "+hss[0].kota);

        $('#modal_detail').modal('show');

        // var lsd = "<table style='width:100%; text-align: left;'>"+
        //             "<tr>"+
        //               "<td style='width:30%;'><b>Negara</b></td><td>:</td><td>"+hss[0].negara+"</td>"+
        //             "</tr>"+
        //             "<tr>"+
        //               "<td style='width:30%;'><b>Provinsi</b></td><td>:</td><td>"+hss[0].provinsi+"</td>"+
        //             "</tr>"+
        //             "<tr>"+
        //               "<td style='width:30%;'><b>Kabupaten/Kota</b></td><td>:</td><td>"+hss[0].kota+"</td>"+
        //             "</tr>"+
        //           "</table>";
        // swal({
        //   title             : "Detail Kota",
        //   html              : lsd,
        //   customClass       : 'swal-wide',
        //   showConfirmButton : true,
        // });
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
          url:"<?php echo base_url(); ?>kota/remove/"+id,
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
              text              : "Nama Kota telah di Hapus",
              type              : 'success',
              showConfirmButton : false,
              timer             : 3000
            });
            $('.judul').text('Tambah Data');

            tabel_kota.ajax.reload();
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
        //   text                : 'Anda membatalkan Hapus Nama kota',
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
