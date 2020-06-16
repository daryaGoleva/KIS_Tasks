echo "<h2>ЗадачаТриТопора</h2>";

$fp = file('input.txt');

$currentPosition = 0;
$lotCount = $fp[$currentPosition++];
$lotData = array();

if (count($fp) > 0 && $lotCount > 0)
{
    for($i = $currentPosition; $i <= $lotCount; ++$i, ++$currentPosition)
    {
        $stringDataArray = explode(' ', $fp[$i]);
		$gameId = $stringDataArray[0];
        $lotData[$gameId] = array("lot_amount" => $stringDataArray[1], "lot_team" => trim($stringDataArray[2]));
    }
	
	$gamesCount = $fp[$currentPosition++];
	if ($gamesCount > 0)
	{
		for($i = $currentPosition; $i < $currentPosition + $gamesCount; ++$i)
		{
			$stringDataArray = explode(' ', $fp[$i]);
			$gameId = $stringDataArray[0];
			
		
				$winner_team = trim($stringDataArray[4]);
				$tmp = array("L" =>$stringDataArray[1] , "R" => $stringDataArray[2], "D" => $stringDataArray[3], "win_team" => $winner_team);
				
				$lotData[$gameId] = array_merge($tmp, $lotData[$gameId]);
				
				$lotData[$gameId]["result"] = $lotData[$gameId]["lot_team"] == $winner_team
					? $lotData[$gameId]["lot_amount"] * $lotData[$gameId][$winner_team] - $lotData[$gameId]["lot_amount"]
					: $lotData[$gameId]["lot_amount"] * (-1);
					
		}
	}
	
	$result = 0;
	
	foreach ($lotData as $lotInfo){
		$result += $lotInfo["result"];
	}
	echo ($result);
}

?>