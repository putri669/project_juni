<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Peminjaman Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Detail Barang</th>
                <th>Status</th>
                <th>Tanggal Peminjaman</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $index => $pinjam)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pinjam->user->name ?? 'User tidak ditemukan' }}</td>
                <td>
                    @php
                        $details = $pinjam->detailsBorrow;
                        $items = $details->map(function($d) {
                            return ($d->detailBarang->item_name ?? '-') . ' (Qty: ' . ($d->amount ?? '-') . ')';
                        })->toArray();
                    @endphp
                    {{ implode(', ', $items) }}
                </td>
                <td>{{ ucfirst($pinjam->status) }}</td>
                <td>{{ \Carbon\Carbon::parse($pinjam->date_borrowed)->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
