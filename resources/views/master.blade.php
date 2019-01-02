<!DOCTYPE html>
<!-- <html lang="{{ app()->getLocale() }}">  dir="{{trans('app.dir') }}"-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="manifest" href="manifest.json">
        <title>Tawfeeq</title>
        <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="Friendly Chat">
  <meta name="theme-color" content="#303F9F">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-title" content="Friendly Chat">
  <meta name="apple-mobile-web-app-status-bar-style" content="#303F9F">

  <!-- Tile icon for Win8 -->
  <meta name="msapplication-TileColor" content="#3372DF">
  <meta name="msapplication-navbutton-color" content="#303F9F">

  <!-- Material Design Lite -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
  <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

  <!-- App Styling -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
  
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
         <!-- <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://localhost:8000/js/sideJs.js"></script>
        <script type="text/javascript" src="http://localhost:8000/js/app.js"></script>
        <script type="text/javascript" src="http://localhost:8000/js/languageJs.js"></script>
        <!-- {{trans('app.bootstrab') }} -->
        <link rel="stylesheet" href="/css/intlTelInput.css">
        <link href="http://localhost:8000/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="http://localhost:8000/css/bootstrap.css" rel="stylesheet"> 
        <link href="http://localhost:8000/css/{{trans('app.mainStyle') }}.css" rel="stylesheet"/>
        <link rel="stylesheet" href="styles/main.css">





 <script type="text/javascript" src="http://localhost:8000/js/MainFormsSubmit.js"></script> 
 <!-- <script type="text/javascript" src="http://localhost:8000/functions/index.js"></script>
 <script type="text/javascript" src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>  -->
 
 </head> 

<body data-spy="scroll">
 
 


    <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
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
<script src="https://www.gstatic.com/firebasejs/firebase-admin.js"></script>



  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        @if(Session::has('phoneNumber'))
            <a class="navbar-brand" href="/matchList">
        @else
            <a class="navbar-brand" href="/">    
		@endif  
      
        <h1>{{trans('app.Name') }}</h1>
      </a>
      <button class="navbar-toggler button" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      </div>
      <div class="newrow">
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!--  
          <li class="nav-item active">
            <a class="nav-link" href="/"> {{-- trans('app.home') --}} 
                 
              <span class="sr-only">(current)</span>
            </a>
          </li>
          -->
          <li class="nav-item">
            <a class="nav-link" href="#AboutUs" target=""> {{trans('app.About Us') }}  </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Warning"> {{trans('app.Warnings') }} </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#HowItWork"> {{trans('app.How It Works') }} </a>
          </li>
            <li class="nav-item ">
            @if(Session::has('phoneNumber'))
            <a class="btn btn-primary modal-btn btn-responsive" href="/logout" > خروج</a> 
            @endif
            
            </li>
          <li class="nav-item nav-lang">
            <div class="lang">		
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item profile_details_drop">
                         
                        <select name='locale' id='languageSwitcher'>
                        <option></option>
                            <option>en</option>
                            <option>ar</option>
                        </select>

                    </li>
                </ul>
            </div>
            </li>
        </ul>
       </div>
       </div>
  </nav>
  <!--
   <div class="modal fade login-register-form" role="dialog" id="Signin"> 
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
		<div class="tabs">
			<h3 class="login-tab"><a href="#login-tab-content">تسجيل الدخول </a></h3>
		</div> 
			<div id="login-tab-content">
				<form class="login-form" action="" method="post">
                    <input type="text" class="input" id="user_login" autocomplete="off" placeholder="رقم التلفون المسجل">
					<button type="button" class="btn btn-default btns" data-dismiss="modal">دخول</button>
				</form> 
            </div> 
            <div class="modal-footer">
                    <button type="button" class="btn btn-default closebtn" data-dismiss="modal">اغلاق</button>
                </div>
        </div> 
        </div>
    </div>
    -->

        
   

  <header class="home" id="home">
      <div class="container"  > <br>
          @yield('main_content')
       
      </div>
  </header>
  <section id="AboutUs" class="about">
     <div class="container">
         <div class="about-text">
             <h1>About Us</h1>
             <h4>We are the company which is make the both of famel and male are very happy in their life</h4>
         </div>
     </div>
  </section>
  <section id="Warning" class="warning">
      <div class="container">
          <div class="warning-text">
              <h1 class="warn-text">Who can sign up on this website </h1>
              <ul>
                  <li>He/She should be older than 18 years old</li>
                  <li>He/She should be serious</li>
                  <li>This website desgined to be trust between all the people around the world </li>
              </ul>
          </div>
      </div>
  </section>
  <section id="HowItWork" class="howitwork">
        <div class="container">
            <div class="howitwork-text">
                <h1 class="howitwork-text">How it Work</h1>
                <ul>
                    <li>You should sigin up</li>
                    <li>Enter all you required detials </li>
                    <li>Enter the requirement which your partener should  have</li>
                    <li>You can get marriage through our office</li>
                </ul>
            </div>
        </div>
    </section>
    
    <footer class="footer">
        <div class="container">
            <div class="footer-text">
            <p>For further information you can contact us</p>
            <h4>Tawfeeq@gmail.com</h4>
        </div>
        </div>
    </footer>

<!-- jQuery -->
 <script type="text/javascript" src="http://localhost:8000/js/formJs.js"></script>  
  

<!--
<script type="text/javascript"> 
    firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        var anonymousUser = firebase.auth().currentUser;
        if (anonymousUser) {
            //console.log(anonymousUser);
            //console.log(JSON.stringify(anonymousUser));
            var anonymousUser =JSON.stringify(anonymousUser);
            //console.log(anonymousUser);
            //displayName  phoneNumber uid providerId lastLoginAt
            var obj = JSON.parse(anonymousUser);
            var myDate = new Date( obj.lastLoginAt *1000);
            //alert(myDate.toGMTString());
            console.log(obj);
            //alert(obj.phoneNumber);
            
            //alert(obj.uid +"\n" + anonymousUser.phoneNumber +"\n" + anonymousUser.providerId +"\n" + obj.lastLoginAt );
            //{"uid":"Qu16Kb9ciMbG29cNfSTQ6sGGIiP2","displayName":null,"photoURL":null,"email":null,"emailVerified":false,"phoneNumber":"+918975703780","isAnonymous":false,"providerData":[{"uid":"+918975703780","displayName":null,"photoURL":null,"email":null,"phoneNumber":"+918975703780","providerId":"phone"}],"apiKey":"AIzaSyA784TeHg165cMfYeIjQKKUbGGqVZ059fI","appName":"[DEFAULT]","authDomain":"tawfeeq-zawaj.firebaseapp.com","stsTokenManager":{"apiKey":"AIzaSyA784TeHg165cMfYeIjQKKUbGGqVZ059fI","refreshToken":"AGK09AN6zuQnABk5E7joS74kWMrhIMlgfXs8J0tHtjUzaxd1UuCd4dJPIkW9lAX8Wod4kKKW7gExtGUbh455z-xciVOx6BHUUp1rEit1YV0pwHUS2yjsGH5DONjrfggwsMPu5rhM1uvtgbNaLRFx15MXoh5TwOcStN_oZ_QXkxHdDnJ_hAvxJaYcw481eneScBTT-Nb7-up3","accessToken":"eyJhbGciOiJSUzI1NiIsImtpZCI6IjY1ZjRhZmFjNjExMjlmMTBjOTk5MTU1ZmE1ODZkZWU2MGE3MTM3MmIiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vdGF3ZmVlcS16YXdhaiIsImF1ZCI6InRhd2ZlZXEtemF3YWoiLCJhdXRoX3RpbWUiOjE1NDMwNjk0ODEsInVzZXJfaWQiOiJRdTE2S2I5Y2lNYkcyOWNOZlNUUTZzR0dJaVAyIiwic3ViIjoiUXUxNktiOWNpTWJHMjljTmZTVFE2c0dHSWlQMiIsImlhdCI6MTU0MzA2OTQ4MSwiZXhwIjoxNTQzMDczMDgxLCJwaG9uZV9udW1iZXIiOiIrOTE4OTc1NzAzNzgwIiwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJwaG9uZSI6WyIrOTE4OTc1NzAzNzgwIl19LCJzaWduX2luX3Byb3ZpZGVyIjoicGhvbmUifX0.hiRLlqtctyv2W6P621_ez7TnV9T4YEI9JJknYcldQjuWD6GfNtQ1dQI9WiZtYyUEy5DFaCT3JBqc-YX9OB41_-33vUfQaQgJdRb-3GFSg6ZqZ2wpDTaYYC5r91LZLlBMHzzpDDK98zglprzsFbk_kwvcRHTCg6bpnXjcJFX-s55OXeBBzffEC0E2pMt80b0l0F7mgsiJwrvsWXyhW7yHkMb8aHwB5ld36jCXGo-VrAhLf69dQ0uHfP4New862k4IBnf3FgChQXcTCxVYfjPHTDEk9WC1RwFaWKMW7zJjDZaRR1pOe4PTkptENP0av0toamhYdZHM-S5dptDzmyD-fA","expirationTime":1543073076154},"redirectEventId":null,"lastLoginAt":"1543069481000","createdAt":"1540065676000"}
                /*
                var json =anonymousUser;
                var parsed = JSON.parse(json);
                var arr = [];
                for(var x in parsed){
                arr.push(parsed[x]);
                }
                console.log(arr); */
            
        } else {
            alert("BB");
        }
    } else {
        alert("B");
    }
    });
 
</script> 
-->
<script src="http://localhost:8000/scripts/main.js" type = "text/javascript"></script>
                                              
 
<!--
<script type="text/javascript"> 
   
    firebase.auth().languageCode = "{{ trans('app.lang') }}";
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container'); 
    //var phoneNumber = document.getElementById('phoneNoId').value;
    //var phoneNumber =$('.phoneNoId').val();
    //+918142923988
    //var phoneNumber = '+918975703780';
                         
    //var myFunction1 = function() 
    $('#signUp').click(function(){
        var phoneNumber=document.getElementById("phoneNoId").value;
        var Title = document.getElementsByClassName("selected-flag");
        var dialCode=Title[0].title;
        var countryCode = dialCode.split(":").pop(-1);
        document.getElementById("countryCode").value = countryCode;
        
        //alert(document.getElementById("countryCode").value);
        
        if(phoneNumber!='')
        {
            firebase.auth().signInWithPhoneNumber(countryCode+phoneNumber, window.recaptchaVerifier) 
            .then(function(confirmationResult) { 
            window.confirmationResult = confirmationResult; 
            var div1 = document.getElementById("firstStage");  
            div1.style.display = "none";
            var div2 = document.getElementById("secondStage");  
            div2.style.display = "block";
            a(confirmationResult); 
            });

        }
    });
     

    /*
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
    */
     
    $("#signUpWithCode").click(function(){   
        window.confirmationResult.confirm(document.getElementById("verificationcode").value) 
        .then(function(result) { 
        //alert('login process successfull!\n redirecting');
        //window.location.href="register";
        //var provider = new firebase.auth.GoogleAuthProvider();
        //firebase.auth().signInWithRedirect(provider);
        //document.getElementById("registerFormId").submit();
        //firebase.auth().signInWithRedirect("/try");
        var x = document.getElementsByClassName("registerFormClass");
        x[0].submit(); // Form submission
        

        /*
        
        var data={};
        data['phoneNumber']=$('#phoneNoId').val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        data['_token']=csrf_token;
        console.log(data);
		
		$.ajax({
	        type: 'POST',
	        url: 'register',
	        data: data,
			success: function( msg ) 
				{ 
                    console.log(msg);
				}
        }); 
        */
        
        }, function(error) { 
        //alert(error); 
        alert('not match');
        });  
        return false;
    });  
</script>
-->
    <!-- Date picker -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type = "text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type = "text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel = "Stylesheet" type="text/css" /> 
    <script type = "text/javascript">
        
        $(function () {
            $("#txtDate").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:-18"
            });
        });
        
    </script>


   
   <script src="/js/intlTelInput.js"></script>
  <script>
    var input = document.querySelector("#phoneNoId");
     
    window.intlTelInput(input, { 
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      //utilsScript: "build/js/utils.js",
    });
  </script>
   
</body>
  
</html>