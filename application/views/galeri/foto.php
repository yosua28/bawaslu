<style>
  .img-galeri {
  width: 187px;
  height: 125px;
  }
  .text-galeri {
  padding-right: 36px;
  text-align: justify;
  }
</style>
<div class="box-enam middle">
  <div class="left-side">
    <div class="isi_left">
      <div class="style_left-side">
      </div>
    </div>
  </div>
  <div class="detail contentsubmenu">
    <div class="detaildata" data="teks">
      <h1>Galeri Foto</h1>
      <div class="region region-menu-kedua"></div>
      <div class="tabs"></div>
      <div class="region region-content">
        <div id="block-system-main" class="block block-system">
          <div class="content">
            <div class="view view-galeri-foto view-id-galeri_foto view-display-id-page view-dom-id-3312fecd17de869ce9a290d44d79f6bd">
              <div class="view-content">
                <table class="views-view-grid cols-3">
                  <tbody>
                    <?php 
                      $html = "";
                      $jml = count($konten);
                      
                      if ($jml > 0) :
                      $mod = $jml % 3;
                      $a = 3 - $mod;
                      if ($a == 1) {
                          $html = '<td class="col-3 col-last" style="width: 33%;"></td>';
                      } 
                      
                      if ($a == 2) {
                          $html = '<td class="col-3 col-last" style="width: 33%;"></td>';
                          $html .= '<td class="col-3 col-last" style="width: 33%;"></td>';
                      } 
                      
                          foreach ($konten as $key => $value) : 
                              $num = $key+1;
                              $ket = implode(' ', array_slice(explode(' ', $value->judul), 0, 10)).'...'; 
                      ?>
                    <?php 
                      if (in_array($num, array(1,4,7,10,13))) :
                          if (in_array($num, array(1,2,3))) :
                      ?>
                    <tr class="row-1 row-first">
                      <?php 
                        elseif (in_array($num, array(4,5,6))) :
                        ?>  
                    <tr class="row-2">
                      <?php 
                        elseif (in_array($num, array(7,8,9))) :
                        ?>
                    <tr class="row-3">
                      <?php 
                        elseif (in_array($num, array(10,11,12))) :
                        ?>
                    <tr class="row-4">
                      <?php 
                        else :
                        ?>
                    <tr class="row-5 row-last">
                      <?php 
                        endif;
                        endif;
                        ?>
                      <?php 
                        if (in_array($num, array(1,4,7,10,13))) :
                        ?>
                      <td class="col-1 col-first" style="width: 33%;">
                        <div class="views-field views-field-field-upload-foto">
                          <div class="field-content">
                            <a href="/galeri/view/<?php echo $value->link; ?>">
                            <img class="img-galeri" src="<?php echo base_url().$value->foto ?>" alt="<?php echo $value->judul; ?>">
                            </a>
                          </div>
                        </div>
                        <div class="views-field views-field-title text-galeri">        
                          <span class="field-content">
                          <a href="/galeri/view/<?php echo $value->link; ?>"><?php echo $ket; ?></a>
                          </span>  
                        </div>
                      </td>
                      <?php 
                        elseif (in_array($num, array(2,5,8,11,14))) :
                        ?>
                      <td class="col-2" style="width: 33%;">
                        <div class="views-field views-field-field-upload-foto">
                          <div class="field-content">
                            <a href="/galeri/view/<?php echo $value->link; ?>">
                            <img class="img-galeri" src="<?php echo base_url().$value->foto ?>" alt="<?php echo $value->judul; ?>">
                            </a>
                          </div>
                        </div>
                        <div class="views-field views-field-title text-galeri">        
                          <span class="field-content">
                          <a href="/galeri/view/<?php echo $value->link; ?>" ><?php echo $ket; ?></a>
                          </span>  
                        </div>
                      </td>
                      <?php 
                        else :
                        ?>
                      <td class="col-3 col-last" style="width: 33%;">
                        <div class="views-field views-field-field-upload-foto">
                          <div class="field-content">
                            <a href="/galeri/view/<?php echo $value->link; ?>">
                            <img class="img-galeri" src="<?php echo base_url().$value->foto ?>" alt="<?php echo $value->judul; ?>">
                            </a>
                          </div>
                        </div>
                        <div class="views-field views-field-title text-galeri">        
                          <span class="field-content">
                          <a href="/galeri/view/<?php echo $value->link; ?>"><?php echo $ket; ?></a>
                          </span>  
                        </div>
                      </td>
                      <?php 
                        endif;
                        ?>
                      <?php 
                        if ($num == $jml) {
                            echo $html;
                        }
                        ?>
                      <?php 
                        if (in_array($num, array(3,6,9,12,15))) :
                        ?>
                    </tr>
                    <?php 
                      endif;
                      ?>
                    <?php 
                      endforeach;
                      else:
                      ?>
                        <p>Galeri Belum Tersedia</p>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <h2 class="element-invisible">Halaman</h2>
              <div class="item-list">
                <ul class="pager">
                  <?php 
                    if ($last_page > 1) :
                        if ($last_page > 1 && $page != 1) :
                    ?>
                  <li class="pager-first first"><a title="Ke halaman awal" href="/galeri/foto/1">« awal</a></li>
                  <?php 
                    endif;
                    ?>
                  <?php 
                    for ($x = 1; $x <= $last_page; $x++) {
                    ?>
                  <?php 
                    $def = "pager-item";
                    $next = "";
                    if ($x == 1)  {
                        $def = "pager-first";
                        $next = "first";
                    }
                    if ($x == $last_page)  {
                        $def = "pager-last";
                    }
                    if ($x == $page)  {
                        $def = "pager-current";
                        $next = "last";
                    }
                    
                    $class = $def." ".$next;
                    ?>
                  <li class="<?php echo $class; ?>">
                    <?php if ($page == $x) : ?>
                    <?php echo $x; ?>
                    <?php else : ?>
                    <a title="Ke halaman <?php echo $x; ?>" href="/galeri/foto/<?php echo $x; ?>"><?php echo $x; ?></a>
                    <?php endif; ?>
                  </li>
                  <?php 
                    }
                    ?>
                  <?php 
                    if ($last_page > 1 && $page != $last_page) :
                    ?>
                  <li class="pager-last last"><a title="Ke halaman akhir" href="/galeri/foto/<?php echo $last_page; ?>">akhir »</a></li>
                  <?php 
                    endif;
                    endif;
                    ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>