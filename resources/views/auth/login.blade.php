<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #0d47a1;
            color: white;
        }
        .login-container {
            position: relative;
            z-index: 1;
            max-width: 400px;
            margin: 80px auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            backdrop-filter: blur(6px);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border-radius: 8px;
            border: none;
        }
        input {
            background-color: rgba(255,255,255,0.2);
            color: white;
        }
        button {
            background-color: #ff6f00;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #ffa000;
        }
    </style>
</head>
<body>
    <div id="tsparticles"></div>

    <div class="login-container">
        <h2>Welcome Back!</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label>Email address</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <div style="position: relative;">
                <input type="password" id="password" name="password" required>
                <span onclick="togglePassword()" style="position:absolute;right:10px;top:20px;cursor:pointer;color:#fff;">👁️</span>
            </div>

            <div style="margin-top: 10px;">
                <input type="checkbox" name="remember"> Remember me
                <a href="{{ route('password.request') }}" style="float:right;color:#bbdefb;">Forgot password?</a>
            </div>

            <button type="submit">Login</button>
            <p style="margin-top: 15px;">Don't have an account? <a href="{{ route('register') }}" style="color:#bbdefb;">Register</a></p>
        </form>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>

    <script>
        tsParticles.load("tsparticles", {
            fullScreen: { enable: false },
            background: { color: { value: "#0d47a1" } },
            fpsLimit: 60,
            interactivity: {
                events: {
                    onClick: { enable: true, mode: "push" },
                    onHover: { enable: true, mode: "repulse" },
                    resize: true
                },
                modes: {
                    push: { quantity: 4 },
                    repulse: { distance: 100, duration: 0.4 }
                }
            },
            particles: {
                color: { value: "#ffffff" },
                links: { color: "#ffffff", distance: 150, enable: true, opacity: 0.5, width: 1 },
                move: {
                    direction: "none", enable: true, outModes: { default: "bounce" },
                    random: false, speed: 2, straight: false
                },
                number: { density: { enable: true, area: 800 }, value: 50 },
                opacity: { value: 0.5 },
                shape: { type: "circle" },
                size: { value: { min: 1, max: 5 } }
            },
            detectRetina: true
        });
    </script>
</body>
</html>
