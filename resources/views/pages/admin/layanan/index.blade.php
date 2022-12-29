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
                        <a href="{{ route('admin.layanan.create') }}" class="btn btn-success btn-sm fw-bold"><i
                                class="fas fa-plus-circle"></i> Tambah
                            Data</a>
                    </div>

                    <div class="table-responsive">
                        <table id="layanan" class="table table-striped text-center" style="width: 100%;">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Layanan</th>
                                    <th class="text-center">Thumbnail</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Volume</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $n=1;
                                @endphp
                                @foreach($layanan as $l)
                                <tr class="text-center">
                                    <td>{{ $n }}</td>
                                    <td>{{ $l->nama_layanan }}</td>
                                    <td width="35%">
                                        @if($l->thumbnail !== null)
                                        <img src="{{ Storage::url($l->thumbnail) }}" class="img-fluid rounded"
                                            width="30%">
                                        @elseif($l->thumbnail == null)
                                        <span class="badge bg-info text-dark">Tidak ada gambar!</span>
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($l->harga), 0 }}</td>
                                    <td>{{ $l->berat }} Per Kg/Pcs</td>
                                    <td>
                                        @if($l->status == 1)
                                        <span class="badge bg-success">Aktif</span>
                                        @else
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.layanan.edit', $l->id) }}"
                                                class="btn btn-warning btn-sm rounded"><i class="fas fa-edit"></i></a>
                                            &nbsp;
                                            <button class="btn btn-danger btn-sm rounded" data-bs-toggle="modal" data-bs-target="#delete{{ $l->id }}"><i
                                                    class="fas fa-trash"></i></button>
                                        </div>
                                        <br>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.layanan.list_layanan.index', $l->id) }}"
                                                class="btn btn-primary btn-sm mt-2"><i class="fa fa-plus-circle"></i>
                                                Daftar Layanan</a>
                                        </div>
                                        
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
                                                        <form action="{{ route('admin.layanan.destroy', $l->id) }}" method="POST"
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
        $('#layanan').DataTable();
        });
</script>
@endpush
