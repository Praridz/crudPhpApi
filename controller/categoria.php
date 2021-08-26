<?php
    //aplicacion tipo json (vamos a recibir la info en un json para los post y get id)
    header('Content-Type: application/json');
    // para jalar los datos
    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
    //inicializamos la clase
    $categoria = new Categoria();

    //todos los bodys van para aca
    $body = json_decode(file_get_contents("php://input"), true);

    //servicios para la categorias
    switch($_GET["op"]){
        //creo los casos y los uso desde categoria, y pongo los resultados en json para poder verlos en postman
        case "GetAll":
            $datos=$categoria->get_categoria();
            echo json_encode($datos);
        break;
        //otro metodo
        case "GetId": //este será tipo post para poder enviar el body
            //el parametro va a ser tipo body y sera el id del producto que quiero ver 
            $datos=$categoria->get_categoria_x_id($body["cat_id"]);
            echo json_encode($datos);
        break;
        //no devuelve nada solo se ejecuta
        case "Insert":
            $datos=$categoria->insert_categoria($body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Insert Correcto");
        break;
        
        case "Update":
            $datos=$categoria->update_categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]);
            echo json_encode("Update Correcto");
        break;

        case "Delete":
            $datos=$categoria->delete_categoria($body["cat_id"]);
            echo json_encode("Delete Correcto");
        break;
    }
?>