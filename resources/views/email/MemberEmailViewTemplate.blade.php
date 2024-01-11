<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting->mail_title }}</title>
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
            margin-bottom: 2rem;
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

        .btn{
          background-color: #94c93f;
          padding: 9px 16px;
          margin-top: 2rem;
          text-decoration: none;
          color: white;
          border-radius: 5px;
        }
        .btn:hover{
          background-color: #a5ec31;
        }
    </style>
</head>
<body>
    <div class="outer-container">
      <div class="container">
        <div class="brand-logo">
          <center><img src="https://nwtf.org.ph/wp-content/uploads/2020/07/NWTFi-Logo.png" alt=""></center>
          <h1>{{ $setting->mail_title }}</h1>
        </div>
        
        
        <div class="email-content">
          <p>Dear {{ $first }},</p>
          <p>This is a friendly reminder that you have a payment on going for our <span>Dungganon Siaton Branch</span> account and it is due today, {{ $date }}.</p>
          <p>We understand that things can get busy, and sometimes deadlines slip our minds. We just wanted to give you a gentle nudge to ensure you have the opportunity to make your payment today and avoid any potential late fees or penalties.</p>
          <p>Thank you for your attention to this matter. We appreciate your timely payment and continued business with <span>Dungganon Siaton Branch</span>.</p>
        </div>
      </div>

      <a class="btn" href="{{ route('member.mail.index') }}">Go Back</a>
    </div>
</body>
</html>