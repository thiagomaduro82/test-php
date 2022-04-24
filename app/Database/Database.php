<?php

namespace App\Database;

use \PDO;
use PDOException;

class Database
{
    const HOST = "";
    const DB_NAME = "";
    const USER = "";
    const PASS = "";
    private $connection;

    public function makeStructure()
    {
        try {
            $this->setGenericConnection();
            $this->createDB();
            $this->useDB(self::DB_NAME);
            $this->createTables();
            $this->insertData();
            return "ok";
        } catch (\Throwable $th) {
            return "nok";
        }
    }

    private function setGenericConnection()
    {
        try {
            $this->connection = new PDO("mysql:host=" . self::HOST . ";", self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "nok";
        }
    }

    public function setConnection()
    {
        try {
            $this->connection = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    private function createDB()
    {
        $sql = "create database if not exists " . self::DB_NAME . " charset='utf8' collate='utf8_unicode_ci'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    private function useDB($dbName)
    {
        $sql = "use " . $dbName;
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    private function createTables()
    {
        $sql = "create table tv_series (
            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
            `title` varchar(50) not null, 
            `channel` varchar(50) not null, 
            `gender` varchar(50) not null, 
            primary key (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $sql = "create table tv_series_intervals (
            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
            `id_tv_series` bigint unsigned NOT NULL, 
            `week_day` varchar(50) not null, 
            `show_time` time not null, 
            primary key (`id`),
            CONSTRAINT `tv_series_id_foreign` FOREIGN KEY (`id_tv_series`) REFERENCES `tv_series` (`id`) ON DELETE RESTRICT
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    private function insertData()
    {
        // tv_series data
        $sql = "insert into tv_series (`title`, `channel`, `gender`) values ('The Good Doctor', 'Netflix','Drama')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $sql = "insert into tv_series (`title`, `channel`, `gender`) values ('Doctor House', 'Netflix','Drama')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $sql = "insert into tv_series (`title`, `channel`, `gender`) values ('The 100', 'Netflix','Science fiction')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        // tv_series_intervals data
        $sql = "insert into tv_series_intervals (`id_tv_series`, `week_day`, `show_time`) values (1, 'Monday','08:00:00')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $sql = "insert into tv_series_intervals (`id_tv_series`, `week_day`, `show_time`) values (1, 'Wednesday','12:00:00')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $sql = "insert into tv_series_intervals (`id_tv_series`, `week_day`, `show_time`) values (1, 'Saturday','22:00:00')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $sql = "insert into tv_series_intervals (`id_tv_series`, `week_day`, `show_time`) values (2, 'Tuesday','09:00:00')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $sql = "insert into tv_series_intervals (`id_tv_series`, `week_day`, `show_time`) values (2, 'Thursday','13:00:00')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $sql = "insert into tv_series_intervals (`id_tv_series`, `week_day`, `show_time`) values (2, 'Sunday','19:00:00')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $sql = "insert into tv_series_intervals (`id_tv_series`, `week_day`, `show_time`) values (3, 'Wednesday','15:00:00')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $sql = "insert into tv_series_intervals (`id_tv_series`, `week_day`, `show_time`) values (3, 'Saturday','20:00:00')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $sql = "insert into tv_series_intervals (`id_tv_series`, `week_day`, `show_time`) values (3, 'Sunday','23:00:00')";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }
}
