<section id="content_wrapper">
  <header id="topbar">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="<?php echo base_url() ?>admin/dashboard/index">Dashboard</a>
        </li>
        <li class="crumb-trail">Agenda</li>
      </ol>
    </div>
  </header>

  <section id="content" class="table-layout animated fadeIn">
    <div class="tray tray-center">
      <div class="row">
        <div class="col-md-12">
          <button type="button" onclick="window.location.href = '<?php echo base_url() ?>admin/agenda/add';" class="btn ladda-button btn-primary progress-button" data-style="expand-down">
            <span class="ladda-label">Tambah Agenda</span>
            <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
          </button><br/><br/>
          <div class="panel panel-visible" id="spy2">
            <div class="panel-heading">
              <div class="panel-title hidden-xs">
                <span class="glyphicon glyphicon-tasks"></span>List Agenda
              </div>
            </div>
            <div class="panel-body pn">
              <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tempat Pelaksanaan</th>
                    <th>Keterangan Kegiatan</th>
                    <th>Mulai Kegiatan</th>
                    <th>Selesai Kegiatan</th>
                    <th>Status</th>
                    <th>Dibaca</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($list_agenda as $key => $value) : ?>
                    <tr>
                      <td><?php echo $key+1; ?></td>
                      <td title="<?php echo $value->nama_kegiatan; ?>"><?php echo $value->nama_kegiatan; ?></td>
                      <td title="<?php echo $value->tempat; ?>"><?php echo $value->tempat; ?></td>
                      <td title="<?php echo $value->penjelasan_kegiatan; ?>"><?php echo $value->penjelasan_kegiatan; ?></td>
                      <td><?php echo date_format(date_create($value->waktu_mulai), "d M Y H:i"); ?></td>
                      <td><?php echo date_format(date_create($value->waktu_selesai), "d M Y H:i"); ?></td>
                      <td><?php echo $value->is_active == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                      <td><?php echo $value->dibaca.' kali'; ?></td>
                      <td>
                        <button onclick="window.location.href = '<?php echo base_url() ?>admin/agenda/edit/<?php echo $value->id_agenda;?>';" type="button" class="btn btn-sm btn-success btn-block">Update</button>
                        <button data-link="<?php echo base_url('admin/agenda/delete/'.$value->id_agenda); ?>" type="button" class="delete_data btn btn-sm btn-danger btn-block">Delete</button>
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
