<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_categorias_model extends CI_Model {

	public function adicionar_categoria($categoria_nome)
	{
		if($categoria_nome != NULL):
			$this->db->insert('tb_cadastro_categorias', array('tb_cadastro_categorias_nome' => $categoria_nome));
			log_message('debug', 'Criada a categoria  '.$categoria_nome. ' com sucesso!');
		else:
			log_message('error', 'Erro ao cadastrar a categoria '.$categoria_nome);
		endif;
		log_message('info', 'Fim do método adicionar_categoria no Cadastro_categorias_model');
	}
	
	public function atualizar_categoria($categoria_id, $novo_nome_categoria)
	{
		$data = array(
					'nome' => $novo_nome_categoria['nome'],
					);
		if($categorias != NULL):
			$this->db->update('tb_cadastro_categorias', $data, array('login' => $categorias['login']));
		else:
			log_message('error', ' Erro ao atualizar_categoria a categoria');
		endif;
		log_message('info', 'Fim do método adicionar_categoria no Cadastro_categorias_model');
	}

	public function consultar_categorias()
	{
		$this->db->select('*');
		$this->db->from('tb_cadastro_categorias');
		return $query = $this->db->get()->result();

	}

}