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

		$options = array('id' => 0 , 'orderBy' => '' );

		if(isset($_GET['id']))
		{
			$options['id'] = $_GET['id'];
		}

		if(isset($_GET['orderBy']))
		{
			$options['orderBy'] = $_GET['orderBy'] ;
		}

		$data = $this->model->get_data($options);

		if($data['error'])
		{
			$this->view->generate('404_view.php', 'template_view.php', $data);
			die;
		}



		$this->view->generate('userControl_view.php', 'template_view.php', $data);
	}
	function action_ajax ()
	{
		$options['id'] = $_POST['id'];
		$options['orderBy']= $_POST['orderBy'];
		$options['showWithoutText'] = $_POST['showWithoutText'];
		$options['conversely'] = $_POST['conversely'];
		$options['process'] = $_POST['process'];

		$data = $this->model->get_data($options);

		echo $data['table'];
	}
	
}
