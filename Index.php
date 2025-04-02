<?php

// Se incluye el archivo 'motor.php' que contiene funciones necesarias para la aplicación
require('libreria/motor.php');
require('libreria/plantilla.php');

// Se aplica la plantilla de la página utilizando la función estática de la clase 'Plantilla'
plantilla::aplicar();
Plantilla::navbar();

?>

<main>
    <section class="home">
        <div class="bienvenida">
        <h1>🌟 ¡Bienvenidos al mundo de Toy Story! 🤠</h1>
            <p>Vive las aventuras de Woody, Buzz y sus amigos en un mundo lleno de diversión, amistad y valentía. Descubre sus historias y forma parte de la magia de Toy Story. 🚀🎭</p>
            <a href="reparto.php" class="boton-secundario">🧸 Conoce al Elenco</a>
            <a href="registro.php" class="boton-secundario">📜 Agregar un Juguete</a>
        </div>

    </section>
</main>


<footer>

</footer>