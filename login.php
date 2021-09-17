<?php
  $host = "localhost";
    $port = "5432";
    $dbname = "login";
    $user = "postgres";
    $password = "8520"; 
    $connection = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
    $dbconnection = pg_connect($connection) or die('Could not connect: ' . pg_last_error()) ;

    if(isset($_POST['login'])&&!empty($_POST['login'])){
    
        $cypher = md5($_POST['password']);
    
         $query ="select *from public.authenticate where email = '".pg_escape_string($_POST['email'])."' and password ='".$cypher."'";
      
        $data = pg_query($dbconnection,$query); 
        $checki = pg_num_rows($data);
        if($checki > 0){ 
            
            header('Location: start.html');    
        }else{
            
            header('Location: error.html');
        }
    }
    
    ?>

    <!-- Php code for connecting to database, query sending, serching for the user and routing the page to appropriate webpage -->