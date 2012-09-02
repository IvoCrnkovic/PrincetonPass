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
		s.execute("create table test (arr int[], id int)");
		s.executeUpdate("insert into test values (ARRAY[]::INT[], 1)");
		p = con.prepareStatement("update test set arr = ? where id = 1");
		insert(1);
		insert(2);
		insert(3);
		insert(4);
		insert(5);
		insert(6);
		printAll();
		delete(2);
		delete(4);
		//delete(7);
		printAll();
	}
	private static void insert(int x) throws SQLException
	{/*
		ResultSet r = s.executeQuery("select arr from test where id = 1 for update");
		r.next();
		r = r.getArray(1).getResultSet();
		r.moveToInsertRow();
		r.updateInt(1, x);
		r.insertRow();*/
		s.execute("update test set arr = arr || " + x + " where id = 1");
	}
	private static void printAll() throws SQLException
	{
		ResultSet r = s.executeQuery("select arr from test where id = 1 for update");
		r.next();
		Integer[] arr = (Integer[]) r.getArray(1).getArray();
		System.out.println("FINAL: " + Arrays.toString(arr));
	}
	private static void delete(int x) throws SQLException
	{
		ResultSet r = s.executeQuery("select arr from test where id = 1");
		r.next();
		p.setArray(1, con.createArrayOf("int", removeIndexFromIntrray((Integer[]) r.getArray(1).getArray(), x)));
		p.executeUpdate();
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
	private static Integer[] removeIndexFromIntrray(Integer[] arr, Integer value) throws IllegalArgumentException
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
