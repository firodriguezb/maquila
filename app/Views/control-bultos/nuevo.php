<?= $this->extend('templates/admin_template') ?>

<?= $this->section('content') ?>
<body>

    <div class="container mt-5">
        <h1>Agregar Nuevo Bulto</h1>
        <form action="<?= site_url('bultos/store') ?>" method="post">
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha">
            </div>
            <div class="form-group">
                <label for="corte_id">ID Corte:</label>
                <input type="number" class="form-control" id="corte_id" name="corte_id">
            </div>
            <div class="form-group">
                <label for="cantidad_piezas">Cantidad de Piezas:</label>
                <input type="number" class="form-control" id="cantidad_piezas" name="cantidad_piezas">
            </div>
            <div class="form-group">
                <label for="repartidor_id">ID Repartidor:</label>
                <input type="number" class="form-control" id="repartidor_id" name="repartidor_id">
            </div>
            <button type="submit" class="btn btn-primary">Agregar Bulto</button>
        </form>
    </div>

</body>
<?= $this->endsection() ?>