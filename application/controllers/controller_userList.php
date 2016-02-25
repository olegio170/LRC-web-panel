<?php

class Controller_userList extends Controller
{
	function __construct()
	{
		$this->model = new Model_UserList();
		$this->view = new View();
	}

	function action_index()
	{
		$data['title'] = 'User list';
		if(isset($_GET['page']))
		{
			$data = $this->model->get_data((int)$_GET['page']);
		}
		else
		{
			$data = $this->model->get_data(0);
		}

		$this->view->generate('userList_view.php', 'template_view.php', $data);
	}
	
}
