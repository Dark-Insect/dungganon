<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Email Title</title>
    <style>
        /* Add your custom styles here */

        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            text-align: center;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 0;
            background-color: #FCFCFC;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e2e2;
        }
        .outer-container{
          width: 100%;
          background-color: #f2f2f4;
          padding-top: 3rem;
          padding-bottom: 3rem;
        }


        h1 {
          color: #94c93f;
          font-family: 'Arial, Helvetica, sans-serif';
          text-align: center;
          margin: 10px 0;
          text-transform: uppercase;
        }
        .brand-logo{
          padding: 1rem 0;
          width:100%;
          background-color: white;
        }
        .brand-logo img{
          margin: 0 auto;
        }
        .email-content{
          padding: 20px;
          text-align: left;
          font-size: 20px;
          background-color: #94c93f;
        }
        p {
            color: white;
            font-family: 'Arial, Helvetica, sans-serif';
            font-weight: 100;
        }
        span{
          font-weight: bold !important;
          text-transform: uppercase;
        }
        li{
          color: white;
        }
    </style>
</head>
<body>
    <div class="outer-container">
      <div class="container">
        <div class="brand-logo">
          <center><img src="https://nwtf.org.ph/wp-content/uploads/2020/07/NWTFi-Logo.png" alt=""></center>
          <h1>Reminder</h1>
        </div>
        
        
        <div class="email-content">
          <p>Hi {{ $name }}</p>
          <p>We're thrilled to welcome you to the Dungganon Loan family!</p>
          <p>Getting started on your financial journey is exciting, and we're here to support you every step of the way. Whether you're looking to consolidate debt, finance a dream project, or simply gain access to quick funding, our convenient online platform and wide range of loan options are designed to empower your financial freedom.</p>
          <p>Here's what you can do with your account:</p>
          <ul>
            <li>Apply Loan Online</li>
            <li>Monitor Weekly Payments</li>
            <li>Track Loans</li>
            <li>Check Balance</li>
          </ul>
          <p>To get started, kindly open up the link below to login.</p>
          <br>
            <a href="{{ route('login') }}" style="font-size: 15px;text-decoration: none;color: white;background: #0069d9;width: fit-content;padding: 10px 31px;border-radius: 5px;text-align: center;">Login</a>
            <br>
        </div>
      </div>
    </div>
</body>
</html>