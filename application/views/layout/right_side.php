<?php 
  //get video
  $this->db->select('video.*');
  $this->db->from('video');
  $where = array(
      'video.is_delete =' => 0,
      'video.is_active =' => 1
    );
  $this->db->where($where);
  $this->db->limit(5, 0);
  $this->db->order_by('video.id','DESC');
  $video = $this->db->get();

  //get agenda
  $this->db->select('agenda.*');
  $this->db->from('agenda');
  $whereAgenda = array(
      'agenda.is_delete =' => 0,
      'agenda.is_active =' => 1
    );
  $this->db->where($whereAgenda);
  $this->db->limit(5, 0);
  $this->db->order_by('agenda.id','DESC');
  $agenda = $this->db->get();

  function tgl_indo($tanggal){
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

<style>
  .img-galeri {
  width: 187px;
  height: 125px;
  }
  .text-galeri {
  padding-right: 36px;
  text-align: justify;
  }
  .modal-right {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
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
  .play-video-right {
    cursor: pointer;
  }
  .img-right {
    width: 275px;
    height: 150px;
  }
</style>

<div class="box-empat right">
  <div class="region region-sidebar-kanan">
    <div id="block-views-agenda-bawaslu-block" class="block block-views">
      <h2><a href="<?php echo base_url() ?>agenda/index">Agenda Bawaslu</a></h2>
      <div class="content">
        <div class="view view-agenda-bawaslu view-id-agenda_bawaslu view-display-id-block view-dom-id-d71e56bd151f537ef47081114150fad4">
          <div class="view-content">
            <div class="skin-default">
              <div id="views_slideshow_cycle_main_agenda_bawaslu-block_1" class="views_slideshow_cycle_main views_slideshow_main">
                <div id="views_slideshow_cycle_teaser_section_agenda_bawaslu-block_1" class="views-slideshow-cycle-main-frame views_slideshow_cycle_teaser_section">
                  <?php 
                    if ($agenda->num_rows() > 0) {
                      foreach ($agenda->result() as $row) {
                  ?>
                  <div id="views_slideshow_cycle_div_agenda_bawaslu-block_1_0" class="views-slideshow-cycle-main-frame-row views_slideshow_cycle_slide views_slideshow_slide views-row-1 views-row-first views-row-odd">
                    <div class="views-slideshow-cycle-main-frame-row-item views-row views-row-0 views-row-odd">
                      <div class="views-field views-field-title"> <span class="field-content"><a href="<?php echo base_url() ?>agenda/view/<?php echo $row->link; ?>"><?php echo $row->nama_kegiatan; ?></a></span> </div>
                      <div class="views-field views-field-field-waktu">
                        <strong>Waktu : </strong><?php echo tgl_indo(date("Y-m-d", strtotime($row->waktu_mulai))) . " Jam " . date("H:m", strtotime($row->waktu_mulai)); ?><br/>
                        <strong>Tempat : </strong><?php echo $row->tempat; ?>
                      </div>
                    </div>
                  </div>
                  <?php
                      }
                    } else {
                  ?>
                    <strong>Agenda tidak tersedia</strong>
                  <?php 
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php 
      if ($video->num_rows() > 0) {
        foreach ($video->result() as $rr) {


    ?>
          <div id="block-views-galeri-video-block-1" class="block block-views">
            <h2><?php echo $rr->judul;?></h2>
            <div class="content">
              <div class="view view-galeri-video view-id-galeri_video view-display-id-block_1 view-dom-id-5c42fce5695d387e635737d4930ae84b">
                <div class="view-content">
                  <table class="views-view-grid cols-3">
                    <tbody>
                      <tr class="row-1 row-first row-last">
                        <td class="col-1 col-first play-video-right" data-yid="<?php echo $rr->youtube_id; ?>">
                          <div class="views-field views-field-field-video">
                            <div class="field-content">
                              <img class="img-right" src="https://img.youtube.com/vi/<?php echo $rr->youtube_id; ?>/1.jpg" alt="<?php echo $rr->judul;?>" />
                            </div>
                          </div>
                        </td>
                        <td class="col-2">
                        </td>
                        <td class="col-3 col-last">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    <?php 
        }
      }
    ?>
  <div class="clear"></div>
</div>

<div id="myModalVid" class="modal-right">
  <div class="modal-content" style="width: 680px;height: 430px;">
    <span class="close">&times;</span>
     <div class="modal-body">
        <iframe id="youtube_video_right" width="640" height="360" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $(".play-video-right").click(function(){
      var yid = $(this).data('yid');
      if (yid != "") {
        var url = "https://www.youtube.com/embed/"+yid
        $('#youtube_video_right').attr('src', url)
        $('.modal-right').css("display", "block");
      }
    });
    $(".close").click(function(){
      $('#youtube_video_right').attr('src', "")
      $('.modal-right').css("display", "none");
    });

  });
</script>