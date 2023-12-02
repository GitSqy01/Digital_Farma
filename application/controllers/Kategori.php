<?php

class Kategori extends CI_Controller
{
    public function demam()
    {
        $data['demam'] = $this->model_kategori->data_demam()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('demam', $data);
        $this->load->view('templates/footer');
    }
    public function lambung()
    {
        $data['lambung'] = $this->model_kategori->data_lambung()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lambung', $data);
        $this->load->view('templates/footer');
    }
    public function batuk()
    {
        $data['batuk'] = $this->model_kategori->data_batuk()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('batuk', $data);
        $this->load->view('templates/footer');
    }
    public function sakit_kepala()
    {
        $data['sakit_kepala'] = $this->model_kategori->data_sakit_kepala()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('sakit_kepala', $data);
        $this->load->view('templates/footer');
    }
    public function vitamin()
    {
        $data['vitamin'] = $this->model_kategori->data_vitamin()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('vitamin', $data);
        $this->load->view('templates/footer');
    }
}
