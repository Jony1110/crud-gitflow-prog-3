<?php
ob_start(); // Iniciar buffer de salida para evitar problemas con header()

require_once 'libreria/conexion.php';
require_once 'libreria/plantilla.php';
plantilla::aplicar();
Plantilla::navbar();

// Verificar si se está editando un personaje existente
$personaje = null;
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM personajes WHERE id = ?";
    $parametros = [$_GET['id']];
    $personaje = Conexion::select($sql, $parametros);

    if (!$personaje) {
        echo "<div style='text-align: center; padding: 20px; background-color: #ffccdd; border: 2px solid #ff1493; border-radius: 15px; max-width: 500px; margin: 50px auto;'>";
        echo "<h1 style='color: #ff1493;'>⚠ Oops...</h1>";
        echo "<p>El personaje que buscas no existe.</p>";
        echo "<a href='reparto.php' class='boton'>⬅ Volver al listado</a>";
        echo "</div>";
        exit;
    }
}

// Si no es edición, se asignan valores por defecto
if (!$personaje) {
    $personaje = [
        'id'     => '',
        'nombre' => '',
        'color'  => '',
        'tipo'   => '',
        'nivel'  => '',
        'foto'   => '',
        'frase'  => ''
    ];
}

// Guardar datos cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id      = $_POST['id'];
    $nombre  = $_POST['nombre'];
    $color   = $_POST['color'];
    $tipo    = $_POST['tipo'];
    $nivel   = $_POST['nivel'];
    $foto    = $_POST['foto'];
    $frase  = $_POST['frase'];

    try {
        if ($id) {
            // Actualizar personaje
            $sql = "UPDATE personajes SET nombre=?, color=?, tipo=?, nivel=?, foto=?, frase=? WHERE id=?";
            $parametros = [$nombre, $color, $tipo, $nivel, $foto, $frase, $id];
            Conexion::ejecutar($sql, $parametros);
        } else {
            // Insertar nuevo personaje
            $sql = "INSERT INTO personajes (nombre, color, tipo, nivel, foto, frase) VALUES (?, ?, ?, ?, ?, ?)";
            $parametros = [$nombre, $color, $tipo, $nivel, $foto, $frase];
            $id = Conexion::insert($sql, $parametros);
        }

        ob_end_clean(); // Limpiar el buffer de salida
        header("Location: reparto.php");
        exit;
    } catch (Exception $e) {
        echo "<p>Error al guardar: " . $e->getMessage() . "</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Personaje</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1 class="title">🚀🤠 ¡Bienvenido al Mundo de Toy Story! 🤠🚀</h1>
<p>🌟 Ingresa los datos del personaje y guárdalos en la base de datos.</p>

<form method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($personaje['id']) ?>">

    <label>👤 Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($personaje['nombre']) ?>" required>

    <label>🎨 Color:</label>
    <input type="text" name="color" value="<?= htmlspecialchars($personaje['color']) ?>" required>

    <label>🧩 Tipo</label>
    <input type="text" name="tipo" value="<?= htmlspecialchars($personaje['tipo']) ?>" required>

    <label>🔝 Nivel:</label>
    <input type="number" name="nivel" value="<?= htmlspecialchars($personaje['nivel']) ?>" required>

    <label>🖼️ Foto (URL):</label>
    <input type="url" name="foto" value="<?= htmlspecialchars($personaje['foto']) ?>">

    <label>🔠 Frase</label>
    <input type="text" name="frase" value="<?= htmlspecialchars($personaje['frase']) ?>" required>

    <!-- Mostrar la foto si existe -->
    <?php if (!empty($personaje['foto'])): ?>
        <div style="margin: 10px;">
            <img src="<?= htmlspecialchars($personaje['foto']) ?>" alt="Foto del personaje" width="150">
        </div>
    <?php endif; ?>

    <button type="submit" class="boton">Guardar</button>
</form>

<!-- Opción para eliminar personaje si está en edición -->
<?php if ($personaje['id']): ?>
    <form method="post" action="eliminar.php">
        <input type="hidden" name="id" value="<?= $personaje['id'] ?>">
        <button type="submit" class="boton eliminar" onclick="return confirm('¿Seguro que deseas eliminar este personaje?');">❌ Eliminar Personaje</button>
    </form>
<?php endif; ?>

</body>
</html>
