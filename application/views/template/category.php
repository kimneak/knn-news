
<div id="w-right">
	<?php
		foreach($view as $article) {
	?>
	<div class="img-r">
	    <a href="<?php echo base_url('news/'.$article->keywords.'/'.$article->parent_id.'/'.$article->art_id); ?>">
	    	<img src="<?php echo base_url('uploads_thumb/'.$article->thumb_img.''); ?>" hspace="11" width="200">
	    	<center><span><?php echo $article->title; ?></span></center>
	    </a>
	    <div class="clear"></div>
    </div> 
    <?php } ?>
    <div id="test"></div> 
    <div class="clear"></div>
    <div id="more">មានច្រើនទៀត...</div>
</div>
<div id="w-left"></div>
