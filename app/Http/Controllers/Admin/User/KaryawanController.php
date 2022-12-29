<?php

namespace App\Http\Controllers\Admin\User;

use Alert;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\UserRequest;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Data Karyawan',
            'karyawan' => User::where('role', 2)->orderBy('id','DESC')->get()
        );

        return view('pages.admin.users.karyawan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data = array(
            'title' => 'Tambah Karyawan'
         );

         return view('pages.admin.users.karyawan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
         $nama = $request->nama_lengkap;
         $email = $request->email;
         $jekel = $request->jenis_kelamin;
         $no_hp = $request->no_handphone;
         $tmp_lhr = $request->tempat_lahir;
         $tgl_lhr = $request->tanggal_lahir;
         $alamat = $request->alamat;
         $profile = $request->file('profile');
         $password = $request->password;

         if($request->hasFile('profile') == null){

         $data = array(
         'nama_lengkap' => $nama,
         'email' => $email,
         'jenis_kelamin' => $jekel,
         'no_handphone' => $no_hp,
         'tempat_lahir' => $tmp_lhr,
         'tanggal_lahir' => $tgl_lhr,
         'alamat' => $alamat,
         'password' => Hash::make($password),
         'role' => 2
         );

         $result = User::create($data);

         if($result){
         Alert::success('Success', 'Data berhasil di simpan.');
         return redirect()->route('admin.karyawan.index');
         } else {
         Alert::error('Error', 'Data gagal di simpan.');
         return redirect()->route('admin.karyawan.create');
         }
         } else {

         $path = $profile->store('public/profile');

         $data = array(
         'nama_lengkap' => $nama,
         'email' => $email,
         'jenis_kelamin' => $jekel,
         'no_handphone' => $no_hp,
         'tempat_lahir' => $tmp_lhr,
         'tanggal_lahir' => $tgl_lhr,
         'alamat' => $alamat,
         'profile' => $path,
         'password' => Hash::make($password),
         'role' => 2
         );

         $result = User::create($data);

         if($result){
         Alert::success('Success', 'Data berhasil di simpan.');
         return redirect()->route('admin.karyawan.index');
         } else {
         Alert::error('Error', 'Data gagal di simpan.');
         return redirect()->route('admin.karyawan.create');
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
            'title' => 'Tambah Karyawan',
            'karyawan'  =>  User::where('id', $id)->where('role', 2)->first()
         );

         return view('pages.admin.users.karyawan.edit', $data);
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
        $cek = User::where('id', $id)->where('role', 2)->first();

        $request->validate([
            'nama_lengkap' => 'required|min:3|max:50',
            'email' => ['required','unique:users,email,' . $id],
            'jenis_kelamin' => 'required',
            'no_handphone' => 'required|min:11|max:13',
            'tempat_lahir' => 'required|min:2|max:15',
            'tanggal_lahir' => 'required',
            'alamat' => 'nullable',
            'profile' => 'nullable|mimes:png,jpg,jpeg,svg,gif|max:1080',
            'password' => 'nullable|min:8'
        ]);

        $nama = $request->nama_lengkap;
        $email = $request->email;
        $jekel = $request->jenis_kelamin;
        $no_hp = $request->no_handphone;
        $tmp_lhr = $request->tempat_lahir;
        $tgl_lhr = $request->tanggal_lahir;
        $alamat = $request->alamat;
        $profile = $request->file('profile');
        $password = $request->password;

        if($password == null && $request->hasFile('profile') == null
        || $request->hasFile('profile') == null && $password == null){

        $data = array(
            'nama_lengkap' => $nama,
            'email' => $email,
            'jenis_kelamin' => $jekel,
            'no_handphone' => $no_hp,
            'tempat_lahir' => $tmp_lhr,
            'tanggal_lahir' => $tgl_lhr,
            'alamat' => $alamat,
        );

        $result = User::where('id', $id)->update($data);

         if($result){
         Alert::success('Success', 'Data berhasil di simpan.');
         return redirect()->route('admin.karyawan.index');
         } else {
         Alert::error('Error', 'Data gagal di simpan.');
         return redirect()->route('admin.karyawan.create');
         }

        }elseif($request->hasFile('profile') == null && $password !== null
        || $password !== null && $request->hasFile('profile') == null){

        $data = array(
            'nama_lengkap' => $nama,
            'email' => $email,
            'jenis_kelamin' => $jekel,
            'no_handphone' => $no_hp,
            'tempat_lahir' => $tmp_lhr,
            'tanggal_lahir' => $tgl_lhr,
            'alamat' => $alamat,
            'password' => Hash::make($password)
        );

        $result = User::where('id', $id)->update($data);

         if($result){
         Alert::success('Success', 'Data berhasil di simpan.');
         return redirect()->route('admin.karyawan.index');
         } else {
         Alert::error('Error', 'Data gagal di simpan.');
         return redirect()->route('admin.karyawan.create');
         }
        } elseif($request->hasFile('profile') !== null && $password == null
        || $password == null && $request->hasFile('profile') !== null){

        if(!empty($cek->profile)){
            Storage::delete($cek->profile);
        }

        $path = $profile->store('public/profile');

        $data = array(
            'nama_lengkap' => $nama,
            'email' => $email,
            'jenis_kelamin' => $jekel,
            'no_handphone' => $no_hp,
            'tempat_lahir' => $tmp_lhr,
            'tanggal_lahir' => $tgl_lhr,
            'alamat' => $alamat,
            'profile' => $path
        );

        $result = User::where('id', $id)->update($data);

         if($result){
         Alert::success('Success', 'Data berhasil di simpan.');
         return redirect()->route('admin.karyawan.index');
         } else {
         Alert::error('Error', 'Data gagal di simpan.');
         return redirect()->route('admin.karyawan.create');
         }

        } elseif($password !== null && $request->hasFile('profile') !== null
        || $request->hasFile('profile') !== null && $password !== null){

        if(!empty($cek->profile)){
            Storage::delete($cek->profile);
        }

        $path = $profile->store('public/profile');

        $data = array(
            'nama_lengkap' => $nama,
            'email' => $email,
            'jenis_kelamin' => $jekel,
            'no_handphone' => $no_hp,
            'tempat_lahir' => $tmp_lhr,
            'tanggal_lahir' => $tgl_lhr,
            'alamat' => $alamat,
            'profile' => $path,
            'password' => Hash::make($password)
        );

        $result = User::where('id', $id)->update($data);

        if($result){
            Alert::success('Success', 'Data berhasil di simpan.');
            return redirect()->route('admin.karyawan.index');
        } else {
            Alert::error('Error', 'Data gagal di simpan.');
            return redirect()->route('admin.karyawan.create');
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
        $cek = User::where('id', $id)->where('role', 2)->first();

        if(!empty($cek) || $cek->profile !== null){
            Storage::delete($cek->profile);
        }

        $result = User::destroy($id);

        if($result){
            Alert::success('Success', 'Data berhasil di hapus.');
            return redirect()->route('admin.karyawan.index');
        } else {
            Alert::error('Error', 'Data gagal di hapus.');
            return redirect()->route('admin.karyawan.index');
        }

    }
}