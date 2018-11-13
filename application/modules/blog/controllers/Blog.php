<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('blog_m');
	}
	function index() {

	}
	public function get_blogs($conditions=array(), $row=true){
		$blogs = $this->blog_m->get_blogs($conditions, $row);
		//echo $this->db->last_query(); exit();
		return $blogs;
	}
	public function get_comments($conditions=array(), $row=true){
		$comments = $this->blog_m->get_comments($conditions, $row);
	//echo $this->db->last_query(); exit();
		return $comments;
	}
	public function insert_blog($data){
		$blogs = $this->blog_m->insert_blog($data);
		//echo $this->db->last_query(); exit();
		return $blogs;
	}
	public function edit_blog($data,$conditions=array()){
		$blogs = $this->blog_m->edit_blog($data,$conditions);
		//echo $this->db->last_query(); exit();
		return $blogs;
	}
	public function deactive_blog($conditions=array(),$data){
		$blogs = $this->blog_m->edit_blog($conditions,$data);
		//echo $this->db->last_query(); exit();
		return $blogs;
	}
	public function delete_blog($conditions){
		$blogs = $this->blog_m->delete_blog($conditions);
		//echo $this->db->last_query(); exit();
		return $blogs;
	}
}
