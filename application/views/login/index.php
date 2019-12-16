<body class="external-page sb-l-c sb-r-c">
  <div id="main" class="animated fadeIn">
    <section id="content_wrapper">
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>
      <section id="content">
        <div class="admin-form theme-info" id="login1">
          <div class="panel panel-info mt10 br-n">
            <form method="post" action="<?php echo base_url() ?>login/index">
              <div class="panel-body bg-light p30">
                <div class="row">
                  <div class="col-sm-7 pr30">
                    <div class="section">
                      <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                      <label for="username" class="field prepend-icon">
                        <input type="text" name="username" id="username" class="gui-input" placeholder="Enter username">
                        <label for="username" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                    </div>
                    <div class="section">
                      <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                      <label for="password" class="field prepend-icon">
                        <input type="password" name="password" id="password" class="gui-input" placeholder="Enter password">
                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <?php if (!empty($error)) : ?>
                      <label style="color: red; font-weight: bold;"><?php echo $error; ?></label>
                    <?php endif; ?>
                  </div>
                  <div class="col-sm-5 br-l br-grey pl30">
                    <h3 class="mb25"> Anda dapat mengakses:</h3>
                    <p class="mb15">
                      <span class="fa fa-check text-success pr5"></span> Update Profile</p>
                    <p class="mb15">
                      <span class="fa fa-check text-success pr5"></span> Menambahkan Konten</p>
                    <p class="mb15">
                      <span class="fa fa-check text-success pr5"></span> Mengubah Konten</p>
                    <p class="mb15">
                      <span class="fa fa-check text-success pr5"></span> Menonaktifkan Konten</p>
                  </div>
                </div>
              </div>
              <div class="panel-footer clearfix p10 ph15">
                <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
                <label class="switch ib switch-primary pull-left input-align mt10">
                  <input type="checkbox" name="remember" id="remember" checked>
                  <label for="remember" data-on="YES" data-off="NO"></label>
                  <span>Remember me</span>
                </label>
              </div>
            </form>
          </div>
        </div>
      </section>
    </section>
  </div>
</body>