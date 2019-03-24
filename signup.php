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
		<style>
		.valid{
		    color:green;
		    font-size:10px;
		}
		.valid:before {
            position: relative;
            left: -10px;
            content: "✔";
        }
        
        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
            font-size:10px;
        }
        
        .invalid:before {
            position: relative;
            left: -10px;
            content: "✖";
        }
		</style>
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
			       <li class="active"><a href="#"><i class="fa fa-list-alt"></i>&nbspGive Details</a></li>
			        <li><a href="#"><i class="fa fa-comment"></i>&nbspGet OTP</a></li>
			        <li><a href="#"><i class="fa fa-user"></i>&nbspActivate</a></li>
			        <li><a href="index.php"><i class="fa fa-r"></i>&nbspGo Back To Login</a></li>
		        </ul>
		   </center>
		    </div>
            <center>
          <div id="row2" class="row bg-success">
              <form method="post" action="confirmation.php">
				Firstname<i class="fa fa-asterisk text-danger"></i>:<br>
				<input type="text" name="firstname" placeholder="firstname" required><br><br>
				Lastname<i class="fa fa-asterisk text-danger"></i>:<br>
				<input type="text" name="lastname" placeholder="lastname" required><br><br>
				Gender<i class="fa fa-asterisk text-danger"></i>:<br>
				Male:<input type="radio" name="gender" value="Male" checked>Female:<input type="radio" name="gender" value="Female" checked>Other:<input type="radio" name="gender" value="other" checked><br><br>
				Birthday<i class="fa fa-asterisk text-danger">*</i>:<br>
				<input type="date" name="date" required><br><br>
				Email<i class="fa fa-asterisk text-danger"></i>:<br>
				<input type="email" name="email" placeholder="email" required><br><br>
				Phonenumber<i class="fa fa-asterisk text-danger"></i>:<br>
				<input type="text" name="phone" placeholder="phone number" pattern="[0-9]{10}" title="Enter a valide phone number"><br><br>
				Address<i class="fa fa-asterisk text-danger"></i>:<br>
				<input type="text" name="address" placeholder="Address(ex:-vill/city,dist)" required><br><br>
				Password<i class="fa fa-asterisk text-danger"></i>:<br>
				<input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required><br><br>
				<div id="message" style="display:none">
				      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        			  <p id="number" class="invalid">A <b>number</b></p>
        			  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        		</div>
				<script>
                    var myInput = document.getElementById("psw");
                    var letter = document.getElementById("letter");
                    var number = document.getElementById("number");
                    var length = document.getElementById("length");
                    
                    // When the user clicks on the password field, show the message box
                    myInput.onfocus = function() {
                        document.getElementById("message").style.display = "block";
                    }
                    
                    // When the user clicks outside of the password field, hide the message box
                    myInput.onblur = function() {
                        document.getElementById("message").style.display = "none";
                    }
                    
                    // When the user starts to type something inside the password field
                    myInput.onkeyup = function() {
                      // Validate lowercase letters
                      var lowerCaseLetters = /[a-z]/g;
                      if(myInput.value.match(lowerCaseLetters)) {  
                        letter.classList.remove("invalid");
                        letter.classList.add("valid");
                      } else {
                        letter.classList.remove("valid");
                        letter.classList.add("invalid");
                      }
                      
                    
                      // Validate numbers
                      var numbers = /[0-9]/g;
                      if(myInput.value.match(numbers)) {  
                        number.classList.remove("invalid");
                        number.classList.add("valid");
                      } else {
                        number.classList.remove("valid");
                        number.classList.add("invalid");
                      }
                      
                      // Validate length
                      if(myInput.value.length >= 8) {
                        length.classList.remove("invalid");
                        length.classList.add("valid");
                      } else {
                        length.classList.remove("valid");
                        length.classList.add("invalid");
                      }
                    }
                </script>
                Re-Password<i class="fa fa-asterisk text-danger"></i>:<br>
				<input id="repsw" type="password" name="repsw" placeholder="Re-password" required>
				<div id="cnf"><p id="p1" class="invalid" style="display:none">Not Matched</p><p id="p2" class="valid" style="display:none"> Matched</p></div><br><br>
				<script>
				    var repsw=document.getElementById("repsw");
				    var psw=document.getElementById("psw");
				    
				    repsw.onfocus=function(){
				        document.getElementById("cnf").style.display="block";
				    }
				    repsw.onblur=function(){
				        document.getElementById("cnf").style.display="none";
				    }
				    repsw.onkeyup=function(){
				        var val=psw.value;
				        if(repsw.value==psw.value){
				        document.getElementById("p2").style.display="block";
				        document.getElementById("p1").style.display="none";
				        }
				        else{
				          document.getElementById("p2").style.display="none";  
				          document.getElementById("p1").style.display="block";
				        }
				    }
				</script>
				<input type="submit" name="submit" value="Sign Up" class="btn-success"><br><br>
			  </form>
		  </div>
		    </center>
        </div>
    </body>
</html>

