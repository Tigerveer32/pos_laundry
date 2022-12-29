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
                        <a href="{{ route('admin.administrator.create') }}"
                            class="btn btn-success btn-sm font-weight-bold"><i class="fas fa-plus-circle"></i> Tambah
                            Data</a>
                    </div>

                    <div class="table-responsive">
                        <table id="adm" class="table table-striped text-center" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Handphone</th>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                    <th>Profile</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $n=1;
                                @endphp
                                @foreach($admin as $a)
                                <tr>
                                    <td>{{ $n }}</td>
                                    <td>{{ $a->nama_lengkap }}</td>
                                    <td>{{ $a->email }}</td>
                                    <td>{{ $a->jenis_kelamin }}</td>
                                    <td>{{ $a->no_handphone }}</td>
                                    <td>{{ $a->tempat_lahir }}, {{ $a->tanggal_lahir }}</td>
                                    <td>{{ $a->alamat }}</td>
                                    <td>
                                        @if($a->profile !== null)
                                        <img src="{{ Storage::url($a->profile) }}" class="img-fluid" width="50%">
                                        @else
                                        <span class="badge bg-info text-dark">Tidak ada!</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.administrator.edit', $a->id) }}"
                                                class="btn btn-warning btn-sm rounded"><i class="fas fa-edit"></i></a>
                                            &nbsp;
                                            <button class="btn btn-danger btn-sm rounded" data-bs-toggle="modal" data-bs-target="#delete{{ $a->id }}"><i class="fas fa-trash"></i></button>
                                        </div>

                                        <div class="modal fade" id="delete{{ $a->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                                                        <form action="{{ route('admin.administrator.destroy', $a->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div 
                                        </div>

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
        $('#adm').DataTable();
        });
</script>
@endpush