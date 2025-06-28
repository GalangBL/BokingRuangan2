<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Booking Ruangan</title>
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
        .booking-container {
            position: relative;
            z-index: 1;
            max-width: 1100px;
            margin: 60px auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            backdrop-filter: blur(6px);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px 10px;
            text-align: left;
        }
        thead th {
            background-color: #2a2a2a;
            color: #fff;
        }
        tbody td {
            background-color: rgba(30,30,30,0.7);
            color: #fff;
        }
        tbody tr:hover {
            background-color: #333333;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
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
        .btn-danger {
            background-color: #a33;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c44;
        }
        .btn-warning {
            background-color: #eab308;
            color: black;
        }
        .btn-warning:hover {
            background-color: #facc15;
        }
        .alert-success {
            background: rgba(76, 175, 80, 0.2);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
<div id="tsparticles"></div>
<div class="booking-container">
    <h1>Daftar Booking Ruangan</h1>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">+ Tambah Booking</a>
    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Nama Ruangan</th>
            <th>Tanggal</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Keperluan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($bookings as $index => $booking)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $booking->nama_pemesan }}</td>
            <td>{{ $booking->nama_ruangan }}</td>
            <td>{{ $booking->tanggal }}</td>
            <td>{{ $booking->waktu_mulai }}</td>
            <td>{{ $booking->waktu_selesai }}</td>
            <td>{{ $booking->keperluan }}</td>
            <td>
                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
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
