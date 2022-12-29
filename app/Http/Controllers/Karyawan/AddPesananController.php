<?php

namespace App\Http\Controllers\Karyawan;

use Alert;
use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $layanan = Layanan::findOrFail($id);

        $data = array(
            'title' => 'Buat Pesanan',
            'id_layanan' => $id,
            'layanan' => $layanan,
            'member'    =>  Pelanggan::orderBy('id', 'DESC')->get()
        );

        return view('pages.karyawan.add_pesanan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'jp'    =>  'required',
            'member'  =>  'nullable',
            'diskon'    => 'nullable',
            'nama'  => 'nullable|min:2|max:50',
            'no_hp' => 'nullable|regex:/(62)8([0-9\s\-\+\(\)]*)$/|min_digits:12|min:10|max:15',
            'berat' =>  'required',
            'alamat' => 'nullable',
            'status_pembayaran' => 'required',
        ]);

        $member = $request->member;
        $nama = $request->nama;
        $no_hp = $request->no_hp;
        $alamat = $request->alamat;
        $berat = $request->berat;
        $pembayaran = $request->status_pembayaran;
        $tot = $request->total_harga;
        $diskon = $request->diskon;


        if($member == null || $member == ""){
            $data = array(
                'id_layanan' => $id,
                'no_order' => date('Ymdis'),
                'nama' => $nama,
                'no_hp' => $no_hp,
                'berat' =>  $berat,
                'total_harga'   => $tot,
                'grand_total'   => $tot,
                'status_pesanan'    => 0,
                'status_pembayaran' => $pembayaran,
                'alamat' => $alamat,
                'tanggal'   => date('Y-m-d')
            );
            

            $result = Transaksi::create($data);

            if ($result) {
                Alert::success('Berhasil', 'Pesanan Berhasil Dibuat');
                return redirect()->route('pesanan.index');
            } else {
                Alert::error('Gagal', 'Pesanan Gagal Dibuat');
                return redirect()->route('pesanan.add_pesanan.create', $id);
            }
        } else {

            if($diskon != null || $diskon != ""){

                $persen = $diskon;

                $disc = $tot * $persen / 100;

                $grand = $tot - $disc;

                 $data = array(
                    'id_pelanggan' => $member,
                    'id_layanan' => $id,
                    'no_order' => date('Ymdis'),
                    'berat' => $berat,
                    'diskon'    =>  $diskon,
                    'total_harga' => $tot,
                    'total_diskon'  =>  $disc,
                    'grand_total' => $grand,
                    'status_pesanan' => 0,
                    'status_pembayaran' => $pembayaran,
                    'tanggal' => date('Y-m-d')
                 );

                $result = Transaksi::create($data);

                if ($result) {
                    Alert::success('Berhasil', 'Pesanan Berhasil Dibuat');
                    return redirect()->route('pesanan.index');
                } else {
                    Alert::error('Gagal', 'Pesanan Gagal Dibuat');
                    return redirect()->route('pesanan.add_pesanan.create', $id);
                }

            } else {

                $data = array(
                    'id_pelanggan' => $member,
                    'id_layanan' => $id,
                    'no_order' => date('Ymdis'),
                    'berat' => $berat,
                    'total_harga' => $tot,
                    'grand_total' => $tot,
                    'status_pesanan' => 0,
                    'status_pembayaran' => $pembayaran,
                    'tanggal' => date('Y-m-d')
                );

                $result = Transaksi::create($data);

                if ($result) {
                    Alert::success('Berhasil', 'Pesanan Berhasil Dibuat');
                    return redirect()->route('pesanan.index');
                } else {
                    Alert::error('Gagal', 'Pesanan Gagal Dibuat');
                    return redirect()->route('pesanan.add_pesanan.create', $id);
                }
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
