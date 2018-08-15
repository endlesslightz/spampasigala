<!DOCTYPE html>
<html>
    <head>
        <title>LIST SENSOR AKTIF</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="30">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/datatables/datatables.css" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatables/datatables.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


         <script>
            $(document).ready(function() {
            $('#tabel').DataTable({searching: true, paging: false, info:true, pageLength: 6, lengthChange:false});
        } );
        </script>
    </head>
    <body style="background: #F3F4F3;  overflow-x: hidden;">
    <center>
            <table id="tabel" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class="center">No.</th>
                    <th class="center">Tekanan</th>
                    <th class="center">Update Terakhir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($data as $rows) {
                $no++;?>
                    <tr>
                        <td><center><?php echo $no; ?></center></td>
                        <td><?php echo $rows['tekanan']; ?> bar</td>
                        <td><?php echo $rows['waktu']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</body>
</html>
