<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
    }
	public function index()
	{
		$this->load->model('article_model');
		$this->load->view('template/header', array(
												'menu' => $this->article_model->menu()
												)

						);
		$this->load->view('template/home', array(	
												'modern_news' => $this->article_model->modern_news_model(),
												'hot_news' => $this->article_model->hot_news(),
												'knowledge' => $this->article_model->knowledge(),
												'video' => $this->article_model->videos(''),
												'video_tv' => $this->article_model->video_tv('')
												)
						);
		$this->load->view('template/footer');

	}

	public function category()
	{
		$this->load->model('article_model');
		$data['view'] = $this->article_model->category_model(end($this->uri->segments));
		$this->load->view('template/header', array(
												'menu' => $this->article_model->menu(),
												'parent_menu' => $this->article_model->sub_menu($this->uri->segment(2))
												)

						);
		$this->load->view('template/category',$data);
		$this->load->view('template/footer');

	}

	public function video()
	{

		$this->load->model('article_model');
		$data_video['video'] = $this->article_model->videos($this->uri->segment(3));
		$this->load->view('template/header', array(
												'menu' => $this->article_model->menu(),
												'parent_menu' => $this->article_model->sub_menu($this->uri->segment(2))
												)

						);
		$this->load->view('template/video', $data_video);
		$this->load->view('template/footer');
	}

	public function tv()
	{
		$this->load->model('article_model');
		$data_tv['tv'] = $this->article_model->video_tv($this->uri->segment(3));
		$this->load->view('template/header', array(
												'menu' => $this->article_model->menu(),
												'parent_menu' => $this->article_model->sub_menu($this->uri->segment(2))
												)

						);
		$this->load->view('template/tv', $data_tv);
		$this->load->view('template/footer');

	}
	public  function news()
	{
		$this->load->model('article_model');
		$this->load->view('template/header', array(
												'menu' => $this->article_model->menu(),
												'parent_menu' => $this->article_model->sub_menu($this->uri->segment(2))
												)

						);
		$this->load->view('template/detail', array(
													'detail' => $this->article_model->detail($this->uri->segment(4)),
													'related_news' => $this->article_model->related_news($this->uri->segment(3), $this->uri->segment(4))
													)

						);
		$this->load->view('template/footer');
	}

	public function more()
	{

		$this->load->model('article_model');
		if($_POST['type'] == 'category' || $_POST['type'] == 'news') {
			$data['more'] = $this->article_model->more_model($_POST['id'], intval($_POST['start']), $_POST['type'], $_POST['val']);
			foreach($data['more'] as $data_more) {
			?>
			<div class="img-r">
			    <a href="<?php echo base_url('news/'.$data_more->keywords.'/'.$data_more->parent_id.'/'.$data_more->art_id); ?>">
			    	<img src="<?php echo base_url('uploads_thumb/'.$data_more->thumb_img.''); ?>" hspace="11" width="200">
			    	<center><span><?php echo $data_more->title; ?></span></center>
			    </a>
			    <div class="clear"></div>
	    	</div> 
	<?php	}
		}
		else if($_POST['type'] == 'video') {
			$data['video'] = $this->article_model->more_model($_POST['id'], intval($_POST['start']), $_POST['type'], $_POST['val']);
			?>
			<?php 
			    foreach($data['video'] as $data_video) {
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
	<?php	
		}
		else if($_POST['type'] == 'tv') {
			$data['tv'] = $this->article_model->more_model($_POST['id'], intval($_POST['start']), $_POST['type'], $_POST['val']);
			?>
			<?php 
			    foreach($data['tv'] as $data_tv) {
				?>
			    <div class="related_vdo">
			        <a href="">
			            <div class="yt" style="width:200px;background-size:218px;height:120px;background-image:url(<?php echo base_url('uploads_thumb/'.$data_tv->description); ?>);background-position:center;float:left;margin:10px;opacity:0.9;">
			                <img src="<?php echo base_url('public/image/play.png'); ?>" style="margin-left:75px;margin-top:35px;" width="50">
			            </div>
			            <center><span><?php echo $data_tv->title; ?></span></center>
			        </a>
			        <div class="clear"></div>
			    </div>
    		<?php } ?>
	<?php 
		}	//========End if
	}

}//=================end class
