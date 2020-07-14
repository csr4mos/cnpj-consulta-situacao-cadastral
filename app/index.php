<?php
	
	$url = '../acesso-negado';
	//echo $url = realpath(dirname(__FILE__)).'/access-denied';
	//echo $url = (dirname(__DIR__)).'/access-denied';
	//echo $url = $_SERVER['PATH_TRANSLATED'].'/access-denied';
	//echo $url = $_SERVER['DOCUMENT_ROOT'].'/access-denied';
	header('Location:'.$url);