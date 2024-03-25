<?php
class Users extends Database{
    public function __construct() {
        $this->tableName = 'users';
        parent::__construct();
    }
}
