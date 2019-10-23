<?php

class CrudBanco{

    private $address = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'banco_sisagendamento';
    private $port = '3306';
    private $table = '';

    private $con; // Connection itself
  

    function __construct(){

        try {
            $this->con = new PDO("mysql:host=".$this->address.";dbname=".$this->dbname."", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->con -> exec ('set names utf8');                                    
               
 
          } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
          }                  
    }

    function __destruct(){
        // mysqli_close($this->con);
        unset($this->con);

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
        $create = $this->con -> prepare($sql);
        $create -> execute($array);

      } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }


    }

    //Função para atualizar cliente
    public function updateCliente($nome,$telefone,$email,$endereço,$ultimo_agendamento,$n_vezes,$comentario){
        
      try {  

          //Cria o array para inserir valores
          $array = array(':nome' => $nome,
          ':telefone' => $telefone,
          ':email' => $email,
          ':endereco' => $endereco,
          ':ultimo_agendamento' => $ultimo_agendamento,
          ':n_vezes' => $n_vezes,
          ':comentario' => $comentario);

          //Prepara o SQL
          $sql = 'UPDATE roupas SET nome = :nome, telefone = :telefone, email = :email, 
                  ultimo_agendamento = :ultimo_agendamento, n_vezes = :n_vezes, comentario = :comentario WHERE id_roupa = :id';

          //Prepara e Executa SQL
          $create = $this->con -> prepare($sql);
          $create -> execute($array);

        } catch(PDOException $e) {
          echo 'Error: ' . $e->getMessage();
        }

  }

    //Função para criar agendamento (scheduling)
    public function createScheduling($id_cliente,$data_ser,$valor,$servico){
        
        try {  

            //Prepara o array;
            $array = array(':id_cliente' => $id_cliente,
            ':data_ser' => $data_ser,
            ':valor' => $valor,
            ':servico' => $servico);

            //Prepara o SQL
            $sql = 'INSERT INTO roupas(id_cliente,data_ser,valor,servico) VALUES(:id_cliente,:data_ser,:valor,:servico)';

            //Prepara e Executa SQL
            $create = $this->con -> prepare($sql);
            $create -> execute($array);

          } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
          }


    }

    //Função para ler todos os dados de qualquer tabela
    public function read($table){

        try{

        $read = $this->con -> prepare("SELECT * FROM ".$table."");
        $read->execute();

        $data = $read->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return;
        }

    }

    public function update($id,$tipo,$valor,$descricao,$tamanho,$imagem){
        
      try {  

          //Prepara o array;
          $array = array('id' => $id,
          ':tipo' => $tipo,
          ':valor' => $valor,
          ':descricao' => $descricao,
          ':tamanho' => $tamanho,
          ':imagem' => $imagem);

          //Prepara o SQL
          $sql = 'UPDATE roupas SET tipo = :tipo, valor = :valor, descricao = :descricao, tamanho = :tamanho, imagem = :imagem WHERE id_roupa = :id';

          $create = $this->con -> prepare($sql);
          $create -> execute($array);

        } catch(PDOException $e) {
          echo 'Error: ' . $e->getMessage();
        }

  }

    public function delete($id){

      try {  

        //Prepara o SQL
        $sql = 'DELETE FROM roupas WHERE id_roupa = :id';

        $create = $this->con -> prepare($sql);
        $create->bindParam(':id',$id);
        $create -> execute();

      } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }
      
    }
    

}
?>