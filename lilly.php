<?php
session_start();
$_SESSION['uid']="on";
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
        <body class="bg-warning">';
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query2="UPDATE verifieduser SET uid='on' WHERE email='$username'";
    $run2=mysqli_query($conn,$query2);
    
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $query="SELECT*FROM verifieduser WHERE email='$username'";
    $run=mysqli_query($conn,$query);
if(mysqli_num_rows($run)!=0){
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
    $request=$row['friend'];
    if($row['image']!='-'){
       $image='uploads/'.$row['image'];
    }
    else{
        $image='lilly.jpg'; 
    }
}
    if(password_verify($password,$ret)){
        echo '
        
        <div class="heading bg-primary">
			<center><h1 class="head">lilly</h1>
			<p>A Chat Room</p></center>
		</div>  
        <div class="container">
            <div id="topbar" class="bg-info" style="margin-top:-2%">
            <center>
                <ul class="pagination" style="margin-bottom:-0.0%">
			        <li class="active"><a href="lilly.php"><i class="glyphicon glyphicon-home"></i>&nbspHome</a></li>
			        <li><a href="message.php"><i class="fa fa-comments"></i>&nbspchat</a></li>
			        <li><a href="friend.php"><i class="fa fa-users"></i>&nbspFriends</a></li>
			        <li><a href="about.php"><i class="fa fa-align-justify"></i>&nbspAbout</a></li>
		        </ul>
		   </center>
		    </div>';
		if($request!="-"){
		$friendrequest=explode(",",$request);
		echo '<center><div class="alert alert-danger">Waiting For Your Response<br><div class="panel-group" style="width:95%"><div class="panel panel-primary"><div class="panel-heading">Friend Requests</div>';
		foreach($friendrequest as $p){
		                $sql="SELECT*FROM verifieduser WHERE id='$p'";
		                $result=mysqli_query($conn,$sql);
                        $count=0;
                        while($row=$result->fetch_assoc()){
                            $count++;
                            $fname1=$row['firstname'];
                            $lname1=$row['lastname'];
                            $email1=$row['email'];
                            $address1=$row['address'];
                            $gende1r=$row['gender'];
                            $birthday1=$row['birthday'];
                            $code=$row['code'];
                            if($row['image']!='-'){
                               $image1='uploads/'.$row['image'];
                            }
                            else{
                                $image1='lilly.jpg'; 
                            }
                                
                                     echo '<div class="panel-body" style="text-align:left">
                                    <form action="accept.php" method="post">
                                    <input type="hidden" name="me" value='.$email.'>
                                    <input type="hidden" name="email" value='.$email1.'>
                                    <button type="submit" name="request" class="btn-info" style="color:white;width:100%;text-align:left">
                                    <p style="text-transform:capitalize;color:white;font-family:Arial">
                                    <a href='.$image1.'><img src='.$image1.' class="img-thumbnail" width="64px" height="40px"></a>
                                    <i class="glyphicon glyphicon-user"></i>&nbsp'.$fname1.' '.$lname1.' <span class="pull-right"><span class="glyphicon glyphicon-user"></span></span>
                                    </p></button></form>
                                    </div>
                                    ';}}}echo'</center>';
                        if(date("Y-m-d")==$code){
                            
                            echo '<center><div class="alert alert-danger alert-dismissable"><a class="close" data-dismiss="alert" href="#"><i class="fa fa-times"></i></a>
                                    <div class="bg-info">
                                    <a href='.$image.'><img src='.$image.' class="img-rounded" width="100px" height="100px"></a>
                                    <p>Hii</p><p style="text-transform:capitalize">'.$fname.'&nbsp '.$lname.'</p>
                                    You are now become lilly user.Lets Make friends.And make a connection to the outer world.<br>
                                   <p style="color:blue;text-align:left"> ~from:</p>
                                    <pre class="bg-info" style="text-align:left;font-family:Arial"><img src="https://scontent.frdp1-1.fna.fbcdn.net/v/t1.0-9/28577396_2040324519590256_5288830127586601755_n.jpg?_nc_cat=0&oh=663bee82d5000fd83d445818435a13ae&oe=5BDE4AAA" width="50px" height="50px"> Buddhadeb Das</pre>
                                    </div>
                            </div></center>';}
       echo '</div>  
        </body>
        </html>';
    }
     else{
         echo '<div class="container"><center><div class="alert alert-danger">You have Entered Wrong Password!!!<br>
        <a href="index.php"><button class="btn btn-primary">Go to Log in</button></a><br><br>
        <a href="signup.php"><button class="btn btn-success">Create an Account</button></a></div></center></div></body></html>';
    }
}
    else{
        echo '<div class="container"><center><div class="alert alert-danger">No such User-Id exixts!!!<br>
        <a href="index.php"><button class="btn btn-primary">Go to Log in</button></a><br><br>
        <a href="signup.php"><button class="btn btn-success">Create an Account</button></a></div></center></div></body></html>';
       
    }
}
else{
    if($_SESSION['uid']=="on"){
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
}
if(password_verify($_SESSION['password'],$ret)){
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
    $request=$row['friend'];
    if($row['image']!='-'){
       $image='uploads/'.$row['image'];
    }
    else{
        $image='lilly.jpg'; 
    }
}
       echo '
        <!DOCTYPE html>
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
			        <li class="active"><a href="lilly.php"><i class="glyphicon glyphicon-home"></i>&nbspHome</a></li>
			        <li><a href="message.php"><i class="fa fa-comments"></i>&nbspchat</a></li>
			        <li><a href="friend.php"><i class="fa fa-users"></i>&nbspFriends</a></li>
			        <li><a href="about.php"><i class="fa fa-align-justify"></i>&nbspAbout</a></li>
		        </ul>
		   </center>
		    </div>';
		if($request!="-"){
		$friendrequest=explode(",",$request);
		echo '<center><div class="alert alert-danger">Waiting For Your Response<br><div class="panel-group" style="width:95%"><div class="panel panel-primary"><div class="panel-heading">Friend Requests</div>';
		foreach($friendrequest as $p){
		                $sql="SELECT*FROM verifieduser WHERE id='$p'";
		                $result=mysqli_query($conn,$sql);
                        $count=0;
                        while($row=$result->fetch_assoc()){
                            $count++;
                            $fname1=$row['firstname'];
                            $lname1=$row['lastname'];
                            $email1=$row['email'];
                            $address1=$row['address'];
                            $gende1r=$row['gender'];
                            $birthday1=$row['birthday'];
                            $code=$row['code'];
                            if($row['image']!='-'){
                               $image1='uploads/'.$row['image'];
                            }
                            else{
                                $image1='lilly.jpg'; 
                            }
                                
                                     echo '<div class="panel-body" style="text-align:left">
                                    <form action="accept.php" method="post">
                                    <input type="hidden" name="me" value='.$email.'>
                                    <input type="hidden" name="email" value='.$email1.'>
                                    <button type="submit" name="request" class="btn-info" style="color:white;width:100%;text-align:left">
                                    <p style="text-transform:capitalize;color:white;font-family:Arial">
                                    <a href='.$image1.'><img src='.$image1.' class="img-thumbnail" width="64px" height="40px"></a>
                                    <i class="glyphicon glyphicon-user"></i>&nbsp'.$fname1.' '.$lname1.' <span class="pull-right"><span class="glyphicon glyphicon-user"></span></span>
                                    </p></button></form>
                                    </div>
                                    ';}}}echo'</center>';
                        if(date("Y-m-d")==$code){
                            
                            echo '<center><div class="alert alert-danger alert-dismissable"><a class="close" data-dismiss="alert" href="#"><i class="fa fa-times"></i></a>
                                    <div class="bg-info">
                                    <a href='.$image.'><img src='.$image.' class="img-rounded" width="100px" height="100px"></a>
                                    <p>Hii</p><p style="text-transform:capitalize">'.$fname.'&nbsp '.$lname.'</p>
                                    You are now become lilly user.Lets Make friends.And make a connection to the outer world.<br>
                                   <p style="color:blue;text-align:left"> ~from:</p>
                                    <pre class="bg-info" style="text-align:left;font-family:Arial"><img src="https://scontent.frdp1-1.fna.fbcdn.net/v/t1.0-9/28577396_2040324519590256_5288830127586601755_n.jpg?_nc_cat=0&oh=663bee82d5000fd83d445818435a13ae&oe=5BDE4AAA" width="50px" height="50px"> Buddhadeb Das</pre>
                                    </div>
                            </div></center>';}
       echo '</div>  
        </body>
        </html>';
    } 

}}
?>
