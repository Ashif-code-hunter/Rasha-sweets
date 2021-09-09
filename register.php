<?php
  $host = "localhost";
    $port = "5432";
    $dbname = "login";
    $user = "postgres";
    $password = "8520"; 
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconn = pg_connect($connection_string) or die('Could not connect: ' . pg_last_error()) ;

if(isset($_POST['register'])&&!empty($_POST['register'])){
  
    $sql = "insert into public.authenticate(email,password,phoneno)values('".$_POST['email']."','".md5($_POST['password'])."',".$_POST['phonenos'].")";
    $ret = pg_query($dbconn, $sql);
    if($ret){
        
        header('Location: start.html');
    }else{
            echo $sql;
        
            header('Location: errorreg.html');
    }
}

?>