<?php
    //Includes
    include_once("CrudBanco.php");

    //Recive $_POST from 'novo-agendamento.php'
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $data_ser = $_POST['data_ser'];
    $valor = $_POST['valor'];
    $servico = $_POST['servico'];

    //Variables
    $i;
    $equals = 0;                //Number of equals registered custumers
    $array_equals = array();    //Array that saves equals custumer's id

    //Open Database Connection
    $CRUD = new CrudBanco();
    $clientes = $CRUD->read('cliente'); //Recives client table


    //Verify by client phone number, if he's already registered
    foreach($clientes as $cliente):

        //Save how many, and witch phone numbers are already registered by client id
        if($cliente['telefone'] == $telefone){
            array_push($array_equals, $cliente['id']);
            $equals++;            
        }
        
    endforeach;


    // If the client is already registered in database:
    // (Two or more equals custumers NOT implemented)
    if($equals > 0){

        //Update client last scheduling infos
        $al_reg = $CRUD->updateClientLastTime($array_equals[0], $data_ser);

        //Create a new scheduling based in already registered client datas (id, name)
        $CRUD->createScheduling($al_reg['id'], $al_reg['nome'], $data_ser, $valor, $servico);

        echo "equals";

    }
    else{
        //If there isn't a client with the same phone number, create a new client register

        //$CRUD -> createClient($nome,$telefone,$email,$endereco,$comentario);
        $last_id = $CRUD->createClient($nome,$telefone,'','','');

        $CRUD->createScheduling($last_id, $nome, $data_ser, $valor, $servico);

        echo "different";

    }    


    /*
    echo "equals: ".$equals;
    
    for($i = 0 ; $i < $equals ; $i++){
        echo "<br>";
        echo $array_equals[$i];        
    }*/
    
?>