/*  Ajax Setup  */
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            $('div[role="status-start"]').addClass('hidden');
            $('div[role="status-load"]').removeClass('hidden');
        },
        complete: function () {
            $('div[role="status-start"]').removeClass('hidden');
            $('div[role="status-load"]').addClass('hidden');
        },
    });
});

/*  User  */
$(document).ready(function () {
    //  table
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

    //  destroy
    destroy('a.destroy-user', 'div#destroy-user-modal', 'button#submit-destroy-user', 'button#hide-destroy-user');

    //  create log
    createLogs('button#create-log-user')

    //  clear log
    clearLogs('button#clear-log-user');
});

/*  Account  */
$(document).ready(function () {
    //  table
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

    //  destroy
    destroy('a.destroy-account', 'div#destroy-account-modal', 'button#submit-destroy-account', 'button#hide-destroy-account');

    // create logs
    createLogs('button#create-log-account');

    //  clear logs
    clearLogs('button#clear-log-account');
});

/*  Product category  */
$(document).ready(function () {
    //  table
    var productCategoryTable = $('table#product-category-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            method: "GET",
            url: "/product-category",
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
            {data: 'category', name: 'category'},
            {data: 'level', name: 'level'},
            {data: 'keywords', name: 'keywords'},
            {data: 'created_by', name: 'created_by'},
            {data: 'action', name: 'action'},
        ],
    });
});

/*  Function  */
function destroy (selectorButton, selectorModal, selectorModalBtnSubmit, selectorModalBtnHide) {
    $(document).on('click', selectorButton, function (e) {
        e.stopPropagation();

        $(selectorModal).show();

        let url = $(this).data('url');

        $(selectorModalBtnSubmit).one('click', function (e) {
            $.ajax({
                method: "DELETE",
                url: url,
                dataType: "json",
                success: function(result) {
                    if (result.success == true) {
                        alert(result.data['id'] + ' - ' + result.data['time']);
                        userTable.ajax.reload();
                    } else {
                        alert('error');
                    }
                }
            });
        });

        //  hide modal
        $(selectorModalBtnHide).one('click', function (e) {
            $(selectorModal).hide();
        });
    });
}

function createLogs (selectorBtnCreateLogs) {
    $(document).on('click', selectorBtnCreateLogs, function (e) {
        const url = $(this).data('url');

        $.ajax({
            method: "PUT",
            url: url,
            dataType: "json",
        })
        .done(function (result) {
            if (result.success == true) {
                alert(result.msg);
                $("#table-logs").load(location.href + " #table-logs");
            } else {
                alert(result.msg);
            }
        })
        .fail(function () {});
    });
}

function clearLogs (selectorBtnClearLogs) {
    $(document).on('click', selectorBtnClearLogs, function (e) {
        const url = $(this).data('url');

        $.ajax({
            method: "DELETE",
            url: url,
            dataType: "json",
        })
        .done(function (result) {
            if (result.success == true) {
                alert(result.msg);
                $("#table-logs").load(location.href + " #table-logs");
            } else {
                alert(result.msg);
            }
        })
        .fail(function () {});;
    });
}
