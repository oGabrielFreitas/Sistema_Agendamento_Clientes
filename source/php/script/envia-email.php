<?php

    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $message    = $_POST['message'];

    echo "veio aqui";

    $connect = mysqli_connect("127.0.0.1","root","","banco_minhaloja","3306");

    if($connect){
        
        $sql = "INSERT INTO contato(name,email,message) VALUES('$name','$email','$message')";

        $query = mysqli_query($connect,$sql);

    }

    mysqli_close($connect);

    header("location: ../../../contato.html");    
    
    

?>