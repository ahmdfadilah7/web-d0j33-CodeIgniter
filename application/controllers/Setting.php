<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
		$data['view'] = 'setting/index';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting');
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('layouts/app', $data);
	}

    public function add() 
    {
        $data['view'] = 'setting/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('layouts/app', $data);
    }

    public function proses_add() 
    {
        $this->form_validation->set_rules('nama_website', 'Nama Website', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('setting/add'));
        } else {
            $insert['nama_website'] = $this->input->post('nama_website');
            
            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['logo_website']['name']);
            $ext = end($dname);
            $nama = 'Logo'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('logo_website')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['logo_website'] = 'assets/images/'.$nama;
            }

            $config2['upload_path'] = "assets/images/";
            $config2['overwrite'] = TRUE;            
            $config2['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname2 = explode(".", $_FILES['favicon_website']['name']);
            $ext2 = end($dname2);
            $nama2 = 'Favicon'."-".time().'-'.rand(100,999).".".$ext2;
            $config2['file_name'] = $nama2;
            $config2['remove_spaces'] = FALSE;
            $this->upload->initialize($config2);
            if (!$this->upload->do_upload('favicon_website')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['favicon_website'] = 'assets/images/'.$nama2;
            }

            $this->M_data->insert($insert, 'setting');

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan Setting');
            redirect(base_url('setting'));
        }
    }

    public function edit($id) 
    {
        $data['view'] = 'setting/edit';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting', 'id', $id)->row();
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('layouts/app', $data);        
    }

    public function proses_edit($id) 
    {
        $this->form_validation->set_rules('nama_website', 'Nama Website', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('setting/edit/'.$id));
        } else {
            $insert['nama_website'] = $this->input->post('nama_website');
            
            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['logo_website']['name']);
            $ext = end($dname);
            $nama = 'Logo'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('logo_website')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['logo_website'] = 'assets/images/'.$nama;
            }

            $config2['upload_path'] = "assets/images/";
            $config2['overwrite'] = TRUE;            
            $config2['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname2 = explode(".", $_FILES['favicon_website']['name']);
            $ext2 = end($dname2);
            $nama2 = 'Favicon'."-".time().'-'.rand(100,999).".".$ext2;
            $config2['file_name'] = $nama2;
            $config2['remove_spaces'] = FALSE;
            $this->upload->initialize($config2);
            if (!$this->upload->do_upload('favicon_website')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['favicon_website'] = 'assets/images/'.$nama2;
            }

            $this->M_data->updateData($insert, 'setting', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit Setting');
            redirect(base_url('setting'));
        }
    }

    public function delete($id) 
    {
        $where = array('id' => $id);
        $delete = $this->M_data->delete('setting', $where);
        if ($delete) {
            $this->session->set_flashdata('berhasil', 'setting berhasil dihapus');
            redirect(base_url('setting'));
        } else {
            $this->session->set_flashdata('gagal', 'setting gagal dihapus');
            redirect(base_url('setting'));
        }
    }
}
