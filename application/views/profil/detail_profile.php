<div class="box-enam middle">
    <div class="left-side">
        <div class="isi_left">
            <div class="style_left-side">
                <?php if (in_array($profil->id, ['1', '2', '3', '4'])) : ?>
                    <h1><?php echo $profil->nama; ?></h1>
                <?php else : ?>
                    <h1><?php echo $profil->jabatan; ?></h1>
                    <h4><?php echo $profil->nama; ?></h4>
                <?php endif; ?>
                <div class="region region-menu-kedua">
                </div>
            </div>
        </div>
    </div>
    <div class="detail contentsubmenu">
        <div class="detaildata" data="teks">
            <h4 style="color: white;">&nbsp;</h4>
            <div class="tabs"></div>
            <div class="region region-content">
                <div id="block-system-main" class="block block-system">
                    <div class="content">
                        <div class="view view-profil view-id-profil view-display-id-page view-dom-id-7d81f39d1785e5d46785f343441b2cf8">
                            <div class="view-content">
                                <div class="views-row views-row-3 views-row-odd">
                                    <?php if (!empty($profil->foto)) : ?>
                                        <div class="views-field views-field-field-image-profil">
                                            <div class="field-content"><img src="<?php echo base_url().'/'.$profil->foto; ?>" alt=""  style="height:400px;"></div>
                                        </div>
                                        <br/>
                                    <?php endif; ?>
                                    <?php echo $profil->isi; ?>
                                    <br/>
                                    <br/>
                                    <p><?php echo $profil->dibaca + 1; ?> kali dibaca</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>