<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

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
		$data['view'] = 'nilai/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['nilai'] = $this->M_data->selectDataWhere('*', 'nilai');

        $this->load->view('layouts/app', $data);
	}

    public function add() 
    {
        $data['view'] = 'nilai/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $this->load->view('layouts/app', $data);
    }

    public function proses_add() 
    {
        $this->form_validation->set_rules('kepentingan', 'Intensistas Kepentingan', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('nilai/add'));
        } else {
            $insert['kepentingan'] = $this->input->post('kepentingan');
            $insert['keterangan'] = $this->input->post('keterangan');
            $this->M_data->insert($insert, 'nilai');

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan nilai');
            redirect(base_url('nilai'));
        }
    }

    public function edit($id) 
    {
        $data['view'] = 'nilai/edit';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['nilai'] = $this->M_data->selectDataWhere('*', 'nilai', 'id', $id)->row();

        $this->load->view('layouts/app', $data);
    }

    public function proses_edit($id) 
    {
        $this->form_validation->set_rules('kepentingan', 'Intensistas Kepentingan', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('nilai/edit/'.$id);
        } else {
            $insert['kepentingan'] = $this->input->post('kepentingan');
            $insert['keterangan'] = $this->input->post('keterangan');
            $this->M_data->updateData($insert, 'nilai', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit nilai');
            redirect(base_url('nilai'));
        }
    }

    public function delete($id) 
    {
        $where = array('id' => $id);
        $delete = $this->M_data->delete('nilai', $where);
        if ($delete) {
            $this->session->set_flashdata('berhasil', 'nilai berhasil dihapus');
            redirect(base_url('nilai'));
        } else {
            $this->session->set_flashdata('gagal', 'nilai gagal dihapus');
            redirect(base_url('nilai'));
        }
    }
}
