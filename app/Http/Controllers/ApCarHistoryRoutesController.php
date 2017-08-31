<?php namespace App\Http\Controllers;

use App\Models\ApCarParkDriversConnections;
use App\Models\ApHistoryRoutes;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class ApCarHistoryRoutesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /apcarhistoryroutes
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /apcarhistoryroutes/create
	 *
	 * @return Response
	 */
	public function create()
	{

        $config['titleForm'] = 'Create car routes';
        $config['route'] = route('app.routes.create');
        $config['show']='app.routes.show';
        $config['edit'] = 'app.routes.edit';
        $config ['conn'] = ApCarParkDriversConnections::pluck('id','id')->toArray();
        $config['back'] = '/routes';

        return view ('admin.routes.create',$config);


    }





	/**
	 * Store a newly created resource in storage.
	 * POST /apcarhistoryroutes
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = request()->all();
        //$record = Carbon::createFromFormat('Y-m-d H', $data['entry_date'])->toDateTimeString();
		//dd($data);


        ApHistoryRoutes::create(array(
            'entry_date' => $data['entry_date'],
            'distance' => $data['distance'],
            'connection_id'=> $data['conn'],
        ));



    }

	/**
	 * Display the specified resource.
	 * GET /apcarhistoryroutes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /apcarhistoryroutes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	    $record = ApHistoryRoutes::find($id)->toArray();

        $config['titleForm'] = 'Edit car routes';
        $config['route'] = route('app.routes.edit',$id);
        $config['show']='app.routes.show';
        $config ['conn'] = ApCarParkDriversConnections::pluck('id','id')->toArray();
        $config ['default_conn']= $record['connection_id'];
        $config ['default_distance']= $record['distance'];
        $config ['default_date']= $record['entry_date'];
        $config['back'] = '/routes';

        return view ('admin.routes.edit',$config);

    }

	/**
	 * Update the specified resource in storage.
	 * PUT /apcarhistoryroutes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /apcarhistoryroutes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}