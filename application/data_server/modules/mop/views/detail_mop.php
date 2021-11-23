<div class="row p-3">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="no_reff_mop" class="col-md-4 col-form-label text-left">No Reff MOP</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['no_reff_mop'] ?></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_mop" class="col-md-4 col-form-label text-left">Nomor Dokumen</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['no_mop'] ?></span>
            </div>
        </div> 
        <div class="form-group row">
            <label for="nm_mop" class="col-md-4 col-form-label text-left">Nama MOP</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['nama_mop'] ?></span>
            </div>
        </div> 
    </div>

    <div class="col-md-6">
        <div class="form-group row">
            <label for="no_polis" class="col-md-4 col-form-label text-left">No Polis Induk / MOP</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['no_polis_induk'] ?></span>
            </div>
        </div> 
        <div class="form-group row">
            <label for="id_insured" class="col-md-4 col-form-label text-left">SOB</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $nama_sob ?></span>
            </div>
        </div>   
        <div class="form-group row">
            <label for="id_insured" class="col-md-4 col-form-label text-left" id="l_detail">SOB <?= $nama_sob ?></label>
            <div class="col-md-8 mt-1">
                <span>: <?= $detail_sob ?></span>
            </div>
        </div>  
    </div>

    <div class="col-md-12">
        <hr>
    </div>

    <div class="col-md-6">

        <div class="form-group row sel2">
            <label for="id_insured" class="col-md-4 col-form-label text-left">Insured</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['nama_nasabah'] ?></span>
            </div>
        </div> 
        <div class="form-group row sel2">
            <label for="id_insurer" class="col-md-4 col-form-label text-left">Insurer</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['nama_asuransi'] ?></span>
            </div>
        </div>   
        <div class="form-group row sel2">
            <label for="id_cob" class="col-md-4 col-form-label text-left">COB</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['cob'] ?></span>
            </div>
        </div> 
        
    </div>

    <div class="col-md-6">

        <div class="form-group row sel2">
            <label for="id_lob" class="col-md-4 col-form-label text-left">LOB</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['lob'] ?></span>
            </div>
        </div>    

        <div class="form-group row">
            <label for="nilai_pertanggungan" class="col-md-4 col-form-label text-left">Nilai Pertanggungan</label>
            <div class="col-md-8 mt-1">
                <span>: Rp. <?= number_format($mop['nilai_pertanggungan'],0,'.','.') ?></span>
            </div>
        </div> 

    </div>

    <div class="col-md-12">
        <hr>
    </div>

    <div class="col-md-6">

        <div class="form-group row">
            <label for="resiko_sendiri" class="col-md-4 col-form-label text-left">Resiko Sendiri</label>
            <div class="col-md-8 mt-1">
                <span>: <?= str_replace(array("<p>","</p>"), "", $mop['resiko_sendiri']) ?></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="limit_minimal" class="col-md-4 col-form-label text-left">Limit Minimal</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['limit_minimal'] ?></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="berlaku_paling_lambat" class="col-md-4 col-form-label text-left">Berlaku Paling Lambat</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['berlaku_paling_lambat'] ?></span>
            </div>
        </div> 
        <div class="form-group row">
            <label for="pengecualian" class="col-md-4 col-form-label text-left">Pengecualian</label>
            <div class="col-md-8 mt-1">
                <span>: <?= str_replace(array("<p>","</p>"), "", $mop['pengecualian']) ?></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan_premi" class="col-md-4 col-form-label text-left">Keterangan Premi</label>
            <div class="col-md-8 mt-1">
                <span>: <?= str_replace(array("<p>","</p>"), "", $mop['keterangan_premi']) ?></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_mop" class="col-md-4 col-form-label text-left">Objek Tertanggung</label>
            <div class="col-md-8 mt-1">
                <span>: <?= str_replace(array("<p>","</p>"), "", $mop['objek_pertanggungan']) ?></span>
            </div>
        </div>
    </div>
          
        
    <div class="col-md-6">
        
        <div class="form-group row">
            <label for="nama_mop" class="col-md-4 col-form-label text-left">Kondisi Pertanggungan</label>
            <div class="col-md-8 mt-1">
                <span>: <?= str_replace(array("<p>","</p>"), "", $mop['kondisi_pertanggungan']) ?></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="penyampaian_deklarasi" class="col-md-4 col-form-label text-left">Penyampaian Deklarasi</label>
            <div class="col-md-8 mt-1">
                <span>: <?= str_replace(array("<p>","</p>"), "", $mop['penyampaian_deklarasi']) ?></span>
            </div>
        </div>

        <div class="form-group row">
            <label for="maksimal_pelaporan" class="col-md-4 col-form-label text-left">Maksimal Pelaporan</label>
            <div class="col-md-8 mt-1">
                <span>: <?= $mop['maksimal_pelaporan'] ?></span>
            </div>
        </div>

        <div class="form-group row">
            <label for="batas_wilayah" class="col-md-4 col-form-label text-left">Batas Wilayah</label>
            <div class="col-md-8 mt-1">
                <span>: <?= ($mop['desa'] != '') ? "Ds. ".$mop['desa'].", " : "" ?> <?= ($mop['kecamatan'] != '') ? "Kec. ".$mop['kecamatan'].", " : "" ?> <?= ($mop['kota'] != '') ? $mop['kota'].", " : "" ?> <?= ($mop['provinsi'] != '') ? $mop['provinsi'].", " : "" ?> <?= ($mop['negara'] != '') ? $mop['negara'] : "" ?></span>
            </div>
        </div>

    </div>

    <div class="col-md-12 table-responsive">
        <hr>
        <span class="font-weight-bold"> Dokumen </span><br><br>
        <table class="table table-striped">
            <thead class="text-center">
                <tr>
                    <th>No.</th>
                    <th>File Name</th>
                    <th>Deskripsi</th>
                    <th>Size</th>
                    <th>Last Update</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($list_dok)): ?>
                    <?php $no=1; foreach ($list_dok as $d): ?>
                        <tr>
                            <td align="center"><?= $no++ ?>.</td>
                            <td><?= wordwrap($d['filename'],35,"<br>\n"); ?></td>
                            <td><?= wordwrap($d['description'],35,"<br>\n"); ?></td>
                            <td><?= $d['size'] ?></td>
                            <td align="center"><?= date("d-m-Y H:i:s", strtotime($d['updated_time'])) ?></td>
                            <td align="center"><a href="<?= base_url('upload/dokumen/'.$d['filename']) ?>" class="ttip" data-toggle="tooltip" data-placement="top" title="File"><i class="mdi mdi-file-document-outline mdi-24px text-primary"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" align="center">Dokumen Kosong</td>
                    </tr>
                <?php endif; ?>
                
            </tbody>
        </table>
    </div>

</div>