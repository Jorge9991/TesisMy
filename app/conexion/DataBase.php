<?php
define('DB_HOST', 'localhost');

define('DB_USER', 'root');

define('DB_PASS', '');

define('DB_BASE', 'bd_tesis');

class DataBase extends PDO {

    protected static $instancia;

    public static function getInstancia() {
        if (empty(self::$instancia)) {
            self::$instancia = new self();
            self::$instancia->exec('SET NAMES utf8');
        }
        return self::$instancia;
    }

    public function __construct($bdtipo = 'mysql') {
        switch ($bdtipo) {
            case ' pgsql':
                //DSN (nombre de origen de datos)
                $dsn = 'pgsql:host=' . DB_HOST . ' dbname=' . DB_BASE . ' charset=UTF-8';
                break;
            default:
                $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_BASE;
                break;
        }
        parent::__construct($dsn, DB_USER, DB_PASS, array(
            PDO::ATTR_PERSISTENT => false, /* Conexiones persistentes, no recomendable para el recolector */
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION /* Throw exception */
                )
        );
    }

    public function __destruct() {
        self::$instancia = null;
    }

}
