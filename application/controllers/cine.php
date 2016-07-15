<?php
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
        $this->index();
    }

}


?>