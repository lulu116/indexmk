<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menucontent extends AdminController {
	public function __construct(){
		parent::__construct();
		$this->load->model('menucontent_model');
		if(!$this->controlmenusA[$this->topinfo['menuid']]){
			echo '权限不太对，请联系管理员处理！';
			exit;
		}
	}
	
	public function index()
	{
		echo 'ok';
		exit;
		parent::__construct();
	}
	
	
	//栏目内容管理
	public function menuContentManage()
	{
		$this->load->view('top', $this->topinfo);
		$action 	= $this->input->get('action');
		$menucid 	= $this->input->get('menucid');
		$maininfo['menuinfo'] 		= $this->controlmenusA[$this->topinfo['menuid']];
		
		if($menucid && $action == 'editc'){
			$menucinfoA = $this->menucontent_model->get_content_by_id($this->topinfo['menuid'], $menucid);
//			var_dump($menucinfoA);
			if(!$menucinfoA['id']){
				echo '你要修改的信息不存在';
				exit;
			}
			$maininfo['menucinfoA'] = $menucinfoA;
			$this->load->view('menucedit', $maininfo);
		}else{
			$menuclistA 				= $this->menucontent_model->get_menuc_list($this->topinfo['menuid']);
			$maininfo['menuclist'] 		= $menuclistA;
			$this->load->view('menucontent', $maininfo);
		}
		
		$this->load->view('foot');
	}
	
	public function addMenuContentSubmit()
	{
		$menucdata 				= $this->input->post();
		$menucdata['createdt'] 	= time();
		$extinfoA['link']		= $menucdata['link'];
		$extinfoA['pic']		= $menucdata['pic'];
		$extinfoA['info']		= $menucdata['info'];
		unset($menucdata['link'], $menucdata['pic'], $menucdata['info']);
		$menucdata['menucontent']	= serialize($extinfoA);
		$menucdata['username']		= $this->session->username;
		if($menucdata['status'] != 1){
			$menucdata['status'] = 2;
		}
		if($menucdata['id']){
			$id = $menucdata['id'];
			unset($menucdata['id']);
			$this->menucontent_model->update_content_data($id, $menucdata['menuid'], $menucdata);
		} else {
			$id = $this->admin_model->set_table_data('menucontents', $menucdata);
		}
		
		if($id){
			echo 'success';
		}
		exit;
	}
	
	
	public function delMenuContentSubmit()
	{
		$id 	= $this->input->post('id');
		$menuid = $this->input->post('menuid');
		$menudata['isdel'] = 1;
		$this->menucontent_model->update_content_data($id, $menuid, $menudata);
		echo 'success';
		
	}
	
	public function indexPreview()
	{
		$this->load->view('indexprview');
		
	}
	
}
