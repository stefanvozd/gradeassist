<?php

class Zaposlen_model extends CI_Model {


    //SD
    function PredmetiZaZaposlenog() {
        $query = $this->db->query('SELECT IDPre FROM predmet_zaposlen WHERE IDZap LIKE "' . UserData::getUserID() . '"');
        return $query->result_array();
    }

    //SD
    function novaObaveza() {
        return $data['predmeti'] = $this->PredmetiZaZaposlenog();
    }

    //SD
    function sacuvajObavezu($obaveza_id, $naslov, $predmet, $datum, $vreme, $obavestenje,$tip) {

        // if(strlen($naslov)<5){echo 0;return;}
        if (strlen($datum) < 5) {
            echo 0;
            return;
        }

        $date_time = explode(" - ", $datum);

        //TREBAJU NAM SEKUNDICE ZA COUNTDOWN
        //$vreme =  substr($vreme, 0, -3);
        // echo  $date_time[0]." + ";
        //  echo  $date_time[1]." ".$vreme;

        $obv = array(
            'IDOba' => $obaveza_id,
            'IDPre' => $predmet,
            'IDZap' => UserData::getUserID(),
            'Naziv ' => $naslov,
            'Aktivna' => '1',
            'Tip' => $tip,
            'obavestenje' => $obavestenje,
            'DatumVremePoc' => $date_time[0],
            'DatumVremeKraj' => $date_time[1] . " " . $vreme,
        );

        //2015-06-25 23:00:00
        //"05/12/2015 - 05/14/2015"

        $this->db->set($obv);
        $this->db->insert('obaveza');
        echo true;
    }
    //MS
    function getSveObaveze(){
        $q = $this->db->query('SELECT * FROM obaveza o , zaposlen z '
                . 'WHERE o.IDZap = z.IDZap AND Arhiva = FALSE;');
        return $q->result();
    }
    //MS
    function getObaveze(){
      $query = $this->db->query('SELECT IDOba, o.IDPre, Naziv, Aktivna, DatumVremePoc, DatumVremeKraj
                FROM obaveza o, predmet_zaposlen pz WHERE  o.IDZap LIKE "'.UserData::getUserID().'"
                AND o.IDPre = pz.IDPre AND Aktivna = TRUE AND Arhiva = FALSE;');
      return $query->result();
    }
    
    //SD
    function getZadatak($id) {
        $query = $this->db->query('SELECT * FROM zadatak WHERE IDZad LIKE "' . "$id" . '"');
        return $query->first_row();
    }
    

    
    //NV
    function getNeaktivniPredmeti() {
        $query = $this->db->query('SELECT o.IDPre, o.Naziv, o.IDOba, NULL as podaci
                FROM obaveza o 
                WHERE  o.IDZap LIKE "' . UserData::getUserID() . '"
                AND Aktivna = 0;');
     ;
        return $query->result();
    }

     //spremne za ocenjivanje
    function getNeaktivneObaveze(){
      $query = $this->db->query('SELECT IDOba, o.IDPre, Naziv, Aktivna, DatumVremePoc, DatumVremeKraj
                FROM obaveza o, predmet_zaposlen pz WHERE  o.IDZap LIKE "'.UserData::getUserID().'"
                AND o.IDPre = pz.IDPre AND Aktivna = FALSE AND Arhiva = FALSE;');
      return $query->result();
    }
    //NV
    function getPodaci($id) {
        $query = $this-> db -> query( 'SELECT s.IDStu, s.BrojIndexa, s.Ime, s.Prezime, z.Status,z.IDZad, z.Poeni, o.DatumVremeKraj
                  FROM zadatak z, student s, obaveza o
                  WHERE z.IDStu = s.IDStu
                  AND o.IDOba = " '.$id.' " 
                  AND z.IDOba = o.IDOba ' 
                );
        return $query->result();
    }

      //SD
    function sacuvajOcenu($IDZad, $status, $poeni, $komentar) {
        //ako je ocena ocena zakljucena, ne sme da se menja
         $zad = $this->getZadatak($IDZad);
         if(@$zad->Arhiviran==1) return 0;
         
        $zad = array(
            'status' => $status,
            'poeni' => $poeni,
            'komentar ' => $komentar,
        );
     
        $this->db->where('IDZad', $IDZad);
        $this->db->update('zadatak',$zad);
        
        return 1;
    }
    
      //SD
      function zakljuciOcenu($IDZad) {
          //ako je ocena ocena zakljucena, ne sme da se menja
         $zad = $this->getZadatak($IDZad);
         if(@$zad->Arhiviran==1) return 0;
          
        $zad = array(
            'Arhiviran' => 1,
        );
     
        $this->db->where('IDZad', $IDZad);
        $this->db->update('zadatak',$zad);
        
        return 1;
    }
    
//    function getObavezeZaKalendar() {
//        $query = $this->db->query('SELECT o.Naziv, o.DatumVremePoc, o.DatumVremeKraj FROM obaveza o JOIN predmet p ON o.IDPre = p.IDPre JOIN predmet_zaposlen pz ON pz.IDZap = "'.UserData::getUserID().'" AND pz.IDPre = o.IDPre WHERE o.Aktivna = 1;');
//	return $query->result();
//    }
    //Nikola Maksimovic
    function getKalendar() {
        $query = $this->db->query('SELECT o.IDOba, o.Naziv, o.DatumVremePoc, o.DatumVremeKraj FROM obaveza o JOIN predmet p ON o.IDPre = p.IDPre JOIN predmet_zaposlen pz ON pz.IDZap = "'.UserData::getUserID().'" AND pz.IDPre = o.IDPre WHERE o.Aktivna = 1;');
	return $query->result();
    }
    
}
//Gleda se IDZap a ne predmete na kojima predaje!!!  
