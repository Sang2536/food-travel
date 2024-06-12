//  User
$(document).ready(function () {
    console.log('hello main.js');

    //  User table
    $('table#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            type: "GET",
            url: "/user",
            data: function (d) {  }
        },
        columnDefs: [
            {
                "targets": [0, 4],
                "orderable": false,
                "searchable": false,
            },
        ],
        columns: [
            {data: 'checkbox', name: 'checkbox'},
            {data: 'name', name: 'name'},
            {data: 'position', name: 'position'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'},
        ],
    });
});
