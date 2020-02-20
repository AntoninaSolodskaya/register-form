<?php
    Class Database{
        private $link;

        /**
         *  Database constructor
         */
        public function __construct()
        {
            $this->connect();
        }
        /**
         * @return $this
         */

        private function connect ()
        {
            $config = require_once "config.php";
            $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
            $this->link = new PDO($dsn, $config['username'], $config['password']);
            return $this;
        }

        /**
         * @param $sql
         * @return mixed
         */
        public function execute($sql)
        {
            $sth = $this->link->prepare($sql);
            return $sth->execute();
        }

        /**
         * @param $sql
         * @return array
         */
        public function query($sql)
        {
            $sth = $this->link->prepare($sql);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if($result === false) {
                return [];
            }
            return $result;
        }
    } 

// $db = new Database();

// $db->execute("INSERT INTO `users` SET `username`='Vlad', `password`='555222', `date`=".time())

// $users = $db->query("SELECT * FROM `users`");
// print_r($users);

?>