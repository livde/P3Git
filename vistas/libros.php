<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $stmt = $pdo->prepare('DELETE FROM titulos WHERE id_libro = ?');
    $stmt->execute([$delete_id]);
}

$stmt = $pdo->query('SELECT * FROM titulos');
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros - Librería</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="libros.php">Libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Libros</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>ISBN</th>
                    <th>Idioma</th>
                    <th>Publicación</th>
                    <th>ID Editorial</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                    <tr>
                        <td><?= $libro['id_libro'] ?></td>
                        <td><?= $libro['titulo'] ?></td>
                        <td><?= $libro['isbn'] ?></td>
                        <td><?= $libro['idioma'] ?></td>
                        <td><?= $libro['publicacion'] ?></td>
                        <td><?= $libro['id_editorial'] ?></td>
                        <td>
                            <form method="post" class="d-inline">
                                <input type="hidden" name="delete_id" value="<?= $libro['id_libro'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Agregar Libro</h2>
        <form action="agregar_libro.php" method="post">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn" required>
            </div>
            <div class="form-group">
                <label for="idioma">Idioma:</label>
                <input type="text" class="form-control" id="idioma" name="idioma" required>
            </div>
            <div class="form-group">
                <label for="publicacion">Publicación:</label>
                <input type="text" class="form-control" id="publicacion" name="publicacion" required>
            </div>
            <div class="form-group">
                <label for="id_editorial">ID Editorial:</label>
                <input type="text" class="form-control" id="id_editorial" name="id_editorial" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</body>
</html>
