<?php

class CrudBanco{

    private $address = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'banco_sisagendamento';
    private $port = '3306';
    private $table = '';

    private $Con; // Connection itself
  

    function __Construct(){

        try {
            $this->Con = new PDO("mysql:host=".$this->address.";dbname=".$this->dbname."", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->Con -> exec ('set names utf8');                                    
               
 
          } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
          }                  
    }

    function __destruct(){
        // mysqli_close($this->Con);
        unset($this->Con);

    }
    
    //Função para cadastrar cliente
    public function createClient($nome,$telefone,$email,$endereco,$comentario){

      try {  

        //Cria o array para inserir valores
        $array = array(':nome' => $nome,
        ':telefone' => $telefone,
        ':email' => $email,
        ':endereco' => $endereco,
        ':comentario' => $comentario);

        //Prepara o SQL
        $sql = 'INSERT INTO cliente(nome,telefone,email,endereco,comentario) 
                            VALUES(:nome,:telefone,:email,:endereco,:comentario)';

        //Prepara e Executa SQL
        $create = $this->Con -> prepare($sql);
        $create -> execute($array);

        //Retorna o id do último cliente inserido
        return $this->Con->lastInsertId();

      } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }


    }

    //Função para criar agendamento (scheduling)
    public function createScheduling($id_cliente,$nome,$data_ser,$valor,$servico){
        
        try {  

            //Prepara o array;
            $array = array(':id_cliente' => $id_cliente,
            ':nome' => $nome,
            ':data_ser' => $data_ser,
            ':valor' => $valor,
            ':servico' => $servico);

            //Prepara o SQL
            $sql = 'INSERT INTO agendamentos(id_cliente,nome,data_ser,valor,servico) VALUES(:id_cliente,:nome,:data_ser,:valor,:servico)';

            //Prepara e Executa SQL
            $create = $this->Con -> prepare($sql);
            $create -> execute($array);

            return $this->Con->lastInsertId();

          } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
          }


    }

    //Função para ler todos os dados de qualquer tabela
    public function read($table){

        try{

        $read = $this->Con -> prepare("SELECT * FROM ".$table."");
        $read->execute();

        $data = $read->fetchAll(PDO::FETCH_ASSOC);

        $read->closeCursor();
        
        return $data;

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return;
        }

    }

    //Função para ler dados de tabela pelo id
    public function readById($table,$id){

        try{

        $sql = "SELECT * FROM ".$table." WHERE id = ".$id."";

        $read = $this->Con -> prepare($sql);
        $read->execute();

        $data = $read->fetch(PDO::FETCH_ASSOC);
        
        return $data;

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return;
        }

    }

    //Função para atualizar cliente
    public function updateClient($id, $nome,$telefone,$email,$endereco,$ultimo_agendamento,$n_vezes,$comentario){
          
      try {  

          //Cria o array para inserir valores
          $array = array(':id' => $id,
          ':nome' => $nome,
          ':telefone' => $telefone,
          ':email' => $email,
          ':endereco' => $endereco,
          ':ultimo_agendamento' => $ultimo_agendamento,
          ':n_vezes' => $n_vezes,
          ':comentario' => $comentario);

          //Prepara o SQL
          $sql = 'UPDATE cliente SET nome = :nome, telefone = :telefone, email = :email, endereco = :endereco,
                  ultimo_agendamento = :ultimo_agendamento, n_vezes = :n_vezes, comentario = :comentario WHERE id = :id';

          //Prepara e Executa SQL
          $create = $this->Con -> prepare($sql);
          $create -> execute($array);

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
    
    //Update client last scheduling infos
    public function updateClientLastTime($id, $ultimo_agendamento){

      try{

        $al_reg = $this->readById('cliente',$id); // al_red = already_registered
  
        //Rewrites client, changing last_agendamento and n_vezes
        $this->updateClient($id, $al_reg['nome'],$al_reg['telefone'],$al_reg['email'],$al_reg['endereco'],
                              $ultimo_agendamento ,$al_reg['n_vezes'] + 1,$al_reg['comentario']);

        return $al_reg; //Returns already_registered client if successful

      } catch(Excepction $e){
          echo 'Error: ' . $e->getMessage();
          return -1; //Return -1 if unsuccessful
      }


    }

    public function deleteClient($id){

      try {  

        //Prepara o SQL
        $sql = 'DELETE FROM cliente WHERE id_roupa = :id';

        $create = $this->Con -> prepare($sql);
        $create->bindParam(':id',$id);
        $create -> execute();

      } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }
      
    }
    

}
?>