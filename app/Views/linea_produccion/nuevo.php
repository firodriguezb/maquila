<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="container mt-5">
        <h1>Agregar Nueva Línea de Producción</h1>
        <form action="<?= site_url('linea/store') ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="id_usuario">ID Usuario:</label>
                <input type="text" class="form-control" id="id_usuario" name="id_usuario">
            </div>
            <button type="submit" class="btn btn-primary">Agregar Línea</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?= $this->endsection(); ?>