<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cine extends CI_Controller {

	private $limit = 4; //cine per page

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
 
         
        // load library
        $this->load->library(array('table','form_validation'));
         
        // load helper
        $this->load->helper('url');
         
        // load model
        $this->load->model('cineModel','',TRUE);
    }

	function index($offset = 0){
        // offset
        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);

        
        // load data
        $cines = $this->cineModel->get_paged_list($this->limit, $offset)->result();
         
        // generate pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url('cine/index/');
        $config['total_rows'] = $this->cineModel->count_all();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
        foreach ($cines as $cine){

            $data['cine_data'][] = $cine;
        }

        $this->load->view('cineList', $data);
    }

    function addCine(){

		$config['upload_path']   = './images/'; 
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
        $config['max_size']      = 100; 
        $config['max_width']     = 1024; 
        $config['max_height']    = 768;  
        $this->load->library('upload', $config);

		if ( $this->upload->do_upload('poster')) {
			$upload_data = $this->upload->data();

			// save data
			$cine = array('title' => $this->input->post('title'),
						'poster' => $upload_data['file_name'],
						'description' => $this->input->post('description') );
			$id = $this->cineModel->save($cine);
          
        } 

		
		// set user message
		//$message = '<div class="success">Add new cine successful!</div>';


        $this->index(0);
    }

    function delete($id)
	{
		// delete person
		$this->cineModel->delete($id);
		
		// redirect to person list page
		redirect('cine/index/','refresh');
	}

    // set empty default form field values
	function _set_fields()
	{
		$this->form_data->id = '';
		$this->form_data->title = '';
		$this->form_data->poster = '';
		$this->form_data->description = '';
	}
	
	// validation rules
	function _set_rules()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('poster', 'Poster', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
		$this->form_validation->set_message('required', '* required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

}


?>