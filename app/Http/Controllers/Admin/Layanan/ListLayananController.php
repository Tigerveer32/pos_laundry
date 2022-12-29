<?php

namespace App\Http\Controllers\Admin\Layanan;

use App\Models\Layanan;
use App\Models\ListLayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class ListLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $layanan = Layanan::where('id', $id)->first();

        $data = array(
            'title'     =>  'List Layanan',
            'id_layanan'         =>  $layanan,
            'list'      =>  ListLayanan::where('id_layanan', $id)->orderBy('id', 'DESC')->get()
        );

        return view('pages.admin.layanan.list.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Tambah List Layanan'
        );

        return view('pages.admin.layanan.list.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required',
            ]
        );

        $data = array(
            'id_layanan' => $id,
            'nama' => $request->nama,
        );

        $result = ListLayanan::create($data);

        if ($result) {
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return redirect()->route('admin.layanan.list_layanan.index', $id);
        } else {
            Alert::error('Gagal', 'Data gagal ditambahkan');
            return redirect()->route('admin.layanan.list_layanan.index', $id);
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
        $result  = ListLayanan::where('id', $id)->delete();

        if ($result) {
            Alert::success('Berhasil', 'Data berhasil dihapus');
            return redirect()->back();
        } else {
            Alert::error('Gagal', 'Data gagal dihapus');
            return redirect()->back();
        }
    }
}