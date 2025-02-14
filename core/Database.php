<?php

namespace Core;

class Database
{

    const DB_USER = 'php';
    const DB_PASSWORD = 'php';
    const DB_HOST = 'localhost';
    const DB_NAME = 'php_cafeteria_project';
    const DB_PORT = 3306;
    protected $pdo;

    public function __construct()
    {
        try {
            $dbName = self::DB_NAME;
            $dbHost = self::DB_HOST;
            $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", self::DB_USER, self::DB_PASSWORD);
            $this->pdo = $pdo;
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert($table, $data)
    {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));

            $query = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
            $stmt = $this->pdo->prepare($query);

            foreach ($data as $column => $value) {
                $stmt->bindValue(":{$column}", $value);
            }

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function select($table)
    {
        $pdo = $this->pdo;
        try {
            $select_query = "select * from {$table}";
            $stmt = $pdo->prepare($select_query);
            $stmt->execute();
            # return  array of arrays [each one associative key=>value"
            $pdo = null;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function show($id, $table)
    {
        try {
            $pdo = $this->pdo;
            $select_query = "select * from {$table} where id = :id";
            $stmt = $pdo->prepare($select_query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $pdo = null;

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function update($table, $id, $data)
    {
        try {
            $set = [];
            foreach ($data as $column => $value) {
                $set[] = "{$column} = :{$column}";
            }
            $set = implode(', ', $set);

            $query = "UPDATE {$table} SET {$set} WHERE id = :id";
            $stmt = $this->pdo->prepare($query);

            foreach ($data as $column => $value) {
                $stmt->bindValue(":{$column}", $value);
            }
            $stmt->bindValue(':id', $id);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id, $table)
    {
        $pdo = $this->pdo;
        try {
            $delete_query = "delete from {$table} where id = :id";
            $stmt = $pdo->prepare($delete_query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            if (!$stmt->rowCount()) {
                throw new Exception("Delete Failed");
            } else {
                return true;
            }
            # to close connection
            $pdo = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
