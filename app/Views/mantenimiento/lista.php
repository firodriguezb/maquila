<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Mantenimientos</h1>
            <a href="<?= base_url('mantenimiento/reporte-excel'); ?>" class="btn btn-success">Descargar en Excel</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora del Reporte</th>
                    <th>Hora de Entrega</th>
                    <th>Falla</th>
                    <th>Actividad</th>
                    <th>ID Usuario</th>
                    <th>ID Maquina</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mantenimientos as $mantenimiento): ?>
                    <tr>
                        <td><?= $mantenimiento['id_mantenimiento']; ?></td>
                        <td><?= $mantenimiento['fecha']; ?></td>
                        <td><?= $mantenimiento['horaReporte']; ?></td>
                        <td><?= $mantenimiento['horaEntrega']; ?></td>
                        <td><?= $mantenimiento['falla']; ?></td>
                        <td><?= $mantenimiento['actividad']; ?></td>
                        <td><?= $mantenimiento['id_Usuario']; ?></td>
                        <td><?= $mantenimiento['id_maquina']; ?></td>
                        <td><a href="<?= base_url('mantenimiento/editar/' . $mantenimiento['id_mantenimiento']); ?>"><i class="fas fa-id-card"></i></a></td>
                        <td><a href="#" class="delete-btn" data-id="<?= $mantenimiento['id_mantenimiento']; ?>"><i class="fas fa-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Enlaces de paginación -->
        <?= $pager->links('default', 'custom_pagination') ?>
    </div>

    <!-- Modal de confirmación de eliminación -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmación de eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="#" id="confirmDeleteButton" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<script>
    $(document).ready(function() {
        $('.delete-btn').on('click', function() {
            var bultoId = $(this).data('id'); // Obtener el ID

            // Configurar el enlace de eliminación en el modal de confirmación
            var deleteLink = $('#confirmDeleteButton');
            deleteLink.attr('href', '<?= base_url('mantenimiento/eliminar/'); ?>' + bultoId);

            // Mostrar el modal de confirmación
            $('#confirmDeleteModal').modal('show');
        });
    });
</script>

<?= $this->endsection(); ?>
