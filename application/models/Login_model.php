<?php

class Login_model extends CI_Model{

	function login($userType, $id, $password){
		//demonstrator je poseban student zbog kojeg proveravamo i drugu tabelu
		if($userType === UserData::getDemonstratorType()){
			$userType = UserData::getStudentType();
			$this->db->from('predmet_student')->where('predmet_student.IDStu', $id)->where('Demonstrator', TRUE);
		}

		$idType = 'ID'.ucfirst(substr($userType, 0,3));//od 'student' dobijamo 'IDStu', od 'zaposlen' 'IDZap'
		 $this -> db -> from($userType)-> where($userType.'.'.$idType, $id)-> where('Password', $password)->group_by($userType.'.'.$idType);
		   $query = $this -> db -> get();

		    if($query -> num_rows() == 1){
		     return $query->result_array();
		   }
		   else {
		     return false;
		   }
	}
}