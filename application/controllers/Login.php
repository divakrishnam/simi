<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
    }

    function index(){
        $this->load->view('login/login');
    }

    function login_act(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $check = $this->m_login->login_check($where);
        if($check->num_rows() > 0){
            $data_session = array(
                'id' => $check->row()->id,
                'status' => 'login',
                'hak_akses' => $check->row()->hak_akses
            );
            $this->session->set_userdata($data_session);
			redirect(base_url('dashboard'));
        }else{
            echo "Username dan password salah";
        }
    }

    function logout(){
        $this->session->sess_destroy();
		redirect(base_url('login'));
    }
}
?>