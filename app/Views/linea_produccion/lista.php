<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lineas de Producción</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID Línea</th>
                    <th>Nombre</th>
                    <th>Encargado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lineas as $linea): ?>
                    <tr>
                        <td><?= $linea['id_lineaProduccion']; ?></td>
                        <td><?= $linea['nombre']; ?></td>
                        <td><?= $linea['id_Usuario']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?= $this->endsection(); ?>