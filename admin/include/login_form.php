<?php
$username = "";
if (isset($_POST['username'])) {
   $username = $_POST['username'];
}
?>
<html>
<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8">

   <title>login ~ Butterfly Oils</title>
   <link rel="stylesheet" href="css/login.css" type="text/css" media="screen" charset="utf-8">
   
</head>
   <body>
   <div id="login">
      <p>Admin Login for:<img src="../img/logo.png" /><p>
      <?php if ($username != "") { echo '<p id="error">Sorry wrong username or password.</p>'; } ?>
         <form action="login.php" method="post" accept-charset="utf-8">
            <p>Username: <input type="text" name="username" value="<?php echo $username; ?>"></p>
            <p>Password: <input type="password" name="password" value=""></p>
            <p><input type="submit" value="Login &rarr;"></p>
         </form>
         <p><a href="../">Return to the main site</a></p>
   </div>
   </body>
</html>
