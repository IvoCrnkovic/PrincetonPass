import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Date;


public class UserAccess 
{
	private static Connection con;
	private static Statement s;
	
	public static void initialize(Connection connect) throws SQLException
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
	public static Long[] getList(long userId, int listNum) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		
		Long[] allLists = (Long[]) r.getArray(1).getArray();
		int currentList = -1, firstIndex = -1, lastIndex = allLists.length;
		for (int i = 0; i < allLists.length; i++)
		{
			if (allLists[i].longValue() == Long.MIN_VALUE)
			{
				currentList++;
				if (currentList == listNum)
					firstIndex = i + 1;
				if (currentList == listNum + 1)
					lastIndex = i;
			}
		}
		if (firstIndex == -1)
			throw new IllegalArgumentException("List Number " + listNum + " Out Of Bounds");
		if (firstIndex >= allLists.length || firstIndex == lastIndex)
			return new Long[0];
		return Arrays.copyOfRange(allLists, firstIndex, lastIndex);
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
	public static String getListName(long userId, int listNum) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select list_names[" + (listNum + 1) + "] from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		return r.getString(1);
	}
	public static Integer[] getGiftedPasses(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select gifted_passes from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		return (Integer[]) r.getArray(1).getArray();
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
	public static void setPrivacySetting(long userId, short x) throws SQLException
	{
		s.executeUpdate("update users set privacy_setting = " + x + " where puid_num = " + userId);
	}
	
	public static void addToList(long userId, int listNum, long idToAdd) throws SQLException, IllegalArgumentException, RuntimeException
	{
		if (listNum < 0)
			throw new IllegalArgumentException("Invalid List Number");
		if (!s.executeQuery("select puid_num from users where puid_num = " + idToAdd).next())
			throw new IllegalArgumentException("PUID_NUM: " + idToAdd + " To Be Added Does Not Exist");
		
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
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
	
	public static void addList(long userId, long[] listToAdd, String name) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
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
	
	public static void removeFromList(long userId, int listNum, long idToRemove) throws IllegalArgumentException, SQLException
	{
		if (listNum < 0)
			throw new IllegalArgumentException("Invalid List Number");
		if (!s.executeQuery("select puid_num from users where puid_num = " + idToRemove).next())
			throw new IllegalArgumentException("PUID_NUM: " + idToRemove + " To Be Removed Does Not Exist");
		
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
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
	
	public static void removeFromList(long userId, int listNum, int listIndex) throws IllegalArgumentException, SQLException, ArrayIndexOutOfBoundsException
	{
		if (listNum < 0)
			throw new IllegalArgumentException("Invalid List Number");
		if (listIndex < 0)
			throw new IllegalArgumentException("Invalid List Index");
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
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
	
	public static void removeList(long userId, int listNum) throws SQLException, IllegalArgumentException
	{
		if (listNum <= 0)
			throw new IllegalArgumentException("Invalid List Number");
		ResultSet r = s.executeQuery("select lists, list_names from users where puid_num = " + userId);
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
	
	public static void addGroup(long userId, int groupId) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		ResultSet r = s.executeQuery("select pending_members from groups where id = " + groupId);
		if (!r.next())
			throw new IllegalArgumentException("Group ID: " + groupId + " Does Not Exist");
		Long[] pendingInvites = (Long[]) r.getArray(1).getArray();
		
		PreparedStatement p = con.prepareStatement("begin; update users set group_membership = group_membership + " + groupId + " where puid_num = " + userId + "; " +
				"update groups set members = members + " + userId + ", pending_invites = ? where id = " + groupId + ";commit"); 
		p.setArray(1, con.createArrayOf("bigint", removeIndexFromLongArray(pendingInvites, userId)));
		p.executeUpdate();
		p.close();
	}
	
	public static void removeGroup(long userId, int groupId) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		
		s.executeUpdate("begin; update users set group_membership = group_membership - " + groupId + "where puid_num = " + userId + "; " +
					"update groups set members = members - " + userId + " where id = " + groupId);
	}
	
	public static void transferPass(long fromUserId, long toUserId, int passId) throws SQLException, IllegalArgumentException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + toUserId).next())
			throw new IllegalArgumentException("Receiving PUID_NUM: " + toUserId + " Does Not Exist");
		if (!s.executeQuery("select puid_num from users where puid_num = " + fromUserId).next())
			throw new IllegalArgumentException("Sending PUID_NUM: " + fromUserId + " Does Not Exist");
		
		ResultSet r = s.executeQuery("select TRANSFERABLE from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
		if (!r.getBoolean(1))
			throw new IllegalArgumentException("Pass ID: " + passId + " Is Not Transferable");
		
		s.executeUpdate("begin; update users set passes_available = passes_available + " + passId + " where puid_num = " + toUserId +
				"; update users set passes_available = passes_available - " + passId + " where puid_num = " + fromUserId + 
				"; update passes set owner = " + toUserId + ", previous_owners = previous_owners + " + 
				fromUserId + " where id = " + passId + "; commit");
	}
	
	public static void addPlannedAttendance(long userId, int eventId) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		if (!s.executeQuery("select id from events where id = " + eventId).next())
			throw new IllegalArgumentException("Event ID: " + eventId + " Does Not Exist");
		s.executeUpdate("update users set PLANNED_ATTENDANCE = PLANNED_ATTENDANCE + " + eventId + " where puid_num = " + userId);
	}
	
	public static void removePlannedAttendance(long userId, int eventId) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		
		s.executeUpdate("update users set planned_attendance = planned_attendance - " + eventId + " where puid_num = " + userId);
	}
	
	public static void removePastAttendance(long userId, int eventId) throws IllegalArgumentException, SQLException
	{
		ResultSet r = s.executeQuery("select past_attendance # " + eventId + ", past_attendance_dates from users where puid_num = " + userId);
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
	
	public static void addToVisibleTo(long userId, long userToAdd) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " To Add To Does Not Exist");
		if (!s.executeQuery("select puid_num from users where puid_num = " + userToAdd).next())
			throw new IllegalArgumentException("PUID_NUM: " + userToAdd + " To Be Added Does Not Exist");
		s.executeUpdate("update users set visible_to = visible_to || " + userToAdd + "::bigint where puid_num = " + userId);
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
	
	public static void addIgnoredUser(long userId, long userToIgnore) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " To Add To Does Not Exist");
		if (!s.executeQuery("select puid_num from users where puid_num = " + userToIgnore).next())
			throw new IllegalArgumentException("PUID_NUM: " + userToIgnore + " To Be Added Does Not Exist");
		s.executeUpdate("update users set ignored_users = ignored_users || " + userToIgnore + "::bigint where puid_num = " + userId);
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
		s.executeUpdate("update users set notifications = notifications || '" + message + "'::varchar where puid_num = " + userId);
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
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		ResultSet r = s.executeQuery("select transferable, available_to from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
		if (!r.getBoolean(1))
			throw new IllegalArgumentException("Pass ID: " + passId + " Is Not Transferable");
		
		ArrayList<Long> availableTo = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(2).getArray()));
		
		r = s.executeQuery("select members from groups where id = " + groupId);
		if (!r.next())
			throw new IllegalArgumentException("Group Id: " + groupId + " Does Not Exist");
		Long[] groupMembers = (Long[]) r.getArray(1).getArray();
		
		PreparedStatement pre = null;
		PreparedStatement p = null; 
		try
		{
			long value;
			p = con.prepareStatement("update users set claimable_passes = claimable_passes + " + passId + " where puid_num = ?");
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
	
	public static void giftPassToList(long userId, int passId, int listNum) throws SQLException, IllegalArgumentException
	{
		if (listNum < 0)
			throw new IllegalArgumentException("List Number " + listNum + " Out Of Range");
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		Long[] lists = (Long[]) r.getArray(1).getArray();
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
			p = con.prepareStatement("update users set claimable_passes = claimable_passes + " + passId + " where puid_num = ?");
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
	
	public static void giftPassToList(long userId, int passId, long[] userIds) throws SQLException, IllegalArgumentException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		ResultSet r = s.executeQuery("select transferable, available_to from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
		if (!r.getBoolean(1))
			throw new IllegalArgumentException("Pass ID: " + passId + " Is Not Transferable");
		
		ArrayList<Long> availableTo = new ArrayList<Long>(Arrays.asList((Long[]) r.getArray(2).getArray()));
		
		
		
		
		PreparedStatement pre = null;
		PreparedStatement p = null; 
		try
		{
			p = con.prepareStatement("update users set claimable_passes = claimable_passes + " + passId + " where puid_num = ?");
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
	
	public static void retractPass(long userId, int passId) throws SQLException, IllegalArgumentException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		ResultSet r = s.executeQuery("select available_to, owner from passes where id = " + passId);
		if (!r.next())
			throw new IllegalArgumentException("Pass ID: " + passId + " Does Not Exist");
		if (r.getInt(2) != userId)
			throw new IllegalArgumentException("User " + userId + " No Longer Owns Pass");
		
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
	
	public static void renameList(long userId, int listNum, String name) throws IllegalArgumentException, SQLException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		s.executeUpdate("update users set list_names[" + (listNum + 1) + "] = '" + name + "' where puid_num = " + userId);
	}
	
	public static void claimPass(long userId, int passId) throws SQLException, IllegalArgumentException
	{
		if (!s.executeQuery("select puid_num from users where puid_num = " + userId).next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		ResultSet r = s.executeQuery("select available_to, owner from passes where id = " + passId);
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
	
	public static boolean usePass(long userId, String clubName, long time) throws SQLException, IllegalArgumentException, RuntimeException
	{
		
		ResultSet r = s.executeQuery("select id, pass_type from events where club = '" + clubName + "' and start_date <= " + time + " and end_date >= " + time);
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
}
