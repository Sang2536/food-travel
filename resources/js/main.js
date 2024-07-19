$(document).ready(function () {
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


//  User
$(document).ready(function () {
    //  User table
    var userTable = $('table#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            method: "GET",
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

    //  destroy user
    $(document).on('click', 'a.destroy-user', function (e) {
        e.stopPropagation();

        $('div#destroy-user-modal').show();

        let url = $(this).data('url');

        $('button#submit-destroy-user').one('click', function (e) {
            $.ajax({
                method: "DELETE",
                url: url,
                dataType: "json",
                success: function(result) {
                    if (result.success == true) {
                        alert(result.data['uid'] + ' - ' + result.data['time']);
                        userTable.ajax.reload();
                    } else {
                        alert('error');
                    }
                }
            });
        });

        //  hide modal
        $('button#hide-destroy-user').one('click', function (e) {
            $('div#destroy-user-modal').hide();
        });
    });
    
    //  create log
    $(document).on('click', 'button#create-log-user', function (e) {
        const url = $(this).data('url');

        console.log(url);

        $.ajax({
            method: "PUT",
            url: url,
            dataType: "json",
            success: function(result) {
                if (result.success == true) {
                    alert(result.msg);
                } else {
                    alert(result.msg);
                }
            }
        });
    });

    //  clear log
    $(document).on('click', 'button#clear-log-user', function (e) {
        const url = $(this).data('url');

        console.log(url);

        $.ajax({
            method: "DELETE",
            url: url,
            dataType: "json",
            success: function(result) {
                if (result.success == true) {
                    alert(result.msg);
                } else {
                    alert(result.msg);
                }
            }
        });
    });
});

//  User
$(document).ready(function () {
    //  User table
    var accountTable = $('table#accounts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            method: "GET",
            url: "/account",
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
            {data: 'account', name: 'account'},
            {data: 'info', name: 'info'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'},
        ],
    });
});
