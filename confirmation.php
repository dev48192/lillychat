
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
			        <li class="active"><a href="#"><i class="fa fa-comment"></i>&nbspGet OTP</a></li>
			        <li><a href="#"><i class="fa fa-user"></i>&nbspActivate</a></li>
			        <li><a href="index.php"><i class="fa fa-r"></i>&nbspGo Back to Login</a></li>
		        </ul>
		   </center>
		    </div>
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
if(isset($_POST['submit'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $date=$_POST['date'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $hash=password_hash($password,PASSWORD_DEFAULT);
    $phone=$_POST['phone'];
    $code=date("Y-m-d");
    $randno=rand(1000,9999);
}
$ask2="SELECT email FROM user";
$counter=0;
$search2=mysqli_query($conn,$ask2);
while($c2=$search2->fetch_assoc()){
    $counter++;
}
if($counter>0){
    $delete2="DELETE FROM user WHERE email='$email'";
    $action2=mysqli_query($conn,$delete2);
}
$ask="SELECT email FROM verifieduser";
$count=0;
$search=mysqli_query($conn,$ask);
while($c=$search->fetch_assoc()){
    if($c['email']==$email){
    $count++;
    }
}
if($count==0){
    $sql = "INSERT INTO user (firstname, lastname,gender,birthday,email,password,phone,address,code,otp)
    VALUES ('$firstname', '$lastname','$gender','$date', '$email','$hash','$phone','$address','$code','$randno')";
    //emai sender
    $to=$email;
    $subject="confirmation";
    $message2='<a href="activate.php">click to go</a>';
    $message='your one-time-password is '.$randno.'';
    $header="From:dev48192@gmail.com\r\n";
    $header.="MIME-VERSION:1.0\r\n";
    $header.="Content-type:text/html\r\n";
    mail($to,$subject,"$message",$header);
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    echo '<p class="confirmation">We Have Sent An OTP on Your Given Email Address</p>';
    echo '<p class="otp">OTP:</p>';
    echo '<form action="activate.php" method="post">';
    echo '<input type="email" name="email" value="'.$email.'" style="display:none">';
    echo '<input type="number" name="otp">';
    echo '<input type="submit" name="otpsubmit" class="btn-danger">';
    echo '</form>';
}
else{
    echo '<p style="color:red">You Alredy Have An Account</p>';
    echo '<p style="color:green">Go To Login Page</p>';
    echo '<a href="index.php"><button class="btn-primary" style="width:200px">Log in</button></a>';
    echo '<p style="color:grey">Or</p>';
    echo '<form action="delete.php" method="post">';
    echo '<input type="email" name="email" value="'.$email.'" style="display:none">';
    echo '<input type="submit" class="btn-success" name="delete" value="Create Another Account">';
    echo '</form>';
    $delete="DELETE FROM user WHERE email='$email'";
    $action=mysqli_query($conn,$delete);
}
mysqli_close($conn);
?>
		  </div>
		    </center>
        </div>
    </body>
</html>
