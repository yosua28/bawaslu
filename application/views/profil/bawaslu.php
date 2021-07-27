<div class="box-enam middle">
  <div class="left-side">
    <div class="isi_left">
      <div class="style_left-side">
        <h1>Profil Bawaslu</h1>
        <div class="region region-menu-kedua">
        </div>
      </div>
    </div>
  </div>
  <div class="detail contentsubmenu">
    <div class="detaildata" data="teks">
      <!-- <h4 style="color: white;">&nbsp;</h4> -->
      <div class="tabs"></div>
      <div class="region region-content">
        <div id="block-system-main" class="block block-system">
          <div class="content">
            <div class="view view-profil view-id-profil view-display-id-page view-dom-id-7d81f39d1785e5d46785f343441b2cf8">
              <div class="view-content">
                <?php 
                    foreach ($profil as $key => $value) : 
                      if(!empty($value->foto) || !empty($value->isi)) :
                ?>

                <div class="views-row views-row-<?php echo $key+1;?> views-row-odd views-row-first">
                  <div class="views-field views-field-title"> <span class="field-content"><a href="/profil/view/<?php echo $value->link; ?>"><?php echo $value->nama;?></a></span> </div>
                  <?php if ($value->foto != "" && !empty($value->foto)) : ?>
                    <div class="views-field views-field-field-image-profil">
                      <div class="field-content"><img src="<?php echo base_url().'/'.$value->foto; ?>" alt=""></div>
                    </div>
                  <?php endif; ?>

                  <div class="views-field views-field-body">
                    <div class="field-content">
                                <?php echo $value->isi; ?>
                    </div>
                  </div>
                </div><br/>
              <?php endif; endforeach; ?>
                <div class="views-row-3 views-row-odd">
                  <div class="views-field views-field-title">
                    <span class="field-content">Profil Bawaslu Kabupaten Timor Tengah Utara</span> 
                    <p>&nbsp;</p>
                  </div>
                  <?php 
                      foreach ($anggota as $key => $val) : 
                        if(!empty($val->foto) && !empty($val->nama)) :
                  ?>
                    <?php if(!empty($val->foto) && $val->foto != "") : ?>
                      <div class="views-row">
                        <div class="views-field views-field-field-image-profil">
                          <div class="field-content"><img src="<?php echo base_url().'/'.$val->foto; ?>" alt="<?php echo $val->jabatan;?>"></div>
                        </div>
                      <?php endif; ?>
                      <div class="views-field views-field-title"> <span class="field-content"><a href="/profil/view/<?php echo $val->link; ?>"><?php echo $val->jabatan;?></a></span> </div>
                      <div class="views-field views-field-body">
                        <div class="field-content">
                          <p><strong><a href="/profil/view/<?php echo $val->link; ?>"><?php echo $val->nama;?></a></strong></p>
                        </div>
                        
                      </div>
                    </div>
                  <?php endif; endforeach; ?>
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