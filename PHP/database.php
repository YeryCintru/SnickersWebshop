<?php
$host = 'localhost';
$dbname = 'urbankicks';
$username = 'root';
$password = '';

// Directory path for SQL files
$carpeta_sql = '..\SQL';



try {

    // Create a new PDO instance to connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Set the PDO error mode to exception, so that PDO throws exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    /*

    // Only for copying the database

    // Get all .sql files in the folder
    $archivos_sql = glob($carpeta_sql . '*.sql');

    // Iterate through each SQL file and execute its content
    foreach ($archivos_sql as $archivo) {
        if (file_exists($archivo)) {
            // Read the content of the SQL file
            $sql = file_get_contents($archivo);

            // Split the SQL file into statements separated by semicolons
            $queries = explode(';', $sql);

            // Execute each SQL statement
            foreach ($queries as $query) {
                // Remove any extra whitespace before executing
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

