
	<div id="w-right">
		<div class="title-news"><span>ពត៌មានពេញនិយម</span></div>
		<?php
			foreach($modern_news as $data) {
		?>
			<div class="img-r">
	            <a href="<?php echo base_url('news/'.$data->keywords.'/'.$data->parent_id.'/'.$data->art_id); ?>">
	        	<img src="<?php echo base_url('uploads_thumb/'.$data->thumb_img); ?>" hspace="11" width="200">
	            	<center>
	            		<span><?php echo $data->title; ?></span><br>
	            	</center>
	            </a>
	        </div>
	    <?php } ?>

	    <!--=======================Knowledge=====================-->
	    <a href=""><div id="tip-topic"><div class="tip-topic"><span>បណ្តុំចំណេះដឹងថ្មីៗ >> គន្លឹះ , យុទ្ធសាស្រ្ត , សុខភាព , ផ្លូវភេទ , ស្នេហា ...</span></div><div id="arrow-right"></div></div></a>
		<?php
			foreach($knowledge as $data_knowledge) {
		?>
			<div class="img-r">
	            <a href="<?php echo base_url('news/'.$data_knowledge->keywords.'/'.$data_knowledge->parent_id.'/'.$data_knowledge->art_id); ?>">
	        	<img src="<?php echo base_url('uploads_thumb/'.$data_knowledge->thumb_img); ?>" hspace="11" width="200">
	            	<center>
	            		<span><?php echo $data_knowledge->title; ?></span><br>
	            	</center>
	            </a>
	        </div>
	    <?php } ?>

	    <!--===========================Collect Video================-->
	    <a href="#"><div id="tip-topic"><div class="tip-topic"><span>បណ្ដុំវីដេអូថ្មីៗ >>កម្សាន្ត , ចម្រៀង , ប្លែកៗ , ភូមិខ្មោច...</span></div><div id="arrow-right"></div></div></a>
		<?php
			foreach($video as $data_video) {
		?>
		<div class="related_vdo">
        	<a href="">
	        	<div class="yt" style="background-image:url(<?php echo base_url('uploads_thumb/'.$data_video->description); ?>);width:200px;background-size:218px;height:120px;background-position:center;float:left;margin:10px;opacity:0.9;">
	            	<img src="<?php echo base_url('public/image/play.png'); ?>" style="margin-left:75px;margin-top:35px;" width="50">
	            </div>
        		<center><span><?php echo $data_video->title; ?></span></center>
            </a>
        </div>
        <?php } ?>
        <!--=============================Video TV======================-->
        <a href=""><div id="tip-topic"><div class="tip-topic"><span>កម្មវិធីទូរទស្សន៍ថ្មីៗ >>វីដេអូព័ត៌មាន , ប្រដាល់ , ប្រគុំតន្រ្តី , កំប្លែង...</span></div><div id="arrow-right"></div></div></a>
        <?php
			foreach($video_tv as $data_video_tv) {
		?>
		<div class="related_vdo">
        	<a href="">
	        	<div class="yt" style="background-image:url(<?php echo base_url('uploads_thumb/'.$data_video_tv->description); ?>);width:200px;background-size:218px;height:120px;background-position:center;float:left;margin:10px;opacity:0.9;">
	            	<img src="<?php echo base_url('public/image/play.png'); ?>" style="margin-left:75px;margin-top:35px;" width="50">
	            </div>
        		<center><span><?php echo $data_video_tv->title; ?></span></center>
            </a>
        </div>
        <?php } ?>
	</div><!--///End wrap-right====-->
	<div id="w-left">
		<div class="title-news"><span>ព័ត៌មាន និងចំណេះដឹងថ្មីៗ</span></div>
		<?php
			$y=array(2014=>"២០១៤",2015=>"២០១៥",2016=>"២០១៦",2017=>"២០១៨",2018=>"២០១៨",2019=>"២០១៩",2020=>"២០២០",2021=>"២០២១");
			$m=array("jan"=>"មករា","Feb"=>"កុម្ភះ","Mar"=>"មីនា","Apr"=>"មេសា","May"=>"ឧសភា","Jun"=>"មិថុនា","Jul"=>"កក្កដា","Aug" =>"សីហា","Sep"=>"កញ្ញា","Oct"=>"តុលា","Nov" =>"វិច្ឆកា","Dec"=>"ធ្នូ");
			$d=array(1=>"១",2=>"២",3=>"៣",4=>"៤",5=>"៥",6=>"៦",7=>"៧",8=>"៨",9=>"៩",10=>"១០"
			,11=>"១១",12=>"១២",13=>"១៣",14=>"១៤",15=>"១៥",16=>"១៦",17=>"១៧",18=>"១៨",19=>"១៩"
			,20=>"២០",21=>"២១",22=>"២២",23=>"២៣","24"=>"២៤",25=>"២៥",26=>"២៦",27=>"២៧",28=>"២៨",29=>"២៩",30=>"៣០",31=>"៣១");
			$days=array("Mon"=>"ច័ន្ទ","Tue"=>"អង្គារ","Wed"=>"ពុធ","Thu"=>"ព្រហស្បតិ៍ ","Fri"=>"សុក្រ","Sat"=>"សៅរ៍","Sun"=>"អាទិត្យ");
			foreach($hot_news as $data_hot_news) {
				$date = date_create($data_hot_news->insert_date);
				$year= date_format($date,"Y");
				$month= date_format($date,"M");
				$day=date_format($date,"j");
				$week=date_format($date,"D");
				$now_year=$y[$year];
				$now_month= $m[$month];
				$now_day=$d[$day];
				$now_week=$days[$week];
				$time=date_format($date,"H:i");
		?>
		<a href="">
            <div class="img-l">
	        	<img src="uploads_thumb/<?php echo $data_hot_news->thumb_img; ?>" align="left" hspace="5"  width="100" height="70">
	            <span><?php echo $data_hot_news->title; ?></span>
        	</div>
        </a>
          <span style="color:#8A8A8A; font-size:11px;margin-left:20px;">
          ថ្ងៃ <?php echo $now_week.' ទី '.$now_day.' ខែ​ '.$now_month.' ឆ្នាំ '.$now_year.' ម៉ោង '.$time ; ?>
          </span>
            <div style="border-top:1px dashed #CCC;"></div>
        <?php } ?>
        <div class="clear"></div>
        <a href=""><div id="more_news"><center>ព័ត៌មានជាច្រើនទៀត</center></div></a>
	</div>
