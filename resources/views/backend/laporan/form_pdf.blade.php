<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table td th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .mb-3 {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <h2>Data Laporan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Pendapatan</th>
                <th>Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $totalPendapatan = 0;
                $totalPengeluaran = 0;
            @endphp
            @foreach ($transaksi as $transaksiData)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksiData->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $transaksiData->kategori->nama }}</td>
                    <td>{{ $transaksiData->keterangan }}</td>
                    <td>
                        @if ($transaksiData->jenis == 'pendapatan')
                            {{ formatRupiah($transaksiData->nominal, true) }}
                            @php $totalPendapatan += $transaksiData->nominal; @endphp
                        @else
                            Rp. 0
                        @endif
                    </td>
                    <td>
                        @if ($transaksiData->jenis == 'pengeluaran')
                            {{ formatRupiah($transaksiData->nominal, true) }}
                            @php $totalPengeluaran += $transaksiData->nominal; @endphp
                        @else
                            Rp. 0
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-center"><strong>Sub Total</strong></td>
                <td><strong>{{ formatRupiah($totalPendapatan, true) }}</strong></td>
                <td><strong>{{ formatRupiah($totalPengeluaran, true) }}</strong></td>
            </tr>
        </tfoot>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
