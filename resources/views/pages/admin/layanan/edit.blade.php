@extends('layouts.app')

@section('title', $title)

@push('after-style')

@endpush

@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.layanan.create') }}">Data
                            Layanan</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Layanan</li>
                </ol>
            </nav>
            <h3 class="m-0 font-weight-bold">Edit Layanan</h3>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
        <div class="col-lg-12">
            <div class="btn-group mb-3">
                <a href="{{ route('admin.layanan.index') }}" class="btn btn-warning btn-sm"><i
                        class="fas fa-arrow-circle-left"></i> Kembali</a>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.layanan.update', $l->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="nama_l">Nama Layanan:</label>
                                            <input type="text" name="nama_layanan" id="nama_l" class="form-control"
                                                value="{{ $l == null ? old('nama_layanan') : $l->nama_layanan }}">
                                            @error('nama_layanan')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="harga">Harga Per Kg:</label>
                                            <input type="number" name="harga" id="harga" class="form-control"
                                                value="{{ $l == null ? old('harga') : $l->harga }}">
                                            @error('harga')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="berat">Volume: <small class="text-danger">*Kg/
                                                    Pcs</small></label>
                                            <input type="number" name="berat" class="form-control"
                                                value="{{ $l == null ? old('berat') : $l->berat }}" readonly>
                                            @error('berat')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="status">Status:</label>
                                            <select name="status" id="status" class="form-control">
                                                <option disabled>-- Pilih Status --</option>
                                                <option value="1" {{ $l=='1' ? 'selected' : '' }}>Aktif</option>
                                                <option value="2" {{ $l=='2' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                            @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="thumbnail">Thumbnail: <small
                                                    class="text-danger">*Optional</small></label>
                                            @if ($l->thumbnail !== null)
                                            <br>
                                            <img src="{{ Storage::url($l->thumbnail) }}"
                                                class="img-fluid rounded  mb- 2" width="50%" alt="">
                                            @endif
                                            <input type="file" name="thumbnail" class="form-control">
                                            @error(' thumbnail') <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm font-weight-bold">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-script')

@endpush
