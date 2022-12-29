<?php

namespace App\Http\Controllers\Karyawan;

use Alert;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Data Pelanggan',
            'pelanggan' => Pelanggan::orderBy('id', 'DESC')->get(),
        );

        return view('pages.karyawan.pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Tambah Data Pelanggan',
        );

        return view('pages.karyawan.pelanggan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  =>  'required|min:2|max:50',
            'jenis_kelamin' =>  'required',
            'email'         =>  'required|unique:pelanggan,email',
            'no_hp'         => 'required|max:255|regex:/(62)8([0-9\s\-\+\(\)]*)$/|min_digits:12|max_digits:15',
            'alamat'        =>  'required|max:255',
        ]);

        $data = array(
            'kode_member'   =>  date('Ymdis'),
            'nama_lengkap'  =>  $request->nama_lengkap,
            'jenis_kelamin' =>  $request->jenis_kelamin,
            'email'         =>  $request->email,
            'no_hp'         =>  $request->no_hp,
            'alamat'        =>  $request->alamat,
        );

        $result = Pelanggan::create($data);

        if ($result) {
            Alert::success('Success', 'Data berhasil ditambahkan');
            return redirect()->route('pelanggan.index');
        } else {
            Alert::error('Gagal', 'Data gagal ditambahkan');
            return redirect()->route('pelanggan.create');
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
            'title' => 'Edit Data Pelanggan',
            'm' => Pelanggan::findOrFail($id),
        );

        return view('pages.karyawan.pelanggan.edit', $data);
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
        'nama_lengkap' => 'required|min:2|max:50',
        'jenis_kelamin' => 'required',
        'email' => 'required|unique:pelanggan,email,' . $id,
        'no_hp' => 'required|max:255|regex:/(62)8([0-9\s\-\+\(\)]*)$/|min_digits:12|max_digits:15',
        'alamat' => 'required|max:255',
        ]);

        $data = array(
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        );

        $result = Pelanggan::where('id', $id)->update($data);

        if ($result) {
            Alert::success('Success', 'Data berhasil diedit');
            return redirect()->route('pelanggan.index');
        } else {
            Alert::error('Gagal', 'Data gagal diedit');
            return redirect()->route('pelanggan.edit', $id);
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
        $result = Pelanggan::destroy($id);

        if ($result) {
            Alert::success('Success', 'Data berhasil dihapus');
            return redirect()->route('pelanggan.index');
        } else {
            Alert::error('Gagal', 'Data gagal dihapus');
            return redirect()->route('pelanggan.index', $id);
        }
    }
}
