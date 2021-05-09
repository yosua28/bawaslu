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
                  <form method="post"  action="<?php echo base_url().'admin/galeri/edit/'.$id; ?>" enctype="multipart/form-data">
                <?php else : ?>
                  <form method="post"  action="<?php echo base_url() ?>admin/galeri/add" enctype="multipart/form-data">
                <?php endif; ?>
                  <div class="panel-body bg-light">
                    <div class="section-divider mt20 mb40">
                      <span><?php echo $action; ?> Galeri</span>
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
                        <h4>Upload Thumnail <label style="color: red; font-weight: bold;"> - (format : JPG, JPEG, PNG, Max : 2MB)</label></h4>
                        <div class="section">
                          <label class="field prepend-icon append-button file <?php echo !empty($valid['foto']) ? 'state-error' : ''; ?>">
                            <span class="button btn-primary">Choose File</span>
                            <input type="file" class="gui-file" name="foto" id="file1" onchange="document.getElementById('uploader1').value = this.value;">
                            <input type="text" class="gui-input" id="uploader1" placeholder="Pilih Thumnail">
                            <label class="field-icon">
                              <i class="fa fa-upload"></i>
                            </label>
                          </label>
                          <?php if (!empty($valid['foto'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['foto']; ?></em>
                          <?php endif; ?>
                          <?php if(isset($data['foto'])) : ?>
                            <br/><br/>
                            <img src="<?php echo $data['foto']; ?>" style="width: 300px; height: 100%;">
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <h4>Konten</h4> 
                        <div class="section">
                          <label class="field state-error">
                            <textarea id="ckeditor1" name="keterangan_foto" rows="12">
                              <?php echo $data['keterangan_foto']; ?>
                            </textarea>
                          </label>
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
                    <div class="section-divider mt20 mb40">
                      <span>Foto</span>
                    </div>

                    <div class="section row" id="spy1">
                      <div class="col-md-12">
                        <h4>Tabah Foto <label style="color: red; font-weight: bold;"> - (format : JPG, JPEG, PNG, Max : 2MB)</label></h4>
                      </div>
                      <?php 
                        for ($x = 1; $x <= 10; $x++) {
                      ?>
                        <div class="col-md-12">
                          <div class="section">
                            <label class="field prepend-icon append-button file <?php echo !empty($valid['foto'.$x]) ? 'state-error' : ''; ?>">
                              <span class="button btn-primary">Choose File</span>
                              <input type="file" class="gui-file" name="<?php echo 'foto'.$x; ?>" onchange="document.getElementById('<?php echo 'foto'.$x; ?>').value = this.value;">
                              <input type="text" class="gui-input" id="<?php echo 'foto'.$x; ?>" placeholder="Pilih Foto">
                              <label class="field-icon">
                                <i class="fa fa-upload"></i>
                              </label>
                            </label>
                            <?php if (!empty($valid['foto2'])) : ?>
                              <em for="applicant_age" class="state-error"><?php echo $valid['foto'.$x]; ?></em>
                            <?php endif; ?>
                            <input type="hidden" name='<?php echo 'delete_foto'.$x; ?>' id='<?php echo 'delete_foto'.$x; ?>' value="0">
                            <?php if(isset($data['foto'.$x])) : ?>
                              <br/><br/>
                              <input type="hidden" name='<?php echo 'id_foto'.$x; ?>' value="<?php echo $data['id_foto'.$x]; ?>">
                              <div id="<?php echo 'div_foto'.$x; ?>">
                                <img src="<?php echo $data['foto'.$x]; ?>" style="width: 300px; height: 100%;">
                                <button type="button" class="button btn-danger btn_delete_foto" data-num="<?php echo $x; ?>"> Hapus </button>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>
                      <?php 
                        }
                      ?>
                    </div>
                  </div>
                  <div class="panel-footer text-right">
                    <button type="submit" class="button btn-success"> Simpan </button>
                    <button type="reset" class="button btn-warning" onclick="window.location.href = '<?php echo base_url() ?>admin/galeri/foto';"> Cancel </button>
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