<?php
class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('level')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Username tidak boleh kosong!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password tidak boleh kosong!']);

        if ($this->form_validation->run() == false) {
            $data['main_title'] = 'SINTE BPSDM JABAR';
            $data['title'] = 'Login';
            $this->load->view('login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->db->get_where('user', ['username' => $username])->row_array();
        $userskp = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($cek) {
            if (sha1($password) == $cek['password']) {
                $userdata = [
                    'id_user' => $cek['id_user'],
                    'username' => $cek['username'],
                    'level' => $cek['level']
                ];

                $this->session->set_flashdata('message', "<script>Swal.fire(
						'Login berhasil!',
						'You clicked the button!',
						'success'
						)</script>");
                $this->session->set_userdata($userdata);
                if ($this->session->userdata('level') == 1) {
                    redirect('admin');
                } elseif ($this->session->userdata('level') == 2) {
                    redirect('admin');
                }
            } elseif ($this->session->userdata('level') == 3) {
                redirect('userskp');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
            redirect('auth');
        }

        if ($userskp) {
            if ($userskp['isactive'] == 1) {

                // cek password 
                if (password_verify($password, $userskp['password'])) {
                    $userdata = [
                        'id_user' => $cek['id_user'],
                        'username' => $cek['username'],
                        'level' => $cek['level']
                    ];
                    $this->session->set_userdata($userdata);
                    redirect('userskp');

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }


            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Username has not been actived!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
            redirect('auth');
        }
    }

    private function _loginusers()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $userskp = $this->db->get_where('user', ['username' => $username])->row_array();

        // buat users yang register sebagai peserta magang

    }



    public function register()
    {
        $this->form_validation->set_rules('username', 'Uuserame', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('templates/header', $data);
            $this->load->view('register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'image' => 'default.jpg',
                'bio' => htmlspecialchars($this->input->post('bio', true)),
                'facebook' => 'facebook',
                'email' => htmlspecialchars($this->input->post('email', true)),
                'level' => 3,
                'isactive' => 1,
                'datecreate' => time()

            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert 
			alert-success" role="alert" >Congratulation! your account has been 
			created. Please Login</div>');
            redirect('auth');
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout sukses!</div>');
        redirect('auth');
    }
}
