<?php 

include 'my_model.php';

class song_model extends my_model
{
    public function __construct()
    {
        // constructing the parent gives us 
        // access to the db through $this->db
        // which is a native php mysqli interface
        parent::__construct();
    }

    public function list_all()
    {
        $result_array = array();
        $result = $this->db->query('select * from songs');

        return parent::result_array($result);
    }
}