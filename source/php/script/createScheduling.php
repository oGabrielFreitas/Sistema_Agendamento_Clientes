<?php
    //Includes
    include_once("CrudBanco.php");

    //Recebe $_POST de 'novo-agendamento.php'
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $data_ser = $_POST['data_ser'];
    $valor = $_POST['valor'];
    $servico = $_POST['servico'];

    //Variables
    $i;
    $iguais = 0;
    $array_iguais = array();

    //Open Database Connection
    $CRUD = new CrudBanco();
    $clientes = $CRUD->read('cliente'); //Recives client table


    //Verify by client phonenumber, if he's already registered
    foreach($clientes as $cliente):

        if($cliente['telefone'] == $telefone){
            array_push($array_iguais, $cliente['nome']);
            $iguais++;
        }

    endforeach;

    echo $iguais;

    for($i = 0 ; $i < $iguais ; $i++){
        echo "<br>";
        echo $array_iguais[$i];        
    }
    



?>