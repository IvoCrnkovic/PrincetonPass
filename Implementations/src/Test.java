import java.sql.*;
import java.util.Arrays;
import java.util.Properties;
public class Test {
	static Statement s; 
	static PreparedStatement p;
	static Connection con;
	public static void main(String[] args) throws SQLException
	{
		con = getConnection();
		s = con.createStatement();
		UserAccess.initialize(con);
		Master.initialize(con);
		
		s.execute("Drop table users");
		s.execute("Drop table groups");
		s.execute("Drop table clubs");
		s.execute("Drop table events");
		s.execute("Drop table passes");
		
		System.out.print("Creating Tables... ");
		Master.createClubTable();
		Master.createEventTable();
		Master.createGroupTable();
		Master.createPassTable();
		Master.createUserTable();
		System.out.println("Done");
		
		Master.addClub("colonial");
		Club c = new Club("colonial", con);
		
		System.out.print("Adding Users... ");
		Master.addUser(1L, "Antonio", "Juliano", (short) 2015, (String) null, (short) 0, new Long[0], "ajuliano");
		Master.addUser(2L, "Ivo", "Crnkovic-Rubsamen", (short) 2015, (String) null, (short) 0, new Long[0], "ivoCR");
		Master.addUser(3L, "Brendan", "Chou", (short) 2015, (String) null, (short) 1, new Long[0], "bchou");
		Master.addUser(4L, "Olivia", "Huang", (short) 2014, (String) null, (short) 2, new Long[]{3L}, "ohuang");
		System.out.println("Done");
		
		System.out.print("Testing Club Functions... ");
		c.addMembers(new long[]{4L});
		c.createEvent(new Date(System.currentTimeMillis()), new Date(System.currentTimeMillis() + 1L), "Party", "At Ivo's", (short) 1, (short) 1);
		ResultSet r = s.executeQuery("select id from events");
		r.next();
		int eventId = r.getInt(1);
		c.createPasses(new Integer[] {r.getInt(1)}, 1, new long[] {3L}, true, (short) 0);
		c.editEvent(r.getInt(1), new Date(System.currentTimeMillis()), new Date(System.currentTimeMillis() + 10000000L), "New Party", "cooler than before", (short) 1, (short) 1);
		c.createEvent(new Date(System.currentTimeMillis()), new Date(System.currentTimeMillis() + 1L), "Party", "At Ivo's", (short) 1, (short) 1);
		r = s.executeQuery("select id from events where name = 'Party'");
		r.next();
		c.createPasses(new Integer[] {r.getInt(1)}, 1, new long[] {3L}, true, (short) 0);
		c.cancelEvent(r.getInt(1));
		System.out.println("Done");
		
		System.out.println("Testing List Functions:");
		UserAccess.setPrivacySetting(3L, (short) 0);
		UserAccess.addList(1L, new long[]{2L, 3L}, "Bros");
		UserAccess.addList(1L, new long[]{4L, 3L, 2L}, "All");
		UserAccess.addList(1L, new long[]{2L}, "Ivo");
		System.out.println("Expected: [2, 3]\tResult: " +Arrays.toString(UserAccess.getList(1L, 0)));
		UserAccess.removeFromList(1L, 0, 0);
		System.out.println("Expected: [3]\tResult: " + Arrays.toString(UserAccess.getList(1L, 0)));
		UserAccess.removeList(1L, 1);
		System.out.println("Expected: [2]\tResult: " + Arrays.toString(UserAccess.getList(1L, 1)));
		UserAccess.addToList(1L, 1, 4L);
		UserAccess.addToList(1L, 1, 3L);
		System.out.println("Expected: [3, 4, 2]\tResult: " + Arrays.toString(UserAccess.getList(1L, 1)));
		UserAccess.removeFromList(1L, 1, 4L);
		System.out.println("Expected: [3, 2]\tResult: " + Arrays.toString(UserAccess.getList(1L, 1)));
		UserAccess.renameList(1L, 0, "Bro");
		System.out.println("Done");
		
		//TODO Test Group Functions
		System.out.print("Testing Pass Functions... ");
		UserAccess.transferPass(4L, 1L, UserAccess.getPassesAvailable(4L)[0]);
		UserAccess.giftPassToList(1L, UserAccess.getPassesAvailable(1L)[0], 0);
		UserAccess.claimPass(3L, UserAccess.getGiftedPasses(1L)[0]);
		UserAccess.giftPassToList(3L, UserAccess.getPassesAvailable(3L)[0], new long[] {2L});
		UserAccess.claimPass(2L, UserAccess.getGiftedPasses(3L)[0]);
		UserAccess.giftPassToList(2L, UserAccess.getPassesAvailable(2L)[0], new long[] {1L, 3L, 4L});
		UserAccess.retractPass(2L, UserAccess.getGiftedPasses(2L)[0]);
		UserAccess.usePass(2L, "colonial", System.currentTimeMillis());
		UserAccess.usePass(4L, "colonial", System.currentTimeMillis());
		System.out.println("Done");
		
		System.out.print("Testing Other Functions... ");
		UserAccess.removePastAttendance(2L, eventId);
		UserAccess.addPlannedAttendance(1L, eventId);
		UserAccess.removePlannedAttendance(1L, eventId);
		UserAccess.addToVisibleTo(4L, 1L);
		UserAccess.removeFromVisibleTo(4L, 3L);
		UserAccess.addIgnoredUser(1L, 2L);
		UserAccess.removeIgnoredUser(1L, 2L);
		UserAccess.addNotification(1L, "Yo");
		UserAccess.removeNotification(1L, 0);
		System.out.println("Done");
	}
	private static Connection getConnection() throws SQLException
	{
		Connection conn = null;
	    Properties connectionProps = new Properties();
	    connectionProps.put("user", "postgres");
	    connectionProps.put("password", "princeton2015");
	    conn = DriverManager.getConnection("jdbc:postgresql://localhost/PassDB", connectionProps);
	    System.out.println("Connected to database");
	    return conn;
	}
}
