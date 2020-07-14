<?php
/**
 * 	@description : Página de Erros - Protege Acesso pelo navegador - Gambiarra Orientada a Proteção
 * 	@package 	 : CMS Genezzis
 * 	@version 	 : 0.1
 * 	@file 		 : /uploads/index.php
 * 	@author 	 : Cristiano Ramos | http://facebook.com/csramos.poa | <csramos.poa@gmail.com>
 * 	@copyright	 : (c) 2010 - 2018 - Genezzis Sistemas - Todos os direitos reservados
 * 	@link 		 : http://genezzis.com | <sistemas@genezzis.com>
 *
 **********************************************************************************************/ 
 
	 /**
	 * Função para verificar a url 
	 * @param $_SERVER['HTTPS']
	 * @param $_SERVER['HTTP']
	 * @return string get_full_url()
	 * @autor desconhecido
	 */
	function get_full_url() {
		$https = !empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'on') === 0 ||
		!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
			strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;
		return
		($https ? 'https://' : 'http://').
		(!empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
		(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
		($https && $_SERVER['SERVER_PORT'] === 443 ||
		$_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).
		substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
		/* 	Exemplo de Uso : echo get_full_url();  */
	}
	
	// Cria um novo recurso cURL
	$ch = curl_init();
	
	/*
	* Verifica onde o arquivo está sendo executado 
	* LOCALHOST - Ambiente de Teste
	* HTTP - Ambiente de Produção
	*/
	if($arquivo = 'C:/xampp'){
		$template = get_full_url().'/AcessoNegado';
	} else {
		$template = get_full_url().'/AcessoNegado';
	}
	
	// Seta as configurações apropriadas
	curl_setopt($ch, CURLOPT_URL, $template);
	curl_setopt($ch, CURLOPT_HEADER, 0);

	// Executa o $template no browser
	curl_exec($ch);

	// Fecha o recurso cURL
	curl_close($ch);