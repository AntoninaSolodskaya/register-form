<?php

include 'DBConnection.php';

class User {

    private $connection;

         /**
          *  User constructor
          */
         public function __construct()
         {
             $this->connection = DBConnection::getConnection();
         }

        public function create(array $attributes)
        {
            $tableName = "users";

            $columns = array_map(function ($value) {
                return $value;
            }, array_keys($attributes));

            $values = array_map(function ($value) {
                return "'" . $value . "'";
            }, $attributes);

            $columns = implode(',', $columns);
            $values = implode(',', $values);
            $this->connection->prepare(
                'INSERT INTO ' . $tableName . '(' . $columns . ') VALUES (' . $values . ')'
            )->execute();
        }

     }
