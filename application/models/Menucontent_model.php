<?php
class Menucontent_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	//直接获取表信息
	public function get_menuc_list($menuid ,$orderby = 'ordernum DESC, id DESC', $limit = 0, $start = 0)
	{
		if(!$menuid){
			return '';
		}
		$this->db->where('isdel', 0);
		$this->db->where('menuid', $menuid);
	    if($limit){
	    	$this->db->limit($limit, $start);
	    }
	    $this->db->order_by($orderby);
	    $query = $this->db->get_where('menucontents');
	    return $query->result_array();
	}
	
	//获取栏目内容信息
	public function get_content_by_id($menuid, $id)
	{
		if(!$id || !$menuid){
			return '';
		}
	    $this->db->where('id', $id);
	    $this->db->where('menuid', $menuid);
	    $this->db->where('isdel', 0);
    	$this->db->limit(1);
	    $query = $this->db->get_where('menucontents');
	    return $query->row_array();
	}
	
	//更新栏目信息
	public function update_content_data($id, $menuid, $data)
	{
	    if(!$id || !$menuid){
	        return ;
	    }
	    $this->db->where('id', $id);
	    $this->db->where('menuid', $menuid);
	    return $this->db->update('menucontents', $data);
	}
	
	
	
}
