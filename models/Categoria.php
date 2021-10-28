<?php
    class Categoria extends Conectar{
        public function get_categoria()
        {
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categoria WHERE est = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); //Retorna con órden
        }

        public function get_categoria_x_id($cat_id) //Paso parametro
        {
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_categoria WHERE est = 1 and cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); //Retorna con órden
        }

        public function insert_categoria($cat_nom, $cat_obs) //Paso parametro
        {
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_categoria (cat_id, cat_nom, cat_obs, est) VALUES (NULL,?,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); //Retorna con órden
        }

        public function update_categoria($cat_id, $cat_nom, $cat_obs) //Paso parametro
        {
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_categoria set cat_nom = ?, cat_obs = ? WHERE cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->bindValue(3, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); //Retorna con órden
        }

        public function delete_categoria($cat_id) //Paso parametro
        {
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_categoria set est='0' WHERE cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); //Retorna con órden
        }
    }
