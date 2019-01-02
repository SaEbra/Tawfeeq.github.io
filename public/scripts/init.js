if (typeof firebase === 'undefined') throw new Error('hosting/init-error: Firebase SDK not detected. You must include it before /__/firebase/init.js');
firebase.initializeApp({
  "apiKey": "AIzaSyA784TeHg165cMfYeIjQKKUbGGqVZ059fI",
  "databaseURL": "https://tawfeeq-zawaj.firebaseio.com",
  "storageBucket": "tawfeeq-zawaj.appspot.com",
  "authDomain": "tawfeeq-zawaj.firebaseapp.com",
  "messagingSenderId": "782308136691",
  "projectId": "tawfeeq-zawaj"
});