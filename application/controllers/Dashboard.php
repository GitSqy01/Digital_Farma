<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum login!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }


    public function tambah_ke_keranjang($id)
    {
        $obat = $this->model_obat->find($id);

        $data = array(
            'id'      => $obat->id,
            'qty'     => 1,
            'price'   => $obat->harga,
            'name'    => $obat->nama_obat,
        );

        $this->cart->insert($data);
        redirect('Welcome');
    }
    public function detail_keranjang()
    {
        $data['judul'] = 'Detail keranjang';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('Welcome');
    }
    public function pembayaran()
    {
        $data['judul'] = 'pembayaran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        $data['judul'] = 'proses pesanan';
        $is_processed = $this->model_invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer');
        } else {
            echo "Maaf pesanan anda tidak dapat kami proses";
        }
    }
    public function detail($id)
    {
        $data['judul'] = 'detail obat';
        $data['obat'] = $this->model_obat->detail_obat($id);
        $this->cart->destroy();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('detail_obat', $data);
        $this->load->view('templates/footer');
    }
}
