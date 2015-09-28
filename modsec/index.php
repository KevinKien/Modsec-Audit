<?php 
    session_start();
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
  <link href="assets/css/styles.css" rel="stylesheet" media="screen" type="text/css">
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src = "http://canvasjs.com/wp-content/themes/bootstrap_child/assets/js/jquery-1.8.3.min.js"> </script>
  <script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src="assets/js/SourceIP.js"></script>
  <script src="assets/js/getURI.js"></script>
  <script src="assets/js/RuleID.js"></script>
  <script src="assets/js/HttpMethod.js"></script>
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
          
          <h1 class="page-header">
            Dashboard
          </h1>

          <div class="row placeholders">
            <div class="col-sm-6 placeholder text-center">
              <h4>Top SourceIP Last 24 Hours</h4>
              <div id="chartContainer1" style="height: 250px;"></div>

            </div>
            <div class="col-sm-6 placeholder text-center">
              <h4>Top URI Last 24 Hours</h4>
              <div id="chartContainer2" style="height: 250px;"></div>
              
            </div>
            <div class="col-sm-6 placeholder text-center">
              <h4>Top Rule ID Last 24 Hours</h4>
              <div id="chartContainer3" style="height: 250px;"></div>
            </div>
            <div class="col-sm-6 placeholder text-center">
              <h4>Top Method Last 24 Hours</h4>
              <div id="chartContainer4" style="height: 250px;"></div>
            </div>
          </div>
          <hr>

        </div>
      </div>
</div><!--/.container-->
</body>
</html>