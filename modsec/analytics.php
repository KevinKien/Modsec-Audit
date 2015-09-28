<?php 
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    require_once("control/config.php");
    if (isset($_SESSION['user'])) {
    } else {
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Modsec Audit</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen" type="text/css">
  <link href="assets/css/bootstrap-table.css" rel="stylesheet" media="screen" type="text/css">
  <link href="assets/css/styles.css" rel="stylesheet" media="screen" type="text/css">
  <link href="assets/css/bootstrap-table.css" rel="stylesheet" media="screen" type="text/css">

</head>
<body>

<?php include "views/navbar.php"; ?>

<div class="container-fluid">
      
      <div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
              <li class="active"><a href="index.php">Dashboard</a></li>
              <li><a href="analytics.php">Analytics</a></li>
              <li><a href="#">Rules</a></li>
            </ul>
            
        </div><!--/span-->
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
        <h1 class="page-header">
            Analytics
        </h1>
        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Date/Time  </th>
                  <th>SourceIP/Port</th>
                  <th>Method</th>
                  <th>Path</th>
                  <th>Message</th>
                </tr>
              </thead>
              <?php
                $sl= mysql_query("select a.AuditLogUniqueID,a.AuditLogDate,a.AuditLogTime,a.SourceIP,a.SourcePort,a.HttpMethod,a.Uri,a.QueryString,b.Msg from audit_log a, alerts b where a.AuditLogUniqueID = b.AuditLogUniqueID");
                while($row = mysql_fetch_array($sl)) {
              ?>
                <tr>
                    <td><?php echo $row['AuditLogUniqueID']?></td>
                    <td><?php echo $row['AuditLogDate'] ."</br>". $row['AuditLogTime'] ?></td>
                    <td><?php echo $row['SourceIP'] ."</br>". $row['SourcePort']?></td>
                    <td><?php echo $row['HttpMethod']?></td>
                    <td><?php echo $row['Uri'] ."</br>". $row['QueryString']?></td>
                    <td><?php echo $row['Msg']?></td>
                </tr>

              <?php } ?>
            </table>
          </div>
      </div><!--/row-->
  </div>
</div><!--/.container-->
</body>
</html>