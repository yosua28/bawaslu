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
            <h1><?php echo $detail->judul; ?></h1>
            <div class="tabs"></div>
            <div class="region region-content">
                <div id="block-system-main" class="block block-system">
                    <div class="content">
                        <div id="node-5525" class="node node-berita clearfix">
                            <div class="submitted">
                                Ditulis oleh <span class="username"><?php echo $detail->pembuat; ?>
                                    
                                </span> pada <?php echo date_format(date_create($detail->tgl_pembuatan), "d M Y H:i"); ?>
                            </div>
                            <div class="content">
                                <?php if($detail->foto_thumbnail != null) : ?>
                                    <div class="field field-name-field-foto-berita field-type-image field-label-hidden">
                                        <div class="field-items">
                                            <div class="field-item even">
                                                <img src="<?php echo base_url().'/'.$detail->foto_thumbnail; ?>" alt="" style="margin-bottom: 30px;">
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php echo $detail->isi_konten; ?>
                                <br/>
                                <?php if($detail->file_pendukung != null) : ?>
                                    <div class="field field-name-field-file-pengumuman field-type-file field-label-above">
                                        <div class="field-label">File Pendukung:&nbsp;</div>
                                        <div class="field-items">
                                            <div class="field-item even">
                                                <span class="file">
                                                    <img class="file-icon" alt="PDF icon" title="application/pdf" src="<?php echo base_url() ?>/assets/images/pdf.png"> 
                                                    <a href="<?php echo base_url().'/'.$detail->file_pendukung; ?>" type="application/pdf;" download><?php echo $detail->judul; ?></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <p><?php echo $detail->dibaca; ?> kali dibaca</p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>