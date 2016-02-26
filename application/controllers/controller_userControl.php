<?php

class Controller_userControl extends Controller
{
	function __construct()
	{
		$this->model = new Model_userControl();
		$this->view = new View();
	}

	function action_index()
	{
		$data['title'] = 'User control';
		if(isset($_GET['id'])) {
			$data = $this->model->get_data($_GET['id']);
		}
		else
		{
			$data = $this->model->get_data(0);
		}
		if($data['error'])
		{
			$this->view->generate('404_view.php', 'template_view.php', $data);
			die;
		}

		$this->view->generate('userControl_view.php', 'template_view.php', $data);
	}
	
}
