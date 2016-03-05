<?php

class Model_UserList extends Model
{
	
	public function get_data($page)
	{
		if(!isset($page) || $page <= 0)
		{
			$page = 1;
		}

		$end = $page * 10;
		$start = $end - 10;


		$stmt = $GLOBALS['DB']->query("SELECT * FROM users LIMIT ". $start ." , ". $end." ");
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt = $GLOBALS['DB']->query("SELECT COUNT(*) FROM users");
		$count = $stmt->fetchAll();





		/*$count = 98;
		$count = ceil($count/10);

		for ($i = 1;$i<=10;$i++)
		{
			$row[$i] = array('id' => "1d3ad753c8fdb96745e9cc6ef7ff10f4b65f87a430ddb081464c4c71d3569991",'CPU' => 'I3 H896','RAM' => '0.5 MB','OS' => 'LinUX','Speed' => '2G =(' );
		}*/

		$result = array(
			'title' => 'User list',
			'data' => $row,
			'count' => $count[0][0],
			);
		return $result;
	}

}
