<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    require_once("control/config.php");
    
    if (isset($_SESSION['user'])) {
        header('Location: index.php');
    }
    
    if (isset($_POST['login'])) {
        $errors = array();
        $required = array('username', 'password');
        $user = addslashes($_POST['username']);
        $pass = md5(addslashes($_POST['password']));
        
        foreach($required as $name) {
            if (!isset($_POST[$name]) || empty($_POST[$name])) {
                $errors[] = "The <strong> {$name} </strong> was left blank. ";
            }
        }
        
        if (empty($errors)) {
            $query = mysql_query("SELECT user, pass FROM admin WHERE user='$user' and pass='$pass'");
            
            if (mysql_num_rows($query) == 1) {
                while($row = mysql_fetch_array($query)) {
                    $_SESSION['user'] = $row['user'];
                    header('Location: index.php');
                }
            } else {
                $errors[] = "The username and password do not match those on file";
            }
        }
        
        
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen" type="text/css">
    <link href="assets/css/login.css" rel="stylesheet" media="screen" type="text/css">

    <script type="text/javascript" src="assets/js/login.js"></script>
</head>
<body>
	
<section id="login">
    <div class="container">
      <div class="row">
          <div class="col-xs-12">
              <div class="form-wrap">
                <h1>Log in with admin account</h1>
                    <form role="form" action="login.php" method="post" id="login-form" name="login">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div >
                          <?php
                            if (!empty($errors)) {
                              foreach($errors as $error)  {
                                echo "<ul>";
                                echo "<li>$error</li>";
                                echo "</ul>";
                              }
                            }
                          ?>
                        </div>
                        <input type="submit" name="login" id="btn-login" class="btn btn-custom btn-lg btn-block" value="login">
                    </form>
                    <hr>
              </div>
        </div> <!-- /.col-xs-12 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
</body>
</html>