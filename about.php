<?php
session_start();

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
$user=$_SESSION['username'];
$query="SELECT*FROM verifieduser WHERE email='$user'";
    $run=mysqli_query($conn,$query);
while($row=$run->fetch_assoc()){
    $ret=$row['password'];
    $fname=$row['firstname'];
    $lname=$row['lastname'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];
    $gender=$row['gender'];
    $birthday=$row['birthday'];
    $code=$row['code'];
    if($row['image']!='-'){
       $image='uploads/'.$row['image'];
    }
    else{
        $image='lilly.jpg'; 
    }
    $uid=$row['uid'];
}
if($uid=="on"){
if(password_verify($_SESSION['password'],$ret)){
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
			        <li><a href="lilly.php"><i class="glyphicon glyphicon-home"></i>&nbspHome</a></li>
			        <li><a href="message.php"><i class="fa fa-comments"></i>&nbspchat</a></li>
			        <li><a href="friend.php"><i class="fa fa-users"></i>&nbspFriends</a></li>
			        <li class="active"><a href="about.php"><i class="fa fa-align-justify"></i>&nbspAbout</a></li>
		        </ul>
		   </center>
		    </div>
		    <div id="profile" class="panel-group">
		        <div class="panel panel-primary">
                    <div class="panel-heading">
                        <center><h3 style="text-transform:capitalize">My Profile</h3>
                        <button id="setting" data-toggle="collapse" data-target="#my" class="btn btn-info"><i class="fa fa-database"></i></button>
                        <div id="my" class="collapse">
                            <br><a href="uploadimg.php"><button class="btn btn-warning" style="width:100%">Update</button></a><br><br>
                            <button id="logout" class="btn btn-success" style="width:100%" onclick="logout()">Log out</button><br><br>
                            <script>
                            function logout(){
		            if(confirm("Are you sure")){
		                location.href="logout.php";
		            }
		           }
                            </script>
                            <button data-toggle="collapse" data-target="#r" class="btn btn-danger" style="width:100%">Delete Account</button>
                           <div id="r" class="collapse"><br> <form action="delete.php" method="post">
                            <input type="hidden" value='.$user.' name="email"><button type="submit" name="delete" class="btn btn-danger">Yes</button></form><br>
                            <button type="submit" name="delete" class="btn btn-success" onclick="no()">No</button></div>
                        </div>

		            <script>
		            function no(){
		                location.href="about.php";
		            }
		           </script>
                        </center>
                    </div>
                    <div class="panel-body"><blockquote class="bg-danger"><center>
                        <a href='.$image.'><image src='.$image.' class="img-rounded" width="100px" height="100px"></a>
		                <p style="text-transform:capitalize;color:black;font-weight:bold">'.$fname.' '.$lname.'</p></center></blockquote>  
		                <div class="panel-body bg-info">
    		                <blockquote class="bg-warning">
    		                <p style="color:grey"><i class="glyphicon glyphicon-envelope"></i>&nbspEmail-Id:'.$email.'</p>
    		                <p style="color:grey"><i class="glyphicon glyphicon-home"></i>&nbspAddress: '.$address.'</p>
    		                <p style="color:grey"><i class="glyphicon glyphicon-earphone"></i>&nbspContacts: '.$phone.'</p>
    		                <p style="color:grey"><i class="glyphicon glyphicon-user"></i>&nbspGender: '.$gender.'</p>
    		                <p style="color:grey"><i class="glyphicon glyphicon-calendar"></i>&nbspBirthday: '.$birthday.'</p>
    		                <p style="color:grey"><i class="fa fa-users"></i>&nbspNumber of Freinds: 0</p></blockquote></div>
		                </div>
		           </div>
		       </div>
		  </div>
        </div>  
        </body>
        </html>';
}
}else{header("Location:index.php");};
?>
