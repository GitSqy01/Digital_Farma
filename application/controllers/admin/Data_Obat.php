<?php

class Data_Obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum login!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['judul'] = 'data obat';
        $data['obat'] = $this->model_obat->tampil_data()->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_obat', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambah_aksi()
    {
        $nama_obat      = $this->input->post('nama_obat');
        $id_kategori   = $this->input->post('id_kategori');
        $pembuat       = $this->input->post('pembuat');
        $harga         = $this->input->post('harga');
        $stok          = $this->input->post('stok');
        $image         = $_FILES['image']['name'];
        if ($image = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo "GAMBAR GAGAL DIUPLOAD";
            } else {
                $image = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_obat'  => $nama_obat,
            'id_kategori' => $id_kategori,
            'pembuat'   => $pembuat,
            'harga'     => $harga,
            'stok'      => $stok,
            'image'     => $image
        );

        $this->model_obat->tambah_obat($data, 'obat');
        redirect('admin/data_obat/index');
    }

    public function edit($id)
    {
        $data['judul'] = 'edit obat';
        $where = array('id' => $id);
        $data['obat'] = $this->model_obat->edit_obat($where, 'obat')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_obat', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id     = $this->input->post('id');
        $nama_obat     = $this->input->post('nama_obat');
        $id_kategori     = $this->input->post('id_kategori');
        $pembuat     = $this->input->post('pembuat');
        $harga     = $this->input->post('harga');
        $stok     = $this->input->post('stok');

        $data = array(
            'nama_obat' => $nama_obat,
            'id_kategori' => $id_kategori,
            'pembuat' => $pembuat,
            'harga' => $harga,
            'stok' => $stok
        );

        $where = array(
            'id' => $id
        );

        $this->model_obat->update_data($where, $data, 'obat');
        redirect('admin/Data_Obat/index');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->model_obat->hapus_data($where, 'obat');
        redirect('admin/Data_Obat/index');
    }
}
