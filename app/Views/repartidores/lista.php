<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="container mt-5">
        <h1>Lista de Repartidores</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($repartidor as $repartidores): ?>
                    <tr>
                        <td><?= $repartidores['id']; ?></td>
                        <td><?= $repartidores['nombre']; ?></td>
                        <td><?= $repartidores['apellidoPaterno']; ?></td>
                        <td><?= $repartidores['apellidoMaterno']; ?></td>
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