<?php

    include_once("source/php/script/CrudBanco.php");



?>

<html>

<form action="source/php/script/createScheduling.php" method="post">
    
    Nome
    <input type="text" name="nome" id=""> <br><br>
    Telefone
    <input type="text" name="telefone" id=""> <br><br>
    Data
    <input type="datetime-local" name="data_ser" id=""> <br><br>
    Valor
    <input type="text" name="valor" id=""> <br><br>
    Serviço
    <input type="text" name="servico" id=""> <br><br>
    
    <input type="submit" value="enviar">




</form>


</html>