<?php

class Model_userControl extends Model
{
	
	public function get_data($arr)
	{
		extract ($arr);

		if(!isset($id))
		{
			return $this->return_error();
			die;
		}
		if(strlen($id) != 64)
		{
			return $this->return_error();
			die;
		}


		$stmt = $GLOBALS['DB']->prepare("SELECT * FROM users WHERE shaId = :id ");
		$stmt->execute(array('id' => $id));
		$user = $stmt->fetch();

		$stmt = $GLOBALS['DB']->prepare("SELECT * FROM keyboard WHERE userId = :userId  ".$orderBy);
		$stmt->execute(array('userId' => $user['id']));
		$keyboard = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$result = array(
			'title' => 'User control',
			'data' => $user,
			'keyboard' => $keyboard,
			'error' => false,
			'id' => $id,
			);
		return $result;
	}

	private function return_error ()
	{
		return array(
			'title' => 'User control',
			'data' => 'Id incorrect',
			'error' => true,
		);
	}
}
