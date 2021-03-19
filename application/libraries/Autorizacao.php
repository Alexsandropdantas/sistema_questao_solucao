<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Autorizacao
{
    private $CI;
    private $permissaoView = 'login'; // view correspondente à página de usuário sem permissão de acesso
    private $loginView = 'login';     // Recebe o nome da view correspondente à tela de login
    public function __construct(){
        $this->CI = &get_instance();
    }

    function checar_autorizacao()
    {
        $login = $this->CI->session->userdata('controlador_principal')['tb_cadastro_usuarios_login'];
        $senha = $this->CI->session->userdata('controlador_principal')['tb_cadastro_usuarios_senha'];

        log_message('info', '-------------- ChecarAutorizacao -------------------------------------');
        log_message('info', '------ Login: ' . $login . '');
        //log_message('info', '------ Senha' . $senha . '');
        log_message('info', '-------------- ChecarAutorizacao -------------------------------------');

        if($login && $senha){
            $array = array('tb_cadastro_usuarios_login' => $login, 'tb_cadastro_usuarios_senha' => $senha );
            $consultarUsuarios = $this->CI->db->where($array)->get('tb_cadastro_usuarios');
            $usuarioRetornado = $consultarUsuarios->result_array();

            if(count($usuarioRetornado)==0){ redirect($this->permissaoView); }
            else{ return true; }
        }
            else{ redirect($this->permissaoView); }
    }
}
