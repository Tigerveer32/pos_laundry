<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;

        if (!empty($tgl1) && !empty($tgl2)){
            $laporan = Transaksi::whereBetween('tanggal', [$tgl1, $tgl2])->get();
            $omset = Transaksi::whereBetween('tanggal', [$tgl1, $tgl2])->sum('total_harga');
             $data = array(
                'title' => 'Laporan Omset',
                'laporan' => $laporan,
                'omset' => $omset
             );

             return view('pages.admin.laporan_omset.index', $data);

        }

        $data = array(
            'title' => 'Laporan Omset',  
        );

        return view('pages.admin.laporan_omset.index', $data);
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
        $tgl1 = $request->tgl1;
        $tgl2 = $request->tgl2;

        if (!empty($tgl1) && !empty($tgl2)){
            $laporan = Transaksi::whereBetween('tanggal', [$tgl1, $tgl2])->get();
            $omset = Transaksi::whereBetween('tanggal', [$tgl1, $tgl2])->sum('total_harga');
            $data = array(
            'title' => 'Laporan Omset',
            'laporan' => $laporan,
            'omset' => $omset,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2
        );

        return view('pages.admin.laporan_omset.print', $data);

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
