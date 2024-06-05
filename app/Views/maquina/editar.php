<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="container mt-5">
        <h1>Actualizar Maquina</h1>
        <form action="<?= site_url('maquina/actualizar/'.$maquina['id_maquina']) ?>" method="post">
            <div class="form-group">
                <label for="fechaAdquisicion">Fecha de Adquisicion:</label>
                <input type="date" class="form-control" id="fechaAdquisicion" name="fechaAdquisicion" placeholder="Fecha de Adquisición" value="<?= esc($maquina['fechaAdquisicion']) ?>">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Máquina:</label>
                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de Maquina" value="<?= esc($maquina['tipo']) ?>">
            </div>
            <div class="form-group">
                <label for="id_lineaProduccion">Línea de Producción:</label>
                <input type="text" class="form-control" id="id_lineaProduccion" name="id_lineaProduccion" placeholder="Línea de Produccion" value="<?= esc($maquina['id_lineaProduccion']) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Máquina</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?= $this->endsection(); ?>