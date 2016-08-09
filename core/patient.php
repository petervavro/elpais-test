<?php 

include 'base.php';

// Patient Model
// Clase del Core
class patient extends base
{
    public function __construct()
    {
        // constructing the parent gives us 
        // access to the db through $this->db
        // which is a native php mysqli interface
        parent::__construct();
    }

    public function list_query($query)
    {
        $result_array = array();
        $result = $this->db->query($query);

        return parent::result_array($result);
    }
}