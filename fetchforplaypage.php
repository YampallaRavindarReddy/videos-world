<?php
if(isset($_POST["limit"], $_POST["start"]))
{
 $connect = mysqli_connect("localhost", "root", "", "videosearchengine");
 $query = "SELECT * FROM videos ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
	 //echo $row["description"];exit;
	 
	 echo '<div style="width:550px; height:100%;background-color:#FFFF"> 
  
    <table>
	    <tr>
		    <td>'	;
echo'<iframe width="550px" height="100%" src="'.$row["description"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write;
	encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
	
		    echo'</td>
		   


		    </tr>


    </table>

	   
';
  echo '
  
    <table style="width:500px">
	    <tr>
		    '	;
	
		    echo'<td style="color:BLACK">	 <p><b>';
echo strtoupper($row["title"]);
			echo '</b></p>';
				 echo' <p><span style="color:RED">  <button type="button" class="btn btn-danger"><b>';
	  	 echo $row["channel"];
				 echo '</button>
</span> | ';
			echo '<span style="color:GREEN">  <button type="button" class="btn btn-success">SUBSCRIBE</button></span></p>';
	 echo '<p><b>';
	 echo strtoupper($row["views"]);

	 echo'</b></p>';
	 echo '<p><b>';
	  	 echo strtoupper($row["last_post_date_time"]);

	  echo'</p></div>
	  
<hr style="border-color: green; background-color: green; height: 2px;">
	    </td>


		    </tr>


    </table>

	   
';
 }
}

?>
