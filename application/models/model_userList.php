<?php

class Model_UserList extends Model
{
	
	public function get_data($page)
	{
		if(!isset($page) OR $page <= 0)
		{
			$page = 1;
		}

		$end = $page * 10;
		$start = $end - 10;

		/*
		$stmt = $GLOBALS['DB']->prepare("SELECT * FROM users LIMIT :start, :end");
		$stmt->execute(array('start' => $start,'end' => $end));
		$row = $stmt->fetch();*

		$stmt = $GLOBALS['DB']->query('SELECT COUNT(*) FROM users;');
		$count = $stmt->fetch();
		*/

		$count = 98;
		for ($i = 1;$i<=10;$i++)
		{
			$row[$i] = array('id' => "1d3ad753c8fdb96745e9cc6ef7ff10f4b65f87a430ddb081464c4c71d3569991",'CPU' => 'I3 H896','RAM' => '0.5 MB','OS' => 'LinUX','Speed' => '2G =(' );
		}
		$result = array(
			'title' => 'User list',
			'data' => $row,
			'count' => $count,
			);
		return $result;
	}

}
