<!DOCTYPE html>
<html>
<head>
    <title>Firebase Phone Verification</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <style>
      html,
      body {
          display: flex;
          justify-content: center;
          font-family: Roboto, Arial, sans-serif;
          font-size: 15px;
      }

      form {
          border: 5px solid #f1f1f1;
      }

      input[type=text],
      input[type=password] {
          width: 100%;
          padding: 16px 8px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
      }

      button {
          background-color: #8ebf42;
          color: white;
          padding: 14px 0;
          margin: 10px 0;
          border: none;
          cursor: grabbing;
          width: 100%;
      }

      h1 {
          text-align: center;
          fone-size: 18;
      }

      button:hover {
          opacity: 0.8;
      }

      .formcontainer {
          text-align: left;
          margin: 24px 50px 12px;
      }

      .container {
          padding: 16px 0;
          text-align: left;
      }

      span.psw {
          float: right;
          padding-top: 0;
          padding-right: 15px;
      }


      /* Change styles for span on extra small screens */

      @media screen and (max-width: 300px) {
          span.psw {
              display: block;
              float: none;
          }
      }

  </style>

</head>
<body>
<form >
    <h1>Firebase Phone verification In PHP</h1>
    <div class="formcontainer">
        <hr/>
        <div class="container">
            <label for="uname"><strong>Phone Number</strong></label>
            <input type="text" id="number" placeholder="Enter phone number" name="uname" required>
        </div>
        <div id="recaptcha-container"></div>
        <button type="button" onclick="phoneAuth();">Send Otp</button>
    </div>

</form>
<form >
    <h1>Firebase Phone verification In PHP</h1>
    <div class="formcontainer">
        <hr/>
        <div class="container">
            <input type="text" id="verificationCode" placeholder="Enter verification code">

        </div>

        <button type="button" onclick="codeverify();">Verify code</button>
    </div>

</form>


<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
<script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.2/firebase-app.js";

    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.2/firebase-analytics.js";


    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDv47Qteh1YrtfqT3pwkeIs1u27YJYdKK4",

        authDomain: "laravel-c8e73.firebaseapp.com",

        projectId: "laravel-c8e73",

        storageBucket: "laravel-c8e73.appspot.com",

        messagingSenderId: "661863496669",

        appId: "1:661863496669:web:d936e856769c41919a9434",

        measurementId: "G-WT2ZS0EQ9H"

    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);

    const analytics = getAnalytics(app);

</script>
<script>
    window.onload = function() {
        render();
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }

    function phoneAuth() {
        //get the number
        var number = document.getElementById('number').value;
        // alert(number);
        //it takes two parameter first one is number and second one is recaptcha
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
            //s is in lowercase
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            alert("Message sent");
        }).catch(function(error) {
            alert(error.message);
        });
    }

    function codeverify() {
        var code = document.getElementById('verificationCode').value;


        coderesult.confirm(code).then(function(result) {
            alert("Successfully registered");
            var user = result.user;
            console.log(user);
        }).catch(function(error) {
            alert(error.message);
        });
    }

</script>
</body>
</html>
