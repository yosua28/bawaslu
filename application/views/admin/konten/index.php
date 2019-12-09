<section id="content_wrapper">
  <header id="topbar">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="/dashboard">Dashboard</a>
        </li>
        <li class="crumb-trail"><?php echo ucfirst($kategori) ?></li>
      </ol>
    </div>
  </header>

  <section id="content" class="table-layout animated fadeIn">
    <div class="tray tray-center">
      <div class="row">
        <div class="col-md-12">
          <button type="button" onclick="window.location.href = '/add/konten/<?php echo $kategori;?>/';" class="btn ladda-button btn-primary progress-button" data-style="expand-down">
            <span class="ladda-label">Tambah <?php echo ucfirst($kategori); ?></span>
            <span class="ladda-spinner"></span><span class="ladda-spinner"></span>
          </button><br/><br/>
          <div class="panel panel-visible" id="spy2">
            <div class="panel-heading">
              <div class="panel-title hidden-xs">
                <span class="glyphicon glyphicon-tasks"></span>List Data <?php echo ucfirst($kategori); ?>
              </div>
            </div>
            <div class="panel-body pn">
              <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Dibuat Oleh</th>
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
                      <td title="<?php echo $value->judul; ?>"><?php echo $value->judul; ?></td>
                      <td><?php echo $value->nama; ?></td>
                      <td><?php echo date_format(date_create($value->tgl_pembuatan), "d M Y H:i"); ?></td>
                      <td><?php echo $value->is_active == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                      <td><?php echo $value->dibaca.' kali'; ?></td>
                      <td>
                        <button onclick="window.location.href = '/update/konten/<?php echo $kategori;?>/<?php echo $value->link;?>';" type="button" class="btn btn-sm btn-success btn-block">Update</button>
                        <button href="<?php echo base_url('konten/delete/'.$value->id) ?>" type="button" class="btn btn-sm btn-danger btn-block" onClick="return confirm('Yakin ingin menghapus Konten ini?')">Delete</button>
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