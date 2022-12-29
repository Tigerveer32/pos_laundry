@extends('layouts.app')

@section('title', $title)

@push('after-style')

@endpush

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">

                    <table id="transaksi" class="table table-striped text-center" width="100%">
                        <thead class="text-center">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">No Order</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">No Whatsapp</th>
                                <th class="text-center">Paket Layanan</th>
                                <th class="text-center">Harga Paket</th>
                                <th class="text-center">Volume</th>
                                <th class="text-center">Total Harga</th>
                                <th class="text-center">Status Pesanan</th>
                                <th class="text-center">Status Pembayaran</th>
                                <th class="text-center">Alamat</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php
                            $n=1;
                            @endphp
                            @foreach ($transaksi as $tr)
                            <tr>
                                <td>{{ $n }}.</td>
                                <td>{{ $tr->no_order }}</td>
                                <td>
                                    @if($tr->nama == null)
                                    {{ $tr->Pelanggan->nama_lengkap }} | {{ $tr->Pelanggan->kode_member }}
                                    @else
                                    {{ $tr->nama }}
                                    @endif
                                </td>
                                <td>
                                    @if($tr->no_hp == null)
                                    {{ $tr->Pelanggan->no_hp }}
                                    @else
                                    {{ $tr->no_hp }}
                                    @endif
                                </td>
                                <td>
                                    {{ $tr->Layanan->nama_layanan }}
                                </td>
                                <td>
                                    Rp. {{ number_format($tr->Layanan->harga, 0) }} / {{ $tr->Layanan->berat }} Kg/Pcs
                                </td>
                                <td>{{ $tr->berat }} Kg/Pcs</td>
                                <td>Rp. {{ number_format($tr->total_harga, 0) }}</td>
                                <td>
                                    @if($tr->status_pesanan == 0)
                                    <span class="badge bg-danger">Menunggu Di Proses</span>
                                    @elseif($tr->status_pesanan == 1)
                                    <span class="badge bg-warning">Di Proses</span>
                                    @elseif($tr->status_pesanan == 2)
                                    <span class="badge bg-success">Pesanan Selesai</span>
                                    @elseif($tr->status_pesanan == 3)
                                    <span class="badge bg-primary">Pesanan Di Ambil</span>
                                    @endif

                                </td>
                                <td>
                                    @if($tr->status_pembayaran == 0)
                                    <span class="badge bg-danger">Belum Dibayar</span>
                                    @elseif ($tr->status_pembayaran == 1)
                                    <span class="badge bg-success">Lunas</span>
                                    @endif
                                </td>
                                <td>
                                    @if($tr->alamat == null)
                                    {{ $tr->Pelanggan->alamat }}
                                    @else
                                    {{ $tr->alamat }}
                                    @endif
                                </td>
                            </tr>
                            @php
                            $n++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@push('after-script')
<script>
    $(document).ready(function () {
            $('#transaksi').DataTable();
        });
</script>
@endpush