<?php


include 'models/patient_model.php';

$patient_model = new patient_model();

$patients = $patient_model->list_all();

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ARX Test - Patient Selection Page</title>
    <meta name="description" content="assistrx programming test">
    <meta name="author" content="assistrx-dw">
    <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>
<body>


    <h1>Patient Listing</h1>

    <p>
        <label for="patient_filter">Filter by Name</label>
        <input type="text" name="patient_filter" />
    </p>

    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Has Song</th>
            <th>Actions</th>
        </tr>

        <?php foreach($patients as $patient): ?>
            <tr>
                <td><?php echo $patient->patient_name; ?></td>
                <td><?php echo $patient->patient_age; ?></td>
                <td><?php echo $patient->patient_phone; ?></td>
                <td>
                    <?php echo empty($patient->favorite_song_id) ? 'NO' : 'YES'; ?>
                </td>
                <td>
                    <a href="songs.php?patient_id=<?php echo $patient->patient_id; ?>" title="Click to Assisgn a Song to <?php echo $patient->patient_name; ?>">
                        Assign Song
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <!-- scripts at the bottom! -->
    <script src="public/script.js"></script>
</body>
</html>
