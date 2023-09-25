<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

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
		$data['view'] = 'kriteria/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['kriteria'] = $this->M_data->selectDataWhere('*', 'kriteria');

        $this->load->view('layouts/app', $data);
	}

    public function add() 
    {
        $data['view'] = 'kriteria/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $query = $this->M_data->selectDataWhere('max(kode_kriteria) as max_kode', 'kriteria');
        if ($query->num_rows() > 0) {
            $urutan = (int) substr($query->row()->max_kode, 3,5);
            $urutan++;
            $data['kode_kriteria'] = 'KR'.sprintf('%03s', $urutan);
        } else {
            $data['kode_kriteria'] = 'KR01';
        }
        $this->load->view('layouts/app', $data);
    }

    public function proses_add() 
    {
        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('kriteria/add'));
        } else {
            $query = $this->M_data->selectDataWhere('*', 'kriteria');
            
            $insert['kode_kriteria'] = $this->input->post('kode_kriteria');
            $insert['kriteria'] = $this->input->post('kriteria');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');
            $this->M_data->insert($insert, 'kriteria');
            $this->M_data->insert($insert, 'kriteria_saw');
            
            if ($query->num_rows() > 0) {
                $data = array();
    
                $index = 0; 
                foreach($query->result() as $row){
                    $kode_kriteria_1 = (int) substr($row->kode_kriteria, 3,5);
                    $kode_kriteria_2 = (int) substr($this->input->post('kode_kriteria'), 3,5);
                    if ($kode_kriteria_1 < $kode_kriteria_2) {
                        $urutan = $kode_kriteria_1++;
                        $kode_kriteria = 'KR'.sprintf('%03s', $urutan);
                        array_push($data, 
                            array(
                                'kode_kriteria_1'=> $kode_kriteria,
                                'kode_kriteria_2'=> $this->input->post('kode_kriteria'),
                                'nilai'=> 1,
                            ),
                            array(
                                'kode_kriteria_1'=> $this->input->post('kode_kriteria'),
                                'kode_kriteria_2'=> $kode_kriteria,
                                'nilai'=> 1,
                            )
                        );
                    } else {
                        array_push($data, 
                            array(
                                'kode_kriteria_1'=> $row->kode_kriteria,
                                'kode_kriteria_2'=> $this->input->post('kode_kriteria'),
                                'nilai'=> 1,
                            )
                        );
                    }
                $index++;
                }
                array_push($data, array(
                    'kode_kriteria_1'=> $this->input->post('kode_kriteria'),
                    'kode_kriteria_2'=> $this->input->post('kode_kriteria'),
                    'nilai'=> 1,
                ));
                // var_dump($data);
                // die;
                $this->db->insert_batch('analisis_kriteria', $data);
            } else {
                $insert2['kode_kriteria_1'] = $this->input->post('kode_kriteria');
                $insert2['kode_kriteria_2'] = $this->input->post('kode_kriteria');
                $insert2['nilai'] = 1;

                $this->M_data->insert($insert2, 'analisis_kriteria');
            }

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan kriteria');
            redirect(base_url('kriteria'));
        }
    }

    public function edit($id) 
    {
        $data['view'] = 'kriteria/edit';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['kriteria'] = $this->M_data->selectDataWhere('*', 'kriteria', 'kode_kriteria', $id)->row();

        $this->load->view('layouts/app', $data);
    }

    public function proses_edit($id) 
    {
        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect('kriteria/edit/'.$id);
        } else {
            $insert['kriteria'] = $this->input->post('kriteria');
            $insert['updated_at'] = date('Y-m-d H:i:s');
            $this->M_data->updateData($insert, 'kriteria', 'kode_kriteria', $id);
            $this->M_data->updateData($insert, 'kriteria_saw', 'kode_kriteria', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit kriteria');
            redirect(base_url('kriteria'));
        }
    }

    public function delete($id) 
    {
        $where = array('kode_kriteria' => $id);
        $delete = $this->M_data->delete('kriteria', $where);
        $delete_saw = $this->M_data->delete('kriteria_saw', $where);
        if ($delete) {
            $this->session->set_flashdata('berhasil', 'Kriteria berhasil dihapus');
            redirect(base_url('kriteria'));
        } else {
            $this->session->set_flashdata('gagal', 'Kriteria gagal dihapus');
            redirect(base_url('kriteria'));
        }
    }
}
