<?= $this->extend('templates/admin_template') ?>

<?= $this->section('content') ?>
<body>

    <div class="container mt-5">
        <h1>Agregar Nuevo Bulto</h1>
        <form action="<?= site_url('bultos/store') ?>" method="post">
            <div class="form-group">
                <label for="nombrePieza">Nombre Pieza:</label>
                <input type="text" class="form-control" id="nombrePieza" name="nombrePieza">
            </div>
            <div class="form-group">
                <label for="nombreBulto">Nombre Bulto:</label>
                <input type="text" class="form-control" id="nombreBulto" name="nombreBulto">
            </div>
            <div class="form-group">
                <label for="numeroPiezas">Número de Piezas:</label>
                <input type="number" class="form-control" id="numeroPiezas" name="numeroPiezas">
            </div>
            <div class="form-group">
                <label for="id_corte">ID Corte:</label>
                <input type="number" class="form-control" id="id_corte" name="id_corte">
            </div>
            <button type="submit" class="btn btn-primary">Agregar Bulto</button>
        </form>
    </div>

</body>
<?= $this->endsection() ?>