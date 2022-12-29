@extends('layouts.app')

@section('title', $title)

@push('after-style')

@endpush

@section('content')


    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="btn-group mb-4 mt-2">
                        <a href="{{ route('admin.layanan.index') }}" class="btn btn-warning btn-sm rounded"><i
                                class="fas fa-arrow-circle-left"></i> Kembali</a>
                        &nbsp;
                        <button type="button" class="btn btn-success btn-sm" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add"><i class="fas fa-plus-circle"></i>
                            Tambah
                            Data</button>
                    </div>

                    <div class="table-responsive">
                        <table id="list" class="table table-striped text-center" style="width: 100%;">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Layanan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $n=1;
                                @endphp
                                @foreach($list as $l)
                                <tr class="text-center">
                                    <td>{{ $n }}</td>
                                    <td>{{ $l->nama }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm rounded" data-bs-toggle="modal" data-bs-target="#delete{{ $l->id }}"><i
                                                class="fas fa-trash"></i></button>
                                    </td>

                                    <div class="modal fade" id="delete{{ $l->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h5 class="modal-title text-white" id="staticBackdropLabel">Konfirmasi Hapus</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="alert alert-danger text-center fw-bold" role="alert">
                                                                            <i class="fas fa-exclamation-triangle"></i> Apakah anda yakin ingin menghapus data ini?
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                <form action="{{ route('admin.list_layanan.destroy', $l->id) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div </div>

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

<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.layanan.list_layanan.store', $id_layanan  ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="nl">Nama Layanan:</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success btn-sm fw-bold">Simpan</button>
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




@endsection




@push('after-script')
<script>
    $(document).ready(function () {
        $('#list').DataTable();
        });
</script>
@endpush
