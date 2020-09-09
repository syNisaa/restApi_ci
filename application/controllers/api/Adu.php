<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Adu extends RestController 
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	 }
	
	//  mengambil data 
	 public function index_get($id = 0)
	 {
		 if(!empty($id)){
			 $data = $this->db->get_where("masyarakat", ['id' => $id])->row_array();
		 }else{
			 $data = $this->db->get("masyarakat")->result();
		 }
		 $this->response($data,200);
	 }
	
	//  insert
	 public function index_post()
	 {
		 $input = $this->input->post();
		 $this->db->insert('masyarakat',$input);
	  
		 $this->response(['successfully.'], 200);
	 } 
	
	//  update
	 public function index_put($id)
	 {
		 $input = $this->put();
		 $this->db->update('masyarakat', $input, array('id'=> $id));
	  
		 $this->response(['Item updated successfully.'], 200);
	 }
	  
	//  Delete
	 public function index_delete($id)
	 {
		 $this->db->delete('masyarakat', array('id'=>$id));
		
		 $this->response(['Deleted successfully.'], 200);
	 }
}
