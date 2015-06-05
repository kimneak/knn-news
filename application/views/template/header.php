<html>
<title></title>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/default/css/style.css'); ?>"/>
<script type="text/javascript" src="<?php echo base_url('public/default/js/jquery.min.js'); ?>"></script>
<script>
<?php
	if($this->uri->segment(2)){
		$id = $this->uri->segment(2);
		$val = 0;
	}
	if($this->uri->segment(3)){
		$id = $this->uri->segment(3);
		$val = true;
	}
	
?>
$(function(){
	$more=$('#more');
    $start=21; 
    $text_default=$more.text();
    $more.click(function(){
        if(!$(this).hasClass('clicked')){
            $(this).addClass('clicked').html('កំពុងដំណើរការ...');
            $go_to=$('#test:last').offset().bottom;
            $.post(
                '<?php echo site_url("pages/more/"); ?>',
                {start: $start, id: <?php echo $id; ?>, type: '<?php echo $this->uri->segment(1); ?>', val: <?php echo $val ?> },
                function(data){
                    if(data){
                        $('#test').append(data);
                        $more.removeClass('clicked').text($text_default);
                        $('html, body').animate({scrollTop:$go_to},800);
                        $start+=12;
                    }else{
                        $more.hide();
                    }
                }
            );
        }
    });
});
</script>
<?php
	$y=array(2014=>"២០១៤",2015=>"២០១៥",2016=>"២០១៦",2017=>"២០១៨",2018=>"២០១៨",2019=>"២០១៩",2020=>"២០២០",2021=>"២០២១");
	$m=array("jan"=>"មករា","Feb"=>"កុម្ភះ","Mar"=>"មីនា","Apr"=>"មេសា","May"=>"ឧសភា","Jun"=>"មិថុនា","Jul"=>"កក្កដា","Aug" =>"សីហា","Sep"=>"កញ្ញា","Oct"=>"តុលា","Nov" =>"វិច្ឆកា","Dec"=>"ធ្នូ");
	$d=array(1=>"១",2=>"២",3=>"៣",4=>"៤",5=>"៥",6=>"៦",7=>"៧",8=>"៨",9=>"៩",10=>"១០"
	,11=>"១១",12=>"១២",13=>"១៣",14=>"១៤",15=>"១៥",16=>"១៦",17=>"១៧",18=>"១៨",19=>"១៩"
	,20=>"២០",21=>"២១",22=>"២២",23=>"២៣","24"=>"២៤",25=>"២៥",26=>"២៦",27=>"២៧",28=>"២៨",29=>"២៩",30=>"៣០",31=>"៣១");
	$days=array("Mon"=>"ច័ន្ទ","Tue"=>"អង្គារ","Wed"=>"ពុធ","Thu"=>"ព្រហស្បតិ៍ ","Fri"=>"សុក្រ","Sat"=>"សៅរ៍","Sun"=>"អាទិត្យ");
?>
</head>
<body>
<div id="head">
	<div id="sub-head"><a href="http://localhost/knn-news"><img src="<?php echo base_url('public/image/Home.png'); ?>" height="32" width="120" align="left"></a>
	    <div id="menu">
		    <ul>
		    	<?php
		    		foreach($menu as $category) {
		    			if($category->art_id == 197) {
		    				$href = base_url('video/'.$category->art_id);
		    			}elseif ($category->art_id == 199) {
		    				$href = base_url('tv/'.$category->art_id);
		    			}else{
		    				$href = base_url('category/'.$category->art_id);
		    			}
		    	?>
		    	<li><a <?php  echo ($this->uri->segment(2) == $category->art_id)?'class="current"':''; ?> href='<?php echo $href; ?>'/><?php echo $category->title; ?></a></li>
				<?php } ?>
			    <li><input type="submit" value="Search" name="btn_search" id="btn-search"></li>
			    <li><input type="text" placeholder="Search here..." id="search" size="30" name="txtsearch"></li>
		    </ul>
	    </div>
    </div>
    <div style="clear:both;"></div>
</div>
<div id="wrap">
<!--===================================sub-menu==============-->
<?php
	if($this->uri->segment(2) != "") {
?>
<div id="sub_menu">
<ul>
	<?php
		foreach($parent_menu as $data_sub_menu) {
			$current='';
			$url = '';
			if($data_sub_menu->art_id==$this->uri->segment(3)) {
				$current='padding:7px 12px;background:#7f00a9;';
			}
			else {
				$current='';
				}
			if($this->uri->segment(1) == 'category') {
				$url = 'category';
			}
			else if($this->uri->segment(1) == 'video') {
				$url = 'video';
			}
			else if($this->uri->segment(1) == 'tv') {
				$url = 'tv';
			}
	?>
	<li style="<?php echo $current; ?>">
        <a href="<?php echo base_url($url.'/'.$this->uri->segment(2).'/'.$data_sub_menu->art_id);?>"><?php echo $data_sub_menu->title; ?></a>
    </li>
    <?php } ?>
</ul>
</div>
<?php } ?>
<div style="clear:both;"></div>
<center>
	<div style="background:#999;padding-bottom:3px;">
         <a href="http://www.sbbanner.com/newmedia/index.html?vendorid=1365&vendortype=2&lang=KH" target="_blank">
         	<img src="http://sbbanner.com/newmedia/kh/media/khSBnG_1000x100.gif">
         </a>
    </div>
</center>