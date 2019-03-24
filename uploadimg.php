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
    if($row['image']){
       $image='uploads/'.$row['image'];
    }
    else{
        $image='lilly.jpg'; 
    }
}
if(password_verify($_SESSION["password"],$ret)){
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
        <div class="container">
            <div id="topbar" class="bg-info" style="margin-top:-2%">
            <center>
                <ul class="pagination" style="margin-bottom:-0.0%">
			        <li><a href="lilly.php"><i class="glyphicon glyphicon-home"></i>&nbspHome</a></li>
			        <li><a href="message.php"><i class="fa fa-comments"></i>&nbspchat</a></li>
			        <li><a href="friend.php"><i class="fa fa-users"></i>&nbspFriends</a></li>
			        <li><a href="about.php"><i class="fa fa-align-justify"></i>&nbspAbout</a></li>
		        </ul>
		   </center>
		    </div>
            <div class="bg-success"><br>
                <center>
                <form action=" " method="post" enctype="multipart/form-data">
                    <input type="file" name="image" class="btn-warning" style="width:80%"><br>
                    <input type="submit" name="submit" class="btn-success">
                    <input type="reset" class="btn-info"><br><br>
                </form>
                </center>
            </div>
            <div>
                <br>';
                
                    if(isset($_POST['submit'])){
                        $image=$_FILES['image']['name'];
                        $target_dir="uploads/";
                        $target_file=$target_dir.basename($_FILES["image"]["name"]);
                        $imagefiletype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $file=$email.'.'.$imagefiletype;
                        $extension_arr=array("jpg","jpeg");
                        if(in_array($imagefiletype,$extension_arr)){
                           $sql="UPDATE verifieduser SET image='$file' WHERE email='$user'";
                           $result=mysqli_query($conn,$sql);
                           move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$file);
                        }
                    }
                
            echo'</div>
        </div>
        </body>
</html>';}
?>
