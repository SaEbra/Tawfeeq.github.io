<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
		 Firebase Phone Number Auth
		</title>
	</head>
	<body>
		<form>
		<input type="text" id="phone" value='enter number'>

			<input type="text" id="verificationcode" value="enter verification">
				<input type="button" value="Submit" onclick="myFunction()">
				<input type="button" value="try" id="a"	 onclick="myFunction1()">
				</form>
				<div id="recaptcha-container"></div>
				
<script src="https://www.gstatic.com/firebasejs/5.5.5/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyA784TeHg165cMfYeIjQKKUbGGqVZ059fI",
    authDomain: "tawfeeq-zawaj.firebaseapp.com",
    databaseURL: "https://tawfeeq-zawaj.firebaseio.com",
    projectId: "tawfeeq-zawaj",
    storageBucket: "tawfeeq-zawaj.appspot.com",
    messagingSenderId: "782308136691"
  };
  firebase.initializeApp(config);
</script>

<script type="text/javascript"> 
window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container'); 
var phoneno='0';
var myFunction1 = function() { 
	 phoneno=document.getElementById("phone").value;
alert(phoneno);


firebase.auth().signInWithPhoneNumber(phoneno, window.recaptchaVerifier) 
.then(function(confirmationResult) { 
window.confirmationResult = confirmationResult; 
a(confirmationResult); 
}); 
}

var myFunction = function() { 
window.confirmationResult.confirm(document.getElementById("verificationcode").value) 
.then(function(result) { 
alert('login process successfull!\n redirecting');
alert('<a href="javascript:alert(\'hi\');">alert</a>')
window.location.href="details.html";
}, function(error) { 
alert(error); 
}); 
};
  </script>
 </body>
</html>