<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

// Inicializar una nueva sesión de cURL
$ch = curl_init(API_URL);

// Configurar cURL
curl_setopt($ch, CURLOPT_CAINFO, 'C:\php\extras\ssl\cacert.pem');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la petición y guardar el resultado
$result = curl_exec($ch);

// Verificar si hubo un error en cURL
if ($result === false) {
    // Mostrar el error de cURL
    echo "cURL Error: " . curl_error($ch);
} else {
    // Decodificar el JSON
    $data = json_decode($result, true);

    // Verificar si la decodificación fue exitosa
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "JSON Decode Error: " . json_last_error_msg();
        $data = null; // Para evitar otros errores
    }
}

curl_close($ch);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próxima peli de Marvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<body>

    <main>
        <section>
            <?php if ($data): ?>
                <img src="<?= htmlspecialchars($data["poster_url"]); ?>" width="300" height="auto" alt="Poster de la película" style="border-radius: 16px;">
            </section>

            <hgroup>    
                <h2><?= htmlspecialchars($data["title"]); ?> se estrena en <?= htmlspecialchars($data["days_until"]); ?> días</h2>
                <p>Fecha de estreno: <?= htmlspecialchars($data["release_date"]); ?></p>
                <p>La siguiente película es: <?= htmlspecialchars($data["following_production"]["title"]); ?></p>
            </hgroup>
            <?php else: ?>
                <p>No se pudo obtener la información de la película.</p>
            <?php endif; ?>
    </main>

</body>
</html>

<style>
    body {
        background-color: black;
        display: flex;
        place-content: center;
        color: #fff;
        text-align: center;
    }
</style>



 




<?php 
/*
$name = "Variables";
$numero = 10;
$booelean = true;
$name = 10;
$camelCase = 12;

//Por que es gradual, indicar de que tipo de datos es la variable 
//var_dump($name); //Muestra el tipo de datos y valor
//echo gettype($camelCase); //Para saber solo el tipo de datos
//is_int($numero); //Para hacer comparaciones del tipo de datos y mo hacerla forzcada con gettype
//is_bool($booelean);

//metodo para revisar si es tipo o del otro , podemos hacer comparaciones con otros tipos de datos creo 
//Se puede hacer type-casting

//Lenguaje dinamico debil y gradual
//Dinamico por que no le delcramos el tipo de dato
//Debil por que va a intentar hacer una conversion de tipos de datos, para que si tienes una cadena y un numero 
//Hace esta conversion automatica para que la operación funcione coerrectamente 

/*
Ejemplo:

newAge = "40" + 1;

*/

//En php no se concatenea con el + si no con un . por lo que php siempre va a entender si sumas 2 strings
//lo sumara como numeros, hace esa conversipn de tipos a numeros
//Pasara lo mismo al revez no puedes sumar 3 numeros y usar el punto, los tomara como String

/*

$suma = "50" + "10";
*/

/*

?>

<?php

$output = "hola"
."Jovny";

$age = 88 < 90;
if($age<90){

    echo "viejo";


}else{

    echo "joven";
}

/*
Alternativa para el elseif por el uso de sistema de plantillas
*/
/*
if($age>90){
    
        echo "joven perro";
}elseif($booelean){

    echo "php es raro";
}


//If con ternarios

$futbotlista = true
? 'Eres muy bueno ': 'Que jugador nos perdimos';

//Definicion de una constante define('img',"https://i.ytimg.com/vi/pPgR6F4Wlxc/hq720.jpg?sqp=-oaymwEXCNAFEJQDSFryq4qpAwkIARUAAIhCGAE=&rs=AOn4CLCDNHNyCDrw-iIqjDDi4V5M05icxw");

//Swicth ya los sabemos es lo mismo
//Match > Switch
$name = "Jovany";
$age = 19;
$outputEstudio = match(true){ //Esto quiere decir que lo que hace match
//Es que va a comparar - matchear ese parametro lo va a comparar con los valores puestos, y el valor de la variable sera el valor de la comparación
//Lo mejor seíra evaluar expresiones, pasando true y evaluando expresiones condicionales
    
    0,1,2 =>"Eres bebe",

    80,81,82,83,84,88 => "perro",

    $age > 20  || $age <=20=> "Colagne", //Expresiones pasando como true como parametro

    default => "nada, $name",

}

//Alternativva para el sistema de plantillas
?>

<h2><?=$outputEstudio?></h2>

<?php if($age) : ?>
    <p>Eres greande tio</p>
<?php elseif($booelean) : ?>
    <h3>Boleean</h3>
<?php else: ?>
    <h1>Eres Joven</h1>

<?php endif; ?>

<!--<img src=" alt="" srcset=""> -->



<h1>
    <?php echo "Hola Mundo";?> <!--Esta forma es recomendada cuuando mezclas con html y Para hacer estos sitemas de plantillas cuando lo metes dentro de etiquetas-->
    <?= "Hola Mundo";?> <!--Esta forma es recomendada cuuando mezclas con html y Para hacer estos sitemas de plantillas cuando lo metes dentro de etiquetas-->
    <?=$output; ?>
</h1>


<style>

    body{

        background-color: black;
        display: flex;
        place-content: center;
        color: #fff;
    }

</style>





<?php
    echo "Hola Mundo";

    //Los saltos de lineas con br para que sean visibles en HTML
    //PHp MOSTRARA EL ECHO donde piensa que se va a trabajar, php lo mostrara
    // ?d> Opcional

?>



<?php

//Arrays

$bestLanguagues = [
    
    "php",
    "java",
    "python",
    "javascript",
];

$badLanguagues = [
    
    "c++",
    "c",
    "c#",
    "go",
    true,
    1,
    10.90,
];
$bestLanguagues[] = "python"; //De esta manera agregamos un elemnto ala ultima posicion del array - fila
$badLanguagues[] = "cobol";
$bestLanguagues[1] = "kotlin";  //De esta manera agregamos un elemento en la posición del indice
//En los doas casos automaticamente el array se hace mpás grande solo para agregar el elemento

//Interar los arrays mediante foreach y usando como sistema de plantilas

foreach($bestLanguagues as $best){

    echo $best;
}


//Maps o Diccionario - Array associativo

$person = [


    "name" => "jovany",
    1 => "animal",
    12 => true,
    "lenguages" => ["php", "java", "javaScript", "Python"],
];

?>
//Example 1
<h3>
    El peor lenguaje es: <?= $badLanguagues[6]?>
</h3>

//Example 2

<h4>
    Sistema de plantilla con listas
</h4>

//Example 3


<ul>
    <?php foreach ($bestLanguagues as $key => $best): ?>
    <li><?=  $key. "".$best?></li>        
    <?php endforeach;?>

</ul>

*/