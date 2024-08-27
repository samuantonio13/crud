<?php
include 'db.php';

// Verificar que se ha enviado el ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Preparar y ejecutar la consulta de eliminación
    $stmt = $pdo->prepare('DELETE FROM alumnos WHERE id = :id');
    $stmt->execute(['id' => $id]);

    // Redirigir al usuario a la página principal después de eliminar
    header('Location: index.php');
    exit();
} else {
    // Redirigir al usuario a la página principal si no se ha proporcionado un ID
    header('Location: index.php');
    exit();
}
?>

