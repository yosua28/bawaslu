<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>Bawaslu</title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
  <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
  <meta name="author" content="AdminDesigns">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>


  <!-- Datatables CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/plugins/datatables/media/css/dataTables.bootstrap.css">

  <!-- Datatables Addons CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/plugins/datatables/media/css/dataTables.plugins.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/assets/skin/default_skin/css/theme.css">
  <!-- Favicon -->

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/assets/admin-tools/admin-forms/css/admin-forms.css">
  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/assets/skin/default_skin/css/theme.css">
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

</head>

<body class="form-editors-page" data-spy="scroll" data-target="#nav-spy" data-offset="300">

  

  <!-- Start: Main -->
  <div id="main">

    <!-- header -->
    <?php $this->load->view('admin/layout/header'); ?>

    <!-- Menu Kiri -->
    <?php $this->load->view('admin/layout/menu'); ?>

    <!-- Content -->
    <?php $this->load->view('admin/layout/content'); ?>


  </div>
  <!-- End: Main -->

  <style>
  /* demo styles -summernote */
  .btn-toolbar > .btn-group.note-fontname {
    display: none;
  }
  /* demo styles - hides several ckeditor toolbar buttons */
  #cke_52,
  #cke_53 {
    display: none !important;
  }
  </style>

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>


  <!-- Ckeditor JS -->
  <script src="<?php echo base_url() ?>assets/vendor/plugins/ckeditor/ckeditor.js"></script>

  <!-- Summernote Plugin -->
  <script src="<?php echo base_url() ?>assets/vendor/plugins/summernote/summernote.min.js"></script>

  <!-- MarkDown JS -->
  <script src="<?php echo base_url() ?>assets/vendor/plugins/markdown/markdown.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/plugins/markdown/to-markdown.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/plugins/markdown/bootstrap-markdown.js"></script>

  <!-- X-Edit JS -->
  <script src="<?php echo base_url() ?>assets/vendor/plugins/moment/moment.min.js"></script>
  <!-- X-Edit Dependencies -->
  <script src="<?php echo base_url() ?>assets/vendor/plugins/xeditable/js/bootstrap-editable.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/plugins/xeditable/inputs/address/address.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/plugins/xeditable/inputs/typeaheadjs/lib/typeahead.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/plugins/xeditable/inputs/typeaheadjs/typeaheadjs.js"></script>


  <!-- Datatables -->
  <script src="<?php echo base_url() ?>assets/vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

  <!-- Datatables Tabletools addon -->
  <script src="<?php echo base_url() ?>assets/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

  <!-- Datatables ColReorder addon -->
  <script src="<?php echo base_url() ?>assets/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>

  <!-- Datatables Bootstrap Modifications  -->
  <script src="<?php echo base_url() ?>assets/vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>


  <!-- jQuery Validate Plugin-->
  <script src="<?php echo base_url() ?>assets/assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>

  <!-- jQuery Validate Addon -->
  <script src="<?php echo base_url() ?>assets/assets/admin-tools/admin-forms/js/additional-methods.min.js"></script>
  <!-- Theme Javascript -->
  <script src="<?php echo base_url() ?>assets/assets/js/utility/utility.js"></script>
  <script src="<?php echo base_url() ?>assets/assets/js/demo/demo.js"></script>
  <script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/plugins/ckeditor/ckeditor.js"></script>


  <!-- Page Javascript -->
  <script type="text/javascript">
    $(document).ready(function(){
      $(".delete_data").click(function(){
        var link = $(this).data("link");
        if (confirm("Apakah anda yakin menghapus data ini?")){
          // console.log(link);
          window.location.href = link;
        }
        return false;
      });
    });
  </script>

  <script type="text/javascript">
  jQuery(document).ready(function() {
    Core.init();
    // Demo.init();
    $('#datatable2').dataTable({
      "aoColumnDefs": [{
        'bSortable': false,
        'aTargets': [-1]
      }],
      "oLanguage": {
        "oPaginate": {
          "sPrevious": "",
          "sNext": ""
        }
      },
      "iDisplayLength": 10,
      "aLengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
    });
    $('.dataTables_filter input').attr("placeholder", "Cari");
    // Init Ckeditor
    CKEDITOR.replace('ckeditor1', {
      height: 210,
      on: {
        instanceReady: function(evt) {
          $('.cke').addClass('admin-skin cke-hide-bottom');
        }
      },
    });
  });
  </script>
  <!-- END: PAGE SCRIPTS -->

</body>

</html>
