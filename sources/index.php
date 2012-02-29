<?php

	/**
	* NetCat plugin uloginplugin
	*
	* @package	Auth
	* @subpackage	uLogin
	* @author	uLogin
	* @link	http://ulogin.ru
	* @contacts team@ulogin.ru
	* @license GPL3
	*/

	$NETCAT_FOLDER = join( strstr(__FILE__, "/") ? "/" : "\\", array_slice( preg_split("/[\/\\\]+/", __FILE__), 0, -4 ) ).( strstr(__FILE__, "/") ? "/" : "\\" );
	include_once ($NETCAT_FOLDER."vars.inc.php");
	require ($INCLUDE_FOLDER."index.php");
	
	//авторизация через ulogin
	processing_key();
	
	header('Location: /');
	exit;
?>