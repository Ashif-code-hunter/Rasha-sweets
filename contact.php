<?php


  $host = "localhost";
    $port = "5432";
    $dbname = "login";
    $user = "postgres";
    $password = "8520"; 
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconn = pg_connect($connection_string) or die('Could not connect: ' . pg_last_error()) ;

if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    

  $sql = "insert into public.contact(name,phoneno,message)values('".$_POST['name']."','".$_POST['phonenos']."','".$_POST['message']."')";

  
  $ret = pg_query($dbconn, $sql);
  if($ret){
   echo '<script>alert("Data submitted successfully")</script>';

  }else{
    header('Location: start.html'); 
    echo '<script>alert("Some error occured, Try again")</script>';
  }
}



?>