<?php
class article_model extends CI_Model {
	function __construct() {
		$config['db']['hostname'] = "localhost";
		$config['db']['username'] = "root";
		$config['db']['password'] = "";
		$config['db']['database'] = "knn_db";
		$config['db']['dbdriver'] = "mysqli";
		$config['db']['dbprefix'] = "";
		$config['db']['pconnect'] = TRUE;
		$config['db']['db_debug'] = TRUE;
		$config['db']['cache_on'] = FALSE;
		$config['db']['cachedir'] = "";
		$config['db']['char_set'] = 'latin1';
		$config['db']['dbcollat'] = 'latin1_swedish_ci';
		$this->conn_db = $this->load->database($config['db'], TRUE);

	}

	function menu() {
		$view = $this->conn_db->query('select * from articles_tbl where parent_id = 0 and status = 1 and l_id = 38');
		return $view->result();
	}

	function sub_menu($id) {
		$view = $this->conn_db->query('select * from articles_tbl where parent_id = ? and status=1', array($id));
		return $view->result();
	}

	function category_model($id) {
		if($this->uri->segment(3) !="")
			$view = $this->conn_db->query('select * from articles_tbl where parent_id = ? and status = 1 order by art_id desc LIMIT 21', array($id));
		else
			$view = $this->conn_db->query('select * from articles_tbl where keywords = ? and parent_id != 0 and status=1 order by art_id desc  LIMIT 21', array($id));	
		return $view->result();

	}

	function hot_news(){
		$view = $this->conn_db->query('select * from articles_tbl where parent_id != 0 and keywords != "" and status = 1 ORDER BY art_id DESC limit 37');
		return $view->result();
	}

	function modern_news_model() {
		$view = $this->conn_db->query("SELECT * FROM (SELECT * FROM articles_tbl where parent_id != 0 and keywords != '' and status ORDER BY art_id DESC LIMIT 21) AS tmp ORDER BY RAND() LIMIT 21");
		return $view->result();
	}

	function knowledge() {
		$view = $this->conn_db->query("SELECT * FROM articles_tbl where parent_id != 0 and keywords=198 and status=1 ORDER BY art_id DESC LIMIT 15");
		return $view->result();
	}

	function videos($id) {
		if($this->uri->segment(3) != ""){
			$view = $this->conn_db->query("select * from galaries_tbl where a_id = ? order by gal_id desc LIMIT 21", array($id));
		}
		else
			$view = $this->conn_db->query("select * from galaries_tbl where status = 1 and type != 2 and type != 4  order by gal_id desc limit 12");
		return $view->result();
	}

	function detail($id) {
		$view = $this->conn_db->query("select * from articles_tbl where art_id= ?", array($id));
		return $view->row();
	}

	function video_tv($id) {
		if($this->uri->segment(3) != "")
			$view = $this->conn_db->query("select * from galaries_tbl where a_id = ? order by gal_id desc LIMIT 21", array($id));
		else
			$view = $this->conn_db->query("select * from galaries_tbl where status = 1 and type = 2 or type = 4 order by gal_id desc limit 12");
		return $view->result();
	}

	function play_videos($id) {
		$view = $this->conn_db->query("select * from galaries_tbl where gal_id = ?", array($id));
		return $view->row();
	}

	function more_model($id, $start, $type, $val) {
		if($type == 'category')
			if($val)
				$view = $this->conn_db->query('select * from articles_tbl where parent_id= ? and status = 1 order by art_id desc LIMIT ?, 12',array($id, $start));
			else
				$view = $this->conn_db->query('select * from articles_tbl where keywords = ? and parent_id != 0 and status = 1 order by art_id desc LIMIT ?, 12',array($id, $start));
		else if($type == 'video')
			if($val)
				$view = $this->conn_db->query("select * from galaries_tbl where a_id= ? order by gal_id desc LIMIT ?, 12", array($id, $start));
			else
				$view = $this->conn_db->query("select * from galaries_tbl where status = 1 and type != 2 and type != 4  order by gal_id desc limit ?, 12", array($start));
		else if($type == 'tv')
				if($val)
					$view = $this->conn_db->query('select * from galaries_tbl where a_id = ? order by gal_id desc LIMIT 21', array($id));
				else	
					$view = $this->conn_db->query("select * from galaries_tbl where status = 1 and type = 2 or type = 4 order by gal_id desc limit ?, 12", array($start));
		
		return $view->result();
	}

}
?>
