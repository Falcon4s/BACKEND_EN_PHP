<?php
include('conexion.php');

//verificamos la accion para Autos
if(isset($_GET['accion'])){
    $acction = $_GET['accion'];
    //Crear los datos de la tabla de autos
    if ($acction == 'crearAutos'){

        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $año = $_POST['año'];
        $no_serie = $_POST['no_serie'];

        $sql = "INSERT INTO autos (marca, modelo, año, no_serie) VALUES ('Nissan', 'Sentra', '2024', '12341')";
       
        if ($db->query($sql) === TRUE) {
            echo "Nuevo registro de auto creado exitosamente";
        } else {
            echo "Error al crear el registro: " . $db->error;
        }
        
    }
    //Leer los datos de la tabla de autos
    if($acction=='leerAutos'){

        $sql ="select * from autos where 1";
        $result = $db-> query($sql);

        if($result->num_rows>0){
            while($fila=$result->fetch_assoc()){
                $items['id_auto']= $fila['id_auto'];
                $items['marca']= $fila['marca'];
                $items['modelo']= $fila['modelo'];
                $items['año']= $fila['año'];
                $items['no_serie']= $fila['no_serie'];
                $arrAutos[] =$items;
            }
            $response["status"] ="OK";
            $response["mensaje"] = $arrAutos;
        }else{
            $response["status"] ="Error";
            $response["mensaje"] = "No hay autos registrados";
        }
        echo json_encode($response);
    }
    //Actualizar los datos de la tabla de autos
    if ($acction == 'atualizarAutos'){

        $id_auto = $_POST['id_auto'];
        $marca_actualizada = $_POST['marca'];
        $modelo_actualizado = $_POST['modelo'];
        $año_actualizado = $_POST['año'];
        $no_serie_actualizado = $_POST['no_serie'];

        $sql = "UPDATE autos SET marca='BMW', modelo='Serie3', año='2020', no_serie='01011' WHERE id_auto=23";

        if ($db->query($sql) === TRUE) {
            echo "Registro de auto actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro: " . $db->error;
        }
    }
    //Eliminar los datos de la tabla de autos
    if ($acction == 'eliminarAutos'){

        $id_auto = $_POST['id_auto'];

        $sql = "DELETE FROM autos WHERE id_auto=023";

        if ($db->query($sql) === TRUE) {
            echo "Registro de auto eliminado exitosamente";
        } else {
            echo "Error al eliminar el registro: " . $db->error;
        }
    }
}
//verificamos la accion para Dueños
if(isset($_GET['accion'])){
    $acction = $_GET['accion'];
    //Crear los datos de la tabla de dueños
    if ($acction == 'crearDueños'){  

        $id_auto = $_POST['id_auto'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];

        $sql = "INSERT INTO dueños (id_auto, nombre, email) VALUES ('006', 'Juan Torres Castro ', 'juan.torres@example.com')";
        if ($db->query($sql) === TRUE) {
            echo "Nuevo registro de dueño creado exitosamente";
        } else {
            echo "Error al crear el registro: " . $db->error;
        }
    }
    //Leer los datos de la tabla de dueños
    if($acction=='leerDueños'){

        $sql ="select * from dueños where 1";
        $result = $db-> query($sql);

        if($result->num_rows>0){
            while($fila=$result->fetch_assoc()){
                $items['id_dueño']= $fila['id_dueño'];
                $items['id_auto']= $fila['id_auto'];
                $items['nombre']= $fila['nombre'];
                $items['email']= $fila['email'];
                $arrDueños[] =$items;
            }
            $response["status"] ="OK";
            $response["mensaje"] = $arrDueños;
        }else{
            $response["status"] ="Error";
            $response["mensaje"] = "No hay Dueños registrados";
        }
        echo json_encode($response);
    }
    //Actualizar los datos de la tabla de dueños
    if ($acction == 'atualizarDueños'){    

        $id_dueño = $_POST['id_dueño'];
        $id_auto_actualizada = $_POST['id_auto'];
        $nombre_actualizada = $_POST['nombre'];
        $email_actualizada = $_POST['email'];

        $sql = "UPDATE dueños SET id_auto='006', nombre='Eduardo Castro Torres', email='eduardo.castro@example.com' WHERE id_dueño=007";

        if ($db->query($sql) === TRUE) {
            echo "Registro de auto actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro: " . $db->error;
     
       }

    }
    //Eliminar los datos de la tabla de dueños
    if ($acction == 'eliminarDueños'){

        $id_dueño = $_POST['id_dueño'];

        $sql = "DELETE FROM dueños WHERE id_dueño=007";

        if ($db->query($sql) === TRUE) {
            echo "Registro de dueño eliminado exitosamente";
        } else {
            echo "Error al eliminar el registro: " . $db->error;
        }
    }
}
//verificamos la accion para Clientes
if(isset($_GET['accion'])){
    $acction = $_GET['accion'];
    //Crear los datos de la tabla de clientes
    if ($acction == 'crearClientes'){

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];

        $sql = "INSERT INTO clientes ( nombre, email) VALUES ('Emilio Medina May', 'emilio.medina@example.com')";
        if ($db->query($sql) === TRUE) {
            echo "Nuevo registro de cliente creado exitosamente";
        } else {
            echo "Error al crear el registro: " . $db->error;
        }
    }
    //Leer los datos de la tabla de clientes
    if($acction=='leerClientes'){

        $sql ="select * from clientes where 1";
        $result = $db-> query($sql);

        if($result->num_rows>0){
            while($fila=$result->fetch_assoc()){
                $items['id_cliente']= $fila['id_cliente'];
                $items['nombre']= $fila['nombre'];
                $items['email']= $fila['email'];
                $arrClientes[] =$items;
            }
            $response["status"] ="OK";
            $response["mensaje"] = $arrClientes;
        }else{
            $response["status"] ="Error";
            $response["mensaje"] = "No hay Clientes registrados";
        }
        echo json_encode($response);
    }
    //Actualizar los datos de la tabla de clientes
    if ($acction == 'atualizarClientes'){  

        $id_cliente = $_POST['id_cliente'];
        $nombre_actualizada = $_POST['nombre'];
        $email_actualizada = $_POST['email'];

        $sql = "UPDATE clientes SET nombre='Gabriela Medina May', email='gabriela.medina@example.com' WHERE id_cliente=6";

        if ($db->query($sql) === TRUE) {
            echo "Registro de auto actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro: " . $db->error;
     
       }
    }
    //Eliminar los datos de la tabla de clientes
    if ($acction == 'eliminarClientes'){
        
        $id_cliente = $_POST['id_cliente'];

        $sql = "DELETE FROM clientes WHERE id_cliente=006";

        if ($db->query($sql) === TRUE) {
            echo "Registro de cliente eliminado exitosamente";
        } else {
            echo "Error al eliminar el registro: " . $db->error;
        }
    }
}
//verificamos la accion para Ventas
if(isset($_GET['accion'])){
    $acction = $_GET['accion'];
    //Crear los datos de la tabla de ventas
    if ($acction == 'crearVentas'){
       
        $id_auto = $_POST['id_auto'];
        $id_cliente = $_POST['id_cliente'];
        $fecha_venta = $_POST['fecha_venta'];
        $precio_venta = $_POST['precio_venta'];

        $sql = "INSERT INTO ventas (id_auto, id_cliente, fecha_venta, precio_venta) VALUES ('006', '006', '2019-07-11','165000')";
        if ($db->query($sql) === TRUE) {
            echo "Nuevo registro de venta creado exitosamente";
        } else {
            echo "Error al crear el registro: " . $db->error;
        }
    }
    //Leer los datos de la tabla de ventas
    if($acction=='leerVentas'){

        $sql ="select * from ventas where 1";
        $result = $db-> query($sql);

        if($result->num_rows>0){
            while($fila=$result->fetch_assoc()){
                $items['id_venta']= $fila['id_venta'];
                $items['id_auto']= $fila['id_auto'];
                $items['id_cliente']= $fila['id_cliente'];
                $items['fecha_venta']= $fila['fecha_venta'];
                $items['precio_venta']= $fila['precio_venta'];
                $arrVentas[] =$items;
            }
            $response["status"] ="OK";
            $response["mensaje"] = $arrVentas;
        }else{
            $response["status"] ="Error";
            $response["mensaje"] = "No hay Ventas registrados";
        }
        echo json_encode($response);
    }
    //Actualizar los datos de la tabla de ventas
    if ($acction == 'atualizarVentas'){   

        $id_venta = $_POST['id_venta'];
        $id_auto_actualizada = $_POST['id_auto'];
        $id_cliente_actualizada = $_POST['id_cliente'];
        $fecha_venta_actualizada = $_POST['fecha_venta'];
        $precio_venta_actualizada = $_POST['precio_venta'];

        $sql = "UPDATE ventas SET id_auto='8', id_cliente='8', fecha_venta='2019-01-21', precio_venta='231500' WHERE id_venta=006";

        if ($db->query($sql) === TRUE) {
            echo "Registro de venta actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro: " . $db->error;
     
       }
    }
    //Eliminar los datos de la tabla de ventas
    if ($acction == 'eliminarVentas'){

        $id_venta = $_POST['id_venta'];

        $sql = "DELETE FROM ventas WHERE id_venta=006";

        if ($db->query($sql) === TRUE) {
            echo "Registro de venta eliminado exitosamente";
        } else {
            echo "Error al eliminar el registro: " . $db->error;
        }
        
    }
}
