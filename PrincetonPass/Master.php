<?php
	
	function addUser($puidNum, $firstName, $lastName, 
			$graduationYear, $clubMembership, $privacySetting, 
			$visibleTo, $username)
	{		
		$r = pg_query_params($dbconn, "begin; insert into users values(DEFAULT, $1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, $18, $19, $20, $21)",
			array(
				$puidNum, $firstName, $lastName, $graduationYear, $clubMembership,
				toPgArray(array()), toPgArray(array()), toPgArray(array()), toPgArray(array()), toPgArray(array()),
				$privacySetting, toPgArray(array()), toPgArray(array()), toPgArray(array()), toPgArray(array()),
				toPgArray(array()), toPgArray(array()), toPgArray(array()), toPgArray(array()), 0));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			pg_free_result($r);
			throw new Exception("Club Table Creation Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}
	
	function addClub($name)
	{
		$r = pg_query_params($dbconn, "begin; insert into users values($1, $2, $3, $4)", array($name, toPgArray(array()), toPgArray(array()), toPgArray(array())));
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			pg_free_result($r);
			throw new Exception("Club Table Creation Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}
	
	/**
	 * ID - Id # of the User, generated automatically (Primary Key)
	* PUID_NUM - User's PUID number (Indexed)
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
	* IGNORED_USERS -  ID of each User this User has ignored
	* PAST_ATTENDANCE_DATES - Dates of entrance to Events corresponding to PAST_ATTENDANCE
	* NOTIFICATIONS - Notifications for the User
	* LIST_NAMES - Names of each of the User's lists
	* GIFTED_PASSES - ID of each Pass the User has gifted
	* NEW_NOTIFICATIONS - Number of notifications the User has not yet seen
	* @throws SQLException 
	*/
	function createUserTable()
	{
		$query =
			"begin; CREATE TABLE USERS " .
			"(ID SERIAL, " .
			"PUID_NUM bigint NOT NULL, " .
			"FIRST_NAME varchar NOT NULL, " .
			"LAST_NAME varchar NOT NULL, " .
			"GRADUATION_YEAR smallint, " .
			"CLUB_MEMBERSHIP varchar, " .
			"LISTS bigint[] NOT NULL, " .
			"GROUP_MEMBERSHIP integer[] NOT NULL, " .
			"PASSES_AVAILABLE integer[] NOT NULL, " .
			"PLANNED_ATTENDANCE integer[] NOT NULL, " .
			"PAST_ATTENDANCE integer[] NOT NULL, " .
			"PRIVACY_SETTING smallint NOT NULL, " .
			"VISIBLE_TO bigint[], " .
			"CLAIMABLE_PASSES integer[] NOT NULL, " .
			"JOINABLE_GROUPS integer[] NOT NULL, " .
			"IGNORED_USERS integer[] NOT NULL, " .
			"PAST_ATTENDANCE_DATES bigint[] NOT NULL, " .
			"NOTIFICATIONS varchar[] NOT NULL, " .
			"LIST_NAMES varchar[] NOT NULL, " .
			"GIFTED_PASSES integer[] NOT NULL, " .
			"NEW_NOTIFICATIONS integer NOT NULL, " .
			"PRIMARY KEY (ID))";

		$r = pg_query($dbconn, $query);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			pg_free_result($r);
			throw new Exception("Club Table Creation Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
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
	function createPassTable()
	{
		$query = 
			"begin; CREATE TABLE PASSES" .
			"(ID SERIAL, " .
			"OWNER bigint, " .
			"EVENTS integer[] NOT NULL, " .
			"PREVIOUS_OWNERS integer[], " .
			"TRANSFERABLE boolean NOT NULL, " .
			"STATUS smallint NOT NULL, " .
			"TYPE smallint NOT NULL, " .
			"AVAILABLE_TO integer[] NOT NULL, " . 
			"PRIMARY KEY (ID))";
		
		$r = pg_query($dbconn, $query);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			pg_free_result($r);
			throw new Exception("Club Table Creation Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}

	/**
	 * ID - Id number of Club (Generated Automatically) (Indexed)
	 * NAME - Name of the Club (Indexed) 
	 * MEMBERS - ID of each member of the Club (GIN Indexed)
	 */
	function createClubTable()
	{
		$query =
	        "begin; CREATE TABLE CLUBS (" .
	        "NAME varchar NOT NULL, " .
	        "MEMBERS integer[] NOT NULL, " .
	        "BANNED_USERS integer[] NOT NULL, " .
	        "BANNED_UNTIL bigint[] NOT NULL, " .
	        "PRIMARY KEY (NAME))";
		
		$r = pg_query($dbconn, $query);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			pg_free_result($r);
			throw new Exception("Club Table Creation Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}

	/**
	 * ID - Id number of the Group (Generated Automatically)
	 * GROUP_NAME - Name of the Group (Indexed)
	 * PASSES_AVAILABLE - ID of each Pass the Group has up for grabs
	 * ASKING_PERMISSIONS - Group's policy on if members can ask for passes (true for they can)
	 * MEMBERS - ID of each User that is a member of the Group
	 * PENDING_INVITES - ID of each User to which an invitation to join the group has been sent
	 */
	function createGroupTable()
	{
		$query =
			"begin; CREATE TABLE GROUPS " .
	        "(ID SERIAL, " .
	        "GROUP_NAME varchar NOT NULL, " .
	        "PASSES_AVAILABLE int[] NOT NULL, " .
	        "ASKING_PERMISSION boolean NOT NULL, " .
	        "MEMBERS integer[] NOT NULL, " .
	        "PENDING_INVITES integer[] NOT NULL, " .
	        "PRIMARY KEY (ID))";
		
		$r = pg_query($dbconn, $query);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			pg_free_result($r);
			throw new Exception("Club Table Creation Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
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
	 * USERS_ATTENDED - ID of each User which has attended the Event
	 * [NOT YET IMPLEMENTED] PASS_TRANSFERABLE_TO - Users which may receive passes to the Event (Used only if PASS_TRANSFER == 2)
	 */
	function createEventTable()
	{
		$query =
	        "CREATE TABLE EVENTS " .
	        "(begin; ID SERIAL, " .
	        "CLUB varchar NOT NULL, " .
	        "START_DATE bigint NOT NULL, " .
	        "END_DATE bigint NOT NULL, " .
	        "NAME varchar NOT NULL, " .
	        "DESCRIPTION varchar NOT NULL, " .
	        "PASS_TYPE smallint NOT NULL, " .
	        "PASS_TRANSFER smallint, " .
	        "USERS_ATTENDED integer[] NOT NULL, " .
	        /*"PASS_TRANSFERABLE_TO bigint[], " +*/
	        "PRIMARY KEY (ID))";
		
		$r = pg_query($dbconn, $query);
		if ($r === false)
		{
			pg_query($dbconn, "rollback");
			pg_free_result($r);
			throw new Exception("Club Table Creation Failed");
		}
		else
			pg_query($dbconn, "commit");
		pg_free_result($r);
	}
	
	/**
	*Attempts to log in a User
	*Returns the User object
	 */
	function authorizeUser($userName, $password)
	{
		$r = pg_query($dbconn, "select id from users where username = '" . $userName . "'::varchar");
		if ($r === false)
			throw new Exception("Query Error");
		$id = pg_fetch_result($r, 1, 1);
		pg_free_result($r);
		if ($id === false)
			throw new Exception("Username " . $userName . " Does Not Exist");
		return new User($id);
	}

?>