<?php

/**
*  
*/
class DB_model extends CI_Model{
	
	// function __construct()	{
	// 	$this->load->database();
	// }

	function getStudents(){
		//vraca tabelu student
		$query = $this->db->get('student');
		//vraca rezultat kao asocijativni niz tj. mapu (key => value)
		foreach ($query as $row) {
			$data[] = $row;
		}
		return $data;
	}

	function loginStudent($username, $password){
		   $this -> db -> from('student');
		   $this -> db -> where('IDStu', $username);
		   $this -> db -> where('Password', $password);
		   $this -> db -> limit(1);
		   $query = $this -> db -> get();

		    if($query -> num_rows() == 1){
		     return $query->result_array();
		   }
		   else {
		     return false;
		   }
	}        
}