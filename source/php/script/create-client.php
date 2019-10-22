<?php

    include_once("CrudBanco.php");

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $comentario = $_POST['comentario'];
    
 //   $caminho_imagem = "source/img/".$_FILES['foto_produto']['name'];

  //  move_uploaded_file($_FILES['foto_produto']['tmp_name'],"../../../".$caminho_imagem);
    
    $CRUD = new CrudBanco();
    $CRUD -> createClient($nome,$telefone,$email,$endereco,$comentario);

   
    echo "susexo";

    //header('Location:../../../registrar-produto.php');
?>