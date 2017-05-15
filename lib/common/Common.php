<?php
include_once './config/DataAccessConnection.php';

Class Common
{
    private $dataAccessConnection;

    public function __construct()
    {
        $this->getDataAccessConnection();
    }

    public function getDataAccessConnection()
    {
        if (!($this->dataAccessConnection instanceof dataAccessConnection)) {
            $this->dataAccessConnection = DataAccessConnection::getInstance();
        }
        return $this->dataAccessConnection;
    }


    // Execute query
    public function getXMLFile($file)
    {

        $sql = " SELECT * FROM meeting_data WHERE file_id = $file AND active =1 ";
        $result = $this->getDataAccessConnection()->_db_query($sql);

        if ($result) {
            if ($result->rowCount() > 0) {
                return $result->fetch();
            } else {
                echo "File does not exist or inactive.";
                exit();
            }
        } else {
            die('Invalid query: ' . mysql_error());
        }

    }

}

?>
