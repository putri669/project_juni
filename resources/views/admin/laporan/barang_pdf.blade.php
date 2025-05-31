<h3>Laporan Barang</h3>
<table border="1" width="100%" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $index => $barang)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $barang->item_name }}</td>
                <td>{{ $barang->category->category_name ?? '-' }}</td>
                <td>{{ $barang->stock }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
