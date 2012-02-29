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

	//Авторизация пользоваеля через социальную сеть
	function processing_key(){
			
			global $db;
			global $AUTH_USER;
			global $AUTH_PW;
			global $AuthPhase;
			
			//Передача данных о пользователе
			$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
			$user = json_decode($s, true);
			
			//Поиск пользователя, которого нужно авторизовать
			$sql="select id_user, seed from ulogin where ident ='".$user['identity']."';";
			$row=$db->get_row($sql);
			
			//Регистрация пользователя в случае отсутствия в таблице ulogin
			if(!$row){
				
				//Генерация логина
				$Login21=$user['first_name']."_".$user['last_name'];
				$Login=iconv("utf-8", "windows-1251", $Login21);
				
				//Генерация пароля
				$Seed=mt_rand();
				$Password=md5($user['identity'].$Seed);
				
				$Email=$user['email'];
				$Ident=$user['identity'];
				
				//Добавление пользователя в таблицу user
				$insert = 'insert into User (';
				$insert .= 'Login, Password, Email, Checked, Created, PermissionGroup_ID) values (';
				$insert .= "'".$Login."', '".$Password."', '".$Email."',1, Now(),2)";
				$Result = $db->query($insert);
				$UserID = $db->insert_id;
				$message = $UserID;
				
				//Добавление пользователя в группу безопасности
				$db->query("insert into User_Group (User_ID, PermissionGroup_ID) values ($UserID,2)");
				//Добавление пользователя в таблицу ulogin
				$db->query("insert into ulogin (ident, id_user, seed) values('".$Ident."',$UserID, $Seed)");
				//Выбор зарегестрированного пользователя для его последующей авторизации
				$row=$db->get_row("select id_user, seed from ulogin where id=last_insert_id();");
			}
			
			//Получение логина
			var_dump($row);
			$username=$db->get_row("select Login from User where User_ID=".$row->id_user.";");
			//Авторизация пользователя
			$AUTH_USER = $username->Login;
			$AUTH_PW = $user['identity'].$row->seed;
			$AuthPhase = 1;
			Authorize();
	}
?>