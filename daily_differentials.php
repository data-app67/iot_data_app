<?php

include_once 'server_side\scripts\navbar.php';

include_once 'server_side\scripts\fetch_differentials.php';

?>

<html>
<head>
  <title>Daily Differentials</title>
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
   <h3 align="center">Daily Differentials</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">Data</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="sample_data" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>Date</th>
         <th>Parameter</th>
         <th>Value</th>
         <th>Diff</th>
        </tr>
       </thead>
       <tbody>
       
        <?php
        foreach ($differentialsParameter as $data3 ) {
           
                echo "<tr>
                <td>{$differentialsParameter[$data3['Date']]['Date']}</td>
                <td></td>
                <td></td>
                <td></td>
               </tr>";
            
           
        }
        ?>

       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  <br />
  <br />
 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function() {
    $('#sample_data').DataTable({
        "processing" : true,
        //"serverSide" : true,
    });
} );

</script>
