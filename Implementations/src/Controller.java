import java.sql.*;
import java.util.*;

public class Controller 
{
	static Connection con;
	
	public static void main(String[] args)
	{
		System.out.print("Loading... ");
		try {
			con = getConnection();
		} 
		catch (SQLException e1) {
			e1.printStackTrace();
			System.out.println(e1);
			System.exit(0);
		}
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
