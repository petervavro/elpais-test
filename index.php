<?php

include 'models/my_patient.php';

$patient_model = new my_patient();

$patients = $patient_model->list_all();

$groupedby_patient_age = $patient_model->list_groupedby();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>El País Test</title>
    <meta name="description" content="El País programming test">
    <meta name="author" content="assistrx-dw">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>

    <div class="container">

        <h1>Patient Listing</h1>

        <p>
            <label for="patient_filter">Filter by Name</label>
            <input type="text" name="patient_filter" id="patient_filter" />
        </p>

        <p>
            <label for="patient_filter">Number of patients grouped by age</label>

            <?php foreach($groupedby_patient_age as $patient): ?>

                <!-- Punto 3 Listar numero de paciente por edades -->
                <ul>
                    <li><span>Age: <?php echo $patient->patient_age; ?> </span><span>Patients quantity: <?php echo $patient->q; ?></span></li>
                </ul>

            <?php endforeach; ?>

        </p>

        <div class="row">
            <div class="col-xs-4">Name</div>
            <div class="col-xs-4 hidden-xs">Age</div>
            <div class="col-xs-4">Phone</div>
        </div>

        <!-- Punto 4 Esconde la columna Age para móviles -->
        <?php foreach($patients as $patient): ?>

            <?php if ((int)$patient->patient_age > 50): ?>

                <div class="row">
                    <div class="name col-xs-4"><?php echo $patient->patient_name; ?></div>
                    <div class="col-xs-4 hidden-xs"><?php echo $patient->patient_age; ?></div>
                    <div class="col-xs-4"><?php echo $patient->patient_phone; ?></div>
                </div>

            <?php endif; ?>

        <?php endforeach; ?>

    </div>

    <!-- scripts at the bottom! -->
    <script src="public/js/jquery-1.9.1.min.js"></script>

    <!-- this script file is for global js -->
    <script src="public/js/script.js"></script>
</body>
</html>
