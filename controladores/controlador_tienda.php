<?php
session_start();
require_once("modelos/productos.php");
require_once("modelos/carrito.php");


class Controlador {
    public function __construct($accion) {
        $this->accion = $accion;
        $this->$accion();
    }

    function productos() {
        $listaProductos = Producto::verTodo();
        require_once("vistas/tienda/productos.php");
    }

    function exito() {
        require_once("vistas/tienda/exito.php");
    }

    function carrito() {
        $usuario = $_SESSION['id'];
        $productos = Carrito::mostrar($usuario);
        require_once("vistas/tienda/carrito.php");
    }

    function ponCarrito() {
        if ($_POST) {
            if ($_SESSION['id'] != NULL) {
                $producto = $_GET['id'];
                $usuario = $_SESSION['id'];
                $cantidad = $_POST['cantidad'];
                Carrito::add($usuario, $producto, $cantidad);
                header("Location: ./?controlador=tienda&accion=exito");
            
            } else {
                header("Location: ./?controlador=usuario&accion=login");
            }
        }
    }

    function quitarCarrito() {
        $usuario = $_SESSION['id'];
        $producto = $_GET['id'];

        Carrito::quitar($usuario, $producto);
        header("Location: ./?controlador=tienda&accion=carrito");
    }

    function comprar() {
        $usuario = $_SESSION['id'];
        Carrito::vaciar($usuario);
        require_once("/vistas/tienda/comprar.php");
    }

    function vaciar() {
        $usuario = $_SESSION['id'];
        Carrito::vaciar($usuario);
        header("Location: ./?controlador=tienda&accion=carrito");
    }
    
}
?>
