<?php 

class my_model
{
    public function __construct()
    {
        // establish connection to DB
        $this->db = new mysqli(
            'localhost', // HOST
            'root',      // USER
            'panther5',  // PASS
            'arx_test'   // DB_NAME
        );

        // should you handle connection errors?
        // if($this->db->connect_error) { ... }
    }


    protected function result_array( $result )
    {
        while($record = $result->fetch_object())
        {
            $result_array[] = $record;
        }

        return $result_array;
    }


    public function __destruct()
    {
        $this->db->close();
    }

}