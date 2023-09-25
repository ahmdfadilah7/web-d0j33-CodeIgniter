<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matriks extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != 'login'){
            redirect('auth/login');
        }
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function perbandingan()
	{
		$data['view'] = 'matriks/perbandingan/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['kriteria'] = $this->M_data->selectDataWhere('*', 'kriteria');
        $data['nilai'] = $this->M_data->selectDataWhere('*', 'nilai');

        $this->load->view('layouts/app', $data);
	}

    public function alternatif()
	{
		$data['view'] = 'matriks/alternatif/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['kriteria'] = $this->M_data->selectDataWhere('*', 'kriteria');
        $data['ranking'] = $this->db->query("SELECT * FROM ranking INNER JOIN guru ON ranking.guru_id=guru.id ORDER BY ranking.nilai DESC");

        $this->load->view('layouts/app', $data);
	}

    public function kriteria($id)
	{
		$data['view'] = 'matriks/alternatif/kriteria';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['kriteria'] = $this->M_data->selectDataWhere('*', 'kriteria', 'kode_kriteria', $id);
        $data['guru'] = $this->M_data->selectDataWhere('*', 'guru');
        $data['nilai'] = $this->M_data->selectDataWhere('*', 'nilai');

        $this->load->view('layouts/app', $data);
	}

    public function hasil()
	{
		$data['view'] = 'matriks/hasil';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['rankingahp'] = $this->db->query("SELECT * FROM ranking INNER JOIN guru ON ranking.guru_id=guru.id ORDER BY ranking.nilai DESC");
        $data['rankingsaw'] = $this->db->query("SELECT * FROM ranking_saw INNER JOIN guru ON ranking_saw.guru_id=guru.id ORDER BY ranking_saw.nilai DESC");

        $this->load->view('layouts/app', $data);
	}

    public function update_nilai_kriteria() 
    {
        $kode_kriteria_1 = $this->input->post('kode_kriteria_1');
        $kode_kriteria_2 = $this->input->post('kode_kriteria_2');
        $nilai = $this->input->post('nilai');
        
        if ($kode_kriteria_1 == 'KR001') {

            $this->db->query("UPDATE analisis_kriteria SET nilai = '$nilai' WHERE kode_kriteria_1 = '$kode_kriteria_1' AND kode_kriteria_2 = '$kode_kriteria_2'");

            $kriteria_2 = $this->db->query("SELECT * FROM analisis_kriteria WHERE kode_kriteria_1 = '$kode_kriteria_1' AND kode_kriteria_2 = '$kode_kriteria_1'");            
            $nilai_2 = $kriteria_2->row()->nilai/$nilai;
            $update = $this->db->query("UPDATE analisis_kriteria SET nilai = '$nilai_2' WHERE kode_kriteria_1 = '$kode_kriteria_2' AND kode_kriteria_2 = '$kode_kriteria_1'");
        } else {
            $kriteria_2 = $this->db->query("SELECT * FROM analisis_kriteria WHERE kode_kriteria_1 = 'KR001' AND kode_kriteria_2 = '$kode_kriteria_2'");
            $nilai_2 = $kriteria_2->row()->nilai/$nilai;
            $update = $this->db->query("UPDATE analisis_kriteria SET nilai = '$nilai_2' WHERE kode_kriteria_1 = '$kode_kriteria_1' AND kode_kriteria_2 = '$kode_kriteria_2'");
        }

        $this->session->set_flashdata('berhasil', 'Berhasil mengedit nilai kriteria');
        redirect(base_url('matriks/perbandingan'));
    }

    public function save_result() 
    {
        $kriteria = $this->M_data->selectDataWhere('*', 'kriteria');
        $analisis = $this->M_data->selectDataWhere('*', 'analisis_kriteria');
        foreach ($analisis->result() as $r) {
            $kode_kriteria_1 = $r->kode_kriteria_1;
            $kode_kriteria_2 = $r->kode_kriteria_2;
            $bobot = $this->db->query("SELECT SUM(nilai) as total_nilai FROM analisis_kriteria WHERE kode_kriteria_2 = '$kode_kriteria_1'");
            $totalnilai = $bobot->row()->total_nilai;
            $update_2 = $this->db->query("UPDATE analisis_kriteria SET bobot = '$totalnilai' WHERE kode_kriteria_2 = '$kode_kriteria_1'");
        }

        foreach ($analisis->result() as $rr) {
            $kode_kriteria_1 = $rr->kode_kriteria_1;
            $kode_kriteria_2 = $rr->kode_kriteria_2;
            $bobot_2 = $this->db->query("SELECT nilai,bobot FROM analisis_kriteria WHERE kode_kriteria_1 = '$kode_kriteria_1' AND kode_kriteria_2 = '$kode_kriteria_2'");
            $totaljumlah = $bobot_2->row()->nilai/$bobot_2->row()->bobot;
            $this->db->query("UPDATE analisis_kriteria SET jumlah = '$totaljumlah' WHERE kode_kriteria_1 = '$kode_kriteria_1' AND kode_kriteria_2 = '$kode_kriteria_2'");
        }

        foreach ($kriteria->result() as $k) {
            $kode_kriteria = $k->kode_kriteria;
            $jumlah = $this->db->query("SELECT SUM(jumlah) as total_jumlah FROM analisis_kriteria WHERE kode_kriteria_1 = '$kode_kriteria'");
            $nilai_kriteria = $jumlah->row()->total_jumlah/$kriteria->num_rows();
            $this->db->query("UPDATE kriteria SET nilai_kriteria = '$nilai_kriteria' WHERE kode_kriteria = '$kode_kriteria'");
        }

        $this->session->set_flashdata('berhasil', 'Berhasil menyimpan hasil perhitungan kriteria');
        redirect(base_url('matriks/perbandingan'));
    }

    public function update_nilai_alternatif($id) 
    {
        $guru_id_1 = $this->input->post('guru_id_1');
        $guru_id_2 = $this->input->post('guru_id_2');
        $nilai = $this->input->post('nilai');
        
        $min_id = $this->db->query("SELECT min(id) as min_id FROM guru");
        $idmin = $min_id->row()->min_id;
        if ($guru_id_1 == $idmin) {

            $this->db->query("UPDATE analisis_alternatif SET nilai = '$nilai' WHERE kode_kriteria = '$id' AND guru_id_1 = '$guru_id_1' AND guru_id_2 = '$guru_id_2'");

            $kriteria_2 = $this->db->query("SELECT * FROM analisis_alternatif WHERE kode_kriteria = '$id' AND guru_id_1 = '$guru_id_1' AND guru_id_2 = '$guru_id_1'");            
            $nilai_2 = $kriteria_2->row()->nilai/$nilai;
            $update = $this->db->query("UPDATE analisis_alternatif SET nilai = '$nilai_2' WHERE kode_kriteria = '$id' AND guru_id_1 = '$guru_id_2' AND guru_id_2 = '$guru_id_1'");
        } else {
            $kriteria_2 = $this->db->query("SELECT * FROM analisis_alternatif WHERE kode_kriteria = '$id' AND guru_id_1 = '$idmin' AND guru_id_2 = '$guru_id_2'");
            $nilai_2 = $kriteria_2->row()->nilai/$nilai;
            $update = $this->db->query("UPDATE analisis_alternatif SET nilai = '$nilai_2' WHERE kode_kriteria = '$id' AND guru_id_1 = '$guru_id_1' AND guru_id_2 = '$guru_id_2'");
        }

        $this->session->set_flashdata('berhasil', 'Berhasil mengedit nilai alternatif');
        redirect(base_url('matriks/kriteria/'.$id));
    }

    public function save_alternatif_result($id) 
    {
        $guru = $this->M_data->selectDataWhere('*', 'guru');
        $analisis = $this->M_data->selectDataWhere('*', 'analisis_alternatif', 'kode_kriteria', $id);
        foreach ($analisis->result() as $r) {
            $guru_id_1 = $r->guru_id_1;
            $guru_id_2 = $r->guru_id_2;
            $bobot = $this->db->query("SELECT SUM(nilai) as total_nilai FROM analisis_alternatif WHERE kode_kriteria = '$id' AND guru_id_2 = '$guru_id_1'");
            $totalnilai = $bobot->row()->total_nilai;
            $update_2 = $this->db->query("UPDATE analisis_alternatif SET bobot = '$totalnilai' WHERE kode_kriteria = '$id' AND guru_id_2 = '$guru_id_1'");
        }

        foreach ($analisis->result() as $rr) {
            $guru_id_1 = $rr->guru_id_1;
            $guru_id_2 = $rr->guru_id_2;
            $bobot_2 = $this->db->query("SELECT nilai,bobot FROM analisis_alternatif WHERE kode_kriteria = '$id' AND guru_id_1 = '$guru_id_1' AND guru_id_2 = '$guru_id_2'");
            $totaljumlah = $bobot_2->row()->nilai/$bobot_2->row()->bobot;
            $this->db->query("UPDATE analisis_alternatif SET jumlah = '$totaljumlah' WHERE kode_kriteria = '$id' AND guru_id_1 = '$guru_id_1' AND guru_id_2 = '$guru_id_2'");
        }

        $data = array();
        foreach ($guru->result() as $k) {
            $guru_id = $k->id;
            $jumlah = $this->db->query("SELECT SUM(jumlah) as total_jumlah FROM analisis_alternatif WHERE kode_kriteria = '$id' AND guru_id_1 = '$guru_id'");
            $nilai_alternatif = $jumlah->row()->total_jumlah/$guru->num_rows();
            array_push($data, 
                array(
                    'guru_id' => $guru_id,
                    'kode_kriteria' => $id,
                    'nilai_alternatif' => $nilai_alternatif
                )
            );
        }
        $this->db->insert_batch('hasil_alternatif', $data);

        $this->session->set_flashdata('berhasil', 'Berhasil menyimpan hasil perhitungan alternatif');
        redirect(base_url('matriks/kriteria/'.$id));
    }

    public function save_ranking() 
    {
        $guru = $this->M_data->selectDataWhere('*', 'guru');
        $kriteria = $this->M_data->selectDataWhere('*', 'kriteria');

        foreach ($guru->result() as $row) {
            $totalnilai = array();
            foreach ($kriteria->result() as $kr) {
                $hasil = $this->db->query("SELECT * FROM hasil_alternatif WHERE guru_id = '$row->id' AND kode_kriteria = '$kr->kode_kriteria'");
                $nilai = $hasil->row()->nilai_alternatif*$kr->nilai_kriteria;
                $totalnilai[] = $nilai;
            }
            $jumlahnilai = array_sum($totalnilai);
            $this->db->query("UPDATE ranking SET nilai = '$jumlahnilai' WHERE guru_id = '$row->id'");
        }

        $this->session->set_flashdata('berhasil', 'Berhasil menyimpan hasil perhitungan alternatif');
        redirect(base_url('matriks/alternatif'));
    }
}
