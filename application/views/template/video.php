<div id="w-right">
    <?php 
    foreach($video as $data_video) {
    ?>
    <div class="related_vdo">
        <a href="<?php echo base_url(); ?>videos/<?php echo $data_video->gal_id; ?>">
            <div class="yt" style="width:200px;background-size:218px;height:120px;background-image:url(<?php echo base_url('uploads_thumb/'.$data_video->description); ?>);background-position:center;float:left;margin:10px;opacity:0.9;">
                <img src="<?php echo base_url('public/image/play.png'); ?>" style="margin-left:75px;margin-top:35px;" width="50">
            </div>
            <center><span><?php echo $data_video->title; ?></span></center>
        </a>
        <div class="clear"></div>
    </div>
    <?php } ?>
        <div id="test"></div> 
        <div class="clear"></div>
    <div id="more">មានច្រើនទៀត...</div>
</div>
<div id="w-left"></div>
