<?php
echo '<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <meta charset="utf-8">
        <!-- Responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- css file -->
		<link rel="stylesheet" href="help.css">
		<!--fontslilly-->
		<link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">
		<!--fontslogin-->
		<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    </head>
    <body class="bg-warning">
        <div class="heading bg-primary">
			<center><h1 class="head">lilly</h1>
			<p>A Chat Room</p></center>
		</div>  
        <div class="container">';
            echo '<center>
          <div id="row1" class="row bg-success">
				<p class="login">Log in to Lilly</p>
				<form action="lilly.php" method="post">
				<input type="email" name="username" placeholder="Email-Id" required><br><br>
				<input type="password" name="password" placeholder="Password" required><br><br>
				<input type="submit" name="submit" class="btn btn-primary" value="Log in"><br><br>
				</form>
				<center><p style="color:grey;">Or<p></center>
				<div class="signup" style="text-align:center;width=200px"><a href="signup.php"><button class="btn-success">Create New Account</button></a></div>
		  </div>
		    </center>
        </div>
    </body>
</html>';
?>
