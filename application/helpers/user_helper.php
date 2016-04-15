<?php
class UserData {

    public static function isLoggedIn() {
        $CI = &get_instance();
        return $CI -> session -> userdata('logged_in');
        
    }

    public static function getUserName() {
        $CI = &get_instance();
        return $CI -> session -> userdata('name');
        
    }

    public static function getUserID() {
        $CI = &get_instance();
        return $CI -> session -> userdata('id');
        
    }
    
     public static function getUserType() {
        $CI = &get_instance();
        return $CI -> session -> userdata('type');

    }

    public static function setLoggedIn() {
        if (!isset($_SESSION) ) session_start();
        $CI = &get_instance();
        $CI -> session -> set_userdata('logged_in', true);
    }

    public static function setUserName($name) {
        $CI = &get_instance();
        $CI -> session -> set_userdata('name', $name);
    }
    
     public static function setUserType($type) {
        $CI = &get_instance();
        $CI -> session -> set_userdata('type', $type);
    }

    public static function setUserID($id) {
        $CI = &get_instance();
        $CI -> session -> set_userdata('id', $id);
    }

    public static function logOut() {
        $CI = &get_instance();
        $CI -> session -> unset_userdata('logged_in');
        $CI -> session -> unset_userdata('id');
        $CI -> session -> unset_userdata('name');
        $CI -> session -> unset_userdata('type');
        $CI -> session -> sess_destroy();
    }

   public static function getStudentType(){
       return  "student";
   }

  public static function getZaposlenType(){
       return  "zaposlen";
   }
  
    public static function getDemonstratorType(){
       return  "demonstrator";
   }
    
      public static function getAdminType(){
       return  "admin";
   }
  
}
?>