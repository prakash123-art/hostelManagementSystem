<?php
  $conn = mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());

  
  mysqli_select_db($conn, "hostel") or die(mysql_error());
 
  $id = $_GET['id']; 
  
  
    $id = htmlspecialchars($id); 
    // changes characters used in html to their equivalents, for example: < to &gt;
    
    $id = mysqli_real_escape_string($conn, $id);
    // makes sure nobody uses SQL injection
     $results = mysqli_query($conn, "SELECT count from rollcall where studno ='$id' ");
     $row = mysqli_fetch_assoc($results);
	$count =$row['count'];

	$count = $count +1; 
   
   mysqli_query($conn, "UPDATE rollcall SET count ='$count' WHERE studno ='$id' ") or die(mysqli_error());
      

    
 header("location: ../admin/attendence.php");
?>