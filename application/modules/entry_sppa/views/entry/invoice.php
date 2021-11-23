<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        p {
            line-height: 1.8;
        }
        span {
            margin-top: 10px;
        }
    </style>
</head>
<body>
 
<div id="container">
    <img src="<?php echo $_SERVER['DOCUMENT_ROOT'] ?>/assets/img/logo.png" border="0" width="200" style="margin-top: -10px;  margin-left:70%;">
    <!-- <img src="<?= base_url() ?>/assets/img/logo.png" border="0" width="200" style="margin-top: -10px; margin-left:70%;"> -->
    <p style="margin-top: -20px;">
    <span style="font-weight: bold;">Kepada :</span><br>
    <!-- <span style="font-weight: bold;">PSP</span><br> -->
    <!-- <span style="font-weight: bold;">PT. Legowo lnsurance Brokers and Consultans</span><br> -->
    <span style="font-weight: bold;"><?= $data_sob['nama'] ?></span><?= br(1) ?>
    <span style="font-weight: bold;">Di <?= $data_sob['kota'] ?></span><?= br(1) ?>
    <span style="font-weight: bold;">Perihal : Tagihan Premi</span>
    </p>
    <h1 style="text-align: center; font-size: 20px; margin-bottom: 3px;">INVOICE</h1>
    <table cellspacing="10">
        <tr>
            <td>No INV</td>
            <td>:</td>
            <td><?= $tr_sppa['no_invoice_entry'] ?></td>
        </tr>
        <tr>
            <td>
                <u>Tgl</u><br>
                <i>Date</i>
            </td>
            <td>:</td>
            <td><?= date('d F Y', strtotime($tr_sppa['add_time'])) ?></td>
        </tr>
        <tr>
            <td>
                <u>No Polis</u><br>
                <i>Policy Number</i>
            </td>
            <td>:</td>
            <td><?= $no_polis ?></td>
        </tr>
        <tr>
            <td>
                <u>Nama & Alamat</u><br>
                <i>Name & Address of Insured</i>
            </td>
            <td>:</td>
            <td><?= $data_sob['nama'] ?> <br> <?= $data_sob['alamat'] ?></td>
        </tr>
        <tr>
            <td>
                <u>Jangka Waktu</u><br>
                <i>Period</i>
            </td>
            <td>:</td>
            <td>
                <table>
                    <tr>
                        <td>
                        <?php if (!empty($tr_approve)) : ?>
                        <?= date('d F Y', strtotime($tr_approve['tgl_approve'])) ?> - <?= date('d F Y', strtotime('+1 year', strtotime($tr_approve['tgl_approve']))) ?>
                        <?php endif; ?>
                        </td>
                        <td><?= nbs(40) ?></td>
                        <td>
                            <u>Jenis Asuransi</u><br>
                            <i>Type of Insurer</i>
                        </td>
                        <td>:</td>
                        <td><?= $lob ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?= br(2) ?>

    <table border="1" cellspacing="10" cellpadding="10" style="border-collapse: collapse; width: 100%; ">
        <tr>
            <td align="center" style="width: 50%; font-weight: bold;">Catatan/<i>Notes</i></td>
            <td align="center" style="width: 50%; font-weight: bold;">Perincian/<i>Detail</i></td>
        </tr>
        <tr>
            <td rowspan="2" style="vertical-align: text-top;">
                <p style="font-weight: bold;">Untuk menyelesailen transaksi harap segera membayar PREMI ASURANSI sejumlah
                yang ditampilkan pada Premium Note ini. Pembayaran harus ditujukan ke rekenlng
                Bank atas nama PT Solusi Prima Selindo dengan nomor rekening sebagai berikut:</p>
                <br>
                <p><i>
                Please pay the amount ahown in this Premium Note immediatelyto finalize the
                transaction. Payment should be made with a crossed cheque in the name PT Solusi
                Prima Selindo to our current account with one of the following bank:
                </i></p><br>
                <span style="font-weight: bold; font-size: 11px;">PT LEGOWO</span><br>
                <span style="font-weight: bold; font-size: 11px;">777-85-9977-7</span><br>
                <span style="font-weight: bold; font-size: 11px;">Bank Syariah Indonesia - KC CILEGON TIRTAYASA 1</span><br>
                <span style="font-weight: bold;">Jl. Sultan AtengTirtayasa No. 115 A, Cilegon, Banten.</span><br>
                <span style="font-weight: bold;">(254) 399444, 375648</span>

            </td>
            <td>
                <table cellspacing="10" style="width: 100%">
                    <tr>
                        <td>
                            <u style="font-weight: bold;">Premi</u><br>
                            <i>Premium</i>
                        </td>   
                        <td>: <?= nbs(5) ?> IDR</td>
                        <td align="right"><?= number_format($tr_sppa['gross_premi'],0,',','.') ?></td>
                    </tr>
                    <tr>
                        <td>
                            <u style="font-weight: bold;">Diskon %</u><br>
                            <i>Discount</i>
                        </td> 
                        <td>: <?= nbs(5) ?> IDR</td>
                        <td align="right"><?= number_format($tr_sppa['total_diskon'],0,',','.') ?></td>
                    </tr>
                    <tr>
                        <td>
                            <u style="font-weight: bold;">Premi Netto</u><br>
                            <i>Nett Premium</i>
                        </td> 
                        <td>: <?= nbs(5) ?> IDR</td>
                        <td align="right" style="font-weight: bold;"><?= number_format($tr_sppa['total_akhir_premi'],0,',','.') ?></td>
                    </tr>
                    <tr>
                        <td>
                            <u style="font-weight: bold;">Biaya Admin</u><br>
                            <i>Admin Cost</i>
                        </td> 
                        <td>: <?= nbs(5) ?> IDR</td>
                        <td align="right"><?= number_format($tr_sppa['biaya_admin'],0,',','.') ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?= br(3) ?>
                        </td> 
                        <td></td>
                        <td></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <u style="font-weight: bold;">Jumlah</u><br>
                            <i>Total</i>
                        </td> 
                        <td>: <?= nbs(5) ?> IDR</td>
                        <td align="right" style="font-weight: bold;"><?= number_format($tr_sppa['total_tagihan'],0,',','.') ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1;" align="center">
            <h5 style="font-weight: bold;">PT Legowo Insurance Broker</h5>
            <?= br(5) ?>
            <h6 style="font-weight: inherit;">Finance & Accounting</h6>
            </td>
            
        </tr>
    </table>
    <br>
        <p>
            <span style="font-weight: bold;">Nota Premi ini bukan merupakan tanda Bukti pembayaran.</span> <br>
            <i>This Premium Note is not o receipt payment</i>
        </p>
        <p>
            <span style="font-weight: bold;">Pembayaran dianggap sah apabila dana sudah efektif diterima di rekening Bank PT. LEGOWO.</span> <br>
            <i>Poyment isvalid if the funds have been effective in Solusi Prima Selindo Bank account.</i>
        </p>
        <p>
            <span style="font-weight: bold;">Batas transaki terhitung 7 hari kalender setelah diterimanya invoice oleh Mitra atau Tertanggung.</span> <br>
            <i>Transactian limit is colculated as 7 calendar doys ofter receipt of invoice by Partner or Insured.</i>
        </p>
    
</div>
 
</body>
</html>