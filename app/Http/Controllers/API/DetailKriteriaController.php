<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Detail;
use App\Models\Master\DetailKriteria;

use Datatables;

class DetailKriteriaController extends Controller
{
    public function index()
    {
      $user = DetailKriteria::get();

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
    	$item = new DetailKriteria;
    	$item->fill($request->all());
    	$item->save();

    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function show($id)
    {
        return DetailKriteria::find($id);
    }

    public function edit($id)
    {
    	$record = DetailKriteria::find($id);

        return $this->render('backend.profil.sejarah.edit', ['record' => $record]);
    }

    public function update(Request $request, $id)
    {
    	$item = DetailKriteria::find($id);
    	$item->fill($request->all());
    	$item->save();

    	return response([
    		'status' => true,
    		'data'	=> $item
    	]);
    }

    public function destroy($id)
    {
    	$item = DetailKriteria::find($id);
    	$item->delete();

    	return response([
    		'status' => true,
    	]);
    }
}
