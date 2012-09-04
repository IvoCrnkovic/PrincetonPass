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
		try {
			UserAccess.giftPassToList(PUID, passId, listNum);
		} catch (IllegalArgumentException e) {
			System.err.println("Gift Failed: IllegalArgumentException");
			e.printStackTrace();
		} catch (SQLException e) {
			System.err.println("Gift Failed: SQLException");
			e.printStackTrace();
		}
	}
	
	public void giftPassToList(int passId, long[] userIds)
	{
		try {
			UserAccess.giftPassToList(PUID, passId, userIds);
		} catch (IllegalArgumentException e) {
			System.err.println("Gift Failed: IllegalArgumentException");
			e.printStackTrace();
		} catch (SQLException e) {
			System.err.println("Gift Failed: SQLException");
			e.printStackTrace();
		}
	}
	
	public void retractPass(int passId)
	{
		try {
			UserAccess.retractPass(PUID, passId);
		} catch (IllegalArgumentException e) {
			System.err.println("Retract Failed: IllegalArgumentException");
			e.printStackTrace();
		} catch (SQLException e) {
			System.err.println("Retract Failed: SQLException");
			e.printStackTrace();
		}
	}
	
	public void joinGroup(int groupId)
	{
		try {
			UserAccess.addGroup(PUID, groupId);
		} catch (IllegalArgumentException e) {
			System.err.println("Join Failed: IllegalArgumentException");
			e.printStackTrace();
		} catch (SQLException e) {
			System.err.println("Join Failed: SQLException");
			e.printStackTrace();
		}
	}
	
	public void leaveGroup(int groupId)
	{
		try {
			UserAccess.removeGroup(PUID, groupId);
		} catch (IllegalArgumentException e) {
			System.err.println("Leave Failed: IllegalArgumentException");
			e.printStackTrace();
		} catch (SQLException e) {
			System.err.println("Leave Failed: SQLException");
			e.printStackTrace();
		}
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
		try {
			UserAccess.claimPass(PUID, passId);
		} catch (IllegalArgumentException e) {
			System.err.println("Claim Failed: IllegalArgumentException");
			e.printStackTrace();
		} catch (SQLException e) {
			System.err.println("Claim Failed: SQLException");
			e.printStackTrace();
		}
	}
	
	public void addToIgnoreList(long userId)
	{
		try {
			UserAccess.addIgnoredUser(PUID, userId);
		} catch (IllegalArgumentException e) {
			System.err.println("Ignore Failed: IllegalArgumentException");
			e.printStackTrace();
		} catch (SQLException e) {
			System.err.println("Ignore Failed: SQLException");
			e.printStackTrace();
		}
	}
	
	public void removeFromIgnoreList(long userId)
	{
		try {
			UserAccess.removeIgnoredUser(PUID, userId);
		} catch (IllegalArgumentException e) {
			System.err.println("Remove Failed: IllegalArgumentException");
			e.printStackTrace();
		} catch (SQLException e) {
			System.err.println("Remove Failed: SQLException");
			e.printStackTrace();
		}
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
