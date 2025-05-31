<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengembalian</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
        img { max-width: 60px; max-height: 60px; }
    </style>
</head>
<body>
    <h2>Laporan Pengembalian Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Barang Dikembalikan</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengembalian as $index => $return)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    {{ $return->borrowed->detailsBorrow->first()->detailBarang->name ?? '-' }}
                </td>
                <td>{{ $return->description }}</td>
                <td>{{ ucfirst($return->status) }}</td>
                <td>{{ \Carbon\Carbon::parse($return->date_return)->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
