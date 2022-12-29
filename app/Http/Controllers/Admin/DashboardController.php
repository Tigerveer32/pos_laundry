<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today=date("Y-m-d");

        $daftar_pelanggan = Pelanggan::orderBy('id', 'DESC')->get();
        $pesanan_blmbayar = Transaksi::where('status_pesanan', '0')->get();
        $omset = Transaksi::whereBetween('tanggal', [$today,$today])->sum('total_harga');
       

        $data = array(
            'title'     =>  'Dashboard',
             'member' => Pelanggan::count(),
             'pelanggan' => $daftar_pelanggan->count(),
             'omset' => $omset,
             'lun' => Transaksi::where('status_pembayaran', '1')->count(),
             'bl' => Transaksi::where('status_pembayaran', '0')->count(),
             'phi' => Transaksi::where('tanggal', date('Y-m-d'))->count(),
        );

        return view('pages.admin.dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

