<?php
class Database
{
    public $tableName;
    public $connect;
    public $query;
    public $queryResultat;
    protected function __construct()
    {
        try {
            $dsn = "mysql:host=" . SERVER_HOST . ";dbname=" . DB_NAME;
            $this->pdo = new PDO($dsn, SERVER_USERNAME, SERVER_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }

    public function numRows()
    {
        if ($this->queryResultat) {
            return mysqli_num_rows($this->queryResultat);
        } else
            return false;
    }
    public function select($email)
    {
        //var_dump($email);
        $this->query = "SELECT * FROM " . $this->tableName .  " WHERE email = '$email'";
        //var_dump($this->query);
        return $this;
    }
    public function insert($post)
    {
        $name = $post['name'];
        $surname = $post['surname'];
        $gender = $post['gender'];
        $email = $post['email'];
        $password = $post['password'];
        $this->query = "INSERT INTO users (name, surname, gender, email, password) VALUES ('$name', '$surname', '$gender', '$email', '$password')";
        return $this;
    }

    public function execute()
    {
        try {
            $statement = $this->pdo->prepare($this->query);
            $statement->execute();
            $this->queryResultat = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $this;
        } catch (PDOException $e) {
            die("Error executing query: " . $e->getMessage());
        }
    }
}
