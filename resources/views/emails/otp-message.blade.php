<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8e9ef;
            margin: 0;
            padding: 0;
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
{{--    <link rel="stylesheet" href="{{asset('assets/css/fontawesome/fontawesome-all.css')}}" />--}}
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css')}}" integrity="sha512-KOWhIs2d8WrPgR4lTaFgxI35LLOp5PRki/DxQvb7mlP29YZ5iJ5v8tiLWF7JLk5nDBlgPP1gHzw96cZ77oD7zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{--    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css')}}" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
</head>
<body>
<div class="container">
    <div class="header">
        <div class="header-one">
            <img src="{{asset('dashboard_assets/Template.png')}}" alt="Company Logo">
            <h1>Template Medical</h1>
        </div>
        <div class="header-two">
            <a href="#">www.Template.Com</a>
        </div>
    </div>
    <div class="content">
        <p>Hello,</p>
        <p>Your OTP code is: <span class="otp">Talb-5674</span></p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and scrambled it to make a type
            specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was popularised in
            the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
            and more recently with desktop publishing software like Aldus PageMaker including
            versions of Lorem Ipsum</p>
    </div>
    <div class="footer">
        <p>Copyright &copy; 2023 <span class="footer-name">Template.</span> All rights reserved</p>
        <p>Template Made by <span class="footer-link">i3mal.com</span></p>
        <div class="social-icons">
            <a href="https://www.facebook.com/TemplateApp" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/Templateco" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/templateco/" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UC9E9CQeyAkiWYjPqSG7FS_A" target="_blank" class="social-icon"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>
</body>
</html>
