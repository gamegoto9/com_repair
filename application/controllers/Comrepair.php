<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comrepair extends CI_Controller {

   public function __construct(){
        parent::__construct();
      
        //$this->load->model("sports_model");
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->library('session');


        $val_lang = $this->session->userdata('language');

        if (!($this->session->userdata('language'))) {
            $this->session->set_userdata('language', 'english');
        }
    }

    public function index() {

        if($this->session->userdata('Lid')){
            $this->load->view('home');
        }else{

            $this->load->view('Login');
        }
    }

    public function inform() {

        $this->load->view('input');
    }

    public function home() {

        $this->load->view('home');
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->load->view('Login');
    }

    public function loadDataTableNotify(){
        $sql = "select * from notify order by date_noti desc";
        $data['data'] = $this->db->query($sql)->result_array();

        $this->load->view('table_notify',$data);
    }

    public function main() {
        $data['page'] = "0";
        $this->load->view('content_view', $data);
    }

    public function check_login() {



        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Username', 'required');
        $this->form_validation->set_rules('sex', 'Password', 'required');

        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('name');
            $msg.= form_error('sex');


            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));
        } else {
            $data['name'] = $this->input->post('name');
            $data['sex'] = $this->input->post('sex');

//            $sql = "select * from personal where username = '".$data['name']."' and password = '".$data['name']."'";
            $query = $this->db->get_where('users', array('username' => $data['name'], 'password' => $data['sex']));

            $rowcount = $query->num_rows();

            if ($rowcount > 0) {
//                $result = array('user','status','name','Pid');

                foreach ($query->result_array() as $row) {

                    $dataArray = array(
                        'user' => $data['name'],
                        'status' => $row['status_user'],
                        'name' => $row['name_user'],
                        'Lid' => $row['id_user']
                        );

                   // // $_SESSION['Lid'] = $row['Lid'];

                     $this->session->set_userdata($dataArray);
                 }

               // $this->session->set_userdata($result);

                echo json_encode(array(
                    'is_successful' => TRUE,
                    'msg' => "สำเร็จ"
                    ));
            } else {
                echo json_encode(array(
                    'is_successful' => FALSE,
                    'msg' => 'ข้อมูลไม่ถูกต้อง'
                    ));
            }
        }
    }

    public function insert_noti(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('inputName', 'ชื่อ', 'required');
        $this->form_validation->set_rules('inputMail', 'Email', 'required');
        $this->form_validation->set_rules('type', 'ประเภท', 'required');
        $this->form_validation->set_rules('desc_type', 'รายละเอียดประเภท', 'required');
        $this->form_validation->set_rules('inputPhone', 'หมายเลขโทรศัพท์', 'required');
        $this->form_validation->set_rules('place', 'สถานที่', 'required');
        $this->form_validation->set_rules('place_build', 'อาคาร', 'required');
        $this->form_validation->set_rules('place_room', 'ห้อง', 'required');
        $this->form_validation->set_rules('inputnum', 'หมายเลขครุภัณฑ์', 'required');
        $this->form_validation->set_rules('title', 'สาเหตุ', 'required');
        $this->form_validation->set_rules('desc', 'รายละเอียด', 'required');

        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('inputName');
            $msg.= form_error('inputMail');
            $msg.= form_error('type');
            $msg.= form_error('desc_type');
            $msg.= form_error('inputPhone');
            $msg.= form_error('place');
            $msg.= form_error('place_build');
            $msg.= form_error('place_room');
            $msg.= form_error('inputnum');
            $msg.= form_error('title');
            $msg.= form_error('desc');

            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));
        } else {

            $data['name_noti'] = $this->input->post('inputName');
            $data['email_noti'] = $this->input->post('inputMail');
            $data['type_noti'] = $this->input->post('type');
            $data['desc_type_noti'] = $this->input->post('desc_type');
            $data['tel_noti'] = $this->input->post('inputPhone');
            $data['place_noti'] = $this->input->post('place');
            $data['place_building_noti'] = $this->input->post('place_build');
            // $data['place_room_noti'] = $this->session->userdata('place_room');
            $data['place_room_noti'] = $this->input->post('place_room');
            $data['id_goods'] = $this->input->post('inputnum');
            $data['subject_noti'] = $this->input->post('title');
            $data['desc_noti'] = $this->input->post('desc');
            $data['date_noti'] = date("Y-m-d");
            $data['status_noti'] = 1;
            $data['id_user'] = 1;


            $this->db->insert('notify', $data); 

            $sql = "select max(id_noti) as max_id from notify";
            $row2 = $this->db->query($sql)->row_array();
            $max_id = $row2['max_id'];



            foreach ($_FILES as $key => $value) {



                $config['upload_path'] = './assets/uploads/goods_repair/';
                $part = $config['upload_path'];
                $config['allowed_types'] = '*';
                $config['max_size'] = '8388608';
                $config['overwrite'] = FALSE;
                $config['remove_spaces'] = TRUE;
                $config['file_name'] = $max_id;
                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!empty($value['tmp_name']) && $value['size'] > 0) {
                    if (!$this->upload->do_upload($key)) {
                        $msg = $this->upload->display_errors();
                                //echo $msg . $test2;
                        echo json_encode(array(
                            'is_successful' => FALSE,
                            'msg' => $msg
                            ));
                    } else {
                        $name = $this->upload->data();

                        
                        $data2['id_noti'] = $max_id;
                        $data2['image'] = base_url() . 'assets/uploads/goods_repair/'.$name['file_name'];

                        $this->db->insert('imagesnotify', $data2); 


                        echo json_encode(array(
                            'is_successful' => TRUE,
                            'msg' => 'บันทึกเรียบร้อย'
                            ));
                    }
                }
//                        }
            }


        }
    }


    public function data_goods_repair($id){
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
        INNER JOIN imagesnotify ON notify.id_noti = imagesnotify.id_noti
        WHERE notify.id_noti = '$id'
        ";

        $data['data'] = $this->db->query($sql)->result_array();
        $data['data_img'] = $this->db->query($sql)->row_array();

        $this->load->view('show_data_goods_repair',$data);
    }

    public function cheng_status($id){

        $data['id_goods'] = $id;
        $this->load->view('cheng_status_goods_repair',$data);
    }

    public function update_status(){

       $id = $this->input->post('id_goods');
       $data2['status_noti'] = $this->input->post('status_form');

       $this->db->where('id_noti', $id);
       $this->db->update('notify', $data2); 
       $this->db->trans_complete();
        // $id = $this->input->post('id_goods');
        // $status = $this->input->post('status');

        // $sql = "UPDATE notify SET status_noti = '$status' WHERE id_goods = '$id'";

        // $result = $this->db->query($sql);

       if ($this->db->trans_status() === FALSE)
        // if($result)
       {

           echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => 'เกิดความผิดพลาดกรุณาทำรายการใหม่'
            ));

       }else{
        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'บันทึกเรียบร้อย'.$id.'xxxx'.$data2['status_noti']
            ));

    }

}

public function register(){
    $this->load->view('regis_form');
}


public function insert_regis(){

    $this->load->library('form_validation');

        $this->form_validation->set_rules('inputName', 'ชื่อ', 'required');
        $this->form_validation->set_rules('inputMail', 'Email', 'required');

        $this->form_validation->set_rules('inputPhone', 'หมายเลขโทรศัพท์', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('password_con', 'password', 'required');

        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('inputName');
            $msg.= form_error('inputMail');
            $msg.= form_error('inputPhone');
            $msg.= form_error('username');
            $msg.= form_error('password');
            $msg.= form_error('password_con');

            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));
        } else {

            $data['name_user'] = $this->input->post('inputName');
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['type_position'] = "เจ้าหน้าที่";
            $data['status_user'] = "0";
            $data['email'] = $this->input->post('inputMail');
            $data['tel'] = $this->input->post('inputPhone');
            $data['upDateTime'] = date("Y-m-d H:i:s");
           


            // $this->db->insert('users', $data); 

            // $sql = "select max(id_noti) as max_id from notify";
            // $row2 = $this->db->query($sql)->row_array();
            // $max_id = $row2['max_id'];



             foreach ($_FILES as $key => $value) {



                $config['upload_path'] = './assets/uploads/goods_repair/';
                $part = $config['upload_path'];
                $config['allowed_types'] = '*';
                $config['max_size'] = '8388608';
                $config['overwrite'] = FALSE;
                $config['remove_spaces'] = TRUE;
                $config['file_name'] = $data['username'].'_profile';
                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!empty($value['tmp_name']) && $value['size'] > 0) {
                    if (!$this->upload->do_upload($key)) {
                        $msg = $this->upload->display_errors();
                                //echo $msg . $test2;
                        echo json_encode(array(
                            'is_successful' => FALSE,
                            'msg' => $msg
                            ));
                    } else {

                        $name = $this->upload->data();
                        $data['image'] = base_url() . 'assets/uploads/goods_repair/'.$name['file_name'];

                          $this->db->insert('users', $data);


                        echo json_encode(array(
                            'is_successful' => TRUE,
                            'msg' => 'ลงทะเบียนเรียบร้อย'
                            ));
                    }
                }
            }



        }

}




public function default_() {


    $this->load->view('default_view');
}



function th() {
    $this->session->set_userdata('language', 'thai');

    redirect($this->session->userdata('LASTURL'));
}

function en() {
    $this->session->set_userdata('language', 'english');

    redirect($this->session->userdata('LASTURL'));
}

function ch() {
    $this->session->set_userdata('language', 'chaina');

    redirect($this->session->userdata('LASTURL'));
}



}