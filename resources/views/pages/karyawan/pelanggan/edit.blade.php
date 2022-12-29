@extends('layouts.karyawan')

@section('title', $title)

@push('after-style')

@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-success">
                <h5 class="card-title fw-bold text-white">Edit Pelanggan</h5>
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <a href="" class="btn btn-warning btn-sm fw-bold"><i class="fas fa-arrow-circle-left"></i>
                        Kembali</a>
                </div>
                <form action="{{ route('pelanggan.update', $m->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="nm">Nama Pelanggan:</label>
                                <input type="text" name="nama_lengkap" class="form-control"
                                    value="{{ $m == null ? old('nama_lengkap') :  $m->nama_lengkap }}">
                                @error('nama_lengkap')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="jk">Jenis Kelamin:</label>
                                <select name="jenis_kelamin" id="jk" class="form-control">
                                    <option selected disabled>-- Pilih Jenis Kelamin --</option>
                                    <option value="L" {{ $m == null ? old('jenis_kelamin') : ( $m->jenis_kelamin =='L' ? 'selected' : '' ) }}>Laki - Laki
                                    </option>
                                    <option value="P" {{ $m == null ? old('jenis_kelamin') : ( $m->jenis_kelamin =='P' ? 'selected' : '' ) }}>Perempuan
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Alamat Email:</label>
                                <input type="email" name="email" class="form-control" value="{{ $m == null ? old('email') : $m->email }}">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="wa">Nomor Whatsapp: <small class="text-danger">*Awali dengan
                                        62.</small></label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $m == null ? old('no_hp') : $m->no_hp }}">
                                @error('no_hp')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="al">Alamat:</label>
                                <textarea name="alamat" id="al" cols="30" rows="8"
                                    class="form-control">{{ $m == null ? old('alamat') : $m->alamat }}</textarea>
                                @error('alamat')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')

@endpush