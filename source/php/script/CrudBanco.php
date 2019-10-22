<?php

class CrudBanco{

    private $address = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = '';
    private $port = '3306';

    private $con; // Connection itself
  

    function __construct($dbname){
        
        $this->dbname = $dbname;

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

    public function create($tipo,$valor,$descricao,$tamanho,$imagem){
        
        try {  

            //Prepara o array;
            $array = array(':tipo' => $tipo,
            ':valor' => $valor,
            ':descricao' => $descricao,
            ':tamanho' => $tamanho,
            ':imagem' => $imagem);

            //Prepara o SQL
            $sql = 'INSERT INTO roupas(tipo,valor,descricao,tamanho,imagem) VALUES(:tipo,:valor,:descricao,:tamanho,:imagem)';

            $create = $this->con -> prepare($sql);
            $create -> execute($array);

          } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
          }


    }

    public function read(){

        try{

        $read = $this->con -> prepare("SELECT * FROM roupas");
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