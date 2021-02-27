<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('uri');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		//$this->load->model('search_model');
		$this->load->model('function_model');
		$this->output->cache(10);
		$params = array();
		$this->load->library('Arabic', $params);
		$this->arabic->load('ArDate');
		$this->arabic->setMode(1);
	}

	function index()
	{
		$this->form_validation->set_rules('search','search','required|trim|xss_clean|max_length[2055]');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');


		//$this->load->view('arabic_view', $data);
			

		if ($this->form_validation->run() == FALSE) // validation hasn'\t been passed
		{
			$data=array();
			$hdate = $this->arabic->date('l dS F Y h:i:s A', time());
			$data['hdate'] =$hdate;
			$data['extraHeadContent'] = '<script type="text/javascript" src="' . base_url() . 'js/function_search.js"></script>';
			$this->load->view('application/index', $data);
		}
		else // passed validation proceed to post success logic
		{
				

		}


	}
	function ajaxsearch()
	{
		$search = $this->input->post('search');
		//$description = $this->input->post('description');
		echo $this->function_model->getSearchResults($search);
	}

	function normal_search()
	{

		$search = $this->input->post('search');
		$data['search_results'] = $this->function_model->getSearchResults($search);
		$this->load->view('application/search', $data);
	}

	function result(){
		$data=array();
		$search = $this->input->post('search');
		echo $search;
		$hdate = $this->arabic->date('l dS F Y h:i:s A', time());
		$data['hdate'] =$hdate;
		
		$this->load->view('application/index', $data);
	}


	public function ajax(){

		$search = $this->input->post('term');

		echo $search;

		$data['response'] = 'false';
			
		$result = $this->search_model->gettitle($search); //Search DB



		if($result != FALSE)
		{
			$data['response'] = 'true'; //Set response
			$data['message'] = array(); //Create array
			foreach($result as $row)
			{
				//$data['message'][] = $row->title;
				$data['message'][] = array('label'=> $row->title, 'value'=> $row->id); //Add a row to array
			}
		}
			

		if(IS_AJAX)
		{
			echo json_encode($data); //echo json string if ajax request
			//echo $data;
		}

	}

}


//}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */