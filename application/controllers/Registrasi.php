<?php

class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('nama', ' Nama', 'required|trim', [
            'required' => 'Harap isi ya!'
        ]);
        $this->form_validation->set_rules('username', ' Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Harap isi ya!',
            'is_unique' => 'username ini sudah ada! silahkan ganti'

        ]);
        $this->form_validation->set_rules('email', ' Email', 'required|valid_email|is_unique[user.email]', [
            'required' => 'Harap isi ya!',
            'is_unique' => 'alamat email ini sudah digunakan!'
        ]);
        $this->form_validation->set_rules('no_telp', ' No_telp', 'required', [
            'required' => 'Harap isi ya!'
        ]);
        $this->form_validation->set_rules('password_1', ' Password', 'required|trim|min_length[4]|matches[password_2]|is_unique[user.password]', [
            'required' => 'Harap isi ya!',
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password minimal 4 karakter'
        ]);
        $this->form_validation->set_rules('password_2', ' Password', 'required|matches[password_1]');
        $this->form_validation->set_rules('image', ' Image', 'required', [
            'required' => 'Upload dulu Foto ya!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'registrasi';
            $this->load->view('templates/header', $data);
            $this->load->view('registrasi');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = array(
                'id' => '',
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'image' => $this->input->post('image'),
                'password' => password_hash($this->input->post('password_1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
            );

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'id' => '',
                'token' => $token,
                'email' => $email,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);


            $this->_sendEmail($token, 'verify');


            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Selamat, akun berhasil dibuat, silahkan cek email untuk verify</div>');
            redirect('auth/login');
        }
    }


    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'rifqifr.mm2@gmail.com',
            'smtp_pass' => 'yldv diep fymr qqkn',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('rifqifr.mm2@gmail.com', 'Rifqi');
        $this->email->to($this->input->post('email'));


        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun_Digital Farma');
            $this->email->message('Klik link dibawah untuk memverifikasi bahwa email ini milik anda : <br>
            <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) .     '">Verifikasi</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debbuger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Selamat, akun berhasil diverifikasi</div>');
                    redirect('auth/login');
                } else {

                    $this->db->delete('user', ['email' =>  $email]);
                    $this->db->delete('user_token', ['email' =>  $email]);


                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Token Expired!</div>');
                    redirect('Auth/login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Token Invalid</div>');
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Aktivasi Akun Anda Gagal!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
              </div>');
            redirect('Auth/login');
        }
    }
}
