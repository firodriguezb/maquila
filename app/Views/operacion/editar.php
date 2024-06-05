<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="container mt-5">
        <h1>Editar Operación</h1>
        <form action="<?= site_url('operacion/actualizar/'.$operacion['id_operacion']) ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= esc($operacion['nombre']) ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la operación" value="<?= esc($operacion['descripcion']) ?>">
            </div>
            <div class="form-group">
                <label for="id_ordenProduccion">Línea de Producción:</label>
                <input type="text" class="form-control" id="id_ordenProduccion" name="id_ordenProduccion" placeholder="Orden de Producción" value="<?= esc($operacion['id_ordenProduccion']) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Operación</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?= $this->endsection(); ?>