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
		$rows = array('process','title','text','eventTime');
		$data['title'] = 'User control';


		$options = array('id' => 0 , 'orderBy' => '');

		if(isset($_GET['id']))
		{
			$options['id'] = $_GET['id'];
		}

		if(isset($_GET['orderBy']))
		{
			if(in_array($_GET['orderBy'],$rows))
			{
				$options['orderBy'] = "ORDER BY ".$_GET['orderBy'] ;
			}
		}

		$data = $this->model->get_data($options);

		if($data['error'])
		{
			$this->view->generate('404_view.php', 'template_view.php', $data);
			die;
		}



		$this->view->generate('userControl_view.php', 'template_view.php', $data);
	}
	
}
