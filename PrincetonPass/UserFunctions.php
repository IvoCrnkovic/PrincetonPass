<?php
static $LIST_SEPARATOR = -432625;
function getFirstName($userId)
{
	$r = pg_query($dbconn, "select first_name from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $name;
}
function getLastName($userId)
{
	$r = pg_query($dbconn, "select last_name from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $name;
}
function getGraduationYear($userId)
{
	$r = pg_query($dbconn, "select graduation_year from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $year;
}
function getClub($userId)
{
	$r = pg_query($dbconn, "select club_membership from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $club;
}
function getList($userId, $listNum)
{
	$r = pg_query($dbconn, "select lists from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	$currentList = -1;
	$firstIndex = -1; 
	$lastIndex = count($allLists);
	for ($i = 0; $i < $count($allLists); $i++)
	{
		if ($allLists[i] == $LIST_SEPARATOR)
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
function getGroups($userId)
{
	$r = pg_query($dbconn, "select group_membership from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getPassesAvailable($userId)
{
	$r = pg_query($dbconn, "select passes_available from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getPlannedAttendance($userId)
{
	$r = pg_query($dbconn, "select planned_attendance from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getPastAttendance($userId)
{
	$r = pg_query($dbconn, "select past_attendance from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getPrivacySetting($userId)
{
	$r = pg_query($dbconn, "select privacy_setting from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getVisibleTo($userId)
{
	$r = pg_query($dbconn, "select visible_to from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getClaimablePasses($userId)
{
	$r = pg_query($dbconn, "select claimable_passes from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getJoinableGroups($userId)
{
	$r = pg_query($dbconn, "select joinable_groups from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getIgnoredUsers($userId)
{
	$r = pg_query($dbconn, "select ignored_users from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getPastAttendanceDates($userId)
{
	$r = pg_query($dbconn, "select past_attendance_dates from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getNotifications($userId)
{
	$r = pg_query($dbconn, "select notifications from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getListName($userId, $listNum)
{
	$r = pg_query($dbconn, "select list_names[" . ($listNum + 1) . "] from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getGiftedPasses($userId)
{
	$r = pg_query($dbconn, "select gifted_passes from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}

function setFirstName($userId, $x)
{
	$r = pg_query($dbconn, "update users set first_name = '" . $x . "' where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Update Failed");
	pg_free_result($r);
}
function setLastName($x)
{
	$r = pg_query($dbconn, "update users set last_name = '" . $x . "' where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Update Failed");
	pg_free_result($r);
}
function setGraduationYear($x)
{
	$r = pg_query($dbconn, "update users set graduation_year = " . $x . " where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Update Failed");
	pg_free_result($r);
}
function setPrivacySetting($x)
{
	$r = pg_query($dbconn, "update users set privacy_setting = " . $x . " where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Update Failed");
	pg_free_result($r);
}

function addToList($listNum, $idToAdd)
{
	if ($listNum < 0)
		throw new Exception("Invalid List Number");
	$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $idToAdd);
	if (!r)
		throw new Exception("Query Error");
	if (!pg_fetch_result($r, 1, 1))
		throw new Exception("PUID_NUM: " . $idToAdd . " To Be Added Does Not Exist");
	pg_free_result($r);
	$r = pg_query($dbconn, "select lists from users where puid_num = " . $userId);
	if (!$r)
		throw new Exception("Query Error");
	$lists = pg_fetch_result($r, 1, 1);
	if (!$lists)
		throw new IllegalArgumentException("PUID_NUM: " . $userId . " Does Not Exist");
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
	
	pg_query_params($dbconn, "update users set lists = $1 where puid_num = " . $userId, array($lists));
}

function addList($listToAdd, $name)
{
	$r = pg_query($dbconn, "select lists from users where puid_num = " . $userId);
	if (!$r)
		throw new Exception("Query Failed");
	$lists = pg_fetch_result($r, 1, 1);
	if (!$lists)
		throw new Exception("PUID_NUM: " + $userId + " Does Not Exist");
	
	array_push($lists, $LIST_SEPERATOR);
	array_push($lists, $listToAdd);

	pg_query_params($dbconn, "update users set lists = $1 where puid_num = " . $userId, array($lists));
}

function removeFromList($listNum, $idToRemove)
{
	if ($listNum < 0)
		throw new Exception("Invalid List Number");
	$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $idToRemove);
	if (!$r)
		throw new Exception("Query Failed");
	if (!pg_fetch_result($r, 1, 1))
		throw new Exception("PUID_NUM: " . $idToRemove . " To Be Removed Does Not Exist");
	$r = pg_query($dbconn, "select lists from users where puid_num = " . $userId);
	if (!$r)
		throw new Exception("Query Failed");

	$lists = pg_fetch_result($r, 1, 1);
	if (!$lists)
		throw new Exception("PUID_NUM: " . $userId . " To Be Removed Does Not Exist");

	$index = 0;
	$size = count($lists);
	//TODO Check this label
	outerloop: for ($i = -1; i < $listNum; $i++)
	{
		for (; $index < $size; $index++)
		{
			if ($lists[$index] == LIST_SEPARATOR)
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

	pg_query_params($dbconn, "update users set lists = $1 where puid_num = " . $userId, array($lists));
}

function removeFromList($listNum, $listIndex)
	{
	if ($listNum < 0)
		throw new Exception("Invalid List Number");
	if ($listIndex < 0)
		throw new Exception("Invalid List Index");
	$r = pg_query($dbconn, "select lists from users where puid_num = " . $userId);
	if (!$r)
		throw new Exception("Query Error");
	$lists = pg_fetch_result($r, 1, 1);
	if (!$lists)
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

	pg_query_params($dbconn, "update users set lists = $1 where puid_num = " . $userId, array($lists));
}

function removeList($listNum)
{
	if ($listNum <= 0)
		throw new Exception("Invalid List Number");
	$r = pg_query($dbconn, "select lists, list_names from users where puid_num = " . $userId);
	if (!$r)
		throw new Exception("Query Error");
	$listNames = pg_fetch_result($r, 1, 1);
	$lists = pg_fetch_result($r, 1, 2);
	if (!$listNames || !$lists)
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

	pg_query_params($dbconn, "update users set lists = $1 where puid_num = " . $userId, array($lists));
}

function addGroup($groupId)
{
	$r = pg_query("select puid_num from users where puid_num = " . $userId);
	if (!$r)
		throw new Exception("Query Error");
	if (!pg_fetch_result($r, 1, 1))
		throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
	$r = pg_query($dbconn, "select pending_members from groups where id = " . $groupId);
	if (!$r)
		throw new Exception("Query Error");
	$pendingInvites = pg_fetch_result($r, 1, 1);
	if (!$pendingInvites)
		throw new Exception("Group ID: " . $groupId . " Does Not Exist");
	
	array_splice($pendingInvites, array_search($userId, $pendingInvites), 1);
	pg_query_params("begin; update users set group_membership = group_membership + " . $groupId . " where puid_num = " . $userId . "; " .
		"update groups set members = members + " . $userId . ", pending_invites = $1 where id = " . $groupId . ";commit", array($pendingInvites));
	
}

function removeGroup($groupId)
{
	$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");

	pg_query($dbconn, "begin; update users set group_membership = group_membership - " . $groupId . "where puid_num = " . $userId . "; " .
	"update groups set members = members - " . $userId . " where id = " . $groupId);
}

function transferPass($toUserId, $passId)
{
	$r = pg_query($dbconn, "select ignored_users @> array[" . $userId . "]::bigint[] from users where puid_num = " . $toUserId);
	if (!$r)
		throw new Exception("Query Error");
	if (!pg_fetch_result($r, 1, 1))
		throw new Exception("User " . $userId . " Is Ignored By User " . $toUserId);

	$r = pg_query($dbconn, "select TRANSFERABLE from passes where id = " . $passId);
	if (!pg_fetch_result($r, 1, 1))
		throw new Exception("Pass ID: " . $passId . " Is Not Transferable");

	$r = pg_query($dbconn, "select first_name, last_name from users where puid_num = " . $userId);
	if (!$r)
		throw new Exception("Query Error");
	if (!pg_fetch_result($r, 1, 1))
		throw new Exception("Sending PUID_NUM: " . $userId . " Does Not Exist");
	$notification = pg_fetch_result($r, 1, 1) . " " . pg_fetch_result($r, 1, 2) . " has gifted you a pass! Check it out in your passes tab";

	pg_query("begin; update users set passes_available = passes_available + " . $passId . ", notifications = notification || '" .
	$notification . "'::varchar, new_notifications = new_notifications + 1 where puid_num = " . $toUserId .
	"; update users set passes_available = passes_available - " . $passId . " where puid_num = " . $userId .
	"; update passes set owner = " . $toUserId . ", previous_owners = previous_owners + " .
	$userId . " where id = " . $passId . "; commit");
}

function addPlannedAttendance($eventId)
{
	$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	if(!pg_fetch_result($r, 1, 1))
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	$r = pg_query($dbconn, "select id from events where puid_num = " . $eventId);
	if(!$r)
		throw new Exception("Query Error");
	if(!pg_fetch_result($r, 1, 1))
		throw new Exception("Event ID " . $eventId . " Does Not Exist");
	pg_query($dbconn, "update users set PLANNED_ATTENDANCE = PLANNED_ATTENDANCE + " . $eventId . " where puid_num = " . $userId);
}

function removePlannedAttendance($eventId)
{
	$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	if(!pg_fetch_result($r, 1, 1))
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");

	pg_query($dbconn, "update users set planned_attendance = planned_attendance - " . $eventId . " where puid_num = " . $userId);
}

function removePastAttendance($eventId)
{
	$r = pg_query($dbconn, "select past_attendance # " . $eventId . ", past_attendance_dates from users where puid_num = " . $userId);
	if (!$r)
		throw new Exception("Query Error");
	$index = pg_fetch_result($r, 1, 1);
	if (!$index)
		throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");
	$index -= 1;
	$pastAttendanceDates = pg_fetch_result($r, 1, 1);
	array_splice($pastAttendanceDates, $index, 1);
	pg_query_params($dbconn, "update users set past_attendance = past_attendance - " . $eventId . ", past_attendance_dates = $1 where puid_num = " . $userId, array($pastAttendanceDates));
}

function addToVisibleTo($userToAdd)
{
	$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	if(!pg_fetch_result($r, 1, 1))
		throw new Exception("PUID_NUM " . $userId . " Does Not Exist");
	$r = pg_query($dbconn, "select puid_num from users where puid_num = " . $userToAdd);
	if(!$r)
		throw new Exception("Query Error");
	if(!pg_fetch_result($r, 1, 1))
		throw new Exception("PUID_NUM " . $userToAdd . " Does Not Exist");
	pg_query("update users set visible_to = visible_to || " . $userToAdd . "::bigint where puid_num = " . $userId);
}

function removeFromVisibleTo($userToRemove)
{
	$r = pg_query($dbconn, "select visible_to from users where puid_num = " . $userId);
	if (!$r)
		throw new Exception("Query Error");
	$users = pg_fetch_result($r, 1, 1);
	if (!$users)
		throw new Exception("PUID_NUM: " . $userId . " Does Not Exist");

	array_splice($users, array_search($userToRemove, $users), 1);
	pg_query_params($dbconn, "update users set visible_to = $1 where puid_num = " . $userId, array($users));
}

function addIgnoredUser(long userToIgnore)
{
	if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
		throw new IllegalArgumentException("PUID_NUM: " + userId + " To Add To Does Not Exist");
	if (!s.executeQuery("select puid_num from users where puid_num = " + userToIgnore).next())
		throw new IllegalArgumentException("PUID_NUM: " + userToIgnore + " To Be Added Does Not Exist");
	s.executeUpdate("update users set ignored_users = ignored_users || " + userToIgnore + "::bigint where puid_num = " + userId);	
}

	function removeIgnoredUser(long userToRemove)
	{
		$r = s.executeQuery("select ignored_users from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		Long[] users = (Long[]) r.getArray(1).getArray();

		PreparedStatement p = null;
		try
		{
			p = con.prepareStatement("update users set ignored_users = ? where puid_num = " + userId);
			p.setArray(1, con.createArrayOf("bigint", removeIndexFromLongArray(users, userToRemove)));
			p.executeUpdate();
		}
		finally
		{
			if (p != null)
				p.close();
		}
	}

	function addNotification(String message)
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " To Add To Does Not Exist");
		s.executeUpdate("update users set notifications = notifications || '" + message + "'::varchar where puid_num = " + userId);
	}

	function removeNotification(int index)
	{
		$r = s.executeQuery("select notifications from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		ArrayList<String> notifications = new ArrayList<String>(Arrays.asList((String[]) r.getArray(1).getArray()));
		if (index >= notifications.size() || index < 0)
			throw new IllegalArgumentException("Index: " + index + " Out Of Range");
		notifications.remove(index);

		PreparedStatement p = null;
		try
		{
			p = con.prepareStatement("update users set notifications = ? where puid_num = " + userId);
			p.setArray(1, con.createArrayOf("varchar", notifications.toArray()));
			p.executeUpdate();
		}
		finally
		{
			if (p != null)
				p.close();
		}
	}

	function giftPassToGroup(int groupId, int passId)
	{
		$r = s.executeQuery("select first_name, last_name from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		String firstName = r.getString(1), lastName = r.getString(2);

		r = s.executeQuery("select transferable, available_to from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
		if (!r.getBoolean(1))
			throw new IllegalArgumentException("Pass ID: " + passId + " Is Not Transferable");

		ArrayList<Long> availableTo = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(2).getArray()));

		r = s.executeQuery("select members, group_name from groups where id = " + groupId);
		if (!r.next())
			throw new IllegalArgumentException("Group Id: " + groupId + " Does Not Exist");
		Long[] groupMembers = (Long[]) r.getArray(1).getArray();
		String notification = firstName + " " + lastName + " has gifted " + r.getString(2) + " a pass! Check your Get tab to claim it";

		PreparedStatement pre = null;
		PreparedStatement p = null;
		try
		{
			long value;
			p = con.prepareStatement("update users set claimable_passes = claimable_passes + " + passId + ", notifications = notifications || '"
					+ notification + "'::varchar, new_notifications = new_notifications + 1 where puid_num = ?");
					for (int i = 0; i < groupMembers.length; i++)
					{
						value = groupMembers[i].longValue();
						if (value == userId || availableTo.contains(groupMembers[i]))
							continue;

						availableTo.add(groupMembers[i]);
						p.setLong(1, value);
						p.addBatch();
		}
			
		pre = con.prepareStatement("update users set gifted_passes = gifted_passes + " + passId + ", passes_available = passes_available - " + passId + " where puid_num = " + userId +
					"; update passes set available_to = ? where id = " + passId + "; update groups set passes_available = passes_available + " + passId + "where id = " + groupId);
					pre.setArray(1, con.createArrayOf("integer", availableTo.toArray()));
					con.setAutoCommit(false);
					p.executeBatch();
					pre.executeUpdate();
					con.commit();
					con.setAutoCommit(true);
	}
	finally
	{
	if (p != null)
		p.close();
		if (pre != null)
		pre.close();
}
}

function giftPassToList(int passId, int listNum)
{
	if (listNum < 0)
		throw new IllegalArgumentException("List Number " + listNum + " Out Of Range");
	$r = s.executeQuery("select lists, first_name, last_name from users where puid_num = " + userId);
	if (!r.next())
		throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
	Long[] lists = (Long[]) r.getArray(1).getArray();
	String notification = r.getString(2) + " " + r.getString(3) + " has gifted you a pass! Check your Get tab to claim it";
	r = s.executeQuery("select transferable, available_to from passes where id = " + passId);
	if (!r.next())
		throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
	if (!r.getBoolean(1))
		throw new IllegalArgumentException("Pass ID: " + passId + " Is Not Transferable");

	ArrayList<Long> availableTo = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(2).getArray()));


	ArrayList<Long> listMembers = new ArrayList<Long>();
	int currentList = -1;
	for (int i = 0; i < lists.length; i++)
	{
	if (lists[i].longValue() == Long.MIN_VALUE)
	{
	currentList++;
	if (currentList > listNum)
		break;
		continue;
	}
	if (currentList == listNum)
		listMembers.add(lists[i]);
	}
	if (currentList < listNum)
		throw new IllegalArgumentException("List Number " + listNum + " Out Of Range");

		PreparedStatement pre = null;
		PreparedStatement p = null;
		try
		{
		long value;
		p = con.prepareStatement("update users set claimable_passes = claimable_passes + " + passId + ", notifications = notifications || '" +
						notification + "'::varchar, new_notifications = new_notifications + 1 where puid_num = ?");
			for (int i = 0; i < listMembers.size(); i++)
		{
		value = listMembers.get(i).longValue();
		if (value == userId || availableTo.contains(listMembers.get(i)))
			continue;

			availableTo.add(listMembers.get(i));
		p.setLong(1, value);
		p.addBatch();
		}
			
		pre = con.prepareStatement("update users set gifted_passes = gifted_passes + " + passId + ", passes_available = passes_available - " + passId +" where puid_num = " + userId +
				"; update passes set available_to = ? where id = " + passId);
			pre.setArray(1, con.createArrayOf("integer", availableTo.toArray()));
			con.setAutoCommit(false);
			p.executeBatch();
			pre.executeUpdate();
			con.commit();
			con.setAutoCommit(true);
		}
		finally
		{
		if (p != null)
			p.close();
		if (pre != null)
			pre.close();
		}
		}

		function giftPassToList(int passId, long[] userIds)
		{
		$r = s.executeQuery("select first_name, last_name from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
			String notification = r.getString(2) + " " + r.getString(3) + " has gifted you a pass! Check your Get tab to claim it";
		r = s.executeQuery("select transferable, available_to from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
			if (!r.getBoolean(1))
			throw new IllegalArgumentException("Pass ID: " + passId + " Is Not Transferable");

		ArrayList<Long> availableTo = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(2).getArray()));

		PreparedStatement pre = null;
		PreparedStatement p = null;
		try
		{
		p = con.prepareStatement("update users set claimable_passes = claimable_passes + " + passId + ", notifications = notifications || '" +
				notification + "'::varchar, new_notifications = new_notifications + 1 where puid_num = ?");
			for (int i = 0; i < userIds.length; i++)
			{
						if (userIds[i] == userId || availableTo.contains(userIds[i]))
							continue;

							availableTo.add(userIds[i]);
							p.setLong(1, userIds[i]);
							p.addBatch();
						}
							
						pre = con.prepareStatement("update users set gifted_passes = gifted_passes + " + passId + ", passes_available = passes_available - " + passId +" where puid_num = " + userId +
						"; update passes set available_to = ? where id = " + passId);
			pre.setArray(1, con.createArrayOf("integer", availableTo.toArray()));
			con.setAutoCommit(false);
			p.executeBatch();
			pre.executeUpdate();
			con.commit();
			con.setAutoCommit(true);
		}
		finally
		{
		if (p != null)
			p.close();
			if (pre != null)
				pre.close();
			}
		}

		function retractPass(int passId)
		{
		$r = s.executeQuery("select first_name, last_name from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		String notification = r.getString(1) + " " + r.getString(2) + " has retracted a previously gifted pass";
		r = s.executeQuery("select available_to, owner from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
		if (r.getInt(2) != userId)
			throw new IllegalArgumentException("User " + userId + " No Longer Owns Pass");

					Long[] availableTo = (Long[]) r.getArray(1).getArray();

					PreparedStatement pre = null;
					PreparedStatement p = null;
					try
					{
					p = con.prepareStatement("update users set claimable_passes = claimable_passes - " + passId + ", notifications = notifications || '" +
					notification + "'::varchar, new_notifications = new_notifications + 1 where puid_num = ?");
			for (int i = 0; i < availableTo.length; i++)
					{
					p.setLong(1, userId);
						p.addBatch();
					}
						
					pre = con.prepareStatement("update users set gifted_passes = gifted_passes - " + passId + ", passes_available = passes_available + " + passId + " where puid_num = " + userId +
							"; update passes set available_to = ? where id = " + passId);
			pre.setArray(1, con.createArrayOf("bigint", new Long[0]));
			con.setAutoCommit(false);
			p.executeBatch();
			pre.executeUpdate();
			con.commit();
			con.setAutoCommit(true);
					}
					finally
					{
					if (p != null)
						p.close();
						if (pre != null)
							pre.close();
					}
		}

		function renameList(int listNum, String name)
			{
			if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
			s.executeUpdate("update users set list_names[" + (listNum + 1) + "] = '" + name + "' where puid_num = " + userId);
		}

		function claimPass(int passId)
		{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
		throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		$r = s.executeQuery("select available_to, owner from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
			long owner = r.getInt(2);

			Long[] availableTo = (Long[]) r.getArray(1).getArray();

			PreparedStatement pre = null;
			PreparedStatement p = null;
			try
			{
			p = con.prepareStatement("update users set claimable_passes = claimable_passes - " + passId + " where puid_num = ?");
			for (int i = 0; i < availableTo.length; i++)
				{
				p.setLong(1, userId);
				p.addBatch();
			}
			pre = con.prepareStatement("update users set gifted_passes = gifted_passes - " + passId + " where puid_num = " + owner +
					"; update passes set available_to = ?, owner = " + userId + ", PREVIOUS_OWNERS = previous_owners + " + owner + " where id = " + passId +
					"; update users set passes_available = passes_available + " + passId + " where puid_num = " + userId);
					pre.setArray(1, con.createArrayOf("bigint", new Long[0]));
					con.setAutoCommit(false);
					p.executeBatch();
					pre.executeUpdate();
					con.commit();
					con.setAutoCommit(true);
					}
					finally
					{
					if (p != null)
						p.close();
						if (pre != null)
						pre.close();
						}
						}

						
	/**
	* Returns true if User has Access To Event
	*/
	function usePass(String clubName, long time)
	{
	$r = s.executeQuery("select banned_users @> array[" + userId + "]::bigint[] from clubs where name = '" + clubName + "::varchar");
		if (!r.next())
			throw new IllegalArgumentException("Club: " + clubName + " Does Not Exist");
		if (r.getBoolean(1))
		{
			r = s.executeQuery("select banned_users, banned_until from clubs where name = '" + clubName + "'::varchar");
			r.next();
			ArrayList<Long> bannedUsers = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(1).getArray()));
			ArrayList<Long> bannedUntil = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(2).getArray()));
			int index = bannedUsers.indexOf(new Long(userId));
			if (time > bannedUntil.get(index))
			{
			bannedUsers.remove(index);
			bannedUntil.remove(index);
			PreparedStatement p = null;
				try
				{
					p = con.prepareStatement("update clubs set banned_users = ?, banned_until = ? where name = '" + clubName + "'::varchar");
					p.setArray(1, con.createArrayOf("bigint", bannedUsers.toArray()));
					p.setArray(2, con.createArrayOf("bigint", bannedUntil.toArray()));
						p.executeUpdate();
					}
					finally
					{
					if (p != null)
						p.close();
						}
			}
			else
				return false;
		}
		r = s.executeQuery("select id, pass_type from events where club = '" + clubName + "' and start_date <= " + time + " and end_date >= " + time);
		if (!r.next())
			throw new IllegalArgumentException("Event at " + clubName + " at " + new Date(time) + " Does Not Exist");
					int eventId = r.getInt(1);
		short passType = r.getShort(2);
		r = s.executeQuery("select club_membership from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
			if (r.getString(1) != null && r.getString(1).equals(clubName))
		{
			s.executeUpdate("update events set users_attended = users_attended || " + userId + "::bigint where id = " + eventId);
			return true;
		}
		if (passType == 0)
		{
			s.executeUpdate("update events set users_attended = users_attended || " + userId + "::bigint where id = " + eventId);
			return true;
						}
						if (passType == 2)
					throw new RuntimeException("Event " + eventId + " Is Members Only");
					r = s.executeQuery("select id, type from passes where owner = " + userId + " and events @> array[" + eventId + "]");
		if (!r.next())
		throw new RuntimeException("User Does Not Have Pass For Event");
		int passId = r.getInt(1);
		short type = r.getShort(2);
		if (type == 0)
		{
			s.executeUpdate("begin; update users set past_attendance = past_attendance + " + eventId + ", past_attendance_dates = past_attendance_dates || " +
					time + "::bigint where puid_num = " + userId + "; update passes set events = intset(" + eventId + "), transferable = false, status = 1 where id = " +
					passId + "; update events set users_attended = users_attended || " + userId + "::bigint where id = " + eventId);
			return true;
		}
		s.executeUpdate("begin; update users set past_attendance = past_attendance + " + eventId + ", past_attendance_dates = past_attendance_dates || " +
				time + "::bigint, passes_available = passes_available - " + passId + " where puid_num = " + userId + "; delete from passes where id = " + passId +
				"; update events set users_attended = users_attended || " + userId + "::bigint where id = " + eventId);
				return true;
}

function removeIndexFromLongArray(Long[] arr, Long value)
{
Long[] newArr = new Long[arr.length - 1];
int offset = 0, index = 0;
for (; index < arr.length; index++)
	if (arr[index].longValue() == value.longValue())
	break;
		if (index == arr.length)
			throw new IllegalArgumentException("Value " + value + " Not Found In Array");
			for (int i = 0; i < arr.length; i++)
			{
			if (i == index)
			{
			offset = -1;
			continue;
}
			newArr[i + offset] = arr[i];
}
return (Long[]) newArr;
}

function askGroupForPass(int eventId, int groupId)
	{
		$r = s.executeQuery("select name, club from events where id = " + eventId);
		if (!r.next())
		throw new IllegalArgumentException("Event ID " + eventId + " Does Not Exist");
		String eventName = r.getString(1), clubName = r.getString(2);

		r = s.executeQuery("select members, group_name from groups where id = " + groupId);
		if (!r.next())
		throw new IllegalArgumentException("Group ID " + eventId + " Does Not Exist");
		String groupName = r.getString(2);
		Long[] groupMembers = (Long[]) r.getArray(1).getArray();

		r = s.executeQuery("select first_name, last_name from users where puid_num = " + userId);
		if (!r.next())
		throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		String notification = r.getString(1) + " " + r.getString(2) + " has requested a pass from " + groupName + " for " + eventName + " at " + clubName;

		PreparedStatement p = null;
		try
		{
			p = con.prepareStatement("if (not select ignored_users @> array[" + userId + "]::bigint[] from users where puid_num = ?) {update users set notifications = notifications || '"
					+ notification + "'::varchar, new_notifications = new_notifications + 1 where puid_num = ?}");
					for (int i = 0; i < groupMembers.length; i++)
					{
					if (groupMembers[i].longValue() == userId)
						continue;

					p.setLong(1, groupMembers[i].longValue());
					p.setLong(2, groupMembers[i].longValue());
					p.addBatch();
		}
			
		con.setAutoCommit(false);
		p.executeBatch();
		con.commit();
			con.setAutoCommit(true);
		}
		finally
		{
		if (p != null)
			p.close();
}
}

function askListForPass(int eventId, int listNum)
	{
		$r = s.executeQuery("select name, club from events where id = " + eventId);
		if (!r.next())
				throw new IllegalArgumentException("Event ID " + eventId + " Does Not Exist");
				String eventName = r.getString(1), clubName = r.getString(2);

		r = s.executeQuery("select first_name, last_name, lists from users where puid_num = " + userId);
		if (!r.next())
		throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		String notification = r.getString(1) + " " + r.getString(2) + " has requested a pass for " + eventName + " at " + clubName;
		Long[] lists = (Long[]) r.getArray(1).getArray();

		ArrayList<Long> listMembers = new ArrayList<Long>();
		int currentList = -1;
			for (int i = 0; i < lists.length; i++)
			{
			if (lists[i].longValue() == Long.MIN_VALUE)
			{
			currentList++;
			if (currentList > listNum)
				break;
				continue;
		}
			if (currentList == listNum)
				listMembers.add(lists[i]);
}
if (currentList < listNum)
			throw new IllegalArgumentException("List Number " + listNum + " Out Of Range");

			PreparedStatement p = null;
			try
			{
			long value;
			p = con.prepareStatement("update users set notifications = notifications || '" +
						notification + "'::varchar, new_notifications = new_notifications + 1 where puid_num = ?");
			for (int i = 0; i < listMembers.size(); i++)
			{
			value = listMembers.get(i).longValue();
			if (value == userId)
				continue;

				p.setLong(1, value);
				p.addBatch();
			}
				
				
			con.setAutoCommit(false);
			p.executeBatch();
			con.commit();
			con.setAutoCommit(true);
			}
			finally
			{
			if (p != null)
				p.close();
}
}

function askListForPass(int eventId, long[] userIds)
	{
		$r = s.executeQuery("select name, club from events where id = " + eventId);
		if (!r.next())
			throw new IllegalArgumentException("Event ID " + eventId + " Does Not Exist");
			String eventName = r.getString(1), clubName = r.getString(2);

		r = s.executeQuery("select first_name, last_name, lists from users where puid_num = " + userId);
		if (!r.next())
				throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
				String notification = r.getString(1) + " " + r.getString(2) + " has requested a pass for " + eventName + " at " + clubName;

				PreparedStatement p = null;
				try
		{
			p = con.prepareStatement("if (not select ignored_users @> array[" + userId + "]::bigint[] from users where puid_num = ?) {update users set notifications = notifications || '"
					+ notification + "'::varchar, new_notifications = new_notifications + 1 where puid_num = ?}");
				for (int i = 0; i < userIds.length; i++)
				{
				if (userIds[i] == userId)
					continue;

				p.setLong(1, userIds[i]);
				p.setLong(2, userIds[i]);
				p.addBatch();
				}
					
				con.setAutoCommit(false);
				p.executeBatch();
				con.commit();
				con.setAutoCommit(true);
				}
				finally
				{
			if (p != null)
				p.close();
		}
	}
}

?>