<?php


include 'models/patient_model.php';

$patient_model = new patient_model();


$patient_id = $_GET['patient_id'];

$patient = $patient_model->get_by_id($patient_id);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ARX Test - Song Selection Page</title>
    <meta name="description" content="assistrx programming test">
    <meta name="author" content="assistrx-dw">
    <link rel="stylesheet" href="public/styles.css?v=1.0">
</head>
<body>


    <h1>Song Selection</h1>
    </h2>Assign a Song to <?php echo $patient->patient_name; ?></h2>

    <p>
        <label for="song_search">Search for a Song</label>
        <input type="text" name="song_search" />
        <input type="button" name="song_search_submit" value="search" />
    </p>

    <ul id="song-result-wrapper"></ul>

    <!-- scripts at the bottom! -->
    <script src="public/jquery-1.9.1.min.js"></script>

    <!-- this script file is for global js -->
    <script src="public/script.js"></script>

    <script type="text/javascript">
        var term_input = $('input[name=song_search]');
        var result_wrapper = $('#song-result-wrapper');

        $('input[name=song_search_submit]').click(function(e) {
            e.preventDefault();
            var term = term_input.val();
            
            // clear the current results
            result_wrapper.html('');

            $.ajax({
                url : 'https://itunes.apple.com/search',
                jsonpCallback : 'jsonCallback',
                async: false,
                contentType: "application/json",
                dataType: 'jsonp',
                data : {
                    callback : 'JSON_CALLBACK',
                    country : 'US',
                    term : term,
                    entity : 'song',
                    limit : 25
                },
                success: function(data) {
                    console.log(data);

                    var songs = data.results;
                    
                    for(var s in songs) {
                        var song = songs[s];

                        result_wrapper.append('<li>'+song.trackName+'</li>');
                    }

                }
            });

        });
    </script>
</body>
</html>
