<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Kriteria;
use App\Models\Master\Pemain;
use App\Models\User;
use App\Models\Master\Nilai;
use App\Models\Master\DetailKriteria;
use Hash;

use Datatables;

class PemainController extends Controller
{
    public function index(Request $request)
    {
      $user = Pemain::with('nilai');
      if($request->has('posisi')){
        $user->where('posisi',$request->posisi);
      }

      if($request->has('gender')){
        $user->where('gender',$request->gender);
      }

      if($request->has('status')){
        $user->where('status',$request->status);
      }

      if($request->has('terpilih')){
        $user->where('terpilih',$request->terpilih);
      }

      return response()->json([
          'status' => true,
          'data' => $user->get()
      ]);
    }

    public function create()
    {
        return $this->render('backend.profil.sejarah.create');
    }

    public function store(Request $request)
    {
    	$item = new Pemain;
      $item->nama = $request->nama;
      $item->nim = $request->nim;
      $item->berat = $request->berat;
      $item->tinggi = $request->tinggi;
      $item->posisi = $request->posisi;
      $item->gender = $request->gender;
      $item->status = '0';

      if($request->hasFile('foto')){
         $path = $request->file('foto')->store('uploads/user', 'public');
         $item->foto = $path;
      }

    	$item->save();

    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function seleksi(Request $request)
    {
      $pemain = [];
      foreach ($request->pemain as $key => $value) {
        $pemain[$key] = $value;
        $item = Pemain::findOrFail($value);
        $item->terpilih = true;
        $item->save();
      }

      $pemain_tidak_terpilih = Pemain::whereNotIn('id',$pemain);
      
      if($request->has('gender')){
        $pemain_tidak_terpilih->where('gender',$request->gender;
      }

      foreach ($pemain_tidak_terpilih->get() as $key => $value) {
        $tidak_terpilih = Pemain::findOrFail($value->id);
        $tidak_terpilih->terpilih = false;
        $tidak_terpilih->save();
      }

    	return response([
    		'status' => true,
    		'Message'	=> 'Succes'
    	]);
    }

    public function nilai(Request $request)
    {

      foreach ($request->penilaian as $key => $value) {
        dd($value['id_pemain']);
        $item = new Nilai;
        $item->id_pemain = $value->id_pemain;
        $item->id_kriteria = $request->id_kriteria;
        $item->nilai = $request->nilai;

      	$item->save();
      }


    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function show($id)
    {
        return Pemain::find($id);
    }

    public function edit($id)
    {
    	$record = Pemain::find($id);

        return $this->render('backend.profil.sejarah.edit', ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
      $item = Pemain::findOrFail($id);
      $item->nama = $request->nama;
      $item->nim = $request->nim;
      $item->berat = $request->berat;
      $item->tinggi = $request->tinggi;
      $item->posisi = $request->posisi;
      $item->gender = $request->gender;
      // $item->status = '0';

      if($request->hasFile('foto')){
         $path = $request->file('foto')->store('uploads/user', 'public');
         $item->foto = $path;
      }

    	$item->save();

    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function destroy($id)
    {
    	$item = Pemain::find($id);
    	$item->delete();

    	return response([
    		'status' => true,
    	]);
    }

    public function login(Request $request)
    {
            $data='';
            $status=false;
            $cek;
            if($request->email){
              $cek = User::where('email',$request->email)->first();
            }elseif ($request->id_sales) {
              $cek = User::where('name',$request->id_sales)->first();
            }
            if($cek){
                if(Hash::check($request->password, $cek->password, [])){
                    // if($cek->android_token != $request->android_token){
                    //   $token = $request->android_token;
                    //   $cek->android_token = $token;
                    //   $cek->update();
                    // }
                    return response()->json([
                    'status' => true,
                     'data' => $cek
                    ]);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Password Salah',
                        ]);
                }

            }else{
                return response()->json([
                        'status' => false,
                        'message' => 'User Tidak Ditemukan',
                        ]);
            }

        }
}
