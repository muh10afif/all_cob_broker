<!-- DataTables -->
<link href="<?= base_url() ?>assets/template/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>assets/template/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?= base_url() ?>assets/template/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Plugins datepicker -->
<link href="<?= base_url() ?>assets/template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/template/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/template/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

<!-- Summernote css -->
<link href="<?= base_url() ?>assets/template/plugins/summernote/summernote-bs4.css" rel="stylesheet" />

<!-- select2 -->
<link href="<?= base_url() ?>assets/select2/select2.min.css" rel="stylesheet"/>
<link href="<?= base_url() ?>assets/select2/select2-bootstrap4.min.css" rel="stylesheet"/>

<link href="<?= base_url() ?>assets/template/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>assets/template/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>assets/template/assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>assets/template/assets/css/style.css" rel="stylesheet" type="text/css">

<style>
.select2-container--bootstrap4 .select2-results__option--highlighted, .select2-container--bootstrap4 .select2-results__option--highlighted.select2-results__option[aria-selected=true] {
    background-color: #006c45;
    color: #f8f9fa;
}
.btn-primary.disabled, .btn-primary:disabled {
    color: #fff;
    background-color: #006c45;
    border-color: #006c45;
}

.custom-control-label::before {
    top: .10rem;
}
.custom-switch .custom-control-label::after {
    top: calc(.10rem + 2px);
}
div.dataTables_wrapper div.dataTables_length select {
    width: 65px;
    display: inline-block;
}
.custom-control-label::before {
    border: #006c45 solid 1px;
}

#topnav .navigation-menu > li > a {
    color: black;
}
#topnav .navigation-menu > li .submenu li a {
    color: black;
}
</style>

<style>
.sel2 .parsley-errors-list.filled {
margin-top: 42px;
margin-bottom: -60px;
}

.sel2 .parsley-errors-list:not(.filled) {
display: none;
}

.sel2 .parsley-errors-list.filled + span.select2 {
margin-bottom: 30px;
}

.sel2 .parsley-errors-list.filled + span.select2 span.select2-selection--single {
    background: #FAEDEC !important;
    border: 1px solid #E85445;
}
</style>

<style>
    div.dataTables_wrapper .container-fluid {
        margin: 0 auto;
    }
</style>