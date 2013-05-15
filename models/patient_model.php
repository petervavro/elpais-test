<?php 

include 'my_model.php';

class patient_model extends my_model
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
        $result = $this->db->query('select * from patients');

        return parent::result_array($result);
    }

    public function get_by_id($patient_id = NULL)
    {
        $result = $this->db->query("
            SELECT *
            FROM patients
            LEFT JOIN songs
                ON patients.favorite_song_id = songs.song_id
            WHERE  patient_id = {$patient_id}
        ");

        return $result->fetch_object();
    }
}