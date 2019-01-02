

'use strict';
// Signs-in for the site.
function signIn() { 
   // 8975703780
  //firebase.auth().languageCode = "{{ trans('app.lang') }}";
  window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
  var phoneNumber=document.getElementById("phoneNoId").value;
  var Title = document.getElementsByClassName("selected-flag");
  var dialCode=Title[0].title;  
  var countryCode = dialCode.split(":").pop(-1); //alert(countryCode);
  document.getElementById("countryCode").value = countryCode;
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
     
  $("#signUpWithCode").click(function(){   
      window.confirmationResult.confirm(document.getElementById("verificationcode").value) 
      .then(function(result) { 
        var x = document.getElementsByClassName("registerFormClass");
        x[0].submit(); // Form submission  
        }, function(error) { 
        //alert(error); 
          alert('not match');  
        });  
      return false;
  });  
    
  firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
      var anonymousUser = firebase.auth().currentUser;
      if (anonymousUser) {
          var anonymousUser =JSON.stringify(anonymousUser);
          var obj = JSON.parse(anonymousUser);
          var myDate = new Date( obj.lastLoginAt *1000);
          //alert(myDate.toGMTString());
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
            // alert("BB");
          }
      } else {
        // alert("B");
      }
  });
  
} 

// Signs-out .
function signOut() {
  // Sign out of Firebase.
  firebase.auth().signOut();
}

function getPartnerPhoto(partnerID,imgId) {
  var storageRef = firebase.storage().ref();
  var ID = partnerID;
  storageRef.child('membersImages/profilePhoto'+ID).getDownloadURL().then(function(url) {
    
    document.getElementById(imgId).src = url;
    
  }).catch(function(error) {
    document.getElementById(imgId).src = "http://localhost:8000/images/profile_placeholder.png";
    
  });
}

// Initiate Firebase Auth.
function initFirebaseAuth() {
  // Listen to auth state changes.
  firebase.auth().onAuthStateChanged(authStateObserver);
}

// Returns the signed-in user's profile pic URL.
function getProfilePicUrl() {
  return firebase.auth().currentUser.photoURL || '/images/profile_placeholder.png';
}


// Returns the signed-in user's display name.
function getUserName() {
  //return firebase.auth().currentUser.displayName;
  var displayName = firebase.auth().currentUser.displayName;
  return displayName;
    
}

function getUserId() {
    var uid=firebase.auth().currentUser.uid;
    //alert(uid);
    return uid;
}
 
// Returns true if a user is signed-in.
function isUserSignedIn() {
  return !!firebase.auth().currentUser;
}


// Loads chat message history and listens for upcoming ones.
function loadMessages(threadkey) {
  // Loads the last 12 messages and listens for new ones.
  removeDisplayMessage();
  
  
  thread=threadkey;
  var myUid=getUserId();
  
  
  var leadsRef =firebase.database().ref('threads/'+thread+'/details/status');
  leadsRef.on('value', function(snapshot) { 
    if(snapshot.val()=='1')
    { 
      var callback = function(snap) {  
        var data = snap.val();   
        if(myUid==data.SenderId)
          requestChating(snap.key, data.name, data.text, data.profilePicUrl, data.imageUrl, data.SenderId, data.creatAt,thread);
        else
          displayMessage1(snap.key, data.name, data.text, data.profilePicUrl, data.imageUrl, data.SenderId, data.creatAt);
      };
      firebase.database().ref('threads/'+thread+'/messages').limitToLast(12).on('child_added', callback);
      firebase.database().ref('threads/'+thread+'/messages').limitToLast(12).on('child_changed', callback); 

    }else if(snapshot.val()=='2')
    {
      var callback = function(snap) {  
        var data = snap.val();   
          cancelChating(snap.key, data.name, data.text, data.profilePicUrl, data.imageUrl, data.SenderId, data.creatAt,thread);
        
      };
      firebase.database().ref('threads/'+thread+'/messages').on('child_added', callback);
      firebase.database().ref('threads/'+thread+'/messages').on('child_changed', callback); 

    }
    else
    {
        document.getElementById('message-form').style.display = "block";
        var callback = function(snap) {  
        var data = snap.val();   
        if(myUid==data.SenderId)
          displayMessage(snap.key, data.name, data.text, data.profilePicUrl, data.imageUrl, data.SenderId, data.creatAt);
        else
          displayMessage1(snap.key, data.name, data.text, data.profilePicUrl, data.imageUrl, data.SenderId, data.creatAt);
      };
      firebase.database().ref('threads/'+thread+'/messages').limitToLast(12).on('child_added', callback);
      firebase.database().ref('threads/'+thread+'/messages').limitToLast(12).on('child_changed', callback); 
      
     
    }

     
});
   
}


function loadChatMenu() {
  //var my_id=getUserId(); 
  
  var myUid=getUserId();
  //alert(myUid);
  //alert("myUid");
      var callback = function(snap) {  
        var data = snap.val();   
        //displayMessage1(snap.key, data.name, data.text, data.profilePicUrl, data.imageUrl, data.SenderId, data.creatAt);
        //alert(snap.key);
        //alert(data.recipientId);
        var partnerUid=data.recipientId;
        alert(partnerUid);
        /*
        var adaRef  =firebase.database().ref('users/'+partnerUid);
        var key = adaRef.child("phoneNumber").value;
        console.log(key);
        */
        var ref = firebase.database().ref("Users");
        ref.on("child_added", function(snapshot) {
          console.log(snapshot.key);
        });
        
        firebase.auth().getUser(partnerUid)
        .then(function(userRecord) {
          // See the UserRecord reference doc for the contents of userRecord.
          console.log("Successfully fetched user data:", userRecord.toJSON());
        })
        .catch(function(error) {
          console.log("Error fetching user data:", error);
        });



        /*
        $partnerUserPhoneNumber=$partnerUser->phoneNumber;
        $partnerUserPhoneNumber = str_replace("+","",$partnerUserPhoneNumber); 
        $partnerUserID  =$this->db->getReference('membersInfo/'.$partnerUserPhoneNumber.'/ID')->getValue();
        */
        var partnerID=data.ID;
        var thread=snap.key;
        var m,status='';
        $("#list-friends").append("<li><img width='50' height='50' src="+m+" id="+partnerUid+"><div class='info'><a class='chatPart' href='#' id='"+thread+"'><div class='user'>"+partnerID+"</a></div>"+status+"</div></li>"); 
          //getPartnerPhoto( partnerID,partnerID);
          
          
      };
      
      firebase.database().ref('threads').orderByChild("creatorId").equalTo(myUid).limitToLast(12).on('child_added', callback);
      firebase.database().ref('threads').orderByChild("creatorId").equalTo(myUid).limitToLast(12).on('child_changed', callback);
      //firebase.database().ref('threads/'+thread+'/creatorId').equalTo(myUid).limitToLast(12).on('child_changed', callback); 
      
      //recipientId
}


function chat1(partnerId){ 
   
    var messageText='Hello.. I would like to know You more';
    partnerId=partnerId;
    myId =getUserId();
    var node= setOneToOneChat(myId, partnerId);
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
          
            //alert ("not exist"); 
            
            //alert(node);
    
    
            firebase.database().ref('/threads/'+node).update({
              creatorId:myId,
              recipientId:partnerId
            }).catch(function(error) {
              console.error('Error writing new message to Realtime Database:', error);
            });
            

            firebase.database().ref('/threads/'+node+'/details').update({
              creationDate:date,
              creationTime:time,
              creatorId:myId,
              lastMessageAdded:'',
              recipientId:partnerId,
              status:"1"
            }).catch(function(error) {
              console.error('Error writing new message to Realtime Database:', error);
            }); 
            firebase.database().ref('/threads/'+node+'/messages').remove();
            firebase.database().ref('/threads/'+node+'/messages').push({
              text: messageText,
              creatAt:date+' '+time,
              SenderId: myId,
              displaycreator:1,
              displayreciver:1,
              read:"No",
            }).catch(function(error) {
              console.error('Error writing new message to Realtime Database:', error);
            }); 
             

         

     
    firebase.database().ref('/onChat/'+node).push({
      user1: myId
    }).catch(function(error) {
      console.error('Error writing new message to Realtime Database:', error);
    });  
    
    document.getElementById("popupId").classList.add('open');
    $(".chatLink").remove(); 
  
}  

function setOneToOneChat(myId, partnerId)
  {
    //Check if user1’s id is less than user2's
     
    if(myId <partnerId){
    return myId + "" + partnerId; 
    }
    else{
    return partnerId + "" +myId ; 
    } 
  }

    
// Saves a new message in the Realtime Database.
function saveMessage(messageText) { 
  // Adds a new message entry to the Realtime Database.
  var today = new Date();
  var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
  var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  var myUid=getUserId();
  return firebase.database().ref('/threads/'+thread+'/messages').push({
      text: messageText,
      creatAt:date+' '+time,
      SenderId: myUid,
      displaycreator:1,
      displayreciver:1,
    }).catch(function(error) {
      console.error('Error writing new message to Realtime Database:', error);
    }); 
}
// Saves a new message containing an image in Firebase.
// This method first saves the image in Cloud Storage.
function saveImageMessage(file) {
  // 1 - Add a chat message placeholder (a loading icon) that will ultimately get updated with the shared image.
  firebase.database().ref('/messages/'+getUserName()).push({
    name: getUserName(),
    imageUrl: LOADING_IMAGE_URL,
    profilePicUrl: getProfilePicUrl()
  }).then(function(messageRef) {
    // 2 - Upload the image to Cloud Storage.
    var filePath = firebase.auth().currentUser.uid + '/' + messageRef.key + '/' + file.name;
    return firebase.storage().ref(filePath).put(file).then(function(fileSnapshot) {
      // 3 - Generate a public URL for the image file.
      return fileSnapshot.ref.getDownloadURL().then((url) => {
        // 4 - Update the chat message placeholder with the image's URL.
        return messageRef.update({
          imageUrl: url,
          storageUri: fileSnapshot.metadata.fullPath
        });
      });
    });
  }).catch(function(error) {
    console.error('There was an error uploading a file to Cloud Storage:', error);
  });
}

self.addEventListener('notificationclick', function(event) {
  console.log('On notification click: ', event.notification.tag);
  event.notification.close();

  // This looks to see if the current is already open and
  // focuses if it is
  event.waitUntil(clients.matchAll({
    type: "window"
  }).then(function(clientList) {
    for (var i = 0; i < clientList.length; i++) {
      var client = clientList[i];
      if (client.url == '/' && 'focus' in client)
        return client.focus();
    }
    if (clients.openWindow)
      return clients.openWindow('/');
  }));
});

// Requests permission to show notifications.
/*
function requestNotificationsPermissions() { //alert("hello");
  console.log('Requesting notifications permission...');
  firebase.messaging().requestPermission().then(function() {
    // Notification permission granted.
    saveMessagingDeviceToken();
  }).catch(function(error) {
    console.error('Unable to get permission to notify.', error);
  });
}
// Saves the messaging device token to the Realtime Database.
function saveMessagingDeviceToken() {
  firebase.messaging().getToken().then(function(currentToken) {
    if (currentToken) {
      console.log('Got FCM device token:', currentToken);
      // Save the device token to the Realtime Database.
      firebase.database().ref('/fcmTokens').child(currentToken)
          .set(firebase.auth().currentUser.uid);
    } else {
      // Need to request permissions to show notifications.
      requestNotificationsPermissions();
    }
  }).catch(function(error){
    console.error('Unable to get messaging device token:', error);
  });
}
*/

// Triggered when a file is selected via the media picker.
function onMediaFileSelected(event) {
  event.preventDefault();
  var file = event.target.files[0];

  // Clear the selection in the file picker input.
  imageFormElement.reset();

  // Check if the file is an image.
  if (!file.type.match('image.*')) {
    var data = {
      message: 'You can only share images',
      timeout: 2000
    };
    signInSnackbarElement.MaterialSnackbar.showSnackbar(data);
    return;
  }
  // Check if the user is signed-in
  if (checkSignedInWithMessage()) {
    saveImageMessage(file);
  }
}

// Triggered when the send new message form is submitted.
function onMessageFormSubmit(e) {  
  e.preventDefault();
  // Check that the user entered a message and is signed in.
  if (messageInputElement.value && checkSignedInWithMessage()) {
    saveMessage(messageInputElement.value).then(function() {
      // Clear message text field and re-enable the SEND button.
      resetMaterialTextfield(messageInputElement);
      toggleButton();
    });
  }
}

// Triggers when the auth state change for instance when the user signs-in or signs-out.
function authStateObserver(user) {
  if (user) { // User is signed in!
    // Get the signed-in user's profile pic and name.
    var profilePicUrl = getProfilePicUrl();
    var userName = getUserName();

    // Set the user's profile pic and name.
    userPicElement.style.backgroundImage = 'url(' + profilePicUrl + ')';
    userNameElement.textContent = userName;

    // Show user's profile and sign-out button.
    userNameElement.removeAttribute('hidden');
    userPicElement.removeAttribute('hidden');
    signOutButtonElement.removeAttribute('hidden');

    // Hide sign-in button.
    signInButtonElement.setAttribute('hidden', 'true');

    // We save the Firebase Messaging Device token and enable notifications.
    //saveMessagingDeviceToken();
  } else { // User is signed out!
    // Hide user's profile and sign-out button.
    userNameElement.setAttribute('hidden', 'true');
    userPicElement.setAttribute('hidden', 'true');
    signOutButtonElement.setAttribute('hidden', 'true');

    // Show sign-in button.
    signInButtonElement.removeAttribute('hidden');
  }
}

// Returns true if user is signed-in. Otherwise false and displays a message.
function checkSignedInWithMessage() {
  // Return true if the user is signed in Firebase
  if (isUserSignedIn()) {
    return true;
  }

  // Display a message to the user using a Toast.
  var data = {
    message: 'You must sign-in first',
    timeout: 2000
  };
  signInSnackbarElement.MaterialSnackbar.showSnackbar(data);
  return false;
}

// Resets the given MaterialTextField.
function resetMaterialTextfield(element) {
  element.value = '';
  element.parentNode.MaterialTextfield.boundUpdateClassesHandler();
}

// Template for messages.
var iMylist =
'<li class="i"><div class="head"><div class="name" id="message-filler"></div></div><div class="message" id="messages">'+
'</div><br><br><span class="time"></span></li>';

var iMylist1 =
'<li class="friend-with-a-SVAGina"><div class="head"><div class="name" id="message-filler"></div><span class="name" id="user-name"></span></div><div class="message" id="messages">'+
'</div><br><br><span class="time1"></span></li>';

var ulMessages = document.getElementById('ulMessages');
 
// Adds a size to Google Profile pics URLs.
function addSizeToGoogleProfilePic(url) {
  if (url.indexOf('googleusercontent.com') !== -1 && url.indexOf('?') === -1) {
    return url + '?sz=150';
  }
  return url;
}

// A loading image URL.
var LOADING_IMAGE_URL = 'https://www.google.com/images/spin-32.gif?a';
function requestChating(key, name, text, picUrl, imageUrl,senderId,creatAt,thread) {
  displayMessage(key, name, text, picUrl, imageUrl,senderId,creatAt);
  //alert(senderId)
  var input = document.createElement("input");
  input.type = "button";
  input.className="cancelRequestChatingButton";
  input.value="Cancel";
  input.id=thread; 
  ulMessages.appendChild(input); 
  
   
}

function cancelChating(key, name, text, picUrl, imageUrl,senderId,creatAt,thread) {
  var myUid=getUserId();
  if(myUid==senderId)
    displayMessage(key, name, text, picUrl, imageUrl,senderId,creatAt);
  else
    displayMessage1(key, name, text, picUrl, imageUrl,senderId,creatAt);

  //displayMessage(key, name, text, picUrl, imageUrl,senderId,creatAt);
  var newItem = document.createElement("p");
  newItem.innerHTML="This request has been canceled ";
  ulMessages.appendChild(newItem);
  //var cancelInput = document.getElementById(thread);
  
}


function cancelRequestChating(thread) {
  var node=thread;

  $("input#"+node).remove();
  
  firebase.database().ref('/onChat/'+node).remove();
  firebase.database().ref('/threads/'+node+'/details').update({
    status:"2"
  }).catch(function(error) {
    console.error('Error writing new message to Realtime Database:', error);
  }); 

  var cardChatPart1='<a href="#" class="chatLink" data-value="{{$matchList[$i][\'ID\']}}" title="">'  +
  '<p class="card-chat"  Onclick="chat1(\'';
  var cardChatPart2='\')"  id="{{$matchList[$i][\'ID\']}}">chat</p></a>';
  var cardBody = document.getElementsByClassName('card-body');
  for( var i=0; i<cardBody.length;i++)
    {
      var partnerIdValue = cardBody[i].children[0].value;
      var container = document.createElement('a');
      container.innerHTML = cardChatPart1 + partnerIdValue + cardChatPart2;
      var div = container.firstChild;
      cardBody[i].appendChild(div); 
    }

}

// Displays a Message in the UI.
function displayMessage(key, name, text, picUrl, imageUrl,senderId,creatAt) { 
  var div = document.getElementById(key);
  if (!div) {
     var container = document.createElement('li');
     container.className = "i";
     container.innerHTML = iMylist;
     div = container.firstChild;
     div.setAttribute('id', key);
     ulMessages.appendChild(div); 
     
   }
   
   div.querySelector('.name').textContent = name;
   div.querySelector('.time').textContent = creatAt;
   
   var messageElement = div.querySelector('.message');
   messageElement.textContent = text;
   
   
   //messageElement.innerHTML = messageElement.innerHTML.replace(/\n/g, '<br>');
   // Show the card fading-in and scroll to view the new message.
   //setTimeout(function() {div.classList.add('visible')}, 1);
   //messageListElement.scrollTop = messageListElement.scrollHeight; 
   //messageInputElement.focus(); 

  var elmnt = document.getElementById(key);
  elmnt.scrollIntoView();

 }
 
 function displayMessage1(key, name, text, picUrl, imageUrl,senderId,creatAt) { 
  var div = document.getElementById(key);
  if (!div) {
     var container = document.createElement('li');
     container.className = "friend-with-a-SVAGina";
     container.innerHTML = iMylist1;
     div = container.firstChild;
     div.setAttribute('id', key);
     ulMessages.appendChild(div); 
     
   }
   
   div.querySelector('.name').textContent = name;
   div.querySelector('.time1').textContent = creatAt;
   var messageElement = div.querySelector('.message');
   messageElement.textContent = text;
   setTimeout(function() {div.classList.add('visible')}, 1);

   var elmnt = document.getElementById(key);
   elmnt.scrollIntoView();
  
 }

function displayMessage00(key, name, text, picUrl, imageUrl) { 
 //alert(key);
   
   var div = document.getElementById(key);
  // If an element for that message does not exists yet we create it.
  
  if (!div) {
    var container = document.createElement('li');
    container.innerHTML = iMylist;
    div = container.firstChild;
    div.setAttribute('id', key);
    ulMessages.appendChild(div); 
    
  }
  if (picUrl) {
    div.querySelector('.pic').style.backgroundImage = 'url(' + addSizeToGoogleProfilePic(picUrl) + ')';
  }
  div.querySelector('.name').textContent = name;
  var messageElement = div.querySelector('.message');
  if (text) { // If the message is text.
    messageElement.textContent = text;
    // Replace all line breaks by <br>.
    messageElement.innerHTML = messageElement.innerHTML.replace(/\n/g, '<br>');
  } else if (imageUrl) { // If the message is an image.
    var image = document.createElement('img');
    image.addEventListener('load', function() {
      messageListElement.scrollTop = messageListElement.scrollHeight;
    });
    image.src = imageUrl + '&' + new Date().getTime();
    messageElement.innerHTML = '';
    messageElement.appendChild(image);
  }
  // Show the card fading-in and scroll to view the new message.
  setTimeout(function() {div.classList.add('visible')}, 1);
  messageListElement.scrollTop = messageListElement.scrollHeight;
  messageInputElement.focus(); 
}

 
function removeDisplayMessage(){
   
  ulMessages.innerHTML = '';
    
}


// Enables or disables the submit button depending on the values of the input
// fields.
function toggleButton() { 
  if (messageInputElement.value) {
    submitButtonElement.removeAttribute('disabled');
  } else {
    submitButtonElement.setAttribute('disabled', 'true');
  }
}

// Checks that the Firebase SDK has been correctly setup and configured.
function checkSetup() {
  if (!window.firebase || !(firebase.app instanceof Function) || !firebase.app().options) {
    window.alert('You have not configured and imported the Firebase SDK. ' +
        'Make sure you go through the codelab setup instructions and make ' +
        'sure you are running the codelab using `firebase serve`');
  }
}

// Checks that Firebase has been imported.
checkSetup();

// Shortcuts to DOM Elements.
var messageListElement = document.getElementById('messages');
var messageListElement1 = document.getElementById('messages1');
var messageFormElement = document.getElementById('message-form');
var messageInputElement = document.getElementById('message');
var submitButtonElement = document.getElementById('submit');
var imageButtonElement = document.getElementById('submitImage');
var imageFormElement = document.getElementById('image-form');
var mediaCaptureElement = document.getElementById('mediaCapture');
var userPicElement = document.getElementById('user-pic');
var userNameElement = document.getElementById('user-name');
var signInButtonElement = document.getElementById('sign-in'); 
var signOutButtonElement = document.getElementById('sign-out');
var signInSnackbarElement = document.getElementById('must-signin-snackbar');

// Saves message on form submit.
messageFormElement.addEventListener('submit', onMessageFormSubmit);
signOutButtonElement.addEventListener('click', signOut);
signInButtonElement.addEventListener('click', signIn);

// Toggle for the button.
messageInputElement.addEventListener('keyup', toggleButton);
messageInputElement.addEventListener('change', toggleButton);

// Events for image upload.
imageButtonElement.addEventListener('click', function(e) {
  e.preventDefault();
  mediaCaptureElement.click();
});
mediaCaptureElement.addEventListener('change', onMediaFileSelected);

// initialize Firebase
initFirebaseAuth();

// We load currently existing chat messages and listen to new ones.
 



document.getElementById('message-form').style.display = "none";
var thread;
var partnerId;
var myId ;

 
