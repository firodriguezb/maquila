<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="container mt-5">
        <h1>Reporte de Calidad de Bultos</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Estado</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bultos as $bulto): ?>
                    <tr>
                        <td><?= $bulto['estado']; ?></td>
                        <td><?= $bulto['total']; ?></td>
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
