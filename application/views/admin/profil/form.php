<section id="content_wrapper">
  <header id="topbar">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
        </li>
        <li class="crumb-link">
          <a href="<?php echo base_url() ?>admin/profil/index">Profil</a>
        </li>
        <li class="crumb-trail"><?php echo $action; ?> Profil</li>
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
                  <form method="post"  action="<?php echo base_url().'admin/profil/edit/'.$id; ?>" enctype="multipart/form-data">
                <?php else : ?>
                  <form method="post"  action="<?php echo base_url() ?>admin/profil/add" enctype="multipart/form-data">
                <?php endif; ?>
                  <div class="panel-body bg-light">
                    <div class="section-divider mt20 mb40">
                      <span><?php echo $action; ?> Profil</span>
                    </div>

                    <div class="section row" id="spy1">
                      <div class="col-md-12">
                        <h4>Kategori</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['kategori']) ? 'state-error' : ''; ?>">
                            <input type="text" value="<?php echo $data['kategori']; ?>" name="kategori" id="from" class="gui-input" placeholder="Masukan Kategori">
                          </label>
                          <?php if (!empty($valid['kategori'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['kategori']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>
                      <?php 
                        if ($action == "Tambah") :
                      ?>
                        <div class="col-md-12">
                          <h4>Jabatan</h4>
                          <div class="section">
                            <label class="field <?php echo !empty($valid['jabatan']) ? 'state-error' : ''; ?>">
                              <input type="text" value="<?php echo $data['jabatan']; ?>" name="jabatan" id="from" class="gui-input" placeholder="Masukan Jabatan">
                            </label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <h4>Nama</h4>
                          <div class="section">
                            <label class="field <?php echo !empty($valid['nama']) ? 'state-error' : ''; ?>">
                              <input type="text" value="<?php echo $data['nama']; ?>" name="nama" id="from" class="gui-input" placeholder="Masukan Nama">
                            </label>
                            <?php if (!empty($valid['nama'])) : ?>
                              <em for="applicant_age" class="state-error"><?php echo $valid['nama']; ?></em>
                            <?php endif; ?>
                          </div>
                        </div>
                      <?php
                        else :
                          if (in_array($id, array("1", "2", "3", "4"))) :
                      ?>

                        <div class="col-md-12">
                          <h4>Judul</h4>
                          <div class="section">
                            <label class="field <?php echo !empty($valid['nama']) ? 'state-error' : ''; ?>">
                              <input type="text" value="<?php echo $data['nama']; ?>" name="nama" id="from" class="gui-input" placeholder="Masukan Judul">
                            </label>
                            <?php if (!empty($valid['nama'])) : ?>
                              <em for="applicant_age" class="state-error"><?php echo $valid['nama']; ?></em>
                            <?php endif; ?>
                          </div>
                        </div>
                      <?php 
                          else :
                      ?>
                            <div class="col-md-12">
                              <h4>Jabatan</h4>
                              <div class="section">
                                <label class="field <?php echo !empty($valid['jabatan']) ? 'state-error' : ''; ?>">
                                  <input type="text" value="<?php echo $data['jabatan']; ?>" name="jabatan" id="from" class="gui-input" placeholder="Masukan Jabatan">
                                </label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <h4>Nama</h4>
                              <div class="section">
                                <label class="field <?php echo !empty($valid['nama']) ? 'state-error' : ''; ?>">
                                  <input type="text" value="<?php echo $data['nama']; ?>" name="nama" id="from" class="gui-input" placeholder="Masukan Nama">
                                </label>
                                <?php if (!empty($valid['nama'])) : ?>
                                  <em for="applicant_age" class="state-error"><?php echo $valid['nama']; ?></em>
                                <?php endif; ?>
                              </div>
                            </div>
                      <?php
                          endif;
                        endif;
                      ?>

                      <div class="col-md-12">
                        <h4>Foto <label style="color: red; font-weight: bold;"> - (format : JPG, JPEG, PNG, Max : 2MB)</label></h4>
                        <div class="section">
                          <label class="field prepend-icon append-button file <?php echo !empty($valid['foto']) ? 'state-error' : ''; ?>">
                            <span class="button btn-primary">Choose File</span>
                            <input type="file" class="gui-file" name="foto" id="file1" onchange="document.getElementById('uploader1').value = this.value;">
                            <input type="text" class="gui-input" id="uploader1" placeholder="Pilih Foto">
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
                            <textarea id="ckeditor1" name="isi" rows="12">
                              <?php echo $data['isi']; ?>
                            </textarea>
                          </label>
                          <?php if (!empty($valid['isi'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['isi']; ?></em>
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
                    <button type="reset" class="button btn-warning" onclick="window.location.href = '<?php echo base_url() ?>admin/profil/index';"> Cancel </button>
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