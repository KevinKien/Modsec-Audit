<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Modsec Audit</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li> <a href="">
              <strong>Welcome: </strong> 
                <?php 
                  echo "" .$_SESSION['user']. "";
                ?>
              </a>
            </li>
            <li><a href="views/logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
</nav>