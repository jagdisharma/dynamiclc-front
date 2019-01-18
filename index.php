<?php
	include('include/config.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dynamic LC</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
	</head>
	<body>
		<div id="wrapper">
			<div class="login-page">
				<form class="form-signin p-4 pb-5 rounded" id="login-form" autocomplete="off">
					<div class="login-logo text-center mt-4 mb-5"><img src="include/images/logo.png" alt=""></div>
					<input type="text" class="form-control user mb-5" name="username" id="username" placeholder="Username" />
					<input type="password" class="form-control pass mb-5" name="password" id="password" placeholder="Password" />
					<button class="btn signinBtn btn-primary mb-5" type="submit" id="submitbtn">Sign In</button> 
					<div id="message" style="color:red"></div>
				</form><!-- FORM SIGNIN -->
			</div><!-- LOGIN PAGE -->
		</div><!-- WRAPPER -->
		<!-- JQUERY FILES -->
	</body>
</html>


<script type="text/javascript">

$(document).ready(function () 
{
	jQuery('#username').keyup(function() {
		$(this).val($(this).val().toLowerCase());
	});	

	if(localStorage.getItem('uid')) 
	{	
		uid = localStorage.getItem('uid');
		window.location.href="<?php echo $sideurl;?>/home.php?userId="+uid+"";
	}

	$("#submitbtn").click(function(e){		
		e.preventDefault();
        $('#submit').attr('disabled','disabled');
		var Email		= $("#username").val();
		var Password 	= $("#password").val();

		//+console.log(Email , "," , Password);

		if (Email == '' || Password == '') 
		{
			var msg = "<span style='color:red'>Please fill username & password!</span>";
			$("#message").html(msg);
			$('#submitbtn').attr("disabled", false);
		}else{
			
			firebase.auth().signInWithEmailAndPassword(Email, Password)
			   .then(function(firebaseUser) {
			   		console.log('Email------>',Email);
			   		console.log(' Password------>',Email);
			      	console.log('Welcome User');

					var uid = firebase.auth().currentUser.uid;
					localStorage.setItem("uid", uid);
					
					console.log('uid User-------------->',uid);
					firebase.auth().onAuthStateChanged(function(user) {
					  if (user) {
						    window.location.href="<?php echo $sideurl;?>/home.php?userid="+uid+"";
					  } else {
					    
					  }
					});


			   })
			  .catch(function(error) {
			  		console.log(error);
			  		var msg ='<span style="color:red">Incorrect Username and Password Combination.</span>';
					$('#message').html(msg);
			       console.log('User Doesn\'t Exists');
			  });
		}
	})
});
</script>