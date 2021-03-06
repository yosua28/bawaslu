<section id="content_wrapper">
  <header id="topbar">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
        </li>
        <li class="crumb-link">
          <a href="<?php echo base_url() ?>admin/konten/<?php echo $kategori; ?>"><?php echo $data_kategori->nama; ?></a>
        </li>
        <li class="crumb-trail"><?php echo $action; ?> <?php echo $data_kategori->nama; ?></li>
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
                  <form method="post"  action="<?php echo base_url() ?>admin/konten/edit/<?php echo $kategori.'/'.$id; ?>" enctype="multipart/form-data">
                <?php else : ?>
                  <form method="post"  action="<?php echo base_url() ?>admin/konten/add/<?php echo $kategori; ?>" enctype="multipart/form-data">
                <?php endif; ?>
                  <div class="panel-body bg-light">
                    <div class="section-divider mt20 mb40">
                      <span><?php echo $action; ?> <?php echo $data_kategori->nama; ?></span>
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
                        <h4>Upload Thumbnail <label style="color: red; font-weight: bold;"> - (format : JPG, JPEG, PNG, Max : 2MB)</label></h4>
                        <div class="section">
                          <label class="field prepend-icon append-button file <?php echo !empty($valid['foto_thumbnail']) ? 'state-error' : ''; ?>">
                            <span class="button btn-primary">Choose File</span>
                            <input type="file" class="gui-file" name="foto_thumbnail" id="file1" onchange="document.getElementById('uploader1').value = this.value;">
                            <input type="text" class="gui-input" id="uploader1" placeholder="Pilih Thumbnail">
                            <label class="field-icon">
                              <i class="fa fa-upload"></i>
                            </label>
                          </label>
                          <?php if (!empty($valid['foto_thumbnail'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['foto_thumbnail']; ?></em>
                          <?php endif; ?>
                          <?php if(isset($data['foto_thumbnail'])) : ?>
                            <br/><br/>
                            <img src="<?php echo $data['foto_thumbnail']; ?>" style="width: 400px; height: 100%;">
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <h4>Konten</h4> 
                        <div class="section">
                          <label class="field state-error">
                            <textarea id="ckeditor1" name="isi_konten" rows="12">
                              <?php echo $data['isi_konten']; ?>
                            </textarea>
                          </label>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <h4>File Pendukung <label style="color: red; font-weight: bold;"> - File dapat di unduh oleh publik (format : PDF, Max : 5MB)</label></h4>
                        <div class="section">
                          <label class="field prepend-icon append-button file <?php echo !empty($valid['file_pendukung']) ? 'state-error' : ''; ?>">
                            <span class="button btn-primary">Choose File</span>
                            <input type="file" class="gui-file" name="file_pendukung" id="file1" onchange="document.getElementById('uploader2').value = this.value;">
                            <input type="text" class="gui-input" id="uploader2" placeholder="Pilih File Pendukung">
                            <label class="field-icon">
                              <i class="fa fa-upload"></i>
                            </label>
                          </label>
                          <?php if (!empty($valid['file_pendukung'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['file_pendukung']; ?></em>
                          <?php endif; ?>

                          <?php if(isset($data['file_pendukung'])) : ?>
                            <br/><br/>
                            <a href="<?php echo $data['file_pendukung']; ?>" target="_blank"><?php echo $data['file_pendukung']; ?></a>
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
                    <button type="reset" class="button btn-warning" onclick="window.location.href = '<?php echo base_url() ?>admin/konten/kategori/<?php echo $kategori;?>';"> Cancel </button>
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
