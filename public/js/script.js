$(function() {

    // Punto 1.
    // Crear código para filtrar pacientes por nombre.

    $('#patient_filter').on('input', function(e) {

        var stringToSearch = $(this).val(), parentElement, thisElement;

        // Get rows of "table"
        $(".name").each(function( index ) {

            thisElement = $( this );

            // Get parent element 
            parentElement = thisElement.parent();

            // Set parent element visible
            parentElement.show();
            // OR parentElement.removeClass('hidden');

            if ( thisElement.text().toLowerCase().search( stringToSearch ) === -1 ) {

                // Hide whole parent element if the string inside does not contains text in input
                parentElement.hide();
                // OR parentElement.addClass('hidden');
            }
        });
    });
});