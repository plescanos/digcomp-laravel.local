<?php

if (!function_exists('build_mensaje_bienvenida')) {
    function build_mensaje_bienvenida($username) :string {
        return sprintf('Hola, %s. Bienvenido al Autoevaluador DIGCOMP. 
        Te recomendamos terminar la autoevaluación en todas las preguntas para que la medición sea válida. 
        Muchas gracias por utilizar nuestra plataforma. Al final de las 24 preguntas recibirás el resultado de tu nivel del IDC (Índice de Competencias Digitales
        La autoevaluación tiene una duración aproximada de 7 minutos. Deseas realizar la prueba?', $username);
    }
}

