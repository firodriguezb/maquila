<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content'); ?>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Maquinas</h1>
            <a href="<?= base_url('maquina/reporte-excel'); ?>" class="btn btn-success">Descargar en Excel</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID Máquina</th>
                    <th>Tipo de Máquina</th>
                    <th>Fecha de Adquisición</th>
                    <th>Linea de Producción</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($maquinas as $maquina): ?>
                    <tr>
                        <td><?= $maquina['id_maquina']; ?></td>
                        <td><?= $maquina['tipo']; ?></td>
                        <td><?= $maquina['fechaAdquisicion']; ?></td>
                        <td><?= $maquina['id_lineaProduccion']; ?></td>
                        <td><a href="<?= base_url('maquina/editar/' . $maquina['id_maquina']); ?>"><i class="fas fa-id-card"></i></a></td>
                        <td><a href="#" class="delete-btn" data-id="<?= $maquina['id_maquina']; ?>"><i class="fas fa-trash"></i></a></td>
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
            var bultoId = $(this).data('id'); // Obtener el ID del bulto

            // Configurar el enlace de eliminación en el modal de confirmación
            var deleteLink = $('#confirmDeleteButton');
            deleteLink.attr('href', '<?= base_url('maquina/eliminar/'); ?>' + bultoId);

            // Mostrar el modal de confirmación
            $('#confirmDeleteModal').modal('show');
        });
    });
</script>
<?= $this->endsection(); ?>