<!doctype html>
<!--
  Copyright 2015 Google Inc. All rights reserved.
  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at
      https://www.apache.org/licenses/LICENSE-2.0
  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Learn how to use the Firebase platform on the Web">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Friendly Chat</title>

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">

  <!-- Web Application Manifest -->
  <link rel="manifest" href="manifest.json">

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

  <!-- Material Design Lite --
  <link rel="stylesheet" href="style/main.css">-->
  <link rel="stylesheet" href="css/style-ar.css">
  

</head>
<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-header">

  <!-- Header section containing logo -->
  <header class="mdl-layout__header mdl-color-text--white mdl-color--light-blue-700 hidden">
    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-grid">
      <div class="mdl-layout__header-row mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
        <h3><i class="material-icons">chat_bubble_outline</i> Friendly Chat</h3>
      </div>
      <div id="user-container">
        <div hidden id="user-pics"></div>
        <div hidden id="user-names"></div>
        <button hidden id="sign-out" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--white">
          Sign-out
        </button>
        <button hidden id="sign-in" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--white">
          <i class="material-icons">account_circle</i>Sign-in with Google
        </button>
      </div>
    </div>
  </header>
  
<div class="popup-container" id="popup-container1">
  <div class="popup" id='popupId' data-text="Hide me">
    <label class="popup-text" >Chat</label>
  </div>
  <div class="popup-content content" id="messages-card-container">
    <div class="ui" id="messages-card">

      <div class="left-menu">
          <!--
          <form action="#" class="search">
            <input placeholder="search..." type="search" name="" id="">
            <input type="submit" value="&#xf002;">
          </form> 
          -->

          <menu id="list-friends" class="list-friends">
            <!--
            <li>
              <img width="50" height="50" src="#">
              <div class="info">
                <div class="user">ebrahim</div>
                <div class="status on"> online</div>
              </div>
            </li>
            
            <li>
              <img width="50" height="50" src="#">
              <div class="info">
                <div class="user">Name Fam</div>
                <div class="status off">left 3 min age</div>
              </div>
            </li>
            -->
          </menu>

      </div>

      <div class="chat">
        <!--

        <div class="top">
          <div class="avatar" >
            <img id="user-pic">
          </div> 
          <div class="info"> 
            <div class="name" id="user-name"></div>
            <div class="count">already 1 902 messages</div>
          </div>
          <i class="fa fa-star"></i>
        </div>


        <ul class="messages">
          <li class="i">
            <div class="head">
              <div class="name" id="message-filler"></div>
              <span class="time"></span>
            </div>
            <div class="message" id="messages"></div>
          </li>
          <li class="friend-with-a-SVAGina">
            <div class="head">
              <span class="name" id="user-name"></span>
              <span class="time"></span>
            </div>
            <div class="message" id="messages1"></div>
          </li>
        </ul>

        <div id="message-form" class="write-form">
            <form id="message-form" action="#">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="message" autocomplete="off">
                <label class="mdl-textfield__label" for="message">Message...</label>
              </div>
              <button id="submit" disabled type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"> Send </button>
            </form>

            <form id="image-form" action="#">
              <input id="mediaCapture" type="file" accept="image/*" capture="camera">
              <button id="submitImage" title="Add an image" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--amber-400 mdl-color-text--white">
                <i class="material-icons">image</i>
              </button>
            </form>

        </div>
        -->

      </div>

    </div>
  </div>
  </div>
</div>
    </section>
    

<!--  <main class="mdl-layout__content mdl-color--grey-100">
<div id="messages-card-container" class="mdl-cell mdl-cell--12-col mdl-grid">

   Messages container 
  <div id="messages-card" class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
    <div class="mdl-card__supporting-text mdl-color-text--grey-600">
      <div id="messages">
        <span id="message-filler"></span>
      </div>
      <form id="message-form" action="#">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="message">
          <label class="mdl-textfield__label" for="message">Message...</label>
        </div>
        <button id="submit" disabled type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
          Send
        </button>
      </form>
      <form id="image-form" action="#">
        <input id="mediaCapture" type="file" accept="image/*" capture="camera">
        <button id="submitImage" title="Add an image" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--amber-400 mdl-color-text--white">
          <i class="material-icons">image</i>
        </button>
      </form>
    </div>
  </div>-->

  <div id="must-signin-snackbar" class="mdl-js-snackbar mdl-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button class="mdl-snackbar__action" type="button"></button>
  </div>
  
<!--  </div>
</main>-->
</div>

<script type="text/javascript"> 

  $('.chatPart').click(function(){
    alert("d");
  });
  
</script>

<script type="text/javascript"> 

  (function() {
    document.querySelectorAll('.popup')
    .forEach(popup => {
      popup.addEventListener('click', () => {
        popup.classList.toggle('open');


        

      })
    })
      
  })()


</script>
  
<!-- Import and configure the Firebase SDK -->
<!-- These scripts are made available when the app is served or deployed on Firebase Hosting -->
<!-- If you do not want to serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup -->
        


<script src="https://www.gstatic.com/firebasejs/5.5.8/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.8/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.8/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.8/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.8/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.8/firebase-messaging.js"></script>
<script src="/scripts/init.js"></script>

<script src="/scripts/chat.js"></script>

</body>
</html>
