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
}