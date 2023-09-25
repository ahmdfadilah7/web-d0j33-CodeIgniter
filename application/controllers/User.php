<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != 'login'){
            redirect('auth/login');
        }
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function index()
	{
		$data['view'] = 'user/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['user'] = $this->M_data->selectDataWhere('*', 'user');

        $this->load->view('layouts/app', $data);
	}

    public function add() 
    {
        $data['view'] = 'user/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('layouts/app', $data);
    }

    public function proses_add() 
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('user/add'));
        } else {
            $insert['nama'] = $this->input->post('nama');
            $insert['email'] = $this->input->post('email');
            $insert['password'] = md5($this->input->post('password'));
            $insert['level'] = $this->input->post('level');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');
            $this->M_data->insert($insert, 'user');

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan user');
            redirect(base_url('user'));
        }
    }

    public function edit($id) 
    {
        $data['view'] = 'user/edit';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['user'] = $this->M_data->selectDataWhere('*', 'user', 'id', $id)->row();

        $this->load->view('layouts/app', $data);
    }

    public function proses_edit($id) 
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('user/edit/'.$id);
        } else {
            $insert['nama'] = $this->input->post('nama');
            $insert['email'] = $this->input->post('email');
            $insert['updated_at'] = date('Y-m-d H:i:s');
            if ($this->input->post('password')) {
                $insert['password'] = md5($this->input->post('password'));
            }
            $this->M_data->updateData($insert, 'user', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit user');
            redirect(base_url('user'));
        }
    }

    public function delete($id) 
    {
        $where = array('id' => $id);
        $delete = $this->M_data->delete('user', $where);
        if ($delete) {
            $this->session->set_flashdata('berhasil', 'user berhasil dihapus');
            redirect(base_url('user'));
        } else {
            $this->session->set_flashdata('gagal', 'user gagal dihapus');
            redirect(base_url('user'));
        }
    }
}
