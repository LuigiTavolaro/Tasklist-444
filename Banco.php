<?php

class Banco
{
    public function __construct(){
        $this->db = new PDO("mysql:host=localhost;dbname=blog", 'root', '123456');
    }

    public function inserir($tabela, $dados) {
    
        foreach ($dados as $dado => $valor) {
            $data[] = "`$dado`";
            $values[] = $valor;
            $holders[] = "?";
        }
        
    
        $data = implode(',', $data);
        $holders = implode(',', $holders);        
        
        
        $query = "INSERT INTO $tabela ($data) VALUES ($holders)";
        $statement = $this->db->prepare($query);
        $statement->execute($values);
    
    }
    
    public function alterar($tabela, $colunas, $id) {
        
        foreach ($colunas as $coluna => $valor) {
            $set[] = "$coluna = ?";
            $values[] = $valor;
        }
        
        $values[] = $id;
        
        $set = implode(',', $set);
        
        $query = "UPDATE $tabela SET $set WHERE id = ?";
        $statement = $this->db->prepare($query);
        $statement->execute($values);
        
        
    }

    public function remover($tabela, $id) {
        $query = "DELETE FROM $tabela WHERE id = ?";
        $statement = $this->db->prepare($query);
        $statement->execute(array($id));
    }
    
    public function listar($tabela, $colunas, $onde = null) {
        
        
        if ($colunas != '*') {
            foreach ($colunas as $coluna) {
                $columns[] = "`$coluna`";
            }
        
            $columns = implode(',', $columns);
        } else {
            $columns = $colunas;
        }
        
//        $query = "SELECT $columns FROM $tabela WHERE id = ?";
        $query = "SELECT $columns FROM $tabela";
        
        if ($onde != null) {
            $query .= " WHERE $onde";
        }
        
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

}



