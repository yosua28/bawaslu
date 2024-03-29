<section id="content_wrapper">
  <header id="topbar">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="<?php echo base_url() ?>admin/dashboard/index">Dashboard</a>
        </li>
        <li class="crumb-trail">Profil</li>
      </ol>
    </div>
  </header>

  <section id="content" class="table-layout animated fadeIn">
    <div class="tray tray-center">
      <div class="row">
        <div class="col-md-12">
          <button type="button" onclick="window.location.href = '<?php echo base_url() ?>admin/profil/add';" class="btn ladda-button btn-primary progress-button" data-style="expand-down">
            <span class="ladda-label">Tambah Profil</span>
            <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
          </button><br/><br/>
          <div class="panel panel-visible" id="spy2">
            <div class="panel-heading">
              <div class="panel-title hidden-xs">
                <span class="glyphicon glyphicon-tasks"></span>List Data Profil
              </div>
            </div>
            <div class="panel-body pn">
              <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>kategori</th>
                    <th>judul</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Status</th>
                    <th>Dibaca</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($konten as $key => $value) : ?>
                    <tr>
                      <td><?php echo $key+1; ?></td>
                      <td title="<?php echo $value->kategori; ?>"><?php echo $value->kategori; ?></td>
                      <td title="<?php echo $value->nama; ?>"><?php echo $value->nama; ?></td>
                      <td><?php echo date_format(date_create($value->created_date), "d M Y H:i"); ?></td>
                      <td><?php echo $value->is_active == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                      <td><?php echo $value->dibaca != null ? $value->dibaca.' kali' : '0 kali'; ?></td>
                      <td>
                        <button onclick="window.location.href = '<?php echo base_url() ?>admin/profil/edit/<?php echo $value->id;?>';" type="button" class="btn btn-sm btn-success btn-block">Update</button>
                        <?php 
                          if (!in_array($value->id, array("1", "2", "3", "4"))) :
                        ?>
                          <button data-link="<?php echo base_url('admin/profil/delete/'.$value->id) ?>" type="button" class="delete_data btn btn-sm btn-danger btn-block">Delete</button>
                        <?php 
                          endif ;
                        ?>
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
