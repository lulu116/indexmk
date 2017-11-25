<?php
class Indexcontent_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	//直接获取表信息
	public function get_menu_list()
	{
		$this->db->where('isdel', 0);
		$this->db->where('status', 1);
	    $this->db->order_by('id ASC');
	    $query = $this->db->get_where('menus');
	    return $query->result_array();
	}
	
	public function get_menu_content_list($menuid , $limit)
	{
		if(!$menuid){
			return '';
		}
		if(!$limit){
			$limit = 1;
		}
		$this->db->where('isdel', 0);
		$this->db->where('status', 1);
		$this->db->where('menuid', $menuid);
	    $this->db->order_by('ordernum DESC, id DESC');
	    $this->db->limit($limit);
	    $query = $this->db->get_where('menucontents');
	    return $query->result_array();
	}
	
}
