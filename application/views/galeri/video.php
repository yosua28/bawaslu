<style>
  .img-galeri {
  width: 187px;
  height: 125px;
  }
  .text-galeri {
  padding-right: 36px;
  text-align: justify;
  }
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 100; /* Sit on top */
    padding-bottom: : 100px; /* Location of the box */
    padding-top: 50px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  /* Modal Content */
  .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }

  /* The Close Button */
  .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
  .play-video {
    cursor: pointer;
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
      <h1>Galeri Video</h1>
      <div class="tabs"></div>
      <div class="region region-content">
        <div id="block-system-main" class="block block-system">
          <div class="content">
            <div class="view view-galeri-video view-id-galeri_video view-display-id-page view-dom-id-c9ea5ba24dfb345906ff28c812340522">
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
                              $ket = $value->judul; 
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
                      <td class="col-1 col-first play-video" style="width: 33%;" data-yid="<?php echo $value->youtube_id; ?>">
                        <div class="views-field views-field-field-upload-foto">
                          <div class="field-content">
                            <img class="img-galeri" src="https://img.youtube.com/vi/<?php echo $value->youtube_id; ?>/1.jpg" alt="<?php echo $value->judul; ?>">
                          </div>
                        </div>
                        <div class="views-field views-field-title text-galeri">        
                          <span class="field-content">
                          <?php echo $ket; ?>
                          </span>  
                        </div>
                      </td>
                      <?php 
                        elseif (in_array($num, array(2,5,8,11,14))) :
                        ?>
                      <td class="col-2 play-video" style="width: 33%;" data-yid="<?php echo $value->youtube_id; ?>">
                        <div class="views-field views-field-field-upload-foto">
                          <div class="field-content">
                            <img class="img-galeri" src="https://img.youtube.com/vi/<?php echo $value->youtube_id; ?>/1.jpg" alt="<?php echo $value->judul; ?>">
                          </div>
                        </div>
                        <div class="views-field views-field-title text-galeri">        
                          <span class="field-content">
                          <?php echo $ket; ?>
                          </span>  
                        </div>
                      </td>
                      <?php 
                        else :
                        ?>
                      <td class="col-3 col-last play-video" style="width: 33%;" data-yid="<?php echo $value->youtube_id; ?>">
                        <div class="views-field views-field-field-upload-foto">
                          <div class="field-content">
                            <img class="img-galeri" src="https://img.youtube.com/vi/<?php echo $value->youtube_id; ?>/1.jpg" alt="<?php echo $value->judul; ?>">
                          </div>
                        </div>
                        <div class="views-field views-field-title text-galeri">        
                          <span class="field-content">
                          <?php echo $ket; ?>
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
                        <p>Video Belum Tersedia</p>
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
                  <li class="pager-first first"><a title="Ke halaman awal" href="/galeri/video/1">« awal</a></li>
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
                    <a title="Ke halaman <?php echo $x; ?>" href="/galeri/video/<?php echo $x; ?>"><?php echo $x; ?></a>
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

<div id="myModal" class="modal">
  <div class="modal-content" style="width: 680px;height: 430px;">
    <span class="close">&times;</span>
     <div class="modal-body">
        <iframe id="youtube_video" width="640" height="360" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $(".play-video").click(function(){
      var yid = $(this).data('yid');
      if (yid != "") {
        var url = "https://www.youtube.com/embed/"+yid
        $('#youtube_video').attr('src', url)
        $('.modal').css("display", "block");
      }
    });
    $(".close").click(function(){
      $('#youtube_video').attr('src', "")
      $('.modal').css("display", "none");
    });

  });
</script>