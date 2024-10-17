<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_auth extends CI_Controller {

	public function Login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$admin = $this->db->get_where('admin', ['username' => $username])->row_array();

		// cek admin
		if ($admin) {
				
			// cek password
			if ($admin['password'] == $password) {
				
					$admin = [
							'username'		=> $admin['username'],
						];

					$_SESSION['admin']= $admin;

				
					$this->session->set_flashdata('message', 
						'<div class="alert alert-light-primary color-primary text-center"><i class="bi bi-star"></i> Selamat data admin Giri Senang. </div>
					');

					redirect('Admin/Dashboard');			

			}else{

				$this->session->set_flashdata('message', 
						'<div class="alert alert-light-danger color-danger text-center"><i class="bi bi-exclamation-circle"></i> Password yang anda masukan salah. </div>
					');

				redirect('Auth/Login');
			}

		}else{

			$this->session->set_flashdata('message', 
						'<div class="alert alert-light-danger color-danger text-center"><i class="bi bi-exclamation-circle"></i> Username yang anda masukan salah.</div>
					');

			redirect('Auth/Login');
		}
	}

	public function logout()
	{
		session_destroy();

		$this->session->set_flashdata('message', 
						'<div class="alert alert-light-danger color-danger text-center"><i class="bi bi-exclamation-circle"></i>Maaf anda harus login terlebih dahulu. </div>
					');
		redirect('Auth/login');
	}
}

// $this->library->printr($total_saldo);