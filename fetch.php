<?php
if(isset($_POST["limit"], $_POST["start"]))
{
 $connect = mysqli_connect("localhost", "root", "", "videosearchengine");
 $query = "SELECT * FROM videos ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  echo '
  <h3>'.$row["title"].'</h3>
  <p>'.$row["description"].'</p>
  <p class="text-muted" align="right">By - '.$row["video_post_author"].'</p>
  <hr />
  ';
 }
}

?>
