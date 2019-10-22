<?php

    include_once('CrudBanco.php');

    $id = $_POST['id'];

    $CRUD = new CrudBanco('banco_minhaloja');
    $CRUD->delete($id);

    echo 'Deletou';

    header('Location:../../../paineldecontrole.php');

?>