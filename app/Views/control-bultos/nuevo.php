<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Bulto</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Nuevo Bulto</h1>
        <form action="<?= site_url('bultos/store') ?>" method="post">
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha">
            </div>
            <div class="form-group">
                <label for="corte_id">ID Corte:</label>
                <input type="number" class="form-control" id="corte_id" name="corte_id">
            </div>
            <div class="form-group">
                <label for="cantidad_piezas">Cantidad de Piezas:</label>
                <input type="number" class="form-control" id="cantidad_piezas" name="cantidad_piezas">
            </div>
            <div class="form-group">
                <label for="repartidor_id">ID Repartidor:</label>
                <input type="number" class="form-control" id="repartidor_id" name="repartidor_id">
            </div>
            <button type="submit" class="btn btn-primary">Agregar Bulto</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
