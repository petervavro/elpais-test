<?php 

include './core/patient.php';

// Extended Patient Model
class my_patient extends patient
{

    public function list_all()
    {
        return parent::list_query('select * from patients');
    }

    public function list_groupedby()
    {

        return parent::list_query('SELECT `patient_age`,COUNT(`patient_age`) as `q` FROM `patients` WHERE 1 GROUP BY `patient_age`;');
    }
}