<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Reporte de Máquina</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Generar Reporte de Máquina</h1>
        <form action="<?= site_url('reporte-maquina/generarReporte') ?>" method="post">
            <div class="form-group">
                <label for="id_maquina">ID de la máquina:</label>
                <input type="text" class="form-control" id="id_maquina" name="id_maquina">
            </div>
            <div class="form-group">
                <label for="detalles">Detalles del reporte:</label>
                <textarea class="form-control" id="detalles" name="detalles"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
