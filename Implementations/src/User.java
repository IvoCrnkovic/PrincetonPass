import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Date;


public class User 
{
	static Connection con;
	static long PUID;
	static Statement s;
	public User(long userId, Connection connect) throws SQLException
	{
		PUID = userId;
		con = connect;
		s = con.createStatement();
	}
	
	public void giftPassToUser(int passId, long userId)
	{
		
	}
	
	public void giftPassToGroup(int passId, int groupId)
	{
		
	}
	
	public void giftPassToList(int passId, int listNum)
	{
		
	}
	
	public void giftPassToList(int passId, long[] userIds)
	{
		
	}
	
	public void retractPassFromGroup(int passId, int groupId)
	{
		
	}
	
	public void retractPassFromList(int passId, int groupId)
	{
		
	}
	
	public void retractPassFromList(int passId, long[] userIds)
	{
		
	}
	
	public void joinGroup(int groupId)
	{
		
	}
	
	public void leaveGroup(int groupId)
	{
		
	}
	
	public void viewEventsAttended(long userId)
	{
		
	}
	
	public void viewEventsAttended(long userId, long startDate)
	{
		
	}
	
	public void askGroupForPass(int eventId, int groupId)
	{
		
	}
	
	public void askListForPass(int eventId, int listId)
	{
		
	}
	
	public void askListForPass(int eventId, long[] userIds)
	{
		
	}
	
	public void claimPass(int passId)
	{
		
	}
	
	public void addToIgnoreList(long userId)
	{
		
	}
	
	public void removeFromIgnoreList(long userId)
	{
		
	}
	
	public int displayCurrentAttendance(String clubName)
	{
		
	}
	
	public int displayCurrentAttendance(String clubName, Date startTime)
	{
		
	}
	
	public int displayAttendace(int eventId)
	{
		
	}
	
	public void scheduleAttendance(int eventId)
	{
		
	}
	
	public void cancelAttendance(int eventId)
	{
		
	}
	
	public void addToVisibleTo(long userId)
	{
		
	}
	
	public void removeFromVisibleTo(long userId)
	{
		
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
	public static long[][] getLists(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		//TODO Check for error
		return (long[][]) r.getArray(1).getArray();
	}
	public static int[] getGroups(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select group_membership from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (int[]) r.getArray(1).getArray();
	}
	public static int[] getPassesAvailable(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select passes_available from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (int[]) r.getArray(1).getArray();
	}
	public static int[] getPlannedAttendance(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select planned_attendance from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (int[]) r.getArray(1).getArray();
	}
	public static int[] getPastAttendance(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select past_attendance from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (int[]) r.getArray(1).getArray();
	}
	public static short getPrivacySetting(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select privacy_setting from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return r.getShort(1);
	}
	public static long[] getVisibleTo(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select visible_to from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (long[]) r.getArray(1).getArray();
	}
	public static int[] getClaimablePasses(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select claimable_passes from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (int[]) r.getArray(1).getArray();
	}
	public static int[] getJoinableGroups(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select joinable_groups from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (int[]) r.getArray(1).getArray();
	}
	public static long[] getIgnoredUsers(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select ignored_users from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (long[]) r.getArray(1).getArray();
	}
	public static long[] getPastAttendanceDates(long userId) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select past_attendance_dates from users where puid_num = " + userId);
		if(!r.next())
			throw new IllegalArgumentException("PUID_NUM " + userId + " Does Not Exist");
		return (long[]) r.getArray(1).getArray();
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
	
	public static void addToList(long userId, int listNum, long idToAdd) throws SQLException, ArrayIndexOutOfBoundsException, IllegalArgumentException
	{
		if (listNum <= 0)
			throw new IllegalArgumentException("Invalid List Number");
		if (!s.executeQuery("select puid_num from users where puid_num = " + idToAdd).next())
			throw new IllegalArgumentException("PUID_NUM: " + idToAdd + " To Be Added Does Not Exist");
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		Long[][] lists = (Long[][]) r.getArray(1).getArray();
		if (listNum >= lists.length)
			throw new ArrayIndexOutOfBoundsException();
		for (int i = 0; i < lists[listNum].length; i++)
			if (lists[listNum][i] == null)
			{
				s.executeUpdate("update users set lists[" + listNum + "][" + i + "] = " + idToAdd + " where puid_num = " + userId);
				return;
			}
		String toBeAppended = "";
		for (int i = 0; i < lists.length; i++)
		{
			if (i == listNum)
				toBeAppended += "[" + idToAdd + "]";
			else
				toBeAppended += "[null]";
		}
		s.executeUpdate("update users set lists = array_cat(lists, ARRAY[" + toBeAppended + "])");
	}
	public static void addList(long userId, long[] listToAdd, String name) throws SQLException, IllegalArgumentException
	{
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		Long[][] lists = (Long[][]) r.getArray(1).getArray();
		Long[][] newLists;
		if (listToAdd.length >= lists[0].length)
			newLists = new Long[lists.length + 1][listToAdd.length];
		else
			newLists = new Long[lists.length + 1][lists[0].length];
		for (int i = 0; i < lists.length + 1; i++)
		{
			for (int j = 0; j < newLists[0].length; j++)
			{
				if (i < lists.length && j < lists[0].length)
				{
					newLists[i][j] = lists[i][j];
					continue;
				}
				if (i == newLists.length - 1 && j < listToAdd.length)
					newLists[i][j] = listToAdd[j];
			}
		}
		s.executeUpdate("update users set lists = " + con.createArrayOf("bigint[]", newLists) + " where puid_num = " + userId);
		s.executeUpdate("update users set lists = array_cat(lists, ARRAY['" + name + "'])");
	}
	public static void removeFromList(long userId, int listNum, long idToRemove)
	{
		
	}
	public static void removeList(long userId, int listNum) throws SQLException, IllegalArgumentException
	{
		if (listNum <= 0)
			throw new IllegalArgumentException("Invalid List Number");
		ResultSet r = s.executeQuery("select lists from users where puid_num = " + userId);
		if (!r.next())
			throw new IllegalArgumentException("PUID_NUM: " + userId + " Does Not Exist");
		Long[][] lists = (Long[][]) r.getArray(1).getArray();
		if (listNum >= lists.length)
			throw new ArrayIndexOutOfBoundsException();
		Long[][] newLists = new Long[lists.length - 1][lists[0].length];
		int offset = 0;
		for (int i = 0; i < lists.length; i++)
		{
			if (i == listNum)
			{
				offset = -1;
				continue;
			}
			for (int j = 0; j < lists[0].length; j++)
				newLists[i + offset][j] = lists[i][j];
		}
		s.executeUpdate("update users set lists = " + con.createArrayOf("bigint[]", newLists) + " where puid_num = " + userId);
	}
	public static void addGroup(long userId, int groupId)
	{
		
	}
	public static void removeGroup(long userId, int groupId)
	{
		
	}
	public static void addPass(long userId, int passId)
	{
		
	}
	public static void removePass(long userId, int passId)
	{
		
	}
	public static void addPlannedAttendance(long userId, int eventId)
	{
		
	}
	public static void removePlannedAttendance(long userId, int eventId)
	{
		
	}
	public static void addPastAttendance(long userId, int eventId, long time)
	{
		
	}
	public static void removePastAttendance(long userId, int eventId)
	{
		
	}
	public static void addToVisibleTo(long userId, long userToAdd)
	{
		
	}
	public static void removeFromVisibleTo(long userId, long userToRemove)
	{
		
	}
	public static void addClaimablePass(long userId, int passId)
	{
		
	}
	public static void removeClaimablePass(long userId, int passId)
	{
		
	}
	public static void addJoinableGroup(long userId, int groupId)
	{
		
	}
	public static void removeJoinableGroup(long userId, int groupId)
	{
		
	}
	public static void addIgnoredUser(long userId, long userToIgnore)
	{
		
	}
	public static void removeIgnoredUser(long userId, long userToRemove)
	{
		
	}
	public static void addNotification(long userId, String message)
	{
		
	}
	public static void removeNotification(long userId, int index)
	{
		
	}
	public static void renameList(long userId, int listNum, String name)
	{
		
	}
}
