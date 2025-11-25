<?php require_once("layout/header.php"); ?>

<h1>FACTURAS :: RENUMERAR</h1>

<br>

<form action="?c=facturas&m=renumerar" method="post">
    <label for="facturainicial" class="form-label">Factura inicial</label>
    <input type="number" name="facturainicial" id="facturainicial" class="form-control" value="" required>

    <br>

    <label for="facturafinal" class="form-label">Factura final</label>
    <input type="number" name="facturafinal" id="facturafinal" class="form-control" value="" required>
    <br>
    <label for="numero" class="form-label">Número</label>
    <input type="number" name="numero" id="numero" class="form-control" value="" required>
    <br>
    <button type="submit" class="btn btn-primary">Aceptar</button>
    <a href="<?php echo URLSITE . '?c=facturas'; ?>">
        <button type="button" class="btn btn-outline-secondary float-end">Cancelar</button>
    </a>
</form>