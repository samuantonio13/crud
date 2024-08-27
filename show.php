<?php
include 'db.php';

$id = $_GET['id'] ?? '';
$stmt = $pdo->prepare('SELECT * FROM alumnos WHERE id = :id');
$stmt->execute(['id' => $id]);
$alumno = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo htmlspecialchars($alumno['nombre']); ?></h1>
        <p><strong>Edad:</strong> <?php echo htmlspecialchars($alumno['edad']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($alumno['email']); ?></p>
        <a href="index.php" class="btn btn-secondary">Volver a la lista</a>
    </div>
</body>
</html>
