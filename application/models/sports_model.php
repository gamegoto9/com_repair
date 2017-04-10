<?php

class Sports_model extends CI_Model {

    protected $tablename = 'sport_2015';

    public function __construct() {
        parent::__construct();
    }

    public function AddUser($title, $name, $lname, $idpass, $nation, $type, $img, $fil, $idsport, $Lid) {
        if (is_null($title) || is_null($name) || is_null($lname) || is_null($idpass) || is_null($nation) || is_null($type) || is_null($img) || is_null($fil) || is_null($idsport) || is_null($Lid)) {
            return false;
        }

        $data = array('stdID' => '',
            'stdTitle' => $title,
            'stdName' => $lname,
            'stdLname' => $lname,
            'sportId' => $idsport,
            'passportId' => $idpass,
            'nation' => $nation,
            'typeId' => $type,
            'img' => base_url() . 'assets/uploads/' . $idsport . '/' . $img,
            'file' => base_url() . 'assets/uploads/' . $idsport . '/' . $fil,
            'Lid' => $Lid);
        $insert_id = $this->db->insert('player_sport_2015', $data);
//		$insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function ListAll() {

        $sql = "SELECT sportId,sportName,sportSum,img
        from sport_2015
        ORDER BY sportId ASC";
        $sports = $this->db->query($sql);
        return $sports->result_array();
    }
    
     public function ListStaff() {

        $sql = "SELECT *
        from staff_2015
        ORDER BY Ssid ASC";
        $sports = $this->db->query($sql);
        return $sports->result_array();
    }

    public function getSportById($id) {
        $query = $this->db->get_where($this->tablename, array('sportId' => $id));
        return $query->row_array();
    }
    public function getStaffById($id) {
        $table = 'staff_2015';
        $query = $this->db->get_where($table, array('Ssid' => $id));
        return $query->row_array();
    }

    public function ListPlay($id) {

//        $player = $this->db->get_where('player_sport_2015', array('sportId' => $id));
//        return $player->row_array();


        $Lid = $this->session->userdata('Lid');

        $sql = "SELECT stdID,number,stdTitle,stdName,stdLname,sport_2015.sportId,passportId,nation,typeId,player_sport_2015.img,file,Lid,sportName,sportSum,player_sport_2015.note
                from player_sport_2015,sport_2015
                where  sport_2015.sportId = player_sport_2015.sportId and sport_2015.sportId = '$id' and Lid = '$Lid' 
                order by player_sport_2015.note asc";

        $data = $this->db->query($sql);

        return $data;
    }
    public function ListPlayers($id) {

//        $player = $this->db->get_where('player_sport_2015', array('sportId' => $id));
//        return $player->row_array();


        $Lid = $this->session->userdata('Lid');

        $sql = "SELECT stdID,number,stdTitle,stdName,stdLname,sport_2015.sportId,passportId,nation,typeId,player_sport_2015.img,file,player_sport_2015.Lid,sportName,sportSum,player_sport_2015.note,login_sport_2015.name
                from player_sport_2015,sport_2015,login_sport_2015
                where  sport_2015.sportId = player_sport_2015.sportId and player_sport_2015.Lid = login_sport_2015.Lid and sport_2015.sportId = '$id' and player_sport_2015.Lid = '$Lid' 
                order by player_sport_2015.note asc";

        $data = $this->db->query($sql);

        return $data;
    }
    
    public function ListDataStaff($id) {

//        $player = $this->db->get_where('player_sport_2015', array('sportId' => $id));
//        return $player->row_array();


        $Lid = $this->session->userdata('Lid');

        $sql = "SELECT Sid,Sposition,Stitle,staff_sport_2015.Sname,Slname,Simg,staff_2015.Ssid,Lid,staff_2015.Sname as name
        from staff_2015,staff_sport_2015
        where  staff_2015.Ssid = staff_sport_2015.Ssid and staff_2015.Ssid = '$id' and Lid = '$Lid'";

        $data = $this->db->query($sql);

        return $data;
    }
    
    public function ListDataStaff2($id) {

//        $player = $this->db->get_where('player_sport_2015', array('sportId' => $id));
//        return $player->row_array();


        $Lid = $this->session->userdata('Lid');

        $sql = "SELECT Sid,Sposition,Stitle,staff_sport_2015.Sname,Slname,Simg,staff_2015.Ssid,staff_sport_2015.Lid,staff_2015.Sname as name,login_sport_2015.name as name2
        from staff_2015,staff_sport_2015,login_sport_2015
        where  staff_2015.Ssid = staff_sport_2015.Ssid and staff_sport_2015.Lid = login_sport_2015.Lid and staff_2015.Ssid = '$id' and staff_sport_2015.Lid = '$Lid'";

        $data = $this->db->query($sql);

        return $data;
    }
    
    public function listSport(){
        $sql = "select * from sport_2015";
        $data = $this->db->query($sql);
        
        return $data->result_array();
    }
    
    public function listSchool(){
        $sql = "select * from login_sport_2015 where Lid != '1'";
        $data = $this->db->query($sql);
        
        return $data->result_array();
    }

    public function insert_file($file_name, $title, $name, $lname, $idPass, $nation, $type, $sportid) {
        $data = array(
            'stdTitle' => $title,
            'stdName' => $name,
            'stdLname' => $lname,
            'sportId' => $sportid,
            'passportId' => $idPass,
            'nation' => $nation,
            'typeId' => $type,
            'img' => $file_name
        );

        $this->db->insert('player_sport_2015', $data);

        return $this->db->insert_id();
    }

}
