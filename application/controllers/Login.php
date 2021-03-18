<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{
		if(isset($_SESSION['controlador_principal'])){
			redirect(base_url("/controlador_principal"));
		}else{
			if($this->input->post("password")){
				$login = $this->input->post("login");
				$senha = $this->input->post("password");
				$this->load->model('cadastro_usuarios_model');
				$usuario = $this->cadastro_usuarios_model->consultar_usuario($login, $senha);
				
				if($usuario){
					$this->session->set_userdata("controlador_principal", $usuario);
					redirect(base_url("/controlador_principal"));
				}else{
					// Errou login ou senha volta para a tela de login
					$this->load->view('login');
				}
			}else{
				// Caso não enviar a senha retorna para a tela de login
				$this->load->view('login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata("controlador_principal");
		redirect(base_url('login'), 'refresh');
	}

}
