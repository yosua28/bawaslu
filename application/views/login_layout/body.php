<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Bawaslu</title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
  <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
  <meta name="author" content="AdminDesigns">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/assets/skin/default_skin/css/theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/assets/admin-tools/admin-forms/css/admin-forms.css">
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">
</head>

  <!-- Content -->
  <?php $this->load->view('login_layout/content'); ?>

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

  <!-- CanvasBG Plugin(creates mousehover effect) -->
  <script src="<?php echo base_url() ?>assets/vendor/plugins/canvasbg/canvasbg.js"></script>

  <!-- Theme Javascript -->
  <script src="<?php echo base_url() ?>assets/assets/js/utility/utility.js"></script>
  <script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {
    "use strict"; 
    Core.init();
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 2,
        y: window.innerHeight / 3.3
      },
    });

  });
  </script>
</body>
</html>
