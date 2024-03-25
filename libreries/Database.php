<?php
class Database
{
    public $tableName;
    public $connect;
    public $query;
    public $queryResultat;
    protected function __construct()
    {
        $this->connect = new mysqli(SERVER_HOST, SERVER_USERNAME, SERVER_PASSWORD, DB_NAME);
        if ($this->connect->connect_errno) {
            echo "error " . $this->connect->connect_error;
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
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $this->query = "INSERT INTO users (name, surname, gender, email, password) VALUES ('$name', '$surname', '$gender', '$email', '$password')";
        return $this;
    }
    public function execute()
    {
        $this->queryResultat = mysqli_query($this->connect, $this->query);
        return $this;
    }
}
