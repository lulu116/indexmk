<?php
class Admin_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_admin_data($username)
	{
	    $this->db->where('username', $username);
	    $this->db->order_by('id', 'ASC');
	    $this->db->limit(1);
	    $query = $this->db->get_where('admin');
	    return $query->row_array();
	}
	
	
	//过滤不存在的字段
    public function check_table_field($tablename, $data)
    {
        if(!$data || !$tablename){
            return '';
        }
        $fields = $this->db->list_fields($tablename);
        foreach ($data as $filed=>$dv){
            if(!in_array($filed, $fields)){
                unset($data[$filed]);
            }
        }
        return $data;
    }
    
    //插入表信息
    public function set_table_data($tablename, $data)
    {
        $data   = $this->check_table_field($tablename, $data);
        $this->db->insert($tablename, $data);
        return $this->db->insert_id();
    }
    //更新表信息
	public function update_table_data($tablename, $id, $data)
	{
	    if(!$id){
	        return ;
	    }
	    $data   = $this->check_table_field($tablename, $data);
	    $this->db->where('id', $id);
	    return $this->db->update($tablename, $data);
	}
	//删除表信息
	public function del_table_by_idA($tablename, $idA)
	{
		if(!$idA){
			return '';
		}
	    $this->db->where_in('id', $idA);
	    return $this->db->delete($tablename);
	}
	//根据id获取表信息
	public function get_table_by_idA($tablename, $idA, $orderby = 'id DESC', $limit = 0, $start = 0)
	{
		if(!$idA){
			return '';
		}
	    $this->db->where_in('id', $idA);
	    $this->db->where('isdel', 0);
		if($limit){
	    	$this->db->limit($limit, $start);
	    }
	    $this->db->order_by($orderby);
	    $query = $this->db->get_where($tablename);
	    return $query->result_array();
	}
	
	//直接获取表信息
	public function get_table_list($tablename, $orderby = 'id DESC', $limit = 0, $start = 0)
	{
		if(!$tablename){
			return '';
		}
		$this->db->where('isdel', 0);
	    if($limit){
	    	$this->db->limit($limit, $start);
	    }
	    $this->db->order_by($orderby);
	    $query = $this->db->get_where($tablename);
	    return $query->result_array();
	}
	
	
 	//更新个人信息
	public function update_person_data($tablename, $id, $username, $data)
	{
	    if(!$username || !$id){
	        return ;
	    }
	    $data   = $this->check_table_field('admin', $data);
	    $this->db->where('id', $id);
	    $this->db->where('username', $username);
	    return $this->db->update('admin', $data);
	}
	
	
	
	
}
