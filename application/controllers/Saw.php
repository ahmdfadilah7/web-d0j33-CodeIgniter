<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saw extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != 'login'){
            redirect('auth/login');
        }
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function kriteria()
	{
		$data['view'] = 'saw/kriteria';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['kriteria'] = $this->M_data->selectDataWhere('*', 'kriteria_saw');

        $this->load->view('layouts/app', $data);
	}

    public function alternatif()
	{
		$data['view'] = 'saw/alternatif';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['kriteria'] = $this->M_data->selectDataWhere('*', 'kriteria_saw');
        $data['guru'] = $this->M_data->selectDataWhere('*', 'guru');
        $data['hasil_alternatif'] = $this->M_data->selectDataWhere('*', 'hasil_alternatif_saw');
        $data['ranking'] = $this->db->query("SELECT * FROM ranking_saw INNER JOIN guru ON ranking_saw.guru_id=guru.id ORDER BY ranking_saw.nilai DESC");

        $this->load->view('layouts/app', $data);
	}

    public function save() 
    {
        $kriteria = $this->M_data->selectDataWhere('*', 'kriteria_saw');
         
        $no = 1;
        foreach ($kriteria->result() as $row) {
            $kode_kriteria = $row->kode_kriteria;
            $id[$no] = $this->input->post('id_'.$kode_kriteria);
            $jenis[$no] = $this->input->post('jenis_'.$kode_kriteria);
            $bobot[$no] = $this->input->post('bobot_'.$kode_kriteria);
            $this->db->query("UPDATE kriteria_saw SET jenis = '$jenis[$no]', bobot = '$bobot[$no]' WHERE kode_kriteria = '$id[$no]'");

            $no++;
        }

        $jumlahbobot = $this->db->query("SELECT SUM(bobot) as jumlah_bobot FROM kriteria_saw");
        $no = 1;
        foreach ($kriteria->result() as $r) {
            $id_kriteria[$no] = $r->kode_kriteria;
            $nilai_kriteria[$no] = $r->bobot/$jumlahbobot->row()->jumlah_bobot;
            $update = $this->db->query("UPDATE kriteria_saw SET nilai_kriteria = '$nilai_kriteria[$no]' WHERE kode_kriteria = '$id_kriteria[$no]'");

            $no++;
        }
      
        $this->session->set_flashdata('berhasil', 'Berhasil menyimpan bobot kriteria');
        redirect(base_url('saw/kriteria')); 
    }

    public function save_alternatif() 
    {
        $kriteria = $this->M_data->selectDataWhere('*', 'kriteria_saw');
        $guru = $this->M_data->selectDataWhere('*', 'guru');

        $alternatif = $this->M_data->selectDataWhere('*', 'hasil_alternatif_saw');
        if ($alternatif->num_rows() > 0) {
            
            foreach ($guru->result() as $row) {
                $this->db->query("DELETE FROM hasil_alternatif_saw WHERE guru_id = '$row->id'");
            }

            $data = array();
            foreach ($guru->result() as $row) {
                
                $no = 1;
                foreach ($kriteria->result() as $kr) {
                    $guru_id[$no] = $this->input->post('guru_'.$row->id.$kr->kode_kriteria);
                    $kode_kriteria[$no] = $this->input->post('kriteria_'.$row->id.$kr->kode_kriteria);
                    $nilai[$no] = $this->input->post($row->id.'_'.$kr->kode_kriteria);
    
                    array_push($data, 
                        array(
                            'guru_id' => $guru_id[$no],
                            'kode_kriteria' => $kode_kriteria[$no],
                            'nilai' => $nilai[$no]
                        )
                    );
                    $no++;
                }
            }
            $this->db->insert_batch('hasil_alternatif_saw', $data);

        } else {

            $data = array();
            foreach ($guru->result() as $row) {
                
                $no = 1;
                foreach ($kriteria->result() as $kr) {
                    $guru_id[$no] = $this->input->post('guru_'.$row->id.$kr->kode_kriteria);
                    $kode_kriteria[$no] = $this->input->post('kriteria_'.$row->id.$kr->kode_kriteria);
                    $nilai[$no] = $this->input->post($row->id.'_'.$kr->kode_kriteria);
    
                    array_push($data, 
                        array(
                            'guru_id' => $guru_id[$no],
                            'kode_kriteria' => $kode_kriteria[$no],
                            'nilai' => $nilai[$no]
                        )
                    );
                    $no++;
                }
            }
            $this->db->insert_batch('hasil_alternatif_saw', $data);

        }
      
        $this->session->set_flashdata('berhasil', 'Berhasil menyimpan nilai alternatif');
        redirect(base_url('saw/alternatif')); 
    }

    public function save_ranking() 
    {
        $guru = $this->M_data->selectDataWhere('*', 'guru');
        $kriteria = $this->M_data->selectDataWhere('*', 'kriteria_saw');

        foreach ($guru->result() as $row) {
            
            foreach ($kriteria->result() as $kr) {
                $nilai = $this->db->query("SELECT nilai FROM hasil_alternatif_saw WHERE guru_id = '$row->id' AND kode_kriteria = '$kr->kode_kriteria'");
                $max = $this->db->query("SELECT MAX(nilai) as nilai_max FROM hasil_alternatif_saw WHERE kode_kriteria = '$kr->kode_kriteria'");

                $normalisasi = ($nilai->row()->nilai/$max->row()->nilai_max)*$kr->nilai_kriteria;
                $this->db->query("UPDATE hasil_alternatif_saw SET normalisasi = '$normalisasi' WHERE guru_id = '$row->id' AND kode_kriteria = '$kr->kode_kriteria'");
            }

            $nilairank = $this->db->query("SELECT SUM(normalisasi) as jumlah_normalisasi FROM hasil_alternatif_saw WHERE guru_id = '$row->id'")->row();
            $this->db->query("UPDATE ranking_saw SET nilai = '$nilairank->jumlah_normalisasi' WHERE guru_id = '$row->id'");
        }

        $this->session->set_flashdata('berhasil', 'Berhasil menyimpan hasil normalisasi alternatif');
        redirect(base_url('saw/alternatif')); 
    }
}
