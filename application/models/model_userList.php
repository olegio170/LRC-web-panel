<?php

class Model_UserList extends Model
{
	
	public function get_data($arr)
	{
		extract($arr);

		if(!isset($page) || $page <= 0)
		{
			$page = 1;
		}

		$end = $page * 10;
		$start = $end - 10;


		$stmt = $GLOBALS['DB']->query("SELECT * FROM users ".$orderBy." LIMIT ". $start ." , ". $end." ");
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$stmt = $GLOBALS['DB']->query("SELECT COUNT(*) FROM users");
		$count = $stmt->fetchAll();


		$result = array(
			'title' => 'User list',
			'data' => $row,
			'count' =>  ceil($count[0][0]/10),
			);
		return $result;
	}

}
