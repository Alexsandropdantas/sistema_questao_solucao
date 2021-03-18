<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_usuarios_model extends CI_Model {

	public function adicionar_usuario($nome, $login, $senha)
	{
		$usuario = array(
			'tb_cadastro_usuarios_nome' => $nome,
			'tb_cadastro_usuarios_login' => $login,
			'tb_cadastro_usuarios_senha' => $senha
		);
		if($usuario != NULL):
			$this->db->insert('tb_cadastro_usuarios',$usuario);
			log_message('debug', ' Bot  '.$usuario['tb_cadastro_usuarios_nome']. ' criado com sucesso!');
		else:
			log_message('error', ' Cadastro de usuário chegou NULL ');
		endif;
		log_message('info', ' Fim do método  adicionarUsuario($nome, $login, $senha) ');
	}
	
	public function atualizar_usuario($usuario, $novousuario)
	{
		$data = array(
					'nome' => $novousuario['nome'],
					'senha' => $novousuario['senha']
					);
		if($usuario != NULL):
			$this->db->update('tb_cadastro_usuarios', $data, array('login' => $usuario['login']));
		else:
			echo "Usuário não pode ser atualizado";
		endif;
	}

	public function consultar_usuario($login, $senha)
	{
		$this->db->select('*');
		$this->db->from('tb_cadastro_usuarios');
		$this->db->where("tb_cadastro_usuarios_login", $login);
		$this->db->where("tb_cadastro_usuarios_senha", $senha);
		$usuario = $this->db->get()->row_array();
		return $usuario;
	}

	public function consultar_usuarios()
	{
		$this->db->select('*');
		$this->db->from('tb_cadastro_usuarios');
		return $query = $this->db->get()->result();

	}

}