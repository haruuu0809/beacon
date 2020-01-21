<?php

class DbOperation
{
    private $conn;

    //Constructor
    function __construct()
    {
        require_once dirname(__FILE__) . '/Config.php';
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    //Function to create a new data
    public function beacon($date, $flag)
    {
        $stmt = $this->conn->prepare("INSERT INTO beacon(date, flag) values(?, ?)");
        $stmt->bind_param("si", $date, $flag);
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>
