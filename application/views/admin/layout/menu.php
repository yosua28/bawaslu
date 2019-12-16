<aside id="sidebar_left" class="nano nano-primary affix">
  <div class="sidebar-left-content nano-content">
    <ul class="nav sidebar-menu">
      <li class="sidebar-label pt20">Profile</li>
      <li class="active">
        <a href="<?php echo base_url() ?>admin/dashboard/index">
          <span class="glyphicon glyphicon-home"></span>
          <span class="sidebar-title">Dashboard</span>
        </a>
      </li>
      <?php if(isset($this->CI->session) && 
            $this->CI->session->userdata('role') == 'superadmin') : ?>
        <li>
          <a href="<?php echo base_url() ?>admin/user/index">
            <span class="fa fa-calendar"></span>
            <span class="sidebar-title">User</span>
          </a>
        </li>
      <?php endif; ?>
      <li class="sidebar-label pt15">Konten</li>
      <?php if(isset($this->CI->session) && 
            $this->CI->session->userdata('role') == 'superadmin') : ?>
        <li>
          <a href="<?php echo base_url() ?>admin/profil/index">
            <span class="fa fa-calendar"></span>
            <span class="sidebar-title">Profil</span>
          </a>
        </li>
      <?php endif; ?>
      <li>
        <a href="<?php echo base_url() ?>admin/agenda/index">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Agenda</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>admin/konten/kategori/ppid">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">PPID</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>admin/konten/kategori/publikasi">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Publikasi</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>admin/konten/kategori/pengawasan">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Pengawasan</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>admin/konten/kategori/putusan">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Putusan</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>admin/konten/kategori/pengumuman">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Pengumuman</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>admin/konten/kategori/seleksi-jpt-pratama">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Seleksi JPT Pratama</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>admin/galeri/foto">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Galeri Foto</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url() ?>admin/galeri/video">
          <span class="fa fa-calendar"></span>
          <span class="sidebar-title">Galeri Video</span>
        </a>
      </li>
    </ul>
  </div>
</aside>