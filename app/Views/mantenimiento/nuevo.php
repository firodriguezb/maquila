<?= $this->extend('templates/admin_template') ?>

<?= $this->section('content') ?>
<body>

    <div class="container mt-5">
        <h1>Agregar Mantenimiento</h1>
        <form action="<?= site_url('mantenimiento/store') ?>" method="post">
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha">
            </div>
            <div class="form-group">
                <label for="horaReporte">Hora del Reporte:</label>
                <input type="time" class="form-control" id="horaReporte" name="horaReporte">
            </div>
            <div class="form-group">
                <label for="horaEntrega">Hora de Entrega:</label>
                <input type="time" class="form-control" id="horaEntrega" name="horaEntrega">
            </div>
            <div class="form-group">
                <label for="falla">Falla:</label>
                <input type="text" class="form-control" id="falla" name="falla">
            </div>
            <div class="form-group">
                <label for="actividad">Actividad:</label>
                <input type="text" class="form-control" id="actividad" name="actividad">
            </div>
            <div class="form-group">
                <label for="id_Usuario">ID Usuario:</label>
                <input type="number" class="form-control" id="id_Usuario" name="id_Usuario">
            </div>
            <div class="form-group">
                <label for="id_maquina">ID Maquina:</label>
                <input type="number" class="form-control" id="id_maquina" name="id_maquina">
            </div>
            <button type="submit" class="btn btn-primary">Agregar Mantenimiento</button>
        </form>
    </div>

</body>
<?= $this->endsection() ?>