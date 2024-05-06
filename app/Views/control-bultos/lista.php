<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Bultos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Bultos</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID Bulto</th>
                    <th>Fecha</th>
                    <th>ID Corte</th>
                    <th>Cantidad de Piezas</th>
                    <th>ID Repartidor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bultos as $bulto): ?>
                    <tr>
                        <td><?= $bulto['id']; ?></td>
                        <td><?= $bulto['fecha']; ?></td>
                        <td><?= $bulto['corte_id']; ?></td>
                        <td><?= $bulto['cantidad_piezas']; ?></td>
                        <td><?= $bulto['repartidor_id']; ?></td>
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
