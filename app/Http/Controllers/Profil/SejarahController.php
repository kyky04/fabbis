<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profil\Sejarah;

use App\Http\Requests\Profil\SejarahRequest;

use Datatables;

class SejarahController extends Controller
{
    //
    protected $link = 'profil/sejarah/';
    protected $perms  = '';

	function __construct()
	{
		$this->setLink($this->link);
        $this->setPerms($this->perms);

		$this->setTitle("Sejarah");
		$this->setModalSize("");
		$this->setBreadcrumb(['Profil' => '#', 'Sejarah' => '#']);
		$this->setTableStruct([
			[
			    'data' => 'num',
			    'name' => 'num',
			    'label' => '#',
			    'orderable' => false,
			    'searchable' => false,
			    'className' => "center aligned",
			    'width' => '40px',
			],
			/* --------------------------- */
			[
			    'data' => 'judul',
			    'name' => 'judul',
			    'label' => 'Judul',
			    'searchable' => false,
			    'sortable' => true,
			],
			[
			    'data' => 'keterangan',
			    'name' => 'keterangan',
			    'label' => 'Keterangan',
			    'searchable' => false,
			    'sortable' => true,
			],
			[
			    'data' => 'created_at',
			    'name' => 'created_at',
			    'label' => 'Tanggal Entry',
			    'searchable' => false,
			    'sortable' => true,
			],
			[
			    'data' => 'created_by',
			    'name' => 'created_by',
			    'label' => 'Oleh',
			    'searchable' => false,
			    'sortable' => true,
			],
			[
			    'data' => 'action',
			    'name' => 'action',
			    'label' => 'Aksi',
			    'searchable' => false,
			    'sortable' => false,
			    'className' => "center aligned",
			    'width' => '150px',
			]
		]);
	}

	public function grid(Request $request)
	{
		$records = Sejarah::with('creator')
						   ->select('*');
		//Init Sort
        if (!isset(request()->order[0]['column'])) {
            // $records->->sort();
            $records->orderBy('judul', 'asc');
        }

        //Filters
        if ($judul = $request->judul) {
            $records->where('judul', 'like', '%' . $judul . '%');
        }
        if ($keterangan = $request->keterangan) {
            $records->where('keterangan', 'like', '%' . $keterangan . '%');
        }

        return Datatables::of($records)
            ->addColumn('num', function ($record) use ($request) {
                return $request->get('start');
            })
            ->addColumn('created_at', function ($record) {
                return $record->created_at->format('d F Y');
            })
            ->addColumn('created_by', function ($record) {
                return $record->creator->name;
            })
            ->addColumn('action', function ($record) {
                $btn = '';
                //Edit
                $btn .= $this->makeButton([
                	'type' => 'edit',
                	'id'   => $record->id
                ]);
                // Delete
                $btn .= $this->makeButton([
                	'type' => 'delete',
                	'id'   => $record->id
                ]);

                return $btn;
            })
            ->make(true);
	}

    public function index()
    {
        return $this->render('backend.profil.sejarah.index', ['mockup' => false]);
    }

    public function create()
    {
        return $this->render('backend.profil.sejarah.create');
    }

    public function store(SejarahRequest $request)
    {
    	$jenis = new Sejarah;
    	$jenis->fill($request->all());
    	$jenis->save();

    	return response([
    		'status' => true,
    		'data'	=> $jenis
    	]);
    }

    public function show($id)
    {
        return Sejarah::find($id);
    }

    public function edit($id)
    {
    	$record = Sejarah::find($id);

        return $this->render('backend.profil.sejarah.edit', ['record' => $record]);
    }

    public function update(SejarahRequest $request, $id)
    {
    	$jenis = Sejarah::find($id);
    	$jenis->fill($request->all());
    	$jenis->save();

    	return response([
    		'status' => true,
    		'data'	=> $jenis
    	]);
    }

    public function destroy($id)
    {
    	$jenis = Sejarah::find($id);
    	$jenis->delete();

    	return response([
    		'status' => true,
    	]);
    }
}
