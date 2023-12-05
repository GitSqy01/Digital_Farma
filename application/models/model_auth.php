<?php

class Model_auth extends CI_Model
{
    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {

            if ($user['is_active'] == 1) {
                // jika aktif
            } else {
                $this->session->set_flashdata('pesan2', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akun anda belum diverifikasi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            }
        } else {
            return array();
        }
    }
}
