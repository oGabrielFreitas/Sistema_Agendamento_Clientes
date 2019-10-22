<?php

    include_once('CrudBanco.php');

    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $tamanho = $_POST['tamanho'];
    $imagem = $_POST['imagem'];

    $CRUD = new CrudBanco('banco_minhaloja');
    $CRUD->update($id,$tipo,$valor,$descricao,$tamanho,$imagem);

    echo 'Atualizou produto';

    header('Location:../../../paineldecontrole.php');

?>