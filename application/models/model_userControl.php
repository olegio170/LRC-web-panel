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
		$row = $stmt->fetch();






		//$row = array('id' => "fe6340be87fd5e43b7f0cac5741e76205dd69a68b2024fda16c696848a720f7a",'CPU' => 'I3 H896','RAM' => '0.5 MB','OS' => 'LinUX','Speed' => '2G =(' );


		$result = array(
			'title' => 'User list',
			'data' => $row,
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
