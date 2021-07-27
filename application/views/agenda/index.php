<?php 
  function tgl_indo_agenda($tanggal){
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
                <h1>Agenda</h1>
                <div class="region region-menu-kedua">
                </div>
            </div>
        </div>
    </div>
    <div class="detail contentsubmenu">
        <div class="detaildata" data="teks">
            <h1 style="color: white; margin-bottom: -25px;">Agenda</h1>
            <div class="tabs"></div>
            <div class="region region-content">
                <div id="block-views-berita-block-2" class="block block-views">
                    <div class="content">
                        <div class="view view-berita view-id-berita view-display-id-block_2 view-dom-id-899976299a8fb5e7a8d94b9a193cc6f6">
                            <div class="view-content">
                                <?php foreach ($konten as $key => $value) : ?>
                                  <div class="views-row views-row-1 views-row-odd views-row-first">
                                      <div class="views-field views-field-title">        
                                        <span class="field-content">
                                          <a href="<?php echo base_url() ?>agenda/view/<?php echo $value->link; ?>">
                                            <?php echo $value->nama_kegiatan; ?>
                                          </a>
                                        </span>  
                                      </div>
                                      <div class="views-field views-field-totalcount">    
                                        <span class="views-label views-label-totalcount">Dilihat : </span>    
                                        <span class="field-content"><?php echo $value->dibaca ; ?> Kali</span>  
                                      </div>
                                      <div class="views-field views-field-totalcount">    
                                        <span class="views-label views-label-totalcount">Tempat : </span>    
                                        <span class="field-content"><?php echo $value->tempat; ?></span>  
                                      </div>
                                      <div class="views-field views-field-totalcount">    
                                        <span class="views-label views-label-totalcount">Waktu Pelaksanaan : </span>    
                                        <span class="field-content"><?php echo tgl_indo_agenda(date("Y-m-d", strtotime($value->waktu_mulai))) . " Jam " . date("H:m", strtotime($value->waktu_mulai)); ?></span>  
                                      </div>
                                      <div class="views-field views-field-totalcount">    
                                        <span class="views-label views-label-totalcount">Waktu Selesai : </span>    
                                        <span class="field-content"><?php echo tgl_indo_agenda(date("Y-m-d", strtotime($value->waktu_selesai))) . " Jam " . date("H:m", strtotime($value->waktu_selesai)); ?></span>  
                                      </div><br/>
                                      <div class="views-field views-field-body">
                                          <div class="field-content">
                                            <?php 
                                              $str = preg_replace('/<[^>]*>/', '', $value->penjelasan_kegiatan);
                                              echo implode(' ', array_slice(explode(' ', $str), 0, 40)).'...';
                                            ?>
                                          </div>
                                      </div>
                                      <?php if($value->file_pendukung != null) : ?>
                                        <br/>
                                        <div class="field field-name-field-file-pengumuman field-type-file field-label-above">
                                            <div class="field-label">File Pendukung:&nbsp;</div>
                                            <div class="field-items">
                                                <div class="field-item even">
                                                    <span class="file">
                                                        <img class="file-icon" alt="PDF icon" title="application/pdf" src="<?php echo base_url() ?>/assets/images/pdf.png"> 
                                                        <a href="<?php echo base_url().'/'.$value->file_pendukung; ?>" type="application/pdf;" download><?php echo $value->nama_kegiatan; ?></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                  </div>
                                <?php endforeach; ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>