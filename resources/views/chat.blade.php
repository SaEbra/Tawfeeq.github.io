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
          <menu id="list-friends" class="list-friends">  
           
          </menu>
        </div>

        <div class="chat" id='chat'>
           
          <div class="top">
            <div class="avatar" >
              <img id="user-pic">
            </div> 
            <div class="info"> 
              <div class="name" id="user-name"></div>
              <div class="count">online</div>
            </div>

            <div class="closebtn"> 
              <!--
              <div  id='temporaryClose' class='temporaryClose'></div>
              <div  id='finleClose' class='finleClose'> </div> 
              -->
              
              <a href='#' title="Close"          id='temporaryClose' ></a> 
              <a href='#' title="Close Forever"  id='finleClose' ></a>
               
            </div>

            <i class="fa fa-star"></i>
          </div>


          <ul class="messages" id="ulMessages">
           
            <li class="i" hidden>
              <div class="head">
                <div class="name" id="message-filler"></div>
              </div>
              <div class="message" id="messages"></div>
              <div><span class="time"></span></div>
            </li> 

            <li class="friend-with-a-SVAGina" hidden>
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
          
        </div>

      </div>

    </div>
  </div>
 
    

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

 

<script type="text/javascript"> 

   

  $("#list-friends").on("click", "a.chatPart", function(){
      var id = $(this).attr('id');
      //alert(id);
      loadMessages(id);
      
      /*
      // load chat history
      var data={};
      data['thread']=id;
		data['_token']=$('meta[name="csrf-token"]').attr('content'); alert(data);
      $.ajax({
      method: 'GET',
      url: 'chatdetails',
      data: data,
      success: function( response ){
        console.log( response);
        alert(response);
        
      },
      error: function( e ) {
        console.log(e);
      }
      }); */
  });

  $("#temporaryClose").on("click", function(){
    document.getElementById("popupId").classList.remove('open');
    //$("#popupId").removeClass('open');
  });

  $("#finleClose").on("click", function(){
    
    var confirmVar = confirm("Are You Sure? You won't be able to chat with this member again");
    if (confirmVar == true) {
      alert("Yes");
    } else {
      alert("No");
    }
  });

  $("#ulMessages").on("click", "input.cancelRequestChatingButton", function(){
    var confirmVar = confirm("Are You Sure?");
    if (confirmVar == true) {
      var id = $(this).attr('id');
      cancelRequestChating(id);
    } else {
      //alert("No");
    }
  
  });  
 
</script>

<script type="text/javascript"> 

  (function() {
    document.querySelectorAll('.popup')
    .forEach(popup => {
      popup.addEventListener('click', () => {
        popup.classList.toggle('open');
        loadChatMenu();


        

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
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-functions.js"></script>

<script src="/scripts/init.js"></script>

<script src="/scripts/chat.js"></script>

