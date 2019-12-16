<div class="box-enam middle">
    <div class="left-side">
        <div class="isi_left">
            <div class="style_left-side">
                <h1><?php echo $data_kategori->nama; ?></h1>
                <div class="region region-menu-kedua">
                </div>
            </div>
        </div>
    </div>
    <div class="detail contentsubmenu">
        <div class="detaildata" data="teks">
            <h1 style="color: white;"><?php echo $data_kategori->nama; ?></h1>
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
                                          <a href="<?php echo base_url() ?>berita/view/<?php echo $value->link; ?>">
                                            <?php echo $value->judul; ?>
                                          </a>
                                        </span>  
                                      </div>
                                      <div class="views-field views-field-name">    
                                        <span class="views-label views-label-name">Penulis : </span>    
                                        <span class="field-content">
                                          <span class="username"><?php echo $value->nama; ?></span>
                                        </span>  
                                      </div>
                                      <div class="views-field views-field-created">    
                                        <span class="views-label views-label-created">pada : </span>    
                                        <span class="field-content"><?php echo date_format(date_create($value->tgl_pembuatan), "d M Y H:i"); ?></span> 
                                      </div>
                                      <div class="views-field views-field-totalcount">    
                                        <span class="views-label views-label-totalcount">Dilihat : </span>    
                                        <span class="field-content"><?php echo $value->dibaca; ?></span>  
                                      </div>
                                      <div class="views-field views-field-field-foto-berita">
                                          <div class="field-content">
                                            <img style="width: 200px; height: 100%;" src="<?php echo base_url().$value->foto_thumbnail; ?>" alt="">
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
        </div>
    </div>
    <div class="clear"></div>
</div>