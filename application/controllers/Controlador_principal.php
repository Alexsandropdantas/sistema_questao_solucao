<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador_principal extends CI_Controller {

	public function index()
	{
		$this->load->library('autorizacao');
		$this->autorizacao->checar_autorizacao();
		$dados = array('dados'=>'exemplo de envio');
		$this->load->view('templates/cabecalho');
		$this->load->view('tela_principal', $dados);
		$this->load->view('templates/rodape');
	}


	// Método criado para interagir com os bots do Zulip
	public function troca_de_mensagens_bot()
	{
		$input_data = json_decode(trim(file_get_contents('php://input')), true); // recebe os dados enviados no Zulip
		$usuario = $input_data['message']['sender_full_name'];
		$email_do_usuario = $input_data['message']['sender_email'];
		$questao_submetida_pelo_usuario = $input_data['data'];

		$this->load->model('cadastro_questoes_solucoes_model');
		$solucao_do_banco = $this->cadastro_questoes_solucoes_model->consultar_solucao($questao_submetida_pelo_usuario);
		$solucao_completa = "";
		$contador = 1;
		if ($solucao_do_banco){
			foreach ($solucao_do_banco as $row){
				if($contador == 1)
					$solucao_completa = $solucao_completa ."\n". $row->content;
				else
					$solucao_completa = $row->content;
				$contador = $contador + 1;
			}
		} else {
			// Quando não encontrar nada relacionado com o que foi questionado
			$solucao_completa = $solucao_padrao;
		}

		$dados = array('content'=> $solucao_completa);
		echo json_encode($dados);



			/** Exemplo de respota com oi para o bot no Zulip
 {
   "data":"oi",
   "message":{
      "id":406,
      "sender_id":9,
      "content":"oi",
      "recipient_id":22,
      "timestamp":1613967573,
      "client":"website",
      "subject":"",
      "topic_links":[
         
      ],
      "rendered_content":"<p>oi</p>",
      "is_me_message":false,
      "reactions":[
         
      ],
      "submessages":[
         
      ],
      "sender_full_name":"AlexsandroZulip",
      "sender_email":"alexsandrozulip@gmail.com",
      "sender_realm_str":"",
      "display_recipient":[
         {
            "email":"alexsandrozulip@gmail.com",
            "full_name":"AlexsandroZulip",
            "id":9,
            "is_mirror_dummy":false
         },
         {
            "id":15,
            "email":"zulip-bot@testezulip.com.br",
            "full_name":"bot_zulip",
            "is_mirror_dummy":false
         }
      ],
      "type":"private",
      "avatar_url":"https://secure.gravatar.com/avatar/dbc2433ff617feaa1d6b04d0d5f59bfd?d=identicon&version=1",
      "content_type":"text/x-markdown"
   },
   "bot_email":"zulip-bot@testezulip.com.br",
   "token":"nDQxYKukNexFbCwaz04dNKaFYAzP149O",
   "trigger":"private_message"
}
 */
	}



	public function mensagens_tela_busca()
	{
		$input_data = json_decode(trim(file_get_contents('php://input')), true);  // recebe o post json da tela de busca
		$usuario = $input_data['message']['sender_full_name'];
		$email_do_usuario = $input_data['message']['sender_email'];
		$texto_enviado = $input_data['data'];

		$this->load->model('cadastro_questoes_solucoes_model');
		$solucao_do_banco = $this->cadastro_questoes_solucoes_model->consultar_solucao("O que é um analizador");

		$solucao_completa = "Olá, ";
		if ($solucao_do_banco){
			foreach ($solucao_do_banco as $row){
				 $solucao_completa = $row->content;
			}
		} else {
			$solucao_do_banco = "sem respota";
		}

		$dados = array('content'=> $solucao_completa);
		echo json_encode($dados);

	}
	
	// Carrega a tela dos bots
	public function bots()
	{
		$this->load->model('cadastro_bots_model');
		$resultadobanco = $this->cadastro_bots_model->consultar_bots();
		$data = array("tabela_bots" => $resultadobanco);
		$this->load->view('templates/cabecalho');
		$this->load->view('tela_bots', $data);
		$this->load->view('templates/rodape');
	}

	// Carrega a tela de relatórios
	public function relatorios()
	{
		$dados = array('a'=>'a');
		$this->load->view('templates/cabecalho');
		$this->load->view('tela_relatorios', $dados);
		$this->load->view('templates/rodape');
	}

	// Carrega a tela de usuario
	public function usuario()
	{
		$this->load->model('cadastro_usuarios_model');
		$resultadobanco = $this->cadastro_usuarios_model->consultar_usuarios();
		$dados = array("tabela_usuarios" => $resultadobanco);
		$this->load->view('templates/cabecalho');
		$this->load->view('tela_usuario', $dados);
		$this->load->view('templates/rodape');
	}

	// Carrega a tela de categorias
	public function categorias()
	{
		$this->load->model('cadastro_categorias_model');
		$resultadobanco = $this->cadastro_categorias_model->consultar_categorias();
		$data = array("tabela_categorias" => $resultadobanco);
		$this->load->view('templates/cabecalho');
		$this->load->view('tela_categorias', $data);
		$this->load->view('templates/rodape');
	}

	
	// Carrega a tela de questoes e solucoes
	public function questoes_solucoes()
	{
		$this->load->library('autorizacao');
		$this->autorizacao->checar_autorizacao();

		// Consultar cadastro de questões e soluções
		$this->load->model('cadastro_questoes_solucoes_model');
		$resulta_consultar_questoes_respotas = $this->cadastro_questoes_solucoes_model->consultar_todas_questoes_solucoes();

		// Consultar Cadastro_categorias_model método consultar_categorias
		$this->load->model('cadastro_categorias_model');
		$resulta_consultar_categorias = $this->cadastro_categorias_model->consultar_categorias();

		// Consultar Cadastro_bots_model método consultar_bots
		$this->load->model('cadastro_bots_model');
		$resulta_consultar_bots = $this->cadastro_bots_model->consultar_bots();

		// Montagem do array para uso da página
		$data = array("tabela_questoes_solucoes" => $resulta_consultar_questoes_respotas, 
					  "tabela_categorias" => $resulta_consultar_categorias,
					  "tabela_bots" => $resulta_consultar_bots
					);
		
		// Carregamento das páginas
		$this->load->view('templates/cabecalho');
		$this->load->view('tela_questoes_solucoes', $data);
		$this->load->view('templates/rodape');
	}


	// Carregado após busca na página
	// Criado para testar o que irá de solucao para os bots
	public function buscar_questao()
	{
		$resultado_consultar_questoes_solucoes = "";
		$busca = $this->input->post('input_busca');  // nome do input de busca da tela "input_busca"

		log_message('debug', '--------------------------------------------------------------');
		log_message('debug', '--------------------------------------------------------------');
		log_message('debug', '$busca: '.$busca);
		log_message('debug', '--------------------------------------------------------------');
		log_message('debug', '--------------------------------------------------------------');


		if($busca){
			$this->load->model('cadastro_questoes_solucoes_model');
			$resultado_consultar_questoes_solucoes = $this->cadastro_questoes_solucoes_model->consultar_solucao_full_text_search($busca);
			log_message('debug', 'Busca = '.$busca);
		}else{
			$this->load->model('cadastro_questoes_solucoes_model');
			$resultado_consultar_questoes_solucoes = $this->cadastro_questoes_solucoes_model->consultar_todas_questoes_solucoes();
			log_message('error', 'buscar_questao com busca = NULA');
		}
		log_message('info', 'Fim da busca por: '.$busca);


		// Cadastro_categorias_model->consultar_categorias
		$this->load->model('cadastro_categorias_model');
		$resultado_consultar_categorias = $this->cadastro_categorias_model->consultar_categorias();

		$this->load->model('cadastro_bots_model');
		$resultado_consultar_bots = $this->cadastro_bots_model->consultar_bots();


		$data = array("tabela_questoes_solucoes" => $resultado_consultar_questoes_solucoes, 
						"tabela_categorias" => $resultado_consultar_categorias,
						"tabela_bots" => $resultado_consultar_bots
					);
		
		//echo var_dump($data);
		$this->load->view('templates/cabecalho');
		$this->load->view('tela_questoes_solucoes', $data);
		$this->load->view('templates/rodape');
	}



	public function preencher_questoes_solucoes_ajax() // crud
	{
		$valor = $this->input->post('valor');
		//$dados = array('acao'=>$acao, 'valor'=>$valor);
		//echo json_encode($dados);

		$this->load->model('cadastro_questoes_solucoes_model');
		$data=$this->cadastro_questoes_solucoes_model->consultar_solucao_id($valor);
		echo json_encode($data);
	}


	// 
	public function questoes_solucoes_crud() // crud sem o c
	{
		$questao = $this->input->post("questao");
		$resolucao = $this->input->post("resolucao");
		$botid = $this->input->post("botid");
		$categoriaid = $this->input->post("categoriaid");
		$id_questao = $this->input->post("questaoid");
		$tipoacao = $this->input->post('tipoacao');

		log_message('info', '---------------------------------------------------');
		log_message('info', '---------------------------------------------------');
		log_message('info', '$questao = '.$questao);
		log_message('info', '$resolucao = '.$resolucao);
		log_message('info', '$botid = '.$botid);
		log_message('info', '$categoriaid = '.$categoriaid);
		log_message('info', '$id_questao = '.$id_questao);
		log_message('info', '$tipoacao = '.$tipoacao);
		log_message('info', '---------------------------------------------------');
		log_message('info', '---------------------------------------------------');


		switch ($tipoacao) {
			case 'c':
				log_message('info', ' inicio - adicionar_questao_solucao ');
				$this->load->model('cadastro_questoes_solucoes_model');
				$resultadobanco = $this->cadastro_questoes_solucoes_model->adicionar_questao_solucao($questao, $resolucao, $botid, $categoriaid);
				log_message('info', ' fim - adicionar_questao_solucao ');
				break;

			case 'u':
				log_message('info', ' inicio - update_questao_solucao ');
				$this->load->model('cadastro_questoes_solucoes_model');
				$resultadobanco = $this->cadastro_questoes_solucoes_model->update_questao_solucao($id_questao, $questao, $resolucao, $botid, $categoriaid);
				log_message('info', ' fim - update_questao_solucao ');
				break;

			case 'd':
				//deletar_questoes_solucoes($id_questao);
				log_message('info', ' inicio - delete_questao_solucao ');
				$this->load->model('cadastro_questoes_solucoes_model');
				$resultadobanco = $this->cadastro_questoes_solucoes_model->delete_questao_solucao($id_questao);
				log_message('info', ' fim - delete_questao_solucao ');
				break;
			default:
				break;
		}

		if($questao){
			echo '{"solucao":"'.$questao.'"}';
		}else{
			echo '{"solucao":"sem tipo acao"}';
		}
	}

	// Método criar questão e solução
	public function criar_questoes_solucoes($questao, $resolucao, $botid, $categoriaid)
	{
		log_message('info', ' inicio - criar_questoes_solucoes ');
		$this->load->model('cadastro_questoes_solucoes_model');
		$resultadobanco = $this->cadastro_questoes_solucoes_model->adicionar_questao_solucao($questao, $resolucao, $botid, $categoriaid);
		log_message('info', ' fim - criar_questoes_solucoes ');
	}

	// Método atualizar questão e solução
	public function update_questoes_solucoes($id_questao, $questao, $resolucao, $botid, $categoriaid)
	{
		$this->load->model('cadastro_questoes_solucoes_model');
		$resultadobanco = $this->cadastro_questoes_solucoes_model->update_questao_solucao($id_questao, $questao, $resolucao, $botid, $categoriaid);
	}

	// Método para remover questões e soluções das buscas
	public function deletar_questoes_solucoes($id_questao)
	{
		$this->load->model('cadastro_questoes_solucoes_model');
		$resultadobanco = $this->cadastro_questoes_solucoes_model->adicionar_questao_solucao($questao, $resolucao, $botid, $categoriaid);
	}

	//Método adicionar bot
	public function adicionar_bot(){
		$nomebot = $this->input->post("nomebot");
		$chaveapi = $this->input->post("chaveapi");
		$id_usuario = $this->session->userdata('controlador_principal')['tb_cadastro_usuarios_id'];
		$this->load->model('cadastro_bots_model');
		$resultadobanco = $this->cadastro_bots_model->adicionar_bot($nomebot, $chaveapi, $id_usuario);
		log_message('info', "---------------- Controlador_principal adicionar_bot---------------------------");
		log_message('info', "id_usuario ".$id_usuario);
		log_message('info', "nomebot ".$nomebot);
		log_message('info', "chaveapi ".$chaveapi);
		log_message('info', "---------------- Controlador_principal adicionar_bot---------------------------");
		echo '{"solucao":"Bot cadastrado com Sucesso!"}';
	}

	//Método adicionar categoria
	public function adicionar_categoria(){
		$nomedacategoria = $this->input->post("nomedacategoria");
		$this->load->model('cadastro_categorias_model');
		$resultadobanco = $this->cadastro_categorias_model->adicionar_categoria($nomedacategoria);
		log_message('debug', "---------------- Controlador_principal adicionar_categoria---------------------------");
		log_message('debug', "nome da categoria: ".$nomedacategoria);
		log_message('debug', "---------------- Controlador_principal adicionar_categoria---------------------------");
		echo '{"solucao":"Categoria cadastrada com Sucesso!"}';
	}

	//Método adicionar usuario
	public function adicionar_usuario(){
		$nome = $this->input->post("nome");
		$login = $this->input->post("login");
		$senha = $this->input->post("senha");
		$this->load->model('cadastro_usuarios_model');
		$resultadobanco = $this->cadastro_usuarios_model->adicionar_usuario($nome, $login, $senha);
		log_message('debug', "---------------- Controlador_principal adicionar_usuario---------------------------");
		log_message('debug', "nome: ".$nome);
		log_message('debug', "login: ".$login);
		//log_message('info', "senha: ".$senha);
		log_message('debug', "---------------- Controlador_principal adicionar_usuario---------------------------");
		echo '{"solucao":"Bot cadastrado com Sucesso!"}';
	}

}
