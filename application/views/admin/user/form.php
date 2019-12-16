<section id="content_wrapper">
  <header id="topbar">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
        </li>
        <li class="crumb-link">
          <a href="<?php echo base_url() ?>user">User</a>
        </li>
        <li class="crumb-trail">Tambah User</li>
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
                <form method="post"  action="<?php echo $submit; ?>" enctype="multipart/form-data">
                  <div class="panel-body bg-light">
                    <div class="section-divider mt20 mb40">
                      <span> Tambah User </span>
                    </div>

                    <div class="section row" id="spy1">
                      <div class="col-md-12">
                        <h4>Role</h4>
                        <div class="section">
                          <label class="field select <?php echo !empty($valid['role']) ? 'state-error' : ''; ?>">
                            <select id="country" name="role" value="?php echo $data['role']; ?>">
                              <option value="">Pilih Role</option>
                              <option <?php echo $data['role'] == 'superadmin' ? 'selected' : ''; ?> value="superadmin">Superadmin (Full Akses)</option>
                              <option <?php echo $data['role'] == 'admin' ? 'selected' : ''; ?> value="admin">Admin (Konten Kreator)</option>
                            </select>
                            <i class="arrow"></i>
                          </label>
                          <?php if (!empty($valid['role'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['role']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <h4>Username</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['username']) ? 'state-error' : ''; ?>">
                            <input type="text" value="<?php echo $data['username']; ?>" name="username" id="from" class="gui-input" placeholder="Masukan username">
                          </label>
                          <?php if (!empty($valid['username'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['username']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <h4>Password</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['password']) ? 'state-error' : ''; ?>">
                            <input type="password" value="" name="password" id="from" class="gui-input" placeholder="Masukan password">
                          </label>
                          <?php if (!empty($valid['password'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['password']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <h4>Konfirmasi Password</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['password_confirm']) ? 'state-error' : ''; ?>">
                            <input type="password" value="" name="password_confirm" id="from" class="gui-input" placeholder="Masukan ulang password">
                          </label>
                          <?php if (!empty($valid['password_confirm'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['password_confirm']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <h4>Nama</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['nama']) ? 'state-error' : ''; ?>">
                            <input type="text" value="<?php echo $data['nama']; ?>" name="nama" id="from" class="gui-input" placeholder="Masukan nama">
                          </label>
                          <?php if (!empty($valid['nama'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['nama']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <h4>Email</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['email']) ? 'state-error' : ''; ?>">
                            <input type="text" value="<?php echo $data['email']; ?>" name="email" id="from" class="gui-input" placeholder="Masukan email">
                          </label>
                          <?php if (!empty($valid['email'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['email']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <h4>No. HP</h4>
                        <div class="section">
                          <label class="field <?php echo !empty($valid['no_hp']) ? 'state-error' : ''; ?>">
                            <input type="text" value="<?php echo $data['no_hp']; ?>" name="no_hp" id="from" class="gui-input" placeholder="Masukan nomor hp">
                          </label>
                          <?php if (!empty($valid['no_hp'])) : ?>
                            <em for="applicant_age" class="state-error"><?php echo $valid['no_hp']; ?></em>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <h4>Alamat</h4>
                        <div class="section">
                          <label class="field">
                            <input type="text" value="<?php echo $data['alamat']; ?>" name="alamat" id="from" class="gui-input" placeholder="Masukan Alamat">
                          </label>
                        </div>  
                      </div>
                      <div class="col-md-12">
                        <div class="section">
                          <div class="option-group field">
                            <label class="block mt15 option option-system">
                              <input <?php echo !empty($data['is_active']) ? 'checked' : ''; ?> type="checkbox" name="is_active" id="parents"  value="1">
                              <span class="checkbox"></span> <b>Aktif</b> <label style="color: red; font-weight: bold;">(user akan dapat login jika dicentang)</label>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer text-right">
                    <button type="submit" class="button btn-success"> <?php echo $button_save; ?> </button>
                    <button type="reset" class="button btn-warning" onclick="window.location.href = '<?php echo base_url() ?>admin/user/index';"> Cancel </button>
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
