<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <h3 style="text-align: center">Cetak Laporan Omset Laundry</h3>
    <h5>Tanggal: {{ $tgl1 }} sampai {{ $tgl2 }}</h5>
    <table class="table table-bordered text-center" border="1" style="text-align:center;" width="100%">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Layanan</th>
                <th>Harga Per Kg</th>
                <th>Berat</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @php
            $n=1;
            @endphp
            @forelse ($laporan as $l)
            <tr>
                <td>{{ $n }}. </td>
                <td>{{ $l->Layanan->nama_layanan }}</td>
                <td>Rp. {{ number_format($l->Layanan->harga, 0) }}</td>
                <td>{{ $l->berat }} Kg</td>
                <td>Rp. {{ number_format($l->total_harga) }}</td>
            </tr>
            @php
            $n++;
            @endphp
            @empty
            <tr>
                <td colspan="5" class="fw-bold text-center">Data tidak di temukan !</td>
            </tr>
            @endforelse
            @if($omset !== 0)
            <tr>
                <td colspan="4"> Total Omset</td>
                <td>Rp. {{ number_format($omset, 0) }}</td>
            </tr>
            @endif
        </tbody>
    </table>
</body>
</html>

<script>
    window.print();
</script>