<!DOCTYPE html>>
<html>

<head>
    <title>Table</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Users</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data_table" class="table table-bordered table-striped">  
                        <thead>
                            <tr>
                                <th scope="col" width="%5">id</th>
                                <th scope="col" width="%10">Emri</th>
                                <th scope="col" width="%10">Mbiemri</th>
                                <th scope="col" width="%15">Username</th>
                                <th scope="col" width="%20">Email</th>
                                <th scope="col" width="%10">Role</th>
                                <th scope="col" width="%10">Data</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />
</body>

</html>
<!-- Sfaqja e dabela nga databasa -->
<script type="text/javascript" language="javascript">
    $(document).ready(function() {

        var dataTable = $('#data_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "server.php",
                type: "POST"
            }
        });
    });

    // Edit 
    $('#data_table').on('draw.dt', function() {
        $('#data_table').Tabledit({
            url: 'server.php',
            dataType: 'json',
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [1, 'emri'],
                    [2, 'mbiemri'],
                    [3, 'username'],
                    [4, 'email'],
                    [5, 'role']
                    // [3, 'text', '{"1":"test1","2":"test2"}']
                ]
            },
            //Delete
            restoreButton: false,
            onSuccess: function(data, textStatus, jqXHR) {
                if (data.action == 'delete') {
                    $('#' + data.id).remove();
                    $('#data_table').DataTable().ajax.reload();
                }
            }
        });
    });
</script>