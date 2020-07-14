<?php
/**
 * 	@description : Classe para manipular os idiomas do sistema
 * 	@package 	 : CMS Genezzis
 * 	@author 	 : Cristiano Ramos | https://github.com/CSR4mos | <csramos.poa@gmail.com>
 * 	@license	 : Todos os direitos reservados
 * 	@copyright	 : (c) 2020 - Genezzis Sistemas
 * 	@link 		 : http://genezzis.com | <sistemas@genezzis.com>
 *
 *****************************************************************************/

class IdiomasController extends Controller {
	
	/*
	* Verifica o Idioma Padrão
	* @param $genezzis string
	* @param $params string
	* @return array com os valores dos campos
	*/
	public function getLang($genezzis){
		
		if($this->genezzis->exists('SESSION.lang')){
			$idiomaPadrao = $this->genezzis->get('SESSION.lang');
			$this->genezzis->set('TRANSLATE.default',$idiomaPadrao);
			$this->genezzis->set('LANGUAGE',$idiomaPadrao);
				
		} else {
			
			$idiomaDetectado = $this->genezzis->get('LANGUAGE');
			$idiomaPadrao = strstr($idiomaDetectado,',',TRUE); // Quebra a string quando ocorrer a vírgula
			$this->genezzis->set('TRANSLATE.default',$idiomaPadrao);
			$this->genezzis->set('LANGUAGE',$idiomaPadrao);
		}
	}
	
	/*
	* Define um idioma Padrão
	* @param $genezzis string
	* @param $params string
	* @return array com os valores dos campos
	*/
	public function setLang($genezzis){
		
		$idiomaPadrao = $this->genezzis->get('PARAMS.lang');
		$this->genezzis->set('SESSION.lang',$idiomaPadrao);
		$this->genezzis->set('TRANSLATE.default',$idiomaPadrao);
		$this->genezzis->set('LANGUAGE',$idiomaPadrao);
		$this->genezzis->reroute($this->genezzis->get('site.url'));
	}
	
	/*
	* Define um idioma Padrão
	* @param $genezzis string
	* @param $params string
	* @return array com os valores dos campos
	*/
	public function dashboardSetLang($genezzis){
		
		$idiomaPadrao = $this->genezzis->get('PARAMS.lang');
		$this->genezzis->set('SESSION.lang',$idiomaPadrao);
		$this->genezzis->set('TRANSLATE.default',$idiomaPadrao);
		$this->genezzis->set('LANGUAGE',$idiomaPadrao);
		$this->genezzis->reroute($this->genezzis->get('site.url').$this->genezzis->get('TRANSLATE.default').'/dashboard');
	}
	
	/*
	* Cadastra um idioma no Currículo
	* @param $genezzis string
	* @param $params string
	* @return array com os valores dos campos
	*/
	public function addLanguageResume($genezzis){
		
		// Grava os dados no banco
		$idiomasCV = new IdiomasCV($this->db);
		$idiomasCV->curriculoID = $this->genezzis->get('SESSION.usuarioLogado');
		$idiomasCV->idiomaNome = $this->genezzis->set('idioma',($this->genezzis->exists('POST.idioma')) ? $this->genezzis->get('POST.idioma') : null );
		$idiomasCV->idiomaNivelUsuario = $this->genezzis->set('nivel',($this->genezzis->exists('POST.nivel')) ? $this->genezzis->get('POST.nivel') : null );
		$idiomasCV->idiomaCadastro = date('Y-m-d H:i:s');
		$idiomasCV->idiomaStatus = 'A'; // A = Ativo | C = Cancelado | I = Inativo | S = Suspenso
		$cadastro = $idiomasCV->add();
			
		// Envia um link ao email cadastrado
		//$mailer = new MailerController();
		//$caso = '5'; // Nova Conta PF
		//$enviar = $mailer->sendMail($nome,$email,$caso);
	}
}