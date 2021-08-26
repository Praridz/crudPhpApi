<?php
    class Categoria extends Conectar{
        //para que nos traiga todas las categorias
        public function get_categoria(){
            //llamamos a la cadena de conexion
            $conectar= parent::conexion();
            parent::set_names();
            //la query que se ejecutara en mysql
            $sql="SELECT * FROM tablita WHERE est = 1";
            //preparamos la conexion
            $sql=$conectar->prepare($sql);
            //ejecutamos
            $sql->execute();
            //nos retorna un resultado ordenados tal cual estan
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //para obtener un registro a partir de su id
        public function get_categoria_x_id($cat_id){
            $conectar= parent::conexion();
            parent::set_names();
            //con ? se que es el parametro el que ira alli
            $sql="SELECT * FROM tablita WHERE est=1 AND cat_id = ?";
            $sql=$conectar->prepare($sql);
            //es para bindear el argumento que llegue en la peticion
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //le llegan 2 parametros 
        public function insert_categoria($cat_nom,$cat_obs){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tablita(cat_id,cat_nom,cat_obs,est) VALUES (NULL,?,?,'1');";
            $sql=$conectar->prepare($sql);        
            //es para bindear el argumento que llegue en la peticion
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //le llegan 3 parametros , uno para saber el id del cual se quiera editar
        public function update_categoria($cat_id,$cat_nom,$cat_obs){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tablita set
                cat_nom = ?,
                cat_obs = ?
                WHERE
                cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_obs);
            $sql->bindValue(3, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //se cambia el estado del estado 
        public function delete_categoria($cat_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tablita set
                est = '0'
                WHERE
                cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>