<?php
if(isset($_POST["limit"], $_POST["start"]))
{
 $connect = mysqli_connect("localhost", "root", "", "videosearchengine");
 $query = "SELECT * FROM videos ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 //echo $query;exit;
    $html='<p>'; 
	$html1='';
    $html2='';
    $html3='';


 $result1 = mysqli_query($connect, $query);
  $i=0;

 while($row = mysqli_fetch_array($result1))
 {	
  $i++;


	 	 if( $i==1)
	{
   $html1.='
  '.$row["description"].'

 
  ';
  }
   if( $i==2)
	{
   $html2.='
  '.$row["description"].'

 
  ';
  }
   if( $i==3)
	{
   $html3.='
  '.$row["description"].'

 
  ';
  }
 }
 
     $html='<p>'; 
    $html.=$html1; 
    $html.=$html2; 
    $html.=$html3; 


    $html.='</p>'; 
    echo $html;exit;
}

?>
