<?php
	
	function createEvent($clubName, $startDate, $endDate, $name, $description,	$passType, $passTransfer)
	{
		pg_query_params($dbconn, "insert into events values(DEFAULT, '" . $clubName . "', $1, $2, $3, $4, $5, $6, $7)",
			array($startDate, $endDate, $name, $description, $passType, $passTransfer, toPgArray(array())));
	}
	
	function createPasses($clubName, $eventIds, $numberPerMember, $userIds, $transferable, $type)
	{
		$pcArray = array(null,intarray($eventIds),toPgArray(array()), $transferable, $type, toPgArray(array()));
		
		$result = pg_query($dbconn, "select members from clubs where name = '" . $clubName . "'");
		if ($result === false)
			throw new Exception("Query Error");
		$dbarr = pg_fetch_result($r, 1, 1);
		$members = getPgArray($dbarr);
		
		for ($i = 0; $i < count($members); $i++)
		{
			for ($j = 0; $j < $numberPerMember; $j++)
			{
				$pcArray[0] = $members[$i];
				pg_query_params($dbconn, "insert into passes values(DEFAULT, ?, ?, ?, ?, 0, ?, ?)", $pcArray);
				$result = pg_query($dbconn, "SELECT currval(pg_get_serial_sequence('passes', 'id'))");
				$row = pg_fetch_array($result, 0);
				pg_query_params($dbconn, "update users set passes_available = passes_available + ? where puid_num = ?", array($row[0], $members[$i]));
			}
		}
		for ($i = 0; $i < count($userIds); $i++)
		{
			for ($j = 0; $j < $numberPerMember; $j++)
			{
				$pcArray[0] = $userIds[$i];
				pg_query_params($dbconn, "insert into passes values(DEFAULT, ?, ?, ?, ?, 0, ?, ?)", $pcArray);
				$result = pg_query($dbconn, "SELECT currval(pg_get_serial_sequence('passes', 'id'))");
				$row = pg_fetch_array($result, 0);
				pg_query_params($dbconn, "update users set passes_available = passes_available + ? where puid_num = ?", array($row[0], $userIds[$i]));
			}
		}
			
		pg_free_result($result)
	}
	
	function cancelEvent($eventId)
	{
		$result = pg_query($dbconn, "select owner, # events, id, available_to from passes where events @> array[" . eventId . "]");

		int passId;
		while (r.next())
		{
			passId = r.getInt(3);
			if (r.getInt(2) == 1)
			{
				Long[] availableTo = (Long[]) r.getArray(4).getArray();
				s.addBatch("update users set passes_available = passes_available - " + passId + 
						", gifted_passes = gifted_passes - " + passId + " where puid_num = " + r.getInt(1));

				for (int i = 0; i < availableTo.length; i++)
				{
					s.addBatch("update users set claimable_passes = claimable_passes - " + passId + 
							" where puid_num = " + availableTo[i]);
				}
				s.addBatch("delete from passes where id = " + passId);
			}
			else
			{
				s.addBatch("update passes set events = events - " + eventId + " where id = " + passId);
			}
		}
		s.executeBatch();
		s.executeUpdate("delete from events where id = " + eventId);
	}
	
	function editEvent($eventId, $startDate, $endDate, $name, $description, $passType, $passTransfer)
	{
		pg_query($dbconn, "update events set start_date = " . $startDate . ", end_date = " . $endDate . ", name = '" .
			$name "', description = '" . $description . "', pass_type = " . $passType . ", pass_transfer = " . $passTransfer);
	}
	
	function addMembers($clubName, $userIds)
	{
		$temp;
		for ($i = 0; $i < count($userIds); $i++)
		{
			$temp = $userIds[$i];
			pg_query($dbconn, "begin; update users set club_membership = '" . $clubName . "' where puid_num = " . $userIds[$i] .
					"; update clubs set members = members || " . $temp . "::bigint where name = '" . $name . "'; commit");
		}
	}
	
	function banUser($clubName, $userId, $bannedUntil)
	{
		$result = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
		if(pg_num_rows($result) > 0)
		{
			pg_free_result($result);
			pg_query($dbconn, "update clubs set banned_users = banned_users || " + $userId + "::bigint, " .
				"banned_until = banned_until || " . $bannedUntil . "::bigint where name = '" . $clubName . "::varchar");
		}
	}
?>
