<?php
require_once("conectar.php");

class Producto {

    public static function verTodo() {
        
        $connBD = BD::crearInstancia();
        $cursor = $connBD->query("SELECT * FROM productos");
        $listaProductos = $cursor->fetchAll();
        return $listaProductos;
    }

    public static function crear($nombre, $precio) {
        $connBD = BD::crearInstancia();
        $stmt = $connBD->prepare("INSERT INTO productos(nombre, precio) VALUES(:nombre, :precio)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);

        $stmt->execute();
    }

    public static function buscar($id) {
        $connBD = BD::crearInstancia();
        $stmt = $connBD->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $producto = $stmt->fetch();
        return $producto;
    }
    
    public static function editar($id, $nombre, $precio, $disponible) {
        $connBD = BD::crearInstancia();
        $stmt = $connBD->prepare("UPDATE productos SET nombre = :nombre, precio = :precio, disponible = :disponible WHERE id = :id");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':disponible', $disponible);
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }

    public static function borrar($id) {
        $connBD = BD::crearInstancia();
        $stmt = $connBD->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>