<div class="box-enam middle">
  <div class="detail contentsubmenu">
    <div class="detaildata" data="teks">
      <h1><?php echo $detail->judul; ?></h1>
      <div class="region region-menu-kedua"></div>
      <div class="tabs"></div>
      <div class="region region-content">
        <div id="block-system-main" class="block block-system">
          <div class="content">
            <div id="node-6708" class="node node-galeri-foto clearfix">
              <div class="content">
                <div class="field field-name-field-upload-foto field-type-image field-label-hidden">
                  <div class="field-items">
                    <div class="field-item even">
                      <a href="<?php echo base_url().$detail->foto ?>" title="<?php echo $detail->judul; ?>" class="colorbox init-colorbox-processed cboxElement" data-colorbox-gallery="gallery-node-6708-O0J61rY6mso" data-cbox-img-attrs="{&quot;title&quot;: &quot;&quot;, &quot;alt&quot;: &quot;&quot;}">
                        <img src="<?php echo base_url().$detail->foto ?>" alt="" title="" style="width: 669px; height: 100%">
                      </a>
                    </div>

                  <?php 
                    $cl = "odd";
                    foreach ($fotolist as $key => $value) {
                  ?>

                    <div class="field-item <?php echo $cl; ?>">
                      <a href="<?php echo base_url().$value->foto; ?>" class="colorbox init-colorbox-processed cboxElement" data-colorbox-gallery="gallery-node-6708-O0J61rY6mso" data-cbox-img-attrs="{&quot;title&quot;: &quot;&quot;, &quot;alt&quot;: &quot;&quot;}">
                        <img src="<?php echo base_url().$value->foto; ?>" alt="" title="" style="width: 187px; height: 125px;">
                      </a>
                    </div>
                  <?php 
                      $cl = "even";
                    }
                  ?>
                  </div>
                </div>
                <div class="field field-name-field-deskripsi field-type-text-long field-label-hidden">
                  <div class="field-items">
                    <div class="field-item even">
                      <?php echo $detail->keterangan_foto; ?>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="links inline">
                <br/>
                <li class="statistics_counter first last"><span><?php echo ($detail->dibaca+1); ?> kali dibaca</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>