<?php 
  function tgl_indo_agenda_detail($tanggal){
    $bulan = array (
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $hari = array ( 1 =>    'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jumat',
      'Sabtu',
      'Minggu'
    );
    $pecahkan = explode('-', $tanggal);
    $num = date('N', strtotime($tanggal)); 
    return $hari[$num] . ', ' . $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }
?>
<div class="box-enam middle">
    <div class="left-side">
        <div class="isi_left">
            <div class="style_left-side">
                <div class="region region-menu-kedua">
                </div>
            </div>
        </div>
    </div>
    <div class="detail contentsubmenu">
        <div class="detaildata" data="teks">
            <h1><?php echo $detail->nama_kegiatan; ?></h1>
            <div class="tabs"></div>
            <div class="region region-content">
                <div id="block-system-main" class="block block-system">
                    <div class="content">
                        <div id="node-5525" class="node node-berita clearfix">
                            <div class="submitted">                                    
                                </span> dibuat pada <?php echo date_format(date_create($detail->created_date), "d M Y H:i"); ?>
                            </div>
                            <div class="content">
                                <div class="views-field views-field-totalcount">    
                                  <span class="views-label views-label-totalcount"><strong>Tempat</strong> : </span>    
                                  <span class="field-content"><?php echo $detail->tempat; ?></span>  
                                </div>
                                <div class="views-field views-field-totalcount">    
                                  <span class="views-label views-label-totalcount"><strong>Waktu Pelaksanaan</strong> : </span>    
                                  <span class="field-content"><?php echo tgl_indo_agenda_detail(date("Y-m-d", strtotime($detail->waktu_mulai))) . " Jam " . date("H:m", strtotime($detail->waktu_mulai)); ?></span>  
                                </div>
                                <div class="views-field views-field-totalcount">    
                                  <span class="views-label views-label-totalcount"><strong>Waktu Selesai</strong> : </span>    
                                  <span class="field-content"><?php echo tgl_indo_agenda_detail(date("Y-m-d", strtotime($detail->waktu_selesai))) . " Jam " . date("H:m", strtotime($detail->waktu_selesai)); ?></span>  
                                </div>
                                <br/>
                                <?php echo $detail->penjelasan_kegiatan; ?>
                                <br/>
                                <br/>
                                <?php if($detail->file_pendukung != null) : ?>
                                    <div class="field field-name-field-file-pengumuman field-type-file field-label-above">
                                        <div class="field-label">File Pendukung:&nbsp;</div>
                                        <div class="field-items">
                                            <div class="field-item even">
                                                <span class="file">
                                                    <img class="file-icon" alt="PDF icon" title="application/pdf" src="<?php echo base_url() ?>/assets/images/pdf.png"> 
                                                    <a href="<?php echo base_url().'/'.$detail->file_pendukung; ?>" type="application/pdf;" download><?php echo $detail->nama_kegiatan; ?></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <p><?php echo $detail->dibaca+1; ?> kali dibaca</p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>