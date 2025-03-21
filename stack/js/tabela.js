$(document).ready(function() {
    $("#verbas").DataTable({
        "searching": false,
        "paging": false,
        "ordering": true,
        "columnDefs": [
            { "targets": [3, 4], "orderable": false }
        ]
    })
})