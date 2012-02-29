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
	
	/**
	* Проверка на возможность установки
	*
	* @access	public
	* @return	array
	*/
	function CheckAbilityOfInstallation()
	{
		$result ["Success"] = 1;
		$result ["ErrorMessage"] = NETCAT_MODULE_ERROR;
		return $result; 
	}
	
	/**
	* Установка модуля
	*
	* @access	public
	* @return	array
	*/
	function InstallThisModule()
	{
		$result ["Success"] = 1;
		$result ["ErrorMessage"] = NETCAT_MODULE_ERROR;
		return $result;
	}	
?>