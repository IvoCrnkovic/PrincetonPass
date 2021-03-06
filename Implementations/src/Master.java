import java.sql.*;
public class Master 
{
	private static Connection con;
	private static PreparedStatement addToUserTable, addToClubTable;
	public static void initialize(Connection connect) throws SQLException
	{
		con = connect;
		addToUserTable = con.prepareStatement("insert into users values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		addToUserTable.setArray(6, con.createArrayOf("bigint", new Long[0]));
		addToUserTable.setArray(7, con.createArrayOf("integer", new Integer[0]));
		addToUserTable.setArray(8, con.createArrayOf("integer", new Integer[0]));
		addToUserTable.setArray(9, con.createArrayOf("integer", new Integer[0]));
		addToUserTable.setArray(10, con.createArrayOf("integer", new Integer[0]));
		addToUserTable.setArray(13, con.createArrayOf("integer", new Integer[0]));
		addToUserTable.setArray(14, con.createArrayOf("integer", new Integer[0]));
		addToUserTable.setArray(15, con.createArrayOf("bigint", new Long[0]));
		addToUserTable.setArray(16, con.createArrayOf("bigint", new Long[0]));
		addToUserTable.setArray(17, con.createArrayOf("varchar", new String[0]));
		addToUserTable.setArray(18, con.createArrayOf("varchar", new String[0]));
		addToUserTable.setArray(19, con.createArrayOf("integer", new Integer[0]));
		addToUserTable.setInt(20, 0);
		
		addToClubTable = con.prepareStatement("insert into clubs values(?, ?, ?, ?)");
		addToClubTable.setArray(2, con.createArrayOf("bigint", new Long[0]));
		addToClubTable.setArray(3, con.createArrayOf("bigint", new Long[0]));
		addToClubTable.setArray(4, con.createArrayOf("bigint", new Long[0]));
	}
	
	public static void addUser(long puidNum, String firstName, String lastName, 
			short graduationYear, String clubMembership, short privacySetting, 
			Long[] visibleTo, String username) throws SQLException
	{
		addToUserTable.setLong(1, puidNum);
		addToUserTable.setString(2, firstName);
		addToUserTable.setString(3, lastName);
		addToUserTable.setShort(4, graduationYear);
		addToUserTable.setString(5, clubMembership);
		addToUserTable.setShort(11, privacySetting);
		addToUserTable.setArray(12, con.createArrayOf("bigint", visibleTo));
		
		addToUserTable.executeUpdate();
	}
	
	public static void addClub(String name) throws SQLException
	{
		addToClubTable.setString(1, name);
		
		addToClubTable.executeUpdate();
	}
	
	/**
	* PUID_NUM - User's PUID number (Primary Key)
	* FIRST_NAME - User's first name (Indexed)
	* LAST_NAME - User's last name (Indexed)
	* GRADUATION_YEAR - User's year of graduation (Indexed)
	* CLUB_MEMBERSHIP - Club user belongs to (null if no club) (Indexed)
	* LISTS - User created lists of users (Separated by Long.MIN_VALUEs)
	* GROUP_MEMBERSHIP - ID of each Group the User belongs to (GIN Indexed)
	* PASSES_AVAILABLE - ID of each Pass the user owns (GIN Indexed)
	* PLANNED_ATTENDANCE - ID of each Event the User has indicated they will attend (GIN Indexed)
	* PAST_ATTENDANCE - ID of each Event the User has previously attended (GIN Indexed)
	* PRIVACY_SETTING - Mode of privacy the User has selected (0 - Visible to Everyone,
	* 					1 - Visible to Nobody, 2 - Visible to Users in VISIBLE_TO)
	* VISIBLE_TO - ID of each User this User is visible to (Used only if PRIVACY_SETTING == 2)
	* CLAIMABLE_PASSES - ID of each Pass this User may claim
	* JOINABLE_GROUPS - ID of each Group this User may join
	* IGNORED_USERS -  PUID_NUM of each User this User has ignored
	* PAST_ATTENDANCE_DATES - Dates of entrance to Events corresponding to PAST_ATTENDANCE
	* NOTIFICATIONS - Notifications for the User
	* LIST_NAMES - Names of each of the User's lists
	* GIFTED_PASSES - ID of each Pass the User has gifted
	* NEW_NOTIFICATIONS - Number of notifications the User has not yet seen
	 * @throws SQLException 
	*/
	public static void createUserTable() throws SQLException
	{
		 String createString =
			        "CREATE TABLE USERS " +
			        "(PUID_NUM bigint NOT NULL, " +
			        "FIRST_NAME varchar NOT NULL, " +
			        "LAST_NAME varchar NOT NULL, " +
			        "GRADUATION_YEAR smallint, " +
			        "CLUB_MEMBERSHIP varchar, " +
			        "LISTS bigint[] NOT NULL, " +
			        "GROUP_MEMBERSHIP integer[] NOT NULL, " +
			        "PASSES_AVAILABLE integer[] NOT NULL, " +
			        "PLANNED_ATTENDANCE integer[] NOT NULL, " +
			        "PAST_ATTENDANCE integer[] NOT NULL, " +
			        "PRIVACY_SETTING smallint NOT NULL, " +
			        "VISIBLE_TO bigint[], " +
			        "CLAIMABLE_PASSES integer[] NOT NULL, " +
			        "JOINABLE_GROUPS integer[] NOT NULL, " +
			        "IGNORED_USERS bigint[] NOT NULL, " +
			        "PAST_ATTENDANCE_DATES bigint[] NOT NULL, " +
			        "NOTIFICATIONS varchar[] NOT NULL, " +
			        "LIST_NAMES varchar[] NOT NULL, " +
			        "GIFTED_PASSES integer[] NOT NULL, " + 
			        "NEW_NOTIFICATIONS integer NOT NULL, " +
			        "PRIMARY KEY (PUID_NUM))";

		    Statement stmt = null;
		    try 
		    {
		        stmt = con.createStatement();
		        stmt.executeUpdate(createString);
		    }
		    finally 
		    {
		        if (stmt != null) 
		        	stmt.close(); 
		    }
	}
	
	// get ID_NUM with "SELECT currval('passes_id_seq')"
	/**
	 * ID - Id number of the Pass, generated automatically
	 * OWNER - PUID_NUM of the User who currently owns the Pass (null if no current owner) (Indexed)
	 * EVENTS - ID of each event this pass can be used at (GIN Indexed)
	 * PREVIOUS_OWNERS - PUID_NUM of each User this Pass has previously belonged to
	 * TRANSFERABLE - If the Pass is transferable (true for transferable)
	 * STATUS - Status of the Pass (0 - Unused, 1 - Used (But still valid for current event))
	 * TYPE - Type of the Pass (0 - Unlimited Use (Bound to Event on use), 1 - One Use Only)
	 * AVAILABLE_TO - PUID_NUM of each User who may claim this Pass
	 */
	public static void createPassTable() throws SQLException
	{
		String createString = 
				"CREATE TABLE PASSES" +
				"(ID SERIAL, " +
				"OWNER bigint, " +
				"EVENTS integer[] NOT NULL, " +
				"PREVIOUS_OWNERS integer[], " +
				"TRANSFERABLE boolean NOT NULL, " +
				"STATUS smallint NOT NULL, " +
				"TYPE smallint NOT NULL, " +
				"AVAILABLE_TO bigint[] NOT NULL, " + 
				"PRIMARY KEY (ID))";
		
		Statement stmt = null;
	    try 
	    {
	        stmt = con.createStatement();
	        stmt.executeUpdate(createString);
	    }
	    finally 
	    {
	        if (stmt != null) 
	        	stmt.close(); 
	    }
	}

	/**
	 * ID - Id number of Club (Generated Automatically) (Indexed)
	 * NAME - Name of the Club (Indexed) 
	 * MEMBERS - PUID_NUM of each member of the Club (GIN Indexed)
	 */
	public static void createClubTable() throws SQLException
	{
		String createString =
			        "CREATE TABLE CLUBS (" +
			        "NAME varchar NOT NULL, " +
			        "MEMBERS bigint[] NOT NULL, " +
			        "BANNED_USERS bigint[] NOT NULL, " +
			        "BANNED_UNTIL bigint[] NOT NULL, " +
			        "PRIMARY KEY (NAME))";

		Statement stmt = null;
		try 
		{
		    stmt = con.createStatement();
		    stmt.executeUpdate(createString);
		}
		finally 
		{
	        if (stmt != null) 
	       	stmt.close(); 
		}
	}

	/**
	 * ID - Id number of the Group (Generated Automatically)
	 * GROUP_NAME - Name of the Group (Indexed)
	 * PASSES_AVAILABLE - ID of each Pass the Group has up for grabs
	 * ASKING_PERMISSIONS - Group's policy on if members can ask for passes (true for they can)
	 * MEMBERS - PUID_NUM of each User that is a member of the Group
	 * PENDING_INVITES - PUID_NUM of each User to which an invitation to join the group has been sent
	 */
	public static void createGroupTable() throws SQLException
	{
		String createString =
				"CREATE TABLE GROUPS " +
		        "(ID SERIAL, " +
		        "GROUP_NAME varchar NOT NULL, " +
		        "PASSES_AVAILABLE int[] NOT NULL, " + 
		        "ASKING_PERMISSION boolean NOT NULL, " + 
		        "MEMBERS bigint[] NOT NULL, " + 
		        "PENDING_INVITES bigint[] NOT NULL, " +
		        "PRIMARY KEY (ID))";
		Statement stmt = null;
		try 
		{
		    stmt = con.createStatement();
		    stmt.executeUpdate(createString);
		}
		finally 
		{
	        if (stmt != null) 
	       	stmt.close(); 
		}
	}

	/**
	 * ID - Id number of the Event (Generated Automatically)
	 * CLUB - NAME of the club at which the Event is occurring (Indexed)
	 * START_DATE - Date and time at which the Event starts (stored as long) (Indexed)
	 * END_DATE - Date and time at which the Event ends (stored as long) (Indexed)
	 * NAME - Name of the Event (Indexed)
	 * DESCRIPTION - Description of the Event
	 * PASS_TYPE - Event permissions (0 - Open to all Users, 1 - Pass is required, 2 - Members Only) (Indexed)
	 * PASS_TRANSFER - Pass transfer permissions (0 - Passes are non-transferable, 
	 * 				   1 - Passes are transferable, 2 - Passes are transferable only to Users in PASS_TRANSFERABLE_TO) (Indexed)
	 * [NOT YET IMPLEMENTED] PASS_TRANSFERABLE_TO - Users which may receive passes to the Event (Used only if PASS_TRANSFER == 2)
	 */
	public static void createEventTable() throws SQLException
	{
		String createString =
		        "CREATE TABLE EVENTS " +
		        "(ID SERIAL, " +
		        "CLUB varchar NOT NULL, " + 
		        "START_DATE bigint NOT NULL, " +
		        "END_DATE bigint NOT NULL, " +
		        "NAME varchar NOT NULL, " +
		        "DESCRIPTION varchar NOT NULL, " + 
		        "PASS_TYPE smallint NOT NULL, " +
		        "PASS_TRANSFER smallint, " +
		        "USERS_ATTENDED bigint[] NOT NULL, " +
	//	        "PASS_TRANSFERABLE_TO bigint[], " +
		        "PRIMARY KEY (ID))";

		Statement stmt = null;
		try 
		{
		    stmt = con.createStatement();
		    stmt.executeUpdate(createString);
		}
		finally 
		{
	        if (stmt != null) 
	       	stmt.close(); 
		}
	}
	
	public User authorizeUser(String userName, String password) throws SQLException
	{
		Statement s = null;
		try
		{
			s = con.createStatement();
			ResultSet r = s.executeQuery("select puid_num from users where username = '" + userName + "'::varchar");
			if (!r.next())
				throw new IllegalArgumentException("Username " + userName + " Does Not Exist");
			return new User(r.getLong(1), con);
		}
		finally
		{
			if (s != null)
				s.close();
		}
	}
}
