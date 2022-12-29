@extends('layouts.app')

@section('title', $title)

@push('after-style')

@endpush

@section('content')



    <div class="row">
        <div class="col-lg-12">
            <div class="btn-group mb-3">
                <a href="{{ route('admin.administrator.index') }}" class="btn btn-warning btn-sm"><i
                        class="fas fa-arrow-circle-left"></i> Kembali</a>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('admin.administrator.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama Lengkap:</label>
                                            <input type="text" name="nama_lengkap" id="nama" class="form-control"
                                                value="{{ old('nama_lengkap') }}">
                                            @error('nama_lengkap')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email">Email:</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                value="{{ old('email') }}">
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option selected disabled>-- Jenis Kelamin --</option>
                                                <option value="L">Laki - Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="no_p">No Handphone:</label>
                                            <input type="number" name="no_handphone" id="no_p" class="form-control"
                                                value="{{ old('no_handphone') }}">
                                            @error('no_handphone')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-3">
                                                            <label for="tl">Tempat Lahir:</label>
                                                            <input type="text" name="tempat_lahir" class="form-control"
                                                                id="tl" value="{{ old('tempat_lahir') }}">
                                                            @error('tempat_lahir')
                                                            <small class="text-danger"></small>{{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-3">
                                                            <label for="tgl">Tanggal Lahir:</label>
                                                            <input type="date" name="tanggal_lahir" class="form-control"
                                                                id="tgl" value="{{ old('tanggal_lahir') }}">
                                                            @error('tanggal_lahir')
                                                            <small class="text-danger"></small>{{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="al">Alamat:</label>
                                            <textarea name="alamat" id="al" cols="30" rows="5"
                                                class="form-control">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                            <small class="text-danger"></small>{{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="pf">Profile:</label>
                                            <input type="file" name="profile" class="form-control" id="pf"
                                                class="form-contorl">
                                            @error('profile')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="pss">Password:</label>
                                            <input type="password" name="password" class="form-control">
                                            @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn-success btn-sm font-weight-bold">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@push('after-script')

@endpush