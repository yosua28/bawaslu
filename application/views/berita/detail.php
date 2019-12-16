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
                                <?php echo $detail->isi_konten; ?>
                            </div>
                            <ul class="links inline">
                                <li class="statistics_counter first last"><span><?php echo $detail->dibaca; ?> kali dibaca</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>