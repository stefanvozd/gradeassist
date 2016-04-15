<?php

class User_model extends CI_Model {



    function getObaveza($id) {
        $query = $this->db->query('SELECT * FROM obaveza WHERE IDOba LIKE "'."$id".'"');
        return $query->first_row();
        
    }
//Nikola Maksimovic
    function getArhiva() {
        $query = $this->db->query('SELECT p.IDPre, o.Naziv, o.IDOba, o.Tip, o.DatumVremeKraj FROM obaveza o JOIN predmet p ON o.IDPre = p.IDPre JOIN predmet_student ps ON ps.IDStu = "'.UserData::getUserID().'" AND ps.IDPre = o.IDPre WHERE o.Arhiva = 1 AND ps.Status = "odslusan";');
	return $query->result();
    }
    //Nikola Maksimovic
    function getArhivaForZap() {
        $query = $this->db->query('SELECT p.IDPre, o.Naziv, o.IDOba, o.Tip, o.DatumVremeKraj FROM obaveza o JOIN predmet p ON o.IDPre = p.IDPre JOIN predmet_zaposlen pz ON pz.IDZap = "'.UserData::getUserID().'" AND pz.IDPre = o.IDPre WHERE o.Arhiva = 1;');
	return $query->result();
    }
    //Nikola Maksimovic
    function setNeaktivnaObaveza($id){
        $q = $this->db->query('UPDATE obaveza SET Aktivna = FALSE'
                . ' WHERE IDOba = '.$id);
        return 1;
    }
}
