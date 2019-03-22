<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getRecords()
	{
		$query=$this->db->get('mail');
		if ($query->num_rows()> 0)
		{
			return $query->result();
		}
	}
	 
    function form_insert($data){
// Inserting in Table(students) of Database(college)
$this->db->insert('mail', $data);
}

 function delete($id)
 {
  $this->db->where('id', $id);
  $this->db->delete('mail');
 }

   
}