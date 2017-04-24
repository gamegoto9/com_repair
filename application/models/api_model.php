<?php

class Api_model extends CI_Model {
	public function __construct() {
        parent::__construct();
    }

    function AllData() {
    	$sql = "SELECT
        notify.id_noti,
        notify.email_noti,
        notify.name_noti,
        notify.type_noti,
        notify.desc_type_noti,
        notify.place_noti,
        notify.tel_noti,
        notify.place_building_noti,
        notify.place_room_noti,
        notify.id_goods,
        notify.subject_noti,
        notify.desc_noti,
        notify.date_noti,
        notify.status_noti,
        users.name_user,
        users.id_user,
        users.type_position,
        usertype.type_user_name,
        imagesnotify.id_img,
        imagesnotify.image,
        imagesnotify.id_noti
        FROM
        notify
        INNER JOIN users ON notify.id_user = users.id_user
        INNER JOIN usertype ON users.status_user = usertype.type_user
        INNER JOIN imagesnotify ON notify.id_noti = imagesnotify.id_noti";

        $result = $this->db->query($sql);
        
        return $result;
    }


    function login($username,$pass){

        $sql = "SELECT * FROM users 
                WHERE username = '$username' AND 
                password = '$pass'
                ";

        $result = $this->db->query($sql);

        return $result;

    }

    function update_fcmToken($id_user,$fcm_token){
        $sql = "UPDATE users SET firebaseToken = '$fcm_token'
                WHERE id_user = '$id_user'";

        $result = $this->db->query($sql);

        if($result > 0){
            $sql = "SELECT * FROM users WHERE id_user = '$id_user'";
            $result_full = $this->db->query($sql);

            return $result_full;
        }else{
            return false;
        }

    }
}