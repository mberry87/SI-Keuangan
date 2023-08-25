<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabel Hasil Laporan</h3>
    </div>
    <div class="card-body">
        <div class="row mt-3">
            <div class="col">
                <table id="example2" class="table table-bordered table-hover">
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
                                <td>{{ \Carbon\Carbon::parse($transaksiData->tanggal)->format('d-m-Y') }}
                                </td>
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
            </div>
        </div>
    </div>
</div>
