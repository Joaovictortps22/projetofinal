<?php

    class Postagem{
        public static function selecionaTodos(){
            
            $con = conexao::getConn();

            $sql = "SELECT * FROM postagem ORDER BY id DESC";
            $sql = $con->prepare($sql);
            $sql->execute();

            $resultado = array();

            //Pega registro do banco e converte em objeto...
            while($row = $sql->fetchObject('Postagem')){
                $resultado[] = $row; 
            }
            //Exceção se caso não houver registro no banco de dados...
            if(!$resultado){
                throw new Exception("Não foi encontrado nenhum registro no banco");
            }
            return $resultado;
        }

        public static function selecionaPorId($idPost){
            $con = conexao::getconn();
            $sql = "SELECT * FROM postagem WHERE id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
            $sql->execute();
            $resultado = $sql->fetchObject('Postagem');

            if(!$resultado){
                throw new Exception("Não foi encontrado nenhum registro no banco de dados");
            }
            return $resultado;
        }
    }



?>