<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PRMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .logo {
            margin-top: 50px;
            width: 150px;
            margin-bottom: 50px;
        }

        h1 {
            font-size: 40px;
            margin-bottom: 20px;
            margin-top: 20px;
            color: #333;
        }

        p {
            font-size: 20px;
            margin-bottom: 50px;
            color: #666;
        }

        .login-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 24px;
            font-size: 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            z-index: 1;
        }

        .page-image {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            margin-top: 5px; 
        }
    </style>
</head>

<body>

    <div class="container">
        <img src="jmclogo.png" alt="PRMS Logo" class="logo">
        <h1>Welcome to JMCFI Patient Record Management System</h1>
        <p>A platform to manage patient records efficiently.</p>
        <a href="login.php" class="login-btn">Login</a>
    </div>

    <div class="footer">
        &copy; 2024 Patient Record Management System. All rights reserved.
    </div>

    <img src="clinicbg.png" alt="PRMS Image" class="page-image">
</body>

</html>
