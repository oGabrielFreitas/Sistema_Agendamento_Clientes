<?php

    include_once('source/php/script/CrudBanco.php');

//    include("source/html/navbar.html");


    $CRUD = new CrudBanco();
    

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loja Roupa</title>
    <meta name="description" content="aa">

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css?family=Electrolize|Oswald|Russo+One&display=swap" rel="stylesheet">

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="source/css/style.css">
    <link rel="stylesheet" type="text/css" href="source/css/painelAdmAdd.css">
    <link rel="stylesheet" type="text/css" href="source/css/animate.css">

</head>

    <div class="row">
        <div class="col">
            <h2 class="titulo-painel" >Painel de Controle</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-voltar">
        <a href="paineldecontrole.php"><input class="botao-voltar" type="button" value="Voltar"></a>
            
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="tabelaPainelAdm" id="tabelaAdm">
                <thead class="thead-painel">
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Endereço</th>
                        <th>Comentário</th>
                        <th></th>
                        <!--  -->
                    </tr>
                </thead>
                <tbody class="tbody-painel">
                    <tr>
                        <form action="source/php/script/createClient.php" method="POST" enctype="multipart/form-data">

                        <td id="campoNome">         <input name="nome" type="text" class="data0 input-adm" placeholder="Nome*"></textarea></td>

                        <td id="campoTelefone">     <input name="telefone" type="text" class="data0 input-adm" placeholder="Telefone"></td>

                        <td id="campoEmail">        <input name="email" type="text" class="data0 input-adm" placeholder="E-mail"> </td>

                        <td id="campoEndereco">     <input name="endereco" type="text" class="data0 input-adm" placeholder="Endereço"></td>

                        <td id="campoDescricao">    <textarea name="comentario" type="text" class="data0 textarea-adm" rows="3" cols="30"> </textarea></td>                        

                        <td><input class="data0 botaoSalvar" type="submit" value="Salvar" onclick="clicaCriar(0)" ></td>
                        </form>

                    </tr>
                </tbody>
                <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->

            </table>
        </div>
    </div>

    <!-- ------------ JAVA SCRIPT -------------- -->

    <!-- Referenciando e Iniciando WOW -->
    <!-- <script src="source/js/alteraPainel.js"></script> -->
    

</html>
