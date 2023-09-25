<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
    }

	public function login()
	{
        $this->load->view('auth/login');
	}

    public function proses_login()
    {
        //form validasi
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('gagal', 'email dan password harus diisi');
            redirect('auth/login');
            die();
        }        

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $where = array(
            'email' => $email,
            'password' => md5($password)
        );
        $cek = $this->M_data->cek_login('user', $where);

        if ($cek->num_rows() == 1) {

            $dataadmin = $cek->result_array();

            foreach ($dataadmin as $h) {
                $level_akses = $h['level'];
                $id_user = $h['id'];
                $nama = $h['nama'];
            }

            $data_session = array(
                'status' => 'login',
                'nama' => $nama,
                'level' => $level_akses,
                'id_user' => $id_user
            );

            $this->session->set_userdata($data_session);
            $this->session->set_flashdata('berhasil', 'Selamat datang <strong>'.$this->session->userdata('nama').'</strong>');

            redirect('dashboard');
        } else {
            $this->session->set_flashdata('gagal', 'Username dan Password tidak cocok');
            redirect('auth/login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
		redirect('auth/login');
    }
}
