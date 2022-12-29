@extends('layouts.app')

@section('title', $title)

@push('after-style')
    
@endpush

@section('content')
    
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.laporan.index') }}" method="GET" enctype="multipart/form-data">
                            <div class="row gy-3 gx-4 align-items-center">
                                <div class="col-auto">
                                    <div class="input-group">
                                        <div class="input-group-text" for="tgl1">Tanggal</div>
                                        <input type="date" name="tgl1" class="form-control" id="tgl1" value="{{ isset($_GET['tgl1']) ? $_GET['tgl1'] : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <h6>sampai</h6>
                                </div>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <div class="input-group-text" for="tgl2">Tanggal</div>
                                        <input type="date" name="tgl2" class="form-control" id="tgl2" value="{{ isset($_GET['tgl2']) ? $_GET['tgl2'] : '' }}" required>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success" type="submit">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @if(isset($_GET['tgl1']) && isset($_GET['tgl2']))
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" width="100%">
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
                                                <td>{{ $n }}.   </td>
                                                <td>{{ $l->Layanan->nama_layanan }}</td>
                                                <td>Rp. {{  number_format($l->Layanan->harga, 0) }}</td>
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
                            </div>
                        </div>
                    </div>

                    @if($omset !== 0)
                        <form action="{{ route('admin.laporan.store') }}" method="POST" enctype="multipart/form-data" target="_blank">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="tgl1" value="{{ isset($_GET['tgl1']) ? $_GET['tgl1'] : '' }}" readonly>
                            <input type="hidden" name="tgl2" value="{{ isset($_GET['tgl2']) ? $_GET['tgl2'] : '' }}" readonly>
                            <button type="submit" class="btn btn-primary btn-sm mt-2"><i class="fas fa-print"></i> Cetak Laporan</button>
                        </form>
                    @endif

                </div>
            </div>
        @endif



    </div>

@endsection

@push('after-script')

@endpush