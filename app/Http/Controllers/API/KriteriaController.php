<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Kriteria;
use App\Models\Master\DetailKriteria;

use Datatables;

class KriteriaController extends Controller
{
    public function index()
    {
      $user = Kriteria::with('detail')->get();

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
    	$item = new Kriteria;
    	$item->fill($request->all());
    	$item->save();

    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function show($id)
    {
        return Kriteria::find($id);
    }

    public function edit($id)
    {
    	$record = Kriteria::find($id);

        return $this->render('backend.profil.sejarah.edit', ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
    	$item = Kriteria::find($id);
    	$item->fill($request->all());
    	$item->save();

    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function destroy($id)
    {
    	$item = Kriteria::find($id);
    	$item->delete();

    	return response([
    		'status' => true,
    	]);
    }
}
