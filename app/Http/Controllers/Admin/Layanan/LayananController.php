<?php

namespace App\Http\Controllers\Admin\Layanan;

use Alert;
use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LayananRequest;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Layanan',
            'layanan'   =>  Layanan::orderBy('id', 'DESC')->get()
        );

        return view('pages.admin.layanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Tambah Layanan'
        );

        return view('pages.admin.layanan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LayananRequest $request)
    {
        $nama = $request->nama_layanan;
        $thumbnail  =   $request->file('thumbnail');
        $harga      =   $request->harga;
        $berat      =   $request->berat;
        $status     =   $request->status;

        if($request->hasFile('thumbnail') == null ){

            $data = array(
                'nama_layanan' => $nama,
                'harga' => $harga,
                'berat' => $berat,
                'status' => $status
            );

            $result = Layanan::create($data);

            if($result){
                Alert::success('Success', 'Data berhasil disimpan.');
                return redirect()->route('admin.layanan.index');
            } else {
                Alert::error('Error', 'Data gagal di simpan!');
                return redirect()->route('admin.layanan.create');
            }

        } else {
            $path = $thumbnail->store('public/thumbnail_layanan');

            $data = array(
                'nama_layanan' => $nama,
                'thumbnail' => $path,
                'harga' => $harga,
                'berat' => $berat,
                'status' => $status
            );

            $result = Layanan::create($data);

            if($result){
                Alert::success('Success', 'Data berhasil disimpan.');
                return redirect()->route('admin.layanan.index');
            } else {
                Alert::error('Error', 'Data gagal di simpan!');
                return redirect()->route('admin.layanan.create');
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
        $data = array(
            'title' => 'Edit Layanan',
            'l'   =>  Layanan::where('id', $id)->first()
        );

        return view('pages.admin.layanan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LayananRequest $request, $id)
    {
        $nama = $request->nama_layanan;
        $thumbnail = $request->file('thumbnail');
        $harga = $request->harga;
        $berat = $request->berat;
        $status = $request->status;

        if($request->hasFile('thumbnail') == null ){

        $data = array(
            'nama_layanan' => $nama,
            'harga' => $harga,
            'berat' => $berat,
            'status' => $status
        );

        $result = Layanan::where('id', $id)->update($data);

        if($result){
            Alert::success('Success', 'Data berhasil diedit.');
            return redirect()->route('admin.layanan.index');
        } else {
            Alert::error('Error', 'Data gagal diedit!');
            return redirect()->route('admin.layanan.edit', $id);
        }

        } else {
            $cek = Layanan::where('id', $id)->first();

            if($cek->thumbnail !== null && $request->hasFile('thumbnail') !== null){
                Storage::delete($cek->thumbnail);
            }

            $path = $thumbnail->store('public/thumbnail_layanan');

            $data = array(
                'nama_layanan' => $nama,
                'thumbnail' => $path,
                'harga' => $harga,
                'berat' => $berat,
                'status' => $status
            );

            $result = Layanan::where('id', $id)->update($data);

            if($result){
            Alert::success('Success', 'Data berhasil diedit.');
            return redirect()->route('admin.layanan.index');
            } else {
            Alert::error('Error', 'Data gagal diedit!');
            return redirect()->route('admin.layanan.edit', $id);
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
        $cek = Layanan::where('id', $id)->first();

        if($cek->thumbnail !== null){
            Storage::delete($cek->thumbnail);
        }

        $result = Layanan::destroy($id);

        if($result){
            Alert::success('Success', 'Data berhasil dihapus.');
            return redirect()->route('admin.layanan.index');
        } else {
            Alert::error('Error', 'Data gagal dihapus!');
            return redirect()->route('admin.layanan.index');
        }
    }
}
