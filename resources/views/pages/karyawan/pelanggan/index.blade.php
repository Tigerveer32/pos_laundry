@extends('layouts.karyawan')

@section('title', $title)

@push('after-style')

@endpush

@section('content')


<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="btn-group mb-4 mt-2">
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-success btn-sm fw-bold"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                </div>

                <div class="table-responsive">
                    <table id="pelanggan" class="table table-striped text-center" style="width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Member</th>
                                <th class="text-center">Nama Pelanggan</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">No. Whatsapp</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                       <tbody>
                            @php
                                $n=1;
                            @endphp
                            @foreach ($pelanggan as $member)
                                <tr>
                                    <td>{{ $n }}.</td>
                                    <td>{{ $member->kode_member }}</td>
                                    <td>{{ $member->nama_lengkap }}</td>
                                    <td>{{ $member->jenis_kelamin }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->no_hp }}</td>
                                    <td>{{ $member->alamat }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('pelanggan.edit', $member->id) }}" class="btn btn-warning btn-sm rounded"><i class="fas fa-edit"></i></a>
                                            &nbsp;
                                            <button class="btn btn-danger btn-sm rounded" data-bs-toggle="modal" data-bs-target="#delete{{ $member->id }}"><i class="fas fa-trash"></i></button>
                                        </div>
                                        

                                        <div class="modal fade" id="delete{{ $member->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
                                                        <form action="{{ route('pelanggan.destroy', $member->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div </div>

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
        $('#pelanggan').DataTable();
        });
</script>
@endpush