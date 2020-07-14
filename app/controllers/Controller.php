<?php
/**
 * 	@description : Classe Controller Genérica 
 * 	@package 	 : CMS Genezzis
 * 	@author 	 : Cristiano Ramos | https://github.com/CSR4mos | <csramos.poa@gmail.com>
 * 	@license	 : Todos os direitos reservados
 * 	@copyright	 : (c) 2020 - Genezzis Sistemas
 * 	@link 		 : http://genezzis.com | <sistemas@genezzis.com>
 *
 *****************************************************************************/

class Controller {

	protected $genezzis;
	
	/* Método beforeroute - exibe uma mensagem após o uso da rota */
	function beforeroute() {
		//$this->genezzis->set('mensagem','');
	}

	/* Método afterroute - cria o encapsulamento antes de exibir a rota */
	function afterroute() {
		//echo Template::instance()->render('layout.htm');
		//$this->genezzis->set('mensagemTeste','lorem');
	}
	
	/* Método construtor da classe */
	function __construct() {
		
		/* Cria uma instancia do Framework */
        $genezzis=Base::instance();
		
		/* 
		* Define o Ambiente de Desenvolvimento
		* @return boolean TRUE = Desenvolvimento / FALSE = Produção
		*/
		$this->genezzis=$genezzis;
		$this->genezzis->set('developer','TRUE');
		
		/*
		* Define o ambiente de trabalho
		* TRUE = desenvolvimento
		* FALSE = produção
		*/
		$urlCDN = $this->genezzis->set('urlCDN',($this->genezzis->get('developer')=='TRUE') ? 'http://localhost/www.cdn.genezzis.com/genezzis/ui/' : 'https://cdn.genezzis.com/cms/ui/');
		$urlBloqueado = $this->genezzis->set('urlBloqueado',($this->genezzis->get('developer')=='TRUE') ? 'http://localhost/www.bloqueado.curriculocriativo.com/' : 'https://bloqueado.curriculocriativo.com');
		
		// Urls dos anúncios das Páginas de Erros
		$urlProduto1 = $this->genezzis->set('urlProduto1',($this->genezzis->get('developer')=='TRUE') ? 'http://localhost/www.cms.genezzis.com' : 'https://cms.genezzis.com');
		$urlProduto2 = $this->genezzis->set('urlProduto2',($this->genezzis->get('developer')=='TRUE') ? 'http://localhost/www.loja.genezzis.com' : 'https://loja.genezzis.com');
		$urlProduto3 = $this->genezzis->set('urlProduto3',($this->genezzis->get('developer')=='TRUE') ? 'http://localhost/www.curriculocriativo.com' : 'https://curriculocriativo.online');
	}
}