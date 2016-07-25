<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cine extends CI_Controller {

	private $limit = 4; //cine per page

	private $upload_config = array('upload_path' => './images/', 
						        'allowed_types' => 'gif|jpg|jpeg|png', 
						        'max_size'      => 2000, 
						        'max_width'     => 2048, 
						        'max_height'    => 2048);

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        // load helper
        $this->load->helper('url');

        // load library
-       $this->load->library(array('form_validation'));
         
        // load model
        $this->load->model('cinemodel','',TRUE);
    }

	function index($offset = 0, $error_flag = 0)
	{
        // offset
        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);

        
        // load data
        $cines = $this->cinemodel->get_paged_list($this->limit, $offset)->result();
         
        // generate pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url('cine/index/');
        $config['total_rows'] = $this->cinemodel->count_all();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open']  = '<li class="active"><a href="#">'; 
        $config['cur_tag_close'] = $config['num_tag_close'] . '</a>';
        $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open']; 
        $config['next_tag_close']= $config['prev_tag_close']= $config['num_tag_close'];

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
        foreach ($cines as $cine){

            $data['cine_data'][] = $cine;
        }
        $data['form_error'] = $error_flag;
        $data['message'] = '';
        if ($error_flag == 2) { //bad file format
        	$data['message'] = 'Poster should be of type gif, jpg, jpeg or png with filesize not exceeding 2MB. Maximum width or height is 2048 pixels. ';
        }

        $this->load->view('header', $data);
        $this->load->view('cineList', $data);
        $this->load->view('footer', $data);
    }

    function addCine()
    {
    	$form_error = 1;
    	$this->_set_rules();

    	if ($this->form_validation->run() == TRUE) {
    		$form_error = 0;
	        $this->load->library('upload', $this->upload_config );

			if ( $this->upload->do_upload('poster')) {
				$upload_data = $this->upload->data();

				// save data
				$cine = array('title' => $this->input->post('title'),
							'poster' => $upload_data['file_name'],
							'description' => $this->input->post('description') );
				$id = $this->cinemodel->save($cine);
	          
	        } else {
	        	$form_error = 2;//bad file format
	        }
    	}
        $this->index(0, $form_error);
    }

    function delete($id)
	{
		// delete cine
		$this->cinemodel->delete($id);
		
		// redirect to cine list page
		redirect('cine/index/','refresh');
	}

	function update($id, $error_flag = 0)
	{
		// prefill form values
		$cine = $this->cinemodel->get_by_id($id)->row();
		$this->form_data->id = $cine->id;
		$this->form_data->title = $cine->title;
		$this->form_data->poster = $cine->poster;
		$this->form_data->description = $cine->description;
		
		// set common properties
		$data['message'] = '';
		$data['link_back'] = anchor('cine/index/','Back to list of cines',array('class'=>'back'));
		$data['form_error'] = $error_flag;

		// load view
        $this->load->view('header', $data);
		$this->load->view('cineEdit', $data);
        $this->load->view('footer', $data);
	}

	function updateCine()
	{
    	$form_error = 1;
    	$this->_set_rules();

    	if ($this->form_validation->run() == TRUE) {
    		$form_error = 0;
		    $this->load->library('upload', $this->upload_config );

			$id = $this->input->post('id');
			if ( $this->upload->do_upload('poster')) {
				$upload_data = $this->upload->data();
				$cine = array('title' => $this->input->post('title'),
							'poster' => $upload_data['file_name'],
							'description' => $this->input->post('description') );
		    } else {
				$cine = array('title' => $this->input->post('title'),
							'description' => $this->input->post('description') );
		    } 
		    $this->cinemodel->update($id,$cine);

			$data['link_back'] = anchor('cine/index/','Back to list of cines',array('class'=>'back'));
					
			// prefill form values
			$cine = $this->cinemodel->get_by_id($id)->row();
			$this->form_data->id = $cine->id;
			$this->form_data->title = $cine->title;
			$this->form_data->poster = $cine->poster;
			$this->form_data->description = $cine->description;

			redirect('cine/index/','refresh');
		} else {
			$this->update($this->input->post('id'), $form_error);
		}
	}

	
	// validation rules
	function _set_rules()
	{
   		$this->form_validation->set_rules('title', 'Title', 'trim|required');
    	$this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[120]');
		
	}

}
?>