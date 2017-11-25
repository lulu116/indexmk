<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
		ini_set('date.timezone','Asia/Shanghai');
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('string');
		$this->load->model('admin_model');
	}
	
	/**
	 * 分页模块
	 * @param string $segment 不带参数的当前页面地址
	 * @param string $urlext  参数拼接而成的字符串
	 * @param int 	 $pagenum 每页显示的条数
	 * @param int	 $page	  当前页数
	 */
	public function listPageInfo($segment, $urlext, $pagenum, $page)
     {
      	if($this->totalpage <= 1){
      		return '';
        }
         $pageinfo = '<ul class="pagination">';
         if($this->page > 1){
             $pageinfo .= '<li class="prev"><a href="'.$segment.$urlext.'&page='.($page - 1).'">← 上一页</a></li>';
         }else{
             $pageinfo .= '<li class="prev disabled"><a href="#">← 上一页</a></li>';
         }
          
         $pageinfo .= '<li class="active"><a href="#">每页'.$pagenum.'个，共'.$this->totalnum.'个，第' . $this->page . '/' . $this->totalpage . '页</a></li>';
          
         if($this->page < $this->totalpage){
             $pageinfo .= '<li class="next"><a href="'.$segment.$urlext.'&page='.($page + 1).'">下一页 →</a></li>';
         }else{
             $pageinfo .= '<li class="next disabled"><a href="#">下一页 → </a></li>';
         }
         $pageinfo .= '</ul>';
         
         return $pageinfo;
     }
     
}

/**
 * 管理员父类
 *
 */
class AdminController extends MY_Controller {
	public $topinfo = array();
	public $controlmenusA = array();
	public function __construct(){
		parent::__construct();
		$methodname = $this->uri->segment(1);
		$this->topinfo['username'] 		= $this->session->username;
		$this->topinfo['methodname'] 	= $methodname;
		//没有登录session跳转到登录页面
		if($methodname != 'login' && $methodname != 'loginsubmit' && (!$this->session->username || $this->session->login_success != 'login_success')){
			redirect(base_url() . 'login.do');
		}
		
		//根据用户ID获取用户角色及权限栏目
		$nowadmin = $this->admin_model->get_table_by_idA('admin', array($this->session->userid), 'id ASC', 1, 0);
		$nowadmin = $nowadmin[0];
		$this->topinfo['roles'] 	= $nowadmin['roles'];
		//当前的menuid
		$this->topinfo['menuid'] 	= $this->input->get('menuid') ?  $this->input->get('menuid') : $this->input->post('menuid');
		//整理有权限的栏目ID
		if($nowadmin['roles'] == 2){
			$mymenusA 		= array_filter(explode(',', $nowadmin['menus']));
			$mymenulistA 	= $this->admin_model->get_table_by_idA('menus', $mymenusA, 'id ASC');
			$mycontrolmenuA = array();
			if($mymenulistA){
				foreach ($mymenulistA as $mymenulist){
					$mycontrolmenuA[$mymenulist['id']] = $mymenulist;
				}
			}
			$this->controlmenusA = $this->topinfo['mycontrolmenu'] = $mycontrolmenuA;
		}else if($nowadmin['roles'] == 1){
			$mymenulistA 	= $this->admin_model->get_table_list('menus', 'id ASC');
			$mycontrolmenuA = array();
			if($mymenulistA){
				foreach ($mymenulistA as $mymenulist){
					$mycontrolmenuA[$mymenulist['id']] = $mymenulist;
				}
			}
			$this->controlmenusA = $this->topinfo['mycontrolmenu'] = $mycontrolmenuA;
		}
	}
}

