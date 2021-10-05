<?php
session_start();
require_once("modelos/productos.php");
class Controlador {
    public function __construct($accion) {
        $this->accion = $accion;
        $this->$accion();
    }

    function inicio() {
        if ($_SESSION['rol'] != 'empleado' || $_SESSION['rol'] != 'admin') {
            header("Location:./?controlador=usuario&accion=inicio");
        } else {
            require_once("vistas/empleados/inicio.php");
        }
        
    }

    function productos() {
        if ($_SESSION['rol'] == 'usuario') {
            header("Location:./?controlador=usuario&accion=inicio");
        } else {
            $listaProductos = Producto::verTodo();
            require_once("vistas/empleados/productos.php");
        }   
    }

    function crear() {
        if ($_SESSION['rol'] == 'usuario') {
            header("Location:./?controlador=usuario&accion=inicio");
        } else {
            if($_POST) {
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                Producto::crear($nombre, $precio);
                header("Location:./?controlador=empleados&accion=productos");
            }
            include_once("vistas/empleados/crear.php");
        }
        
    }

    function editar() {
        if ($_SESSION['rol'] == 'usuario') {
            header("Location:./?controlador=usuario&accion=inicio");
        } else {
            $id = $_GET['id'];
            $producto = Producto::buscar($id);
            if($_POST) {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $disponible = $_POST['disponible'];
    
                if($_POST['disponible'] == '') {
                    $disponible = $producto['disponible'];
                }
    
                Producto::editar($id, $nombre, $precio, $disponible);
                header("Location:./?controlador=empleados&accion=productos");
            }
        }
        include_once("vistas/empleados/editar.php");
    }

    function borrar() {
        $id = $_GET['id'];
        Producto::borrar($id);
        header("Location:./?controlador=empleados&accion=productos");
    }
}

?>