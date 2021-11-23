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
                <th>Negara</th>
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
          <div class="form-group">
            <label for="nama_negara" class="col-form-label text-right">Negara<b style="color:red;">*</b></label>
            <div class="">
              <input type="text" class="form-control" name="nama_negara" id="nama_negara" placeholder="Masukkan Nama Negara">
              <input type="hidden" name="idnega" id="idnega" value="">
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
      </div>
    </div>
  </div>
<?php endif; ?>

<script type="text/javascript">
  var tabel_negara = '';
  $(document).ready(function () {
    var act = "<?=$role['update'].'_'.$role['delete']?>";
    tabel_negara = $('#datatable').DataTable({
      "processing" : true,
      "serverSide" : true,
      "order" : [],
      "ajax" : {
        "url" : "<?php echo base_url(); ?>negara/ajaxdata/"+act,
        "type" : "POST"
      },
      "columnDefs" : [{
        "targets" : [0,2],
        "orderable" : false
      },{
        'targets' : [0,2],
        'className' : 'text-center',
      }],
      "scrollX" : true
    });

    $('#clearall').on('click', function () {
      $('#nama_negara').val('');
      $('#idnega').val('');
      $('.judul').text('Tambah Data');

    });

    $('#senddata').on('click', function () {
      var nmng = $('#nama_negara').val();
      var idng = $('#idnega').val();
      if (nmng != "" && nmng != " ") {
        if (idng == "") { //insert
          $.ajax({
            type:"POST",
            url:"<?php echo base_url(); ?>negara/add",
            beforeSend : function () {
              swal({
                title  : 'Menunggu',
                html   : 'Memproses Data',
                onOpen : () => {
                  swal.showLoading();
                }
              })
            },
            data: { nama_negara:nmng },
            dataType : "JSON",
            success  : function (data) {
              if (data['status'] == 'sukses') {
                swal({
                  title             : "Berhasil",
                  text              : "Nama Negara telah di Tambahkan",
                  type              : 'success',
                  showConfirmButton : false,
                  timer             : 3000
                });
                $('#nama_negara').val('');
                $('#idnega').val('');
                $('.judul').text('Tambah Data');

                tabel_negara.ajax.reload();
              } else {
                swal({
                  title             : "Gagal",
                  text              : "Nama Negara tersebut Sudah Ada",
                  type              : 'error',
                  showConfirmButton : false,
                  timer             : 3000
                });
              }
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
            url:"<?php echo base_url(); ?>negara/edit/"+idng,
            beforeSend : function () {
              swal({
                title  : 'Menunggu',
                html   : 'Memproses Data',
                onOpen : () => {
                  swal.showLoading();
                }
              })
            },
            data: { nama_negara:nmng },
            dataType : "JSON",
            success  : function (data) {
              if (data['status'] == 'sukses') {
                swal({
                  title             : "Berhasil",
                  text              : "Nama Negara telah di Update",
                  type              : 'success',
                  showConfirmButton : false,
                  timer             : 3000
                });
                $('#nama_negara').val('');
                $('#idnega').val('');
                $('.judul').text('Tambah Data');

                tabel_negara.ajax.reload();
              } else {
                swal({
                  title             : "Gagal",
                  text              : "Nama Negara tersebut Sudah Ada",
                  type              : 'error',
                  showConfirmButton : false,
                  timer             : 3000
                });
              }
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
      } else {
        swal({
          title             : "Gagal",
          text              : "Form Nama Negara Kosong",
          type              : 'warning',
          showConfirmButton : false,
          timer             : 3000
        });
      }
    });
  });

  function ubahubah(id) {
    window.scrollTo(0,0);
    $.ajax({
      type:"GET",
      url:"<?php echo base_url(); ?>negara/show/"+id,
      success  : function (data) {
        var hss = JSON.parse(data);
        console.log(hss);
        $('#idnega').val(hss[0].id_negara);
        $('#nama_negara').val(hss[0].negara);
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
          url:"<?php echo base_url(); ?>negara/remove/"+id,
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
              text              : "Nama Negara telah di Hapus",
              type              : 'success',
              showConfirmButton : false,
              timer             : 3000
            });
            $('.judul').text('Tambah Data');

            tabel_negara.ajax.reload();
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
        //   text                : 'Anda membatalkan Hapus Nama Negara',
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
