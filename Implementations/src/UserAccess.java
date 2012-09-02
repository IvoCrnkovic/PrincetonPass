import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Arrays;


public class UserAccess 
{
	static Connection con;
	static Statement s;
	public UserAccess(Connection connect) throws SQLException
	{
		con = connect;
		s = con.createStatement();
	}
	public static String getFirstName(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select first_name from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return r.getString(1);
	}
	public static String getLastName(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select last_name from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return r.getString(1);
	}
	public static short getGraduationYear(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select graduation_year from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return r.getShort(1);
	}
	public static String getClub(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select club_membership from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return r.getString(1);
	}
	public static Long[][] getLists(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		//TODO Check for error
		return (Long[][]) r.getArray(1).getArray();
	}
	public static Integer[] getGroups(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select group_membership from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (Integer[]) r.getArray(1).getArray();
	}
	public static Integer[] getPassesAvailable(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select passes_available from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (Integer[]) r.getArray(1).getArray();
	}
	public static Integer[] getPlannedAttendance(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select planned_attendance from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (Integer[]) r.getArray(1).getArray();
	}
	public static Integer[] getPastAttendance(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select past_attendance from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (Integer[]) r.getArray(1).getArray();
	}
	public static short getPrivacySetting(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select privacy_setting from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return r.getShort(1);
	}
	public static Long[] getVisibleTo(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select visible_to from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (Long[]) r.getArray(1).getArray();
	}
	public static Integer[] getClaimablePasses(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select claimable_passes from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (Integer[]) r.getArray(1).getArray();
	}
	public static Integer[] getJoinableGroups(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select joinable_groups from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (Integer[]) r.getArray(1).getArray();
	}
	public static Long[] getIgnoredUsers(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select ignored_users from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (Long[]) r.getArray(1).getArray();
	}
	public static Long[] getPastAttendanceDates(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select past_attendance_dates from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (Long[]) r.getArray(1).getArray();
	}
	public static String[] getNotifications(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select notifications from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (String[]) r.getArray(1).getArray();
	}
	
	
	public static void setFirstName(long userId, String x) throws SQLException
	{
		s.executeUpdate("update users set first_name = '" + x + "' where puid_num = " + userId);
	}
	public static void setLastName(long userId, String x) throws SQLException
	{
		s.executeUpdate("update users set last_name = '" + x + "' where puid_num = " + userId);
	}
	public static void setGraduationYear(long userId, short x) throws SQLException
	{
		s.executeUpdate("update users set graduation_year = " + x + " where puid_num = " + userId);
	}
	public static void setClub(long userId, String x) throws SQLException
	{
		s.executeUpdate("update users set club_membership = '" + x + "' where puid_num = " + userId);
	}
	public static void setPrivacySetting(long userId, short x) throws SQLException
	{
		s.executeUpdate("update users set privacy_setting = " + x + " where puid_num = " + userId);
	}
	
	public static void addToList(long userId, int listNum, long idToAdd) throws SQLException, IllegalArgumentException
	{
		if (listNum < 0)
			throw new IllegalArgumentException("Invalid List Number");
		if (!s.executeQuery("select puid_num from users where puid_num = " + idToAdd).next())
			throw new IllegalArgumentException("PUID_NUM: " + idToAdd + " To Be Added Does Not Exist");
		
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		
		ArrayList<Long> lists = new ArrayList(Arrays.asList((Long[]) r.getArray(1).getArray()));
		
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
		lists.add(index, new Long(idToAdd));
		
		PreparedStatement p = con.prepareStatement("update users set lists = ? where puid_num = " + userId);
		p.setArray(1, con.createArrayOf("bigint", lists.toArray()));
		p.executeUpdate();
		p.close();
	}
	
	public static void addList(long userId, long[] listToAdd, String name) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		
		ArrayList<Long> lists = new ArrayList(Arrays.asList((Long[]) r.getArray(1).getArray()));
		
		lists.add(new Long(Long.MIN_VALUE));
		for (int i = 0; i < listToAdd.length; i++)
			lists.add(new Long(listToAdd[i]));
		
		PreparedStatement p = con.prepareStatement("update users set lists = ?, list_names = list_names || + '" + name + "' where puid_num = " + userId);
		p.setArray(1, con.createArrayOf("bigint", lists.toArray()));
		p.executeUpdate();
		p.close();
	}
	
	public static void removeFromList(long userId, int listNum, long idToRemove) throws IllegalArgumentException, SQLException
	{
		if (listNum < 0)
			throw new IllegalArgumentException("Invalid List Number");
		if (!s.executeQuery("select puid_num from users where puid_num = " + idToRemove).next())
			throw new IllegalArgumentException("PUID_NUM: " + idToRemove + " To Be Removed Does Not Exist");
		
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		
		ArrayList<Long> lists = new ArrayList(Arrays.asList((Long[]) r.getArray(1).getArray()));
		
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
	
	public static void removeFromList(long userId, int listNum, int listIndex) throws IllegalArgumentException, SQLException, ArrayIndexOutOfBoundsException
	{
		if (listNum < 0)
			throw new IllegalArgumentException("Invalid List Number");
		if (listIndex < 0)
			throw new IllegalArgumentException("Invalid List Index");
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		
		ArrayList<Long> lists = new ArrayList(Arrays.asList((Long[]) r.getArray(1).getArray()));
		
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
	
	public static void removeList(long userId, int listNum) throws SQLException, IllegalArgumentException
	{
		if (listNum <= 0)
			throw new IllegalArgumentException("Invalid List Number");
		ResultSet r = s.executeQuery("select lists, list_names from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");

		ArrayList<Long> listNames = new ArrayList(Arrays.asList((Long[]) r.getArray(1).getArray()));
		ArrayList<Long> lists = new ArrayList(Arrays.asList((Long[]) r.getArray(1).getArray()));
		
		int index = 0, size = lists.size(), namesIndex = -1;
		outerloop: for (int i = 0; i < listNum; i++)
		{
			for (; index < size; index++)
			{
				if (lists.get(index).longValue() == Long.MIN_VALUE)
				{
					namesIndex++;
					continue outerloop;
				}
			}
			throw new IllegalArgumentException("List Number " + listNum + " Out Of Bounds");
		}
		
		while (index < lists.size() && lists.get(index).longValue() != Long.MIN_VALUE)
			lists.remove(index);
		
		listNames.remove(namesIndex);
		
		PreparedStatement p = con.prepareStatement("update users set lists = ?, list_names = ? where puid_num = " + userId);
		p.setArray(1, con.createArrayOf("bigint", lists.toArray()));
		p.setArray(2, con.createArrayOf("bigint", listNames.toArray()));
		p.executeUpdate();
		p.close();
	}
	
	public static void addGroup(long userId, int groupId) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		ResultSet r = s.executeQuery("select pending_members from groups where id = " + groupId);
		if (!r.next())
			throw new IllegalArgumentException("Group ID: " + groupId + " Does Not Exist");
		Long[] pendingInvites = (Long[]) r.getArray(1).getArray();
		
		PreparedStatement p = con.prepareStatement("begin; update users set group_membership = group_membership || " + groupId + " where puid_num = " + userId + "; " +
				"update groups set members = members || " + userId + ", pending_invites = ? where id = " + groupId + ";commit"); 
		p.setArray(1, con.createArrayOf("bigint", removeIndexFromLongArray(pendingInvites, userId)));
		p.executeUpdate();
		p.close();
	}
	
	public static void removeGroup(long userId, int groupId) throws IllegalArgumentException, SQLException
	{
		ResultSet r = s.executeQuery("select group_membership from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		Integer[] groups = (Integer[]) r.getArray(1).getArray();
		r = s.executeQuery("select members from groups where groupId = " + groupId);
		if (!r.next())
			throw new IllegalArgumentException("Group ID: " + groupId + " Does Not Exist");
		Long[] members = (Long[]) r.getArray(2).getArray();
		
		PreparedStatement p = null;
		try
		{
			p = con.prepareStatement("begin); update users set group_membership = ? where puid_num = " + userId + "; " +
					"update groups set members = ? where id = " + groupId);
			p.setArray(1, con.createArrayOf("integer", removeIndexFromIntArray(groups, groupId)));
			p.setArray(2, con.createArrayOf("bigint", removeIndexFromLongArray(members, userId)));
			p.executeUpdate();
		}
		finally
		{
			if (p != null)
				p.close();
		}
	}
	
	public static void transferPass(long fromUserId, long toUserId, int passId) throws SQLException, IllegalArgumentException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + toUserId).next())
			throw new IllegalArgumentException("Receiving PUID_NUM: " + toUserId + " Does Not Exist");
		
		ResultSet r = s.executeQuery("select passes_available from users where puid_num = " + fromUserId);
		if (!r.next())
			throw new IllegalArgumentException("Sending PUID_NUM: " + fromUserId + " Does Not Exist");
		Integer[] passes = (Integer[]) r.getArray(1).getArray();
		
		r = s.executeQuery("select TRANSFERABLE from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
		if (!r.getBoolean(1))
			throw new IllegalArgumentException("Pass ID: " + passId + " Is Not Transferable");
		
		PreparedStatement p = con.prepareStatement("begin; update users set passes_available = passes_available || " + passId + " where puid_num = " + toUserId +
				"; update users set passes_available = ? where puid_num = " + fromUserId + "; update passes set owner = " + toUserId + ", previous_owners = previous_owners || " + 
				fromUserId + " where id = " + passId + "; commit");
		p.setArray(1, con.createArrayOf("integer", removeIndexFromIntArray(passes, passId)));
		p.executeUpdate();
		p.close();
	}
	
	public static void addPlannedAttendance(long userId, int eventId) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		if (!s.executeQuery("select id from events where id = " + eventId).next())
			throw new IllegalArgumentException("Event ID: " + eventId + " Does Not Exist");
		s.executeUpdate("update users set PLANNED_ATTENDANCE = PLANNED_ATTENDANCE || + " + eventId + " where puid_num = " + userId);
	}
	
	public static void removePlannedAttendance(long userId, int eventId) throws IllegalArgumentException, SQLException
	{
		ResultSet r = s.executeQuery("select planned_attendance from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		Integer[] events = (Integer[]) r.getArray(1).getArray();
		
		PreparedStatement p = null;
		try
		{
			p = con.prepareStatement("update users set planned_attendance = ? where puid_num = " + userId);
			p.setArray(1, con.createArrayOf("integer", removeIndexFromIntArray(events, eventId)));
			p.executeUpdate();
		}
		finally
		{
			if (p != null)
				p.close();
		}
	}
	
	public static void addPastAttendance(long userId, int eventId, long time) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		if (!s.executeQuery("select id from events where id = " + eventId).next())
			throw new IllegalArgumentException("Event ID: " + eventId + " Does Not Exist");
		s.executeUpdate("update users set past_ATTENDANCE = past_ATTENDANCE || + " + eventId + ", past_attendance_dates = " +
				"past_attendance_dates || " + time + " where puid_num = " + userId);
	}
	
	public static void removePastAttendance(long userId, int eventId) throws IllegalArgumentException, SQLException
	{
		ResultSet r = s.executeQuery("select past_attendance from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		Integer[] events = (Integer[]) r.getArray(1).getArray();
		
		PreparedStatement p = null;
		try
		{
			p = con.prepareStatement("update users set past_attendance = ? where puid_num = " + userId);
			p.setArray(1, con.createArrayOf("integer", removeIndexFromIntArray(events, eventId)));
			p.executeUpdate();
		}
		finally
		{
			if (p != null)
				p.close();
		}
	}
	
	public static void addToVisibleTo(long userId, long userToAdd) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " To Add To Does Not Exist");
		if (!s.executeQuery("select puid_num from users where puid_num = " + userToAdd).next())
			throw new IllegalArgumentException("PUID_NUM: " + userToAdd + " To Be Added Does Not Exist");
		s.executeUpdate("update users set visible_to = visible_to || + " + userToAdd + " where puid_num = " + userId);
	}
	
	public static void removeFromVisibleTo(long userId, long userToRemove) throws IllegalArgumentException, SQLException
	{
		ResultSet r = s.executeQuery("select visible_to from users where puid_num = " + userId);
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
	
	
	/*
	public static void addClaimablePass(long userId, int passId) throws IllegalArgumentException, SQLException
	{
		
	}
	public static void removeClaimablePass(long userId, int passId) throws IllegalArgumentException, SQLException
	{
		
	}
	public static void addJoinableGroup(long userId, int groupId) throws IllegalArgumentException, SQLException
	{
		
	}
	public static void removeJoinableGroup(long userId, int groupId) throws IllegalArgumentException, SQLException
	{
		
	}*/
	
	
	public static void addIgnoredUser(long userId, long userToIgnore) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " To Add To Does Not Exist");
		if (!s.executeQuery("select puid_num from users where puid_num = " + userToIgnore).next())
			throw new IllegalArgumentException("PUID_NUM: " + userToIgnore + " To Be Added Does Not Exist");
		s.executeUpdate("update users set ignored_users = ignored_users || + " + userToIgnore + " where puid_num = " + userId);
	}
	
	public static void removeIgnoredUser(long userId, long userToRemove) throws IllegalArgumentException, SQLException
	{
		ResultSet r = s.executeQuery("select ignored_users from users where puid_num = " + userId);
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
	
	public static void addNotification(long userId, String message) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " To Add To Does Not Exist");
		s.executeUpdate("update users set notifications = notifications || + '" + message + "' where puid_num = " + userId);
	}
	
	public static void removeNotification(long userId, int index) throws IllegalArgumentException, SQLException
	{
		ResultSet r = s.executeQuery("select notifications from users where puid_num = " + userId);
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
	
	public static void giftPassToGroup(long userId, int groupId, int passId) throws SQLException, IllegalArgumentException
	{
		
		if (!s.executeQuery("select id from groups where id = " + groupId).next())
			throw new IllegalArgumentException("Group Id: " + groupId + " Does Not Exist");
		ResultSet r = s.executeQuery("select passes_available from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		Integer[] passes = (Integer[]) r.getArray(1).getArray();
		r = s.executeQuery("select transferable from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
		if (!r.getBoolean(1))
			throw new IllegalArgumentException("Pass ID: " + passId + " Is Not Transferable");
		
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
	
	public static void giftPassToList(long userId, int passId, int listNum) throws SQLException, IllegalArgumentException
	{
		
	}
	
	public static void retractPass(long userId, int passId) throws SQLException, IllegalArgumentException
	{
		
	}
	
	public static void renameList(long userId, int listNum, String name) throws IllegalArgumentException, SQLException
	{
		s.executeUpdate("update users set list_names[" + listNum + "] = '" + name + "' where puid_num = " + userId);
	}
	
	private static Long[] removeIndexFromLongArray(Long[] arr, Long value) throws IllegalArgumentException
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
	
	private static Integer[] removeIndexFromIntArray(Integer[] arr, Integer value) throws IllegalArgumentException
	{
		Integer[] newArr = new Integer[arr.length - 1];
		int offset = 0;
		int index = 0;
		for (; index < arr.length; index++)
			if (arr[index].intValue() == value.intValue())
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
		System.out.println(Arrays.toString(newArr));
		return newArr;
	}
}
