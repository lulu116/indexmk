<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indexcontent extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('indexcontent_model');
	}
	
	public function index()
	{
		echo 'ok';
		exit;
		parent::__construct();
	}
	
	public function indexPreview()
	{
		//获取内容并填充到首页页面中
		$indexdata = array();
		
		//获取所有公开的栏目
		$menusA = $this->indexcontent_model->get_menu_list();
		foreach ($menusA as $menus){
			//根据栏目设置获取每个栏目添加的内容
			if($menus['id']){
				$indexdata['menu_' . $menus['id'] . '_data'] = $this->indexcontent_model->get_menu_content_list($menus['id'], $menus['nums']);
			}
		}
		$this->load->view('indexprview', $indexdata);
	}
	
}
