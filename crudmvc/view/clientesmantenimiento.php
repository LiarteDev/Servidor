<?php require("layout/header.php"); ?>

<h1>CLIENTES</h1>

<br />

<h2><?php echo ($opcion == 'EDITAR' ? 'MODIFICAR' : 'NUEVO'); ?></h2>

<form action="<?php echo 'index.php?c=clientes&m=' .
    ($opcion == 'EDITAR' ? 'modificar&id=' . $cliente->id : 'insertar'); ?>" method="POST">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre"
        value="<?php echo ($opcion == 'EDITAR' ? $cliente->nombre : ''); ?>" required />
    <br />
    <label for="apellidos" class="form-label">Apellidos</label>
    <input type="text" class="form-control" name="apellidos" id="Apellidos"
        value="<?php echo ($opcion == 'EDITAR' ? $cliente->apellidos : ''); ?>" required />
    <br />
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" id="email"
        value="<?php echo ($opcion == 'EDITAR' ? $cliente->email : ''); ?>" required />
    <br />
    <label for="contrasena" class="form-label">Contrasena</label>
    <input type="text" class="form-control" name="contrasena" id="contrasena"
        value="<?php echo ($opcion == 'EDITAR' ? $cliente->contrasena : ''); ?>" required />
    <br />
    <label for="direccion" class="form-label">Direccion</label>
    <input type="text" class="form-control" name="direccion" id="direccion"
        value="<?php echo ($opcion == 'EDITAR' ? $cliente->direccion : ''); ?>" required />
    <br />
    <label for="cp" class="form-label">CP</label>
    <input type="text" class="form-control" name="cp" id="cp"
        value="<?php echo ($opcion == 'EDITAR' ? $cliente->cp : ''); ?>" required />
    <br />
    <label for="poblacion" class="form-label">Población</label>
    <input type="text" class="form-control" name="poblacion" id="poblacion"
        value="<?php echo ($opcion == 'EDITAR' ? $cliente->poblacion : ''); ?>" required />
    <br />
    <label for="provincia" class="form-label">Provincia</label>
    <input type="text" class="form-control" name="provincia" id="provincia"
        value="<?php echo ($opcion == 'EDITAR' ? $cliente->provincia : ''); ?>" required />
    <br />
    <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
    <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"
        value="<?php echo ($opcion == 'EDITAR' ? $cliente->fecha_nacimiento : ''); ?>" required />
    <br />
    <button type="submit" class="btn btn-primary">Aceptar</button>
    <a href="<?php echo URLSITE . '?c=clientes'; ?>">
        <button type="button" class="btn btn-outline-secondary float-end">Cancelar</button>
    </a>
</form>

<?php require("layout/footer.php"); ?>