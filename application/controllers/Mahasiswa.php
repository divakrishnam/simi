<?php
class Mahasiswa extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_mahasiswa');
        if($this->session->userdata('status') != 'login'){
            redirect(base_url('login'));
        }
    }

    function index(){
        $data['mahasiswa'] = $this->m_mahasiswa->show_data()->result();
        $this->load->view('header');
        $this->load->view('mahasiswa/mahasiswa-admin', $data);
        $this->load->view('footer');
    }

    function create_act(){
        $npm = $this->input->post('npm');
        $kelas = $this->input->post('kelas');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $prodi = $this->input->post('prodi');
        $password = $this->input->post('password');
 
		$dataUser = array(
            'id' => $npm,
            'username' => $username,
            'password' => $password,
            'hak_akses' => 'mahasiswa',
        );
        
        $dataMahasiswa = array(
            'npm' => $npm,
            'kelas' => $kelas,
            'nama' => $nama,
            'prodi' => $prodi,
        );
        
        $this->m_mahasiswa->input_data_user($dataUser);
        $this->m_mahasiswa->input_data_mahasiswa($dataMahasiswa);
        $this->session->set_flashdata('message','simpan');
		redirect(base_url('mahasiswa'));
    }

    function update($npm){
        $where = array('npm' => $npm);
        $data['user'] = $this->m_mahasiswa->show_data_edit($where)->row();
        $data['mahasiswa'] = $this->m_mahasiswa->show_data()->result();
		$this->load->view('header');
        $this->load->view('mahasiswa/mahasiswa-admin-ubah', $data);
        $this->load->view('footer');
    }
    
    function update_act($npm){
        $kelas = $this->input->post('kelas');
        $nama = $this->input->post('nama');
        $prodi = $this->input->post('prodi');
        $password = $this->input->post('password');
 
		$dataUser = array(
            'password' => $password,
        );
        
        $dataMahasiswa = array(
            'kelas' => $kelas,
            'nama' => $nama,
            'prodi' => $prodi,
        );

        $whereUser = array('id' => $npm);

        $whereMahasiswa = array('npm' => $npm);
        
        $this->m_mahasiswa->edit_data_user($whereUser, $dataUser);
        $this->m_mahasiswa->edit_data_mahasiswa($whereMahasiswa, $dataMahasiswa);
        $this->session->set_flashdata('message','ubah');
		redirect(base_url('mahasiswa'));
    }

    function delete_act($npm){
        $whereUser = array('id' => $npm);
        $whereMahasiswa = array('npm' => $npm);
        $this->m_mahasiswa->delete_data_user($whereUser);
        $this->m_mahasiswa->delete_data_mahasiswa($whereMahasiswa);
        $this->session->set_flashdata('message','hapus');
        redirect(base_url('mahasiswa'));
    }
}
?>