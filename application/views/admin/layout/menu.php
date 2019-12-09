<aside id="sidebar_left" class="nano nano-primary affix">
  <div class="sidebar-left-content nano-content">
    <ul class="nav sidebar-menu">
      <li class="sidebar-label pt20">Profile</li>
      <li class="active">
        <a href="/dashboard">
          <span class="glyphicon glyphicon-home"></span>
          <span class="sidebar-title">Dashboard</span>
        </a>
      </li>
      <?php if($this->CI->session->userdata('role') == 'superadmin') : ?>
        <li>
          <a href="/user">
            <span class="fa fa-calendar"></span>
            <span class="sidebar-title">User</span>
          </a>
        </li>
      <?php endif; ?>
      <li class="sidebar-label pt15">Konten</li>
      <li>
        <a href="<?php echo base_url() ?>konten/berita">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Berita</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>konten/kesehatan">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Kesehatan</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>konten/olahraga">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Olahraga</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>konten/dokumen">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Dokumen</span>
        </a>
      </li>
      <li>
        <a href="pages_calendar.html">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Kegiatan</span>
        </a>
      </li>
      <li>
        <a href="pages_calendar.html">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Pendidikan</span>
        </a>
      </li>
      <li>
        <a href="pages_calendar.html">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Teknologi</span>
        </a>
      </li>
      <li>
        <a href="pages_calendar.html">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Musik</span>
        </a>
      </li>
      <li>
        <a href="pages_calendar.html">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Youtube</span>
        </a>
      </li>
      <li>
        <a href="pages_calendar.html">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Media Sosial</span>
        </a>
      </li>
      <li>
        <a href="pages_calendar.html">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Otomotif</span>
        </a>
      </li>
      <li>
        <a href="pages_calendar.html">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Flora & Fauna</span>
        </a>
      </li>
    </ul>
  </div>
</aside>