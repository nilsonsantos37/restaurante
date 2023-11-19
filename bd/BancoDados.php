<?php

class BancoDados {
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "";

    public function conectar() {
    
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=restaurante_bd", 
                            $this->username, 
                            $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            // Se ocorrer um erro na conexão, você pode tratar ou simplesmente mostrar a mensagem de erro
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }
}

?>
