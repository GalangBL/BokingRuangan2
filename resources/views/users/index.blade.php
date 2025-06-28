<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #263238;
            color: white;
        }
        .container {
            max-width: 900px;
            margin: 60px auto;
            background: rgba(255,255,255,0.13);
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            padding: 36px 28px 28px 28px;
            backdrop-filter: blur(8px);
        }
        h2 {
            text-align: center;
            margin-bottom: 28px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }
        th, td {
            padding: 12px 10px;
            text-align: left;
        }
        thead th {
            background-color: #37474f;
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
            padding: 7px 16px;
            border-radius: 8px;
            border: none;
            font-size: 1em;
            cursor: pointer;
            margin-right: 4px;
            margin-bottom: 2px;
            transition: background 0.3s ease;
        }
        .btn-edit {
            background-color: #eab308;
            color: black;
        }
        .btn-edit:hover {
            background-color: #facc15;
        }
        .btn-delete {
            background-color: #e53935;
            color: white;
        }
        .btn-delete:hover {
            background-color: #b71c1c;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 18px;
            color: #ffe082;
            text-decoration: none;
            font-size: 1em;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <a href="{{ route('admin.dashboard') }}" class="back-link">← Kembali ke Dashboard Admin</a>
    <h2>Manajemen User</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="#" class="btn btn-edit">Edit</a>
                    <form action="#" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin hapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html> 