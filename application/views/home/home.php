<div class="box-enam middle">
  <div class="detail contentsubmenu">
    <div class="detaildata" data="teks">
      <div class="region region-slideshow">
        <div id="block-views-slideshow-block" class="block block-views">
          <div class="content">
            <div class="view view-slideshow view-id-slideshow view-display-id-block view-dom-id-c5509e15403b0404772f205516008554">
              <div class="view-content">
                <div class="skin-default">
                  <div id="views_slideshow_cycle_main_slideshow-block_1" class="views_slideshow_cycle_main views_slideshow_main">
                    <div id="views_slideshow_cycle_teaser_section_slideshow-block_1" class="views-slideshow-cycle-main-frame views_slideshow_cycle_teaser_section">
                      <?php 
                        if(count($berita_utama) > 1) :
                          $loop = 0;
                          $row = 1;
                          foreach ($berita_utama as $key_utama => $value_utama) : 
                      ?>
                        <div id="views_slideshow_cycle_div_slideshow-block_1_<?php echo $loop; ?>" class="views-slideshow-cycle-main-frame-row views_slideshow_cycle_slide views_slideshow_slide views-row-<?php echo $row; ?> views-row-first views-row-odd">
                          <div class="views-slideshow-cycle-main-frame-row-item views-row views-row-0 views-row-odd <?php echo $loop == 0 ? 'views-row-first' : ''; ?>">
                            <div class="views-field views-field-field-foto-berita">
                              <div class="field-content">
                                <img src="<?php echo base_url().'/'.$value_utama->foto_thumbnail; ?>" alt="" style="width: 100%;height: 380px;" />
                              </div>
                            </div>
                            <div class="views-field views-field-body" onclick="window.open('/berita/view/<?php echo $value_utama->link; ?>','mywindow');" style="cursor: pointer;">
                              <div class="field-content" style="margin-top: 5px;">
                                <strong>
                                  <?php echo $value_utama->judul ?>
                                </strong>
                                <p style="margin-top: 10px; font-size: 11px;">
                                  <?php 
                                    $str = preg_replace('/<[^>]*>/', '', $value_utama->isi_konten);
                                    echo implode(' ', array_slice(explode(' ', $str), 0, 40)).'...';
                                  ?>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php
                          $loop++; 
                          $row++;
                          endforeach; 
                        endif;
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="region region-content">
        <div id="block-quicktabs-tab-halaman-depan" class="block block-quicktabs">
          <div class="content">
            <div id="quicktabs-tab_halaman_depan" class="quicktabs-wrapper quicktabs-style-nostyle">
              <div class="item-list">
                <ul class="quicktabs-tabs quicktabs-style-nostyle">
                  <li class="active first">
                    <a href="/id/node?qt-tab_halaman_depan=0#qt-tab_halaman_depan" id="quicktabs-tab-tab_halaman_depan-0" class="quicktabs-tab quicktabs-tab-block quicktabs-tab-block-views-delta-berita-block-1 active">Berita</a>
                  </li>
                  <li class="last">
                    <a href="/id/node?qt-tab_halaman_depan=1#qt-tab_halaman_depan" id="quicktabs-tab-tab_halaman_depan-1" class="quicktabs-tab quicktabs-tab-block quicktabs-tab-block-views-delta-pengumuman-block-1 active">Pengumuman</a>
                  </li>
                </ul>
              </div>
              <div id="quicktabs-container-tab_halaman_depan" class="quicktabs_main quicktabs-style-nostyle">
                <div id="quicktabs-tabpage-tab_halaman_depan-0" class="quicktabs-tabpage ">
                  <div id="block-views-berita-block-1" class="block block-views">
                    <div class="content">
                      <div class="view view-berita view-id-berita view-display-id-block_1 view-dom-id-7c10d92d4d710621699a3ac743f3af4f">
                        <div class="view-content">
                          <?php foreach ($berita as $key => $value) : ?>
                            <div class="views-row views-row-1 views-row-odd views-row-first">
                              <div class="views-field views-field-title"> <span class="field-content"><a href="/berita/view/<?php echo $value->link; ?>"><?php echo $value->judul; ?></a></span> </div>
                              <div class="views-field views-field-name"> <span class="views-label views-label-name">Ditulis oleh : </span> <span class="field-content"><span class="username"><?php echo $value->nama; ?></span></span>
                              </div>
                              <div class="views-field views-field-created"> <span class="views-label views-label-created">pada : </span> <span class="field-content"><?php echo date_format(date_create($value->tgl_pembuatan), "d M Y H:i"); ?></span> </div>
                              <div class="views-field views-field-totalcount"> <span class="views-label views-label-totalcount">Dilihat : </span> <span class="field-content"><?php echo $value->dibaca; ?> kali</span> </div>
                              <div class="views-field views-field-field-foto-berita">
                                <div class="field-content">
                                  <img style="width: 150px;" src="<?php echo base_url().'/'.$value->foto_thumbnail; ?>" alt="" />
                                </div>
                              </div>
                              <div class="views-field views-field-body">
                                <div class="field-content">
                                  <?php 
                                        $str = preg_replace('/<[^>]*>/', '', $value->isi_konten);
                                        echo implode(' ', array_slice(explode(' ', $str), 0, 60)).'...';
                                      ?>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="quicktabs-tabpage-tab_halaman_depan-1" class="quicktabs-tabpage quicktabs-hide">
                  <div id="block-views-pengumuman-block-1" class="block block-views">
                    <div class="content">
                      <div class="view view-pengumuman view-id-pengumuman view-display-id-block_1 view-dom-id-f097bab5eeeefb203d442bf14e2fca03">
                        <div class="view-content">
                          <?php foreach ($pengumuman as $key => $value) : ?>
                            <div class="views-row views-row-1 views-row-odd views-row-first">
                              <div id="node-5720" class="node node-pengumuman node-teaser clearfix">
                                <h2>
                                  <a href="/berita/view/<?php echo $value->link; ?>">
                                    <?php echo $value->judul; ?>                                      
                                  </a>
                                </h2>
                                <div class="submitted">
                                  Ditulis oleh <span class="username"><?php echo $value->nama; ?>
                                  </span> pada <?php echo date_format(date_create($value->tgl_pembuatan), "d M Y H:i"); ?>    
                                </div>
                              </div>
                              <div class="content">
                                <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                  <div class="field-items">
                                    <div class="field-item even">
                                      <p>
                                        <?php 
                                          $str = preg_replace('/<[^>]*>/', '', $value->isi_konten);
                                          echo implode(' ', array_slice(explode(' ', $str), 0, 30)).'...';
                                        ?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php if($value->file_pendukung != null) : ?>
                                  <div class="field field-name-field-file-pengumuman field-type-file field-label-above">
                                      <div class="field-label">File Pendukung:&nbsp;</div>
                                      <div class="field-items">
                                          <div class="field-item even">
                                              <span class="file">
                                                  <img class="file-icon" alt="PDF icon" title="application/pdf" src="<?php echo base_url() ?>/assets/images/pdf.png"> 
                                                  <a href="<?php echo base_url().'/'.$value->file_pendukung; ?>" type="application/pdf;" download><?php echo $value->judul; ?></a>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>