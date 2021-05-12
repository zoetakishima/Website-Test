var app_firebase ={};

(function(){

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyCbMTL2BhEfoOdncRgI854jX987Dai_Xlk",
        authDomain: "test-d03f2.firebaseapp.com",
        databaseURL: "https://test-d03f2-default-rtdb.firebaseio.com",
        projectId: "test-d03f2",
        storageBucket: "test-d03f2.appspot.com",
        messagingSenderId: "357504336828",
        appId: "1:357504336828:web:5c971d8c12f60a95b321b9",
        measurementId: "G-WJN5JVQPSM"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

    app_firebase = firebase;
})()

