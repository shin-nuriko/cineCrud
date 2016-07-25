<?php

class Cinemodel extends CI_Model {
	private $tbl_cine = 'cine';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	// get number of cine in database
    function count_all(){
        return $this->db->count_all($this->tbl_cine);
    }
    // get cine with paging
    function get_paged_list($limit = 4, $offset = 0){
        $this->db->order_by('id','desc');
        return $this->db->get($this->tbl_cine, $limit, $offset);
    }
    // get cine by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_cine);
    }
    // add new cine
    function save($cine){
        $this->db->insert($this->tbl_cine, $cine);
        return $this->db->insert_id();
    }
    // update cine by id
    function update($id, $cine){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_cine, $cine);
    }
    // delete cine by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_cine);
    }
}

?>