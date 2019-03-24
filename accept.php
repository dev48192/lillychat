<?php
session_start();
if(isset($_POST['request'])){
$me=$_POST['me'];
$email=$_POST['email'];


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
$query="SELECT*FROM verifieduser WHERE email='$email'";
$run=mysqli_query($conn,$query);
while($row=$run->fetch_assoc()){
    $fname=$row['firstname'];
    $psw=$row['password'];
    $lname=$row['lastname'];
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
$friend=$row['friend'];
if(password_verify($_SESSION['password'],$psw)){
echo '<!DOCTYPE html>
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
			       <li><a href="lilly.php"><i class="glyphicon glyphicon-home"></i>&nbspHome</a></li>
			        <li><a href="message.php"><i class="fa fa-comments"></i>&nbspchat</a></li>
			        <li><a href="friend.php"><i class="fa fa-users"></i>&nbspFriends</a></li>
			        <li><a href="about.php"><i class="fa fa-align-justify"></i>&nbspAbout</a></li>
		        </ul>
		   </center>
		    </div>
            <center>
          <div class="bg-success"><br>
            <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">
            <h3 style="text-transform:capitalize">'.$fname.'&nbsp'.$lname.'</h3>
            </div>
            <div class="panel-body bg-info">
            <blockquote class="bg-danger">
            <a href='.$image.'><image src='.$image.' class="img-rounded" width="100px" height="100px"></a></blockquote></div>
            <div class="panel-body bg-info">';
            echo '<form action=" " method="post">
            <input type="hidden" name="email" value='.$email.'>
            <input type="hidden" name="me" value='.$me.'>
            <button type="submit" name="send" class="btn btn-success">Accept</button>
            </form><br>';
           echo '<p style="background-color:#5bc0de;color:grey;font-family:Arial;text-align:left">
           <blockquote class="bg-success" style="text-align:left;color:grey">
            <i class="glyphicon glyphicon-envelope"></i>&nbsp'.$email.'<br>
            <i class="glyphicon glyphicon-home"></i>&nbsp'.$address.'<br>
            <i class="glyphicon glyphicon-calendar"></i>&nbsp'.$birthday.'</blockquote>
             <form action=" " method="post">
            <input type="hidden" name="email" value='.$email.'>
            <input type="hidden" name="me" value='.$me.'>
            <button type="submit" name="delete" class="btn btn-danger">Decline</button>
            </form>
            </p>
            </div>';
            
         echo '</div></div></div>
        </div>
    </body>
</html>';}
}
if(isset($_POST['send'])){
$me=$_POST['me'];
$email=$_POST['email'];

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
$query="SELECT*FROM verifieduser WHERE email='$email'";
$run=mysqli_query($conn,$query);
while($row=$run->fetch_assoc()){
    $id=$row['id'];
    $fname=$row['firstname'];
    $psw=$row['password'];
    $lname=$row['lastname'];
    $address=$row['address'];
    $gender=$row['gender'];
    $birthday=$row['birthday'];
    $code=$row['code'];
    $friend=$row['verifiedfriend'];
    if($row['image']!='-'){
         $image='uploads/'.$row['image'];
    }
    else{
        $image='lilly.jpg'; 
    }
    $send=$row['send'];
}
$query2="SELECT*FROM verifieduser WHERE email='$me'";
$run2=mysqli_query($conn,$query2);
while($row2=$run2->fetch_assoc()){
    $id2=$row2['id'];
    $fname2=$row2['firstname'];
    $psw2=$row2['password'];
    $lname2=$row2['lastname'];
    $address2=$row2['address'];
    $gender2=$row2['gender'];
    $birthday2=$row2['birthday'];
    $code2=$row2['code'];
    $req=$row2['friend'];
    $friend2=$row2['verifiedfriend'];
    if($row2['image']!='-'){
         $image2='uploads/'.$row2['image'];
    }
    else{
        $image2='lilly.jpg'; 
    }
}
$a=explode(",",$req);
for($i=0;$i<count($a);$i++){if($a[$i]==$id){unset($a[$i]);}}
if(count($a)!=0){$d=implode(",",$a);}else{$d="-";}
$s="UPDATE verifieduser SET friend='$d' WHERE email='$me'";
mysqli_query($conn,$s);
$b=explode(",",$send);
for($i=0;$i<count($b);$i++){if($b[$i]==$id2){unset($b[$i]);}}
if(count($b)!=0){$e=implode(",",$b);}else{$e="-";}
$t="UPDATE verifieduser SET send='$e' WHERE email='$email'";
mysqli_query($conn,$t);
echo '<!DOCTYPE html>
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
			       <li><a href="lilly.php"><i class="glyphicon glyphicon-home"></i>&nbspHome</a></li>
			        <li><a href="message.php"><i class="fa fa-comments"></i>&nbspchat</a></li>
			        <li><a href="friend.php"><i class="fa fa-users"></i>&nbspFriends</a></li>
			        <li><a href="about.php"><i class="fa fa-align-justify"></i>&nbspAbout</a></li>
		        </ul>
		   </center>
		    </div>
            <center>
          <div class="bg-success"><br>
            <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">
            <h3 style="text-transform:capitalize">'.$fname.'&nbsp'.$lname.'</h3>
            </div>
            <div class="panel-body bg-info">
            <blockquote class="bg-danger">
            <a href='.$image.'><image src='.$image.' class="img-rounded" width="100px" height="100px"></a></blockquote></div>
            <div class="panel-body bg-info">';
            echo '<span class="bg-primary" style="padding:1%;border:1px solid black"><i class="glyphicon glyphicon-friend"></i>Friend</span><br><br>';
           echo '<p style="background-color:#5bc0de;color:grey;font-family:Arial;text-align:left">
           <blockquote class="bg-success" style="text-align:left;color:grey">
            <i class="glyphicon glyphicon-envelope"></i>&nbsp'.$email.'<br>
            <i class="glyphicon glyphicon-home"></i>&nbsp'.$address.'<br>
            <i class="glyphicon glyphicon-calendar"></i>&nbsp'.$birthday.'</blockquote></p>
            </div>';
            
         echo '</div></div></div>
        </div>
    </body>
</html>';
if($friend=="-"){
    $sql="UPDATE verifieduser SET verifiedfriend='$id2' WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
}
else{
    $r2=array();;
    $r2[]=$friend;
    $r2[]=$id2;
    $p=implode(",",$r2);
    $sql="UPDATE verifieduser SET verifiedfriend='$p' WHERE email='$email'";
    mysqli_query($conn,$sql);
}
if($friend2=="-"){
    $sql2="UPDATE verifieduser SET verifiedfriend='$id' WHERE email='$me'";
    mysqli_query($conn,$sql2);
}
else{
    $r1=array();
    $r1[]=$friend2;
    $r1[]=$id;
    $p1=implode(",",$r1);
    $sql2="UPDATE verifieduser SET verifiedfriend='$p1' WHERE email='$me'";
    mysqli_query($conn,$sql2);
}
}
if(isset($_POST['delete'])){
  $me=$_POST['me'];
$email=$_POST['email'];

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
$query="SELECT*FROM verifieduser WHERE email='$email'";
$run=mysqli_query($conn,$query);
while($row=$run->fetch_assoc()){
    $id=$row['id'];
    $fname=$row['firstname'];
    $psw=$row['password'];
    $lname=$row['lastname'];
    $address=$row['address'];
    $gender=$row['gender'];
    $birthday=$row['birthday'];
    $code=$row['code'];
    $friend=$row['verifiedfriend'];
    $send=$row['send'];
    if($row['image']!='-'){
         $image='uploads/'.$row['image'];
    }
    else{
        $image='lilly.jpg'; 
    }
}
$query2="SELECT*FROM verifieduser WHERE email='$me'";
$run2=mysqli_query($conn,$query2);
while($row2=$run2->fetch_assoc()){
    $id2=$row2['id'];
    $fname2=$row2['firstname'];
    $psw2=$row2['password'];
    $lname2=$row2['lastname'];
    $address2=$row2['address'];
    $gender2=$row2['gender'];
    $birthday2=$row2['birthday'];
    $code2=$row2['code'];
    $req=$row2['friend'];
    $friend2=$row2['verifiedfriend'];
    if($row2['image']!='-'){
         $image2='uploads/'.$row2['image'];
    }
    else{
        $image2='lilly.jpg'; 
    }
}
$a=explode(",",$req);
for($i=0;$i<count($a);$i++){if($a[$i]==$id){unset($a[$i]);}}
if(count($a)!=0){$d=implode(",",$a);}else{$d="-";}
$s="UPDATE verifieduser SET friend='$d' WHERE email='$me'";
mysqli_query($conn,$s);
$b=explode(",",$send);
for($i=0;$i<count($b);$i++){if($b[$i]==$id2){unset($b[$i]);}}
if(count($b)!=0){$e=implode(",",$b);}else{$e="-";}
$t="UPDATE verifieduser SET send='$e' WHERE email='$email'";
mysqli_query($conn,$t); 
echo '<!DOCTYPE html>
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
			       <li><a href="lilly.php"><i class="glyphicon glyphicon-home"></i>&nbspHome</a></li>
			        <li><a href="message.php"><i class="fa fa-comments"></i>&nbspchat</a></li>
			        <li><a href="friend.php"><i class="fa fa-users"></i>&nbspFriends</a></li>
			        <li><a href="about.php"><i class="fa fa-align-justify"></i>&nbspAbout</a></li>
		        </ul>
		   </center>
		    </div>
            <center>
          <div class="bg-success"><br>
            <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">
            <h3 style="text-transform:capitalize">'.$fname.'&nbsp'.$lname.'</h3>
            </div>
            <div class="panel-body bg-info">
            <blockquote class="bg-danger">
            <a href='.$image.'><image src='.$image.' class="img-rounded" width="100px" height="100px"></a></blockquote></div>
            <div class="panel-body bg-info">';
            $c=0;
            if($c==0){
           echo '<form action="request.php" method="post">
            <input type="hidden" name="email" value='.$email.'>
            <input type="hidden" name="me" value='.$me.'>
            <button type="submit" name="send" class="btn btn-success">Request</button>
            </form>';}
           echo '<p style="background-color:#5bc0de;color:grey;font-family:Arial;text-align:left">
           <blockquote class="bg-success" style="text-align:left;color:grey">
            <i class="glyphicon glyphicon-envelope"></i>&nbsp'.$email.'<br>
            <i class="glyphicon glyphicon-home"></i>&nbsp'.$address.'<br>
            <i class="glyphicon glyphicon-calendar"></i>&nbsp'.$birthday.'</blockquote></p>
            </div>';
            
         echo '</div></div></div>
        </div>
    </body>
</html>';
}
?>
