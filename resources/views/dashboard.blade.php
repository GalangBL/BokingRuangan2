<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #0d47a1;
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
            max-width: 600px;
            margin: 80px auto;
            background: rgba(255, 255, 255, 0.13);
            padding: 44px 36px 36px 36px;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            backdrop-filter: blur(8px);
            text-align: center;
        }
        .welcome-title {
            font-size: 2.2em;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        .desc {
            font-size: 1.1em;
            color: #e3e3e3;
            margin-bottom: 24px;
        }
        .profile-img {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ff6f00;
            margin-bottom: 16px;
            background: #fff;
        }
        .upload-form {
            margin-top: 10px;
            margin-bottom: 18px;
        }
        .upload-form input[type="file"] {
            color: #fff;
            margin-bottom: 8px;
        }
        .upload-form button {
            background-color: #eab308;
            color: #222;
            border: none;
            border-radius: 8px;
            padding: 7px 18px;
            font-size: 1em;
            cursor: pointer;
            margin-left: 8px;
        }
        .upload-form button:hover {
            background-color: #facc15;
        }
        .success-msg {
            background: rgba(76, 175, 80, 0.2);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            margin-bottom: 16px;
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
        .tips {
            background: rgba(255,255,255,0.10);
            border-radius: 10px;
            padding: 16px 18px;
            margin-top: 18px;
            color: #ffe082;
            font-size: 1em;
            text-align: left;
        }
        .btn {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 8px;
            border: none;
            font-size: 1.1em;
            cursor: pointer;
            margin-top: 24px;
            background-color: #ff6f00;
            color: white;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background-color: #ffa000;
        }
    </style>
</head>
<body>
<div id="tsparticles"></div>
<div class="dashboard-container">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;">
        <div></div>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="background:#e53935;color:#fff;border:none;padding:8px 18px;border-radius:8px;font-size:1em;cursor:pointer;box-shadow:0 2px 8px 0 rgba(0,0,0,0.10);transition:background 0.2s;min-width:90px;">Logout</button>
        </form>
    </div>
    <div class="welcome-title">Selamat Datang di Website Booking Ruangan</div>
    <div class="desc">Aplikasi ini memudahkan Anda untuk memesan, mengelola, dan memantau penggunaan ruangan secara online.<br>Silakan manfaatkan fitur-fitur di bawah ini!</div>

    {{-- Galeri Contoh Ruangan --}}
    <div style="margin-bottom: 32px;">
        <div style="font-size:1.1em;color:#ffe082;margin-bottom:10px;font-weight:500;">Contoh ruangan yang bisa Anda pesan:</div>
        <div style="display: flex; flex-wrap: wrap; gap: 18px; justify-content: center;">
            <div style="flex:1 1 220px; max-width: 260px; min-width: 180px; background:rgba(255,255,255,0.08); border-radius:12px; box-shadow:0 2px 8px 0 rgba(0,0,0,0.10); padding:12px 10px 18px 10px; text-align:center;">
                <img src="/images/desain-interior-ruang-tamu-3.jpg" alt="Contoh Ruangan 1" style="width:100%;border-radius:10px;box-shadow:0 2px 8px 0 rgba(0,0,0,0.10);margin-bottom:8px;">
                <div style="color:#ffe082;font-size:0.98em;">Ruang Meeting Modern</div>
            </div>
            <div style="flex:1 1 220px; max-width: 260px; min-width: 180px; background:rgba(255,255,255,0.08); border-radius:12px; box-shadow:0 2px 8px 0 rgba(0,0,0,0.10); padding:12px 10px 18px 10px; text-align:center;">
                <img src="/images/32031ce290a75394c18d888b9ebda758.jpg" alt="Contoh Ruangan 2" style="width:100%;border-radius:10px;box-shadow:0 2px 8px 0 rgba(0,0,0,0.10);margin-bottom:8px;">
                <div style="color:#ffe082;font-size:0.98em;">Ruang Diskusi Santai</div>
            </div>
            <div style="flex:1 1 220px; max-width: 260px; min-width: 180px; background:rgba(255,255,255,0.08); border-radius:12px; box-shadow:0 2px 8px 0 rgba(0,0,0,0.10); padding:12px 10px 18px 10px; text-align:center;">
                <img src="/images/Model Ruang Tamu 3x3 Minimalis.jpg" alt="Contoh Ruangan 3" style="width:100%;border-radius:10px;box-shadow:0 2px 8px 0 rgba(0,0,0,0.10);margin-bottom:8px;">
                <div style="color:#ffe082;font-size:0.98em;">Ruang Presentasi</div>
            </div>
        </div>
    </div>

    {{-- Foto Profil --}}
    @if (session('success'))
        <div class="success-msg">{{ session('success') }}</div>
    @endif
    @if(Auth::user()->profile_image)
        <img src="{{ asset('storage/profile/' . Auth::user()->profile_image) }}" alt="Foto Profil" class="profile-img">
    @else
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0d47a1&color=fff&size=128" alt="Foto Profil" class="profile-img">
    @endif
    <form class="upload-form" action="{{ route('dashboard.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="profile_image" accept="image/*" required>
        <button type="submit">Upload Foto</button>
    </form>

    {{-- Statistik Booking --}}
    <div class="stat-box">
        <span>👥</span> Booking Anda: <b>{{ $bookingCount }}</b>
    </div>

    {{-- Quick Links --}}
    <div class="quick-links">
        <a href="{{ route('bookings.index') }}" class="quick-link">📅 Daftar Booking</a>
        <a href="{{ route('bookings.create') }}" class="quick-link">➕ Booking Baru</a>
        <a href="https://calendar.google.com/" target="_blank" class="quick-link">🗓️ Google Calendar</a>
    </div>

    {{-- Tips Penggunaan --}}
    <div class="tips">
        <b>Tips Penggunaan:</b>
        <ul style="margin: 8px 0 0 18px;">
            <li>Upload foto profil agar admin mudah mengenali Anda.</li>
            <li>Gunakan fitur <b>Booking Baru</b> untuk memesan ruangan dengan cepat.</li>
            <li>Cek status booking Anda secara berkala di <b>Daftar Booking</b>.</li>
            <li>Sinkronkan jadwal dengan Google Calendar untuk pengingat otomatis.</li>
        </ul>
    </div>
</div>
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