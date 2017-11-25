<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Client_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('string');
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
