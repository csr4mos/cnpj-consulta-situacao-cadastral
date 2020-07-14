<?php
/**
 * 	@description : Indice de Rotas CMS Genezzis
 * 	@package 	 : CMS Genezzis
 * 	@file 		 : /index.php
 * 	@author 	 : https://github.com/CSR4mos | <csramos.poa@gmail.com>
 * 	@version 	 : 0.0.0.1
 * 	@license	 : Todos os direitos reservados
 * 	@copyright	 : (c) 2018 - Genezzis Sistemas
 * 	@link 		 : https://genezzis.com | <sistemas@genezzis.com>
 *
 ****************************************************************************/

	
	// Configurações do Sistema
	$genezzis=require('core/base.php'); // Inclui a base do Fat Free Framework
	ini_set ('display_errors', 1); 
	$genezzis->config('config/config.ini');
	$genezzis->config('config/routes.ini');

	// Limpa uma sessão atual
	//F3::clear('SESSION');
	
	/*
	* Define o nível de Debug do sistema
	*/
	$genezzis->set('DEBUG',3);
	
	$getLang = new IdiomasController();
	$getLang->getLang($genezzis);
	
	/*
	* Define variáveis 
	*/
	$genezzis->set('site.url', $genezzis->get("SCHEME") . "://" . $genezzis->get("HOST") . $genezzis->get("BASE"));
	
	// SE exisir erro na rota - Exibe a Página de Erros
	$genezzis->set('ONERROR','ErrosController->paginaErro');
	
	// Exibe o conteúdo
	$genezzis->run();