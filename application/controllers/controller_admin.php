<?php

class Controller_Admin extends Controller
{
	
	function action_index()
	{
		session_start();
		
		/*
		Для простоты, в нашем случае, проверяется равенство сессионной переменной admin прописанному
		в коде значению — паролю. Такое решение не правильно с точки зрения безопасности.
		Пароль должен храниться в базе данных в захешированном виде, но пока оставим как есть.
		*/
		
		if ($this->check_auth($_SESSION['login'],$_SESSION['password']))
		{
			$this->view->generate('admin_view.php', 'template_view.php', array('title' => 'Admin panel'));
		}
		else
		{
			session_destroy();
			Route::ErrorPage404();
		}

	}
	
	// Действие для разлогинивания администратора
	function action_logout()
	{
		session_start();
		session_destroy();
		header('Location:/');
	}

}
