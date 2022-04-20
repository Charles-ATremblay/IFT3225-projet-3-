$(document).ready( function () {
    $('#table_id').DataTable( {
        ajax : 'table.php',
        columns : [
            { data: 'Nom' },
            { data: 'Adress' },
            { data: 'Ville' },
            { data: 'CP' },
            { data: '#Permis' },
            { data: 'Courriel' }
        ]
    } );
} );
