<section id="content_wrapper">
  <header id="topbar">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
        </li>
        <li class="crumb-link">
          <a href="<?php echo base_url() ?>admin/agenda/index">Agenda</a>
        </li>
        <li class="crumb-trail"><?php echo $action; ?></li>
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
                  <form method="post"  action="<?php echo base_url() ?>admin/agenda/edit/<?php echo $id; ?>" enctype="multipart/form-data">
                <?php else : ?>
                  <form method="post"  action="<?php echo base_url() ?>admin/agenda/add" enctype="multipart/form-data">
                <?php endif; ?>
                  <div class="panel-body bg-light">
                    <div class="section-divider mt20 mb40">
                      <span> <?php echo $action; ?></span>
                    </div>

                    <div class="section row" id="spy1">
                      <div class="col-md-12">
                        <h4>Nama Kegiatan</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['nama_kegiatan']) ? 'state-error' : ''; ?>">
                            <input type="text" value="<?php echo $data['nama_kegiatan']; ?>" name="nama_kegiatan" id="from" class="gui-input" placeholder="Masukan Nama Kegiatan">
                          </label>
                          <?php if (!empty($valid['nama_kegiatan'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['nama_kegiatan']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <h4>Tempat Pelaksanaan</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['tempat']) ? 'state-error' : ''; ?>">
                            <input type="text" value="<?php echo $data['tempat']; ?>" name="tempat" id="from" class="gui-input" placeholder="Masukan Nama Kegiatan">
                          </label>
                          <?php if (!empty($valid['tempat'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['tempat']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <h4>Keterangan Kegiatan</h4> 
                        <div class="section">
                          <label class="field state-error">
                            <textarea id="ckeditor1" name="penjelasan_kegiatan" rows="12">
                              <?php echo $data['penjelasan_kegiatan']; ?>
                            </textarea>
                          </label>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <h4>Mulai Kegiatan</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['waktu_mulai']) ? 'state-error' : ''; ?>">
                            <div class='input-group date datetimepicker1'>
                                  <input type='text' class="form-control" name="waktu_mulai" value="<?php echo $data['waktu_mulai']; ?>" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                          </label>
                          <?php if (!empty($valid['waktu_mulai'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['waktu_mulai']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <h4>Selesai Kegiatan</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['waktu_selesai']) ? 'state-error' : ''; ?>">
                            <div class='input-group date datetimepicker1'>
                                  <input type='text' class="form-control" name="waktu_selesai" value="<?php echo $data['waktu_selesai']; ?>"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                          </label>
                          <?php if (!empty($valid['waktu_selesai'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['waktu_selesai']; ?></em>
                          <?php endif; ?>
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
                            <a href="<?php echo $data['file_pendukung']; ?>" target="_blank">File Pendukung</a>
                          <?php endif; ?>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="section">
                          <div class="option-group field">
                            <label class="block mt15 option option-system">
                              <input <?php echo !empty($data['is_active']) ? 'checked' : ''; ?> type="checkbox" name="is_active" id="parents"  value="1">
                              <span class="checkbox"></span> <b>Aktif</b> <label style="color: red; font-weight: bold;">(Agenda akan terpublikasi jika dicentang)</label>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
            
                  </div>
                  <div class="panel-footer text-right">
                    <button type="submit" class="button btn-success"> Simpan </button>
                    <button type="reset" class="button btn-warning" onclick="window.location.href = '<?php echo base_url() ?>admin/agenda/index';"> Cancel </button>
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
