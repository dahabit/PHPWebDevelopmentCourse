<?php
class Function_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
		$params = array();
		$this->load->library('Arabic', $params);
		$this->arabic->load('ArQuery');
		$this->arabic->setMode(0);
	}

	function getSearchResults ($search)
	{
			$keyword =$search;
            $keyword = str_replace('\"', '"', $keyword);  
            $this->arabic->setStrFields('title');            
			
            $strCondition = $this->arabic->getWhereCondition($keyword);
            //$strOrderBy   = $this->arabic->getOrderBy($keyword); 
            
			
			
		$q="SELECT title FROM shobohat WHERE $strCondition"; 
	//echo $q;
	//die();
		$query = $this->db->query($q);
		//$this->db->orderby('title');
		//$query = $this->db->get('shobohat');
		
			//return "ss";
			//die();
		if ($query->num_rows() > 0) {
			//print_r($query);
			//die();
			$output = '<ul>';
			foreach ($query->result() as $search_info) {
					$output .= "<li>". $search_info->title."</li>";				
			}
			$output .= '</ul>';
			return "sss";
			//die();
			return $output;
		} else {
			return 'notfounds';
		}
	}

}