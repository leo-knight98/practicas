# practicas

Prototipo de tienda virtual hecha con PHP, MySQL y PDO, aparte de Bootstrap. No tiene todas las funciones implementadas. Hasta el momento:
**Carrito**: muestra los productos para cada usuario. Se pueden añadir y quitar.
**Tienda**: está hecho un CRUD de los productos disponibles de la tienda, accesible para usuarios con el rol "empleado".

**_Base de datos_**
3 tablas. 

Productos:
-ID, nombre, precio, disponible

Usuarios:
-ID, nombre, pass (para la contraseña), rol (empleado, cliente o admin), pais, correo

Carrito:
-Usuario (id del usuario), producto (id del producto), cantidad.
