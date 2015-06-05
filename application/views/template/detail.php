<div id="w-right">
<div style="padding:10px;">
<?php
	$y=array(2014=>"២០១៤",2015=>"២០១៥",2016=>"២០១៦",2017=>"២០១៨",2018=>"២០១៨",2019=>"២០១៩",2020=>"២០២០",2021=>"២០២១");
	$m=array("jan"=>"មករា","Feb"=>"កុម្ភះ","Mar"=>"មីនា","Apr"=>"មេសា","May"=>"ឧសភា","Jun"=>"មិថុនា","Jul"=>"កក្កដា","Aug" =>"សីហា","Sep"=>"កញ្ញា","Oct"=>"តុលា","Nov" =>"វិច្ឆកា","Dec"=>"ធ្នូ");
	$d=array(1=>"១",2=>"២",3=>"៣",4=>"៤",5=>"៥",6=>"៦",7=>"៧",8=>"៨",9=>"៩",10=>"១០"
		,11=>"១១",12=>"១២",13=>"១៣",14=>"១៤",15=>"១៥",16=>"១៦",17=>"១៧",18=>"១៨",19=>"១៩"
		,20=>"២០",21=>"២១",22=>"២២",23=>"២៣","24"=>"២៤",25=>"២៥",26=>"២៦",27=>"២៧",28=>"២៨",29=>"២៩",30=>"៣០",31=>"៣១");
	$days=array("Mon"=>"ច័ន្ទ","Tue"=>"អង្គារ","Wed"=>"ពុធ","Thu"=>"ព្រហស្បតិ៍ ","Fri"=>"សុក្រ","Sat"=>"សៅរ៍","Sun"=>"អាទិត្យ");
	$date = date_create($detail->insert_date);
	$year = date_format($date,"Y");
	$month = date_format($date,"M");
	$day = date_format($date,"j");
	$now_week = date_format($date,"D");
	$week=date_format($date,"D");
	$now_year=$y[$year];
	$now_month= $m[$month];
	$now_day=$d[$day];
	$now_week=$days[$week];

	echo '<h1 style="font-size:18px;">'.$detail->title.'</h1>';
	echo '<div class="post_date">
				<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true">
				
				</div>
				<p>ចុះផ្សាយថ្ងៃ '.$now_week.' ទី '.$now_day.' ខែ​ '.$now_month.' ឆ្នាំ '.$now_year.'</p>
		 </div>';

	echo $detail->description."<br>";
	
?>
</div>
<div class="title-news"><span>អត្ថបទចាប់អារម្មណ៍ផ្សេងៗទៀត</span></div>
<?php
	foreach($related_news as $data) {
	?>
	<a href="<?php echo base_url('news/'.$data->keywords.'/'.$data->parent_id.'/'.$data->art_id); ?>">	
        <div id="related_news">
        	<img src="<?php echo base_url("uploads_thumb/".$data->thumb_img); ?>" hspace="11" width="86" align="left" height="65">
          		<span><?php echo $data->title; ?></span>
        </div>
    </a>
<?php	}
?>
<div id="test"></div>
<div class="clear"></div>
<div id="more">មានច្រើនទៀត...</div>
</div>
<div id="w-left"></div>