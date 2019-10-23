<?php

    include_once('source/php/script/CrudBanco.php');

    $CRUD = new CrudBanco();


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel de Agendamentos</title>
    <meta name="description" content="aa">

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css?family=Electrolize|Oswald|Russo+One&display=swap" rel="stylesheet">

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="source/css/painel-de-agendamentos.css">
    <link rel="stylesheet" type="text/css" href="source/css/animate.css">

</head>


    <div class="row">
        <div class="col-md col-table">

            <table class="main-table">
                <thead>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Telefone</th>
                    <th>Serviço</th>
                    <th>Valor</th>
                </thead>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tbody>
            </table>
        
        </div>
    </div>

    <!-- ------------ JAVA SCRIPT -------------- -->

    <!-- Referenciando e Iniciando WOW -->
    <!-- <script src="source/js/alteraPainel.js"></script> -->
    

</html>