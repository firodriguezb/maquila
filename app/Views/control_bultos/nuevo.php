<?= $this->extend('templates/admin_template') ?>

<?= $this->section('content') ?>
<body>

    <div class="container mt-5">
        <h1>Agregar Nuevo Bulto</h1>
        <form action="<?= site_url('bultos/store') ?>" method="post">
            <div class="form-group">
                <label for="numeroBulto">Número de Bulto:</label>
                <input type="text" class="form-control" id="numeroBulto" name="numeroBulto">
            </div>
            <div class="form-group">
                <label for="talla">Talla:</label>
                <input type="text" class="form-control" id="talla" name="talla">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha">
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" class="form-control" id="hora" name="hora">
            </div>
            <div class="form-group">
                <label for="estatus">Estatus:</label>
                <input type="text" class="form-control" id="estatus" name="estatus">
            </div>
            <div class="form-group">
                <label for="id_operacion">ID Operación:</label>
                <input type="number" class="form-control" id="id_operacion" name="id_operacion">
            </div>
            <div class="form-group">
                <label for="id_usuario">ID Usuario:</label>
                <input type="number" class="form-control" id="id_usuario" name="id_usuario">
            </div>
            <button type="submit" class="btn btn-primary">Agregar Bulto</button>
        </form>
    </div>

</body>
<?= $this->endsection() ?>