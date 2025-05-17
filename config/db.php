<?php
require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
echo $_ENV['DB_HOST'];

class Database {
    private $conn;

    public function connect() {
        $db_name = getenv("DB_NAME");
        $db_host = getenv("DB_HOST");
        $db_user = getenv("DB_USER");
        $db_pass = getenv("DB_PASS");

        try {
            $this->conn = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $this->conn;
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }
}
