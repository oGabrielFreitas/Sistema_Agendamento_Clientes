<?php

    include_once('source/php/script/CrudBanco.php');

   // include("source/html/navbar.html");


    $CRUD = new CrudBanco('banco_minhaloja');

    $data = $CRUD->read();

    

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
    <link rel="stylesheet" type="text/css" href="source/css/painelAdm.css">
    <link rel="stylesheet" type="text/css" href="source/css/animate.css">

</head>

    <div class="row">
        <div class="col">
            <h2 class="titulo-painel" >Painel de Controle</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-registrar">
        <a href="registrar-produto.php"><input class="botao-registrar-novo" type="button" value="Registrar Novo Produto"></a>
            
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="tabelaPainelAdm" id="tabelaAdm">
                <thead class="thead-painel">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th style="width: 12%;">Valor</th>
                        <th>Descrição</th>
                        <th>Tamanho</th>
                        <th>Foto</th>
                        <th></th>
                        <!--  -->
                    </tr>
                </thead>
                <tbody class="tbody-painel">
                    <?php 
                    $counter = 0;
                    foreach($data as $datas):?>
                    <tr>
                        <td class="data<?=$counter?>" id="campoId"><?=$datas['id_roupa']?></td>

                        <td id="campoNome">         <textarea name="campoNom" readonly type="text" class="data<?=$counter?> textarea-adm" rows="1" cols="20"><?=$datas['tipo']?></textarea></td>

                        <td id="campoValor">        <input readonly type="text" class="data<?=$counter?> input-adm" value="<?=$datas['valor']?>"></td>

                        <td id="campoDescricao">    <textarea readonly type="text" class="data<?=$counter?> textarea-adm" rows="3" cols="30"><?=$datas['descricao']?></textarea></td>

                        <td id="campoTamanho">      <input readonly type="text" class="data<?=$counter?> input-adm" value="<?=$datas['tamanho']?>"> </td>

                        <td><img class="data<?=$counter?> foto-painel" src="<?=$datas['imagem']?>" alt=""></td>

                        <td><input class="data<?=$counter?> botaoAlterar" type="button" value="Alterar" id="botaoAlterar" onclick="clicaAltera(<?=$counter?>)" >
                            <input class="data<?=$counter?> botaoSalvar"type="hidden" value="Salvar" onclick="clicaSalvar(<?=$counter?>)">
                            <input class="data<?=$counter?> botaoApagar" type="hidden" value="Apagar" id="botaoDeletar" onclick="clicaDeletar(<?=$counter?>)" >


                        </td>

                    </tr>
                    <?php 
                        $counter++;
                        endforeach ?>
                </tbody>
                <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->

            </table>
        </div>
    </div>

    <!-- ------------ JAVA SCRIPT -------------- -->

    <!-- Referenciando e Iniciando WOW -->
    <script src="source/js/alteraPainel.js"></script>
    

</html>
