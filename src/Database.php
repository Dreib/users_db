<?php
    class Database {
        private $host = 'localhost';
        private $db_name = 'MyDB';
        private $username = 'root';
        private $password = '?8-+.123';
        private $conn;


    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this.$this->db_name,
                $this.$this->username, $this.$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection error' . $e->getMessage();
        }

        return $this->conn;
    }
}