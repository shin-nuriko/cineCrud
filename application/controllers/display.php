<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Display extends CI_Controller {
		private $limit = 6; //number of cine to display

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        // load helper
        $this->load->helper('url');
         
        // load model
        $this->load->model('cinemodel','',TRUE);
    }

    function index()
    {
        $cines = $this->cinemodel->get_paged_list($this->limit)->result();
    	$data['json'] = json_encode($cines);

   		foreach ($cines as $cine){
            $data['cine_data'][] = $cine;
        }
    	$this->load->view('displayList', $data);
    }

    function getDisplayJson()
    {
    	header('Content-type: application/json');
		echo json_encode($this->cinemodel->get_paged_list($this->limit)->result());
    }

}
?>