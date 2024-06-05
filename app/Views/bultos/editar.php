<?= $this->extend('templates/admin_template') ?>

<?= $this->section('content') ?>
<body>

    <div class="container mt-5">
        <h1>Agregar Nuevo Bulto</h1>
        <form action="<?= site_url('bultos/actualizar/'.$bulto['id_bultoCorte']) ?>" method="post">
            <div class="form-group">
                <label for="nombrePieza">Fecha:</label>
                <input type="text" class="form-control" id="nombrePieza" name="nombrePieza" placeholder="Nombre Pieza" value="<?= esc($bulto['nombrePieza']) ?>">
            </div>
            <div class="form-group">
                <label for="nombreBulto">ID Corte:</label>
                <input type="text" class="form-control" id="nombreBulto" name="nombreBulto" placeholder="Nombre Bulto" value="<?= esc($bulto['nombreBulto']) ?>">
            </div>
            <div class="form-group">
                <label for="numeroPiezas">Cantidad de Piezas:</label>
                <input type="number" class="form-control" id="numeroPiezas" name="numeroPiezas" placeholder="Cantidad de Piezas" value="<?= esc($bulto['numeroPiezas']) ?>">
            </div>
            <div class="form-group">
                <label for="id_corte">ID Repartidor:</label>
                <input type="number" class="form-control" id="id_corte" name="repartidor_id" placeholder="ID Corte" value="<?= esc($bulto['id_corte']) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Bulto</button>
        </form>
    </div>

</body>
<?= $this->endsection() ?>