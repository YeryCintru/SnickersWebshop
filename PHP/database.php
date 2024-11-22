<?php
$host = 'localhost';
$dbname = 'urbankicks';
$username = 'root';
$password = '';

$carpeta_sql = '..\SQL';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


/*


    //Solo para copiarse la base de datos

    // Obtener todos los archivos .sql de la carpeta
    $archivos_sql = glob($carpeta_sql . '*.sql');

    // Iterar sobre cada archivo SQL y ejecutar su contenido
    foreach ($archivos_sql as $archivo) {
        if (file_exists($archivo)) {
            // Leer el contenido del archivo SQL
            $sql = file_get_contents($archivo);

            // Dividir el archivo SQL en sentencias separadas por punto y coma
            $queries = explode(';', $sql);

            // Ejecutar cada sentencia SQL
            foreach ($queries as $query) {
                // Eliminar espacios en blanco antes de ejecutar
                $query = trim($query);
                if (!empty($query)) {
                    $pdo->exec($query);
                }
            }





        }
            
    }
        */
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>