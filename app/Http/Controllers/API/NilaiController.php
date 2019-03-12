<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\NilaiPeserta;
use App\Models\Master\Pemain;

use Datatables;

class NilaiController extends Controller
{
    public function index()
    {
      $user = NilaiPeserta::with('pemain')->get();

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
    	$item = new NilaiPeserta;
    	$item->fill($request->all());
    	$item->save();
      $item->pemain->update(['status' => 1]);
      // $user = Pemain::findOrFail($item->id_pemain);
      // $user->status = 1;
      // $user->save();

    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function show($id)
    {
        return NilaiPeserta::find($id);
    }

    public function edit($id)
    {
    	$record = NilaiPeserta::find($id);

        return $this->render('backend.profil.sejarah.edit', ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
    	$item = NilaiPeserta::find($id);
    	$item->fill($request->all());
    	$item->save();

    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function destroy($id)
    {
    	$item = NilaiPeserta::find($id);
    	$item->delete();

    	return response([
    		'status' => true,
    	]);
    }
}
