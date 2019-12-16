<section id="content_wrapper">
  <header id="topbar">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="<?php echo base_url() ?>admin/dashboard/index">Dashboard</a>
        </li>
        <li class="crumb-trail">User</li>
      </ol>
    </div>
  </header>

  <section id="content" class="table-layout animated fadeIn">
    <div class="tray tray-center">
      <div class="row">
        <div class="col-md-12">
          <button type="button" onclick="window.location.href = '<?php echo base_url() ?>admin/user/add';" class="btn ladda-button btn-primary progress-button" data-style="expand-down">
            <span class="ladda-label">Tambah User</span>
            <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
          </button><br/><br/>
          <div class="panel panel-visible" id="spy2">
            <div class="panel-heading">
              <div class="panel-title hidden-xs">
                <span class="glyphicon glyphicon-tasks"></span>List Data User
              </div>
            </div>
            <div class="panel-body pn">
              <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user_list as $key => $value) : ?>
                    <tr>
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $value->username; ?></td>
                      <td><?php echo $value->nama; ?></td>
                      <td><?php echo $value->email; ?></td>
                      <td><?php echo $value->no_hp; ?></td>
                      <td><?php echo $value->alamat; ?></td>
                      <td><?php echo $value->role; ?></td>
                      <td><?php echo $value->is_active == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                      <td>
                        <button onclick="window.location.href = '<?php echo base_url() ?>admin/user/update/<?php echo $value->id;?>';" type="button" class="btn btn-sm btn-success btn-block">Update</button>
                        <button data-link="<?php echo base_url('admin/user/delete/'.$value->id) ?>" type="button" class="btn btn-sm btn-danger btn-block delete_data">Delete</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>