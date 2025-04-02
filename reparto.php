<?php

if (!file_exists('libreria/db_config.php')) {
    header("Location: instalador.php");
    exit;
}

require_once 'libreria/db_config.php';
require_once 'libreria/conexion.php';
require_once 'libreria/plantilla.php';
plantilla::aplicar();
Plantilla::navbar();

$conexion = new PDO("mysql:host=localhost;dbname=toystory_db", "root", "");
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM personajes";
$stmt = $conexion->query($sql);
$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="personajes-container">
    <h2 class="titulo-personajes">🎭 Conoce al Elenco de Toy Story 🎭</h2>
    <!-- <p>Descubre a los personajes que forman parte de esta mágica aventura. ¡Cada uno con su propio estilo y profesión! ✨💖</p> -->

    <div class="personajes">
        <?php
        if (empty($filas)) {
            echo "<p class='mensaje-vacio'>🤠 ¡Oh no! Aún no hay personajes. 🎡 ¡Añade a Woody y sus amigos! 🐴</p>";
        } else {
            foreach ($filas as $fila) {
                echo "
                <div class='personaje'>
                    <img src='{$fila['foto']}' alt='{$fila['nombre']}'>
                    <h3>{$fila['nombre']}</h3>
                    <p class='profesion'>color: {$fila['color']}</p>
                    <p class='edad'>Tipo: {$fila['tipo']}</p>
                    <p class='edad'>Nivel: {$fila['nivel']}</p>
                    <div class='acciones'>
                        <a href='registro.php?id={$fila['id']}' class='btn-detalle'>Ver Detalle</a> \n
                        <a href='generar_pdf.php?id={$fila['id']}' class='btn-detalle' target='_blank'>📄 Descargar PDF</a>
                    </div>
                </div>
                ";
            }
        }
        ?>
    </div>
</section>

<script>
    function eliminarPersonaje(codigo, boton) {
        if (!confirm("💔 ¿Estás segura de que quieres eliminar a este personaje de Barbie World?")) {
            return;
        }

        fetch('eliminar.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `codigo=${codigo}`
        })
        .then(response => response.text())
        .then(data => {
            console.log("⚠ Respuesta del servidor:", data);

            try {
                let jsonData = JSON.parse(data);
                if (jsonData.success) {
                    let card = boton.closest(".personaje");
                    card.style.transition = "opacity 0.5s ease";
                    card.style.opacity = "0";
                    setTimeout(() => {
                        card.remove();
                        window.location.reload();
                    }, 600);
                } else {
                    alert("⚠ Error: " + jsonData.message);
                }
            } catch (e) {
                console.error("⚠ Error al convertir JSON:", e, data);
                alert("⚠ Error inesperado del servidor.");
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
            alert("⚠ Hubo un problema al eliminar el personaje.");
        });
    }
</script>
