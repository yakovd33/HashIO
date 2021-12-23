<?php
    define("DB_NAME", "miner");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");

    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	$MBNL = new MBNL();

    class db {
        private $link;

        public function __construct () {
            $this->link = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        }

        public function getLink () {
            return $this->link;
        }
    }

    $db = new db;

    try {
        $link = $db->getLink();
    } catch(PDOException $e) {
        die('Database Connection failed: ' . $e->getMessage());
    }

    /*
        $stmt = $link->query("SELECT * FROM `users`");
        while ($row = $stmt->fetch()) {
            echo $row['username'].'<br>';
        }
    */

?>