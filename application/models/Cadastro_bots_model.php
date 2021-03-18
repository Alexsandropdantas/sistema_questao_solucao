<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_bots_model extends CI_Model {

	public function adicionar_bot($nomebot, $chaveapi, $id_usuario)
	{
		$bot = array(
			'tb_cadastro_zulip_bots_nome' => $nomebot,
			'tb_cadastro_zulip_bots_apikey' => $chaveapi,
			'tb_cadastro_usuarios_tb_cadastro_usuarios_id' => $id_usuario
		);
		if($bot != NULL):
			$this->db->insert('tb_cadastro_zulip_bots',$bot);
			log_message('debug', ' Bot  '.$nomebot. ' criado com sucesso!');
		else:
			log_message('error', ' Erro ao cadastrar Bot');
		endif;
		log_message('info', 'Fim do método adicionar_bot no Cadastro_bots_model');
	}
	
	public function atualizar_bot($nomebot, $chaveapi)
	{
		$bot = array(
			'nome' => $nomebot,
			'senha' => $chaveapi
		);
		if($bot != NULL):
			$this->db->update('tb_cadastro_bots', $data, array('login' => $bot['login']));
			log_message('debug', ' Bot atualizado com sucesso.');
		else:
			log_message('error', ' Erro ao Bot não pode ser atualizado.');
		endif;
		log_message('info', 'Fim do método atualizar_bot no Cadastro_bots_model');
	}

	public function consultar_bots()
	{
		$this->db->select('*');
		$this->db->from('tb_cadastro_zulip_bots');
		$this->db->join('tb_cadastro_usuarios', 'tb_cadastro_usuarios.tb_cadastro_usuarios_id = tb_cadastro_zulip_bots.tb_cadastro_usuarios_tb_cadastro_usuarios_id', 'left');
		return $query = $this->db->get()->result();
		log_message('info', 'Fim do método consultar_bots no Cadastro_bots_model');
	}


}