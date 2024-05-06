<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Maquinas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Maquinas</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID Máquina</th>
                    <th>Tipo de Máquina</th>
                    <th>Fecha de Adquisición</th>
                    <th>Linea de Producción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($maquinas as $maquina): ?>
                    <tr>
                        <td><?= $maquina['id_maquina']; ?></td>
                        <td><?= $maquina['tipo']; ?></td>
                        <td><?= $maquina['fechaAdquisicion']; ?></td>
                        <td><?= $maquina['id_lineaProduccion']; ?></td>
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
