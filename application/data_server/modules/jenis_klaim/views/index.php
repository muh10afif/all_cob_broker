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
      <div class="card shadow">
        <div class="card-body">
          <table id="datatable" class="table table-bordered table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead class="thead-light text-center">
              <tr>
                <th>No</th>
                <th>Jenis Klaim</th>
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
            <label>jenis Klaim<b style="color:red;">*</b></label>
            <input type="hidden" name="idjk" id="idjk" value="">
            <input type="text" name="nmjk" id="nmjk" class="form-control" required placeholder="jenis Klaim"/>
          </div>
          <i class="text-center" style="color:red;">('*') Menandakan Form Harus di Isi</i>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <?php if ($role['create'] == true || $role == null): ?>
            <button class="btn btn-primary waves-effect waves-light mr-2" id="senddata">Simpan</button>
          <?php endif; ?>
          <button class="btn btn-secondary waves-effect" id="clearall">Batal</button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<script type="text/javascript">
  var table_jenis = '';
  $(document).ready(function () {
    var act = "<?=$role['update'].'_'.$role['delete']?>";
    table_jenis = $('#datatable').DataTable({
      "processing" : true,
      "serverSide" : true,
      "order" : [],
      "ajax" : {
        "url" : "<?php echo base_url(); ?>jenis_klaim/ajaxdata/"+act,
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
      $('#nmjk').val('');
      $('#idjk').val('');

      $('.judul').text('Tambah Data');
    });

    $('#senddata').on('click', function () {
      var nmjnk = $('#nmjk').val();
      var idjnk = $('#idjk').val();
      if (nmjnk != '' && nmjnk != ' ') {
        if (idjnk == '') {
          $.ajax({
            type:"POST",
            url:"<?php echo base_url(); ?>jenis_klaim/add",
            beforeSend : function () {
              swal({
                title  : 'Menunggu',
                html   : 'Memproses Data',
                onOpen : () => {
                  swal.showLoading();
                }
              })
            },
            data: { nmjenisk:nmjnk },
            dataType : "JSON",
            success  : function (data) {
              if (data['status'] == 'sukses') {
                swal({
                  title             : "Berhasil",
                  text              : "Jenis Klaim telah di Tambahkan",
                  type              : 'success',
                  showConfirmButton : false,
                  timer             : 3000
                });
                $('#nmjk').val('');
                $('#idjk').val('');
                $('.judul').text('Tambah Data');
                table_jenis.ajax.reload();
              } else {
                swal({
                  title             : "Gagal",
                  text              : "data Jenis Klaim tersebut sudah ada",
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
        } else {
          $.ajax({
            type:"POST",
            url:"<?php echo base_url(); ?>jenis_klaim/edit/"+idjnk,
            beforeSend : function () {
              swal({
                title  : 'Menunggu',
                html   : 'Memproses Data',
                onOpen : () => {
                  swal.showLoading();
                }
              })
            },
            data: { nmjenisk:nmjnk },
            dataType : "JSON",
            success  : function (data) {
              if (data['status'] == 'sukses') {
                swal({
                  title             : "Berhasil",
                  text              : "Jenis Klaim telah di Update",
                  type              : 'success',
                  showConfirmButton : false,
                  timer             : 3000
                });
                $('#nmjk').val('');
                $('#idjk').val('');
                $('.judul').text('Tambah Data');
                table_jenis.ajax.reload();
              } else {
                swal({
                  title             : "Gagal",
                  text              : "data Jenis Klaim tersebut sudah ada",
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
          title             : "Peringatan",
          text              : "Form Jenis Klaim Belum di isi",
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
      url:"<?php echo base_url(); ?>jenis_klaim/show/"+id,
      success  : function (data) {
        var hss = JSON.parse(data);
        $('#nmjk').val(hss[0]['jenis_klaim']);
        $('#idjk').val(hss[0]['id_jenis_klaim']);

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
          url:"<?php echo base_url(); ?>jenis_klaim/remove/"+id,
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
              text              : "Jenis Klaim telah di Hapus",
              type              : 'success',
              showConfirmButton : false,
              timer             : 3000
            });
            $('.judul').text('Tambah Data');
            table_jenis.ajax.reload();
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
        //   text                : 'Anda membatalkan Hapus Jenis Klaim',
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
