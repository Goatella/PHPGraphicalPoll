<?php
// Connects to your Database 
 mysql_connect("YOURINFO.hostedresource.com", "YOURuserNAME", "YOURpassword") or die(mysql_error()); 
 mysql_select_db("YOURdatabaseNAME") or die(mysql_error()); 
 
$mode = $_GET['mode'];
$vote = $_GET['vote'];

 //Name of our cookie 
 $cookie = "Voted"; 
 
 //A function to display our results - this refrences vote_pie.php which we will also make 
 function pie () 
 { 
 $data = mysql_query("SELECT * FROM votes") 
 or die(mysql_error()); 
 $result = mysql_fetch_array( $data ); 
 $total = $result[first] + $result[sec] + $result[third]; 
 $one = round (360 * $result[first] / $total); 
 $two = round (360 * $result[sec] / $total); 
 $per1 = round ($result[first] / $total * 100); 
 $per2 = round ($result[sec] / $total * 100); 
 $per3 = round ($result[third] / $total * 100); 
 echo "<img src=vote_pie.php?one=".$one."&two=".$two."><br>"; 
 Echo "<font color=ff0000>FIRST</font> = $result[first] votes, $per1 %<br> 
 <font color=0000ff>SECOND </font> = $result[sec] votes, $per2 %<br> 
 <font color=00ff00>THIRD </font> = $result[third] votes, $per3 %<br>; 



 } 

 //This runs if it is in voted mode 
 if ( $mode=="voted") 
 { 

 //makes sure they haven't already voted
 	 	if(isset($_COOKIE[$cookie]))
 		{
 		Echo "Sorry You have already voted this month<br>";
 		} 

 //sets a cookie
 	else
 		{
 		$month = 2592000 + time(); 
 		setcookie(Voted, Voted, $month);

 		 // adds their vote to the database
 switch ($vote)
 {
 case 1:
 mysql_query ("UPDATE votes SET first = first+1");
 break;
 case 2:
 mysql_query ("UPDATE votes SET sec = sec+1");
 break;
 case 3:
 mysql_query ("UPDATE votes SET third = third+1");
 }

 //displays the poll results
 pie ();
 		}
 } 

 //if they are not voting, this displays the results if they have already voted
 if(isset($_COOKIE[$cookie]))
 		{
 pie ();
 }

 // or if they have not voted yet, they get the voting box
 else 
 {
 if(!$mode=='voted')
 {
 ?>
 <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "GET"> 
 <select name="vote"> <option value="1">Option 1</option>
 <option value="2">Option 2</option> <option value="3">Option 3</option>
 </select> 
 <input type=hidden name=mode value=voted> 
 <input type=submit>
 </form>
 <? 
 }
 }
 ?>
