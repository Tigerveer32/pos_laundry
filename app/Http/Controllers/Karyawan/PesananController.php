<?php

namespace App\Http\Controllers\Karyawan;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Data Pesanan / Transaksi',
            'transaksi' => Transaksi::orderBy('id', 'DESC')->get(),
        );

        return view('pages.karyawan.pesanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
         $data = array(
            'title' => 'Edit Pesanan / Transaksi',
            'member'    =>  Pelanggan::orderBy('id', 'DESC')->get(),
            'transaksi' => Transaksi::where('id', $id)->first(),
         );

         return view('pages.karyawan.pesanan.edit', $data);
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
         $request->validate([
            'jp' => 'required',
            'member' => 'nullable',
            'diskon'    => 'nullable',
            'nama' => 'nullable|min:2|max:50',
            'no_hp' => 'nullable|regex:/(62)8([0-9\s\-\+\(\)]*)$/|min_digits:12|min:10|max:15',
            'berat' => 'required',
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
                'nama' => $nama,
                'no_hp' => $no_hp,
                'berat' => $berat,
                'total_harga' => $tot,
                'grand_total' => $tot,
                'status_pesanan' => 0,
                'status_pembayaran' => $pembayaran,
                'alamat' => $alamat
            );

            $result = Transaksi::where('id', $id)->update($data);

            if ($result) {
                Alert::success('Berhasil', 'Pesanan Berhasil di update');
                return redirect()->route('pesanan.index');
            } else {
                Alert::error('Gagal', 'Pesanan Gagal di update');
                return redirect()->route('pesanan.edit', $id);
            }
         }  else if($member != null || $member != ""){

            if($diskon != null || $diskon != ""){

            $persen = $diskon;

            $disc = $tot * $persen / 100;

            $grand = $tot - $disc;

            $data = array(
                'id_pelanggan' => $member,
                'berat' => $berat,
                'diskon' => $diskon,
                'total_harga' => $tot,
                'total_diskon' => $disc,
                'grand_total' => $grand,
                'status_pesanan' => 0,
                'status_pembayaran' => $pembayaran,
                'tanggal' => date('Y-m-d')
            );

             $result = Transaksi::where('id', $id)->update($data);

            if ($result) {
                Alert::success('Berhasil', 'Pesanan Berhasil di update');
                return redirect()->route('pesanan.index');
            } else {
                Alert::error('Gagal', 'Pesanan Gagal di update');
                return redirect()->route('pesanan.edit', $id);
            }

            } else {

                $data = array(
                    'id_pelanggan' => $member,
                    'berat' => $berat,
                    'total_harga' => $tot,
                    'grand_total' => $tot,
                    'status_pesanan' => 0,
                    'status_pembayaran' => $pembayaran,
                );

                $result = Transaksi::where('id', $id)->update($data);

                if ($result) {
                    Alert::success('Berhasil', 'Pesanan Berhasil di update');
                    return redirect()->route('pesanan.index');
                } else {
                    Alert::error('Gagal', 'Pesanan Gagal di update');
                    return redirect()->route('pesanan.edit', $id);
                }
            }
         } 

    }
         

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Transaksi::destroy($id);

        if ($result) {
            Alert::success('Berhasil', 'Pesanan Berhasil di hapus');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Gagal', 'Pesanan Gagal di hapus');
            return redirect()->route('pesanan.index');
        }
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status_pesanan'    =>  'required'
        ]);

        $status = $request->status_pesanan;

        $data = array(
            'status_pesanan'    => $status
        );

        $result = Transaksi::where('id', $id)->update($data);

        if($result){
            Alert::success('Success', 'Status pesanan berhasil di update !');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Error', 'Status pesanan gagal di update');
            return redirect()->route('pesanan.index');
        }
    }
}
