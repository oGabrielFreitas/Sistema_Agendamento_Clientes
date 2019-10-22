<?php

    include_once("CrudBanco.php");

    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $tamanho = $_POST['tamanho'];
    
    $caminho_imagem = "source/img/".$_FILES['foto_produto']['name'];

    move_uploaded_file($_FILES['foto_produto']['tmp_name'],"../../../".$caminho_imagem);
    
    $CRUD = new CrudBanco("banco_minhaloja");
    $CRUD -> create($tipo,$valor,$descricao,$tamanho,$caminho_imagem);

   
    echo "saiu";

    header('Location:../../../registrar-produto.php');
?>