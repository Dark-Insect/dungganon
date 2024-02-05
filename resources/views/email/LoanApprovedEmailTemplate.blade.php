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
          <p>Dear {{ $name }},</p>
          <p>We are thrilled to inform you that your application for a {{ $loan_purpose }} loan for ₱{{ $loan_amount }} has been approved! We appreciate your interest in choosing us as your financial partner and are happy to support you in achieving your financial goals.</p>
          <p>Your Loan Details:</p>
          <ul>
            <li>Loan Amount: ₱{{ $loan_amount }}</li>
            <li>Interest Rate: ₱{{ $interest }}</li>
            <li>Loan Term: {{ $loan_term }}</li>
            <li>Weekly Payments: ₱{{ $weekly }}</li>
          </ul>
        </div>
      </div>
    </div>
</body>
</html>