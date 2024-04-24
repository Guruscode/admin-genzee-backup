<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
            height: auto;
        }
        .content {
            margin-bottom: 30px;
        }
        .code {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }
        .cta {
            text-align: center;
        }
        .cta a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            color: #666;
        }
        p{
          text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="content">
        
            <p class="code">{{ $code }}</p>
        </div>
 
        <div class="footer">
            <p>We're excited to have you join us! You're just one step away from completing your registration and swipe your way to your desired match. <br>
                Please enter the code above to verify your email address and complete your registration. <br> We can't wait to see you join other amazing people waiting to connect!
<br>
                Thank you for choosing Genzee baddies 💜 </p>
        </div>
    </div>
</body>
</html>
