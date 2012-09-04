import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Date;


public class Club 
{
	Connection con;
	PreparedStatement createEvent, createPass, editEvent, givePass, passCurrentId;
	Statement s;
	String name;
	public Club(String clubName, Connection c) throws SQLException
	{
		con = c;
		name = clubName;
		s = con.createStatement();
		createEvent = con.prepareStatement("insert into events values(DEFAULT, '"+ name + "', ?, ?, ?, ?, ?, ?)");
		createPass = con.prepareStatement("insert into passes values(DEFAULT, ?, ?, ?, ?, 0, ?, ?)");
		givePass = con.prepareStatement("update users set passes_available = passes_available + ? where puid_num = ?");
		passCurrentId = con.prepareStatement("SELECT currval(pg_get_serial_sequence('passes', 'id'))");
	}
	
	public void createEvent(Date startDate, Date endDate, String name, String description,
							short passType, short passTransfer/*, long[] passesTransferableTo*/) throws SQLException
	{
		createEvent.setLong(1, startDate.getTime());
		createEvent.setLong(2, endDate.getTime());
		createEvent.setString(3, name);
		createEvent.setString(4, description);
		createEvent.setShort(5, passType);
		createEvent.setShort(6, passTransfer);
		createEvent.executeUpdate();
	}
	
	public void createPasses(Integer[] eventIds, int numberPerMember, long[] userIds, 
							boolean transferable, short type) throws SQLException
	{
		createPass.setArray(2, con.createArrayOf("integer", eventIds));
		createPass.setArray(3, con.createArrayOf("bigint", new Long[0]));
		createPass.setBoolean(4, transferable);
		createPass.setShort(5, type);
		createPass.setArray(6, con.createArrayOf("bigint", new Long[0]));
		ResultSet r = s.executeQuery("select members from clubs where name = '" + name + "'");
		r.next();
		Long[] members = (Long[]) r.getArray(1).getArray();
		try
		{
			con.setAutoCommit(false);
			for (int i = 0; i < members.length; i++)
			{
				for (int j = 0; j < numberPerMember; j++)
				{
					createPass.setLong(1, members[i]);
					createPass.executeUpdate();
					r = passCurrentId.executeQuery();
					r.next();
					givePass.setInt(1, r.getInt(1));
					givePass.setLong(2, members[i]);
					givePass.executeUpdate();
				}
			}
			for (int i = 0; i < userIds.length; i++)
			{
				for (int j = 0; j < numberPerMember; j++)
				{
					createPass.setLong(1, userIds[i]);
					createPass.executeUpdate();
					r = passCurrentId.executeQuery();
					r.next();
					givePass.setInt(1, r.getInt(1));
					givePass.setLong(2, userIds[i]);
					givePass.executeUpdate();
				}
			}
			con.commit();
		}
		finally
		{
			con.setAutoCommit(true);
		}
	}
	
	public void cancelEvent(int eventId) throws SQLException
	{
		ResultSet r = s.executeQuery("select owner, # events, id, available_to from passes where events @> " + eventId);
		try
		{
			con.setAutoCommit(false);
			int passId;
			while (r.next())
			{
				passId = r.getInt(3);
				if (r.getInt(2) == 1)
				{
					s.executeUpdate("update users set passes_available = passes_available - " + passId + 
							", gifted_passes = gifted_passes - " + passId + " where puid_num = " + r.getInt(1));
					Long[] availableTo = (Long[]) r.getArray(4).getArray();
					for (int i = 0; i < availableTo.length; i++)
					{
						s.executeUpdate("update users set claimable_passes = claimable_passes - " + passId + 
								" where puid_num = " + availableTo[i]);
					}
					s.executeUpdate("delete from passes where id = " + passId);
				}
				else
				{
					s.executeUpdate("update passes set events = events - " + eventId + " where id = " + passId);
				}
			}
			s.executeUpdate("delete from events where id = " + eventId);
			con.commit();
		}
		finally
		{
			con.setAutoCommit(true);
		}
	}
	
	public void editEvent(int eventId, Date startDate, Date endDate, String name, String description,
			short passType, short passTransfer/*, long[] passesTransferableTo*/) throws SQLException
	{
		s.executeUpdate("update events set start_time = " + startDate.getTime() + ", end_date = " + endDate.getTime() +
				", name = '" + name + "', description = '" + description + "', pass_type = '" + passType + ", passTransfer = " +
				passTransfer);
	}
}
