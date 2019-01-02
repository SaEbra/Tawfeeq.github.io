/**
 * Copyright 2018 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
'use strict';

// Signs-in Friendly Chat.
function signIn() { 
   
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
        var countryCode = dialCode.split(":").pop(-1); //alert(countryCode);
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
          //console.log(anonymousUser);
          //console.log(JSON.stringify(anonymousUser));
          var anonymousUser =JSON.stringify(anonymousUser);
          //console.log(anonymousUser);
          //displayName  phoneNumber uid providerId lastLoginAt
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
  // TODO 1: Sign in Firebase with credential from the Google user.
} 

// Signs-out of Friendly Chat.
function signOut() {
  // Sign out of Firebase.
  firebase.auth().signOut();
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
  var anonymousUser = firebase.auth().currentUser;
    if (anonymousUser) {
        var anonymousUser =JSON.stringify(anonymousUser);
        var obj = JSON.parse(anonymousUser);
        var g=obj.phoneNumber;
        return g;
        //alert(obj.phoneNumber);
        
         
        
    }
}

// Returns true if a user is signed-in.
function isUserSignedIn() {
  return !!firebase.auth().currentUser;
}

// Loads chat message history and listens for upcoming ones.
function loadMessages() {
  // Loads the last 12 messages and listens for new ones.

  var callback = function(snap) {
    var data = snap.val();
    displayMessage(snap.key, data.name, data.text, data.profilePicUrl, data.imageUrl);
  };
  firebase.database().ref('/messages/+918975703780').limitToLast(12).on('child_added', callback);
  firebase.database().ref('/messages/+918975703780').limitToLast(12).on('child_changed', callback); 
}


// Saves a new message in the Realtime Database.
function saveMessage(messageText) {
  // Adds a new message entry to the Realtime Database.
  return firebase.database().ref('/messages/'+getUserName()).push({
    name: getUserName(),
    text: messageText,
    profilePicUrl: getProfilePicUrl()
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

// Requests permission to show notifications.
function requestNotificationsPermissions() {
  console.log('Requesting notifications permission...');
  firebase.messaging().requestPermission().then(function() {
    // Notification permission granted.
    saveMessagingDeviceToken();
  }).catch(function(error) {
    console.error('Unable to get permission to notify.', error);
  });
}

// Triggered when a file is selected via the media picker.
function onMediaFileSelected(event) {
  event.preventDefault();
  var file = event.target.files[0];

  // Clear the selection in the file picker input.
  imageFormElement1.reset();

  // Check if the file is an image.
  if (!file.type.match('image.*')) {
    var data = {
      message: 'You can only share images',
      timeout: 2000
    };
    signInSnackbarElement1.MaterialSnackbar.showSnackbar(data);
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
  if (messageInputElement1.value && checkSignedInWithMessage()) {
    saveMessage(messageInputElement1.value).then(function() {
      // Clear message text field and re-enable the SEND button.
      resetMaterialTextfield(messageInputElement1);
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
    userPicElement1.style.backgroundImage = 'url(' + profilePicUrl + ')';
    userNameElement1.textContent = userName;

    // Show user's profile and sign-out button.
    userNameElement1.removeAttribute('hidden');
    userPicElement1.removeAttribute('hidden');
    signOutButtonElement1.removeAttribute('hidden');

    // Hide sign-in button.
    signInButtonElement1.setAttribute('hidden', 'true');

    // We save the Firebase Messaging Device token and enable notifications.
    saveMessagingDeviceToken();
  } else { // User is signed out!
    // Hide user's profile and sign-out button.
    userNameElement1.setAttribute('hidden', 'true');
    userPicElement1.setAttribute('hidden', 'true');
    signOutButtonElement1.setAttribute('hidden', 'true');

    // Show sign-in button.
    signInButtonElement1.removeAttribute('hidden');
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
  signInSnackbarElement1.MaterialSnackbar.showSnackbar(data);
  return false;
}

// Resets the given MaterialTextField.
function resetMaterialTextfield(element) {
  element.value = '';
  element.parentNode.MaterialTextfield.boundUpdateClassesHandler();
}

// Template for messages.
var MESSAGE_TEMPLATE =
    '<div class="message-container">' +
      '<div class="spacing"><div class="pic"></div></div>' +
      '<div class="message"></div>' +
      '<div class="name"></div>' +
    '</div>'+'<br>';

// Adds a size to Google Profile pics URLs.
function addSizeToGoogleProfilePic(url) {
  if (url.indexOf('googleusercontent.com') !== -1 && url.indexOf('?') === -1) {
    return url + '?sz=150';
  }
  return url;
}

// A loading image URL.
var LOADING_IMAGE_URL = 'https://www.google.com/images/spin-32.gif?a';

// Displays a Message in the UI.
function displayMessage(key, name, text, picUrl, imageUrl) {
  var div = document.getElementById(key);
  // If an element for that message does not exists yet we create it.
  if (!div) {
    var container = document.createElement('div');
    container.innerHTML = MESSAGE_TEMPLATE;
    div = container.firstChild;
    div.setAttribute('id', key);
     messageListElement1.appendChild(div);
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
       messageListElement1.scrollTop =  messageListElement1.scrollHeight;
    });
    image.src = imageUrl + '&' + new Date().getTime();
    messageElement.innerHTML = '';
    messageElement.appendChild(image);
  }
  // Show the card fading-in and scroll to view the new message.
  setTimeout(function() {div.classList.add('visible')}, 1);
   messageListElement1.scrollTop =  messageListElement1.scrollHeight;
  //messageInputElement1.focus();
}

// Enables or disables the submit button depending on the values of the input
// fields.
function toggleButton() {
  if (messageInputElement1.value) {
    submitButtonElement1.removeAttribute('disabled');
  } else {
    submitButtonElement1.setAttribute('disabled', 'true');
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
var messageListElement1 = document.getElementById('messages1');
var messageFormElement1 = document.getElementById('message-form1');
//var messageInputElement1 = document.getElementById('message1');
var submitButtonElement1 = document.getElementById('submit1');
var imageButtonElement1 = document.getElementById('submitImage1');
var imageFormElement1 = document.getElementById('image-form1');
var mediaCaptureElement1 = document.getElementById('mediaCapture1');
var userPicElement1 = document.getElementById('user-pic1');
var userNameElement1 = document.getElementById('user-name1');
//var signInButtonElement1 = document.getElementById('sign-in1');
//var signOutButtonElement1 = document.getElementById('sign-out1');
//var signInSnackbarElement1 = document.getElementById('must-signin-snackbar1');

// Saves message on form submit.
//messageFormElement1.addEventListener('submit1', onMessageFormSubmit);
//signOutButtonElement1.addEventListener('click', signOut);
//signInButtonElement1.addEventListener('click', signIn);

// Toggle for the button.
//messageInputElement1.addEventListener('keyup', toggleButton);
//messageInputElement1.addEventListener('change', toggleButton);

// Events for image upload.
imageButtonElement1.addEventListener('click', function(e) {
  e.preventDefault();
  mediaCaptureElement1.click();
});
mediaCaptureElement1.addEventListener('change', onMediaFileSelected);

// initialize Firebase
initFirebaseAuth();

// We load currently existing chat messages and listen to new ones.
loadMessages();
