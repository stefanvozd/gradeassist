<?php

class Demonstrator_model extends CI_Model{
	
//TODO mysql upiti specificni za demona
	function getObaveze(){
		$query = $this->db->query('SELECT IDOba, o.IDPre, Naziv, DatumVremePoc, DatumVremeKraj
                FROM obaveza o, predmet_student ps WHERE  IDStu LIKE "'.UserData::getUserID().'"
                AND o.IDPre = ps.IDPre AND Aktivna = TRUE AND Status LIKE "odslusan" AND Demonstrator = TRUE;');

		return $query->result();
	}
        
        function getNeaktivneObaveze(){
            $query = $this->db->query('SELECT IDOba, o.IDPre, Naziv, DatumVremePoc, DatumVremeKraj
            FROM obaveza o, predmet_student ps WHERE  IDStu LIKE "'.UserData::getUserID().'"
            AND o.IDPre = ps.IDPre AND Aktivna = FALSE AND Status LIKE "odslusan" AND Demonstrator = TRUE;');
            
            return $query->result();
        }
        //NV
        function getNeaktivniPredmeti() {
        $query = $this->db->query('SELECT o.IDPre, o.Naziv, o.IDOba, NULL as podaci
                FROM obaveza o, predmet_student ps 
                WHERE  IDStu LIKE "'.UserData::getUserID().'"
                AND o.IDPre = ps.IDPre 
                AND Aktivna = 0 
                AND Status LIKE "odslusan" 
                AND Demonstrator = 1;');
     ;
        return $query->result();
    }
        //NV
        function getPodaci($id) {
        $query = $this-> db -> query( 'SELECT s.BrojIndexa, s.Ime, s.Prezime, z.Status,z.IDZad, z.Poeni, o.DatumVremeKraj
                  FROM zadatak z, student s, obaveza o
                  WHERE z.IDStu = s.IDStu
                  AND o.IDOba = " '.$id.' " 
                  AND z.IDOba = o.IDOba ' 
                );
        return $query->result();
    }
    //NV & MS
    function getListaDemonstratora() {
        $array = array();
        foreach ($this->Zaposlen_model->predmetiZaZaposlenog() as $key => $value) {
           array_push($array, $value['IDPre']);
         } ;

        $arr="('".implode("', '", $array)."')";
        //var_dump($arr);
        $query = $this-> db -> query('SELECT s.BrojIndexa, s.Ime, s.Prezime, s.IDStu
                   FROM predmet_student ps, student s
                   WHERE ps.IDStu = s.IDStu
                   AND ps.IDPre IN '.$arr.'
                   AND ps.Demonstrator = 1');

        return $query->result();
    }
}