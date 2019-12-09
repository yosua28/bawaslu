<!-- Start: Header -->
<header class="navbar navbar-fixed-top">
  <div class="navbar-branding">
    <a class="navbar-brand" href="dashboard.html">
      <b>Bawaslu</b>ALOR
    </a>
    <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
  </div>

  <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> 
        <img src="<?php echo base_url() ?>/assets/images/avatar.jpg" alt="avatar" class="mw30 br64 mr15"> <?php echo $this->CI->session->userdata('nama'); ?>
        <span class="caret caret-tp hidden-xs"></span>
      </a>
      <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
        <li class="list-group-item">
          <a href="#" class="animated animated-short fadeInUp">
            <span class="fa fa-gear"></span> Account Settings </a>
        </li>
        <li class="list-group-item">
          <a href="<?php echo base_url('logout') ?>" class="animated animated-short fadeInUp">
            <span class="fa fa-power-off"></span> Logout </a>
        </li>
      </ul>
    </li>
  </ul>
</header>
<!-- End: Header -->