<!DOCTYPE html>
<html>
    <head>
        <title>Lilly|confirmation</title>
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
        <div class="container">
            <center>
          <div id="row1" class="row bg-success">
             <?php
                $servername = "localhost";
                $username = "id5846261_root";
                $password = "dev48192";
                $dbname = "id5846261_users";
                
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                if(isset($_POST['delete'])){
                    $email=$_POST['email'];
                    $query="DELETE FROM verifieduser WHERE email='$email'";
                    $result=mysqli_query($conn,$query);
                    if($result){
                    echo '<a href="signup.php"><button class="btn-success" style="width:200px">Go To</button></a>';
                    }
                }
             ?>
          </div>
            </center>
        </div>
    </body>
    </html>
