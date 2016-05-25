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
		$rows = array('CPU','RAM','OS','speed');
		$data['title'] = 'User list';

		$options = array('page' => 0 , 'orderBy' => '');

		if(isset($_GET['page']))
		{
			$options['page'] = (int)$_GET['page'];
		}

		if(isset($_GET['orderBy']))
		{
			if(in_array($_GET['orderBy'],$rows))
			{
				$options['orderBy'] = "ORDER BY ".$_GET['orderBy'] ;
			}
		}

		$data = $this->model->get_data($options);

		$this->view->generate('userList_view.php', 'template_view.php', $data);
	}
	
}
