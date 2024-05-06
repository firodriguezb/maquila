<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Pedidos</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Cliente</th>
                    <th>Descripción del Corte</th>
                    <th>Cantidad de Piezas</th>
                    <th>Especificaciones</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                    <tr>
                        <td><?= $pedido['cliente_nombre']; ?></td>
                        <td><?= $pedido['corte_descripcion']; ?></td>
                        <td><?= $pedido['cantidad_piezas']; ?></td>
                        <td><?= $pedido['especificaciones']; ?></td>
                        <td><?= $pedido['estado']; ?></td>
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
</html>
