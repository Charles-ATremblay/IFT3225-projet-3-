$(document).ready( function () {
    $('#table_id').DataTable( {
        ajax: '/api/myData',
        columns: [
            { data: 'name' },
            { data: 'position' },
            { data: 'salary' },
            { data: 'state_date' },
            { data: 'office' },
            { data: 'extn' }
        ]
    } );
} );