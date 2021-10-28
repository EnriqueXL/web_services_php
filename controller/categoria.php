<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
 
    $categoria = new Categoria(); //iniciamos el objeto

    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) { //Opciónes
        case 'GetAll':
            $datos=$categoria->get_categoria(); //Obtiene (GET)
            echo json_encode($datos);  //La iformación se escribe en json
            /* Obtenemos con Get: http://localhost/WebServicesPHP/controller/categoria.php?op=GetAll */
        break;

        case "GetId":
            $datos=$categoria->get_categoria_x_id($body["cat_id"]);
            echo json_encode($datos);
        break;
        
        case "Insert":
            $datos=$categoria->insert_categoria($body["cat_nom"],$body["cat_obs"]); //Insert a campos
            echo json_encode("Inserción correcta");
        break;

        case "Update":
            $datos=$categoria->update_categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]); //Insert a campos
            echo json_encode("Actualización correcta");
        break;
      
        case "Delete":
            $datos=$categoria->delete_categoria($body["cat_id"]); //Insert a campos
            echo json_encode("Eliminación correcta");
        break;
    }

?>