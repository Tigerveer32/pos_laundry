@extends('layouts.karyawan')

@section('title', $title)

@push('after-style')

@endpush

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="btn-group mb-2">
            <a href="{{ route('daftar_layanan.index') }}" class="btn btn-warning btn-sm"><i class="fas fa-arrow-circle-left"></i></a>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="card-title fw-bold text-white">Pilihan: {{ $layanan->nama_layanan }}</h5>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <form action="{{ route('pesanan.add_pesanan.store', $layanan->id) }}" method="POST" id="formD" entype="multipart/form-data">
                        @csrf
                        @method('POST')
                        
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group mb-3">
                                    <label for="l">Pilihan Paket:</label>
                                    <input type="text" name="layanan" class="form-control" value="{{ $layanan->nama_layanan }}" readonly>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Jenis Pelanggan:</label>
                                    <select name="jp" id="jp" class="form-control {{ $errors->has('jp') ? 'is-invalid' : '' }}">
                                        <option selected disabled>-- Pilih Jenis Pelanggan --</option>
                                        <option value="member">Member</option>
                                        <option value="tidak_member">Tidak Member</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="harga">Harga Per {{ $layanan->berat }} Kilogram:</label>
                                    <input type="text" name="harga" id="harga" class="form-control" value="{{ $layanan->harga }}" readonly>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="berat">Berat Laundry: <small class="text-danger">*Kilogram</small></label>
                                    <input type="text" name="berat" id="berat" onkeyup="sum();" class="form-control {{ $errors->has('berat') ? 'is-invalid' : '' }}" value="{{ old('berat') }}">
                                    @error('berat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="total">Total Bayar:</label>
                                    <input type="text" name="total_harga" id="total" class="form-control" value="{{ old('total') }}" readonly>
                                    @error('total')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">Status Pembayaran:</label>
                                    <select name="status_pembayaran" id="sb" class="form-control {{ $errors->has('status_pembayaran' ? 'is-invalid' : '') }}">
                                        <option selected disabled>-- Pilih Status Pembayaran --</option>
                                        <option value="0">Belum di Bayar</option>
                                        <option value="1">Lunas</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="box member">
                                    <div class="form-group mb-3">
                                        <label for="member">Nama Member</label>
                                        <select name="member" id="member" class="form-control">
                                            <option selected disabled>-- Pilih Member --</option>
                                            @forelse($member as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama_lengkap }} || Kode: {{ $p->kode_member }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="dsc">Diskon:</label>
                                        <br>
                                        <input type="radio" name="diskon" value="0">&nbsp;0% &nbsp;&nbsp;
                                        <input type="radio" name="diskon" value="25">&nbsp;25% &nbsp;&nbsp;
                                        <input type="radio" name="diskon" value="50">&nbsp;50% &nbsp;&nbsp;
                                        <input type="radio" name="diskon" value="75">&nbsp;75% &nbsp;&nbsp;
                                        <input type="radio" name="diskon" value="100">&nbsp;100% &nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="box tidak_member">
                                    <div class="form-group mb-3">
                                        <label for="nm">Nama Lengkap:</label>
                                        <input type="text" name="nama" class="form-control {{ $errors->has('nama' ? 'is-invalid' : '') }}" value="{{ old('nama') }}">
                                        @error('nama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nhp">No Whatsapp: <small class="text-danger">*Awali dengan 62</small></label>
                                        <input type="number" name="no_hp" class="form-control {{ $errors->has('nama_lengkap' ? 'is-invalid' : '') }}" value="{{ old('no_hp') }}" value="{{ old('no_hp') }}">
                                        @error('no_hp')
                                            <small class="text-danger">{{ $error }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="alamat">Alamat:</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control {{ $errors->has('nama_lengkap' ? 'is-invalid' : '') }}">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
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
</div>

@endsection

@push('after-script')

    <script type="text/javascript">
        function sum() {
            var txtFirstNumberValue = document.getElementById('harga').value;
            var txtSecondNumberValue = document.getElementById('berat').value;
            var result = parseInt(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
            
            if (!isNaN(result)) {
                document.getElementById('total').value = result;
            } else {
                document.getElementById('total').value = 0;
            }
        }
    </script>


    <script>
        $(".member").hide();
        $(".tidak_member").hide();
        $(document).ready(function(){
            $("#jp").change(function(){
                $(this).find("option:selected").each(function(){
                    if($(this).attr("value")=="member"){
                        $(".box").not(".member").hide();
                        $(".member").show();
                    }
                    else if($(this).attr("value")=="tidak_member"){
                        $(".box").not(".tidak_member").hide();
                        $(".tidak_member").show();
                    }
                    else {
                        $(".box").not(".member").hide();
                        $(".box").not(".tidak_member").hide();
                        $(".box").hide();
                    }
                });
            }).change();
        });

    </script>


@endpush
