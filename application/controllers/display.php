<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Display extends CI_Controller {
		private $limit = 4; //number of cine to display

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        // load helper
        $this->load->helper('url');
         
        // load model
        $this->load->model('cineModel','',TRUE);
    }

    function index(){
    	header('Content-type: application/json');
		echo json_encode($this->cineModel->get_paged_list($this->limit)->result() );
    }

}
?>