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
    $friend=$row['verifiedfriend'];
    $req=$row['friend'];
    $code=$row['code'];
    $uid=$row['uid'];
    if($row['image']!='-'){
       $image='uploads/'.$row['image'];
    }
    else{
        $image='lilly.jpg'; 
    }
}
if($uid=="on"){

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
			        <li class="active"><a href="friend.php"><i class="fa fa-users"></i>&nbspFriends</a></li>
			        <li><a href="about.php"><i class="fa fa-align-justify"></i>&nbspAbout</a></li>
		        </ul>
		   </center>
		    </div>
		    <div class="bg-success">
		        <form action=" " method="post">
            <div class="input-group">
                    <span class="input-group-addon" style="background-color:skyblue;border:1px black"><i class="glyphicon glyphicon-search"></i></span>
                    <input type="text" class="form-control" name="name" placeholder="Search For Friends">
            </div><br>
                <center><input type="submit" class="btn-success" name="search" value="Search" style="width:200px"></center>
                  </form>  
                 <div><br><br>';
                  
                    if(isset($_POST['search'])){
                        $name=explode(' ',$_POST['name']);
                        $sql="SELECT*FROM verifieduser WHERE firstname='$name[0]' AND lastname='$name[1]'";
                        $result=mysqli_query($conn,$sql);
                        $count=0;
                        echo '<center><div class="alert alert-info alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert">X</a><div class="panel-group" style="width:95%"><div class="panel panel-primary"><div class="panel-heading">Search Result</div>';
                        while($row=$result->fetch_assoc()){
                            $count++;
                            $fname=$row['firstname'];
                            $lname=$row['lastname'];
                            $email=$row['email'];
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
                                
                                     echo '<div class="panel-body" style="text-align:left">
                                    <div class="bg-info">
                                    <form action="request.php" method="post">
                                    <input type="hidden" name="me" value='.$user.'>
                                    <input type="hidden" name="email" value='.$email.'>
                                    <button type="submit" name="request" class="btn-info" style="color:white;width:100%;text-align:left">
                                    <p style="text-transform:capitalize;color:white;font-family:Arial">
                                    <a href='.$image.'><img src='.$image.' class="img-thumbnail" width="64px" height="40px"></a>
                                    <i class="glyphicon glyphicon-user"></i>&nbsp'.$fname.' '.$lname.' <span class="pull-right"><span class="glyphicon glyphicon-user"></span></span>
                                    </p></button></form>
                                    </div>
                                    </div>';
                        }
                        if($count==0){
                            echo '<div class="panel-body"><div class="alert alert-danger alert-dismissable">
                                <a class="close" data-dismiss="alert" href="#">X</a>
                                No Results</div></div>';
                        }
                        echo '<div class="panel-footer"><p style="color:red">'.$count.'&nbsp Results</p></div></div></div></div></center>';
                    }
                   $query1="SELECT verifiedfriend FROM verifieduser WHERE email='$user'";
                   $run=mysqli_query($conn,$query1);
                   while($r=$run->fetch_assoc()){$id=$r['verifiedfriend'];}
                        $fr=explode(",",$id);
                        echo '<div class="panel-group"><div class="panel panel-info"><div class="panel-heading"><center><p><b>FRIEND LIST</b></p></center></div>';
                        if($id!='-'){
                        foreach($fr as $i){
                    $query2="SELECT*FROM verifieduser WHERE id='$i'";
                    $result2=mysqli_query($conn,$query2);
                    while($ro=$result2->fetch_assoc()){
                        $fname=$ro['firstname'];
                        $lname=$ro['lastname'];
                        $email=$ro['email'];
                        if($ro['image']!='-'){
                               $image='uploads/'.$ro['image'];
                            }
                            else{
                                $image='lilly.jpg'; 
                            }
                       echo '<div class="panel-body" style="text-align:left">
                                    <div class="bg-info">
                                    <form action="request.php" method="post">
                                    <input type="hidden" name="me" value='.$user.'>
                                    <input type="hidden" name="email" value='.$email.'>
                                    <button type="submit" name="request" class="btn-info" style="color:white;width:100%;text-align:left">
                                    <p style="text-transform:capitalize;color:white;font-family:Arial">
                                    <a href='.$image.'><img src='.$image.' class="img-thumbnail" width="64px" height="40px"></a>
                                    <i class="glyphicon glyphicon-user"></i>&nbsp'.$fname.' '.$lname.' <span class="pull-right"><span class="glyphicon glyphicon-user"></span></span>
                                    </p></button></form>
                                    </div>
                                    </div>';
                    } 
                        }
                        }else{
                            echo'<div class="alert alert-warning alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert"><i class="fa fa-trash"></i></a>You have no friends in your friend list.Make friends!!!</div>';}echo'</div></div>';
                            
                    echo '<div class="panel-group"><div class="panel panel-danger"><div class="panel-heading">
                    <span class="pull-right"><button class="bg-danger"><i class="fa fa-list-alt"></i></button></span>
                    <center><p><b>LILLY USER</b></p></center></div>';
                    $query="SELECT*FROM verifieduser";
                    $result=mysqli_query($conn,$query);
                    while($row=$result->fetch_assoc()){
                        $fname=$row['firstname'];
                        $lname=$row['lastname'];
                        $email=$row['email'];
                        if($row['image']!='-'){
                               $image='uploads/'.$row['image'];
                            }
                            else{
                                $image='lilly.jpg'; 
                            }
                       if($email!=$user){ echo '<div class="panel-body" style="text-align:left">
                                    <div  class="bg-info">
                                    <form action="request.php" method="post">
                                    <input type="hidden" name="me" value='.$user.'>
                                    <input type="hidden" name="email" value='.$email.'>
                                    <button type="submit" name="request" class="btn-success" style="color:white;width:100%;text-align:left">
                                    <p style="text-transform:capitalize;color:white;font-family:Arial">
                                    <a href='.$image.'><img src='.$image.' class="img-thumbnail" width="64px" height="40px"></a>
                                    <i class="glyphicon glyphicon-user"></i>&nbsp'.$fname.' '.$lname.' <span class="pull-right"><span class="glyphicon glyphicon-user"></span></span>
                                    </p></button></form>
                                    </div>
                                    </div>';}
                    }
                    echo '</div></div>
               </div>     
            </div>
        </div>
		</body>
		</html>';}
?>
