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
    $id2=$row['id'];
    $fname=$row['firstname'];
    $lname=$row['lastname'];
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
    $reply=$row['reply'];
    $recieve=$row['recieve'];
}
if(password_verify($_SESSION["password"],$ret)){
echo'<!DOCTYPE html>
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
			        <li class="active"><a href="message.php"><i class="fa fa-comments"></i>&nbspchat</a></li>
			        <li><a href="friend.php"><i class="fa fa-users"></i>&nbspFriends</a></li>
			        <li><a href="about.php"><i class="fa fa-align-justify"></i>&nbspAbout</a></li>
		        </ul>
		   </center>
		    </div>
		    <button data-toggle="collapse" data-target="#friend" class="btn btn-warning" style="width:100%" ><span class="pull-right"><i class="fa fa-caret-down"></i></span>Show Friend List</button>
		    <div id="friend" class="collapse">';
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
                                    <form action=" " method="post">
                                    <input type="hidden" name="me" value='.$user.'>
                                    <input type="hidden" name="email" value='.$email.'>
                                    <button type="submit" name="chat" class="btn-info" style="color:white;width:100%;text-align:left">
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
                            <a href="#" class="close" data-dismiss="alert"><i class="fa fa-trash"></i></a>You have no friends in your friend list.Make friends!!!</div>';}echo'</div></div></div>';
                if(isset($_POST['chat'])){
                    $e=$_POST['email'];
                    $sql="SELECT*FROM verifieduser WHERE email='$e'";
                    $t=mysqli_query($conn,$sql);
                    while($r=$t->fetch_assoc()){
                        $id1=$r['id'];
                       $fname1=$r['firstname'];
                        $lname1=$r['lastname'];
                        $phone1=$r['phone'];
                        $address1=$r['address'];
                        $gender1=$r['gender'];
                        $birthday1=$r['birthday'];
                        $code1=$r['code'];
                        if($r['image']!='-'){
                           $image1='uploads/'.$r['image'];
                        }
                        else{
                            $image1='lilly.jpg'; 
                        } 
                        $recieve1=$r['recieve'];
                    }
                    
                    echo '<div class="panel-group"><div class="panel panel-primary"><div class="panel-heading"><p style="text-transform:capitalize"><a href='.$image1.'><img src='.$image1.' class="img-circle" width="50px" height="50px"></a>&nbsp'.$fname1.'&nbsp'.$lname1.'</p></div>
                        <div class="panel-body">';
                    $a=explode(",",$reply);
                    $b=explode(",",$recieve);
                    $c=array_merge($a,$b);
                    $z=array();
                    $time=array();
                    foreach($c as $i){
                        $w=explode(".",$i);
                        if($w[0]==$id1){
                            $z[]=array('id'=>$w[0],'c'=>$w[1],'m'=>$w[2],'d'=>$w[3],'t'=>$w[4]);
                            $time[]=$w[4];
                        }
                    }
                    array_multisort($time,SORT_ASC,$z);
                        for($k=0;$k<count($z);$k++){
                            if($z[$k]['c']=='r'){ 
                                $m=base64_decode($z[$k]['m']);
                            echo'<div class="bg-danger" style="width:100%;border-radius:4px;"><p style="margin-left:5px;">'.$m.'</p><p style="text-align:right;font-size:10px;color=#aaa;margin-right:5px">'.$w['4'].'</p></div>';
                            }
                            if($z[$k]['c']=='s'){ 
                                $m=base64_decode($z[$k]['m']);
                            echo'<div class="bg-info" style="width:100%;border-radius:4px;"><p style="text-align:right;margin-right:5px">'.$m.'</p><p style="font-size:10px;color=#aaa;margin-left:5px">'.$w['4'].'</p></div>';
                            }
                        }
                        echo'</div>
                    <div class="panel-footer"><form action=" " method="post">
                        <input type="hidden" name="me" value='.$user.'>
                        <input type="hidden" name="email" value='.$e.'>
                    <input type="text" name="message" style="width:80%"><button type="submit" name="sent" class="btn btn-success" style="width:50px"><i class="fa fa-paper-plane-o"></i></button></form></div>';
                }
                if(isset($_POST['sent'])){
                    date_default_timezone_set('Asia/kolkata');
                    $e=$_POST['email'];
                    $sql="SELECT*FROM verifieduser WHERE email='$e'";
                    $t=mysqli_query($conn,$sql);
                    while($r=$t->fetch_assoc()){
                        $id1=$r['id'];
                       $fname1=$r['firstname'];
                        $lname1=$r['lastname'];
                        $phone1=$r['phone'];
                        $address1=$r['address'];
                        $gender1=$r['gender'];
                        $birthday1=$r['birthday'];
                        $code1=$r['code'];
                        if($r['image']!='-'){
                           $image1='uploads/'.$r['image'];
                        }
                        else{
                            $image1='lilly.jpg'; 
                        } 
                        $recieve1=$r['recieve'];
                    }
                    $message=$id2.'.'.'r'.'.'.base64_encode($_POST['message']).'.'.date("d-m-y.H:i:s");
                    $message1=$id1.'.'.'s'.'.'.base64_encode($_POST['message']).'.'.date("d-m-y.H:i:s");
                    if($recieve1=='-'){
                        $q="UPDATE verifieduser SET recieve='$message' WHERE email='$e'";
                        mysqli_query($conn,$q);echo'1';
                    }else{
                        $d=array();
                        $d[]=$recieve1;
                        $d[]=$message;
                        $x=implode(",",$d);
                        $q="UPDATE verifieduser SET recieve='$x' WHERE email='$e'";
                        mysqli_query($conn,$q);echo'2';
                    }
                    if($reply=='-'){
                        $q2="UPDATE verifieduser SET reply='$message1' WHERE email='$user'";
                        mysqli_query($conn,$q2);echo'3';
                    }else{
                        $n=array();
                        $n[]=$reply;
                        $n[]=$message1;
                        $x1=implode(",",$n);
                        $q2="UPDATE verifieduser SET reply='$x1' WHERE email='$user'";
                        mysqli_query($conn,$q2);echo'4';
                    }
                    echo '<div class="panel-group"><div class="panel panel-primary"><div class="panel-heading"><p style="text-transform:capitalize"><a href='.$image1.'><img src='.$image1.' class="img-circle" width="50px" height="50px"></a>&nbsp'.$fname1.'&nbsp'.$lname1.'</p></div>
                        <div class="panel-body">';
                        $a=explode(",",$reply);
                    $b=explode(",",$recieve);
                    $c=array_merge($a,$b);
                    $z=array();
                    $time=array();
                    foreach($c as $i){
                        $w=explode(".",$i);
                        if($w[0]==$id1){
                            $z[]=array('id'=>$w[0],'c'=>$w[1],'m'=>$w[2],'d'=>$w[3],'t'=>$w[4]);
                            $time[]=$w[4];
                        }
                    }
                    array_multisort($time,SORT_ASC,$z);
                        for($k=0;$k<count($z);$k++){
                            if($z[$k]['c']=='r'){ 
                                $m=base64_decode($z[$k]['m']);
                            echo'<div class="bg-danger" style="width:100%;border-radius:4px;"><p style="margin-left:5px;">'.$m.'</p><p style="text-align:right;font-size:10px;color=#aaa;margin-right:5px">'.$w['4'].'</p></div>';
                            }
                            if($z[$k]['c']=='s'){ 
                                $m=base64_decode($z[$k]['m']);
                            echo'<div class="bg-info" style="width:100%;border-radius:4px;"><p style="text-align:right;margin-right:5px">'.$m.'</p><p style="font-size:10px;color=#aaa;margin-left:5px">'.$w['4'].'</p></div>';
                            }
                        }
                    echo'</div><div class="panel-footer"><form action=" " method="post">
                        <input type="hidden" name="me" value='.$user.'>
                        <input type="hidden" name="email" value='.$e.'>
                    <input type="text" name="message" style="width:80%"><button type="submit" name="sent" class="btn btn-success" style="width:50px"><i class="fa fa-paper-plane-o"></i></button></form></div>';
                }
                echo'</div></div>';
	echo'</div>
		</body>
		</html>';}
?>		
