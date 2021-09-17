<?php
  $host = "localhost";
    $port = "5432";
    $dbname = "login";
    $user = "postgres";
    $password = "8520"; 
    $connection = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconnection = pg_connect($connection) or die('Could not connect: ' . pg_last_error()) ;

if(isset($_POST['register'])&&!empty($_POST['register'])){
  
    $query = "insert into public.authenticate(email,password,username)values('".$_POST['email']."','".md5($_POST['password'])."','".$_POST['user']."')";
    $request = pg_query($dbconnection, $query);
    if($request){
        
        header('Location: start.html');
    }else{
     header('Location: errorreg.html');
    }
}

?>

<!-- Php code for connecting to database, query sending, registering the user and routing the page to appropriate webpage -->