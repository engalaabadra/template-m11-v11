
<!DOCTYPE html>
<html dir="rtl">
<head>
    @yield('meta')

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8e9ef;
            margin: 0;
            padding: 0;
            direction: rtl;
        }
        .container {
            max-width: 780px;
            margin: 0 auto;
            background-color: #e2e8ed;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding-top: 5px;
        }
        .header-one {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }
        .header-two {
            margin: 10px 0;
        }
        .header-two a {
            text-decoration: none;
            color: #8383f0;
            font-size: 24px;
        }
        .header h1 {
            color: #274d70;
        }
        .header img {
            max-width: 100px;
        }
        .content {
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 15px;
            box-shadow: 5px 5px 9px #b4b4b4;
        }
        .content p {
            color: #838383;
            font-size: 16px;
            line-height: 2.3;
        }
        .otp {
            font-size: 24px;
            color: #274d70;
        }
        .footer {
            text-align: center;
            padding: 20px;
        }
        .footer p {
            color: #888;
        }
        .social-icons {
            margin-top: 20px;
        }
        .social-icons a {
            text-decoration: none;
            color: #446e94;
            margin: 0 10px;
            font-size: x-large;

        }
        .footer-name{
            color: #274d70;
        }
        .footer-link {
            color: #0a6aa1;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px; /* Set the width and height to make it a circle */
            height: 40px;
            border-radius: 50%; /* Create a circular shape */
            background-color: #f3f3f3; /* Set the background color */
            margin: 5px; /* Adjust the margin to your liking */
            transition: background-color 0.3s; /* Add a smooth hover effect */
        }

    </style>
        <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css')}}" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-one">
                <img src="https://template.net/assets/images/logo/logo_template.png" alt="Company Logo">
            </div>
            <div class="header-two">
                <a href="https://template.net">تلبينة</a>
            </div>
        </div>
        <div class="content">
