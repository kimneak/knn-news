<div id="w-right">
    <?php foreach($cat as $data_cat) {
    ?>
    <div class="img-r">
        <a href="">
            <img src="<?php echo base_url('uploads_thumb/'.$data_cat->thumb_img); ?>" hspace="11" width="200" >
            <center>
                <span><?php echo $data_cat->title; ?></span>
            </center>
        </a>
    <div class="clear"></div>
    </div>
    <?php } ?>
    <div id="test"></div> 
    <div class="clear"></div>
    <div id="more">មានច្រើនទៀត...</div>
</div>
<div id="w-left"></div>
