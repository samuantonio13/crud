<?php
include 'db.php';

$id = $_GET['id'] ?? '';
$alumno = $pdo->prepare('SELECT * FROM alumnos WHERE id = :id');
$alumno->execute(['id' => $id]);
$alumno = $alumno->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare('UPDATE alumnos SET nombre = :nombre, edad = :edad, email = :email WHERE id = :id');
    $stmt->execute(['nombre' => $nombre, 'edad' => $edad, 'email' => $email, 'id' => $id]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Editar Alumno</h1>
        <form action="edit.php?id=<?php echo htmlspecialchars($id); ?>" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($alumno['nombre']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input
                    type="number"
                    class="form-control"
                    id="edad"
                    name="edad"
                    value="<?php echo htmlspecialchars($alumno['edad']); ?>"
                    required
                    min="0"
                    max="100"
                    step="1"
                    placeholder="Introduce tu edad"
                    aria-describedby="edadFeedback">
                <div id="edadFeedback" class="invalid-feedback">
                    Por favor, introduce una edad entre 0 y 100 años.
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($alumno['email']); ?>" required>
            </div> <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>

</html>