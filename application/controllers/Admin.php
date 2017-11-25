<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends AdminController {
	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		echo 'ok';
		exit;
		parent::__construct();
	}
	
	//登录
	public function adminLogin()
	{
		$this->session->login_success 	= '';
		$this->session->username 		= '';
		$this->load->view('login');
	}
	
	//个人设置可修改密码和联系方式
	public function editPersonInfo()
	{
		$admininfo['personinfo'] = $this->admin_model->get_admin_data($this->session->username);
//		var_dump($admininfo['personinfo']);
		$this->load->view('top', $this->topinfo);
		$this->load->view('personset', $admininfo);
		$this->load->view('foot');
	}
	
	//登录信息验证：先验证账号，后验证对应账号的密码 
	public function adminLoginSubmit()
	{
		$username 	= $this->input->post('username');
		$passwd 	= $this->input->post('passwd');
		if(!$username || !$passwd){
			echo 'no_data';
			exit;
		}
		//检查账号是否存在
		$admininfoA = $this->admin_model->get_admin_data($username);
		if(!$admininfoA['passwd']){
			echo 'invail_username'; 
		}elseif($admininfoA['passwd'] != md5($passwd)){
			echo 'invail_passwd';
		}elseif($admininfoA['passwd'] == md5($passwd)){
			//更新登录次数
			if($admininfoA['status'] == 1){
				$this->admin_model->update_table_data('admin', $admininfoA['id'], array('loginnum'=>(int)$admininfoA['loginnum'] + 1));
				$this->session->login_success 	= 'login_success';
				$this->session->username 		= $username;
				$this->session->userid 			= $admininfoA['id'];
				echo 'success';
			}else{
				echo 'stop';
			}
			
		}
		
	}
	
	//栏目管理
	public function adminMenuManage()
	{
		$menulistA 				= $this->admin_model->get_table_list('menus', 'id ASC');
		$maininfo['menuslist'] 	= $menulistA;
		
		//编辑人员信息
		$editlistA 				= $this->admin_model->get_table_list('admin', 'id ASC');
		$editors 				= array();
		foreach ($editlistA as $ek=>$edit){
			if($edit['status'] == 1){
				$editors[$edit['id']]['username'] 	= $edit['username'];
				$editors[$edit['id']]['menus'] 		= $edit['menus'];
			}
		}
		$maininfo['editorlist'] = $editors;
		
		$this->load->view('top', $this->topinfo);
		$this->load->view('menus', $maininfo);
		$this->load->view('foot');
		
	}
	
	public function addMenuSubmit()
	{
		$menudata = $this->input->post();
		if(is_array($menudata['editors'])){
			$menudata['editors'] = ',' . implode(',', $menudata['editors']) . ',';
		}else{
			$menudata['editors'] = ',';
		}
		if(is_array($menudata['menuitems'])){
			$menudata['menuitems'] = implode(',', $menudata['menuitems']);
		}else{
			$menudata['menuitems'] = '';
		}
		$menudata['menuitems'] = 'title,' . $menudata['menuitems'];
		if(!(int)$menudata['status']){
			$menudata['status'] = 2;
		}
		$menudata['createddt'] = date('Y-m-d H:i:s');
		$id = $this->admin_model->set_table_data('menus', $menudata);
		if($id){
			echo 'success';
		}
		
	}
	
	
	public function editMenuSubmit()
	{
		$menudata = $this->input->post();
		if(is_array($menudata['editors'])){
			$menudata['editors'] = ',' . implode(',', $menudata['editors']) . ',';
		}else{
			$menudata['editors'] = ',';
		}
		if(is_array($menudata['menuitems'])){
			$menudata['menuitems'] = implode(',', $menudata['menuitems']);
		}else{
			$menudata['menuitems'] = '';
		}
		$menudata['menuitems'] = 'title,' . $menudata['menuitems'];
		if(!(int)$menudata['status']){
			$menudata['status'] = 2;
		}
		$id = (int)$menudata['id'];
		unset($menudata['id']);
		$id = $this->admin_model->update_table_data('menus', $id, $menudata);
		if($id){
			echo 'success';
		}
		
	}
	
	public function delMenuSubmit()
	{
		$id = $this->input->post('menuid');
		$menudata['isdel'] = 1;
		$id = $this->admin_model->update_table_data('menus', $id, $menudata);
		if($id){
			echo 'success';
		}
		
	}
	
	
	
	//编辑人员管理
	public function adminEditorManage()
	{
		$menulistA 				= $this->admin_model->get_table_list('menus', 'id ASC');
		$maininfo['menuslist'] 	= $menulistA;
		
		$editlistA 				= $this->admin_model->get_table_list('admin', 'id ASC');
		$maininfo['editorlist'] = $editlistA;
		
		$this->load->view('top', $this->topinfo);
		$this->load->view('editor', $maininfo);
		$this->load->view('foot');
		
	}
	
	
	public function addEditorSubmit()
	{
		$editordata = $this->input->post();
		if(is_array($editordata['menus'])){
			$editordata['menus'] = ',' . implode(',', $editordata['menus']) . ',';
		}else{
			$editordata['menus'] = ',';
		}
		$editordata['passwd'] = md5($editordata['passwd']);
		if(!(int)$editordata['status']){
			$editordata['status'] = 2;
		}
		$editordata['createddt'] = date('Y-m-d H:i:s');
		$id = $this->admin_model->set_table_data('admin', $editordata);
		if($id){
			echo 'success';
		}
		
	}
	
	public function editEditorSubmit()
	{
		$editordata = $this->input->post();
		if(is_array($editordata['menus'])){
			$editordata['menus'] = ',' . implode(',', $editordata['menus']) . ',';
		}else{
			$editordata['menus'] = ',';
		}
		
		if($editordata['passwd']){
			$editordata['passwd'] = md5($editordata['passwd']);
		}else{
			unset($editordata['passwd']);
		}
		
		if(!(int)$editordata['status']){
			$editordata['status'] = 2;
		}
		$id = (int)$editordata['id'];
		unset($editordata['id']);
		$id = $this->admin_model->update_table_data('admin', $id, $editordata);
		if($id){
			echo 'success';
		}
		
	}
	
	public function delEditorSubmit()
	{
		$id = $this->input->post('editorid');
		$editordata['isdel'] = 1;
		$id = $this->admin_model->update_table_data('admin', $id, $editordata);
		if($id){
			echo 'success';
		}
		
	}
	
	public function editPersonInfoSubmit()
	{
		$editordata = $this->input->post();
		if($editordata['passwd']){
			$editordata['passwd'] = md5($editordata['passwd']);
		}else{
			unset($editordata['passwd']);
		}
		$id = $editordata['id'];
		unset($editordata['id']);
		$id = $this->admin_model->update_person_data('admin', $id, $this->session->username, $editordata);
		if($id){
			echo 'success';
		}
		
	}
	
	public function indexCreate()
	{
		$this->load->view('top', $this->topinfo);
		$this->load->view('indexcreate');
		$this->load->view('foot');
		
	}
	
	public function indexCreateSubmit()
	{
		$html = file_get_contents(base_url() . 'preview.do?menuid=' . $this->topinfo['menuid']);
		if(file_put_contents('index.html', $html)){
			echo 'success';
		}
		
	}
	
	
	
}
