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
			<!--fontawesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="bg-warning">
        <div class="heading bg-primary">
			<center><h1 class="head">lilly</h1>
			<p>A Chat Room</p></center>
		</div>  
        <div class="container">
            <div id="topbar" class="bg-info" style="margin-top:-2%">
            <center>
                <ul class="pagination" style="margin-bottom:-0.0%">
			       <li><a href="#"><i class="fa fa-list-alt"></i>&nbspGive Details</a></li>
			        <li><a href="#"><i class="fa fa-comment"></i>&nbspGet OTP</a></li>
			        <li class="active"><a href="#"><i class="fa fa-user"></i>&nbspActivate</a></li>
			        <li><a href="index.php"><i class="fa fa-r"></i>&nbspGo Back To Login</a></li>
		        </ul>
		   </center>
		    </div>
            <center>
          <div id="row1" class="row bg-success">
              <div class="otp" id="otp">
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
                    if(isset($_POST['otpsubmit'])){
                        $otp=$_POST['otp'];
                        $email=$_POST['email'];
                    }
                    $query = "SELECT otp FROM user WHERE email='$email'";
                    $result=mysqli_query($conn, $query);
                    if($result){
                        while($row=$result->fetch_assoc()){
                            $ret=$row['otp'];
                            if($ret==$otp){
                                echo '<p style="color:green">Your Account Is Verified</p>'."<br>";
                                $copy="INSERT INTO verifieduser(firstname,lastname,gender,birthday,email,password,phone,address,code) SELECT firstname,lastname,gender,birthday,email,password,phone,address,code FROM user WHERE otp='$otp'";
                                $actn=mysqli_query($conn,$copy);
                                $up="UPDATE verifieduser SET image='-',friend='-',send='-',verifiedfriend='-',reply='-',recieve='-' WHERE email='$email'";
                                $ac=mysqli_query($conn,$up);
                                if($actn){
                                    echo "Go to Login page"."<br>";
                                    echo '<a href="index.php"><button class="btn-primary" style="width:200px">Log in</button></a>';
                                }
                            }
                            else{ 
                                echo "You Have Entered Wrong OTP"."<br>";
                                echo "Go to Sign Up page"."<br>";
                                echo '<a href="signup.php"><button class="btn-danger" style="width:200px">Send OTP</button></a>';
                            }
                        } 
                        echo '<p style="color:blue">NOTE:Dont Go Back</p>';
                        $delete="DELETE FROM user WHERE email='$email'";
                        $action=mysqli_query($conn,$delete);
                    }
                    mysqli_close($conn);
                    ?>
			  </div>
		  </div>
		    </center>
        </div>
    </body>
</html>
