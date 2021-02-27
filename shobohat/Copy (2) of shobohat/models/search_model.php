<?php
class Search_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function gettitle($search=''){

		if(empty($search)) return FALSE; //nothing to search

		$this->db->like('title', $search);
		//$this->db->select('title');
		$query = $this->db->get('shobohat');
		 
		if($query->num_rows() > 0)

		return $query->result();

		return FALSE;
	}
}