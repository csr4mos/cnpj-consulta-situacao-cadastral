<?php
/**
 * 	@description : Arquivo de índice
 * 	@package 	 : CMS Genezzis
 * 	@author 	 : Cristiano Ramos | https://github.com/CSR4mos | <csramos.poa@gmail.com>
 * 	@license	 : Todos os direitos reservados
 * 	@copyright	 : (c) 2020 - Genezzis Sistemas
 * 	@link 		 : http://genezzis.com | <sistemas@genezzis.com>
 *
 *****************************************************************************/
	
	$url = '../../access-denied';
	//$url = realpath(dirname(__FILE__)).'../access-denied';
	//echo $url = (dirname(__DIR__)).'/access-denied';
	//echo $url = $_SERVER['PATH_TRANSLATED'].'/access-denied';
	//echo $url = $_SERVER['DOCUMENT_ROOT'].'/access-denied';
	header('Location:'.$url);