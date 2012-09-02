import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Arrays;
import java.util.Date;


public class User 
{
	static long PUID;
	public User(long userId) throws SQLException
	{
		PUID = userId;
	}
	
	public void giftPassToUser(int passId, long userId)
	{
		try {
			UserAccess.transferPass(PUID, userId, passId);
		} catch (IllegalArgumentException e) {
			System.err.println("Gift Failed: IllegalArgumentException");
			e.printStackTrace();
		} catch (SQLException e) {
			System.err.println("Gift Failed: SQLException");
			e.printStackTrace();
		}
	}
	
	public void giftPassToGroup(int groupId, int passId)
	{
		try {
			UserAccess.giftPassToGroup(PUID, groupId, passId);
		} catch (IllegalArgumentException e) {
			System.err.println("Gift Failed: IllegalArgumentException");
			e.printStackTrace();
		} catch (SQLException e) {
			System.err.println("Gift Failed: SQLException");
			e.printStackTrace();
		}
	}
	
	public void giftPassToList(int passId, int listNum)
	{
		
	}
	
	public void giftPassToList(int passId, long[] userIds)
	{
		
	}
	
	public void retractPass(int passId)
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
	
	
	
	
	
}
