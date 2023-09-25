<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

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
		$data['view'] = 'guru/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['guru'] = $this->M_data->selectDataWhere('*', 'guru');

        $this->load->view('layouts/app', $data);
	}

    public function add()
	{
		$data['view'] = 'guru/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('layouts/app', $data);
	}

    public function proses_add() 
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_daftar', 'Tanggal Daftar', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('guru/add'));
        } else {
            $guru = $this->M_data->selectDataWhere('*', 'guru');

            $insert['nama'] = $this->input->post('nama');
            $insert['tgl_lahir'] = $this->input->post('tgl_lahir');
            $insert['tmp_lahir'] = $this->input->post('tmp_lahir');
            $insert['jns_kelamin'] = $this->input->post('jns_kelamin');
            $insert['nip'] = $this->input->post('nip');
            $insert['gelar_depan'] = $this->input->post('gelar_depan');
            $insert['gelar_belakang'] = $this->input->post('gelar_belakang');
            $insert['jenjang'] = $this->input->post('jenjang');
            $insert['jurusan'] = $this->input->post('jurusan');
            $insert['sertifikasi'] = $this->input->post('sertifikasi');
            $insert['kompetensi'] = $this->input->post('kompetensi');
            $insert['tgl_daftar'] = $this->input->post('tgl_daftar');
            $this->db->insert('guru', $insert);
            $guru_id = $this->db->insert_id();
            
            if ($guru->num_rows() > 0) {
                $data = array();
                $query = $this->M_data->selectDataWhere('*', 'kriteria');
    
                $index = 0; 
                foreach($query->result() as $row){

                    $data_guru = $this->M_data->selectDataWhere('*', 'guru');
                    foreach ($data_guru->result() as $gr) {
                        if ($gr->id < $guru_id) {
                            array_push($data, 
                                array(
                                    'guru_id_1' => $gr->id,
                                    'guru_id_2' => $guru_id,
                                    'kode_kriteria' => $row->kode_kriteria,
                                    'nilai' => 1,
                                ),
                                array(
                                    'guru_id_1' => $guru_id,
                                    'guru_id_2' => $gr->id,
                                    'kode_kriteria' => $row->kode_kriteria,
                                    'nilai' => 1,
                                )
                            );
                        }
                    }
                    array_push($data, 
                        array(
                            'guru_id_1' => $guru_id,
                            'guru_id_2' => $guru_id,
                            'kode_kriteria' => $row->kode_kriteria,
                            'nilai' => 1,
                        )
                    );
                    
                $index++;
                }
                $this->db->insert_batch('analisis_alternatif', $data);
            } else {
                $query = $this->M_data->selectDataWhere('*', 'kriteria');
                foreach ($query->result() as $row) {
                    $insert2['guru_id_1'] = $guru_id;
                    $insert2['guru_id_2'] = $guru_id;
                    $insert2['kode_kriteria'] = $row->kode_kriteria;
                    $insert2['nilai'] = 1;
                    $this->M_data->insert($insert2, 'analisis_alternatif');
                }

            }

            $ranking['guru_id'] = $guru_id;
            $this->db->insert('ranking', $ranking);
            $this->db->insert('ranking_saw', $ranking);

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan guru');
            redirect(base_url('guru'));
        }
    }

    public function edit($id) 
    {
        $data['view'] = 'guru/edit';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['guru'] = $this->M_data->selectDataWhere('*', 'guru', 'id', $id)->row();

        $this->load->view('layouts/app', $data);
    }

    public function proses_edit($id) 
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_daftar', 'Tanggal Daftar', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('guru/edit/'.$id));
        } else {
            $insert['nama'] = $this->input->post('nama');
            $insert['tgl_lahir'] = $this->input->post('tgl_lahir');
            $insert['tmp_lahir'] = $this->input->post('tmp_lahir');
            $insert['jns_kelamin'] = $this->input->post('jns_kelamin');
            $insert['nip'] = $this->input->post('nip');
            $insert['gelar_depan'] = $this->input->post('gelar_depan');
            $insert['gelar_belakang'] = $this->input->post('gelar_belakang');
            $insert['jenjang'] = $this->input->post('jenjang');
            $insert['jurusan'] = $this->input->post('jurusan');
            $insert['sertifikasi'] = $this->input->post('sertifikasi');
            $insert['kompetensi'] = $this->input->post('kompetensi');
            $insert['tgl_daftar'] = $this->input->post('tgl_daftar');
            $this->M_data->updateData($insert, 'guru', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit guru');
            redirect(base_url('guru'));
        }
    }

    public function delete($id) 
    {
        $where = array('id' => $id);
        $delete = $this->M_data->delete('guru', $where);
        if ($delete) {
            $this->session->set_flashdata('berhasil', 'guru berhasil dihapus');
            redirect(base_url('guru'));
        } else {
            $this->session->set_flashdata('gagal', 'guru gagal dihapus');
            redirect(base_url('guru'));
        }
    }
}
