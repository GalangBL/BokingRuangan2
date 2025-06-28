<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #263238;
            color: white;
        }
        #tsparticles {
            position: fixed;
            width: 100vw;
            height: 100vh;
            z-index: 0;
            top: 0;
            left: 0;
        }
        .dashboard-container {
            position: relative;
            z-index: 1;
            max-width: 650px;
            margin: 80px auto;
            background: rgba(255, 255, 255, 0.13);
            padding: 44px 36px 36px 36px;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            backdrop-filter: blur(8px);
            text-align: center;
        }
        .header-bar {
            display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;
        }
        .admin-title {
            font-size: 2em;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        .stat-box {
            background: rgba(255,255,255,0.15);
            border-radius: 10px;
            margin: 18px 0 10px 0;
            padding: 16px 0;
            font-size: 1.2em;
            font-weight: 500;
            color: #fff;
            box-shadow: 0 2px 8px 0 rgba(0,0,0,0.10);
        }
        .quick-links {
            display: flex;
            justify-content: center;
            gap: 18px;
            margin: 28px 0 18px 0;
        }
        .quick-link {
            background: rgba(255,255,255,0.18);
            color: #fff;
            border-radius: 10px;
            padding: 18px 22px;
            text-decoration: none;
            font-size: 1.05em;
            font-weight: 500;
            box-shadow: 0 2px 8px 0 rgba(0,0,0,0.10);
            transition: background 0.2s;
        }
        .quick-link:hover {
            background: #ff6f00;
            color: #fff;
        }
        .btn-logout {
            background:#e53935;color:#fff;border:none;padding:8px 18px;border-radius:8px;font-size:1em;cursor:pointer;box-shadow:0 2px 8px 0 rgba(0,0,0,0.10);transition:background 0.2s;min-width:90px;
        }
        .btn-logout:hover {
            background:#b71c1c;
        }
    </style>
</head>
<body>
<div id="tsparticles"></div>
<div class="dashboard-container">
    <div class="header-bar">
        <div></div>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>
    <div class="admin-title">Dashboard Admin</div>
    <div style="font-size:1.1em;color:#ffe082;margin-bottom:24px;font-weight:500;">Selamat datang, Admin!<br>Kelola data user dan booking ruangan di sini.</div>
    <div class="stat-box">
        👤 Total User: <b>{{ $userCount }}</b>
    </div>
    <div class="stat-box">
        📅 Total Booking: <b>{{ $bookingCount }}</b>
    </div>
    <div class="quick-links">
        <a href="#" class="quick-link">👥 Manajemen User</a>
        <a href="{{ route('bookings.index') }}" class="quick-link">📅 Daftar Booking</a>
        <a href="{{ route('bookings.create') }}" class="quick-link">➕ Booking Baru</a>
    </div>
</div>
<script>
    tsParticles.load("tsparticles", {
        fullScreen: { enable: false },
        background: { color: { value: "#263238" } },
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