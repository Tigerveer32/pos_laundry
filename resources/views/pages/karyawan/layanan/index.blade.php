@extends('layouts.karyawan')

@section('title', $title)

@push('after-style')

@endpush

@section('content')
  
        <h2 class="text-center mb-3 mt-4">Pilih Paket Layanan</h2>
        <p class="text-muted text-center mb-4 pb-2">Daftar Paket Layanan Laundry.</p>
        <div class="container-fluid">  
            <div class="row d-flex justify-content-center">

            @forelse($layanan as $l)

                <div class="col-md-3 stretch-card grid-margin grid-margin-md-0 mb-2">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="text-center mt-3 mb-4">{{ $l->nama_layanan }}</h5>
                       <div class="text-center">
                         <img src="{{ Storage::url($l->thumbnail) }}" class="img-fluid rounded mt-3 mb-3" alrt="" width="50%">
                       </div>
                      <h4 class="text-center fw-bold">Rp. {{ number_format($l->harga, 0) }}</h4>
                      <p class="text-muted text-center mb-4 fw-light">per <span class="fw-bold">{{ $l->berat }}</span> Kg/Pcs</p>
                      <table class="mx-auto">

                        @forelse($l->List as $ls)

                            <tr>
                              <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                              <td><p>{{ $ls->nama }}</p></td>
                            </tr>

                        @empty

                        @endforelse

                      </table>
                      <div class="d-grid">
                        <a href="{{ route('pesanan.add_pesanan.create', $l->id) }}" class="btn btn-success mt-4 fw-bold">Pilih</a>
                      </div>
                    </div>
                  </div>
                </div>

            @empty

            @endforelse
               

            </div>
		</div>
	


@endsection

@push('after-script')

@endpush
