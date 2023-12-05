<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function login()
    {
        $data['judul'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus anda isi'

        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => "Password harus anda isi"

        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('form_login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();



            // if ($auth == FALSE) {
            //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            //     Username atau Password anda salah!!!
            //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //     <span aria-hidden="true">&times;</span>
            //     </button>
            //   </div>');
            //     redirect('auth/login');
            // } else {
            //     $this->session->set_userdata('username', $auth->username);
            //     $this->session->set_userdata('role_id', $auth->role_id);

            //     switch ($auth->role_id) {
            //         case 1:
            //             redirect('admin/dashboard_admin');
            //             break;
            //         case 2:
            //             redirect('Welcome');
            //             break;
            //         default:
            //             break;
            //     }
            // }
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // user ada
        if ($user) {
            // jika user aktif
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin/dashboard_admin');
                    } else {
                        redirect('Welcome');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password anda salah!!!
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>');
                    redirect('Auth/login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akun anda belum diverifikasi!!!
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                    </div>');
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Username anda salah!!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
              </div>');
            redirect('Auth/login');
        }
    }





    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
