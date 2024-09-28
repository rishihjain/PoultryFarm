<?php 
// DB credentials from environment variables
define('DB_HOST', getenv('CLOUDSQL_DSN')); // Cloud SQL DSN for connecting
define('DB_USER', getenv('CLOUDSQL_USER')); // Fetching user from environment variable
define('DB_PASS', getenv('CLOUDSQL_PASSWORD')); // Fetching password from environment variable
define('DB_NAME', getenv('CLOUDSQL_DB')); // Fetching database name from environment variable

// Establish database connection using PDO
try {
    // For Cloud SQL, use the Unix socket for the PDO connection
    $dbh = new PDO("mysql:unix_socket=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    
    // Set attributes for error handling
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optionally, you can echo a success message for debugging
    // echo "Connected to the database successfully!";
    
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>
