<?php 
class users_model extends CI_Model 
{
	public function __Construct() 
	{ 
		parent::__Construct(); 
	} 

	public function getUsers($conditions = array(), $fields = '')
	{	
		if (count($conditions) > 0) 
			$this->db->where($conditions); 
			$this->db->where('user_gender', 9);
			$this->db->from('tbl_user'); 
			$this->db->order_by("tbl_user.user_id", "asc"); 

		if ($fields != '') 
			$this->db->select($fields); 
		else 
			$this->db->select('tbl_user.user_id,tbl_user.user_name,tbl_user.user_email');
			$result = $this->db->get(); 

		return $result; 
	}//End of getUsers Function 
}