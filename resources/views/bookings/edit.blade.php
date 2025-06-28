<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #f1f1f1;
        }
        .form-control, .form-select, textarea {
            background-color: #1e1e1e;
            color: #fff;
            border: 1px solid #333;
        }
        label {
            margin-top: 15px;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #6c63ff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #574bff;
        }
        a {
            color: #facc15;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">Edit Booking Ruangan</h1>

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_pemesan">Nama Pemesan:</label>
            <input type="text" name="nama_pemesan" class="form-control" value="{{ $booking->nama_pemesan }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_ruangan">Nama Ruangan:</label>
            <input type="text" name="nama_ruangan" class="form-control" value="{{ $booking->nama_ruangan }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $booking->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="waktu_mulai">Waktu Mulai:</label>
            <input type="time" name="waktu_mulai" class="form-control" value="{{ $booking->waktu_mulai }}" required>
        </div>

        <div class="mb-3">
            <label for="waktu_selesai">Waktu Selesai:</label>
            <input type="time" name="waktu_selesai" class="form-control" value="{{ $booking->waktu_selesai }}" required>
        </div>

        <div class="mb-3">
            <label for="keperluan">Keperluan:</label>
            <textarea name="keperluan" rows="4" class="form-control" required>{{ $booking->keperluan }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('bookings.index') }}" class="ms-3">← Kembali ke Daftar Booking</a>
    </form>
</div>
</body>
</html>
