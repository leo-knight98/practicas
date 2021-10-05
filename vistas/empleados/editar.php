<div class="card">
    <div class="card-header">
        Edición de productos
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
              <label for="" class="form-label">ID:</label>
              <input readonly type="text" name="id" id="id" class="form-control" value="<?php echo $_GET['id'] ?>" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre del producto:</label>
              <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $producto['nombre'] ?>" placeholder="Nombre" aria-describedby="helpId">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Precio del producto:</label>
              <input type="number" name="precio" id="precio" class="form-control" value="<?php echo $producto['precio']?>" placeholder="0 €" aria-describedby="helpId" max=1000000000>
            </div>
            <div class="mb-3">
                <p>Disponibilidad del producto:</br>
                <input type="radio" id="disponible_no" name="disponible" value="0">
                <label for="disponible_no">No está disponible</label><br>
                <input type="radio" id="disponible_si" name="disponible" value="1">
                <label for="disponible_si">Está disponible</label>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
            <a name="cancelar" id="cancelar" class="btn btn-primary" href="?controlador=empleados&accion=productos" role="button">Cancelar</a>
        </form>
    </div>
</div>