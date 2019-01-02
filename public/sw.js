importScripts('https://www.gstatic.com/firebasejs/5.5.8/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.5.8/firebase-messaging.js');
//importScripts('/__/firebase/5.5.8/firebase-auth.js');
//importScripts('/__/firebase/5.5.8/firebase-database.js');
//importScripts('/__/firebase/5.5.8/firebase-storage.js');
importScripts('/scripts/init.js');

//messaging.usePublicVapidKey("BGSgsZ2WgURORR8C-ruWw2qjyrzUBIKNDxrgWc0EJuFachd0CjhgYztB36CB_RwLQZMz-EQ3Fms-_YZO60Kcqxs");
firebase.messaging();
// Get Instance ID token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.
messaging.getToken().then(function(currentToken) {
    if (currentToken) {
      sendTokenToServer(currentToken);
      updateUIForPushEnabled(currentToken);
    } else {
      // Show permission request.
      console.log('No Instance ID token available. Request permission to generate one.');
      // Show permission UI.
      updateUIForPushPermissionRequired();
      setTokenSentToServer(false);
    }
  }).catch(function(err) {
    console.log('An error occurred while retrieving token. ', err);
    showToken('Error retrieving Instance ID token. ', err);
    setTokenSentToServer(false);
  });
// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
