<?php
/**
 * 	@description : Classe para manipular os erros do sistema
 * 	@package 	 : CMS Genezzis
 * 	@author 	 : Cristiano Ramos | https://github.com/CSR4mos | <csramos.poa@gmail.com>
 * 	@license	 : Todos os direitos reservados
 * 	@copyright	 : (c) 2020 - Genezzis Sistemas
 * 	@link 		 : http://genezzis.com | <sistemas@genezzis.com>
 *
 *****************************************************************************/

class ErrosController extends Controller {
	
	/*
	* Método para EXIBIR a página de Erros 
	* @param $genezzis string
	* @return array com o Erro e a página correspondente
	*/
	public function paginaErro($genezzis,$params){
		
		// Instâcia a Classe de Utilidades
		$salvarLog = new UtilidadesController();
		
		$error = $this->genezzis->get('ERROR.code');
		$slug = $this->genezzis->get('REALM');
		switch ($error) {
			
			case '403' : // Acesso Proibido
				$this->genezzis->set('pageTitle', $this->genezzis->get('TRANSLATE.403titlePage'));
				$this->genezzis->set('slug', $slug);
				$this->genezzis->set('UrlProductOne', $this->genezzis->get('SCHEME').$this->genezzis->get('HOST').$this->genezzis->get('BASE').'cms/planos' );
				$this->genezzis->set('UrlProductTwo', $this->genezzis->get('urlSite').'e-commerce/planos' );
				$this->genezzis->set('UrlProductTree',$this->genezzis->get('urlSite').'curriculo-criativo/planos' );
				$this->genezzis->set('view','errors/403.html');
				echo Template::instance()->render('errors/layout.html');
				$log = 'Error_403';
				$salvarLog->createFullLOG($log); // Grava o LOG
			break;
			
			case '100' : // Continue
			case '101' : // Switching Protocols
			case '103' : // Early Hints
			case '200' : // OK
			case '201' : // Created
			case '202' : // Accepted
			case '203' : //  Non-Authorative Information
			case '204' : // No Content
			case '205' : // Reset Content
			case '206' : // artial Content
			case '300' : // Multiple Choices
			case '301' : // Moved Permanently
			case '302' : // Found
			case '303' : // See Other
			case '304' : // Not Modified
			case '305' : // Use Proxy
			case '307' : // Temporary Redirect
			case '400' : // Bad Request
			case '401' : // Unauthorized
			case '402' : // Payment Required
			case '404' : // Not Found
			case '405' : // Method Not Allowed
			case '406' : // Not Acceptable
			case '407' : // Proxy Authentication Required
			case '408' : // Request Timeout
			case '409' : // Conflict
			case '410' : // Gone
			case '411' : // Length Required
			case '412' : // Precondition Failed
			case '413' : // Request Entity Too Large
			case '414' : // Request-URI Too Long
			case '415' : // Unsupported Media Type
			case '416' : // Requested Range Not Satisfiable
			case '417' : // Expectation Failed
			case '501' : // Not Implemented
			case '502' : // Bad Gateway
			case '503' : // Service Unavailable
			case '504' : // Gateway Timeout
			case '505' : // HTTP Version Not Supported
				$this->genezzis->set('pageTitle', $this->genezzis->get('TRANSLATE.404titlePage'));
				$this->genezzis->set('slug', $slug);
				$this->genezzis->set('UrlProductOne', $this->genezzis->get('SCHEME').$this->genezzis->get('HOST').$this->genezzis->get('BASE').'cms/planos' );
				$this->genezzis->set('UrlProductTwo', $this->genezzis->get('urlSite').'e-commerce/planos' );
				$this->genezzis->set('UrlProductTree',$this->genezzis->get('urlSite').'curriculo-criativo/planos' );
				$this->genezzis->set('view','errors/404.html');
				echo Template::instance()->render('errors/layout/layout.html');
				$log = 'Error_404';
				$salvarLog->createFullLOG($log); // Grava o LOG
			break;
			
			case '500' :
				$this->genezzis->set('pageTitle', $this->genezzis->get('TRANSLATE.500titlePage'));
				$this->genezzis->set('slug', $slug);
				$this->genezzis->set('UrlProductOne', $this->genezzis->get('urlSite').'cms/planos' );
				$this->genezzis->set('UrlProductTwo', $this->genezzis->get('urlSite').'e-commerce/planos' );
				$this->genezzis->set('UrlProductTree',$this->genezzis->get('urlSite').'curriculo-criativo/planos' );
				$this->genezzis->set('view','errors/500.html');
				echo Template::instance()->render('errors/layout/layout.html');
				$log = 'Error_500';
				$salvarLog->createFullLOG($log); // Grava o LOG
			break;
			
			default:
				$this->genezzis->set('pageTitle', $this->genezzis->get('TRANSLATE.404titlePage'));
				$this->genezzis->set('slug', $slug);
				$this->genezzis->set('UrlProductOne', $this->genezzis->get('urlSite').'cms/planos' );
				$this->genezzis->set('UrlProductTwo', $this->genezzis->get('urlSite').'e-commerce/planos' );
				$this->genezzis->set('UrlProductTree',$this->genezzis->get('urlSite').'curriculo-criativo/planos' );
				$this->genezzis->set('view','errors/404.html');
				echo Template::instance()->render('errors/layout/layout.html');
				$log = 'Error_404';
				$salvarLog->createFullLOG($log); // Grava o LOG
		}
    }
}