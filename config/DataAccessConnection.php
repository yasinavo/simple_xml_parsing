<?php

/**
 * This class handle database connection
 * Database instance. The *DataAccessConnection* instance.
 *
 */
class DataAccessConnection
{

    private $hostname;
    private $dbname;
    private $username;
    private $password;

    /**
     * Static member holds only one instance of the DataAccessConnection class.
     */
    private static $instance;

    protected $connection;

    /**
     * Private constructor
     * Prevents any other class from instantiating via the 'new' operator
     * Use PDO extension for database connection
     *          Here you may change the host, databse user and password
     *          Default Databse user is 'root' and empty password
     */
    private function __construct()
    {
        $this->hostname = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "meeting";

        $this->connection = new PDO(
            "mysql:host={$this->hostname};dbname={$this->dbname};charset=utf8", $this->username, $this->password
        );
    }

    /**
     *
     * Connects to db and creates instance
     * Public method providing global point of access
     */
    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function _db_query($sql)
    {
        try {

            $result = $this->query($sql);

            return $result;
        } catch (DataAccessException $e) {
            echo 'error';
        }
    }

    public function query($sql)
    {
        try {
            return $this->connection->query($sql);
        } catch (PDOException $e) {
            throw new DataAccessException($e->getMessage());
        }
    }


}
?>
