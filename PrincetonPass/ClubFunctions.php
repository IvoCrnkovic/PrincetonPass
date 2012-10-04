<?php
	
	function createEvent($clubName, $startDate, $endDate, $name, $description,	$passType, $passTransfer)
	{
		pg_query_params($dbconn, "insert into events values(DEFAULT, '" . $clubName . "', $1, $2, $3, $4, $5, $6, $7)",
			array($startDate, $endDate, $name, $description, $passType, $passTransfer, toPgArray(array())));
	}
	
	function createPasses($clubName, $eventIds, $numberPerMember, $userIds, $transferable, $type)
	{
		$pcArray = array(null,intarray($eventIds),toPgArray(array()), $transferable, $type, toPgArray(array()));
		$success = true;
		$result = pg_query($dbconn, "select members from clubs where name = '" . $clubName . "'");
		if ($result === false)
			throw new Exception("Query Error");
		$dbarr = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		$members = getPgArray($dbarr);
		pg_query($dbconn, "begin");
		for ($i = 0; $i < count($members); $i++)
		{
			for ($j = 0; $j < $numberPerMember; $j++)
			{
				$pcArray[0] = $members[$i];
				$r = pg_query_params($dbconn, "insert into passes values(DEFAULT, $1, $2, $3, $4, 0, $5, $6)", $pcArray);
				if ($r === false)
					$success = false;
				pg_free_result($r);
				$r = pg_query($dbconn, "SELECT currval(pg_get_serial_sequence('passes', 'id'))");
				if ($r === false)
					$success = false;
				$id = pg_fetch_result($r, 1, 1);
				pg_free_result($r);
				if ($id === false)
					$success = false;
				
				$r = pg_query_params($dbconn, "update users set passes_available = passes_available + " . $id . " where id = " . $members[$i]);
				if ($r === false)
					$success = false;
				pg_free_result($r);
			}
		}
		for ($i = 0; $i < count($userIds); $i++)
		{
			for ($j = 0; $j < $numberPerMember; $j++)
			{
				$pcArray[0] = $userIds[$i];
				$r = pg_query_params($dbconn, "insert into passes values(DEFAULT, $1, $2, $3, $4, 0, $5, $6)", $pcArray);
				if ($r === false)
					$success = false;
				pg_free_result($r);
				$r = pg_query($dbconn, "SELECT currval(pg_get_serial_sequence('passes', 'id'))");
				if ($r === false)
					$success = false;
				$id = pg_fetch_result($r, 1, 1);
				pg_free_result($r);
				if ($id === false)
					$success = false;
				
				$r = pg_query_params($dbconn, "update users set passes_available = passes_available + " . $id . " where id = " . $userIds[$i]);
				if ($r === false)
					$success = false;
				pg_free_result($r);
			}
		}
		if (success == false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Error");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function cancelEvent($eventId)
	{
		$r = pg_query($dbconn, "select owner, # events, id, available_to from passes where events @> array[" . $eventId . "]");
		if ($r === false)
			throw new Exception();
		$passes = pg_fetch_all($r);
		pg_free_result($r);
		$r = pg_query($dbconn, "begin");
		if ($r === false)
			throw new Exception();
		pg_free_result($r);
		$passId;
		$success = true;
		for ($i = 0; $i < count($passes); $i++)
		{
			$passId = $passes[$i]["id"];
			//TODO check this
			if ($passes[$i]["# events"] == 1)
			{
				$availableTo = getPgArray($passes[$i]["available_to"]);
				$r = pg_query($dbconn, "update users set passes_available = passes_available - " . $passId . 
						", gifted_passes = gifted_passes - " . $passId . " where id = " + $passes[$i]["owner"]);
				if ($r === false)
					$success = false;

				for ($j = 0; $j < count($availableTo); $j++)
				{
					$r = pg_query($dbconn, "update users set claimable_passes = claimable_passes - " . $passId . 
							" where id = " . $availableTo[$j]);
					if ($r === false)
						$success = false;
					pg_free_result($r);
				}
				$r = pg_query($dbconn, "delete from passes where id = " . $passId);
				if ($r === false)
					$success = false;
				pg_free_result($r);
			}
			else
			{
				$r = pg_query($dbconn, "update passes set events = events - " . $eventId . " where id = " . $passId);
				if ($r === false)
					$success = false;
				pg_free_result($r);
			}
		}
		$r = pg_query($dbconn, "delete from events where id = " . $eventId);
		if ($r === false)
			$success = false;
		pg_free_result($r);
		if ($success == false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Error");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function editEvent($eventId, $startDate, $endDate, $name, $description, $passType, $passTransfer)
	{
		$r = pg_query($dbconn, "begin; update events set start_date = " . $startDate . ", end_date = " . $endDate . ", name = '" .
			$name . "', description = '" . $description . "', pass_type = " . $passType . ", pass_transfer = " . $passTransfer);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Error");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}
	
	function addMembers($clubName, $userIds)
	{
		$r = pg_query($dbconn, "begin");
		if ($r === false)
			throw new Exception();
		for ($i = 0; $i < count($userIds); $i++)
		{
			$r = pg_query($dbconn, "update users set club_membership = '" . $clubName . "' where id = " . $userIds[$i] .
					"; update clubs set members = members + " . $userIds[$i] . " where name = '" . $name . "';");
			if ($r === false)
			{
				pg_query($dbconn, "rollback");
				throw new Exception("Update Error");
			}
			pg_free_result($r);
		}
		pg_query($dbconn, "commit");
	}
	
	function banUser($clubName, $userId, $bannedUntil)
	{
		$r = pg_query($dbconn, "select id from users where id = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("ID not found");
		pg_free_result($r);
		$r = pg_query($dbconn, "begin; update clubs set banned_users = banned_users + " . $userId . ", " .
			"banned_until = banned_until + " . $bannedUntil . " where name = '" . $clubName . "::varchar");
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}
?>
