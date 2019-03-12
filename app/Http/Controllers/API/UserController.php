<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Kriteria;
use App\Models\User;
use App\Models\Master\DetailKriteria;
use Hash;

use Datatables;

class UserController extends Controller
{
    public function index()
    {
      $user = User::with('detail')->get();

      return response()->json([
          'status' => true,
          'data' => $user
      ]);
    }

    public function create()
    {
        return $this->render('backend.profil.sejarah.create');
    }

    public function store(Request $request)
    {
    	$item = new User;
      $item->name = $request->name;
      $item->password = bcrypt($request->password);
      $item->email = $request->email;
      $item->status = $request->status;
    	$item->save();

    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function edit($id)
    {
    	$record = User::find($id);

        return $this->render('backend.profil.sejarah.edit', ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
    	$item = User::find($id);
    	$item->fill($request->all());
    	$item->save();

    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function destroy($id)
    {
    	$item = User::find($id);
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
