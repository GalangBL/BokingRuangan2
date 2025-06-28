<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Booking</title>
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
        .form-container {
            position: relative;
            z-index: 1;
            max-width: 500px;
            margin: 60px auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px 32px;
            border-radius: 12px;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            backdrop-filter: blur(6px);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
        }
        input[type="text"],
        input[type="date"],
        input[type="time"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: none;
            background-color: rgba(255,255,255,0.2);
            color: white;
            font-size: 1em;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="time"]:focus,
        textarea:focus {
            outline: none;
            background-color: rgba(255,255,255,0.3);
        }
        textarea {
            resize: vertical;
        }
        .btn {
            display: inline-block;
            padding: 10px 22px;
            border-radius: 8px;
            border: none;
            font-size: 1em;
            cursor: pointer;
            margin-right: 4px;
            margin-bottom: 2px;
            transition: background 0.3s ease;
        }
        .btn-primary {
            background-color: #ff6f00;
            color: white;
        }
        .btn-primary:hover {
            background-color: #ffa000;
        }
        .btn-secondary {
            background-color: #eab308;
            color: black;
        }
        .btn-secondary:hover {
            background-color: #facc15;
        }
        .alert-danger {
            background: rgba(220, 38, 38, 0.2);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            margin-bottom: 16px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
<div id="tsparticles"></div>
<div class="form-container">
    <h2>Form Tambah Booking</h2>
    @if ($errors->any())
        <div class="alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <label for="nama_pemesan">Nama Pemesan</label>
        <input type="text" id="nama_pemesan" name="nama_pemesan" required>

        <label for="nama_ruangan">Nama Ruangan</label>
        <input type="text" id="nama_ruangan" name="nama_ruangan" required>

        <label for="tanggal">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" required>

        <div style="display: flex; gap: 12px;">
            <div style="flex:1;">
                <label for="waktu_mulai">Waktu Mulai</label>
                <input type="time" id="waktu_mulai" name="waktu_mulai" required>
            </div>
            <div style="flex:1;">
                <label for="waktu_selesai">Waktu Selesai</label>
                <input type="time" id="waktu_selesai" name="waktu_selesai" required>
            </div>
        </div>

        <label for="keperluan">Keperluan</label>
        <textarea id="keperluan" name="keperluan" rows="3" required></textarea>

        <div class="form-actions">
            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">← Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
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
