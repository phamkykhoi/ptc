<?php
	class Mindex extends CI_Model{
		protected $_contact = "tbl_contact";
		protected $_order 	= "tbl_order";
		protected $_product = "tbl_products";
		protected $_count 	= "tbl_count_search";
		protected $_referer	= "tbl_referer";
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function list_contact(){
			$this->db->order_by("con_id","DESC");
			$this->db->where("con_status","0");
			$this->db->limit(10);
			return $this->db->get($this->_contact)->result_array();
		}
		public function list_order(){
			$this->db->order_by("id","DESC");
			$this->db->limit(10);
			return $this->db->get($this->_order)->result_array();
		}
		public function list_proview(){
			$this->db->where('pro_view >= ' , 1);
			$this->db->order_by("pro_view","DESC");
			$this->db->limit(30);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_buy(){
			$this->db->where('pro_buy >= ' , 1);
			$this->db->order_by("pro_buy", "DESC");
			$this->db->limit(30);
			return $this->db->get($this->_product)->result_array();
		}
		public function list_search(){
			$this->db->order_by("count_total","DESC");
			$this->db->limit(30);
			return $this->db->get($this->_count)->result_array();
		}
		public function list_referer(){
			$this->db->order_by("re_count","DESC");
			$this->db->limit(30);
			return $this->db->get($this->_referer)->result_array();
		}

		public function totalProduct()
		{
			return $this->db->get('tbl_products')->num_rows();
		}

		public function totalProductHot()
		{
			$this->db->where('pro_hot', 1);	
			return $this->db->get('tbl_products')->num_rows();
		}

		public function totalCustomer()
		{
			$this->db->where('type', 'CUS');		
			return $this->db->get('tanphat_posts')->num_rows();
		}

		public function totalCategory()
		{		
			return $this->db->get('tbl_category')->num_rows();
		}
	}
