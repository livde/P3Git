<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $asunto = $_POST['asunto'];
    $comentario = $_POST['comentario'];

    $stmt = $pdo->prepare('INSERT INTO contacto (correo, nombre, asunto, comentario) VALUES (?, ?, ?, ?)');
    $stmt->execute([$correo, $nombre, $asunto, $comentario]);

    header('Location: contacto.php?success=1');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Librería</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Librería</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="autores.php">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="libros.php">Libros</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Contacto</h1>
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success" role="alert">
                Comentario enviado con éxito.
            </div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="asunto">Asunto:</label>
                <input type="text" class="form-control" id="asunto" name="asunto" required>
            </div>
            <div class="form-group">
                <label for="comentario">Comentario:</label>
                <textarea class="form-control" id="comentario" name="comentario" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
