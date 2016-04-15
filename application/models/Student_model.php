<?php

class Student_model extends CI_Model{
    //vraca obaveze za Studenta
    function getObaveze($aktivna = 1, $tip = '%'){
        if(!$aktivna){
            $zadatak = "JOIN zadatak z ON z.IDOba = o.IDOba AND ps.IDStu = z.IDStu ";
            $poeni = ', z.Poeni, z.Komentar, z.Status, z.Arhiviran ';
        }
    	$query = $this->db->query('SELECT o.IDOba, o.IDPre, Aktivna, Naziv, Tip, DatumVremePoc, DatumVremeKraj '.@$poeni
            .' FROM obaveza o '
            .' JOIN predmet_student ps ON ps.IDStu LIKE "'.UserData::getUserID().'" AND ps.Status LIKE "slusa" and ps.IDPre = o.IDPre '
            .@$zadatak
            .' WHERE Aktivna = '.$aktivna.' AND Tip LIKE "'.$tip.'"'
            .' GROUP BY o.IDOba');
    	return $query->result();
    }
    
    function getImePredmeta($IDPre) {
        
        $query = $this->db->query('SELECT IDPre FROM predmet_zaposlen WHERE IDZap LIKE "'.$IDPre.'"');
        
        return $query->first_row();
    }

    //SD
    function getObaveza($id) {
        $query = $this->db->query('SELECT * FROM obaveza WHERE IDOba LIKE "' . "$id" . '"');
        return $query->first_row();
    }

      function sacuvajZadatak($IDOba){
      
      $obv = array(
     
        'IDZad' => time() ,
        'IDStu' => UserData::getUserID() ,
        'IDOba' => $IDOba,
        'Status' => 'neocenjen',
      
      );

        //2015-06-25 23:00:00
        //"05/12/2015 - 05/14/2015"

      $this->db->set($obv);
      $this->db->insert('zadatak'); 

      return true;
    }    

    function getStudent($id) {
        $query = $this->db->query('SELECT * FROM student WHERE IDStu LIKE "' . "$id" . '"');
        return $query->first_row();
    }
    
    
    function getZadatak($IDOba,$IDStu){
         $query = $this->db->query('SELECT * FROM zadatak WHERE IDStu LIKE "' . "$IDStu" . '" AND IDOba LIKE "' . "$IDOba" . '"');
        return $query->first_row();
    }
    
    //Nikola Maksimovic
    function getKalendar() {
        $query = $this->db->query('SELECT o.IDOba, o.Naziv, o.DatumVremePoc, o.DatumVremeKraj FROM obaveza o JOIN predmet p ON o.IDPre = p.IDPre JOIN predmet_student ps ON ps.IDStu = "'.UserData::getUserID().'" AND ps.IDPre = o.IDPre WHERE o.Aktivna = 1 AND ps.Status = "slusa";');
	return $query->result();
    }
    
    //Nikola Maksimovic
    function getKalendarDemonstrator() {
        $query = $this->db->query('SELECT o.IDOba, o.Naziv, o.DatumVremePoc, o.DatumVremeKraj FROM obaveza o JOIN predmet p ON o.IDPre = p.IDPre JOIN predmet_student ps ON ps.IDStu = "'.UserData::getUserID().'" AND ps.IDPre = o.IDPre AND ps.Demonstrator = 1 WHERE o.Aktivna = 1 AND ps.Status = "odslusan";');
	return $query->result();
    }
    
}