<?php

namespace Classes;

use PDO;
use PDOException;

class DbConnector
{
    private string $dsn = "mysql:host=localhost;dbname=randox_laboratory";
    private string $dbuserName = "root";
    private string $dbPassword = "";

    public function getConnection(): ?PDO
    {
        try {
            $pdo = new PDO($this->dsn,$this->dbuserName,$this->dbPassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch (PDOException){
            return null;
        }
    }

}