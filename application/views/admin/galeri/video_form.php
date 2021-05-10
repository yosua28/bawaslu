<section id="content_wrapper">
  <header id="topbar">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
        </li>
        <li class="crumb-link">
          <a href="<?php echo base_url() ?>admin/galeri/foto">Galeri</a>
        </li>
        <li class="crumb-trail"><?php echo $action; ?> Galeri</li>
      </ol>
    </div>
  </header>

  <section id="content" class="table-layout animated fadeIn">
    <div class="tray tray-center">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-visible" id="spy2">
            <div class="admin-form theme-primary mw1200 center-block" style="padding-bottom: 175px;">
              <div class="panel heading-border panel-primary">
                <?php if ($id != "") : ?>
                  <form method="post"  action="<?php echo base_url().'admin/galeri/editvideo/'.$id; ?>" enctype="multipart/form-data">
                <?php else : ?>
                  <form method="post"  action="<?php echo base_url() ?>admin/galeri/addvideo" enctype="multipart/form-data">
                <?php endif; ?>
                  <div class="panel-body bg-light">
                    <div class="section-divider mt20 mb40">
                      <span><?php echo $action; ?> Video</span>
                    </div>

                    <div class="section row" id="spy1">
                      <div class="col-md-12">
                        <h4>Judul</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['judul']) ? 'state-error' : ''; ?>">
                            <input type="text" value="<?php echo $data['judul']; ?>" name="judul" id="from" class="gui-input" placeholder="Masukan Judul">
                          </label>
                          <?php if (!empty($valid['judul'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['judul']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <h4>Link Youtube <label style="color: red; font-weight: bold;"> - (video harus diambil dari youtube)</label></h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['youtube']) ? 'state-error' : ''; ?>">
                            <input type="text" value="<?php echo $data['youtube']; ?>" name="youtube" id="from" class="gui-input" placeholder="Masukan Link Youtube">
                          </label>
                          <?php if (!empty($valid['youtube'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['youtube']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="section">
                          <div class="option-group field">
                            <label class="block mt15 option option-system">
                              <input <?php echo !empty($data['is_active']) ? 'checked' : ''; ?> type="checkbox" name="is_active" id="parents"  value="1">
                              <span class="checkbox"></span> <b>Aktif</b> <label style="color: red; font-weight: bold;">(konten akan terpublikasi jika dicentang)</label>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer text-right">
                    <button type="submit" class="button btn-success"> Simpan </button>
                    <button type="reset" class="button btn-warning" onclick="window.location.href = '<?php echo base_url() ?>admin/galeri/video';"> Cancel </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>

<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".btn_delete_foto").click(function(){
      var num = $(this).data('num');
      $("#div_foto"+num).css("display", "none");
      $("#delete_foto"+num).val("1");
    });
  });
</script>