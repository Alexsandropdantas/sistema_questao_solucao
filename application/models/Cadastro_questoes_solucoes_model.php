<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_questoes_solucoes_model extends CI_Model {

	public function consultar_solucao_texto($texto_questao)
	{
		$this->db->select('tb_cadastro_questoes_solucoes as content');
		$this->db->from('tb_cadastro_questoes_solucoes');   
		$this->db->where('MATCH(tb_cadastro_questoes_solucoes) AGAINST(\''.$texto_questao.'\') LIMIT 1', NULL, true);
		$solucao = $this->db->get()->result();
		return $solucao;
	}

	public function consultar_solucao_id($questao_id)
	{
		$this->db->select('
		tb_cadastro_questoes_solucoes_id as id_questao,
		tb_cadastro_questoes_solucoes_questao as questao,
		tb_cadastro_questoes_solucoes_solucao as solucao,
		tb_cadastro_zulip_bots_tb_cadastro_zulip_bots_id as id_bot,
		tb_cadastro_categorias_tb_cadastro_categorias_id as id_categoria,
		tb_cadastro_categorias_nome as categoria,
		tb_cadastro_zulip_bots_nome as bot');
		$this->db->from('tb_cadastro_questoes_solucoes');
		$this->db->join('tb_cadastro_zulip_bots', 'tb_cadastro_questoes_solucoes.tb_cadastro_zulip_bots_tb_cadastro_zulip_bots_id = tb_cadastro_zulip_bots.tb_cadastro_zulip_bots_id', 'left');
		$this->db->join('tb_cadastro_categorias', 'tb_cadastro_categorias.tb_cadastro_categorias_id = tb_cadastro_questoes_solucoes.tb_cadastro_categorias_tb_cadastro_categorias_id', 'left');
		$this->db->where("tb_cadastro_questoes_solucoes_id", $questao_id);
		return $solucao = $this->db->get()->result();
	}

	public function consultar_solucao_full_text_search($questao_id)
	{
		$this->db->select('SUBSTRING(tb_cadastro_questoes_solucoes_solucao, 1, 40) as questao_abreviada,
		tb_cadastro_questoes_solucoes_id,
		tb_cadastro_questoes_solucoes_questao,
		tb_cadastro_questoes_solucoes_solucao,
		tb_cadastro_zulip_bots_tb_cadastro_zulip_bots_id,
		tb_cadastro_categorias_tb_cadastro_categorias_id,
		tb_cadastro_categorias_nome,
		tb_cadastro_zulip_bots_nome');
		$this->db->from('tb_cadastro_questoes_solucoes');
		$this->db->join('tb_cadastro_zulip_bots', 'tb_cadastro_questoes_solucoes.tb_cadastro_zulip_bots_tb_cadastro_zulip_bots_id = tb_cadastro_zulip_bots.tb_cadastro_zulip_bots_id', 'left');
		$this->db->join('tb_cadastro_categorias', 'tb_cadastro_categorias.tb_cadastro_categorias_id = tb_cadastro_questoes_solucoes.tb_cadastro_categorias_tb_cadastro_categorias_id', 'left');
		$this->db->where('MATCH(tb_cadastro_questoes_solucoes_questao) AGAINST(\''.$questao_id.'\') LIMIT 1', NULL, true);
		return $solucao = $this->db->get()->result();
	}

	public function consultar_todas_questoes_solucoes()
	{
		$this->db->select('SUBSTRING(tb_cadastro_questoes_solucoes_solucao, 1, 40) as questao_abreviada,
			tb_cadastro_questoes_solucoes_id,
			tb_cadastro_questoes_solucoes_questao,
			tb_cadastro_questoes_solucoes_solucao,
			tb_cadastro_zulip_bots_tb_cadastro_zulip_bots_id,
			tb_cadastro_categorias_tb_cadastro_categorias_id,
			tb_cadastro_categorias_id,
			tb_cadastro_categorias_nome,
			tb_cadastro_zulip_bots_id,
			tb_cadastro_zulip_bots_nome,
			tb_cadastro_zulip_bots_apikey,
			tb_cadastro_usuarios_tb_cadastro_usuarios_id');
		$this->db->from('tb_cadastro_questoes_solucoes');
		$this->db->join('tb_cadastro_zulip_bots', 'tb_cadastro_questoes_solucoes.tb_cadastro_zulip_bots_tb_cadastro_zulip_bots_id = tb_cadastro_zulip_bots.tb_cadastro_zulip_bots_id', 'left');
		$this->db->join('tb_cadastro_categorias', 'tb_cadastro_categorias.tb_cadastro_categorias_id = tb_cadastro_questoes_solucoes.tb_cadastro_categorias_tb_cadastro_categorias_id', 'left');
		$this->db->where('tb_cadastro_questoes_solucoes_ativo <>', 0);
		return $query = $this->db->get()->result();
	}

	public function adicionar_questao_solucao($questao, $resolucao, $botid, $categoriaid)
	{
		$data = array(
			'tb_cadastro_questoes_solucoes_questao' => $questao,
			'tb_cadastro_questoes_solucoes_solucao' => $resolucao,
			'tb_cadastro_zulip_bots_tb_cadastro_zulip_bots_id' => intval($botid),
			'tb_cadastro_categorias_tb_cadastro_categorias_id' => intval($categoriaid)
		);
		$this->db->insert('tb_cadastro_questoes_solucoes', $data);
	}

	public function update_questao_solucao($id_questao, $questao, $resolucao, $botid, $categoriaid)
	{
		$data = array(
			'tb_cadastro_questoes_solucoes_questao' => $questao,
			'tb_cadastro_questoes_solucoes_solucao' => $resolucao,
			'tb_cadastro_zulip_bots_tb_cadastro_zulip_bots_id' => intval($botid),
			'tb_cadastro_categorias_tb_cadastro_categorias_id' => intval($categoriaid)
		);
		$this->db->where('tb_cadastro_questoes_solucoes_id', $id_questao);
		$this->db->update('tb_cadastro_questoes_solucoes', $data);
	}

	// Apenas masca para não ser mostrada, pois pode ser útil futuramente
	public function delete_questao_solucao($id_questao)
	{
		$data = array('tb_cadastro_questoes_solucoes_ativo' => 0);
		$this->db->where('tb_cadastro_questoes_solucoes_id', $id_questao);
		$this->db->update('tb_cadastro_questoes_solucoes', $data);
	}

	public function preencher_editar()
	{
		$this->db->select('tb_cadastro_zulip_bots_tb_cadastro_zulip_bots_id');
		$this->db->from('tb_cadastro_questoes_solucoes');
		return $solucao = $this->db->get()->result();
	}
}