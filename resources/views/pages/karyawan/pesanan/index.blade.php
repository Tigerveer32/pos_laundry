@extends('layouts.karyawan')

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
                                    <th class="text-center">Aksi</th>
                                    <th class="text-center">Status Pesanan</th>
                                    <th class="text-center">Status Pembayaran</th>
                                    <th class="text-center">No Order</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">No Whatsapp</th>
                                    <th class="text-center">Paket Layanan</th>
                                    <th class="text-center">Harga Paket</th>
                                    <th class="text-center">Volume</th>
                                    <th class="text-center">Total Harga</th>
                                    <th class="text-center">Diskon</th>
                                    <th class="text-center">Total Diskon</th>
                                    <th class="text-center">Grand Total</th>
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
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('pesanan.edit', $tr->id) }}" class="btn btn-warning btn-sm rounded"><i
                                                        class="fas fa-edit"></i></a>
                                                &nbsp;
                                                <button class="btn btn-danger btn-sm rounded" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $tr->id }}"><i class="fas fa-trash"></i></button>

                                                <div class="modal fade" id="delete{{ $tr->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="alert alert-warning text-center" role="alert">
                                                                            Apakah anda yakin ingin menghapus data ini?s
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                <form action="{{ route('pesanan.destroy', $tr->id) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </td>
                                        <td>
                                                                        @if($tr->status_pesanan == 0)
                                                                        <span class="badge bg-danger">Menunggu Di Proses</span>
                                                                        @elseif($tr->status_pesanan == 1)
                                                                        <span class="badge bg-warning">Di Proses</span>
                                                                        @elseif($tr->status_pesanan == 2)
                                                                        <span class="badge bg-success">Pesanan Selesai</span>
                                                                        <br>
                                                                        <a href="https://api.whatsapp.com/send?phone={{ $tr->no_hp == null ? $tr->Pelanggan->no_hp : $tr->no_hp }}&text=Halo,%20Pesanan%20Laundry%20atas%20nama:%20{{ $tr->nama == null ? $tr->Pelanggan->nama_lengkap : $tr->nama }}%20siap%20di%20ambil."
                                                                            class="btn btn-success btn-sm rounded mt-2 mb-2"><i class="fa-brands fa-whatsapp"></i> Konfirmasi</a>
                                                                        @elseif($tr->status_pesanan == 3)
                                                                        <span class="badge bg-primary">Pesanan Di Ambil</span>
                                                                        @endif

                                                                            <br>
                                                                        <div class="btn-group">
                                                                            <button class="btn btn-warning btn-sm rounded mt-2" data-bs-toggle="modal" data-bs-target="#editstatus{{ $tr->id }}"
                                                                                type="button"><i class="fas fa-edit"></i></button>

                                                                            @if($tr->status_pesanan == 3)
                                                                            &nbsp;
                                                                                <a href="{{ route('invoice.show', $tr->id) }}" target="_blank" class="btn btn-primary btn-sm rounded mt-2">Invoice</a>
                                                                            @endif
                                                                        </div>

                                                                        <div class="modal fade" id="editstatus{{ $tr->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                                                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-primary text-white">
                                                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Status Pesanan</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body" style="text-align:left">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12">
                                                                                                <form action="{{ route('pesanan.status', $tr->id) }}" method="POST"
                                                                                                    enctype="multipart/form-data">
                                                                                                    @csrf
                                                                                                    @method('PUT')
                                                                                                    <div class="form-group mb-3">
                                                                                                        <label>Status pesanan:</label>
                                                                                                        <select name="status_pesanan"
                                                                                                            class="form-control {{ $errors->has('status_pesanan') ? 'is-invalid' : '' }}">
                                                                                                            <option value="0" {{ $tr->status_pesanan == 0 ? 'selected' : ''}}>Menunggu Di
                                                                                                                Proses</option>
                                                                                                            <option value="1" {{ $tr->status_pesanan == 1 ? 'selected' : ''}}>Di Proses
                                                                                                            </option>
                                                                                                            <option value="2" {{ $tr->status_pesanan == 2 ? 'selected' : ''}}>Pesanan
                                                                                                                Selesai</option>
                                                                                                            <option value="3" {{ $tr->status_pesanan == 3 ? 'selected' : ''}}>Pesanan Di
                                                                                                                Ambil</option>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div class="form-group">
                                                                                                        <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        @if($tr->status_pembayaran == 0)
                                                                        <span class="badge bg-danger">Belum Dibayar</span>
                                                                        @elseif ($tr->status_pembayaran == 1)
                                                                        <span class="badge bg-success">Lunas</span>
                                                                        @endif
                                                                    </td>
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
                                            Rp. {{ number_format($tr->Layanan->harga, 0) }} Per {{ $tr->Layanan->berat }} Kg/Pcs
                                        </td>
                                        <td>{{ $tr->berat }} Kg/Pcs</td>
                                        <td>Rp. {{ number_format($tr->total_harga, 0) }}</td>
                                        <td>
                                            @if($tr->diskon != null || $tr->diskon != "")
                                                {{ $tr->diskon }} %
                                            @else 
                                                --- 
                                            @endif
                                        </td>
                                        <td>
                                            @if($tr->diskon != null || $tr->diskon != "")
                                                Rp. {{ number_format($tr->total_diskon) }}
                                            @else
                                                ---
                                            @endif
                                        </td>
                                        <td>Rp. {{ number_format($tr->grand_total, 0) }}</td>
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
