<?php
/**
 * 	@description : Classe acesso a API Receita WS 
 * 	@package 	 : CMS Genezzis
 * 	@author 	 : Cristiano Ramos | https://github.com/CSR4mos | <csramos.poa@gmail.com>
 * 	@license	 : Todos os direitos reservados
 * 	@copyright	 : (c) 2020 - Genezzis Sistemas
 * 	@link 		 : http://genezzis.com | <sistemas@genezzis.com>
 *
 *****************************************************************************/ 
	
class ReceitaController extends Controller {

	public function consultaCNPJ($cnpj = ''){
		$API_WS = 'http://receitaws.com.br/v1/cnpj/';
		$URL = $API_WS.$cnpj;
		return json_decode( file_get_contents($URL) );
	}
}