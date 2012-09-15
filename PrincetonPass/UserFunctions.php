<?php
static $LIST_SEPARATOR = -432625;
function getFirstName($userId)
{
	$r = pg_query($dbconn, "select first_name from users where puid_num = " . $userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $name;
}
function getLastName()
{
	$r = pg_query($dbconn, "select last_name from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $name;
}
function getGraduationYear()
{
	$r = pg_query($dbconn, "select graduation_year from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $year;
}
function getClub()
{
	$r = pg_query($dbconn, "select club_membership from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $club;
}
function getList($listNum)
{
	$r = pg_query($dbconn, "select lists from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
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
		throw new Exception("List Number " . listNum . " Out Of Bounds");
	if ($firstIndex >= count($allLists) || $firstIndex == $lastIndex)
		return array();
	return array_slice($allLists, $firstIndex, $lastIndex - $firstIndex);
}
function getGroups()
{
	$r = pg_query($dbconn, "select group_membership from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getPassesAvailable()
{
	$r = pg_query($dbconn, "select passes_available from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getPlannedAttendance()
{
	$r = pg_query($dbconn, "select planned_attendance from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getPastAttendance()
{
	$r = pg_query($dbconn, "select past_attendance from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getPrivacySetting()
{
	$r = pg_query($dbconn, "select privacy_setting from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getVisibleTo()
{
	$r = pg_query($dbconn, "select visible_to from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getClaimablePasses()
{
	$r = pg_query($dbconn, "select claimable_passes from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getJoinableGroups()
{
	$r = pg_query($dbconn, "select joinable_groups from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getIgnoredUsers()
{
	$r = pg_query($dbconn, "select ignored_users from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getPastAttendanceDates()
{
	$r = pg_query($dbconn, "select past_attendance_dates from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getNotifications()
{
	$r = pg_query($dbconn, "select notifications from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getListName($listNum)
{
	$r = pg_query($dbconn, "select list_names[" . ($listNum + 1) . "] from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}
function getGiftedPasses()
{
	$r = pg_query($dbconn, "select gifted_passes from users where puid_num = " . userId);
	if(!$r)
		throw new Exception("Query Error");
	$result = pg_fetch_result($r, 1, 1); 
	if(!$result)
		throw new Exception("PUID_NUM " . userId . " Does Not Exist");
	pg_free_result($r);
	return $result;
}

function setFirstName($x)
{
	$r = pg_query($dbconn, "update users set first_name = '" . x . "' where puid_num = " . userId);
	if(!$r)
		throw new Exception("Update Failed");
	pg_free_result($r);
}
function setLastName($x)
{
	$r = pg_query($dbconn, "update users set last_name = '" . x . "' where puid_num = " . userId);
	if(!$r)
		throw new Exception("Update Failed");
	pg_free_result($r);
}
function setGraduationYear($x)
{
	$r = pg_query($dbconn, "update users set graduation_year = " . x . " where puid_num = " . userId);
	if(!$r)
		throw new Exception("Update Failed");
	pg_free_result($r);
}
function setPrivacySetting($x)
{
	$r = pg_query($dbconn, "update users set privacy_setting = " . x . " where puid_num = " . userId);
	if(!$r)
		throw new Exception("Update Failed");
	pg_free_result($r);
}

function addToList($listNum, $idToAdd)
{
	if ($listNum < 0)
		throw new Exception("Invalid List Number");
	$r = pg_query($dbconn, "select puid_num from users where puid_num = " . idToAdd);
	if (!r)
		throw new Exception("Query Error");
	if (!pg_fetch_result($r, 1, 1))
		throw new Exception("PUID_NUM: " . idToAdd . " To Be Added Does Not Exist");
	pg_free_result($r);
	$r = pg_query($dbconn, "select lists from users where puid_num = " . userId);
	if (!$r)
		throw new Exception("Query Error");
	
		throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		ArrayList<Long> lists = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(1).getArray()));
		int currentList = -1, index = 0;
	for (; index < lists.size(); index++)
	{
		if (lists.get(index).longValue() == Long.MIN_VALUE)
		{
			currentList++;
			if (currentList == listNum)
				break;
		}
		}
	index++;
	int newIndex = index;
		while (newIndex < lists.size() && lists.get(newIndex).longValue() != Long.MIN_VALUE)
		{
			if (lists.get(newIndex).longValue() == idToAdd)
				throw new RuntimeException("User Already Exists In List");
			newIndex++;
		}
		lists.add(index, new Long(idToAdd));

		PreparedStatement p = con.prepareStatement("update users set lists = ? where puid_num = " + userId);
		p.setArray(1, con.createArrayOf("bigint", lists.toArray()));
		p.executeUpdate();
		p.close();
	}

	function addList(long[] listToAdd, String name)
	{
		$r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");

		ArrayList<Long> lists = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(1).getArray()));

		lists.add(new Long(Long.MIN_VALUE));
		for (int i = 0; i < listToAdd.length; i++)
			lists.add(new Long(listToAdd[i]));

		PreparedStatement p = con.prepareStatement("update users set lists = ?, list_names = list_names || ARRAY['" + name + "']::varchar[] where puid_num = " + userId);
		p.setArray(1, con.createArrayOf("bigint", lists.toArray()));
		p.executeUpdate();
		p.close();
	}

	function removeFromList(int listNum, long idToRemove)
	{
		if (listNum < 0)
			throw new IllegalArgumentException("Invalid List Number");
		if (!s.executeQuery("select puid_num from users where puid_num = " + idToRemove).next())
			throw new IllegalArgumentException("PUID_NUM: " + idToRemove + " To Be Removed Does Not Exist");

		$r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");

		ArrayList<Long> lists = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(1).getArray()));

		int index = 0, size = lists.size();
		outerloop: for (int i = -1; i < listNum; i++)
		{
			for (; index < size; index++)
			{
				if (lists.get(index).longValue() == Long.MIN_VALUE)
				{
					index++;
					continue outerloop;
				}
			}
			throw new IllegalArgumentException("List Number " + listNum + " Out Of Bounds");
		}
		index++;
		long value;
		for (; index < size; index++)
		{
			value = lists.get(index);
			if (value == Long.MIN_VALUE)
				throw new IllegalArgumentException("PUID_NUM: " + idToRemove + " Not Found In List");
			if (value == idToRemove)
			{
				lists.remove(index);
				break;
			}
		}
		if (index == size)
			throw new IllegalArgumentException("PUID_NUM: " + idToRemove + " Not Found In List");

		PreparedStatement p = con.prepareStatement("update users set lists = ? where puid_num = " + userId);
		p.setArray(1, con.createArrayOf("bigint", lists.toArray()));
		p.executeUpdate();
		p.close();
	}

	function removeFromList(int listNum, int listIndex)
		{
		if (listNum < 0)
			throw new IllegalArgumentException("Invalid List Number");
		if (listIndex < 0)
			throw new IllegalArgumentException("Invalid List Index");
		$r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");

		ArrayList<Long> lists = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(1).getArray()));

		int index = 0, size = lists.size();
		outerloop: for (int i = 0; i < listNum; i++)
		{
			for (; index < size; index++)
			{
				if (lists.get(index).longValue() == Long.MIN_VALUE)
					continue outerloop;
			}
			throw new IllegalArgumentException("List Number " + listNum + " Out Of Bounds");
		}

		index++;
		long value;
		long indexToRemove = index + 1L + listIndex;
		for (; index < size; index++)
		{
			value = lists.get(index);
			if (value == Long.MIN_VALUE)
				throw new IllegalArgumentException("List Index " + listIndex + " Out Of Bounds");
			if (value == indexToRemove)
			{
				lists.remove(indexToRemove);
				break;
			}
		}
		if (index == size)
			throw new IllegalArgumentException("List Index " + listIndex + " Out Of Bounds");

		PreparedStatement p = con.prepareStatement("update users set lists = ? where puid_num = " + userId);
		p.setArray(1, con.createArrayOf("bigint", lists.toArray()));
		p.executeUpdate();
		p.close();
	}

	function removeList(int listNum)
	{
		if (listNum <= 0)
			throw new IllegalArgumentException("Invalid List Number");
		$r = s.executeQuery("select lists, list_names from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");

		ArrayList<String> listNames = new ArrayList<String>(Arrays.asList((String[]) r.getArray(2).getArray()));
		ArrayList<Long> lists = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(1).getArray()));

		int currentList = -1, index = 0;
		for (; index < lists.size(); index++)
		{
			if (lists.get(index).longValue() == Long.MIN_VALUE)
			{
				currentList++;
				if (currentList == listNum)
					break;
			}
		}

		lists.remove(index);
		index++;
		while (index < lists.size() && lists.get(index).longValue() != Long.MIN_VALUE)
		{
			lists.remove(index);
			index++;
		}

		listNames.remove(listNum);

		PreparedStatement p = con.prepareStatement("update users set lists = ?, list_names = ? where puid_num = " + userId);
		p.setArray(1, con.createArrayOf("bigint", lists.toArray()));
		p.setArray(2, con.createArrayOf("varchar", listNames.toArray()));
		p.executeUpdate();
		p.close();
	}

	function addGroup(int groupId)
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		$r = s.executeQuery("select pending_members from groups where id = " + groupId);
		if (!r.next())
			throw new IllegalArgumentException("Group ID: " + groupId + " Does Not Exist");
		Long[] pendingInvites = (Long[]) r.getArray(1).getArray();

		PreparedStatement p = con.prepareStatement("begin; update users set group_membership = group_membership + " + groupId + " where puid_num = " + userId + "; " +
		"update groups set members = members + " + userId + ", pending_invites = ? where id = " + groupId + ";commit");
		p.setArray(1, con.createArrayOf("bigint", removeIndexFromLongArray(pendingInvites, userId)));
		p.executeUpdate();
		p.close();
	}

	function removeGroup(int groupId)
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");

		s.executeUpdate("begin; update users set group_membership = group_membership - " + groupId + "where puid_num = " + userId + "; " +
		"update groups set members = members - " + userId + " where id = " + groupId);
	}

	function transferPass(long toUserId, int passId)
	{
		$r = s.executeQuery("select ignored_users @> array[" + userId + "]::bigint[] from users where puid_num = " + toUserId);
		if (!r.next())
			throw new IllegalArgumentException("Receiving PUID_NUM: " + toUserId + " Does Not Exist");
		if (r.getBoolean(1))
			throw new RuntimeException("User " + userId + " Is Ignored By User " + toUserId);

		r = s.executeQuery("select TRANSFERABLE from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
		if (!r.getBoolean(1))
			throw new IllegalArgumentException("Pass ID: " + passId + " Is Not Transferable");

		r = s.executeQuery("select first_name, last_name from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("Sending PUID_NUM: " + userId + " Does Not Exist");
		String notification = r.getString(1) + " " + r.getString(2) + " has gifted you a pass! Check it out in your passes tab";

		s.executeUpdate("begin; update users set passes_available = passes_available + " + passId + ", notifications = notification || '" +
		notification + "'::varchar, new_notifications = new_notifications + 1 where puid_num = " + toUserId +
		"; update users set passes_available = passes_available - " + passId + " where puid_num = " + userId +
		"; update passes set owner = " + toUserId + ", previous_owners = previous_owners + " +
		userId + " where id = " + passId + "; commit");

	}

	function addPlannedAttendance(int eventId)
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		if (!s.executeQuery("select id from events where id = " + eventId).next())
			throw new IllegalArgumentException("Event ID: " + eventId + " Does Not Exist");
		s.executeUpdate("update users set PLANNED_ATTENDANCE = PLANNED_ATTENDANCE + " + eventId + " where puid_num = " + userId);
	}

	function removePlannedAttendance(int eventId)
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");

		s.executeUpdate("update users set planned_attendance = planned_attendance - " + eventId + " where puid_num = " + userId);
	}

	function removePastAttendance(int eventId)
	{
		$r = s.executeQuery("select past_attendance # " + eventId + ", past_attendance_dates from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		int index = r.getInt(1);
		index -= 1;
		ArrayList<Long> pastAttendanceDates = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(2).getArray()));
		pastAttendanceDates.remove(index);
		PreparedStatement p = null;
		try
		{
			p = con.prepareStatement("update users set past_attendance = past_attendance - " + eventId + ", past_attendance_dates = ? where puid_num = " + userId);
			p.setArray(1, con.createArrayOf("bigint", pastAttendanceDates.toArray()));
			p.executeUpdate();
		}
		finally
		{
			if (p != null)
				p.close();
		}
	}

	function addToVisibleTo(long userToAdd)
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " To Add To Does Not Exist");
		if (!s.executeQuery("select puid_num from users where puid_num = " + userToAdd).next())
			throw new IllegalArgumentException("PUID_NUM: " + userToAdd + " To Be Added Does Not Exist");
		s.executeUpdate("update users set visible_to = visible_to || " + userToAdd + "::bigint where puid_num = " + userId);
	}

	function removeFromVisibleTo(long userToRemove)
	{
		$r = s.executeQuery("select visible_to from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		Long[] users = (Long[]) r.getArray(1).getArray();

		PreparedStatement p = null;
		try
		{
			p = con.prepareStatement("update users set visible_to = ? where puid_num = " + userId);
			p.setArray(1, con.createArrayOf("bigint", removeIndexFromLongArray(users, userToRemove)));
			p.executeUpdate();
		}
		finally
		{
			if (p != null)
				p.close();
		}
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