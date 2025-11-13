<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{asset('img/icon.ico')}}" type="image/x-icon" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&family=Nunito:wght@200..1000&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
            font-family:"Nunito";
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #242529;
            padding: 20px;
        }

        .container {
            border-radius: 10px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            display: flex;
        }

        .left-panel {
            width: 50%;
            background: #31343A;
            color: white;
            padding: 90px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left-panel h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .left-panel p {
            text-align: center;
            font-size: 1.2rem;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 40px;
        }

        .social-login {
            margin-top: auto;
        }

        .social-login p {
            font-size: 0.85rem;
            margin-bottom: 15px;
        }

        .social-buttons {
            display: flex;
            gap: 10px;
        }

        .social-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .facebook-btn {
            background: #1877f2;
        }

        .facebook-btn:hover {
            background: #145dbf;
        }

        .twitter-btn {
            background: #1da1f2;
        }

        .twitter-btn:hover {
            background: #0d8bd9;
        }

        .right-panel {
            width: 50%;
            padding: 90px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .right-panel h2 {
            font-size: 2rem;
            font-weight: 900;
            margin-bottom: 30px;
            color: #333;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 15px 0;
            border: none;
            border-bottom: 3px solid #ddd;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-group input:focus {
            border-bottom-color: #F4C300;
        }

        .submit-btn {
            display: block;
            margin: 30px auto 0;
            padding: 12px 50px;
            background: #F4C300;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
            font-family: "Nunito" ;
            font-weight: 600;
        }

        .submit-btn:hover {
            background: #dab10eff;
        }

        .register-link {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #666;
        }

        .register-link a {
            color: #F4C300;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left-panel,
            .right-panel {
                width: 100%;
            }

            .left-panel {
                padding: 40px 30px;
            }

            .right-panel {
                padding: 40px 30px;
            }

            .left-panel h1 {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Panel -->
        <div class="left-panel">
            <img src="{{asset('img/logo-light.png')}}" alt="">
        </div>

        <!-- Right Panel -->
        <div class="right-panel">
            <h2>Login</h2>
            <div class="input-group">
                <input type="text" placeholder="Username">
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password">
            </div>
            <button class="submit-btn" onclick="window.location.href='/dashboard'">Sign In</button>
            <p class="register-link">
                Don't have an account? <a href="#">Sign Up</a>
            </p>
        </div>
    </div>
</body>
</html>