<?php

class Model_userControl extends Model
{
	
	public function get_data($id)
	{
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

		$id = 'fe6340be87fd5e43b7f0cac5741e76205dd69a68b2024fda16c696848a720f7a';

		$stmt = $GLOBALS['DB']->prepare("SELECT * FROM users WHERE shaId = :id ");
		$stmt->execute(array('id' => $id));
		$user = $stmt->fetch();

		$stmt = $GLOBALS['DB']->prepare("SELECT * FROM keyboard WHERE userId = :userId ");
		$stmt->execute(array('userId' => $user['id']));
		$keyboard = $stmt->fetchAll(PDO::FETCH_ASSOC);





		//$row = array('id' => "fe6340be87fd5e43b7f0cac5741e76205dd69a68b2024fda16c696848a720f7a",'CPU' => 'I3 H896','RAM' => '0.5 MB','OS' => 'LinUX','Speed' => '2G =(' );


		$result = array(
			'title' => 'User list',
			'data' => $user,
			'keyboard' => $keyboard,
			'error' => false,
			);
		return $result;
	}

	private function return_error ()
	{
		return array(
			'title' => 'User list',
			'data' => 'Id incorrect',
			'error' => true,
		);
	}
}
