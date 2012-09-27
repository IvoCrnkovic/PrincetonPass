<?php
//TODO use exception types
class User
{
	private $LIST_SEPARATOR = -432625;
	private $userId;
	function getFirstName()
	{
		$r = pg_query($dbconn, "select first_name from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $name;
	}
	function getLastName()
	{
		$r = pg_query($dbconn, "select last_name from users where puid_num = " . $userId);
		if(!$r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $name;
	}
	function getGraduationYear()
	{
		$r = pg_query($dbconn, "select graduation_year from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $year;
	}
	function getClub()
	{
		$r = pg_query($dbconn, "select club_membership from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $club;
	}
	function getList($listNum)
	{
		$r = pg_query($dbconn, "select lists from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		$currentList = -1;
		$firstIndex = -1; 
		$lastIndex = count($allLists);
		for ($i = 0; $i < $count($allLists); $i++)
		{
			if ($allLists[$i] == $LIST_SEPARATOR)
			{				
				$currentList++;
				if ($currentList == $listNum)
					$firstIndex = $i + 1;
				if ($currentList == $listNum + 1)
					$lastIndex = $i;
			}
		}
		if ($firstIndex == -1)
			throw new Exception("List Number " . $listNum . " Out Of Bounds");
		if ($firstIndex >= count($allLists) || $firstIndex == $lastIndex)
			return array();
		return array_slice($allLists, $firstIndex, $lastIndex - $firstIndex);
	}
	function getGroups()
	{
		$r = pg_query($dbconn, "select group_membership from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getPassesAvailable()
	{
		$r = pg_query($dbconn, "select passes_available from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getPlannedAttendance()
	{
		$r = pg_query($dbconn, "select planned_attendance from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getPastAttendance()
	{
		$r = pg_query($dbconn, "select past_attendance from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getPrivacySetting()
	{
		$r = pg_query($dbconn, "select privacy_setting from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getVisibleTo()
	{
		$r = pg_query($dbconn, "select visible_to from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getClaimablePasses()
	{
		$r = pg_query($dbconn, "select claimable_passes from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getJoinableGroups()
	{
		$r = pg_query($dbconn, "select joinable_groups from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getIgnoredUsers()
	{
		$r = pg_query($dbconn, "select ignored_users from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getPastAttendanceDates()
	{
		$r = pg_query($dbconn, "select past_attendance_dates from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getNotifications()
	{
		$r = pg_query($dbconn, "select notifications from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getListName()
	{
		$r = pg_query($dbconn, "select list_names[" . ($listNum + 1) . "] from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	function getGiftedPasses()
	{
		$r = pg_query($dbconn, "select gifted_passes from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		return $result;
	}
	
	function setFirstName($x)
	{
		$r = pg_query($dbconn, "begin; update users set first_name = '" . $x . "' where puid_num = " . $userId);
		if($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}
	function setLastName(
			$x)
	{
		$r = pg_query($dbconn, "begin; update users set last_name = '" . $x . "' where puid_num = " . $userId);
		if($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}
	function setGraduationYear($x)
	{
		$r = pg_query($dbconn, "begin; update users set graduation_year = " . $x . " where puid_num = " . $userId);
		if($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}
	function setPrivacySetting($x)
	{
		$r = pg_query($dbconn, "begin; update users set privacy_setting = " . $x . " where puid_num = " . $userId);
		if($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}
	
	
	function addToList($listNum, $idToAdd)
	{
		if ($listNum < 0)
			throw new Exception("Invalid List Number");
		$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $idToAdd);
		if ($r === false)
			throw new Exception("Query Error");
		if (!pg_fetch_result($r, 1, 1))
			throw new Exception("PUID_NUM: " . $idToAdd . " To Be Added Does Not Exist");
		pg_free_result($r);
		$r = pg_query($dbconn, "select lists from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$lists = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($lists === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		$currentList = -1;
		$index = 0;
		for (; $index < count($lists); $index++)
		{
			if ($lists[$index] == $LIST_SEPERATOR)
			{
				$currentList++;
				if ($currentList == $listNum)
					break;
			}
		}
		$index++;
		$newIndex = $index;
		while ($newIndex < count($lists) && $lists[$index] != $LIST_SEPERATOR_VALUE)
		{
			if ($lists[$newIndex] == $idToAdd)
				throw new Exception("User Already Exists In List");
			$newIndex++;
		}
		array_splice($lists, $index, 0, $indexToAdd);
		
		$r = pg_query_params($dbconn, "begin; update users set lists = $1 where puid_num = " . $userId, array($lists));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function addList($listToAdd, $name)
	{
		$r = pg_query($dbconn, "select lists from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Failed");
		$lists = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($lists === false)
			throw new Exception("PUID_NUM: " + $userId + " Does Not Exist");
		
		array_push($lists, $LIST_SEPERATOR);
		array_push($lists, $listToAdd);
	
		$r = pg_query_params($dbconn, "begin; update users set lists = $1 where puid_num = " . $userId, array($lists));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function removeFromList($listNum, $idToRemove)
	{
		if ($listNum < 0)
			throw new Exception("Invalid List Number");
		$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $idToRemove);
		if ($r === false)
			throw new Exception("Query Failed");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("PUID_NUM: " . $idToRemove . " To Be Removed Does Not Exist");
		pg_free_result($r);
		$r = pg_query($dbconn, "select lists from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Failed");
	
		$lists = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($lists === false)
			throw new Exception("PUID_NUM: " . $userId . " To Be Removed Does Not Exist");
	
		$index = 0;
		$size = count($lists);
		//TODO Check this label
		outerloop: for ($i = -1; $i < $listNum; $i++)
		{
			for (; $index < $size; $index++)
			{
				if ($lists[$index] == $LIST_SEPARATOR)
				{
					$index++;
					continue outerloop;
				}
			}
			throw new Exception("List Number " . $listNum . " Out Of Bounds");
		}
		$index++;
		$value;
		for (; $index < $size; $index++)
		{
			$value = $lists[$index];
			if ($value == $LIST_SEPARATOR)
				throw new Exception("PUID_NUM: " . $idToRemove . " Not Found In List");
			if ($value == $idToRemove)
			{
				array_splice($lists, $index, 1);
				break;
			}
		}
		if ($index == $size)
			throw new Exception("PUID_NUM: " . $idToRemove . " Not Found In List");
	
		$r = pg_query_params($dbconn, "begin; update users set lists = $1 where puid_num = " . $userId, array($lists));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function removeFromList($listNum, $listIndex)
	{
		if ($listNum < 0)
			throw new Exception("Invalid List Number");
		if ($listIndex < 0)
			throw new Exception("Invalid List Index");
		$r = pg_query($dbconn, "select lists from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$lists = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($lists === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
	
		$index = 0;
		$size = count($lists);
		outerloop: for ($i =  0; $i < $listNum; $i++)
		{
			for (; $index < $size; $index++)
			{
				if ($lists[$index] == $LIST_SEPARATOR)
					continue outerloop;
			}
			throw new Exception("List Number " . $listNum . " Out Of Bounds");
		}
	
		$index++;
		$value;
		$indexToRemove = $index + 1 + $listIndex;
		for (; $index < $size; $index++)
		{
			$value = $lists[$index];
			if ($value == $LIST_SEPARATOR)
				throw new Exception("List Index " . $listIndex . " Out Of Bounds");
			if ($value == $indexToRemove)
			{
				array_splice($lists, $indexToRemove, 1);
				break;
			}
		}
		if ($index == $size)
			throw new Exception("List Index " . $listIndex . " Out Of Bounds");
	
		$r = pg_query_params($dbconn, "begin; update users set lists = $1 where puid_num = " . $userId, array($lists));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function removeList($listNum)
	{
		if ($listNum <= 0)
			throw new Exception("Invalid List Number");
		$r = pg_query($dbconn, "select lists, list_names from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$listNames = pg_fetch_result($r, 1, 1);
		$lists = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($listNames === false || $lists === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		
		$currentList = -1;
		$index = 0;
		for (; $index < count($lists); $index++)
		{
			if ($lists[$index] == $LIST_SEPARATOR)
			{
				$currentList++;
				if ($currentList == $listNum)
					break;
			}
		}
	
		array_splice($lists, $index, 1);
		$index++;
		while ($index < count($lists) && $lists[$index] != $LIST_SEPARATOR)
		{
			array_splice($lists, $index, 1);
			$index++;
		}
		
		array_splice($listNames, $index, 1);
	
		$r = pg_query_params($dbconn, "begin; update users set lists = $1 where puid_num = " . $userId, array($lists));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function addGroup($groupId)
	{
		$r = pg_query("select puid_num from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		if (!pg_fetch_result($r, 1, 1))
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		pg_free_result($r);
		$r = pg_query($dbconn, "select pending_members from groups where id = " . $groupId);
		if ($r === false)
			throw new Exception("Query Error");
		$pendingInvites = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if (!$pendingInvites)
			throw new Exception("Group ID: " . $groupId . " Does Not Exist");
		
		array_splice($pendingInvites, array_search($userId, $pendingInvites), 1);
		$r = pg_query_params("begin; update users set group_membership = group_membership + " . $groupId . " where puid_num = " . $userId . "; " .
			"update groups set members = members + " . $userId . ", pending_invites = $1 where id = " . $groupId, array($pendingInvites));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function removeGroup($groupId)
	{
		$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		$result = pg_fetch_result($r, 1, 1); 
		pg_free_result($r);
		if($result === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	
		$r = pg_query($dbconn, "begin; update users set group_membership = group_membership - " . $groupId . "where puid_num = " . $userId . "; " .
		"update groups set members = members - " . $userId . " where id = " . $groupId);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function transferPass($toUserId, $passId)
	{
		$r = pg_query($dbconn, "select ignored_users @> array[" . $userId . "]::bigint[] from users where puid_num = " . $toUserId);
		if ($r === false)
			throw new Exception("Query Error");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("User " . $userId . " Is Ignored By User " . $toUserId);
		pg_free_result($r);
		
		$r = pg_query($dbconn, "select TRANSFERABLE from passes where id = " . $passId);
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("Pass ID: " . $passId . " Is Not Transferable");
		pg_free_result($r);
		
		$r = pg_query($dbconn, "select first_name, last_name from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("Sending PUID_NUM: " . $userId . " Does Not Exist");
		$notification = pg_fetch_result($r, 1, 1) . " " . pg_fetch_result($r, 1, 2) . " has gifted you a pass! Check it out in your passes tab";
		pg_free_result($r);
		
		$r = pg_query("begin; update users set passes_available = passes_available + " . $passId . ", notifications = notification || '" .
				$notification . "'::varchar, new_notifications = new_notifications + 1 where puid_num = " . $toUserId .
				"; update users set passes_available = passes_available - " . $passId . " where puid_num = " . $userId .
				"; update passes set owner = " . $toUserId . ", previous_owners = previous_owners + " .
				$userId . " where id = " . $passId);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function addPlannedAttendance($eventId)
	{
		$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		if(!pg_fetch_result($r, 1, 1))
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		$r = pg_query($dbconn, "select id from events where puid_num = " . $eventId);
		if($r === false)
			throw new Exception("Query Error");
		if(pg_fetch_result($r, 1, 1) === false)
			throw new Exception("Event ID " . $eventId . " Does Not Exist");
		pg_free_result($r);
		$r = pg_query($dbconn, "begin; update users set PLANNED_ATTENDANCE = PLANNED_ATTENDANCE + " . $eventId . " where puid_num = " . $userId);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function removePlannedAttendance($eventId)
	{
		$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		if(pg_fetch_result($r, 1, 1) === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		
		$r = pg_query($dbconn, "begin; update users set planned_attendance = planned_attendance - " . $eventId . " where puid_num = " . $userId);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function removePastAttendance($eventId)
	{
		$r = pg_query($dbconn, "select past_attendance # " . $eventId . ", past_attendance_dates from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$index = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($index === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		$index -= 1;
		$pastAttendanceDates = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		array_splice($pastAttendanceDates, $index, 1);
		$r = pg_query_params($dbconn, "begin; update users set past_attendance = past_attendance - " . $eventId . ", past_attendance_dates = $1 where puid_num = " . $userId, array($pastAttendanceDates));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function addToVisibleTo($userToAdd)
	{
		$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
		if($r === false)
			throw new Exception("Query Error");
		if(pg_fetch_result($r, 1, 1) === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		pg_free_result($r);
		$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userToAdd);
		if($r === false)
			throw new Exception("Query Error");
		if(pg_fetch_result($r, 1, 1) === false)
			throw new Exception("PUID_NUM " . $userToAdd . " Does Not Exist");
		pg_free_result($r);
		$r = pg_query("begin; update users set visible_to = visible_to || " . $userToAdd . "::bigint where puid_num = " . $userId);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function removeFromVisibleTo($userToRemove)
	{
		$r = pg_query($dbconn, "select visible_to from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$users = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($users === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
	
		array_splice($users, array_search($userToRemove, $users), 1);
		$r = pg_query_params($dbconn, "begin; update users set visible_to = $1 where puid_num = " . $userId, array($users));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function addIgnoredUser($userToIgnore)
	{
		$r = pg_query($dbconn, "select visible_to from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		pg_free_result($r);
		$r = pg_query($dbconn, "select visible_to from users where puid_num = " . $userToIgnore);
		if ($r === false)
			throw new Exception("Query Error");
		pg_free_result($r);
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("PUID_NUM: " . $userToIgnore . " Does Not Exist");
		
		$r = pg_query("begin; update users set ignored_users = ignored_users || " . $userToIgnore . "::bigint where puid_num = " . $userId);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function removeIgnoredUser($userToRemove)
	{
		$r = s.executeQuery("select ignored_users from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$users = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($users === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
	
		array_splice($users, array_search($userToRemove, $users), 1);
		$r = pg_query_params("begin; update users set ignored_users = $1 where puid_num = " . $userId, array($users));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function addNotification($message)
	{
		$r = pg_query($dbconn, "select visible_to from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		pg_free_result($r);
		$r = pg_query($dbconn, "begin; update users set notifications = notifications || '" . $message . "'::varchar where puid_num = " . $userId);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function removeNotification($index)
	{
		$r = pg_query("select notifications from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$notifications = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($notifications === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		if ($index >= count($notifications) || $index < 0)
			throw new Exception("Index: " . $index . " Out Of Range");
		array_splice($notifications, $index, 1);
		$r = pg_query_params($dbconn, "begin; update users set notifications = $1 where puid_num = " . $userId, array($notifications));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function giftPassToGroup($groupId, $passId)
	{
		$r = pg_query($dbconn, "select first_name, last_name from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$firstName = pg_fetch_result($r, 1, 1);
		$lastName = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($lastName === false || $firstName === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
	
		$r = pg_query($dbconn, "select transferable, available_to from passes where id = " . $passId);
		if ($r === false)
			throw new Exception("Query Error");
		$availableTo = pg_fetch_result($r, 1, 2);
		if ($availableTo === false)
			throw new Exception("Pass ID: " . $passId . " Does Not Exist");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("Pass ID: " . $passId . " Is Not Transferable");
		pg_free_result($r);
	
		$r = pg_query("select members, group_name from groups where id = " . $groupId);
		if ($r === false)
			throw new Exception("Query Error");
		$groupMembers = pg_fetch_result($r, 1, 1);
		$notification = $firstName . " " . $lastName . " has gifted " . pg_fetch_result($r, 1, 2) . " a pass! Check your Get tab to claim it";
		pg_free_result($r);
		if ($groupMembers === false)
			throw new Exception("Group Id: " . $groupId . " Does Not Exist");
		
		
		$sql = "begin; ";
		for ($i = 0; $i < count($groupMembers); $i++)
		{
			if ($groupMembers[$i] == $userId || array_search($groupMembers[$i], $availableTo) !== false)
				continue;
	
			array_push($availableTo, $groupMembers[$i]);
			$sql .= "update users set claimable_passes = claimable_passes + " . $passId . ", notifications = notifications || '"
					. $notification . "'::varchar, new_notifications = new_notifications + 1 where puid_num = " . $value . ";";
		}
		
		$sql .= "update users set gifted_passes = gifted_passes + " . $passId . ", passes_available = passes_available - " . $passId . " where puid_num = " . $userId .
					"; update passes set available_to = $1 where id = " . $passId . "; update groups set passes_available = passes_available + " . $passId . "where id = " . $groupId . ";";
		$r = pg_query_params($dbconn, $sql, array($availableTo));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function giftPassToList($passId, $listNum)
	{
		if ($listNum < 0)
			throw new Exception("List Number " . $listNum . " Out Of Range");
		$r = pg_query($dbconn, "select lists, first_name, last_name from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$lists = pg_fetch_result($r, 1, 1);
		if ($lists === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		$notification = pg_fetch_result($r, 1, 2) . " " . pg_fetch_result($r, 1, 3) . " has gifted you a pass! Check your Get tab to claim it";
		pg_free_result($r);
		$r = pg_query($dbconn, "select transferable, available_to from passes where id = " . $passId);
		if ($r === false)
			throw new Exception("Query Failed");
		$availableTo = pg_fetch_result($r, 1, 2);
		if ($availableTo === false)
			throw new Exception("Pass ID: " . $passId . " Does Not Exist");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("Pass ID: " . $passId . " Is Not Transferable");
		pg_free_result($r);
	
		$listMembers = array();
		$currentList = -1;
		for ($i = 0; $i < count($lists); $i++)
		{
			if ($lists[$i] == $LIST_SEPARATOR)
			{
				$currentList++;
				if ($currentList > $listNum)
					break;
				continue;
			}
			if ($currentList == $listNum)
				array_push($listMembers, $lists[$i]);
		}
		if ($currentList < $listNum)
			throw new Exception("List Number " . $listNum . " Out Of Range");
		
		$value;
		$sql = "begin; ";
		for ($i = 0; $i < count($listMembers); $i++)
		{
			$value = $listMembers[i];
			if ($value == $userId || array_search($listMembers[$i], $availableTo) !== false)
				continue;
	
			array_push($availableTo, $listMembers[$i]);
			$sql .= "update users set claimable_passes = claimable_passes + " . $passId . ", notifications = notifications || '" .
							$notification . "'::varchar, new_notifications = new_notifications + 1 where puid_num = " . $value . ";";
		}
				
		$sql .= "update users set gifted_passes = gifted_passes + " . $passId . ", passes_available = passes_available - " . $passId . " where puid_num = " . userId .
					"; update passes set available_to = $1 where id = " . $passId . ";";
		$r = pg_query_params($dbconn, $sql, array($availableTo));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function giftPassToList($passId, $userIds)
	{
		$r = pg_query($dbconn, "select first_name, last_name from users where puid_num = " . $userId);
		if (!$r)
			throw new Exception("Query Failed");
		$firstName = pg_fetch_result($r, 1, 1);
		$lastName = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($firstName === false || $lastName === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		$notification = $firstName . " " . $lastName . " has gifted you a pass! Check your Get tab to claim it";
		$r = pg_query($dbconn, "select transferable, available_to from passes where id = " . $passId);
		if ($r === false)
			throw new Exception("Query Failed");
		$availableTo = pg_fetch_result($r, 1, 2);
		if ($availableTo === false)
			throw new Exception("Pass ID: " . $passId . " Does Not Exist");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("Pass ID: " . $passId . " Is Not Transferable");
		pg_free_result($r);
	
		$sql = "begin; ";
		for ($i = 0; $i < count($userIds); $i++)
		{
			if ($userIds[$i] == $userId || array_search($userIds[$i], $availableTo) !== false)
				continue;
	
			array_push($availableTo, $userIds[$i]);
			$sql .= "update users set claimable_passes = claimable_passes + " . $passId . ", notifications = notifications || '" .
					$notification . "'::varchar, new_notifications = new_notifications + 1 where puid_num = " . $userIds[$i] . ";";
		}
		
		$sql .= "update users set gifted_passes = gifted_passes + " . $passId . ", passes_available = passes_available - " . $passId . " where puid_num = " . $userId .
							"; update passes set available_to = $1 where id = " . $passId;
		$r = pg_query_params($dbconn, $sql, array($availableTo));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function retractPass($passId)
	{
		$r = pg_query($dbconn, "select first_name, last_name from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$firstName = pg_fetch_result($r, 1, 1);
		$lastName = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($firstName === false || $lastName === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		$notification = $firstName . " " . $lastName . " has retracted a previously gifted pass";
		$r = pg_query($dbconn, "select available_to, owner from passes where id = " . $passId);
		if ($r === false)
			throw new Exception("Query Error");
		$availableTo = pg_fetch_result($r, 1, 1);
		$owner = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($availableTo === false)
			throw new Exception("Pass ID: " . $passId . " Does Not Exist");
		if ($owner != $userId)
			throw new Exception("User " . $userId . " No Longer Owns Pass");
	
		$sql = "begin; ";
		for ($i = 0; $i < count($availableTo); $i++)
		{
			$sql .= "update users set claimable_passes = claimable_passes - " . $passId . ", notifications = notifications || '" .
			$notification . "'::varchar, new_notifications = new_notifications + 1 where puid_num = " . $userId . ";";
		}
							
		$sql .= "update users set gifted_passes = gifted_passes - " . $passId . ", passes_available = passes_available + " . $passId . " where puid_num = " . $userId .
					"; update passes set available_to = $1 where id = " . $passId;
		$r = pg_query_params($dbconn, $sql, array(array()));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function renameList($listNum, $name)
	{
		$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		pg_free_result($r);
		$r = pg_query($dbconn, "begin; update users set list_names[" . ($listNum + 1) . "] = '" . $name . "' where puid_num = " . $userId);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function claimPass($passId)
	{
		$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		if (pg_fetch_result($r, 1, 1) === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		$r = pg_query($dbconn, "select available_to, owner from passes where id = " . $passId);
		if ($r === false)
			throw new Exception("Query Error");
		$availableTo = pg_fetch_result($r, 1, 1);
		$owner = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($availableTo === false || $owner === false)
			throw new Exception("Pass ID: " . $passId . " Does Not Exist");
	
		$sql = "begin; ";
		for ($i = 0; $i < count($availableTo); $i++)
		{
			$sql .= "update users set claimable_passes = claimable_passes - " . $passId . " where puid_num = " . $userId . ";";
		}
		$sql .= "update users set gifted_passes = gifted_passes - " . $passId . " where puid_num = " . $owner .
						"; update passes set available_to = $1, owner = " . $userId . ", PREVIOUS_OWNERS = previous_owners + " . $owner . " where id = " . $passId .
						"; update users set passes_available = passes_available + " . $passId . " where puid_num = " . $userId;
		$r = pg_query_params($dbconn, $sql, array(array()));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
							
	/**
	* Returns true if User has Access To Event
	*/
	function usePass($clubName, $time)
	{
		$r = pg_query($dbconn, "select id, banned_users @> array[" . $userId . "]::bigint[] from clubs where name = '" . $clubName . "::varchar");
		if ($r === false)
			throw new Exception("Query Error");
		if (pg_fetch_result($r, 1, 1))
			throw new Exception("Club: " . $clubName . " Does Not Exist");
		if (pg_fetch_result($r, 1, 2))
		{
			pg_free_result($r);
			$r = pg_query($dbconn, "select banned_users, banned_until from clubs where name = '" . $clubName . "'::varchar");
			$bannedUsers = pg_fetch_result($r, 1, 1);
			$bannedUntil = pg_fetch_result($r, 1, 2);
			pg_free_result($r);
			$index = array_search($userId, $bannedUsers);
			if ($time > $bannedUntil[$index])
			{
				array_splice($bannedUsers, $index, 1);
				array_splice($bannedUntil, $index, 1);
				pg_query_params($dbconn, "update clubs set banned_users = $1, banned_until = $2 where name = '" . $clubName . "'::varchar", array($bannedUsers, $bannedUntil));
			}
			else
				return false;
		}
		else 
		{
			pg_free_result($r);
		}
		$r = pg_query($dbconn, "select id, pass_type from events where club = '" . $clubName . "' and start_date <= " . $time . " and end_date >= " . $time);
		if ($r === false)
			throw new Exception("Query Error");
		$eventId = pg_fetch_result($r, 1, 1);
		$passType = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($eventId === false || $passType === false)
			throw new Exception("Event at " . $clubName . " at " . $time . " Does Not Exist");
		$r = pg_query($dbconn, "select club_membership from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$clubMembership = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($clubMembership === false)
			throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
		if ($clubMembership != NULL && strcmp($clubMembership, $clubName) == 0)
		{
			$r = pg_query($dbconn, "begin; update events set users_attended = users_attended || " . $userId . "::bigint where id = " . $eventId);
			if ($r === false)
			{
				pg_query($dbconn, "rollback");
				throw new Exception("Update Failed");
			}
			else
				pg_query($dbconn, "commit");
			return true;
		}
		if ($passType == 0)
		{
			$r = pg_query($dbconn, "begin; update events set users_attended = users_attended || " . $userId . "::bigint where id = " . $eventId);
			if ($r === false)
			{
				pg_query($dbconn, "rollback");
				throw new Exception("Update Failed");
			}
			else
				pg_query($dbconn, "commit");
			return true;
		}
		//Members Only
		if ($passType == 2)
			return false;
		$r = pg_query($dbconn, "select id, type from passes where owner = " . $userId . " and events @> array[" . $eventId . "]");
		if ($r === false)
			throw new Exception("Query Error");
		$passId = pg_fetch_result($r, 1, 1);
		$type = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		//User Doesn't Have Pass For Event
		if ($passId === false)
			return false;
		if ($type == 0)
		{
			$r = pg_query($dbconn, "begin; update users set past_attendance = past_attendance + " . $eventId . ", past_attendance_dates = past_attendance_dates || " .
					$time . "::bigint where puid_num = " . $userId . "; update passes set events = intset(" . $eventId . "), transferable = false, status = 1 where id = " .
					$passId . "; update events set users_attended = users_attended || " . $userId . "::bigint where id = " . $eventId);
			if ($r === false)
			{
				pg_query($dbconn, "rollback");
				throw new Exception("Update Failed");
			}
			else
				pg_query($dbconn, "commit");
			return true;
		}
		$r = pg_query($dbconn, "begin; update users set past_attendance = past_attendance + " . $eventId . ", past_attendance_dates = past_attendance_dates || " .
					$time + "::bigint, passes_available = passes_available - " . $passId + " where puid_num = " . $userId . "; delete from passes where id = " . $passId .
					"; update events set users_attended = users_attended || " . $userId . "::bigint where id = " . $eventId);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
		return true;
	}
	
	function askGroupForPass($eventId, $groupId)
	{
		$r = pg_query($dbconn, "select name, club from events where id = " . $eventId);
		if ($r === false)
			throw new Exception("Query Error");
		$eventName = pg_fetch_result($r, 1, 1);
		$clubName = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($eventName === false || $clubName === false)
			throw new Exception("Event ID " . $eventId . " Does Not Exist");
	
		$r = pg_query($dbconn, "select members, group_name from groups where id = " . $groupId);
		if ($r === false)
			throw new Exception("Query Error");
		$groupName = pg_fetch_result($r, 1, 2);
		$groupMembers = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($groupName === false || $groupMembers === false)
			throw new Exception("Group ID " . $eventId . " Does Not Exist");
	
		$r = pg_query($dbconn, "select first_name, last_name from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$firstName = pg_fetch_result($r, 1, 1);
		$lastName = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($firstName === false || $lastName === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		$notification = $firstName . " " . $lastName . " has requested a pass from " . $groupName . " for " . $eventName . " at " . $clubName;
	
		$sql = "begin; ";
		for ($i = 0; $i < count($groupMembers); $i++)
		{
			if ($groupMembers[$i] == $userId)
				continue;
	
			$sql .= "if (not select ignored_users @> array[" . $userId . "]::bigint[] from users where puid_num = " . $groupMembers[$i] . ") {update users set notifications = notifications || '"
						. $notification . "'::varchar, new_notifications = new_notifications + 1 where puid_num = " . $groupMembers[$i] . "};";
		}
		$r = pg_query($dbconn, $sql);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function askListForPass($eventId, $listNum)
	{
		$r = pg_query($dbconn, "select name, club from events where id = " . $eventId);
		if ($r === false)
			throw new Exception("Query Error");
		$eventName = pg_fetch_result($r, 1, 1);
		$clubName = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($eventName === false || $clubName === false)
				throw new Exception("Event ID " . $eventId . " Does Not Exist");
	
		$r = pg_query($dbconn, "select first_name, last_name, lists from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$firstName = pg_fetch_result($r, 1, 1);
		$lastName = pg_fetch_result($r, 1, 2);
		$lists = pg_fetch_result($r, 1, 3);
		pg_free_result($r);
		if ($firstName === false || $lastName === false)
			throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		$notification = $firstName . " " . $lastName . " has requested a pass for " . $eventName . " at " . $clubName;
		
	
		$listMembers = array();
		$currentList = -1;
		for ($i = 0; $i < count($lists); $i++)
		{
			if ($lists[$i] == $LIST_SEPARATOR)
			{
				$currentList++;
				if ($currentList > $listNum)
					break;
				continue;
			}
			if ($currentList == $listNum)
				array_push($listMembers, $lists[$i]);
		}
		if ($currentList < $listNum)
			throw new Exception("List Number " . $listNum . " Out Of Range");
		
		$value;
		$sql = "begin; ";
		for ($i = 0; $i < count($listMembers); $i++)
		{
			$value = $listMembers[$i];
			if ($value == $userId)
				continue;
	
			$sql .= "update users set notifications = notifications || '" .
					$notification . "'::varchar, new_notifications = new_notifications + 1 where puid_num = " . $value . ";";
		}
			
		$r = pg_query($dbconn, $sql);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
	
	function askListForPass($eventId, $userIds)
	{
		$r = pg_query($dbconn, "select name, club from events where id = " . $eventId);
		if ($r === false)
			throw new Exception("Query Error");
		$eventName = pg_fetch_result($r, 1, 1);
		$clubName = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($eventName === false || $clubName === false)
			throw new Exception("Event ID " . $eventId . " Does Not Exist");
	
		$r = pg_query($dbconn, "select first_name, last_name, lists from users where puid_num = " . $userId);
		if ($r === false)
			throw new Exception("Query Error");
		$firstName = pg_fetch_result($r, 1, 1);
		$lastName = pg_fetch_result($r, 1, 2);
		pg_free_result($r);
		if ($firstName === false || $lastName === false)
				throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
		$notification = $firstName . " " . $lastName . " has requested a pass for " . $eventName . " at " . $clubName;
		
		$sql = "begin; ";
		for ($i = 0; $i < count($userIds); $i++)
		{
			if ($userIds[$i] == $userId)
				continue;
			
			$sql .= "if (not select ignored_users @> array[" . $userId . "]::bigint[] from users where puid_num = " . $userIds[$i] . ") {update users set notifications = notifications || '"
				. $notification . "'::varchar, new_notifications = new_notifications + 1 where puid_num = " . $userIds[$i] . "};";
		}
		$r = pg_query($dbconn, $sql);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			throw new Exception("Update Failed");
		}
		else
			pg_query($dbconn, "commit");
	}
}
?>