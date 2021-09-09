<?php
  $host = "localhost";
    $port = "5432";
    $dbname = "login";
    $user = "postgres";
    $password = "8520"; 
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconn = pg_connect($connection_string) or die('Could not connect: ' . pg_last_error()) ;

    if(isset($_POST['login'])&&!empty($_POST['login'])){
    
        $hashpassword = md5($_POST['password']);
    
         $sql ="select *from public.authenticate where email = '".pg_escape_string($_POST['email'])."' and password ='".$hashpassword."'";
      
        $data = pg_query($dbconn,$sql); 
        $login_check = pg_num_rows($data);
        if($login_check > 0){ 
            
            header('Location: start.html');    
        }else{
            
            header('Location: error.html');
        }
    }
    
    ?>