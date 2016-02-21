<?php

class Controller_Login extends Controller
{
	
	function action_index()
	{
		$data['title'] = 'Auth';
		if($GLOBALS['loggedIn'])
		{
			header('Location:/');
			die;
		}
		if(isset($_POST['login']) && isset($_POST['password']))
		{
				session_start();

				$_SESSION['login'] = $_POST['login'];
				$_SESSION['password'] = $_POST['password'];

				header('Location:/login/');
			/*
			Производим аутентификацию, сравнивая полученные значения со значениями прописанными в коде.
			Такое решение не верно с точки зрения безопсаности и сделано для упрощения примера.
			Логин и пароль должны храниться в БД, причем пароль должен быть захеширован.
			*/
		}
		$this->view->generate('login_view.php', 'template_login.php', $data);
	}
	
}
