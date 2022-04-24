<?php
/**
 *  @package     : Consulta Situação Cadastral - CNPJ
 *  @subpackage  : Arquivo de índice do sistema
 *  @author      : Cristiano Ramos | https://github.com/CSR4mos | <csramos.poa@gmail.com>
 *  @license     : GPL v3
 *  @copyright   : (c) 2020 - Genezzis Sistemas - ME
 *  @link        : http://genezzis.com | <sistemas@genezzis.com>
 *
 *****************************************************************************/


	
	// Classes de Dependência
	require_once('core/autoload.php');

	// Instância do F3 Framework
	$genezzis = \Base::instance();

	ini_set ('display_errors', 1); 
	$genezzis->config('config/config.ini');
	$genezzis->config('config/routes.ini');
	
	// Exibe o conteúdo
	$genezzis->run();
