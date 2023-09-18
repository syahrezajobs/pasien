<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Income Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-center">Daftar Pasien</h3>
    <p class="text-center">Tanggal registrasi {{ $first }} sampai dengan tanggal {{ $last }}</p><br>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>No. RM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Hp</th>
                <th>Gender</th>
                <th>Dokter PJ</th>
                <th>Ruangan</th>
                <th>Penjamin</th>
                <th>Tgl Registrasi</th>
                <th>Tgl Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                @foreach ($row as $col)
                <td>{{ $col }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
