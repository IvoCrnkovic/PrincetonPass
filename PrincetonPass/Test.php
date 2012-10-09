<?php
	echo "Creating Tables... ";
	createUserTable();
	createPassTable();
	createClubTable();
	creeateGroupTable();
	createEventTable();
	echo "Done\n";
	
	echo "Creating Clubs and Users... ";
	addClub("Colonial");
	addUser(1, "Antonio", "Juliano", 2015, null, 0, array(), "ajuliano");
	addUser(2, "Ivo", "Crnkovic-Rubsamen", 2015, null, 0, array(), "ivoCR");
	addUser(3, "Brendan", "Chou", 2015, null, 1, array(), "bchou");
	addUser(4, "Olivia", "Huang", 2014, null, 2, array(3), "ohuang");
	echo "Done\n";
	
	echo "Logging In Users... ";
	$bchou = authorizeUser("bchou", "");
	$ajuliano = authorizeUser("ajuliano", "");
	$ivoCR = authorizeUser("ivoCR", "");
	$ohuang = authorizeUser("ohuang", "");
	echo "Done";
	
	echo "Testing Club Functions... ";
	createEvent("Colonial", time(), time() + 1, "Party", "At Ivo's", 1, 1);
	$eventId = pg_fetch_result(pg_query($dbconn, "select id from events"), 1, 1);
	createPasses("Colonial", array($eventId), 1, array(3), true, 0);
	editEvent($eventId, time(), time() + 10000000, "New Party", "cooler than before", 1, 1);
	createEvent("Colonial", time(), time() + 1, "Party 2", "At Ivo's the second time", 1, 1);
	$eventId2 = pg_fetch_result(pg_query($dbconn, "select id from events where name = 'Party 2'"), 1, 1);
	createPasses("Colonial", array($eventId2), 1, array(3), true, 0);
	cancelEvent($eventId2);
	echo "Done";
	
	echo "Testing List Functions\n";
	$bchou.setPrivacySetting(0);
	$ajuliano.addList(array(2, 3), "Bros");
	$ajuliano.addList(array(2, 3, 4), "All");
	$ajuliano.addList(array(2), "Ivo");
	echo "Expected: [2, 3]\tResult: [" . implode(", ", $ajuliano.getList(0)) . "]";
	$ajuliano.removeFromList(0, 0);
	echo "Expected: [3]\tResult: " . implode(", ", $ajuliano.getList(0)) . "]";
	$ajuliano.removeList(1);
	echo "Expected: [2]\tResult: " . implode(", ", $ajuliano.getList(1)) . "]";
	$ajuliano.addToList(1, 4);
	$ajuliano.addToList(1, 3);
	echo "Expected: [3, 4, 2]\tResult: " . implode(", ", $ajuliano.getList(1)) . "]";
	$ajuliano.removeFromList(1, 4);
	echo "Expected: [3, 2]\tResult:" . implode(", ", $ajuliano.getList(1)) . "]";
	$ajuliano.renameList(0, "Bro");
	echo "Done";
	
	echo "Testing pass Functions... ";
	$ohuang.transferPass(1, $ohuang.getPassesAvailable()[0]);
	$ajuliano.giftPassToList($ajuliano.getPassesAvailable()[0], 0);
	$bchou.claimPass($ajuliano.getGiftedPasses()[0]);
	$bchou.giftPassToList($bchou.getPassesAvailable()[0], array(2));
	$ivoCR.claimPass($bchou.getGiftedPasses()[0]);
	$ivoCR.giftPassToList($ivoCR.getPassesAvailable()[0], array(1, 3, 4));
	$ivoCR.retractPass($ivoCR.getGiftedPasses()[0]);
	$ivoCR.usePass("Colonial", time());
	$ivoCR.usePass("Colonial", time());
	echo "Done";
	
	echo "Testing Other Funnctions... ";
	$ivoCR.removePastAttendance($eventId);
	$ajuliano.addPlannedAttendance($eventId);
	$ajuliano.removePlannedAttendance($eventId);
	$ohuang.addVisibleTo(1);
	$ohuang.removeVisibleTo(3);
	$ajuliano.addIgnoredUser(2);
	$ajuliano.removeIgnoredUser(2);
	$ajuliano.addNotification("Yo");
	$ajuliano.removeNotification(0);
?>